<?php
require_once ("Model/WorkOrderDB.php");
require_once ("Model/UserDB.php");
require_once ("Model/CustomerDB.php");
require_once ("Model/TelephonyDB.php");
require_once ("Model/GeneralDB.php");
require_once ("ViewHelper.php");
require_once ("Controller/gcm.php");
require_once ("Controller/push.php");

require_once ('libs/PHPMailer/src/Exception.php');
require_once ('libs/PHPMailer/src/PHPMailer.php');
require_once ('libs/PHPMailer/src/SMTP.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class WorkOrderController {

    public static function setWorkorderOpened() {
        $data = $_POST;

        WorkOrderDB::setWorkorderOpened($data["workorder_id"]);
    }

    public static function uploadWorkorderFile() {
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

    public static function showWorkOrderPage() {
        $data = $_GET;
        $workorder = WorkOrderDB::getWorkorderByID($data["workorder_id"]);
        $items = WorkOrderDB::getWorkOrderItems($data["workorder_id"]);
		$files = WorkOrderDB::getWorkOrderFiles($data["workorder_id"]);
        $workorder_actions = WorkOrderDB::getWorkOrderActions($data["workorder_id"]);
        $employee = UserDB::getEmployeeByID($workorder["employee_id"]);
        $customer = CustomerDB::getCustomerByID($workorder["customer_id"]);
		$settings = GeneralDB::getSettings();
        if ($workorder["opened_on"] == "") {
            WorkOrderDB::setWorkorderOpened($data["workorder_id"]);
        }
        ViewHelper::render("View/workorder_page.php", ["workorder" => $workorder, "items" => $items, "actions" => $workorder_actions, "employee" => $employee, "customer" => $customer, "files" => $files, "settings" => $settings]);
    }

    public static function addWorkOrderNote() {
        $data = $_POST;

        $response = array();

        $action_id = WorkOrderDB::addWorkOrderAction($data["workorder_id"], $_SESSION["id"], "Note added:<br>" . $data["description"], 1);
        if ($action_id != null) {
            $response["error"] = false;
            $response["action"] = WorkOrderDB::getWorkOrderActionByID($action_id);
        }
        else {
            $response["error"] = true;
            $response["message"] = "Insert failed";
        }

        echo json_encode($response);
    }

    public static function getWorkOrders() {
        $workorders = WorkOrderDB::getWorkOrders();
        echo json_encode($workorders);
    }

    public static function getEmployeeWorkOrders() {
        $data = $_POST;
        $workorders = WorkOrderDB::getEmployeeWorkOrders($data["employee_id"]);
        echo json_encode($workorders);
    }

    public static function getAllWorkOrdersToday() {
        $workorders = WorkOrderDB::getAllWorkOrdersToday();
        echo json_encode($workorders);
    }

    public static function getWorkOrdersLastWeek() {
        $workorders = WorkOrderDB::getWorkOrdersLastWeek();
        echo json_encode($workorders);
    }

    public static function addWorkOrder() {
        $data = $_POST;

        $assigned_to = implode(",", $data["assign_to"]);
        $files = explode(",", $data["files"]);
		$fileString = implode(";", $files);
        $items = $data["items"];
        $amounts = $data["item_amount"];
        $subsID = $data["subsidiary_id"];
        $ticketID = $data["ticket_id"];
        if ($data["subsidiary_id"] == "") {
            $subsID = null;
        }
        if ($data["ticket_id"] == "") {
            $ticketID = null;
        }
		
		$curFiles = "";
		
        if ($ticketID != null) {
            $ticket = TelephonyDB::getTicketByID($ticketID);
			$curFiles = $ticket["ticket_files"];
        }
		
		$last_order = WorkOrderDB::getLastWorkOrder();
        $last_id = $last_order["workorder_id"];
        $settings = GeneralDB::getSettings();
        $workorder_number = $settings["workorder_prefix"] . "-" . (intval($last_id) + 1);
		
		$workorder_start_date = date("Y-m-d", strtotime($data["start_date"]));
		$workorder_end_date = date("Y-m-d", strtotime($data["end_date"]));

        $workorder_id = WorkOrderDB::addWorkOrder($data["workorder_subject"], $workorder_number, $ticketID, $_SESSION["id"], $assigned_to, $workorder_start_date, $workorder_end_date, $data["customer_id"], $subsID, $data["workorder_location"], $data["latitude"], $data["longitude"], $data["priority"], $data["workorder_notes"], $fileString);
        WorkOrderDB::addWorkOrderAction($workorder_id, $_SESSION["id"], "Work order created", 0);
		
		foreach ($files as $filename){
			$filePath = "Uploads/OtherFiles/" . $filename;
			GeneralDB::addFileUpload($_SESSION["id"], $data["customer_id"], null, null, null, $workorder_id, $filename, $filePath);
		}
        

        $count = 0;
        foreach ($items as $item) {
            WorkOrderDB::addWorkOrderItem($workorder_id, $item, $amounts[$count]);
            $count++;
        }

        if ($ticketID != null) {
            TelephonyDB::setTicketWorkOrder($ticketID, $workorder_id);
            TelephonyDB::addTicketAction($ticketID, $_SESSION["id"], "Work order " . $data["workorder_subject"] . " created", 0);
        }

        $employee = UserDB::getEmployeeByID($_SESSION["id"]);
        $participants = UserDB::getParticipants($assigned_to);

        foreach ($participants as $participant) {
			if ($participant["employee_online"] == 1) {
                $gcm = new GCM();
                $push = new Push();

                $sendingData = array();
				$sendingData["workorder_id"] = $workorder_id;
                $sendingData['workorder_subject'] = $data["workorder_subject"];
                $sendingData["workorder_startdate"] = $workorder_start_date;
                $sendingData['sentAt'] = round(microtime(true) * 1000);

                $push->setTitle("Workorder");
                $push->setIsBackground(false);
                $push->setFlag(1);
                $push->setData($sendingData);

                $gcm->send($participant['fcm_token'], $push->getPush());
            }
            if ($participant["employee_mailing"] == 1 && $participant["workorder_notifications"] == 1) {
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
                    $workorderURL = $protocol . "://" . $_SERVER['HTTP_HOST'] . "/" . BASE_URL . "workorderdetails?workorder_id=" . $data["workorder_id"];
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
															  <p style="margin:0 10px 10px 10px;padding:0;color:black;"><br>' . $employee["employee_name"] . " " . $employee["employee_surname"] . " has assigned you a work order with the following subject <strong>" . $data["workorder_subject"] . '</strong> which starts on <strong>' . $workorder_start_date . '</strong><br>You can view the work order by clicking the link below.</p>
															  <a style="display: inline-block;background-color: rgb(255, 82, 82);font-weight: bold;text-align: center;letter-spacing: .5px;position: relative;cursor: pointer;overflow: hidden;-webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;-webkit-tap-highlight-color: transparent;vertical-align: middle;z-index: 1;-webkit-transition: .3s ease-out;transition: .3s ease-out;text-decoration: none;color: #fff;text-align: center;-webkit-box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2);box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2);border: none;border-radius: 2px;height: 36px;line-height: 36px;padding: 0 2rem;text-transform: uppercase;" href="' . $workorderURL . '" target="_blank">VIEW WORK ORDER</a>
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

                    $mail->Subject = "Work order " . $data["workorder_subject"] . " assigned.";
                    $mail->msgHTML($emailBody);

                    $mail->send();
                }
                catch(Exception $e) {
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                }
            }
        }

        $response = array();
        $response["workorder_id"] = $workorder_id;

        echo json_encode($response);
    }

    public static function editWorkOrder() {
        $data = $_POST;
        $assigned_to = implode(",", $data["assign_to"]);
        $files = explode(",", $data["files"]);
        $fileString = "";
        $items = $data["items"];
        $amounts = $data["item_amount"];
        if ($data["subsidiary_id"] == "") {
            $subsID = null;
        }
        $workorder = WorkOrderDB::getWorkOrderByID($data["workorder_id"]);

		$workorder_start_date = date("Y-m-d", strtotime($data["start_date"]));
		$workorder_end_date = date("Y-m-d", strtotime($data["end_date"]));
		
		$curFiles = $workorder["workorder_files"];

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

        WorkOrderDB::editWorkOrder($data["workorder_id"], $data["workorder_subject"], $assigned_to, $workorder_start_date, $workorder_end_date, $data["customer_id"], $subsID, $data["workorder_location"], $data["latitude"], $data["longitude"], $data["priority"], $data["workorder_notes"], $data["status"], $curFiles);
        WorkOrderDB::deleteWorkOrderItems($data["workorder_id"]);
		
		foreach ($files as $filename){
			$filePath = "Uploads/OtherFiles/" . $filename;
			GeneralDB::addFileUpload($_SESSION["id"], $data["customer_id"], null, null, null, $data["workorder_id"], $filename, $filePath);
		}

        $edited_fields = array();
        if ($workorder["workorder_subject"] != $data["workorder_subject"]) {
            array_push($edited_fields, "Subject changed to " . $data["workorder_subject"]);
        }
        if ($workorder["workorder_startdate"] != $workorder_start_date) {
            array_push($edited_fields, "Start date changed to " . $workorder_start_date);
        }
        if ($workorder["workorder_enddate"] != $workorder_end_date) {
            array_push($edited_fields, "End date changed to " . $workorder_end_date);
        }
        if ($workorder["customer_id"] != $data["customer_id"]) {
            $custname = CustomerDB::getCustomerByID($custID) ["customer_name"];
            array_push($edited_fields, "Customer changed to " . $custname);
        }
        if ($workorder["assigned_to"] != $assigned_to) {
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
        if ($workorder["workorder_location"] != $data["workorder_location"]) {
            array_push($edited_fields, "Location changed to " . $data["workorder_location"]);
        }
        if ($workorder["workorder_notes"] != $data["workorder_notes"]) {
            array_push($edited_fields, "Notes changed to " . $data["workorder_notes"]);
        }
        if ($workorder["status"] != $data["status"]) {
            $statusStr = "Incomplete";
            if ($data["status"] == 1) {
                $statusStr = "In progress";
            }
            else if ($data["status"] == 2) {
                $statusStr = "Finished";
                WorkOrderDB::setWorkorderFinished($data["workorder_id"]);
            }else if ($data["status"] == 3){
				$statusStr = "Canceled";
                WorkOrderDB::setWorkorderFinished($data["workorder_id"]);
			}
            array_push($edited_fields, "Status changed to " . $statusStr);
        }

        $editedFieldsString = "Fields updated - " . implode(", ", $edited_fields);

        WorkOrderDB::addWorkOrderAction($data["workorder_id"], $_SESSION["id"], $editedFieldsString, 0);

        $count = 0;
        foreach ($items as $item) {
            WorkOrderDB::addWorkOrderItem($data["workorder_id"], $item, $amounts[$count]);
            $count++;
        }

        $participants = UserDB::getParticipants($assigned_to);

        foreach ($participants as $participant) {
			if ($participant["employee_online"] == 1) {
                $gcm = new GCM();
                $push = new Push();

                $sendingData = array();
				$sendingData["workorder_id"] = $data["workorder_id"];
                $sendingData['workorder_subject'] = $data["workorder_subject"];
                $sendingData["workorder_startdate"] = $workorder_start_date;
				$sendingData["workorder_status"] = $data["status"];
                $sendingData['sentAt'] = round(microtime(true) * 1000);

                $push->setTitle("WorkorderUpdate");
                $push->setIsBackground(false);
                $push->setFlag(1);
                $push->setData($sendingData);

                $gcm->send($participant['fcm_token'], $push->getPush());
            }
            if ($participant["employee_mailing"] == 1 && $participant["workorder_notifications"] == 1) {
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
                    $workorderURL = $protocol . "://" . $_SERVER['HTTP_HOST'] . "/" . BASE_URL . "workorderdetails?workorder_id=" . $data["workorder_id"];
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
															  <p style="margin:0 10px 10px 10px;padding:0;color:black;"><br>A work order with the following subject <strong>' . $data["workorder_subject"] . '</strong> has been edited.<br>You can view the work order by clicking the link below.</p>
															  <a style="display: inline-block;background-color: rgb(255, 82, 82);font-weight: bold;text-align: center;letter-spacing: .5px;position: relative;cursor: pointer;overflow: hidden;-webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;-webkit-tap-highlight-color: transparent;vertical-align: middle;z-index: 1;-webkit-transition: .3s ease-out;transition: .3s ease-out;text-decoration: none;color: #fff;text-align: center;-webkit-box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2);box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2);border: none;border-radius: 2px;height: 36px;line-height: 36px;padding: 0 2rem;text-transform: uppercase;" href="' . $workorderURL . '" target="_blank">VIEW WORK ORDER</a>
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

                    $mail->Subject = "Work order " . $data["workorder_subject"] . " edited.";
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

    public static function deleteWorkOrder() {
        $data = $_POST;
		$workorder = WorkOrderDB::getWorkOrderByID($data["workorder_id"]);
		if ($workorder["ticket_id"] != null){
			TelephonyDB::removeTicketWorkOrder($workorder["ticket_id"]);
			TelephonyDB::addTicketAction($workorder["ticket_id"], $_SESSION["id"], "Removed workorder with number - " . $workorder["workorder_code"], 0);
		}
        WorkOrderDB::addWorkOrderAction($data["workorder_id"], $_SESSION["id"], "Work order deleted", 0);
        WorkOrderDB::deleteWorkOrder($data["workorder_id"]);
        WorkOrderDB::deleteWorkOrderItems($data["workorder_id"]);
		
		$participants = UserDB::getParticipants($workorder["assigned_to"]);
		
		foreach ($participants as $participant) {
			if ($participant["employee_online"] == 1) {
                $gcm = new GCM();
                $push = new Push();

                $sendingData = array();
				$sendingData["workorder_id"] = $data["workorder_id"];
                $sendingData['workorder_subject'] = $workorder["workorder_subject"];
                $sendingData['sentAt'] = round(microtime(true) * 1000);

                $push->setTitle("WorkorderDeleted");
                $push->setIsBackground(false);
                $push->setFlag(1);
                $push->setData($sendingData);

                $gcm->send($participant['fcm_token'], $push->getPush());
            }
            if ($participant["employee_mailing"] == 1 && $participant["workorder_notifications"] == 1) {
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
                    $workorderURL = $protocol . "://" . $_SERVER['HTTP_HOST'] . "/" . BASE_URL . "workorderdetails?workorder_id=" . $data["workorder_id"];
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
															  <p style="margin:0 10px 10px 10px;padding:0;color:black;"><br>A work order with the following subject <strong>' . $workorder["workorder_subject"] . '</strong> has been deleted.</p>
															  <a style="display: inline-block;background-color: rgb(255, 82, 82);font-weight: bold;text-align: center;letter-spacing: .5px;position: relative;cursor: pointer;overflow: hidden;-webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;-webkit-tap-highlight-color: transparent;vertical-align: middle;z-index: 1;-webkit-transition: .3s ease-out;transition: .3s ease-out;text-decoration: none;color: #fff;text-align: center;-webkit-box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2);box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2);border: none;border-radius: 2px;height: 36px;line-height: 36px;padding: 0 2rem;text-transform: uppercase;" href="' . $workorderURL . '" target="_blank">VIEW WORK ORDER</a>
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

                    $mail->Subject = "Work order " . $data["workorder_subject"] . " deleted.";
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

    public static function getWorkOrderItems() {
        $data = $_POST;
        $items = WorkOrderDB::getWorkOrderItems($data["workorder_id"]);

        echo json_encode($items);
    }

    public static function getItems() {
        $items = WorkOrderDB::getItems();
        echo json_encode($items);
    }

    public static function addItem() {
        $data = $_POST;

        $item_id = WorkOrderDB::addItem($_SESSION["id"], $data["item_name"], $data["item_serial"], $data["item_code"], $data["item_type"], $data["item_unit"], $data["item_vat"], $data["item_price"], $data["item_currency"], $data["item_description"]);

        $response = array();
        if ($item_id != null) {
            $response["error"] = false;
            $response["item_id"] = $item_id;
        }
        else {
            $response["error"] = true;
        }

        echo json_encode($response);
    }

    public static function editItem() {
        $data = $_POST;

        WorkOrderDB::editItem($data["item_id"], $data["item_name"], $data["item_serial"], $data["item_code"], $data["item_type"], $data["item_unit"], $data["item_vat"], $data["item_price"], $data["item_currency"], $data["item_description"]);
    }

    public static function deleteItem() {
        $data = $_POST;

        WorkOrderDB::deleteItem($data["item_id"]);
    }

}

?>
