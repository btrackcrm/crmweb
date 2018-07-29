<?php
require_once 'vendor/autoload.php';
require_once("Model/UserDB.php");
require_once("Model/EventDB.php");
require_once("Model/WorkgroupDB.php");
require_once("Model/GeneralDB.php");
require_once("Model/TrackingDB.php");
require_once("Model/WorkOrderDB.php");
require_once("ViewHelper.php");
require_once('libs/GoogleAuthenticator/GoogleAuthenticator.php');
require_once('libs/PHPMailer/src/Exception.php');
require_once('libs/PHPMailer/src/PHPMailer.php');
require_once('libs/PHPMailer/src/SMTP.php');
require_once("Controller/gcm.php");
require_once("Controller/push.php");
require_once("Controller/imap.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

use \jamesiarmes\PhpEws\Client;
use \jamesiarmes\PhpEws\Request\FindFolderType;
use \jamesiarmes\PhpEws\ArrayType\NonEmptyArrayOfBaseFolderIdsType;
use \jamesiarmes\PhpEws\Enumeration\ContainmentComparisonType;
use \jamesiarmes\PhpEws\Enumeration\ContainmentModeType;
use \jamesiarmes\PhpEws\Enumeration\DefaultShapeNamesType;
use \jamesiarmes\PhpEws\Enumeration\DistinguishedFolderIdNameType;
use \jamesiarmes\PhpEws\Enumeration\FolderQueryTraversalType;
use \jamesiarmes\PhpEws\Enumeration\ResponseClassType;
use \jamesiarmes\PhpEws\Enumeration\UnindexedFieldURIType;
use \jamesiarmes\PhpEws\Type\ConstantValueType;
use \jamesiarmes\PhpEws\Type\DistinguishedFolderIdType;
use \jamesiarmes\PhpEws\Type\FolderResponseShapeType;
use \jamesiarmes\PhpEws\Type\PathToUnindexedFieldType;
use \jamesiarmes\PhpEws\Type\RestrictionType;

class UserController {
	
	public static function setNotificationSettings(){
		$data = $_POST;
		UserDB::setNotificationSettings($_SESSION["id"], $data["employee_mailing"], $data["employee_sms"], $data["event_notifications"], $data["ticketing_notifications"], $data["workorder_notifications"], $data["workgroup_notifications"]);
	}
	
	public static function viewSLAReports(){
		$ticketemployees = UserDB::getEmployeesWithTickets();
		$workorderemployees = UserDB::getEmployeesWithWorkorders();
		$ticketCounts = array();
		$ticketResponses = array();
		$workorderCounts = array();
		$workorderResponses = array();
		foreach ($ticketemployees as $emp){
			$count = UserDB::getEmployeeTicketCount($emp["employee_id"]);
			$response = UserDB::getEmployeeTicketAvgResponseTime($emp["employee_id"]);
			array_push($ticketCounts, $count);
			if ($response["resolution_time"] != null){
				array_push($ticketResponses, $response);
			}
		}
		foreach ($workorderemployees as $emp){
			$count = UserDB::getEmployeeWorkorderCount($emp["employee_id"]);
			$response = UserDB::getEmployeeWorkorderAvgResponseTime($emp["employee_id"]);
			array_push($workorderCounts, $count);
			if ($response["resolution_time"] != null){
				array_push($workorderResponses, $response);
			}
		}
		ViewHelper::render("View/reports.php", ["ticket_count" => $ticketCounts, "workorder_count" => $workorderCounts, "ticket_response_times" => $ticketResponses, "workorder_response_times" => $workorderResponses]);
	}
	
	public static function getEmployeeTicketSLA(){
		$data = $_POST;
		
		$response = array();
		$employee = UserDB::getEmployeeByID($data["employee_id"]);
		$alltickets = UserDB::getEmployeeTickets($data["employee_id"]);
		$tickets_by_date = UserDB::getEmployeeTicketsByDate($data["employee_id"]);
		$tickets_by_type = UserDB::getEmployeeTicketsByType($data["employee_id"]);
		$tickets_by_customer = UserDB::getEmployeeTicketsByCustomer($data["employee_id"]);
		$ticket_resolution_times = UserDB::getEmployeeTicketResolutionTimesByPriority($data["employee_id"]);
		
		$response["employee_sla"] = $employee["ticketing_sla"];
		$response["tickets"] = $alltickets;
		$response["tickets_by_date"] = $tickets_by_date;
		$response["tickets_by_type"] = $tickets_by_type;
		$response["tickets_by_customer"] = $tickets_by_customer;
		$response["ticket_resolution_times"] = $ticket_resolution_times;
		
		echo json_encode($response);
	}
	
	public static function getEmployeeWorkorderSLA(){
		$data = $_POST;
		
		$response = array();
		$employee = UserDB::getEmployeeByID($data["employee_id"]);
		$allworkorders = UserDB::getEmployeeWorkOrders($data["employee_id"]);
		$workorders_by_date = UserDB::getEmployeeWorkordersByDate($data["employee_id"]);
		$workorders_by_customer = UserDB::getEmployeeWorkordersByCustomer($data["employee_id"]);
		$workorder_resolution_times = UserDB::getEmployeeWorkorderResolutionTimesByPriority($data["employee_id"]);
		
		$response["employee_sla"] = $employee["workorder_sla"];
		$response["workorders"] = $allworkorders;
		$response["workorders_by_date"] = $workorders_by_date;
		$response["workorders_by_customer"] = $workorders_by_customer;
		$response["workorder_resolution_times"] = $workorder_resolution_times;
		
		echo json_encode($response);
	}
	
	public static function setEmployeeSLA(){
		$data = $_POST;
		
		UserDB::setEmployeeSLA($data["employee_id"], $data["ticketing_sla"], $data["workorder_sla"], $data["workgroup_sla"], $data["calls_sla"]);
	}
	
	public static function setupIMAP(){
		$data = $_POST;
		
        $ssl = "";
        if ($data["imap_ssl"] == 1 && $data["imap_certificate"] == 1) {
            $ssl = "ssl/validate-cert";
        }
        else if ($data["imap_ssl"] == 1) {
            $ssl = "ssl/novalidate-cert";
        }
        /* connect to server */
        $hostname = "{" . $data["imap_host"] . ":" . $data["imap_port"] . "/imap/" . $ssl . "}";
        $username = $data["imap_username"];
        $password = $data["imap_password"];
		
		imap_open($hostname, $username, $password) or die('Cannot connect to mailbox: ' . imap_last_error());
		
		UserDB::setupIMAP($data["imap_host"], $data["imap_port"], $data["imap_outboundport"], $data["imap_username"], $data["imap_password"], $data["imap_ssl"], $data["imap_certificate"]);
		
		echo "OK";
	}
	
	public static function setupExchange(){
		$data = $_POST;
		
		$domain = $data['exchange_host'];
		$user = $data['exchange_username'];
		$password = $data['exchange_password'];
		$version = Client::VERSION_2010_SP2;

		$client = new Client($domain, $user, $password, $version);
		
		$request = new FindFolderType();
        $request->FolderShape = new FolderResponseShapeType();
        $request
            ->FolderShape->BaseShape = DefaultShapeNamesType::ALL_PROPERTIES;
        $request->ParentFolderIds = new NonEmptyArrayOfBaseFolderIdsType();
        // Search recursively.
        $request->Traversal = FolderQueryTraversalType::DEEP;
        // Search within the root folder. Combined with the traversal set above, this
        // should search through all folders in the user's mailbox.
        $parent = new DistinguishedFolderIdType();
        $parent->Id = DistinguishedFolderIdNameType::ROOT;
        $request
            ->ParentFolderIds
            ->DistinguishedFolderId[] = $parent;
        $response = $client->FindFolder($request);
        // Iterate over the results, printing any error messages or folder names and
        // ids.
        $response_messages = $response
            ->ResponseMessages->FindFolderResponseMessage;
        foreach ($response_messages as $response_message) {
            // Make sure the request succeeded.
            if ($response_message->ResponseClass != ResponseClassType::SUCCESS) {
                echo "Entered credentials are not valid, please try again.";
                break;
            }else{
				echo "OK";
				UserDB::setupExchange($domain, $user, $password);
				break;
			}
        }
	}
	
	public static function setEmployeeTelephonyEmail(){
		$data = $_POST;
		UserDB::setEmployeeTelephonyEmail($_SESSION["id"], $data["telephony_email"]);
	}
	
	public static function disconnectExchange(){
		UserDB::setupExchange(null, null, null);
	}
	
	public static function disconnectOffice365(){
		UserDB::saveOffice365Token($_SESSION["id"], "", "", "");
	}
	
	public static function disconnectIMAP(){
		UserDB::setupIMAP("", 0, 0, "", "", 0, 0);
	}
	
	public static function getCalendarEvents(){
		$data = $_POST;
		$response = array();
		
		$events = EventDB::getEventsDate($_SESSION["id"], $data["date"]);
		
		echo json_encode($events);
	}
	
	public static function getTodoList(){
		$response = array();
		$todolist = UserDB::getTodoList($_SESSION["id"]);
		echo json_encode($todolist);
	}
	
	public static function addTodoEntry(){
		$data = $_POST;
		UserDB::addTodoEntry($_SESSION["id"], $data["title"], $data["description"]);
	}
	
	public static function removeTodoEntry(){
		$data = $_POST;
		UserDB::removeTodoEntry($data["todo_id"]);
	}
    
	public static function setTodoStatus(){
		$data = $_POST;
		UserDB::setTodoStatus($data["todo_id"], $data["status"]);
	}
	
    public static function sendPushNotification(){
        $data = $_POST;
        $recipients = UserDB::getRecipients(implode(",", $data["recipients"]));
        foreach ($recipients as $recipient){
            $gcm = new GCM();
            $push = new Push();
                		  
            $sendingData = array();
            $sendingData['message'] = $data["message"];
            $sendingData['sentAt'] = round(microtime(true) * 1000);
                        
            $push->setTitle("Message");
            $push->setIsBackground(FALSE);
            $push->setFlag(1);
            $push->setData($sendingData);
                        
            $gcm->send($recipient['tracking_fcm_token'], $push->getPush());
        }
    }
    
    public static function getEmployeeFiles(){
          $data = $_POST;
          $dir = "Uploads/EmployeeFiles/Employee" . $data["employee_id"];
          $order = "a";
          $ext = array (
                "jpg", "gif", "jpeg", "png", "doc", "docx", "xls", "xlsx", "csv", "ppt", "pptx", "pdf", "tif", "ico", "gif87", "zip", "rar", "7z", "tar.gz"
          );
        
          $listDir = array(
                'id' => basename($dir),
                'text' => basename($dir),
                'type' => "default",
                'dirurl' => $dir,
                'children' => array(),
          );
        
          $files = array();
          $dirs = array();
        
          if($handler = opendir($dir)) {
             while (($sub = readdir($handler)) !== FALSE) {
                if ($sub != "." && $sub != "..") {
                   if(is_file($dir. "/" .$sub)) {
                        $extension = strtolower(pathinfo($dir . "/" . $sub, PATHINFO_EXTENSION));
                        if(in_array($extension, $ext)) {
                            $fileType = "file";
                                if ($extension == "jpg" || $extension == "gif" || $extension == "jpeg" || $extension == "png" || $extension == "ico" || $extension == "gif87" || $extension == "tif"){
                                    $fileType = "image";
                                 }else if ($extension == "pdf"){
                                     $fileType = "pdf";
                                 }else if ($extension == "doc" || $extension == "docx"){
                                     $fileType = "word";
                                 }else if ($extension == "xls" || $extension == "xlsx" || $extension == "csv"){
                                     $fileType = "excel";
                                 }else if ($extension == "ppt" || $extension == "pptx"){
                                     $fileType = "powerpoint";
                                 }else if ($extension == "zip" || $extension == "rar" || $extension == "7z" || $extension == "tar.gz"){
                                     $fileType = "archive";
                                 }
                            $files [] = array("dirurl" => $dir . "/" . $sub, "type" => $fileType, "text" => $sub);
                        }
                   } 
                   elseif (is_dir($dir."/".$sub)) {
                      $dirs [] = $dir. "/" . $sub;
                   }
                }
             }
             if($order === "a") {
               asort($dirs);
             } 
             else {
                arsort($dirs);
             }
        
             foreach($dirs as $d) {
                $listDir['children'][] = UserController::dir_to_jstree_array($d);
             }
        
             if($order === "a") {
                asort($files);
             } 
             else {
                arsort($files);
             }
        
             foreach($files as $file) {
                $listDir['children'][]= $file;
             }
        
             closedir($handler);
          }
          
          echo json_encode($listDir);
    }
    
    public static function dir_to_jstree_array($dir, $order = "a", $ext = array()) {      
          if(empty($ext)) {
             $ext = array (
                "jpg", "gif", "jpeg", "png", "doc", "docx", "xls", "xlsx", "csv", "ppt", "pptx", "pdf", "tif", "ico", "gif87", "zip", "rar", "7z", "tar.gz"
             );
          }
        
          $listDir = array(
                'id' => basename($dir),
                'text' => basename($dir),
                'type' => "default",
                'dirurl' => $dir,
                'children' => array(),
          );
        
          $files = array();
          $dirs = array();
        
          if($handler = opendir($dir)) {
             while (($sub = readdir($handler)) !== FALSE) {
                if ($sub != "." && $sub != "..") {
                   if(is_file($dir."/".$sub)) {
                      $extension = strtolower(pathinfo($dir."/".$sub, PATHINFO_EXTENSION));
                      if(in_array($extension, $ext)) {
                         $fileType = "file";
                         if ($extension == "jpg" || $extension == "gif" || $extension == "jpeg" || $extension == "png" || $extension == "ico" || $extension == "gif87" || $extension == "tif"){
                            $fileType = "image";
                         }else if ($extension == "pdf"){
                             $fileType = "pdf";
                         }else if ($extension == "doc" || $extension == "docx"){
                             $fileType = "word";
                         }else if ($extension == "xls" || $extension == "xlsx" || $extension == "csv"){
                             $fileType = "excel";
                         }else if ($extension == "ppt" || $extension == "pptx"){
                             $fileType = "powerpoint";
                         }else if ($extension == "zip" || $extension == "rar" || $extension == "7z" || $extension == "tar.gz"){
                             $fileType = "archive";
                         }
                         $files [] = array("dirurl" => $dir . "/" . $sub, "type" => $fileType, "text" => $sub);
                      }
                      
                   } 
                   elseif (is_dir($dir."/".$sub)) {
                      $dirs []= $dir . "/" . $sub;
                   }
                }
             }
             if($order === "a") {
               asort($dirs);
             } 
             else {
                arsort($dirs);
             }
        
             foreach($dirs as $d) {
                $listDir['children'][]= UserController::dir_to_jstree_array($d);
             }
        
             if($order === "a") {
                asort($files);
             } 
             else {
                arsort($files);
             }
        
             foreach($files as $file) {
                $listDir['children'][] = $file;
             }
        
             closedir($handler);
          }
          return $listDir;
    }
    
    public static function editProfileData(){
        $data = $_POST;
		$employee = UserDB::checkUserExists($data["employee_email"]);
		$exists = is_array($employee);
		if (($exists && $employee["employee_id"] == $data["employee_id"]) || !$exists){
			UserDB::editProfileData($data["employee_id"], $data["employee_name"], $data["employee_surname"], $data["employee_residence"], $data["latitude"], $data["longitude"], $data["employee_email"], $data["employee_work"], $data["employee_mobile"], $data["employee_position"], $data["employee_workfrom"], $data["employee_workto"]);
			$_SESSION["namesurname"] = $data["employee_name"] . " " . $data["employee_surname"];
			$_SESSION["position"] = $data["employee_position"];
		}else{
            echo "Employee with matching e-mail already exists.";
        }
	}
    
    public static function setEmployeeBusy(){
        $data = $_POST;
        UserDB::setEmployeeBusy($_SESSION["id"], $data["status"]);
    }
    
    public static function changePassword(){
        $data = $_POST;
		$employee = UserDB::getEmployeeByID($_SESSION["id"]);
		$user = GeneralDB::getUserInfo($employee["employee_email"]);
		if (password_verify($data["current_password"], $user["password"])){
			UserDB::changePassword($_SESSION["id"], password_hash($data["password"], PASSWORD_DEFAULT));
			session_destroy();
		}else{
			echo "The password you entered does not match your current password, please try again.";
		}
    }
    
    public static function editUserSettings(){
        $data = $_POST;
        UserDB::editUserSettings($_SESSION["id"], $data["language"], $data["date_format"], $data["time_format"]);
		
		$_SESSION["dateformat"] = $data["date_format"];
		$_SESSION["timeformat"] = $data["time_format"];
    }
    
    public static function getUserSettings(){
        $settings = UserDB::getUserSettings($_SESSION["id"]);
        echo json_encode($settings);
    }
    
    public static function set2FA(){
        $data = $_POST;
        $ga = new GoogleAuthenticator();
        $secret = "";
        if ($data["status"] == 1){ 
            $secret = $ga->createSecret();
        }
        UserDB::set2FAStatus($_SESSION["id"], $data["status"], $secret);
        $_SESSION["2fa_status"] = $data["status"];
    }
    
    public static function addDepartment(){
        $data = $_POST;
        $departments = UserDB::getDepartments();
        $exists = false;
        foreach ($departments as $depart){
            if (strtoupper($depart["department_name"]) == strtoupper($data["department_name"])){
                $exists = true;
            }
        }
        if ($exists){
           echo "Department with matching name already exists"; 
        }else{
            UserDB::addDepartment($data["department_name"]);
        }
    }
    
    public static function editDepartment(){
        $data = $_POST;
        UserDB::editDepartment($data["department_id"], $data["department_name"]);
    }
    
    public static function moveEmployeeToDepartment(){
        $data = $_POST;
        UserDB::moveEmployeeToDepartment($data["employee_id"], $data["department_id"]);
    }
    
    public static function uploadEmployeePicture(){
        $data = $_POST;
        $imageFolder = "assets/img/";
		reset ($_FILES);
  		$temp = current($_FILES);
  		if (is_uploaded_file($temp['tmp_name'])){
			list($width, $height) = getimagesize($temp['tmp_name']);
			if ($width > $height) {
				header("HTTP/1.0 500 Invalid extension.");
				echo "Image width must be smaller than its height";
        		return;
			}
  			if (!in_array(strtolower(pathinfo($temp['name'], PATHINFO_EXTENSION)), array("gif", "jpg", "png"))) {
        		header("HTTP/1.0 500 Invalid extension.");
				echo "Invalid file extension";
        		return;
    		}
    		$filetowrite = $imageFolder . $temp['name'];
			if (file_exists($filetowrite)){
				UserDB::setEmployeeProfilePicture($_SESSION["id"], $temp["name"]);
				echo json_encode(array('location' => $filetowrite));
			}else if (move_uploaded_file($temp['tmp_name'], $filetowrite)){
    			UserDB::setEmployeeProfilePicture($_SESSION["id"], $temp["name"]);
				echo json_encode(array('location' => $filetowrite));
			}
  		}else {
    			// Notify editor that the upload failed
    			header("HTTP/1.0 500 Server Error");
				echo "File upload failed.";
  		}
    }
    
    public static function importEmployees(){
        $settings = GeneralDB::getSettings();
        $handle = fopen($_SESSION["csv"], 'r');
        $response = array();
        if($handle !== FALSE) {
            $row = 0;
            $columns = array();
            $rows = array();
            while(($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
                if ($row == 0){
                    $row++;
                    continue;
                }else{
                    $workphone = "";
                    if ($_POST["employee_workphone"] != -1){
                        $workphone = $data[$_POST["employee_workphone"]];
                    }
                    $hashed_password = password_hash($data[$_POST["employee_password"]], PASSWORD_DEFAULT);
                    $user_id = UserDB::addUser(0, $data[$_POST["employee_name"]], $data[$_POST["employee_surname"]], $data[$_POST["employee_residence"]], "", "", $data[$_POST["employee_phone"]], $workphone, $_POST["employee_department"], "",
                            $data[$_POST["employee_email"]], 1, 0, $settings["worktime_from"], $settings["worktime_to"], $data[$_POST["employee_email"]], $hashed_password);
                    UserDB::addWebUser($user_id, 0, $data[$_POST["employee_email"]], $hashed_password, $settings["worktime_from"], $settings["worktime_to"]);
                }
                $row++;
            }
            fclose($handle);
        }
    }
    
    public static function deleteDepartment(){
        $data = $_POST;
        UserDB::deleteDepartment($data["department_id"]);
    }
    
    public static function getDepartments(){
        $departments = UserDB::getDepartments();
        echo json_encode($departments);
    }
    
    public static function getEmployeeTickets(){
        $data = $_POST;
        $response = array();
        $tickets = UserDB::getEmployeeTickets($data["employee_id"]);
        $today = UserDB::getEmployeeTicketsToday($data["employee_id"]);
        $stats = UserDB::getEmployeeTicketStats($data["employee_id"]);
        $response["tickets"] = $tickets;
        $response["today"] = $today;
        $response["stats"] = $stats;
        
        echo json_encode($response);
    }
    
    public static function getListOfUsers(){
        $settings = GeneralDB::getSettings();
        if ($settings["employees_showinactive"] == 1){
            $users = UserDB::getListOfUsers();
        }else{
            $users = UserDB::getListOfActiveUsers();
        }
        echo json_encode($users);
    }
	
	public static function getListOfAllUsers(){
		$settings = GeneralDB::getSettings();
        if ($settings["employees_showinactive"] == 1){
            $users = UserDB::getListOfAllUsers();
        }else{
            $users = UserDB::getListOfAllActiveUsers();
        }
        echo json_encode($users);
	}
    
    public static function addUser(){
        $data = $_POST;

        $employee = UserDB::checkUserExists($data["employee_email"]);
        $exists = is_array($employee);
        if (!$exists){
            $hashed_password = password_hash($data["password"], PASSWORD_DEFAULT);
            $user_id = UserDB::addUser($data["employee_type"], $data["employee_name"], $data["employee_surname"], $data["employee_residence"], $data["latitude"], $data["longitude"], $data["employee_mobile"], $data["employee_work"], $data["employee_department"], $data["employee_position"], $data["employee_email"], $data["employee_mailing"], $data["employee_sms"], $data["employee_workfrom"], $data["employee_workto"], $data["employee_email"], $hashed_password);
            $uploaddir = "Uploads/EmployeeFiles/Employee" . $user_id;
			UserDB::createEmployeeSettings($user_id);
            mkdir($uploaddir);
            UserDB::addWebUser($user_id, $data["employee_type"], $data["employee_email"], $hashed_password, $data["employee_workfrom"], $data["employee_workto"]);
            if(isset($_SERVER['HTTPS'])){
                $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
            }
            else{
                $protocol = 'http';
            }
            $loginURL = $protocol . "://" . $_SERVER['HTTP_HOST'] . "/" . BASE_URL;
            $emailBody = '<div style="background-color:#fff;margin:0 auto 0 auto;padding:30px 0 30px 0;color:#4f565d;font-size:13px;line-height:20px;font-family:\'Helvetica Neue\',Arial,sans-serif;text-align:left;">
                                        <center>
                                          <table style="width:550px;text-align:center">
                                            <tbody>
                                              <tr>
                                                <td style="padding:0 0 20px 0;border-bottom:1px solid #e9edee;">
                                                  <a href="https://www.netko.it" style="display:block; margin:0 auto;" target="_blank">
                                                    <img src="http://s8.btrack.io/assets/img/b-io.png" width="75" height="75" alt="bTrack logo" style="border: 0px;">
                                                  </a>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td colspan="2" style="padding:30px 0;">
                                                  <p style="color:#1d2227;line-height:28px;font-size:22px;margin:12px 10px 20px 10px;font-weight:400;">Hey ' . $data["employee_name"] . " " . $data["employee_surname"] . '</p>
                                                  <p style="margin:0 10px 10px 10px;padding:0;color:black;">Your bTrack account has been successfully created.</strong>.<br>Your account username is <strong>' . $data["employee_email"] . '</strong> and your account password is: <strong>' . $data["password"] . '</strong><br>You can access our webpage by clicking the button below.</p>
                                                  <a style="display: inline-block;background-color: #33B679;font-weight: bold;text-align: center;letter-spacing: .5px;position: relative;cursor: pointer;overflow: hidden;-webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;-webkit-tap-highlight-color: transparent;vertical-align: middle;z-index: 1;-webkit-transition: .3s ease-out;transition: .3s ease-out;text-decoration: none;color: #fff;text-align: center;-webkit-box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2);box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2);border: none;border-radius: 2px;height: 36px;line-height: 36px;padding: 0 2rem;text-transform: uppercase;" href="' . $loginURL . '" target="_blank">Login</a>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td colspan="2" style="padding:30px 0 0 0;border-top:1px solid #e9edee;color:#9b9fa5">
                                                  If you have any questions you can contact us at <a style="color:#666d74;text-decoration:none;" href="mailto:support@btrack.si" target="_blank">support@btrack.si</a>
                                                </td>
                                              </tr>
                                            </tbody>
                                          </table>
                                        </center>
                                      </div>';
            $mail = new PHPMailer(true);  // Passing `true` enables exceptions
            try {
                //Server settings
                $mail->SMTPDebug = 0;                                 // Enable verbose debug output
                        $mail->isSMTP();                                      // Set mailer to use SMTP
                        $mail->CharSet = 'UTF-8';
                        $mail->Host = 'mail.appdev.si';  // Specify main and backup SMTP servers
                        $mail->SMTPAuth = true;                               // Enable SMTP authentication
                        $mail->Username = 'notify@btrack.io';                 // SMTP username
                        $mail->Password = '12Tojegeslo#';                           // SMTP password
                        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
                        $mail->Port = 465;                                    // TCP port to connect to                    
                        //Recipients
                        $mail->setFrom('notify@btrack.io', 'notify@btrack.io');
                $mail->addAddress($data["employee_email"], $data["employee_email"]);     // Add a recipient
                
                //Content
                $mail->isHTML(true);// Set email format to HTML
                $mail->Subject = "bTrack account created";
                $mail->msgHTML($emailBody);
                
                $mail->send();
            } catch (Exception $e) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            }
        }else{
            echo "Employee with matching e-mail already exists.";
        }
        
    }
    
    public static function editUser(){
        $data = $_POST;
		
        $user = UserDB::getUserByUsername($data["username"]);
		$employee = UserDB::checkUserExists($data["employee_email"]);
		$exists = is_array($employee);
		if (($exists && $employee["employee_id"] == $data["employee_id"]) || !$exists){
			if ($data["password"] != ""){
				$hashed_password = password_hash($data["password"], PASSWORD_DEFAULT);
				UserDB::editUser($data["employee_id"], $data["employee_type"], $data["employee_name"], $data["employee_surname"], $data["employee_residence"], $data["latitude"], $data["longitude"], $data["employee_mobile"],  $data["employee_work"], $data["employee_department"], $data["employee_position"], $data["employee_email"], $data["employee_mailing"], $data["employee_sms"], $data["employee_workfrom"], $data["employee_workto"], $data["employee_email"], $hashed_password);
				UserDB::editWebUser($data["employee_id"], $data["employee_type"], $data["employee_email"], $hashed_password, $data["employee_workfrom"], $data["employee_workto"]);
			}else{
				UserDB::editUserNoPassword($data["employee_id"], $data["employee_type"], $data["employee_name"], $data["employee_surname"], $data["employee_residence"], $data["latitude"], $data["longitude"], $data["employee_mobile"],  $data["employee_work"], $data["employee_department"], $data["employee_position"], $data["employee_email"], $data["employee_mailing"], $data["employee_sms"], $data["employee_workfrom"], $data["employee_workto"], $data["username"]);
				UserDB::editWebUserNoPassword($data["employee_id"], $data["employee_type"], $data["employee_email"], $data["employee_workfrom"], $data["employee_workto"]);
			}
		}else{
            echo "Employee with matching e-mail already exists.";
        }
    }
    
    public static function setMailing(){
        $data = $_POST;
        UserDB::setMailing($data["employee_id"], $data["employee_mailing"]);
        $message = '<div style="background-color:#fff;margin:0 auto 0 auto;padding:30px 0 30px 0;color:#4f565d;font-size:13px;line-height:20px;font-family:\'Helvetica Neue\',Arial,sans-serif;text-align:left;">
                                <center>
                                  <table style="width:550px;text-align:center">
                                    <tbody>
                                      <tr>
                                        <td style="padding:0 0 20px 0;border-bottom:1px solid #e9edee;">
                                          <a href="https://www.netko.it" style="display:block; margin:0 auto;" target="_blank">
                                            <img src="http://s8.btrack.io/assets/img/b-io.png" width="75" height="75" alt="bTrack logo" style="border: 0px;">
                                          </a>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td colspan="2" style="padding:30px 0;">
                                          <p style="color:#1d2227;line-height:28px;font-size:22px;margin:12px 10px 20px 10px;font-weight:400;">Hey there ' . $_POST["username"] . '</p>
                                          <p style="margin:0 10px 10px 10px;padding:0;color:black;">We\'re just informing you that e-mail notifications for your account have been turned off.</p>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td colspan="2" style="padding:30px 0 0 0;border-top:1px solid #e9edee;color:#9b9fa5">
                                          If you have any questions you can contact us at <a style="color:#666d74;text-decoration:none;" href="mailto:support@btrack.si" target="_blank">support@btrack.si</a>
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </center>
                              </div>';
        if ($data["employee_mailing"] == 1){
            $message = '<div style="background-color:#fff;margin:0 auto 0 auto;padding:30px 0 30px 0;color:#4f565d;font-size:13px;line-height:20px;font-family:\'Helvetica Neue\',Arial,sans-serif;text-align:left;">
                                <center>
                                  <table style="width:550px;text-align:center">
                                    <tbody>
                                      <tr>
                                        <td style="padding:0 0 20px 0;border-bottom:1px solid #e9edee;">
                                          <a href="https://www.netko.it" style="display:block; margin:0 auto;" target="_blank">
                                            <img src="http://s8.btrack.io/assets/img/b-io.png" width="75" height="75" alt="bTrack logo" style="border: 0px;">
                                          </a>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td colspan="2" style="padding:30px 0;">
                                          <p style="color:#1d2227;line-height:28px;font-size:22px;margin:12px 10px 20px 10px;font-weight:400;">Hey there ' . $_POST["username"] . '</p>
                                          <p style="margin:0 10px 10px 10px;padding:0;color:black;">We\'re just informing you that e-mail notifications for your account have been turned on.</p>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td colspan="2" style="padding:30px 0 0 0;border-top:1px solid #e9edee;color:#9b9fa5">
                                          If you have any questions you can contact us at <a style="color:#666d74;text-decoration:none;" href="mailto:support@btrack.si" target="_blank">support@btrack.si</a>
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </center>
                              </div>';
        }
        
        $employee = UserDB::getEmployeeByID($data["employee_id"]);
        $mail = new PHPMailer(true);  // Passing `true` enables exceptions
        try {
            $mail->SMTPDebug = 0;                                 // Enable verbose debug output
                        $mail->isSMTP();                                      // Set mailer to use SMTP
                        $mail->CharSet = 'UTF-8';
                        $mail->Host = 'mail.appdev.si';  // Specify main and backup SMTP servers
                        $mail->SMTPAuth = true;                               // Enable SMTP authentication
                        $mail->Username = 'notify@btrack.io';                 // SMTP username
                        $mail->Password = '12Tojegeslo#';                           // SMTP password
                        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
                        $mail->Port = 465;                                    // TCP port to connect to                    
                        //Recipients
                        $mail->setFrom('notify@btrack.io', 'notify@btrack.io');
            $mail->addAddress($employee["employee_email"], $employee["employee_email"]);     // Add a recipient
            
            //Content
            $mail->isHTML(true);// Set email format to HTML
            $mail->Subject = "E-mail notification settings changed";
            $mail->msgHTML($message);
            
            $mail->send();
        } catch (Exception $e) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }
    }
    
    public static function setSMS(){
        $data = $_POST;
        UserDB::setSMS($data["employee_id"], $data["employee_sms"]);
        
        $message = '<div style="background-color:#fff;margin:0 auto 0 auto;padding:30px 0 30px 0;color:#4f565d;font-size:13px;line-height:20px;font-family:\'Helvetica Neue\',Arial,sans-serif;text-align:left;">
                                <center>
                                  <table style="width:550px;text-align:center">
                                    <tbody>
                                      <tr>
                                        <td style="padding:0 0 20px 0;border-bottom:1px solid #e9edee;">
                                          <a href="https://www.netko.it" style="display:block; margin:0 auto;" target="_blank">
                                            <img src="http://s8.btrack.io/assets/img/b-io.png" width="75" height="75" alt="bTrack logo" style="border: 0px;">
                                          </a>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td colspan="2" style="padding:30px 0;">
                                          <p style="color:#1d2227;line-height:28px;font-size:22px;margin:12px 10px 20px 10px;font-weight:400;">Hey there ' . $_POST["username"] . '</p>
                                          <p style="margin:0 10px 10px 10px;padding:0;color:black;">We\'re just informing you that SMS notifications for your account have been turned off.</p>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td colspan="2" style="padding:30px 0 0 0;border-top:1px solid #e9edee;color:#9b9fa5">
                                          If you have any questions you can contact us at <a style="color:#666d74;text-decoration:none;" href="mailto:support@btrack.si" target="_blank">support@btrack.si</a>
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </center>
                              </div>';
        if ($data["employee_sms"] == 1){
            $message = '<div style="background-color:#fff;margin:0 auto 0 auto;padding:30px 0 30px 0;color:#4f565d;font-size:13px;line-height:20px;font-family:\'Helvetica Neue\',Arial,sans-serif;text-align:left;">
                                <center>
                                  <table style="width:550px;text-align:center">
                                    <tbody>
                                      <tr>
                                        <td style="padding:0 0 20px 0;border-bottom:1px solid #e9edee;">
                                          <a href="https://www.netko.it" style="display:block; margin:0 auto;" target="_blank">
                                            <img src="http://s8.btrack.io/assets/img/b-io.png" width="75" height="75" alt="bTrack logo" style="border: 0px;">
                                          </a>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td colspan="2" style="padding:30px 0;">
                                          <p style="color:#1d2227;line-height:28px;font-size:22px;margin:12px 10px 20px 10px;font-weight:400;">Hey there ' . $_POST["username"] . '</p>
                                          <p style="margin:0 10px 10px 10px;padding:0;color:black;">We\'re just informing you that SMS notifications for your account have been turned on.</p>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td colspan="2" style="padding:30px 0 0 0;border-top:1px solid #e9edee;color:#9b9fa5">
                                          If you have any questions you can contact us at <a style="color:#666d74;text-decoration:none;" href="mailto:support@btrack.si" target="_blank">support@btrack.si</a>
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </center>
                              </div>';
        }
        
        $employee = UserDB::getEmployeeByID($data["employee_id"]);
        $mail = new PHPMailer(true);  // Passing `true` enables exceptions
        try {
            //Server settings
            $mail->SMTPDebug = 0;                                 // Enable verbose debug output
                        $mail->isSMTP();                                      // Set mailer to use SMTP
                        $mail->CharSet = 'UTF-8';
                        $mail->Host = 'mail.appdev.si';  // Specify main and backup SMTP servers
                        $mail->SMTPAuth = true;                               // Enable SMTP authentication
                        $mail->Username = 'notify@btrack.io';                 // SMTP username
                        $mail->Password = '12Tojegeslo#';                           // SMTP password
                        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
                        $mail->Port = 465;                                    // TCP port to connect to                    
                        //Recipients
                        $mail->setFrom('notify@btrack.io', 'notify@btrack.io');
            $mail->addAddress($employee["employee_email"], $employee["employee_email"]);     // Add a recipient
            
            //Content
            $mail->isHTML(true);// Set email format to HTML
            $mail->Subject = "SMS notification settings changed";
            $mail->msgHTML($message);
            
            $mail->send();
        } catch (Exception $e) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }
    }
    
    public static function getEmployeeLocations(){
        $employees = UserDB::getEmployeeLocations();
        echo json_encode($employees);
    }
    
    public static function getEmployeeLogs(){
        $logs = UserDB::getEmployeeLogsDate($_POST["employee_id"], $_POST["datetime"]);
        echo json_encode($logs);
    }
    
    public static function setEmployeeActivity(){
        $data = $_POST;
        UserDB::setEmployeeActivity($data["employee_id"], $data["employee_activity"]);
    }
    
    public static function getEmployeeUniqueLogsDates(){
        $data = $_POST;
        $dates = UserDB::getEmployeeUniqueLogsDates($data["employee_id"]);
        echo json_encode($dates);
    }
    
    public static function getEmployeeStats(){
        $data = $_POST;
        
        $employee = UserDB::getEmployeeByID($data["employee_id"]);
        $events = EventDB::getEventsDate($data["employee_id"], $data["datetime"]);
        $lastActivityLog = GeneralDB::getLastActivityLogs($data["employee_id"]);
        $stops = GeneralDB::getStopsDate($data["employee_id"], $data["datetime"]);
		
		
		if (date("Y-m-d") == date("Y-m-d", strtotime($data["datetime"]))){
			$distance = $employee["distance"];
		}else{
			$distance_log = GeneralDB::getTrackingDistance($data["employee_id"], $data["datetime"]);
			if (is_array($distance_log)){
				$distance = $distance_log["elapsed_distance"];
			}else{
				$distance = 0;
			}
		}
        
        $doneM = 0;
        $notDoneM = 0;
        
        
        foreach ($events as $event){
            if ($event["status"] == 3){
                $doneM ++;
            }
        }
        
        $response = array();
        $response["doneEvents"] = $doneM;
        $response["notDoneEvents"] = count($events);
        $response["stops"] = count($stops);
        $response["speed"] = $employee["speed"];
        $response["distance"] = $distance;
        $response["lastActivity"] = $lastActivityLog["datetime"];
        
        echo json_encode($response);
    }
    
    public static function getEmployeeBasicTrackingStats(){
        $data = $_POST;
        
        $employee = UserDB::getEmployeeByID($data["employee_id"]);
        $events = EventDB::getEventsDate($data["employee_id"], $data["datetime"]);
        $worklocations = TrackingDB::getEmployeeLogs($data["employee_id"], $data["datetime"]);
        
        $doneM = 0;
        $notDoneM = 0;
        
        $doneT = 0;
        $notDoneT = 0;
        
        foreach ($events as $event){
            if ($event["status"] == 3){
                $doneM ++;
            }
        }
        
        foreach ($tasks as $task){
            if ($task["status"] == 1){
                $doneT ++;
            }else{
                $notDoneT ++;
            }
        }
        
        $response = array();
        $response["doneEvents"] = $doneM;
        $response["notDoneEvents"] = count($events);
        $response["doneTasks"] = $doneT;
        $response["notDoneTasks"] = count($tasks);
        $response["worklocations"] = $worklocations;
        
        echo json_encode($response);
    }
    
    public static function getEmployeeStops(){
        $data = $_POST;
		$response = array();
        $stops = GeneralDB::getStopsDate($data["employee_id"], $data["datetime"]);
		$events = EventDB::getEventsDate($data["employee_id"], $data["datetime"]);
		
		$response["stops"] = $stops;
		$response["events"] = $events;
        
        echo json_encode($response);
    }
    
    public static function getEmployeeEvents(){
        $data = $_POST;
        $events = EventDB::getEventsDate($data["employee_id"], $data["datetime"]);
        
        echo json_encode($events);
    }
    
    public static function viewProfilePage(){
        $employee = UserDB::getEmployeeByID($_SESSION["id"]);
        $workgroups = WorkgroupDB::getEmployeeWorkgroups($_SESSION["id"]);
        $events = EventDB::getEmployeeEvents($_SESSION["id"]);
		$calls = TelephonyDB::getEmployeeCalls($_SESSION["id"]);
		$tickets = UserDB::getEmployeeTickets($_SESSION["id"]);
		$workorders = WorkOrderDB::getEmployeeWorkOrders($_SESSION["id"]);
		$travelorders = TravelOrderDB::getEmployeeTravelOrders($_SESSION["id"]);
		$allemployees = UserDB::getListOfUsers();
        $disk_free = array();
        $disk_used_bytes = foldersize("Uploads/EmployeeFiles/Employee" . $_SESSION["id"]);
        $disk_used = formatSize($disk_used_bytes);
        $disk_free["disk_bytes"] = $disk_used_bytes;
        $disk_free["disk_used"] = $disk_used;
        ViewHelper::render("View/profile.php", ["employee" => $employee, "workgroups" => $workgroups, "events" => $events, "tickets" => $tickets, "calls" => $calls, "employees" => $allemployees, "workorders" => $workorders, "travelorders" => $travelorders, "disk_free" => $disk_free]); 
    }
    
    public static function viewEmployeePage(){
        $data = $_GET;
        
        $employee = UserDB::getEmployeeByID($data["employee_id"]);
        $workgroups = WorkgroupDB::getEmployeeWorkgroups($data["employee_id"]);
        $events = EventDB::getEmployeeEvents($data["employee_id"]);
		$calls = TelephonyDB::getEmployeeCalls($data["employee_id"]);
		$tickets = UserDB::getEmployeeTickets($data["employee_id"]);
		$workorders = WorkOrderDB::getEmployeeWorkOrders($data["employee_id"]);
		$travelorders = TravelOrderDB::getEmployeeTravelOrders($data["employee_id"]);
		$allemployees = UserDB::getListOfUsers();
        $disk_free = array();
        $disk_used_bytes = foldersize("Uploads/EmployeeFiles/Employee" . $data["employee_id"]);
        $disk_used = formatSize($disk_used_bytes);
        $disk_free["disk_bytes"] = $disk_used_bytes;
        $disk_free["disk_used"] = $disk_used;
        ViewHelper::render("View/employee_page.php", ["employee" => $employee, "workgroups" => $workgroups, "tasks" => $tasks, "tickets" => $tickets, "calls" => $calls, "workorders" => $workorders, "travelorders" => $travelorders, "events" => $events, "employees" => $allemployees, "disk_free" => $disk_free]); 
    }
    
    
}
