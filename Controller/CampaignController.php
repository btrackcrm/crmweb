<?php

require_once("Model/CampaignDB.php");
require_once("Model/WorkgroupDB.php");
require_once("Model/GeneralDB.php");
require_once("ViewHelper.php");
require_once("libs/Mailchimp/src/MailChimp.php");
require_once("libs/Mailchimp/src/Batch.php");
require_once('libs/PHPMailer/src/Exception.php');
require_once('libs/PHPMailer/src/PHPMailer.php');
require_once('libs/PHPMailer/src/SMTP.php');

use \DrewM\MailChimp\MailChimp;
use \DrewM\MailChimp\Batch;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class CampaignController {
    
    public static function getRecentActions(){
        $data = $_POST;
        
        if (isset($data["workgroup_id"]) && $data["workgroup_id"] != ""){
            $recently_created = CampaignDB::getRecentlyCreatedCampaignsWorkgroup($data["workgroup_id"]);
            $recently_sent = CampaignDB::getRecentlySentCampaignsWorkgroup($data["workgroup_id"]);
            $recent_lists = CampaignDB::getRecentlyCreatedListsWorkgroup($data["workgroup_id"]);
        }else{
            $recently_created = CampaignDB::getRecentlyCreatedCampaigns();
            $recently_sent = CampaignDB::getRecentlySentCampaigns();
            $recent_lists = CampaignDB::getRecentlyCreatedLists();
        }
        
        $response = array();
        $response["created_campaigns"] = $recently_created;
        $response["sent_campaigns"] = $recently_sent;
        $response["created_lists"] = $recent_lists;
        
        echo json_encode($response);
    }
    
    public static function showMailingPage(){
        $settings = GeneralDB::getSettings();
        ViewHelper::render("View/mailing.php", [ "settings" => $settings ]);
    }
    
    public static function uploadImage(){
        $imageFolder = 'Uploads/CampaignImages/';
		
		reset ($_FILES);
  		$temp = current($_FILES);
  		if (is_uploaded_file($temp['tmp_name'])){
  		
  			if (!in_array(strtolower(pathinfo($temp['name'], PATHINFO_EXTENSION)), array("gif", "jpg", "png"))) {
        			header("HTTP/1.0 500 Invalid extension.");
        			return;
    			}
    			$filetowrite = $imageFolder . $temp['name'];
    			move_uploaded_file($temp['tmp_name'], $filetowrite);
    			
    			echo json_encode(array('location' => $filetowrite));
  		}
  		else {
    			// Notify editor that the upload failed
    			header("HTTP/1.0 500 Server Error");
  		}
    }
    
    public static function parseImportedFile(){
        $data = $_POST;
        $list_id = $data["list_id"];
        $list = CampaignDB::getListByID($list_id);
        $subscribers = array_map('str_getcsv', file($_FILES["file"]["tmp_name"]));
        $subscriberArray = array();
        foreach (array_slice($subscribers, 1) as $subscriber){
            if($list["list_type"] == 0) { //check if column contains valid email address if list type is email
                array_push($subscriberArray, array("subscriber_name" => trim($subscriber[0]), "subscriber_surname" => trim($subscriber[1]), "subscriber_contact" => trim($subscriber[2])));
            }else{
                array_push($subscriberArray, array("subscriber_name" => trim($subscriber[0]), "subscriber_surname" => trim($subscriber[1]), "subscriber_contact" => trim($subscriber[2])));
            }
        }
        echo json_encode($subscriberArray);
    }
    
    public static function sendCampaign(){
        $data = $_POST;
        
        $campaign = CampaignDB::getCampaignByID($data["campaign_id"]);
        $mailchimp_id = $campaign["mailchimp_id"];
        if ($campaign["campaign_type"] == 0){
            if ($mailchimp_id != ""){ //if this is a mailchimp campaign, trigger send via mailchimp API
                if ($campaign["workgroup_id"] != null){
                    $workgroup = WorkgroupDB::getWorkgroupByID($campaign["workgroup_id"]);
                    if ($workgroup["mailchimp_key"] != ""){
                        $MailChimp = new MailChimp($workgroup["mailchimp_key"]);
        			    $result = $MailChimp->post("campaigns/" . $mailchimp_id . "/actions/send", []);
        			    CampaignDB::markCampaignAsSent($campaign["campaign_id"]);
                    }else{
                        $mail = new PHPMailer(true);  // Passing `true` enables exceptions
                        $subscribers = explode(";", $campaign["subscribers"]); // list of emails to send to
                        try {
                            //Server settings
                            $mail->SMTPDebug = 0;                                 // Enable verbose debug output
                            $mail->isSMTP();                                      // Set mailer to use SMTP
                            $mail->Host = 'mail.appdev.si';  // Specify main and backup SMTP servers
                            $mail->SMTPAuth = true;                               // Enable SMTP authentication
                            $mail->Username = 'reminders@appdev.si';                 // SMTP username
                            $mail->Password = '12Tojegeslo#';                           // SMTP password
                            $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
                            $mail->Port = 465;                                    // TCP port to connect to
                            
                            //Recipients
                            $mail->setFrom($campaign["from_email"], $campaign["from_name"]);
                            foreach ($subscribers as $subscriber){
                                $subscriber_fields = explode("|", $subscriber);
                                $mail->addAddress($subscriber_fields[2], $subscriber_fields[0] . " " . $subscriber_fields[1]);     // Add a recipient
                            }
                            //Content
                            $mail->isHTML(true);// Set email format to HTML
                            $mail->Subject = $campaign["campaign_subject"];
                            $mail->Body = $campaign["campaign_content"];
                            $mail->AltBody = $campaign["campaign_content"];
                        
                            $mail->send();
                            CampaignDB::markCampaignAsSent($campaign["campaign_id"]);
                        } catch (Exception $e) {
                            echo 'Message could not be sent.';
                            echo 'Mailer Error: ' . $mail->ErrorInfo;
                        }
                    }
                }else{
                    $settings = GeneralDB::getSettings();
                    if ($settings["mailchimp_key"] != ""){
                        $MailChimp = new MailChimp($settings["mailchim_key"]);
            			$result = $MailChimp->post("campaigns/" . $mailchimp_id . "/actions/send", []);
            			CampaignDB::markCampaignAsSent($campaign["campaign_id"]);
                    }else{
                        $mail = new PHPMailer(true);  // Passing `true` enables exceptions
                        $subscribers = explode(";", $campaign["subscribers"]); // list of emails to send to
                        try {
                            //Server settings
                            $mail->SMTPDebug = 0;                                 // Enable verbose debug output
                            $mail->isSMTP();                                      // Set mailer to use SMTP
                            $mail->Host = 'mail.appdev.si';  // Specify main and backup SMTP servers
                            $mail->SMTPAuth = true;                               // Enable SMTP authentication
                            $mail->Username = 'reminders@appdev.si';                 // SMTP username
                            $mail->Password = '12Tojegeslo#';                           // SMTP password
                            $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
                            $mail->Port = 465;                                    // TCP port to connect to
                            
                            //Recipients
                            $mail->setFrom($campaign["from_email"], $campaign["from_name"]);
                            foreach ($subscribers as $subscriber){
                                $subscriber_fields = explode("|", $subscriber);
                                $mail->addAddress($subscriber_fields[2], $subscriber_fields[0] . " " . $subscriber_fields[1]);     // Add a recipient
                            }
                            //Content
                            $mail->isHTML(true);// Set email format to HTML
                            $mail->Subject = $campaign["campaign_subject"];
                            $mail->Body = $campaign["campaign_content"];
                            $mail->AltBody = $campaign["campaign_content"];
                        
                            $mail->send();
                            CampaignDB::markCampaignAsSent($campaign["campaign_id"]);
                        } catch (Exception $e) {
                            echo 'Message could not be sent.';
                            echo 'Mailer Error: ' . $mail->ErrorInfo;
                        }
                    }
                }
            }else{
                $mail = new PHPMailer(true);  // Passing `true` enables exceptions
                $subscribers = explode(";", $campaign["subscribers"]); // list of emails to send to
                try {
                    //Server settings
                    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
                    $mail->isSMTP();                                      // Set mailer to use SMTP
                    $mail->Host = 'mail.appdev.si';  // Specify main and backup SMTP servers
                    $mail->SMTPAuth = true;                               // Enable SMTP authentication
                    $mail->Username = 'reminders@appdev.si';                 // SMTP username
                    $mail->Password = '12Tojegeslo#';                           // SMTP password
                    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
                    $mail->Port = 465;                                    // TCP port to connect to
                    
                    //Recipients
                    $mail->setFrom($campaign["from_email"], $campaign["from_name"]);
                    foreach ($subscribers as $subscriber){
                        $subscriber_fields = explode("|", $subscriber);
                        $mail->addAddress($subscriber_fields[2], $subscriber_fields[0] . " " . $subscriber_fields[1]);     // Add a recipient
                    }
                    //Content
                    $mail->isHTML(true);// Set email format to HTML
                    $mail->Subject = $campaign["campaign_subject"];
                    $mail->Body = $campaign["campaign_content"];
                    $mail->AltBody = $campaign["campaign_content"];
                
                    $mail->send();
                    CampaignDB::markCampaignAsSent($campaign["campaign_id"]);
                } catch (Exception $e) {
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                }
            }
        }else{
            $subscribers = explode(";", $campaign["subscribers"]); // list of phones to send to
            $phoneNumberArray = array();
            foreach ($subscribers as $subscriber){
                $subscriber_fields = explode("|", $subscriber);
                array_push($phoneNumberArray, $subscriber_fields[2]); //push phone number into phone number array.
            }
            $username = "netko";
			$password = "N3tkoetKOweR2er";
            // set post fields
			$data = array('message' => $campaign["campaign_content"], 'from_number' => "38664119001", 'to_numbers' => $phoneNumberArray);                                                                    
			$data_string = json_encode($data); 

			$ch = curl_init('https://mbg.t-2.com/SMS/netko/send_multiple_sms');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
    				'Content-Type: application/json',                                                                                
    				'Content-Length: ' . strlen($data_string))                                                                       
			);
			curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);

			// execute!
			$response = curl_exec($ch);

			// close the connection, release resources used
			curl_close($ch);
			
			$response = json_decode($response, true);
    		if ($response["error_code"] == "0"){ //no error
    			CampaignDB::markCampaignAsSent($campaign["campaign_id"]);
    		}
    		else{ //sms sending failed.
    		    echo print_r($response);
    		}
        }
    }
    
    
    public static function showCampaignPage(){
        $campaign_id = $_GET['campaign_id'];
        $campaign = CampaignDB::getCampaignByID($campaign_id);
        ViewHelper::render("View/emailcampaign.php", ["campaign" => $campaign]);
    }
    
    public static function showCampaignListPage(){
        $list_id = $_GET['list_id'];
        $list = CampaignDB::getListByID($list_id);
        ViewHelper::render("View/campaignlist.php", ["campaignlist" => $list]);
    }
    
    public static function addCampaign(){
        $data = $_POST;
		
		$campaign_id = "";
		$workgroup_id = null;
		$mailchimp_list = CampaignDB::getListByID($data["campaign_list"]);
		$nrOfRecipients = count(explode(";", $mailchimp_list["subscribers"]));
		if (isset($data["workgroup_id"]) && $data["workgroup_id"] != ""){
		        $workgroup_id = $data["workgroup_id"];
		}
		if ($data["campaign_type"] == 0){ //email campaign
    		$list_id = $mailchimp_list["mailchimp_id"];
    		if ($workgroup_id != null){
    		    $workgroup = WorkgroupDB::getWorkgroupByID($workgroup_id);
    		    if ($workgroup["mailchimp_key"] != ""){
            		if ($list_id != ""){ //if list has a mailchimp_id, add campaign to MailChimp aswell
                		$MailChimp = new MailChimp($workgroup["mailchimp_key"]);
                		$result = $MailChimp->post("campaigns", [
                            "type" =>"regular",
                            "recipients"=> [
                                "list_id"=> $list_id
                            ],
                            "settings"=> [
                                "subject_line"=> $data["campaign_subject"],
                                "from_name"=> $mailchimp_list["from_name"],
                                "title"=> $data["campaign_name"],
                                "reply_to"=> $mailchimp_list["from_email"]
                            ]
                        ]);
                		$campaign_id = $result["id"]; //get created campaign ID
                		//add content to newly created campaign based on user input
                		$htmlContent = stripslashes($data["campaign_content"]);
                		$result = $MailChimp->put("campaigns/" . $campaign_id . "/content", [
                            "html"=> $htmlContent  
                        ]);
            		}else{
            		    $settings = GeneralDB::getSettings();
            		    $MailChimp = new MailChimp($workgroup["mailchimp_key"]);
            		    //create identical list on mailchimp and update the list with mailchimp_id in our DB.
            		    $result = $MailChimp->post("lists", [  
                                   "name" => $mailchimp_list["list_name"],   
                                   "permission_reminder" => $mailchimp_list["permission_reminder"],
                                   "email_type_option" => false,
                                   "contact"=> [
                                           "company"=> $settings["company_name"],
                                           "address1"=> $settings["company_address"],
                                           "city"=> $settings["company_city"],
                                           "state"=> $settings["company_city"],
                                           "zip"=> $settings["company_zipcode"],
                                           "country"=> "Slovenia"
                                       ],
                                   "campaign_defaults"=> [
                                   	   "from_name" => $data["from_name"],
                                   	   "from_email" => $data["from_email"],
                                   	   "subject" => $data["campaign_subject"],
                                   	   "language" => "English"
                                   
                                      ]
                                   ]);
                        
                        $list_id = $result["id"]; 
                        CampaignDB::updateListMailchimpID($mailchimp_list["list_id"], $list_id);
                        $subscribers = explode(";", $mailchimp_list["subscribers"]);
                        $count = 0;
                        foreach ($subscribers as $subscriber){
                            $subscriber_fields = explode("|", $subscriber);
                            $subscriber_email = $subscriber_fields[2];
                            $subscriber_name = $subscriber_fields[0];
                            $subscriber_surname = $subscriber_fields[1];
                            $batch->post("op" . $count, "lists/" . $list_id . "/members", [
                                'email_address' => $subscriber_email,
                                'status'        => 'subscribed',
                                'merge_fields'  => [
                            		'FNAME' => $subscriber_name,
                            		'LNAME' => $subscriber_surname
                        		]
                            ]);
                            $count++;
                        }
                        $result = $batch->execute();
                		$result = $MailChimp->post("campaigns", [
                            "type" =>"regular",
                            "recipients"=> [
                                "list_id"=> $list_id
                            ],
                            "settings"=> [
                                "subject_line"=> $data["campaign_subject"],
                                "from_name"=> $mailchimp_list["from_name"],
                                "title"=> $data["campaign_name"],
                                "reply_to"=> $mailchimp_list["from_email"]
                            ]
                        ]);
                                           
                		$campaign_id = $result["id"]; //get created campaign ID
                		//add content to newly created campaign based on user input
                		$htmlContent = stripslashes($data["campaign_content"]);
                		$result = $MailChimp->put("campaigns/" . $campaign_id . "/content", [
                            "html"=> $htmlContent  
                        ]);
            		}
    		    }
    		}else{
    		    $settings = GeneralDB::getSettings();
    		    if ($settings["mailchimp_key"] != ""){
            		if ($list_id != ""){ //if list has a mailchimp_id, add campaign to MailChimp aswell
                		$MailChimp = new MailChimp($settings["mailchimp_key"]);
                		$result = $MailChimp->post("campaigns", [
                            "type" =>"regular",
                            "recipients"=> [
                                "list_id"=> $list_id
                            ],
                            "settings"=> [
                                "subject_line"=> $data["campaign_subject"],
                                "from_name"=> $mailchimp_list["from_name"],
                                "title"=> $data["campaign_name"],
                                "reply_to"=> $mailchimp_list["from_email"]
                            ]
                        ]);
                		$campaign_id = $result["id"]; //get created campaign ID
                		//add content to newly created campaign based on user input
                		$htmlContent = stripslashes($data["campaign_content"]);
                		$result = $MailChimp->put("campaigns/" . $campaign_id . "/content", [
                            "html"=> $htmlContent  
                        ]);
            		}else{
            		    $MailChimp = new MailChimp($settings["mailchimp_key"]);
            		    //create identical list on mailchimp and update the list with mailchimp_id in our DB.
            		    $result = $MailChimp->post("lists", [  
                                   "name" => $mailchimp_list["list_name"],   
                                   "permission_reminder" => $mailchimp_list["permission_reminder"],
                                   "email_type_option" => false,
                                   "contact"=> [
                                           "company"=> $settings["company_name"],
                                           "address1"=> $settings["company_address"],
                                           "city"=> $settings["company_city"],
                                           "state"=> $settings["company_city"],
                                           "zip"=> $settings["company_zipcode"],
                                           "country"=> "Slovenia"
                                       ],
                                   "campaign_defaults"=> [
                                   	   "from_name" => $data["from_name"],
                                   	   "from_email" => $data["from_email"],
                                   	   "subject" => $data["campaign_subject"],
                                   	   "language" => "English"
                                   
                                      ]
                                   ]);
                        
                        $list_id = $result["id"]; 
                        CampaignDB::updateListMailchimpID($mailchimp_list["list_id"], $list_id);
                        $subscribers = explode(";", $mailchimp_list["subscribers"]);
                        $count = 0;
                        foreach ($subscribers as $subscriber){
                            $subscriber_fields = explode("|", $subscriber);
                            $subscriber_email = $subscriber_fields[2];
                            $subscriber_name = $subscriber_fields[0];
                            $subscriber_surname = $subscriber_fields[1];
                            $batch->post("op" . $count, "lists/" . $list_id . "/members", [
                                'email_address' => $subscriber_email,
                                'status'        => 'subscribed',
                                'merge_fields'  => [
                            		'FNAME' => $subscriber_name,
                            		'LNAME' => $subscriber_surname
                        		]
                            ]);
                            $count++;
                        }
                        $result = $batch->execute();
                		$result = $MailChimp->post("campaigns", [
                            "type" =>"regular",
                            "recipients"=> [
                                "list_id"=> $list_id
                            ],
                            "settings"=> [
                                "subject_line"=> $data["campaign_subject"],
                                "from_name"=> $mailchimp_list["from_name"],
                                "title"=> $data["campaign_name"],
                                "reply_to"=> $mailchimp_list["from_email"]
                            ]
                        ]);
                                           
                		$campaign_id = $result["id"]; //get created campaign ID
                		//add content to newly created campaign based on user input
                		$htmlContent = stripslashes($data["campaign_content"]);
                		$result = $MailChimp->put("campaigns/" . $campaign_id . "/content", [
                            "html"=> $htmlContent  
                        ]);
            		}
    		    }
    		}
    	    CampaignDB::addCampaign($data["campaign_name"],  $data["campaign_subject"], stripslashes($data["campaign_content"]), $workgroup_id, $data["campaign_type"], $data["campaign_list"], $campaign_id, date("Y-m-d H:i:s"), "", 0, $nrOfRecipients, 0);
		}else{
		    CampaignDB::addCampaign($data["campaign_name"],  $data["campaign_name"], stripslashes($data["campaign_content"]), $workgroup_id, $data["campaign_type"], $data["campaign_list"], $campaign_id, date("Y-m-d H:i:s"), "", 0, $nrOfRecipients, 0);
		}
    	
    }
    
    public static function editCampaign(){
        $data = $_POST;
        $campaign_id = $data["campaign_id"];
        $campaign = CampaignDB::getCampaignByID($campaign_id);
        $mailchimp_list = CampaignDB::getListByID($data["campaign_list"]);
        $workgroup_id = $campaign["workgroup_id"];
    		
        if ($campaign["campaign_type"] == 0){
            $list_id = $mailchimp_list["mailchimp_id"];
    		if ($workgroup_id != null){
    		    $workgroup = WorkgroupDB::getWorkgroupByID($workgroup_id);
    		    $MailChimp = new MailChimp($workgroup["mailchimp_key"]);
                $htmlContent = stripslashes($data["campaign_content"]);
                if ($list_id != ""){ //if list has a mailchimp_id, add campaign to MailChimp aswell
                		$result = $MailChimp->patch("campaigns/" . $campaign["mailchimp_id"], [
                            "recipients"=> [
                                "list_id"=> $list_id
                            ],
                            "settings"=> [
                                "subject_line"=> $data["campaign_subject"],
                                "from_name"=> $mailchimp_list["from_name"],
                                "title"=> $data["campaign_name"],
                                "reply_to"=> $mailchimp_list["from_email"]
                            ]
                        ]);
                        $result = $MailChimp->put("campaigns/" . $campaign["mailchimp_id"] . "/content", [
                            "html"=> $htmlContent  
                        ]);
                        CampaignDB::editCampaign($campaign_id, $data["campaign_name"], $data["campaign_subject"], $htmlContent, $mailchimp_list["list_id"], count(explode(";", $mailchimp_list["subscribers"])));
            	}else{
            		    $settings = GeneralDB::getSettings();
            		    $MailChimp = new MailChimp($workgroup["mailchimp_key"]);
            		    //create identical list on mailchimp and update the list with mailchimp_id in our DB.
            		    $result = $MailChimp->post("lists", [  
                                   "name" => $mailchimp_list["list_name"],   
                                   "permission_reminder" => $mailchimp_list["permission_reminder"],
                                   "email_type_option" => false,
                                   "contact"=> [
                                           "company"=> $settings["company_name"],
                                           "address1"=> $settings["company_address"],
                                           "city"=> $settings["company_city"],
                                           "state"=> $settings["company_city"],
                                           "zip"=> $settings["company_zipcode"],
                                           "country"=> "Slovenia"
                                       ],
                                   "campaign_defaults"=> [
                                   	   "from_name" => $data["from_name"],
                                   	   "from_email" => $data["from_email"],
                                   	   "subject" => $data["campaign_subject"],
                                   	   "language" => "English"
                                   
                                      ]
                                   ]);
                        
                        $list_id = $result["id"]; 
                        CampaignDB::updateListMailchimpID($mailchimp_list["list_id"], $list_id);
                        $result = $MailChimp->patch("campaigns/" . $campaign["mailchimp_id"], [
                            "recipients"=> [
                                "list_id"=> $list_id
                            ],
                            "settings"=> [
                                "subject_line"=> $data["campaign_subject"],
                                "from_name"=> $mailchimp_list["from_name"],
                                "title"=> $data["campaign_name"],
                                "reply_to"=> $mailchimp_list["from_email"]
                            ]
                        ]);
                        $result = $MailChimp->put("campaigns/" . $campaign["mailchimp_id"] . "/content", [
                            "html"=> $htmlContent  
                        ]);
                        CampaignDB::editCampaign($campaign_id, $data["campaign_name"], $data["campaign_subject"], $htmlContent, $mailchimp_list["list_id"], count(explode(";", $mailchimp_list["subscribers"])));
            		}
    		}else{
    		    $settings = GeneralDB::getSettings();
    		    if ($settings["mailchimp_key"] != ""){
        		    $MailChimp = new MailChimp($settings["mailchimp_key"]);
                    $htmlContent = stripslashes($data["campaign_content"]);
                    if ($list_id != ""){ //if list has a mailchimp_id, add campaign to MailChimp aswell
                    		$result = $MailChimp->patch("campaigns/" . $campaign_id, [
                                "recipients"=> [
                                    "list_id"=> $list_id
                                ],
                                "settings"=> [
                                    "subject_line"=> $data["campaign_subject"],
                                    "from_name"=> $mailchimp_list["from_name"],
                                    "title"=> $data["campaign_name"],
                                    "reply_to"=> $mailchimp_list["from_email"]
                                ]
                            ]);
                            $result = $MailChimp->put("campaigns/" . $campaign_id . "/content", [
                                "html"=> $htmlContent  
                            ]);
                            CampaignDB::editCampaign($campaign_id, $data["campaign_name"], $data["campaign_subject"], $htmlContent, $mailchimp_list["list_id"], count(explode(";", $mailchimp_list["subscribers"])));
                	}else{
                		    $settings = GeneralDB::getSettings();
                		    $MailChimp = new MailChimp("7fc6e2ac3d04825ebb046823f7f947ae-us15");
                		    //create identical list on mailchimp and update the list with mailchimp_id in our DB.
                		    $result = $MailChimp->post("lists", [  
                                       "name" => $mailchimp_list["list_name"],   
                                       "permission_reminder" => $mailchimp_list["permission_reminder"],
                                       "email_type_option" => false,
                                       "contact"=> [
                                               "company"=> $settings["company_name"],
                                               "address1"=> $settings["company_address"],
                                               "city"=> $settings["company_city"],
                                               "state"=> $settings["company_city"],
                                               "zip"=> $settings["company_zipcode"],
                                               "country"=> "Slovenia"
                                           ],
                                       "campaign_defaults"=> [
                                       	   "from_name" => $data["from_name"],
                                       	   "from_email" => $data["from_email"],
                                       	   "subject" => $data["campaign_subject"],
                                       	   "language" => "English"
                                       
                                          ]
                                       ]);
                            
                            $list_id = $result["id"]; 
                            CampaignDB::updateListMailchimpID($mailchimp_list["list_id"], $list_id);
                            $result = $MailChimp->patch("campaigns/" . $campaign["mailchimp_id"], [
                                "recipients"=> [
                                    "list_id"=> $list_id
                                ],
                                "settings"=> [
                                    "subject_line"=> $data["campaign_subject"],
                                    "from_name"=> $mailchimp_list["from_name"],
                                    "title"=> $data["campaign_name"],
                                    "reply_to"=> $mailchimp_list["from_email"]
                                ]
                            ]);
                            $result = $MailChimp->put("campaigns/" . $campaign["mailchimp_id"] . "/content", [
                                "html"=> $htmlContent  
                            ]);
                            CampaignDB::editCampaign($campaign_id, $data["campaign_name"], $data["campaign_subject"], $htmlContent, $mailchimp_list["list_id"], count(explode(";", $mailchimp_list["subscribers"])));
                		}
    		    }
    		}
        }else{
            CampaignDB::editCampaign($campaign_id, $data["campaign_name"], $data["campaign_name"], $data["campaign_content"], $mailchimp_list["list_id"], count(explode(";", $mailchimp_list["subscribers"])));
        }
    }
    
    public static function deleteCampaign(){
        $data = $_POST;
        
        $campaign = CampaignDB::getCampaignByID($data["campaign_id"]);
        $workgroup_id = $campaign["workgroup_id"];
        $mailchimp_id = $campaign["mailchimp_id"];
		if ($mailchimp_id != ""){
		    if ($workgroup_id != null){
		        $workgroup = WorkgroupDB::getWorkgroupByID($workgroup_id);
		        if ($workgroup["mailchimp_key"] != ""){
			        $MailChimp = new MailChimp($workgroup["mailchimp_key"]);
			        $result = $MailChimp->delete("campaigns/" . $mailchimp_id, []);
		        }
		    }else{
		        $settings = GeneralDB::getSettings();
		        if ($settings["mailchimp_key"] != ""){
		            $MailChimp = new MailChimp($settings["mailchimp_key"]);
			        $result = $MailChimp->delete("campaigns/" . $mailchimp_id, []);
		        }
		    }
		}

		CampaignDB::deleteCampaign($data["campaign_id"]);
    }
    
    public static function getCampaigns(){
        $data = $_POST;
        if ($data["workgroup_id"] != "" && isset($data["workgroup_id"])){
            $campaigns = CampaignDB::getWorkgroupCampaigns($data["workgroup_id"]);
        }else{
            $campaigns = CampaignDB::getCampaigns();
        }
        echo json_encode($campaigns);
    }
    
    public static function getCampaignLists(){
        $data = $_POST;
        if ($data["workgroup_id"] != "" && isset($data["workgroup_id"])){
            $campaigns = CampaignDB::getWorkgroupSubscriberLists($data["workgroup_id"]);
        }else{
            $campaigns = CampaignDB::getSubscriberLists();
        }
        echo json_encode($campaigns);
    }
    
    public static function setupWorkgroupMailchimp(){
        $data = $_POST;
        
            $MailChimp = new MailChimp($data["mailchimp_key"]);
            $mailchimp_ping = $MailChimp->get('ping');
            if ($mailchimp_ping != false){
                if ($data["workgroup_id"] != ""){
                    WorkgroupDB::setupWorkgroupMailchimp($data["workgroup_id"], $data["mailchimp_key"]);
                }else{
                    GeneralDB::setupMailchimp($data["mailchimp_key"]);
                }
            }else{
                echo "Invalid MailChimp API key supplied!";
            }
        
    }
    
    public static function removeWorkgroupMailchimp(){
        $data = $_POST;
        if ($data["workgroup_id"] != ""){
            WorkgroupDB::removeWorkgroupMailchimp($data["workgroup_id"]);
        }else{
            GeneralDB::removeMailchimp();
        }
    }
    
    public static function retrieveMailchimpData(){
        $data = $_POST;
        if (isset($data["workgroup_id"]) && $data["workgroup_id"] != "" ){
            $workgroup = WorkgroupDB::getWorkgroupByID($data["workgroup_id"]);
            $MailChimp = new MailChimp($workgroup["mailchimp_key"]);
            $list_result = $MailChimp->get("lists", [
                "count" => 100
            ]);
            
            $lists = $list_result["lists"];
            foreach ($lists as $list){
                $actual_list = CampaignDB::getMailchimpListID($list["id"]);
                $subscriber_result = $MailChimp->get("lists/" . $list["id"] . "/members", [
                        "count" => 1000
                ]);
                    
                $subscribers = $subscriber_result["members"];
                   
                $subscriberList = "";
                foreach ($subscribers as $subscriber){
                    if ($subscriberList == ""){
                        $subscriberList = $subscriber["merge_fields"]["FNAME"] . "|" . $subscriber["merge_fields"]["LNAME"] . "|" . $subscriber["email_address"];
                    }else{
                        $subscriberList .= ";" . $subscriber["merge_fields"]["FNAME"] . "|" . $subscriber["merge_fields"]["LNAME"] . "|" .  $subscriber["email_address"];
                    }
                }
                if (!is_array($actual_list)){
                    CampaignDB::addSubscriberList($list["name"], $subscriberList, $data["workgroup_id"], $list["id"], $list["date_created"], $list["campaign_defaults"]["from_name"], $list["campaign_defaults"]["from_email"], $list["permission_reminder"], 0);
                }else{
                    CampaignDB::updateSubscriberList($actual_list["list_id"], $subscriberList);	
                }
            }
            
            $campaign_result = $MailChimp->get("campaigns", [
                "type" => "regular",
                "count" => 100
            ]);
                
            $campaigns = $campaign_result["campaigns"];
            
            foreach ($campaigns as $campaign){
                $actual_campaign = CampaignDB::checkMailchimpCampaignExists($campaign["id"]);
                $actual_list = CampaignDB::getMailchimpListID($campaign["recipients"]["list_id"]);
                if (!is_array($actual_list)){
                    continue;
                }
                $campaign_content = $MailChimp->get("campaigns/" . $campaign["id"] . "/content", []);
                $status = 0;
                $opens = 0;
                $recipients = $campaign["emails_sent"];
                if ($campaign["status"] == "sent"){
                    $status = 1;
                    $opens = $campaign["report_summary"]["opens"];
                }
                if (!is_array($actual_campaign)){
                    CampaignDB::addCampaign($campaign["settings"]["title"],  $campaign["settings"]["subject_line"], $campaign_content["html"], $data["workgroup_id"], 0, $actual_list["list_id"], $campaign["id"], $campaign["create_time"], $campaign["send_time"], $status, $recipients, $opens);
                }else{
                    CampaignDB::updateCampaign($actual_campaign["campaign_id"], $campaign["settings"]["title"],  $campaign["settings"]["subject_line"], $campaign_content["html"], $data["workgroup_id"], 0, $actual_list["list_id"], $campaign["id"], $recipients, $opens);
                }
            }
        }else{
            $settings = GeneralDB::getSettings();
            $MailChimp = new MailChimp($settings["mailchimp_key"]);
            $list_result = $MailChimp->get("lists", [
                "count" => 100
            ]);
            
            $lists = $list_result["lists"];
            foreach ($lists as $list){
                $actual_list = CampaignDB::getMailchimpListID($list["id"]);
                $subscriber_result = $MailChimp->get("lists/" . $list["id"] . "/members", [
                        "count" => 1000
                ]);
                    
                $subscribers = $subscriber_result["members"];
                   
                $subscriberList = "";
                foreach ($subscribers as $subscriber){
                    if ($subscriberList == ""){
                        $subscriberList = $subscriber["merge_fields"]["FNAME"] . "|" . $subscriber["merge_fields"]["LNAME"] . "|" . $subscriber["email_address"];
                    }else{
                        $subscriberList .= ";" . $subscriber["merge_fields"]["FNAME"] . "|" . $subscriber["merge_fields"]["LNAME"] . "|" .  $subscriber["email_address"];
                    }
                }
                if (!is_array($actual_list)){
                    CampaignDB::addSubscriberList($list["name"], $subscriberList, null, $list["id"], $list["date_created"], $list["campaign_defaults"]["from_name"], $list["campaign_defaults"]["from_email"], $list["permission_reminder"], 0);
                }else{
                    CampaignDB::updateSubscriberList($actual_list["list_id"], $subscriberList);	
                }
            }
            
            $campaign_result = $MailChimp->get("campaigns", [
                "type" => "regular",
                "count" => 100
            ]);
                
            $campaigns = $campaign_result["campaigns"];
            
            foreach ($campaigns as $campaign){
                $actual_campaign = CampaignDB::checkMailchimpCampaignExists($campaign["id"]);
                $actual_list = CampaignDB::getMailchimpListID($campaign["recipients"]["list_id"]);
                if (!is_array($actual_list)){
                    continue;
                }
                $campaign_content = $MailChimp->get("campaigns/" . $campaign["id"] . "/content", []);
                $status = 0;
                $opens = 0;
                $recipients = $campaign["emails_sent"];
                if ($campaign["status"] == "sent"){
                    $status = 1;
                    $opens = $campaign["report_summary"]["opens"];
                }
                if (!is_array($actual_campaign)){
                    CampaignDB::addCampaign($campaign["settings"]["title"],  $campaign["settings"]["subject_line"], $campaign_content["html"], null, 0, $actual_list["list_id"], $campaign["id"], $campaign["create_time"], $campaign["send_time"], $status, $recipients, $opens);
                }else{
                    CampaignDB::updateCampaign($actual_campaign["campaign_id"], $campaign["settings"]["title"],  $campaign["settings"]["subject_line"], $campaign_content["html"], $data["workgroup_id"], 0, $actual_list["list_id"], $campaign["id"], $recipients, $opens);
                }
            }
        }
        
    }
    
    
    public static function addSubscriberList(){
	
    	$data = $_POST;
    	$mailchimp_id = "";

    	if ($data["list_type"] == 0){ //if its an email campaign, add list to mailchimp aswell
    	    if (isset($data["workgroup_id"]) && $data["workgroup_id"] != ""){
    	        $workgroup = WorkgroupDB::getWorkgroupByID($data["workgroup_id"]);
    	        if ($workgroup["mailchimp_key"] != ""){
    	            $settings = GeneralDB::getSettings();
            		$MailChimp = new MailChimp($workgroup["mailchimp_key"]);
            		$result = $MailChimp->post("lists", [
                                       "name" => $data["list_name"],   
                                       "permission_reminder" => $data["permission_reminder"],
                                       "email_type_option" => false,
                                       "contact"=> [
                                               "company"=> $settings["company_name"],
                                               "address1"=> $settings["company_address"],
                                               "city"=> $settings["company_city"],
                                               "state"=> $settings["company_city"],
                                               "zip"=> $settings["company_zipcode"],
                                               "country"=> "Slovenia"
                                           ],
                                       "campaign_defaults"=> [
                                       	   "from_name" => $data["from_name"],
                                       	   "from_email" => $data["from_email"],
                                       	   "subject" => "Lepo pozdravljeni",
                                       	   "language" => "English"
                                       
                                          ]
                                       ]);
                            
                    $list_id = $result["id"];        
                    $mailchimp_id = $list_id;
                    
    	        }
    	        CampaignDB::addSubscriberList($data["list_name"], "", $data["workgroup_id"], $mailchimp_id, date("Y-m-d H:i:s"), $data["from_name"], $data["from_email"], $data["permission_reminder"], $data["list_type"]);
    	    }else{
    	        $settings = GeneralDB::getSettings();
    	        if ($settings["mailchimp_key"] != ""){
        	        $MailChimp = new MailChimp($settings["mailchimp_key"]);
                	$result = $MailChimp->post("lists", [
                                           "name" => $data["list_name"],   
                                           "permission_reminder" => $data["permission_reminder"],
                                           "email_type_option" => false,
                                           "contact"=> [
                                                   "company"=> $settings["company_name"],
                                                   "address1"=> $settings["company_address"],
                                                   "city"=> $settings["company_city"],
                                                   "state"=> $settings["company_city"],
                                                   "zip"=> $settings["company_zipcode"],
                                                   "country"=> "Slovenia"
                                               ],
                                           "campaign_defaults"=> [
                                           	   "from_name" => $data["from_name"],
                                           	   "from_email" => $data["from_email"],
                                           	   "subject" => "Lepo pozdravljeni",
                                           	   "language" => "English"
                                           
                                              ]
                                           ]);
                                
                    $list_id = $result["id"];        
                    $mailchimp_id = $list_id;
                    
    	        }
    	        CampaignDB::addSubscriberList($data["list_name"], "", null, $mailchimp_id, date("Y-m-d H:i:s"), $data["from_name"], $data["from_email"], $data["permission_reminder"], $data["list_type"]);
    	        
    	    }
    	}else{
    	    if (isset($data["workgroup_id"]) && $data["workgroup_id"] != ""){
    	        CampaignDB::addSubscriberList($data["list_name"], "", $data["workgroup_id"], $mailchimp_id, date("Y-m-d H:i:s"), $data["list_name"], $data["list_name"], "", $data["list_type"]);
    	    }else{
    	        CampaignDB::addSubscriberList($data["list_name"], "", null, $mailchimp_id, date("Y-m-d H:i:s"), $data["list_name"], $data["list_name"], "", $data["list_type"]);
    	    }
    	}
	}
	
	public static function addSubscribersToList(){
	    $data = $_POST;
	    $list_id = $data["list_id"];
	    $list = CampaignDB::getListByID($list_id);
	    $workgroup_id = $list["workgroup_id"];
	    if ($workgroup_id != null){
    	    $workgroup = WorkgroupDB::getWorkgroupByID($workgroup_id);
        	if ($list["mailchimp_id"] != "" && $workgroup["mailchimp_key"] != "" && $list["list_type"] == 0){
        	    $MailChimp = new MailChimp($workgroup["mailchimp_key"]);
                $batch = $MailChimp->new_batch();
                $count = 0;
                $handle = fopen($_SESSION["csv"], 'r');
                $response = array();
                $subscriberString = "";
                if($handle !== FALSE) {
                    $row = 0;
                    $columns = array();
                    $rows = array();
                    while(($csvdata = fgetcsv($handle, 1000, ',')) !== FALSE) {
                        if ($row == 0){
                            $row++;
                            continue;
                        }else{
                            $subscriber_email = $csvdata[$data["subscriber_contact"]];
                            $subscriber_name = $csvdata[$data["subscriber_name"]];
                            $subscriber_surname = $csvdata[$data["subscriber_surname"]];
                            if ($subscriberString == ""){
                        	   $subscriberString = $subscriber_name . "|" . $subscriber_surname . "|" . $subscriber_email;
                        	}else{
                        	    $subscriberString .= ";" . $subscriber_name . "|" . $subscriber_surname . "|" . $subscriber_email;
                        	}
                            $batch->post("op" . $count, "lists/" . $list["mailchimp_id"] . "/members", [
                                'email_address' => $subscriber_email,
                                'status'        => 'subscribed',
                                'merge_fields'  => [
                                    'FNAME' => $subscriber_name,
                                    'LNAME' => $subscriber_surname
                                ]
                            ]);
                            $count++;
                        }
                        $row++;
                    }
                    fclose($handle);
                }
                $result = $batch->execute();
        	}
    	}else{
    	    $settings = GeneralDB::getSettings();
    	    if ($list["mailchimp_id"] != "" && $settings["mailchimp_key"] != "" && $list["list_type"] == 0){
        	    $MailChimp = new MailChimp($settings["mailchimp_key"]);
                $batch = $MailChimp->new_batch();
                $count = 0;
                $handle = fopen($_SESSION["csv"], 'r');
                $response = array();
                $subscriberString = "";
                if($handle !== FALSE) {
                    $row = 0;
                    $columns = array();
                    $rows = array();
                    while(($csvdata = fgetcsv($handle, 1000, ',')) !== FALSE) {
                        if ($row == 0){
                            $row++;
                            continue;
                        }else{
                            $subscriber_email = $csvdata[$data["subscriber_contact"]];
                            $subscriber_name = $csvdata[$data["subscriber_name"]];
                            $subscriber_surname = $csvdata[$data["subscriber_surname"]];
                            if ($subscriberString == ""){
                        	   $subscriberString = $subscriber_name . "|" . $subscriber_surname . "|" . $subscriber_email;
                        	}else{
                        	    $subscriberString .= ";" . $subscriber_name . "|" . $subscriber_surname . "|" . $subscriber_email;
                        	}
                            $batch->post("op" . $count, "lists/" . $list["mailchimp_id"] . "/members", [
                                'email_address' => $subscriber_email,
                                'status'        => 'subscribed',
                                'merge_fields'  => [
                                    'FNAME' => $subscriber_name,
                                    'LNAME' => $subscriber_surname
                                ]
                            ]);
                            $count++;
                        }
                        $row++;
                    }
                    fclose($handle);
                }
                $result = $batch->execute();
        	}
    	}
    	if ($list["list_type"] == 1){ //SMS list
    	        $handle = fopen($_SESSION["csv"], 'r');
                $response = array();
                $subscriberString = "";
                if($handle !== FALSE) {
                    $row = 0;
                    $columns = array();
                    $rows = array();
                    while(($csvdata = fgetcsv($handle, 1000, ',')) !== FALSE) {
                        if ($row == 0){
                            $row++;
                            continue;
                        }else{
                            $subscriber_email = $csvdata[$data["subscriber_contact"]];
                            $subscriber_name = $csvdata[$data["subscriber_name"]];
                            $subscriber_surname = $csvdata[$data["subscriber_surname"]];
                            if ($subscriberString == ""){
                        	   $subscriberString = $subscriber_name . "|" . $subscriber_surname . "|" . $subscriber_email;
                        	}else{
                        	    $subscriberString .= ";" . $subscriber_name . "|" . $subscriber_surname . "|" . $subscriber_email;
                        	}
                            
                        }
                        $row++;
                    }
                    fclose($handle);
                }
    	}
        CampaignDB::updateSubscriberList($list_id, $subscriberString);
	}
	
	public static function addSubscriberToList(){
	    $data = $_POST;
	    $list_id = $data["list_id"];
	    $list = CampaignDB::getListByID($list_id);
	    $subscriberString = $list["subscribers"];
	    $workgroup_id = $list["workgroup_id"];
	    if ($workgroup_id != null){
    	    $workgroup = WorkgroupDB::getWorkgroupByID($workgroup_id);
        	if ($list["mailchimp_id"] != "" && $workgroup["mailchimp_key"] != "" && $list["list_type"] == 0){
        	    $MailChimp = new MailChimp($workgroup["mailchimp_key"]);
                $MailChimp->post("lists/" . $list["mailchimp_id"] . "/members", [
                        'email_address' => $data["subscriber_contact"],
                        'status'        => 'subscribed',
                        'merge_fields'  => [
                            'FNAME' => $data["subscriber_name"],
                            'LNAME' => $data["subscriber_surname"]
                        ]
                ]);
        	}
    	}else{
    	    $settings = GeneralDB::getSettings();
        	if ($list["mailchimp_id"] != "" && $settings["mailchimp_key"] != "" && $list["list_type"] == 0){
        	    $MailChimp = new MailChimp($settings["mailchimp_key"]);
                $MailChimp->post("lists/" . $list["mailchimp_id"] . "/members", [
                        'email_address' => $data["subscriber_contact"],
                        'status'        => 'subscribed',
                        'merge_fields'  => [
                            'FNAME' => $data["subscriber_name"],
                            'LNAME' => $data["subscriber_surname"]
                        ]
                ]);
        	}
    	}
        if ($subscriberString == ""){
            $subscriberString = $data["subscriber_name"] . "|" . $data["subscriber_surname"] . "|" . $data["subscriber_contact"];
        }else{
        	$subscriberString .= ";" . $data["subscriber_name"] . "|" . $data["subscriber_surname"] . "|" . $data["subscriber_contact"];
        }
        CampaignDB::updateSubscriberList($list_id, $subscriberString);
	}
	
	public static function removeSubscribersFromList(){
	    $data = $_POST;
	    $list = CampaignDB::getListByID($data["list_id"]);
	    $list_id = $data["list_id"];
	    $subscribers = $data["unsubscribed_list"];
	    $remainingSubs = $data["subscribed_list"];
	    $workgroup_id = $list["workgroup_id"];
	    if ($workgroup_id != null){
    	    $workgroup = WorkgroupDB::getWorkgroupByID($workgroup_id);
        	if ($list["mailchimp_id"] != "" && $workgroup["mailchimp_key"] != "" && $list["list_type"] == 0){
        	    $MailChimp = new MailChimp($workgroup["mailchimp_key"]);
        	    $batch = $MailChimp->new_batch();
                $count = 0;
                foreach ($subscribers as $subscriber){
                    $subscriber_email = strtolower($subscriber["subscriber_contact"]);
                    $md5mail = $MailChimp->subscriberHash($subscriber_email);
                    $batch->delete("op" . $count, "lists/" . $list["mailchimp_id"] . "/members/" . $md5mail , []);
                    $count++;
                }
                $result = $batch->execute();
        	}
    	}else{
    	    $settings = GeneralDB::getSettings();
    	    if ($list["mailchimp_id"] != "" && $settings["mailchimp_key"] != "" && $list["list_type"] == 0){
        	    $MailChimp = new MailChimp($settings["mailchimp_key"]);
        	    $batch = $MailChimp->new_batch();
                $count = 0;
                foreach ($subscribers as $subscriber){
                    $subscriber_email = strtolower($subscriber["subscriber_contact"]);
                    $md5mail = $MailChimp->subscriberHash($subscriber_email);
                    $batch->delete("op" . $count, "lists/" . $list["mailchimp_id"] . "/members/" . $md5mail , []);
                    $count++;
                }
                $result = $batch->execute();
        	}
    	}
    	$subscriberString = "";
    	if (is_array($remainingSubs)){
        	foreach ($remainingSubs as $rSub){
                if ($subscriberString == ""){
                    $subscriberString = $rSub["subscriber_name"] . "|" . $rSub["subscriber_surname"] . "|" . $rSub["subscriber_contact"];
                }else{
                	$subscriberString .= ";" . $rSub["subscriber_name"] . "|" . $rSub["subscriber_surname"] . "|" . $rSub["subscriber_contact"];
                }
        	}
    	}
        CampaignDB::updateSubscriberList($list_id, $subscriberString);
	}
    
    public static function deleteSubscriberList(){
		$data = $_POST;
		
		$list = CampaignDB::getListByID($data["list_id"]);
		
		$mailchimp_id = $list["mailchimp_id"];
		if ($mailchimp_id != ""){
		    if ($list["workgroup_id"] != NULL){
		        $workgroup = WorkgroupDB::getWorkgroupByID($list["workgroup_id"]);
		        if ($workgroup["mailchimp_key"] != ""){
    		    	$MailChimp = new MailChimp($workgroup["mailchimp_key"]);
    			    $result = $MailChimp->delete("lists/" . $mailchimp_id, []);
		        }
		    }else{
		        $settings = GeneralDB::getSettings();
		        if ($settings["mailchimp_key"] != ""){
		            $MailChimp = new MailChimp($settings["mailchimp_key"]);
			        $result = $MailChimp->delete("lists/" . $mailchimp_id, []);  
		        }
		    }
		}

		CampaignDB::deleteSubscriberList($data["list_id"]);
	}
	
	
}

?>