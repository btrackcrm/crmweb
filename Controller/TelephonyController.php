<?php
require_once ("Model/TelephonyDB.php");
require_once ("Model/UserDB.php");
require_once ("Model/GeneralDB.php");
require_once ("Model/CustomerDB.php");
require_once ("Model/WorkOrderDB.php");
require_once ("ViewHelper.php");
require_once ('libs/PHPMailer/src/Exception.php');
require_once ('libs/PHPMailer/src/PHPMailer.php');
require_once ('libs/PHPMailer/src/SMTP.php');
require_once ("Controller/gcm.php");
require_once ("Controller/push.php");
require_once ("Controller/imap.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class TelephonyController {
	
	public static function getAgentStatuses(){
		$ch = curl_init('http://93.103.159.8/ast14menu/amiagentlist.php');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Accept: application/json'
        ));

        $result = curl_exec($ch);
		curl_close($ch);
		echo $result;
	}
	
	public static function getQueueStatuses(){
		$ch = curl_init('http://93.103.159.8/ast14menu/queuestatistics.php');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Accept: application/json'
        ));

        $result = curl_exec($ch);
		curl_close($ch);
		echo $result;
	}

    public static function uploadTicketFile() {
        $response = array();
        $ext = array(
            "jpg",
            "gif",
            "jpeg",
            "png",
            "doc",
            "docx",
            "xls",
            "xlsx",
            "csv",
            "ppt",
            "pptx",
            "pdf",
            "tif",
            "ico",
            "gif87",
            "zip",
            "rar",
            "7z"
        );
        $target_dir = "Uploads/OtherFiles/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        $extension = strtolower(pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION));
        $uploadOk = 1;

        // Check if file already exist
        // Check file size
        if (!in_array($extension, $ext)) {
            $response["message"] = "This extension is not allowed for upload";
            $uploadOk = 0;
        }
        else if ($_FILES["file"]["size"] > 50000000) {
            $uploadOk = 0;
            $response["message"] = "File too large";
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $response["error"] = true;
            echo json_encode($response);
        }
        else {
            if (file_exists($target_file)) {
                $response["error"] = false;
                $response["filename"] = $_FILES["file"]["name"];
                echo json_encode($response);
            }
            else {
                if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                    $response["error"] = false;
                    $response["filename"] = $_FILES["file"]["name"];
                    echo json_encode($response);
                }
                else {
                    $response["error"] = true;
                    $response["message"] = "Could not move file to directory";
                    echo json_encode($response);
                }
            }
        }
    }

    public static function getEmployeeCalls() {
        $data = $_POST;
        $calls = TelephonyDB::getEmployeeCalls($data["employee_id"]);

        echo json_encode($calls);
    }

    public static function getTicketCategories() {
        $categories = TelephonyDB::getTicketCategories();

        echo json_encode($categories);
    }

    public static function addTicketCategory() {
        $data = $_POST;
        TelephonyDB::addTicketCategory($data["category_name"]);
    }

    public static function editTicketCategory() {
        $data = $_POST;
        TelephonyDB::editTicketCategory($data["category_id"], $data["category_name"]);
    }

    public static function deleteTicketCategory() {
        $data = $_POST;
        TelephonyDB::deleteTicketCategory($data["category_id"]);
    }

    public static function toggleEmailStarred() {
        $data = $_POST;
        $usersettings = TelephonyDB::getUserSettings($_SESSION["id"]);
        $mailID = $data["mail_id"];
        $starred = $data["starred"];
        if ($usersettings["telephony_emailhost"] != "") {
            $ssl = "";
            if ($usersettings["telephony_ssl"] == 1 && $usersettings["telephony_certificate"] == 1) {
                $ssl = "ssl/validate-cert";
            }
            else if ($usersettings["telephony_ssl"] == 1) {
                $ssl = "ssl/novalidate-cert";
            }
            /* connect to server */
            $hostname = "{" . $usersettings["telephony_emailhost"] . ":" . $usersettings["telephony_emailport"] . "/imap/" . $ssl . "}INBOX";
            $mailbox = new Mailbox($hostname, $usersettings["telephony_email"], $usersettings["telephony_password"], "Uploads/EmailAttachments");
        }else {
            return;
        }
        $mailbox = new Mailbox($hostname, $usersettings["telephony_email"], $usersettings["telephony_password"], "Uploads/EmailAttachments");
        if ($starred == 1) {
            $mailbox->markMailAsImportant($mailID);
        }
        else {
            $mailbox->markMailAsUnimportant($mailID);
        }

        $mailbox->disconnect();
    }

    public static function deleteEmail() {
        $data = $_POST;
        $usersettings = TelephonyDB::getUserSettings($_SESSION["id"]);

        if ($usersettings["telephony_emailhost"] != "") {
            $ssl = "";
            if ($usersettings["telephony_ssl"] == 1 && $usersettings["telephony_certificate"] == 1) {
                $ssl = "ssl/validate-cert";
            }
            else if ($usersettings["telephony_ssl"] == 1) {
                $ssl = "ssl/novalidate-cert";
            }
            /* connect to server */
            $hostname = "{" . $usersettings["telephony_emailhost"] . ":" . $usersettings["telephony_emailport"] . "/imap/" . $ssl . "}INBOX";
            $mailbox = new Mailbox($hostname, $usersettings["telephony_email"], $usersettings["telephony_password"], "Uploads/EmailAttachments");
        }else {
            return;
        }

        $mailbox->deleteMail($data["mail_id"]);

        $mailbox->disconnect();
    }

    public static function markTicketAsOpened() {
        $data = $_POST;
        TelephonyDB::markTicketAsOpened($data["ticket_id"]);
    }

    public static function showTicketPage() {
        $data = $_GET;

        $ticket = TelephonyDB::getTicketByID($data["ticket_id"]);
        $customer = CustomerDB::getCustomerByID($ticket["customer_id"]);
        $employee = UserDB::getEmployeeByID($ticket["employee_id"]);
        $assigned_to = UserDB::getParticipants($ticket["assigned_to"]);
        $actions = TelephonyDB::getTicketActions($data["ticket_id"]);
		$files = TelephonyDB::getTicketFiles($ticket["ticket_id"]);
		$settings = GeneralDB::getSettings();

        if ($ticket["opened_on"] == "") {
            TelephonyDB::markTicketAsOpened($data["ticket_id"]);
        }

        ViewHelper::render("View/ticket_page.php", ["ticket" => $ticket, "customer" => $customer, "employee" => $employee, "assigned_to" => $assigned_to, "actions" => $actions, "files" => $files, "settings" => $settings]);
    }

    public static function showTicketingDashboard() {
        $settings = GeneralDB::getSettings();
        $usersettings = TelephonyDB::getUserSettings($_SESSION["id"]);
		$employee = UserDB::getEmployeeByID($_SESSION["id"]);
        ViewHelper::render("View/ticketing_dashboard.php", ["settings" => $settings, "employee" => $employee, "usersettings" => $usersettings]);
    }

    public static function updateTicketStatus() {
        $data = $_POST;
        TelephonyDB::updateTicketStatus($data["ticket_id"], $data["ticket_status"]);

        if ($data["ticket_status"] == 4) {
            $description = "Ticket marked as canceled";
        }
        else {
            $description = "Ticket marked as finished.";
            TelephonyDB::markTicketAsFinished($data["ticket_id"]);
        }
        TelephonyDB::addTicketAction($data["ticket_id"], $_SESSION["id"], $description, 0);
    }

    public static function addTicketNote() {
        $data = $_POST;

        $response = array();

        $action_id = TelephonyDB::addTicketAction($data["ticket_id"], $_SESSION["id"], $data["description"], 1);
        if ($action_id != null) {
            $response["error"] = false;
            $response["action"] = TelephonyDB::getTicketActionByID($action_id);
        }
        else {
            $response["error"] = true;
            $response["message"] = "Insert failed";
        }

        echo json_encode($response);
    }

    public static function getTickets() {
        $tickets = TelephonyDB::getTickets();
        echo json_encode($tickets);
    }

    public static function getTodaysTickets() {
        $tickets = TelephonyDB::getTodaysTickets();
        echo json_encode($tickets);
    }

    public static function getTicketsLastWeek() {
        $tickets = TelephonyDB::getTicketsLastWeek();
        echo json_encode($tickets);
    }

    public static function addTicket() {
        $data = $_POST;
        $files = explode(",", $data["files"]);
        $fileString = implode(";", $files);
        $assigned_to = implode(",", $data["assign_to"]);
        $call_id = $data["call_id"];
        if ($call_id == "") {
            $call_id = null;
        }
        $email_id = $data["email_id"];
        if ($email_id == "") {
            $email_id = null;
        }
        $subsID = $data["subsidiary_id"];
        if ($data["subsidiary_id"] == "") {
            $subsID = null;
        }
        $lastTicketID = TelephonyDB::getLastTicketID();
        $lastTicketID++;
		$settings = GeneralDB::getSettings();
        $ticket_code = $settings["ticketing_prefix"] . "-" . $lastTicketID;
        $email_subject = "";
        $email_from = "";
        $email_body = "";
        $email_date = "";
        if ($email_id != null) {
            $email_subject = $data["email_subject"];
            $email_from = $data["email_from"];
            $email_body = $data["email_message"];
            $email_date = $data["email_date"];
        }
		
		$ticket_due_date = date("Y-m-d", strtotime($data["ticket_date"]));
		
        $ticket_id = TelephonyDB::addTicket($ticket_code, $call_id, $email_id, $data["ticket_subject"], $ticket_due_date, $data["customer_id"], $subsID, $_SESSION["id"], $assigned_to, $data["ticket_type"], $data["ticket_location"], $data["latitude"], $data["longitude"], $data["ticket_priority"], $data["ticket_notes"], $email_subject, $email_from, $email_body, $email_date, $fileString);
        TelephonyDB::addTicketAction($ticket_id, $_SESSION["id"], "Ticket created", 0);
		
		foreach ($files as $filename){
			$filePath = "Uploads/OtherFiles/" . $filename;
			GeneralDB::addFileUpload($_SESSION["id"], $data["customer_id"], null, null, $ticket_id, null, $filename, $filePath);
		}

        $employee = UserDB::getEmployeeByID($_SESSION["id"]);
        $participants = UserDB::getParticipants($assigned_to);

        foreach ($participants as $participant) {
			if ($participant["employee_online"] == 1) {
                $gcm = new GCM();
                $push = new Push();

                $sendingData = array();
				$sendingData["ticket_id"] = $data["ticket_id"];
                $sendingData['ticket_subject'] = $data["ticket_subject"];
                $sendingData["ticket_date"] = $ticket_due_date;
                $sendingData['sentAt'] = round(microtime(true) * 1000);

                $push->setTitle("Ticket");
                $push->setIsBackground(false);
                $push->setFlag(1);
                $push->setData($sendingData);

                $gcm->send($participant['fcm_token'], $push->getPush());
            }
            if ($participant["employee_mailing"] == 1 && $participant["ticketing_notifications"] == 1) {
                $mail = new PHPMailer(true); // Passing `true` enables exceptions
                try {
                    //Server settings
                    $mail->SMTPDebug = 0; // Enable verbose debug output
                    $mail->isSMTP(); // Set mailer to use SMTP
                    $mail->CharSet = 'UTF-8';
                    $mail->Host = 'mail.appdev.si'; // Specify main and backup SMTP servers
                    $mail->SMTPAuth = true; // Enable SMTP authentication
                    $mail->Username = 'notify@btrack.io'; // SMTP username
                    $mail->Password = '12Tojegeslo#'; // SMTP password
                    $mail->SMTPSecure = 'ssl'; // Enable TLS encryption, `ssl` also accepted
                    $mail->Port = 465; // TCP port to connect to
                    //Recipients
                    $mail->setFrom('notify@btrack.io', 'notify@btrack.io');
                    $mail->addAddress($participant["employee_email"], $participant["employee_email"]); // Add a recipient
                    //Content
                    $mail->isHTML(true); // Set email format to HTML
                    if (isset($_SERVER['HTTPS'])) {
                        $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
                    }
                    else {
                        $protocol = 'http';
                    }
                    $ticketURL = $protocol . "://" . $_SERVER['HTTP_HOST'] . "/" . BASE_URL . "ticketdetails?ticket_id=" . $ticket_id;
                    $emailBody = '<div style="background-color:#fff;margin:0 auto 0 auto;padding:30px 0 30px 0;color:#4f565d;font-size:13px;line-height:20px;font-family:\'Helvetica Neue\',Arial,sans-serif;text-align:left;">
													<center>
													  <table style="width:625px;text-align:center">
														<tbody>
														  <tr>
															<td style="padding:0 0 20px 0;border-bottom:1px solid #e9edee;">
															  <a href="https://www.netko.it" style="display:block; margin:0 auto;" target="_blank">
																<img src="https://main.btrackcore.com/Pictures/logo_long.png" width="150" alt="bTrack logo" style="border: 0px;">
															  </a>
															</td>
														  </tr>
														  <tr>
															<td colspan="2" style="padding:30px 0;">
															  <p style="color:#1d2227;line-height:28px;font-size:22px;margin:12px 10px 20px 10px;font-weight:400;">Hey ' . $participant["employee_name"] . " " . $participant["employee_surname"] . '</p>
															  <p style="margin:0 10px 10px 10px;padding:0;color:black;"><br>' . $employee["employee_name"] . " " . $employee["employee_surname"] . " has assigned you a ticket with the following subject <strong>" . $data["ticket_subject"] . '</strong>.<br>You can view the ticket by clicking the link below.</p>
															  <a style="display: inline-block;background-color: rgb(255, 82, 82);font-weight: bold;text-align: center;letter-spacing: .5px;position: relative;cursor: pointer;overflow: hidden;-webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;-webkit-tap-highlight-color: transparent;vertical-align: middle;z-index: 1;-webkit-transition: .3s ease-out;transition: .3s ease-out;text-decoration: none;color: #fff;text-align: center;-webkit-box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2);box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2);border: none;border-radius: 2px;height: 36px;line-height: 36px;padding: 0 2rem;text-transform: uppercase;" href="' . $ticketURL . '" target="_blank">VIEW TICKET</a>
															</td>
														  </tr>
														  <tr>
															<td colspan="2" style="padding:30px 0 0 0;border-top:1px solid #e9edee;color:#9b9fa5">
															  If you have any questions you can contact us at <a style="color:#666d74;text-decoration:none;" href="mailto:support@btrack.io" target="_blank">support@btrack.io</a>
															</td>
														  </tr>
														</tbody>
													  </table>
													</center>
												  </div>';

                    $mail->Subject = "Ticket " . $data["ticket_subject"] . " assigned.";
                    $mail->msgHTML($emailBody);

                    $mail->send();
                }
                catch(Exception $e) {
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                }
            }
        }
    }

    public static function editTicket() {
        $data = $_POST;

        $ticket = TelephonyDB::getTicketByID($data["ticket_id"]);

        $files = explode(",", $data["files"]);
        $fileString = "";
        $assigned_to = implode(",", $data["assign_to"]);
        $subsID = $data["subsidiary_id"];
        if ($data["subsidiary_id"] == "") {
            $subsID = null;
        }

        $curFiles = $ticket["ticket_files"];

        if (count($files) > 0) {
            $fileString = implode(";", $files);
            if ($fileString != "") {
                if ($curFiles == "") {
                    $curFiles = $fileString;
                }
                else {
                    $curFiles .= ";" . $fileString;
                }
            }
        }
		
		$ticket_due_date = date("Y-m-d", strtotime($data["ticket_date"]));
		
		$billing_from_date = $data["billing_fromdate"];
		if ($billing_from_date != ""){
			$billing_from_date = date("Y-m-d", strtotime($billing_from_date));
		}
		$billing_from_time = $data["billing_fromtime"];
		if ($billing_from_time != ""){
			$billing_from_time = date("H:i", strtotime($billing_from_time));
		}
		$billing_to_date = $data["billing_todate"];
		if ($billing_to_date != ""){
			$billing_to_date = date("Y-m-d", strtotime($billing_to_date));
		}
		$billing_to_time = $data["billing_totime"];
		if ($billing_to_time != ""){
			$billing_to_time = date("H:i", strtotime($billing_to_time));
		}

        TelephonyDB::editTicket($data["ticket_id"], $data["ticket_subject"], $ticket_due_date, $data["customer_id"], $subsID, $assigned_to, $data["ticket_type"], $data["ticket_location"], $data["latitude"], $data["longitude"], $data["ticket_priority"], $billing_from_date, $billing_from_time, $billing_to_date, $billing_to_time, $data["billing_notes"], $data["ticket_notes"], $data["ticket_status"], $curFiles);
		
		foreach ($files as $filename){
			$filePath = "Uploads/OtherFiles/" . $filename;
			GeneralDB::addFileUpload($_SESSION["id"], $data["customer_id"], null, null, $data["ticket_id"], null, $filename, $filePath);
		}
		
        $edited_fields = array();
        if ($ticket["ticket_subject"] != $data["ticket_subject"]) {
            array_push($edited_fields, "Subject changed to " . $data["ticket_subject"]);
        }
        if ($ticket["ticket_date"] != $ticket_due_date) {
            array_push($edited_fields, "Date changed to " . $ticket_due_date);
        }
        if ($ticket["customer_id"] != $data["customer_id"]) {
            $custname = CustomerDB::getCustomerByID($custID) ["customer_name"];
            array_push($edited_fields, "Customer changed to " . $custname);
        }
        if ($ticket["assigned_to"] != $assigned_to) {
            $newParticipants = UserDB::getParticipants($assigned_to);
            $pString = "";
            foreach ($newParticipants as $prc) {
                if ($pString == "") {
                    $pString = $prc["employee_name"] . " " . $prc["employee_surname"];
                }
                else {
                    $pString .= ", " . $prc["employee_name"] . " " . $prc["employee_surname"];
                }
            }
            array_push($edited_fields, "Assigned to changed to " . $pString);
        }
        if ($ticket["ticket_type"] != $data["ticket_type"]) {
            array_push($edited_fields, "Type changed to " . $data["ticket_type"]);
        }
        if ($ticket["ticket_location"] != $data["ticket_location"]) {
            array_push($edited_fields, "Location changed to " . $data["ticket_location"]);
        }
        if ($ticket["ticket_priority"] != $data["ticket_priority"]) {
            array_push($edited_fields, "Priority changed to " . $data["ticket_priority"]);
        }
        if ($ticket["ticket_status"] != $data["ticket_status"]) {
            $statusStr = "Pending";
            if ($data["ticket_status"] == 1) {
                $statusStr = "In progress";
            }
            else if ($data["ticket_status"] == 2) {
                $statusStr = "Finished";
                TelephonyDB::markTicketAsFinished($data["ticket_id"]);
            }
            else if ($data["ticket_status"] == 3) {
                $statusStr = "Approved";
				TelephonyDB::markTicketAsFinished($data["ticket_id"]);
            }
            else if ($data["ticket_status"] == 4) {
                $statusStr = "Canceled";
				TelephonyDB::markTicketAsFinished($data["ticket_id"]);
				if ($ticket["workorder_id"] != null){
					WorkOrderDB::updateWorkOrderStatus($ticket["workorder_id"], 3);
				}
            }
            array_push($edited_fields, "Status changed to " . $statusStr);
        }
        if ($ticket["ticket_notes"] != $data["ticket_notes"]) {
            array_push($edited_fields, "Notes changed to " . $data["ticket_notes"]);
        }

        $editedFieldsString = "Updated fields - " . implode(", ", $edited_fields);

        TelephonyDB::addTicketAction($data["ticket_id"], $_SESSION["id"], $editedFieldsString, 0);

        $participants = UserDB::getParticipants($assigned_to);

        foreach ($participants as $participant) {
			if ($participant["employee_online"] == 1) {
                $gcm = new GCM();
                $push = new Push();

                $sendingData = array();
				$sendingData["ticket_id"] = $data["ticket_id"];
                $sendingData['ticket_subject'] = $data["ticket_subject"];
                $sendingData["ticket_date"] = $ticket_due_date;
				$sendingData["ticket_status"] = $data["ticket_status"];
                $sendingData['sentAt'] = round(microtime(true) * 1000);

                $push->setTitle("TicketUpdate");
                $push->setIsBackground(false);
                $push->setFlag(1);
                $push->setData($sendingData);

                $gcm->send($participant['fcm_token'], $push->getPush());
            }
            if ($participant["employee_mailing"] == 1 && $participant["ticketing_notifications"] == 1) {
                $mail = new PHPMailer(true); // Passing `true` enables exceptions
                try {
                    //Server settings
                    $mail->SMTPDebug = 0; // Enable verbose debug output
                    $mail->isSMTP(); // Set mailer to use SMTP
                    $mail->CharSet = 'UTF-8';
                    $mail->Host = 'mail.appdev.si'; // Specify main and backup SMTP servers
                    $mail->SMTPAuth = true; // Enable SMTP authentication
                    $mail->Username = 'notify@btrack.io'; // SMTP username
                    $mail->Password = '12Tojegeslo#'; // SMTP password
                    $mail->SMTPSecure = 'ssl'; // Enable TLS encryption, `ssl` also accepted
                    $mail->Port = 465; // TCP port to connect to
                    //Recipients
                    $mail->setFrom('notify@btrack.io', 'notify@btrack.io');
                    $mail->addAddress($participant["employee_email"], $participant["employee_email"]); // Add a recipient
                    //Content
                    $mail->isHTML(true); // Set email format to HTML
                    if (isset($_SERVER['HTTPS'])) {
                        $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
                    }
                    else {
                        $protocol = 'http';
                    }
                    $ticketURL = $protocol . "://" . $_SERVER['HTTP_HOST'] . "/" . BASE_URL . "ticketdetails?ticket_id=" . $data["ticket_id"];
                    $emailBody = '<div style="background-color:#fff;margin:0 auto 0 auto;padding:30px 0 30px 0;color:#4f565d;font-size:13px;line-height:20px;font-family:\'Helvetica Neue\',Arial,sans-serif;text-align:left;">
													<center>
													  <table style="width:625px;text-align:center">
														<tbody>
														  <tr>
															<td style="padding:0 0 20px 0;border-bottom:1px solid #e9edee;">
															  <a href="https://www.netko.it" style="display:block; margin:0 auto;" target="_blank">
																<img src="https://main.btrackcore.com/Pictures/logo_long.png" width="150" alt="bTrack logo" style="border: 0px;">
															  </a>
															</td>
														  </tr>
														  <tr>
															<td colspan="2" style="padding:30px 0;">
															  <p style="color:#1d2227;line-height:28px;font-size:22px;margin:12px 10px 20px 10px;font-weight:400;">Hey ' . $participant["employee_name"] . " " . $participant["employee_surname"] . '</p>
															  <p style="margin:0 10px 10px 10px;padding:0;color:black;"><br>A ticket with the following subject <strong>' . $data["ticket_subject"] . '</strong> has been edited.<br>You can view the ticket by clicking the link below.</p>
															  <a style="display: inline-block;background-color: rgb(255, 82, 82);font-weight: bold;text-align: center;letter-spacing: .5px;position: relative;cursor: pointer;overflow: hidden;-webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;-webkit-tap-highlight-color: transparent;vertical-align: middle;z-index: 1;-webkit-transition: .3s ease-out;transition: .3s ease-out;text-decoration: none;color: #fff;text-align: center;-webkit-box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2);box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2);border: none;border-radius: 2px;height: 36px;line-height: 36px;padding: 0 2rem;text-transform: uppercase;" href="' . $ticketURL . '" target="_blank">VIEW TICKET</a>
															</td>
														  </tr>
														  <tr>
															<td colspan="2" style="padding:30px 0 0 0;border-top:1px solid #e9edee;color:#9b9fa5">
															  If you have any questions you can contact us at <a style="color:#666d74;text-decoration:none;" href="mailto:support@btrack.io" target="_blank">support@btrack.io</a>
															</td>
														  </tr>
														</tbody>
													  </table>
													</center>
												  </div>';

                    $mail->Subject = "Ticket " . $data["ticket_subject"] . " edited.";
                    $mail->msgHTML($emailBody);

                    $mail->send();
                }
                catch(Exception $e) {
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                }
            }
        }
    }

    public static function finishCampaign() {
        $data = $_POST;
        TelephonyDB::finishCampaign($data["campaign_id"]);
    }

    public static function addToBlacklist() {
        $data = $_POST;
        $exists = TelephonyDB::isNumberBlacklisted($data["blacklist_phone"]);
        if (!$exists) {
            TelephonyDB::addToBlacklist($_SESSION["id"], $data["blacklist_phone"], $data["blacklist_reason"]);
        }
        else {
            echo "Phone number is already blacklisted";
        }
    }

    public static function getBlacklist() {
        $data = $_POST;
        $blacklist = TelephonyDB::getBlacklist();
        echo json_encode($blacklist);
    }

    public static function editBlacklist() {
        $data = $_POST;

        TelephonyDB::editBlacklist($data["blacklist_id"], $data["blacklist_reason"]);
    }

    public static function deleteBlacklist() {
        $data = $_POST;

        TelephonyDB::deleteBlacklist($data["blacklist_id"]);
    }

    public static function createCampaign() {
        $data = $_POST;
        $participantString = implode(",", $data["campaign_participants"]);
        $campaign_id = TelephonyDB::createCampaign($data["campaign_name"], $data["campaign_description"], $participantString);

        echo $campaign_id;
    }

    public static function editCampaign() {
        $data = $_POST;
        $participantString = implode(",", $data["campaign_participants"]);
        TelephonyDB::editCampaign($data["campaign_id"], $data["campaign_name"], $data["campaign_description"], $participantString);
    }

    public static function getCampaignStats() {
        $data = $_POST;
        $response = array();
        $callsbydate = TelephonyDB::getCampaignCallsByDate($data["campaign_id"]);
        $subscribers = TelephonyDB::getCampaignSubscribers($data["campaign_id"]);
        $callsToday = TelephonyDB::getCallsToday($data["campaign_id"]);
        $response["calls"] = $callsbydate;
        $response["remaining"] = count($subscribers);
        $response["completed"] = count($callsToday);
        echo json_encode($response);
    }

    public static function importCampaignSubscribers() {
        $blacklist = TelephonyDB::getBlacklist();
        $blacklisted_numbers = array();
        foreach ($blacklist as $entry) {
            array_push($blacklisted_numbers, $entry);
        }
        $campaign_id = $_POST["campaign_id"];
        $handle = fopen($_SESSION["csv"], 'r');
        $response = array();
        if ($handle !== false) {
            $row = 0;
            $columns = array();
            $rows = array();
            while (($data = fgetcsv($handle, 1000, ',')) !== false) {
                if ($row == 0) {
                    $row++;
                    continue;
                }
                else {
                    $email = "";
                    $notes = "";
                    $phonenumber = trim($data[$_POST["customer_phone"]]);
                    if ($_POST["customer_email"] != - 1) {
                        $email = $data[$_POST["customer_email"]];
                    }
                    if ($_POST["customer_notes"] != - 1) {
                        $notes = $data[$_POST["customer_notes"]];
                    }
                    if (is_numeric($phonenumber) && !in_array($phonenumber, $blacklisted_numbers)) {
                        $phonenumber = str_replace("+", "00", $phonenumber);
                        TelephonyDB::addCampaignSubscriber($campaign_id, trim($data[$_POST["customer_name"]]) , $phonenumber, trim($email) , trim($notes));
                    }

                }
                $row++;
            }
            fclose($handle);
        }
    }

    public static function addCampaignSubscriber() {
        $data = $_POST;
        TelephonyDB::addCampaignSubscriber($data["campaign_id"], $data["customer_name"], $data["customer_phone"], $data["customer_email"], $data["customer_notes"]);
    }

    public static function getCampaigns() {
        $campaigns = TelephonyDB::getCampaigns();
        echo json_encode($campaigns);
    }

    public static function getCampaignSubscribers() {
        $data = $_POST;
        $subs = TelephonyDB::getCampaignSubscribers($data["campaign_id"]);
        echo json_encode($subs);
    }

    public static function markCustomerAsCalled() {
        $data = $_POST;
        TelephonyDB::markCustomerAsCalled($data["customer_id"], $data["status"]);
    }

    public static function getCampaignCalls() {
        $data = $_POST;
        $calls = TelephonyDB::getCampaignCalls($data["campaign_id"]);

        echo json_encode($calls);
    }

    public static function insertCampaignCall() {
        $data = $_POST;
        TelephonyDB::insertCampaignCall($data["customer_id"], $_SESSION["id"], $data["campaign_id"], $data["call_notes"], $data["call_type"]);
        if ($data["call_type"] == 0) {
            TelephonyDB::markCustomerAsCalled($data["customer_id"], 0);
        }
    }

    public static function checkEmailsAnswered() {
        $settings = GeneralDB::getSettings();
        $usersettings = TelephonyDB::getUserSettings($_SESSION["id"]);
        if ($usersettings["telephony_emailhost"] != "") {
            $ssl = "";
            if ($usersettings["telephony_ssl"] == 1 && $usersettings["telephony_certificate"] == 1) {
                $ssl = "ssl/validate-cert";
            }
            else if ($usersettings["telephony_ssl"] == 1) {
                $ssl = "ssl/novalidate-cert";
            }
            /* connect to server */
            $hostname = "{" . $usersettings["telephony_emailhost"] . ":" . $usersettings["telephony_emailport"] . "/imap/" . $ssl . "}INBOX";
            $mailbox = new Mailbox($hostname, $usersettings["telephony_email"], $usersettings["telephony_password"], "Uploads/EmailAttachments");
        }else {
            return;
        }
        $mailsIds = $mailbox->searchMailbox('ALL');
        if (!$mailsIds) {
            die('Mailbox is empty');
        }

        rsort($mailsIds);

        $receivedEmails = array();
        $count = 0;
        foreach ($mailsIds as $mailId) {
            if ($count > 150) {
                break;
            }
            $mail = $mailbox->getHeaders($mailId);
            array_push($receivedEmails, $mail);
        }

        $mailbox->switchMailbox($hostname . ".Sent");
        $mailsIds = $mailbox->searchMailbox('ALL');
        if (!$mailsIds) {
            die('Mailbox is empty');
        }

        rsort($mailsIds);

        $count = 0;
        foreach ($mailsIds as $mailId) {
            if ($count > 150) {
                break;
            }
            $mail = $mailbox->getHeaders($mailId);
            foreach ($receivedEmails as $received) {
                if ($received->in_reply_to == $mail->uid && $mail->answered == 0) {
                    $mailbox->markMailAsAnswered($mailId);
                    break;
                }
            }
        }
    }

    
	
	public static function getEmailAttachments(){
		$data = $_POST;
		
        $usersettings = TelephonyDB::getUserSettings($_SESSION["id"]);
		
        if ($usersettings["telephony_emailhost"] != "") {
            $ssl = "";
            if ($usersettings["telephony_ssl"] == 1 && $usersettings["telephony_certificate"] == 1) {
                $ssl = "ssl/validate-cert";
            }
            else if ($usersettings["telephony_ssl"] == 1) {
                $ssl = "ssl/novalidate-cert";
            }
            /* connect to server */
            $hostname = "{" . $usersettings["telephony_emailhost"] . ":" . $usersettings["telephony_emailport"] . "/imap/" . $ssl . "}INBOX";
            $mailbox = new Mailbox($hostname, $usersettings["telephony_email"], $usersettings["telephony_password"], "Uploads/EmailAttachments");
        }else {
            echo json_encode(array());
            return;
        }
		
		$mailbox->enableAttachments();
		
		$mail = $mailbox->getMail($data["mail_id"]);
		
		if ($data["threads"] == 1){
			$threads = getEmailThreads($mail->subject);
		}else{
			$threads = [];
		}
		
		$htmlMessage = $mail->replaceInternalLinks("/Uploads/EmailAttachments");
				
		$attachments = $mail->getAttachments();
		$attachmentFilePaths = "";
				
		foreach ($attachments as $attachment){
			if ($attachment->show){
				if ($attachmentFilePaths != ""){
					$attachmentFilePaths .= $attachment->name . ";";
				}else{
					$attachmentFilePaths = $attachment->name;
				}
			}
		}
				
		$currentEmail = array("mail_id" => $data["mail_id"], "flagged" => $mail->flagged, "subject" => $mail->subject, "from" => $mail->fromAddress, "fromname" => $mail->fromName, "seen" => $mail->seen, "date" => $mail->date, "message" => $mail->textPlain, "htmlmsg" => $htmlMessage, "threads" => $threads, "attachments" => $attachmentFilePaths);
		echo json_encode($currentEmail);
	}
	
	public static function searchEmails(){
		$data = $_POST;
		
		$searchQuery = $data["query"];
		
		$response = array();
		
        $usersettings = TelephonyDB::getUserSettings($_SESSION["id"]);
		
		$current_page = $data["current_page"] - 1;
		$per_page = $data["per_page"] - 1;
		
        if ($usersettings["telephony_emailhost"] != "") {
            $ssl = "";
            if ($usersettings["telephony_ssl"] == 1 && $usersettings["telephony_certificate"] == 1) {
                $ssl = "ssl/validate-cert";
            }
            else if ($usersettings["telephony_ssl"] == 1) {
                $ssl = "ssl/novalidate-cert";
            }
            /* connect to server */
            $hostname = "{" . $usersettings["telephony_emailhost"] . ":" . $usersettings["telephony_emailport"] . "/imap/" . $ssl . "}INBOX";
            $mailbox = new Mailbox($hostname, $usersettings["telephony_email"], $usersettings["telephony_password"], "Uploads/EmailAttachments");
        }else {
            echo json_encode(array());
            return;
        }
		
		$mailsIds = $mailbox->searchMailbox("TEXT " . $searchQuery);
		
        if(!$mailsIds) {
			$response["emails"] = array();
			echo json_encode($response);
        }else{
			$jsonEmails = array();
			foreach ($mailsIds as $mailId){
				$mail = $mailbox->getMail($mailId);
					
				$htmlMessage = $mail->replaceInternalLinks("/Uploads/EmailAttachments");
				
				$attachmentFilePaths = "";
	
				$currentEmail = array("mail_id" => $mailId, "flagged" => $mail->flagged, "subject" => $mail->subject, "from" => $mail->fromAddress, "fromname" => $mail->fromName, "seen" => $mail->seen, "date" => $mail->date, "message" => $mail->textPlain, "htmlmsg" => $htmlMessage, "attachments" => $attachmentFilePaths);
				array_push($jsonEmails, $currentEmail);
			}
			
			$response["emails"] = $jsonEmails;
			echo json_encode($response);
		}
		$mailbox->disconnect();
	}

    public static function retrieveEmails() {
		$data = $_POST;
		
        $usersettings = TelephonyDB::getUserSettings($_SESSION["id"]);
        $eHost = null;
        $fromEmail = null;
        $fromPassword = null;
		
		$current_page = $data["current_page"] - 1;
		$per_page = $data["per_page"] - 1;
		
		
        if ($usersettings["telephony_emailhost"] != "") {
            $ssl = "";
            if ($usersettings["telephony_ssl"] == 1 && $usersettings["telephony_certificate"] == 1) {
                $ssl = "ssl/validate-cert";
            }
            else if ($usersettings["telephony_ssl"] == 1) {
                $ssl = "ssl/novalidate-cert";
            }
            /* connect to server */
            $hostname = "{" . $usersettings["telephony_emailhost"] . ":" . $usersettings["telephony_emailport"] . "/imap/" . $ssl . "}INBOX";
            $mailbox = new Mailbox($hostname, $usersettings["telephony_email"], $usersettings["telephony_password"], "Uploads/EmailAttachments");
            $sentHostname = "{" . $usersettings["telephony_emailhost"] . ":" . $usersettings["telephony_emailport"] . "/imap/" . $ssl . "}INBOX.Sent";
            $eHost = $usersettings["telephony_emailhost"];
            $fromEmail = $usersettings["telephony_email"];
            $fromPassword = $usersettings["telephony_password"];
        } else {
            echo json_encode(array());
            return;
        }

        $total_messages = $mailbox->countMails();
		
		$display_to = $total_messages - ($current_page * $per_page);
		$display_from = $display_to - $per_page;
		if ($display_from < 1){
			$display_from = 1;
		}

		// Fetch an overview for all messages in INBOX
		$mailsIds = $mailbox->getMailsInfo($display_from, $display_to);

		usort($mailsIds, function($a, $b) {
			return strtotime($b->date) - strtotime($a->date);
		});
		
        $jsonEmails = array();

        foreach ($mailsIds as $retMail) {
			$mailId = $retMail->uid;
			$emailNamePosition = strpos($retMail->from, "<");
			
			$fromAddrEmail = str_replace('"', '', trim(substr($retMail->from, 0, $emailNamePosition - 1)));
			$fromAddrName = str_replace('"', '', strip_tags(trim(substr($retMail->from, $emailNamePosition))));
			
            $message_id = $retMail->udate . $retMail->uid;
            $dbMail = TelephonyDB::checkEmailExists($message_id); //checks if we already have an email with this message id in database
            $exists = is_array($dbMail);
            $status = $retMail->seen;
            $notes = "";
            $employee_namesurname = null;
            if ($exists) {
                $status = $dbMail["status"];
                $notes = $dbMail["notes"];
                $email_id = $dbMail["email_id"];
                $employee_namesurname = $dbMail["employee_namesurname"];
            }
            $answered = $retMail->answered;
            if ($answered == 1) {
                $status = 2;
            }
            if (!$exists) {
                $email_id = TelephonyDB::addEmail($message_id, $mailId, $status);
				$emailDate = date("Y-m-d", strtotime($retMail->date));
                if (!isset($retMail->in_reply_to) || $retMail->in_reply_to == null) {
                    $sendMail = new PHPMailer(true); // Passing `true` enables exceptions
                    try {
                        $sendMail->SMTPDebug = 0; // Enable verbose debug output
                        $sendMail->isSMTP(); // Set mailer to use SMTP
                        $sendMail->CharSet = 'UTF-8';
                        $sendMail->Host = $eHost; // Specify main and backup SMTP servers
                        $sendMail->SMTPAuth = true; // Enable SMTP authentication
                        $sendMail->Username = $fromEmail; // SMTP username
                        $sendMail->Password = $fromPassword; // SMTP password
                        $sendMail->SMTPSecure = 'ssl'; // Enable TLS encryption, `ssl` also accepted
                        $sendMail->Port = 465; // TCP port to connect to
                        //Recipients
                        $sendMail->setFrom($fromEmail, $fromEmail);
                        $sendMail->addAddress($fromAddrEmail, $fromAddrName); // Add a recipient
                        //Content
                        $sendMail->isHTML(true); // Set email format to HTML
                        $sendMail->Subject = "[Support ticket - " . $email_id . "] Automatic response";
                        $sendMail->msgHTML("<h3>Greetings,</h3><p>This message has been generated automatically in response to creation of a support ticket - <strong>" . $retMail->subject . "</strong><p>We will handle your support request as soon as possible.<p>");

                        if (!$sendMail->send()) {
                            echo 'Message could not be sent.';
                            echo 'Mailer Error: ' . $sendMail->ErrorInfo;
                        }
                        else {
                            /* connect to server */
                            $imapStream = imap_open($sentHostname, $fromEmail, $fromPassword);
                            $result = imap_append($imapStream, $sentHostname, $sendMail->getSentMIMEMessage());
                            imap_close($imapStream);
                        }
                    }
                    catch(Exception $e) {
                        echo 'Mailer Error: ' . $sendMail->ErrorInfo;
                    }
                }
            }
            if ($answered == 1 && $dbMail["status"] != 2) {
                TelephonyDB::setEmailStatus($email_id, "", 2);
            }

            $currentEmail = array(
                "email_id" => $email_id,
                "mail_id" => $mailId,
                "flagged" => $retMail->flagged,
                "employee_namesurname" => $employee_namesurname,
                "message_id" => $message_id,
                "ticket_id" => $dbMail["ticket_id"],
                "subject" => $retMail->subject,
                "from" => $fromAddrEmail,
                "fromname" => $fromAddrName,
                "seen" => $status,
                "date" => date("Y-m-d H:i:s", $retMail->udate),
                "notes" => $notes,
            );
            array_push($jsonEmails, $currentEmail);

        }

        $mailbox->disconnect();
		$response = array();
		$response["emails"] = $jsonEmails;
		$response["amount"] = $total_messages;
		$response["display"] = $display_to . ":" . $display_from;
        echo json_encode($response);
    }

    public static function pushCallToMobile() {
        $data = $_POST;

        $employee = UserDB::getEmployeeByID($_SESSION["id"]);

        $gcm = new GCM();
        $push = new Push();

        $sendingData = array();
        $sendingData['phonenumber'] = $data["phonenumber"];
        $sendingData["customer_id"] = $data["customer_id"];
        $sendingData["customer_name"] = $data["customer_name"];
        $sendingData['sentAt'] = round(microtime(true) * 1000);

        $push->setTitle("Call");
        $push->setIsBackground(false);
        $push->setFlag(1);
        $push->setData($sendingData);

        $gcm->send($employee['fcm_token'], $push->getPush());
    }

    public static function setupUser() {
        $data = $_POST;
		
		$ch = curl_init('http://93.103.159.8/ast14menu/queuelogin.php?queue=' . $data["queue"] . "&exten=" . $data["extension"]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'Accept: application/json'
        ));

        $result = curl_exec($ch);
		curl_close($ch);
		
		$decodedResult = json_decode($result, true);
		if (!$decodedResult["error"]){
            TelephonyDB::setupUser($_SESSION["id"], $data["queue"], $data["extension"], $data["telephony_emailhost"], $data["telephony_emailport"], $data["telephony_email"], $data["telephony_password"], $data["telephony_ssl"], $data["telephony_certificate"]);
            $_SESSION["queue"] = $data["queue"];
            $_SESSION["extension"] = $data["extension"];
        } else {
            echo $decodedResult["message"];
        }
    }

    public static function setupUserEmail() {
        $data = $_POST;
        $ssl = "";
        if ($data["telephony_ssl"] == 1 && $data["telephony_certificate"] == 1) {
            $ssl = "ssl/validate-cert";
        }
        else if ($data["telephony_ssl"] == 1) {
            $ssl = "ssl/novalidate-cert";
        }
        /* connect to server */
        $hostname = "{" . $data["telephony_emailhost"] . ":" . $data["telephony_emailport"] . "/imap/" . $ssl . "}";
        $username = $data["telephony_email"];
        $password = $data["telephony_password"];

        imap_open($hostname, $username, $password) or die('Cannot connect to mailbox: ' . imap_last_error());

        TelephonyDB::setupUserEmail($_SESSION["id"], $data["telephony_emailhost"], $data["telephony_emailport"], $data["telephony_email"], $data["telephony_password"], $data["telephony_ssl"], $data["telephony_certificate"]);

        echo "OK";
    }

    public static function disconnectIMAP() {
        TelephonyDB::setupUserEmail($_SESSION["id"], "", 0, "", "", 0, 0);
    }

    public static function logoutUser() {
        $data = $_POST;
		$user = UserDB::getUserByID($_SESSION["id"]);
		$ch = curl_init('http://93.103.159.8/ast14menu/queuelogout.php?queue=' . $user["queue"] . "&exten=" . $user["extension"]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'Accept: application/json'
        ));

        $result = curl_exec($ch);
		curl_close($ch);
		
		$decodedResult = json_decode($result, true);
		if (!$decodedResult["error"]){
            TelephonyDB::logoutTelephonyUser($_SESSION["id"]);
			$_SESSION["queue"] = 0;
			$_SESSION["extension"] = 0;
			ViewHelper::redirect(BASE_URL . "dashboard");
        } else {
            echo $decodedResult["message"];
        }
    }

    public static function getCallStatistics() {
        $response = array();
        $callsweek = TelephonyDB::getLastWeekCalls();
        $callstoday = TelephonyDB::groupTodaysCalls();
        $callsbyagent = TelephonyDB::groupTodaysCallsAgent();
        $response["week"] = $callsweek;
        $response["today"] = $callstoday;
        $response["agents"] = $callsbyagent;

        echo json_encode($response);
    }

    public static function insertCall() {
        $data = $_POST;
        TelephonyDB::insertCall($data["call_subject"], $_SESSION["id"], $data["customer_id"], $data["call_phonenumber"], $data["call_duration"], $data["call_notes"]);
    }

    public static function insertOutgoing() {
        $data = $_POST;
        if ($data["customer_id"] == "") {
            $data["customer_id"] = null;
        }
        TelephonyDB::insertOutgoingCall($data["call_subject"], $_SESSION["id"], $data["customer_id"], $data["call_phonenumber"], "", $data["call_notes"], $data["call_status"]);
    }

    public static function editCall() {
        $data = $_POST;
        TelephonyDB::editCall($data["call_id"], $data["call_subject"], $data["customer_id"], $data["call_notes"]);
    }

    public static function insertIntoCalltrack() {
        $data = $_POST;
        $response = array();
        $status = TelephonyDB::calltrackCallExists($data["call_uid"]);
        $response["status"] = $status;
        if ($status == 0) { //entry for this UID doesn't exist, so create it
            TelephonyDB::addCalltrackCall($data["call_uid"], $data["call_number"], $data["status"]);
        }
        else if ($status == 1) { //entry already exists
            if ($data["status"] == "done") {
                TelephonyDB::updateCalltrackCall($data["call_uid"]);
                $response["status"] = 2;
            }
        }
        echo json_encode($response);
    }

    public static function getCalls() {
        $calls = TelephonyDB::getCalls();
        echo json_encode($calls);
    }

    public static function getTodaysCalls() {
        $todayscalls = TelephonyDB::getTodaysCalls();
        echo json_encode($todayscalls);
    }

    public static function sendTelephonyEmail() {
        $data = $_POST;

        $usersettings = TelephonyDB::getUserSettings($_SESSION["id"]);

        $recipients = $data["recipients"];
        $ccs = $data["cc"];
        $bccs = $data["bcc"];
        if ($usersettings["telephony_email"] != "") {
            $emailusername = $usersettings["telephony_email"];
        }
        if ($usersettings["telephony_password"] != "") {
            $emailpassword = $usersettings["telephony_password"];
        }
        if ($usersettings["telephony_emailhost"] != "") {
            $emailhost = $usersettings["telephony_emailhost"];
        }

        $mail = new PHPMailer(true); // Passing `true` enables exceptions
        try {
            $mail->SMTPDebug = 0; // Enable verbose debug output
            $mail->isSMTP(); // Set mailer to use SMTP
            $mail->CharSet = 'UTF-8';
            $mail->Host = $emailhost; // Specify main and backup SMTP servers
            $mail->SMTPAuth = true; // Enable SMTP authentication
            $mail->Username = $emailusername; // SMTP username
            $mail->Password = $emailpassword; // SMTP password
            $mail->SMTPSecure = 'ssl'; // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 465; // TCP port to connect to
            //Recipients
            $mail->setFrom($emailusername, $emailusername);
            foreach ($recipients as $recipient) {
                $mail->addAddress($recipient, $recipient); // Add a recipient
                
            }
            foreach ($ccs as $kp) {
                if ($kp != "") {
                    $mail->addCC($kp, $kp);
                }
            }
            foreach ($bccs as $skp) {
                if ($skp != "") {
                    $mail->addBCC($skp, $skp);
                }
            }
            //Content
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = $data["email_subject"];
            $mail->msgHTML($data["email_message"]);

            if (!$mail->send()) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            }
        }
        catch(Exception $e) {
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }

    }

    public static function showTelephonyPage() {
        $settings = GeneralDB::getSettings();
        $usersettings = TelephonyDB::getUserSettings($_SESSION["id"]);
		$employee = UserDB::getEmployeeByID($_SESSION["id"]);
        ViewHelper::render("View/telephony.php", ["settings" => $settings, "employee" => $employee, "usersettings" => $usersettings]);
    }

    public static function setEmailStatus() {
        $data = $_POST;
        $usersettings = TelephonyDB::getUserSettings($_SESSION["id"]);
        if ($data["status"] == 2) {
            TelephonyDB::markEmailAsFinished($data["email_id"], $_SESSION["id"], $data["notes"], $data["status"]);
        }
        else {
            TelephonyDB::setEmailStatus($data["email_id"], $data["notes"], $data["status"]);
			$ssl = "";
			if ($usersettings["telephony_ssl"] == 1 && $usersettings["telephony_certificate"] == 1) {
				$ssl = "ssl/validate-cert";
			}
			else if ($usersettings["telephony_ssl"] == 1) {
				$ssl = "ssl/novalidate-cert";
			}
			/* connect to server */
			$hostname = "{" . $usersettings["telephony_emailhost"] . ":" . $usersettings["telephony_emailport"] . "/imap/" . $ssl . "}INBOX";
			$mailbox = new Mailbox($hostname, $usersettings["telephony_email"], $usersettings["telephony_password"], "Uploads/EmailAttachments");
			
            /* connect to server */
            $mailbox->markMailAsRead($data["mail_id"]);
			$mailbox->disconnect();
        }
    }

    public static function setEmailOpened() {
        $data = $_POST;
        $employee_id = null;
        if ($data["opened"] == 1) {
            $employee_id = $_SESSION["id"];
        }
        TelephonyDB::markEmailAsOpened($data["email_id"], $employee_id, $data["opened"]);
    }

    public static function getEmailByID() {
        $data = $_POST;

        $email = TelephonyDB::getEmailByID($data["email_id"]);
        $email_tickets = TelephonyDB::getEmailTickets($data["email_id"]);

        $email["tickets"] = $email_tickets;
        echo json_encode($email);
    }

    //Functions for MetaKocka API
    public static function getMKCustomer() {
        $settings = GeneralDB::getSettings();
        $data = array(
            "secret_key" => $settings["mk_secretkey"],
            "company_id" => $settings["mk_companyid"],
            "partner_phone_number" => $_POST["phonenumber"]
        );
        $data_string = json_encode($data);

        $ch = curl_init('https://main.metakocka.si/rest/eshop/v1/get_partner');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_string)
        ));

        $result = curl_exec($ch);

        $decoded_result = json_decode($result, true);

        if (isset($decoded_result->opr_code)) { //error occured
            echo json_encode(array(
                "error" => true
            ));
        }
        else {
            $decoded_result["error"] = false;
            echo json_encode($decoded_result);
        }
    }

    public static function getMKProducts() {
        $settings = GeneralDB::getSettings();
        $data = array(
            "secret_key" => $settings["mk_secretkey"],
            "company_id" => $settings["mk_companyid"]
        );
        $data_string = json_encode($data);

        $ch = curl_init('https://main.metakocka.si/rest/eshop/v1/json/product_list');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_string)
        ));

        $result = curl_exec($ch);

        $decoded_result = json_decode($result, true);

        if (isset($decoded_result->opr_code)) { //error occured
            echo json_encode(array(
                "error" => true
            ));
        }
        else {
            $decoded_result["error"] = false;
            echo json_encode($decoded_result);
        }
    }

    public static function addMKProduct() {
        $settings = GeneralDB::getSettings();
        $data = array(
            "secret_key" => $settings["mk_secretkey"],
            "company_id" => $settings["mk_companyid"],
            "count_code" => $data["product_countcode"],
            "code" => $data["product_code"],
            "name" => $data["product_name"],
            "name_desc" => $data["product_description"],
            "unit" => $data["product_unit"],
            "service" => $data["product_service"],
            "sales" => $data["product_sales"],
            "purchasing" => $data["product_purchasing"],
            "height" => $data["product_height"],
            "depth" => $data["product_depth"],
            "weight" => $data["product_weight"]
        );

        $data_string = json_encode($data);

        $ch = curl_init('https://main.metakocka.si/rest/eshop/v1/json/product_add');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_string)
        ));

        $result = curl_exec($ch);

        $decoded_result = json_decode($result, true);

        if (isset($decoded_result->opr_code)) { //error occured
            echo json_encode(array(
                "error" => true
            ));
        }
        else {
            $decoded_result["error"] = false;
            echo json_encode($decoded_result);
        }
    }

    public static function updateMKProduct() {
        $settings = GeneralDB::getSettings();
        $data = array(
            "secret_key" => $settings["mk_secretkey"],
            "company_id" => $settings["mk_companyid"],
            "count_code" => $data["product_countcode"],
            "code" => $data["product_code"],
            "name" => $data["product_name"],
            "name_desc" => $data["product_description"],
            "unit" => $data["product_unit"],
            "service" => $data["product_service"],
            "sales" => $data["product_sales"],
            "purchasing" => $data["product_purchasing"],
            "height" => $data["product_height"],
            "depth" => $data["product_depth"],
            "weight" => $data["product_weight"]
        );

        $data_string = json_encode($data);

        $ch = curl_init('https://main.metakocka.si/rest/eshop/v1/json/product_update');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_string)
        ));

        $result = curl_exec($ch);

        $decoded_result = json_decode($result, true);

        if (isset($decoded_result->opr_code)) { //error occured
            echo json_encode(array(
                "error" => true
            ));
        }
        else {
            $decoded_result["error"] = false;
            echo json_encode($decoded_result);
        }
    }

    public static function addMKWorkorder() {
        $settings = GeneralDB::getSettings();
        $partner = array();
        $product_list = array();
        $workorder_products = $data["workorder_products"];

        $partner = array(
            "business_entity" => $data["partner_businessentity"],
            "taxpayer" => $data["partner_taxpayer"],
            "tax_id_number" => $data["partner_vat"],
            "customer" => $data["partner_code"],
            "street" => $data["partner_street"],
            "post_number" => $data["partner_postnumber"],
            "place" => $data["partner_place"],
            "country" => $data["partner_country"]
        );
        foreach ($workorder_products as $product) {
            array_push($product_list, $product);
        }

        $data = array(
            "secret_key" => $settings["mk_secretkey"],
            "company_id" => $settings["mk_companyid"],
            "document_type" => "workorder",
            "count_code" => $data["workorder_countcode"],
            "doc_date" => date("d.m.Y") ,
            "start_date" => $data["workorder_date"],
            "partner" => $partner,
            "product_list" => $product_list
        );

        $data_string = json_encode($data);

        $ch = curl_init('https://main.metakocka.si/rest/eshop/v1/put_document');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_string)
        ));

        $result = curl_exec($ch);

        $decoded_result = json_decode($result, true);

        if (isset($decoded_result->opr_code)) { //error occured
            echo json_encode(array(
                "error" => true
            ));
        }
        else {
            $decoded_result["error"] = false;
            echo json_encode($decoded_result);
        }
    }

    public static function addMKCustomer() {
        $partner = array(
            "business_entity" => false,
            "taxpayer" => false,
            "foreign_county" => false,
            "customer" => "test_uporabnik",
            "street" => "test, 4",
            "post_number" => "1000",
            "place" => "test",
            "country" => "Slovenija",
            "partner_contact" => array(
                "name" => "Test test",
                "gsm" => "031415246",
                "email" => "test@test.com"
            )
        );
        $data = array(
            "secret_key" => $settings["mk_secretkey"],
            "company_id" => $settings["mk_companyid"],
            "partner" => $partner
        );
        $data_string = json_encode($data);

        $ch = curl_init('https://main.metakocka.si/rest/eshop/v1/add_partner');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_string)
        ));

        $result = curl_exec($ch);

        $decoded_result = json_decode($result, true);

        if (isset($decoded_result->opr_code)) { //error occured
            echo json_encode(array(
                "error" => true
            ));
        }
        else {
            $decoded_result["error"] = false;
            echo json_encode($decoded_result);
        }
    }

    public static function updateMKCustomer() {
        $partner = array(
            "mk_id" => "228000046605",
            "street" => "test, 6",
            "post_number" => "2000",
            "place" => "test",
            "country" => "Slovenija",
            "partner_contact_list" => array(
                "mk_address_id" => "228000046606",
                "name" => "Test test test test",
                "gsm" => "031415246",
                "phone" => "031425246",
                "email" => "test2@test.com"
            )
        );
        $data = array(
            "secret_key" => $settings["mk_secretkey"],
            "company_id" => $settings["mk_companyid"],
            "partner" => $partner
        );
        $data_string = json_encode($data);

        $ch = curl_init('https://main.metakocka.si/rest/eshop/v1/update_partner');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_string)
        ));

        $result = curl_exec($ch);

        $decoded_result = json_decode($result, true);

        if (isset($decoded_result->opr_code)) { //error occured
            echo json_encode(array(
                "error" => true
            ));
        }
        else {
            $decoded_result["error"] = false;
            echo json_encode($decoded_result);
        }
    }

    //End of MetaKocka API functions
    
}

function getEmailThreads($subject) {
       
		$usersettings = TelephonyDB::getUserSettings($_SESSION["id"]);
		
        $ssl = "";
        if ($usersettings["telephony_ssl"] == 1 && $usersettings["telephony_certificate"] == 1) {
            $ssl = "ssl/validate-cert";
        }
        else if ($usersettings["telephony_ssl"] == 1) {
            $ssl = "ssl/novalidate-cert";
        }
        /* connect to server */
        $hostname = "{" . $usersettings["telephony_emailhost"] . ":" . $usersettings["telephony_emailport"] . "/imap/" . $ssl . "}INBOX";
		$sentHostname = "{" . $usersettings["telephony_emailhost"] . ":" . $usersettings["telephony_emailport"] . "/imap/" . $ssl . "}INBOX.Sent";
			
	    $mailbox = new Mailbox($hostname, $usersettings["telephony_email"], $usersettings["telephony_password"], "Uploads/EmailAttachments");
		$threads = array(); 

		//remove re: and fwd: 
		$subject = trim(preg_replace("/Re\:|re\:|RE\:|Fwd\:|fwd\:|FWD\:/i", '', $subject)); 

		//search for subject in current mailbox 
		$results = $mailbox->searchMailbox('SUBJECT "' . $subject . '"'); 

		//because results can be false 
		if(is_array($results)) { 
			//now get all the emails details that were found 
			$emails = imap_fetch_overview($mailbox->getImapStream(), implode(',', $results), FT_UID); 
			
			//foreach email 
			foreach ($emails as $email) { 
				//add to threads 
				$email_subject = trim(preg_replace("/Re\:|re\:|RE\:|Fwd\:|fwd\:|FWD\:/i", '', $email->subject)); 
				if ($email_subject == $subject){
					$emailNamePosition = strpos($email->from, "<");
			
					$fromAddrEmail = str_replace('"', '', trim(substr($email->from, 0, $emailNamePosition - 1)));
					$fromAddrName = str_replace('"', '', strip_tags(trim(substr($email->from, $emailNamePosition))));
					
					$email->from = $fromAddrEmail;
					$email->fromName = $fromAddrName;
					array_push($threads, $email);
				}
			}
		} 

		//now reopen sent messages 
		$mailbox->switchMailbox($sentHostname); 

		//and do the same thing 

		//search for subject in current mailbox 
		$results = $mailbox->searchMailbox('SUBJECT "' . $subject . '"'); 

		//because results can be false 
		if(is_array($results)) { 
			//now get all the emails details that were found 
			$emails = imap_fetch_overview($mailbox->getImapStream(), implode(',', $results), FT_UID); 
			
			//foreach email 
			foreach ($emails as $email) { 
				//add to threads 
				$email_subject = trim(preg_replace("/Re\:|re\:|RE\:|Fwd\:|fwd\:|FWD\:/i", '', $email->subject)); 
				if ($email_subject == $subject){
					$emailNamePosition = strpos($email->from, "<");
			
					$fromAddrEmail = str_replace('"', '', trim(substr($email->from, 0, $emailNamePosition - 1)));
					$fromAddrName = str_replace('"', '', strip_tags(trim(substr($email->from, $emailNamePosition))));
					
					$email->from = $fromAddrEmail;
					$email->fromName = $fromAddrName;
					array_push($threads, $email);
				}
			}    
		} 

		usort($threads, function($a, $b){
			return $a->udate - $b->udate;
		});

		return $threads;
    }

?>
