<?php
require_once ("Model/EventDB.php");
require_once ("Model/CustomerDB.php");
require_once ("Model/ReminderDB.php");
require_once ("Model/UserDB.php");
require_once ("ViewHelper.php");
require_once ('libs/PHPMailer/src/Exception.php');
require_once ('libs/PHPMailer/src/PHPMailer.php');
require_once ('libs/PHPMailer/src/SMTP.php');
require_once ("Controller/gcm.php");
require_once ("Controller/push.php");
require_once ("Controller/EasyPeasyICS.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class EventController {
	
    public static function showEventPage() {
        $data = $_GET;
        $event = EventDB::getEventByID($data["event_id"]);
        $event_actions = EventDB::getEventActions($data["event_id"]);
        $participants = EventDB::getParticipants($event["participants"]);
		$files = EventDB::getEventFiles($data["event_id"]);
        ViewHelper::render("View/event_details.php", ["event" => $event, "event_actions" => $event_actions, "participants" => $participants, "files" => $files]);
    }
	
	public static function getEventDates(){
		$data = $_POST;
		$eventDates = EventDB::getEventDates($data["employee_id"]);
		
		echo json_encode($eventDates);
	}
	
	public static function updateEventStatus(){
		$data = $_POST;
		
		EventDB::updateEventStatus($data["event_id"], $data["status"]);
		
		$event = EventDB::getEventByID($data["event_id"]);
		
		$participantString = $event["participants"];
		
		$participants = EventDB::getParticipants($participantString);
		
		$statusString = "Incomplete";
		
		if ($data["status"] == 1){
			$statusString = "In progress";
		}else if ($data["status"] == 2){
			$statusString = "Finished";
		}else if ($data["status"] == 3){
			$statusString = "Canceled";
		}
		
		foreach ($participants as $participant) {
            if ($participant["employee_online"] == 1) {
                $gcm = new GCM();
                $push = new Push();

                $sendingData = array();
                $sendingData['event_subject'] = $data["event_subject"];
                $sendingData["event_startdate"] = $event["event_startdate"];
                $sendingData["event_starttime"] = $event["event_starttime"];
				$sendingData["event_status"] = $event["status"];
                $sendingData['sentAt'] = round(microtime(true) * 1000);

                $push->setTitle("EventUpdated");
                $push->setIsBackground(false);
                $push->setFlag(1);
                $push->setData($sendingData);

                $gcm->send($participant['fcm_token'], $push->getPush());
            }
			
            if ($participant["employee_mailing"] == 1 && $participant["event_notifications"] == 1) {
                $mail = new PHPMailer(true); // Passing `true` enables exceptions
                $prettyDate = date("l, d. F Y, H:i", strtotime($event_datetime));
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
                    $acceptURL = $protocol . "://" . $_SERVER['HTTP_HOST'] . "/" . BASE_URL . "event/accept?event_id=" . $event_id . "&employee_id=" . $participant["employee_id"];
                    $declineURL = $protocol . "://" . $_SERVER['HTTP_HOST'] . "/" . BASE_URL . "event/decline?event_id=" . $event_id . "&employee_id=" . $participant["employee_id"];
                    $emailBody = '<div style="background-color:#fff;margin:0 auto 0 auto;padding:30px 0 30px 0;color:#4f565d;font-size:13px;line-height:20px;font-family:\'Helvetica Neue\',Arial,sans-serif;text-align:left;">
                                            <center>
                                              <table style="width:625px;text-align:center">
                                                <tbody>
                                                  <tr>
                                                    <td style="padding:0 0 20px 0;border-bottom:1px solid #e9edee;">
                                                      <a href="https://www.netko.it" style="display:block; margin:0 auto;" target="_blank">
                                                        <img src="https://main.btrackcore.com/Pictures/logo_long.png" width="250"  alt="bTrack logo" style="border: 0px;">
                                                      </a>
                                                    </td>
                                                  </tr>
                                                  <tr>
                                                    <td colspan="2" style="padding:30px 0;">
                                                      <p style="color:#1d2227;line-height:28px;font-size:22px;margin:12px 10px 20px 10px;font-weight:400;">Hey ' . $participant["employee_name"] . " " . $participant["employee_surname"] . '</p>
                                                      <p style="margin:0 10px 10px 10px;padding:0;color:black;">An event with the <strong>' . $event["event_subject"] . '</strong> subject has had its status updated to ' . $statusString . '.</p>
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
                    $mail->Subject = "Event " . $data["event_subject"] . " status updated";
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
	
	public static function checkForDeletedEvents(){
		$data = $_POST;
		$event_uids = explode(",", $data["event_uids"]);
		$googleEvents = EventDB::getAllGoogleEvents($_SESSION["id"]);
		foreach ($googleEvents as $event){
			$uid = $event["event_uid"];
			if (!in_array($uid, $event_uids)){
				EventDB::deleteEvent($event["event_id"]);
			}
		}
	}
	
	public static function googleEventExists(){
        $data = $_POST;
        $result = EventDB::googleEventExists($data["event_uid"]);
        $exists = is_array($result);
		$event_type = "Regular";
		$importance = "Normal";
		$reminderString = "";
		$status = 0;
		$custID = null;
		$subsID = null;
		$curFiles = "";
        if ($exists){
			$result["modified"] = false;
            if ($result["last_modified"] != $data["last_modified"]){ //if event was updated on Google Calendar's side, update it in our DB aswell.
                EventDB::editGoogleEvent($data["event_uid"], $event_type, $data["event_subject"], $data["event_startdate"], $data["event_starttime"], $data["event_enddate"], $data["event_endtime"], $reminderString, $_SESSION["id"], "",
				$data["event_description"], $importance, $data["event_address"], $data["latitude"], $data["longitude"], $status, $data["last_modified"], $curFiles);
				$result["modified"] = true;
            }
        }else{
            $event_id = EventDB::addEvent($data["event_uid"], $event_type, $data["event_subject"], $data["event_startdate"], $data["event_starttime"], $data["event_enddate"], $data["event_endtime"], $reminderString, $custID, $subsID, $_SESSION["id"],
			$_SESSION["id"], "", $data["event_description"], $importance, $data["event_address"], $data["latitude"], $data["longitude"], $data["last_modified"], "");
            $result = EventDB::googleEventExists($data["event_uid"]);
			$result["modified"] = false;
        }
        $result["exists"] = $exists;
        echo json_encode($result);
    }
    
    public static function updateEventLocation(){
        $data = $_POST;
        EventDB::updateEventLocation($data["task_id"], $data["latitude"], $data["longitude"]);
    }
	
	public static function getCustomerEvents(){
		$data = $_POST;
		$events = CustomerDB::getCustomerEvents($data["customer_id"]);
		echo json_encode($events);
	}

    public static function addEventNote() {
        $data = $_POST;
        $response = array();
        $action_id = EventDB::addEventAction($_SESSION["id"], $data["event_id"], $data["description"], 1); //the 1 signifies that this action is of type NOTE, instead of a log made automatically when a event is e.g. added or edited.
        if ($action_id != null) {
            $note = EventDB::getEventActionByID($action_id);
            $response["error"] = false;
            $response["note"] = $note;
        }
        else {
            $response["error"] = true;
        }
        echo json_encode($response);
    }

    public static function uploadEventFile() {
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
        $target_dir = "Uploads/EventFiles/";
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

    public static function addEvent() {
        $data = $_POST;
        $participantString = implode(",", $data["participants"]);
        $reminderString = "";
        $externalParticipantsString = "";
        $files = explode(",", $data["files"]);
        $fileString = implode(";", $files);
        $external_names = $data["external_names"];
        $external_emails = $data["external_emails"];
        $reminder_times = $data["reminder_time"];
        $reminder_units = $data["reminder_unit"];
		
		$event_start_date = date("Y-m-d", strtotime($data["event_startdate"]));
		$event_start_time = date("H:i", strtotime($data["event_starttime"]));
		$event_end_date = date("Y-m-d", strtotime($data["event_enddate"]));
		$event_end_time = date("H:i", strtotime($data["event_endtime"]));

        $reminders = array();

        $count = 0;
		if (isset($data["reminder_time"])){
			foreach ($reminder_times as $time) {
				array_push($reminders, date("Y-m-d H:i", strtotime('-' . $time . ' ' . $reminder_units[$count], strtotime($event_start_date . " " . $event_start_time))));
				$count++;
			}
		}

        if (count($reminders) > 0) {
            $reminderString = implode(";", $reminders);
        }
		$attendees = array();
        if (isset($external_names) && !empty($external_names)) {
            $organizer = UserDB::getEmployeeByID($_SESSION["id"]);
            $count = 0;
            foreach ($external_names as $name) {
                array_push($attendees, array(
                    "name" => $name,
                    "email" => $external_emails[$count]
                ));
                if ($externalParticipantsString == "") {
                    $externalParticipantsString = $name . "|" . $external_emails[$count] . "|" . "NEEDS-ACTION";
                }
                else {
                    $externalParticipantsString .= ";" . $name . "|" . $external_emails[$count] . "|" . "NEEDS-ACTION";;
                }
                $count++;
            }
        }
		$custID = $data["customer_id"];
		if ($data["customer_id"] == ""){
			$custID = null;
		}
		$subsID = $data["subsidiary_id"];
		if ($data["subsidiary_id"] == ""){
			$subsID = null;
		}

        $event_id = EventDB::addEvent($data["event_uid"], $data["event_type"], $data["event_subject"], $event_start_date, $event_start_time, $event_end_date, $event_end_time, $reminderString, $custID, $subsID, $_SESSION["id"], $participantString, $externalParticipantsString, $data["event_description"], $data["importance"], $data["event_address"], $data["latitude"], $data["longitude"], $data["last_modified"], $fileString);
		
		foreach ($files as $filename){
			$filePath = "Uploads/EventFiles/" . $filename;
			GeneralDB::addFileUpload($_SESSION["id"], $data["customer_id"], $event_id, null, null, null, $filename, $filePath);
		}
		
		if (count($attendees) > 0){
			$uid = md5(uniqid(mt_rand(), true)) . '@bTrackIO';
			sendExternalInvites($uid, $data["event_subject"], $data["event_description"], $event_start_date . " " . $event_start_time, $event_end_date . " " . $event_end_time, $organizer, $attendees, $data["event_address"]);
			EventDB::setEventUID($event_id, $uid);
		}
		
        foreach ($reminders as $reminder) {
            if ($reminder != "") {
                ReminderDB::addReminder($event_id, $data["customer_id"], $_SESSION["id"], $reminder);
            }
        }

        EventDB::addEventAction($_SESSION["id"], $event_id, "Event created", 0);

        $participants = EventDB::getParticipants($participantString);
        $customer = CustomerDB::getCustomerByID($data["customer_id"]);
		
		$participantString = "";
		
		foreach ($participants as $participant){
			if ($participantString == ""){
				$participantString = $participant["employee_name"] . " " . $participant["employee_surname"];
			}else{
				$participantString .= ", " . $participant["employee_name"] . " " . $participant["employee_surname"];
			}
		}


        foreach ($participants as $participant) {
            if ($participant["employee_online"] == 1) {
                $gcm = new GCM();
                $push = new Push();

                $sendingData = array();
				$sendingData['event_id'] = $event_id;
                $sendingData['event_subject'] = $data["event_subject"];
                $sendingData["event_startdate"] = $event_start_date;
                $sendingData["event_starttime"] = $event_start_time;
                $sendingData['sentAt'] = round(microtime(true) * 1000);

                $push->setTitle("Event");
                $push->setIsBackground(false);
                $push->setFlag(1);
                $push->setData($sendingData);

                $gcm->send($participant['fcm_token'], $push->getPush());
            }
			
			$creator = UserDB::getEmployeeByID($_SESSION["id"]);

            if ($participant["employee_id"] != $_SESSION["id"] && $participant["employee_mailing"] == 1 && $participant["event_notifications"] == 1) {
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
                    $acceptURL = $protocol . "://" . $_SERVER['HTTP_HOST'] . "/" . BASE_URL . "event/accept?event_id=" . $event_id . "&employee_id=" . $participant["employee_id"];
                    $declineURL = $protocol . "://" . $_SERVER['HTTP_HOST'] . "/" . BASE_URL . "event/decline?event_id=" . $event_id . "&employee_id=" . $participant["employee_id"];
                    $emailBody = '<div style="background-color:#fff;margin:0 auto 0 auto;padding:30px 0 30px 0;color:#4f565d;font-size:13px;line-height:20px;font-family:\'Helvetica Neue\',Arial,sans-serif;text-align:left;">
                                            <center>
                                              <table style="width:625px;text-align:center">
                                                <tbody>
                                                  <tr>
                                                    <td style="padding:0 0 20px 0;border-bottom:1px solid #e9edee;">
                                                      <a href="https://www.netko.it" style="display:block; margin:0 auto;" target="_blank">
                                                        <img src="https://main.btrackcore.com/Pictures/logo_long.png" width="250" alt="bTrack logo" style="border: 0px;">
                                                      </a>
                                                    </td>
                                                  </tr>
                                                  <tr>
                                                    <td colspan="2" style="padding:30px 0;">
                                                      <p style="color:#1d2227;line-height:28px;font-size:22px;margin:12px 10px 20px 10px;font-weight:400;">Hey ' . $participant["employee_name"] . " " . $participant["employee_surname"] . '</p>
                                                      <p style="margin:0 10px 10px 10px;padding:0;color:black;">' . $creator["employee_name"] . " " . $creator["employee_surname"] . ' has invited you to participate in a event with the subject <strong>' . $data["event_subject"] . '</strong>.<br>The event is scheduled on <strong>' . $event_start_date . ' at ' . $event_start_time . ' </strong>.<br>Participants: ' . $participantString . '<br><br><strong>Description:</strong><br>' . $data["event_description"] . '.<br><br>You can either accept or decline the invitation by clicking one of the buttons below.</p>
                                                      <a style="display: inline-block;background-color: #33B679;font-weight: bold;text-align: center;letter-spacing: .5px;position: relative;cursor: pointer;overflow: hidden;-webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;-webkit-tap-highlight-color: transparent;vertical-align: middle;z-index: 1;-webkit-transition: .3s ease-out;transition: .3s ease-out;text-decoration: none;color: #fff;text-align: center;-webkit-box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2);box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2);border: none;border-radius: 2px;height: 36px;line-height: 36px;padding: 0 2rem;text-transform: uppercase;" href="' . $acceptURL . '" target="_blank">Accept</a>
                                                      <a style="display: inline-block;background-color: rgb(255, 82, 82);font-weight: bold;text-align: center;letter-spacing: .5px;position: relative;cursor: pointer;overflow: hidden;-webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;-webkit-tap-highlight-color: transparent;vertical-align: middle;z-index: 1;-webkit-transition: .3s ease-out;transition: .3s ease-out;text-decoration: none;color: #fff;text-align: center;-webkit-box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2);box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2);border: none;border-radius: 2px;height: 36px;line-height: 36px;padding: 0 2rem;text-transform: uppercase;" href="' . $declineURL . '" target="_blank">Decline</a>
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
                    $mail->Subject = "New event " . $data["event_subject"] . " added";
                    $mail->msgHTML($emailBody);

                    $mail->send();
                }
                catch(Exception $e) {
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                }
            }
            else if ($participant["employee_mailing"] == 1 && $participant["event_notifications"] == 1) {
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
                    $acceptURL = $protocol . "://" . $_SERVER['HTTP_HOST'] . "/" . BASE_URL . "event/accept?event_id=" . $event_id . "&employee_id=" . $participant["employee_id"];
                    $declineURL = $protocol . "://" . $_SERVER['HTTP_HOST'] . "/" . BASE_URL . "event/decline?event_id=" . $event_id . "&employee_id=" . $participant["employee_id"];
                    $emailBody = '<div style="background-color:#fff;margin:0 auto 0 auto;padding:30px 0 30px 0;color:#4f565d;font-size:13px;line-height:20px;font-family:\'Helvetica Neue\',Arial,sans-serif;text-align:left;">
                                            <center>
                                              <table style="width:625px;text-align:center">
                                                <tbody>
                                                  <tr>
                                                    <td style="padding:0 0 20px 0;border-bottom:1px solid #e9edee;">
                                                      <a href="https://www.netko.it" style="display:block; margin:0 auto;" target="_blank">
                                                        <img src="https://main.btrackcore.com/Pictures/logo_long.png" width="250"  alt="bTrack logo" style="border: 0px;">
                                                      </a>
                                                    </td>
                                                  </tr>
                                                  <tr>
                                                    <td colspan="2" style="padding:30px 0;">
                                                      <p style="color:#1d2227;line-height:28px;font-size:22px;margin:12px 10px 20px 10px;font-weight:400;">Hey ' . $participant["employee_name"] . " " . $participant["employee_surname"] . '</p>
                                                      <p style="margin:0 10px 10px 10px;padding:0;color:black;">You\'ve successfully created a event with the subject <strong>' . $data["event_subject"] . '</strong>.<br>The event is scheduled on <strong>' . $event_start_date . ' at ' . $event_start_time . ' </strong>.<br><br><strong>Description:</strong><br>' . $data["event_description"] . '.</p>
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
                    $mail->Subject = "New event " . $data["event_subject"] . " added";
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

    public static function editEvent() {
        $data = $_POST;
        $participantString = implode(",", $data["participants"]);
        $files = explode(",", $data["files"]);
        $fileString = "";
        $reminderString = "";
        $external_names = $data["external_names"];
        $external_emails = $data["external_emails"];
        $reminder_times = $data["reminder_time"];
        $reminder_units = $data["reminder_unit"];

        $event = EventDB::getEventByID($data["event_id"]);

        $externalParticipantsString = $event["external_participants"];

        if (isset($data["event_reminder"]) && !empty($data["event_reminder"])) {
            $reminders = $data["event_reminder"];
        }
        else {
            $reminders = array();
        }
		
		$event_start_date = date("Y-m-d", strtotime($data["event_startdate"]));
		$event_start_time = date("H:i", strtotime($data["event_starttime"]));
		$event_end_date = date("Y-m-d", strtotime($data["event_enddate"]));
		$event_end_time = date("H:i", strtotime($data["event_endtime"]));

        $count = 0;
        foreach ($reminder_times as $time) {
            array_push($reminders, date("Y-m-d H:i", strtotime('-' . $time . ' ' . $reminder_units[$count], strtotime($event_start_date . " " . $event_start_time))));
            $count++;
        }

        if (count($reminders) > 0) {
            $reminderString = implode(";", $reminders);

            ReminderDB::removeEventReminders($data["event_id"]);

            foreach ($reminders as $reminder) {
                if ($reminder != "") {
                    ReminderDB::addReminder($data["event_id"], $data["customer_id"], $_SESSION["id"], $reminder);
                }
            }
        }
		
		$organizer = UserDB::getEmployeeByID($_SESSION["id"]);
		$attendees = array();

        if ($event["external_participants"] != "") {
                $current_atendees = explode(";", $event["external_participants"]);
                foreach ($current_atendees as $atendee) {
                    if ($atendee != "") {
                        $exploded = explode("|", $atendee);
                        array_push($attendees, array(
                            "name" => $exploded[0],
                            "email" => $exploded[1]
                        ));
                    }
                }
        }
		
        if (isset($external_names) && !empty($external_names)) {
            $count = 0;
            foreach ($external_names as $name) {
                array_push($attendees, array(
                    "name" => $name,
                    "email" => $external_emails[$count]
                ));
                if ($externalParticipantsString == "") {
                    $externalParticipantsString = $name . "|" . $external_emails[$count] . "|" . "NEEDS-ACTION";
                }
                else {
                    $externalParticipantsString .= ";" . $name . "|" . $external_emails[$count] . "|" . "NEEDS-ACTION";
                }
                $count++;
            }
        }
		
		if (count($attendees) > 0){
			$uid = $event["event_uid"];
			if ($uid == ""){
				$uid = md5(uniqid(mt_rand(), true)) . '@bTrackIO';
				EventDB::setEventUID($data["event_id"], $uid);
			}
			sendExternalInvites($iuid, $data["event_subject"], $data["event_description"], $event_start_date . " " . $event_start_time, $event_end_date . " " . $event_end_time, $organizer, $attendees, $data["event_address"]);
		}
		
        $curFiles = $event["event_files"];

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
		
		$custID = $data["customer_id"];
		if ($data["customer_id"] == ""){
			$custID = null;
		}
		$subsID = $data["subsidiary_id"];
		if ($data["subsidiary_id"] == ""){
			$subsID = null;
		}

        EventDB::editEvent($data["event_id"], $data["event_uid"], $data["event_type"], $data["event_subject"], $event_start_date, $event_start_time, $event_end_date, $event_end_time, $reminderString, $custID, $subsID, $participantString, $externalParticipantsString, $data["event_description"], $data["importance"], $data["event_address"], $data["latitude"], $data["longitude"], $data["status"], $data["last_modified"], $curFiles);
		
		foreach ($files as $filename){
			$filePath = "Uploads/EventFiles/" . $filename;
			GeneralDB::addFileUpload($_SESSION["id"], $data["customer_id"], $data["event_id"], null, null, null, $filename, $filePath);
		}
		
		$edited_fields = array();
		if ($event["event_type"] != $data["event_type"]){
			array_push($edited_fields, "Type changed to " . $data["event_type"]);
		}
		if ($event["event_subject"] != $data["event_subject"]){
			array_push($edited_fields, "Subject changed to " . $data["event_subject"]);
		}
		if ($event["event_startdate"] != $event_start_date){
			array_push($edited_fields, "Start date changed to " . $event_start_date);
		}
		if ($event["event_starttime"] != $event_end_time){
			array_push($edited_fields, "Start time changed to " . $event_start_time);
		}
		if ($event["event_enddate"] != $event_end_date){
			array_push($edited_fields, "End date changed to " . $event_end_date);
		}
		if ($event["event_endtime"] != $event_end_time){
			array_push($edited_fields, "End time changed to " . $event_end_time);
		}
		if ($event["customer_id"] != $custID){
			if ($custID == null){
				$custname = "None";
			}else{
				$custname = CustomerDB::getCustomerByID($custID)["customer_name"];
			}
			array_push($edited_fields, "Customer changed to " . $custname);
		}
		if ($event["participants"] != $participantString){
			$newParticipants = EventDB::getParticipants($participantString);
			$pString = "";
			foreach ($newParticipants as $prc){
				if ($pString == ""){
					$pString = $prc["employee_name"] . " " . $prc["employee_surname"];
				}else{
					$pString .= ", " . $prc["employee_name"] . " " . $prc["employee_surname"];
				}
			}
			array_push($edited_fields, "Participants changed to " . $pString);
		}
		if ($event["event_address"] != $data["event_address"]){
			array_push($edited_fields, "Address changed to " . $data["event_address"]);
		}
		if ($event["status"] != $data["status"]){
			$statusString = "Canceled";
			if ($data["status"] == 0){
				$statusString = "Incomplete";
			}else if ($data["status"] == 1){
				$statusString = "In progress";
			}else if ($data["status"] == 2){
				$statusString = "Finished";
			}
			array_push($edited_fields, "Status changed to " . $statusString);
		}
		
		$editedFieldsString = "Updated fields - " . implode(", ", $edited_fields);
        EventDB::addEventAction($_SESSION["id"], $data["event_id"], "Event edited:<br>" . $editedFieldsString, 0);

        $participants = EventDB::getParticipants($event["participants"]);

        foreach ($participants as $participant) {
            if ($participant["employee_online"] == 1) {
                $gcm = new GCM();
                $push = new Push();

                $sendingData = array();
				$sendingData['event_id'] = $data["event_id"];
                $sendingData['event_subject'] = $event["event_subject"];
                $sendingData["event_startdate"] = $event_start_date;
                $sendingData["event_starttime"] = $event_start_time;
                $sendingData["status"] = $event["status"];
                $sendingData['sentAt'] = round(microtime(true) * 1000);

                $push->setTitle("EventUpdated");
                $push->setIsBackground(false);
                $push->setFlag(1);
                $push->setData($sendingData);

                $gcm->send($participant['fcm_token'], $push->getPush());
            }

            if ($participant["employee_id"] != $_SESSION["id"] && $participant["employee_mailing"] == 1 && $participant["event_notifications"] == 1) {
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
                    $emailBody = '<div style="background-color:#fff;margin:0 auto 0 auto;padding:30px 0 30px 0;color:#4f565d;font-size:13px;line-height:20px;font-family:\'Helvetica Neue\',Arial,sans-serif;text-align:left;">
                                            <center>
                                              <table style="width:625px;text-align:center">
                                                <tbody>
                                                  <tr>
                                                    <td style="padding:0 0 20px 0;border-bottom:1px solid #e9edee;">
                                                      <a href="https://www.netko.it" style="display:block; margin:0 auto;" target="_blank">
                                                        <img src="https://main.btrackcore.com/Pictures/logo_long.png" width="250"  alt="bTrack logo" style="border: 0px;">
                                                      </a>
                                                    </td>
                                                  </tr>
                                                  <tr>
                                                    <td colspan="2" style="padding:30px 0;">
                                                      <p style="color:#1d2227;line-height:28px;font-size:22px;margin:12px 10px 20px 10px;font-weight:400;">Hey ' . $participant["employee_name"] . " " . $participant["employee_surname"] . '</p>
                                                      <p style="margin:0 10px 10px 10px;padding:0;color:black;">A event with the subject <strong>' . $data["event_subject"] . '</strong> has been edited by <strong>' . $editor["employee_name"] . " " . $editor["employee_surname"] . '</strong><br>The event is currently scheduled on <strong>' . $event_start_date . ' at ' . $event_start_time . ' </strong>.<br><br><strong>Description:</strong><br>' . $data["event_description"] . '.</p>
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
                    $mail->Subject = "Event " . $data["event_subject"] . " edited";
                    $mail->msgHTML($emailBody);

                    $mail->send();
                }
                catch(Exception $e) {
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                }
            }
            else if ($participant["employee_mailing"] == 1 && $participant["event_notifications"] == 1) {
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
                    $emailBody = '<div style="background-color:#fff;margin:0 auto 0 auto;padding:30px 0 30px 0;color:#4f565d;font-size:13px;line-height:20px;font-family:\'Helvetica Neue\',Arial,sans-serif;text-align:left;">
                                            <center>
                                              <table style="width:625px;text-align:center">
                                                <tbody>
                                                  <tr>
                                                    <td style="padding:0 0 20px 0;border-bottom:1px solid #e9edee;">
                                                      <a href="https://www.netko.it" style="display:block; margin:0 auto;" target="_blank">
                                                        <img src="https://main.btrackcore.com/Pictures/logo_long.png" width="250"  alt="bTrack logo" style="border: 0px;">
                                                      </a>
                                                    </td>
                                                  </tr>
                                                  <tr>
                                                    <td colspan="2" style="padding:30px 0;">
                                                      <p style="color:#1d2227;line-height:28px;font-size:22px;margin:12px 10px 20px 10px;font-weight:400;">Hey ' . $participant["employee_name"] . " " . $participant["employee_surname"] . '</p>
                                                      <p style="margin:0 10px 10px 10px;padding:0;color:black;">You\'ve successfully edited a event with the subject <strong>' . $data["event_subject"] . '</strong>.<br>The event is currently scheduled on <strong>' . $event_start_date . ' at ' . $event_start_time . ' </strong>.<br><br><strong>Description:</strong><br>' . $data["event_description"] . '.</p>
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
                    $mail->Subject = "Event " . $data["event_subject"] . " edited";
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

    public static function acceptInvite() {
        $event = EventDB::getEventByID($_GET["event_id"]);
        $accepted_by = array();
        $declined_by = array();
        if ($event["accepted_by"] != "") {
            $accepted_by = explode(",", $event["accepted_by"]);
        }
        if ($event["declined_by"] != "") {
            $declined_by = explode(",", $event["declined_by"]);
        }
        $employee = UserDB::getEmployeeById($_GET["employee_id"]);
        if (array_search($employee["employee_id"], $accepted_by) === false) {
            array_push($accepted_by, $employee["employee_id"]);
            $indexInDeclined = array_search($employee["employee_id"], $declined_by);
            if ($indexInDeclined !== false) {
                array_splice($declined_by, $indexInDeclined, 1);
            }
            EventDB::changeEventParticipants($event["event_id"], implode(",", $accepted_by) , implode(",", $declined_by));
            ViewHelper::render("View/inviteaccepted.php", ["message" => "Event invite has been successfully accepted."]);

            if ($creator["employee_mailing"] == 1 && $participant["event_notifications"] == 1) {
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

                    $mail->addAddress($creator["employee_email"], $creator["employee_email"]); // Add a recipient
                    //Content
                    $mail->isHTML(true); // Set email format to HTML
                    
                    $emailBody = '<div style="background-color:#fff;margin:0 auto 0 auto;padding:30px 0 30px 0;color:#4f565d;font-size:13px;line-height:20px;font-family:\'Helvetica Neue\',Arial,sans-serif;text-align:left;">
												<center>
												  <table style="width:625px;text-align:center">
													<tbody>
													  <tr>
														<td style="padding:0 0 20px 0;border-bottom:1px solid #e9edee;">
														  <a href="https://www.netko.it" style="display:block; margin:0 auto;" target="_blank">
															<img src="https://main.btrackcore.com/Pictures/logo_long.png" width="250"  alt="bTrack logo" style="border: 0px;">
														  </a>
														</td>
													  </tr>
													  <tr>
														<td colspan="2" style="padding:30px 0;">
														  <p style="color:#1d2227;line-height:28px;font-size:22px;margin:12px 10px 20px 10px;font-weight:400;">Hey ' . $participant["employee_name"] . " " . $participant["employee_surname"] . '</p>
														  <p style="margin:0 10px 10px 10px;padding:0;color:black;"><strong>' . $employee["employee_name"] . " " . $employee["employee_surname"] . '</strong> has accepted your invitation for a event with the subject <strong>' . $event["event_subject"] . '</strong></p>
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
                    $mail->Subject = "Event " . $data["event_subject"] . " invitation accepted";
                    $mail->msgHTML($emailBody);

                    $mail->send();
                }
                catch(Exception $e) {
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                }
            }
        }
        else {
            ViewHelper::render("View/inviteaccepted.php", ["message" => "You're already participating in this event."]);
        }
    }

    public static function declineInvite() {
        $event = EventDB::getEventByID($_GET["event_id"]);
        $creator = UserDB::getEmployeeById($event["employee_id"]);
        $accepted_by = array();
        $declined_by = array();
        if ($event["accepted_by"] != "") {
            $accepted_by = explode(",", $event["accepted_by"]);
        }
        if ($event["declined_by"] != "") {
            $declined_by = explode(",", $event["declined_by"]);
        }
        $employee = UserDB::getEmployeeById($_GET["employee_id"]);
        if (array_search($employee["employee_id"], $declined_by) === false) {
            array_push($declined_by, $employee["employee_id"]);
            $indexInAccepted = array_search($employee["employee_id"], $accepted_by);
            if ($indexInAccepted !== false) {
                array_splice($accepted_by, $indexInAccepted, 1);
            }
            EventDB::changeEventParticipants($event["event_id"], implode(",", $accepted_by) , implode(",", $declined_by));
            ViewHelper::render("View/inviteaccepted.php", ["message" => "Event invite has been successfully declined."]);

            if ($creator["employee_mailing"] == 1 && $participant["event_notifications"] == 1) {
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

                    $mail->addAddress($creator["employee_email"], $creator["employee_email"]); // Add a recipient
                    //Content
                    $mail->isHTML(true); // Set email format to HTML
                    
                    $emailBody = '<div style="background-color:#fff;margin:0 auto 0 auto;padding:30px 0 30px 0;color:#4f565d;font-size:13px;line-height:20px;font-family:\'Helvetica Neue\',Arial,sans-serif;text-align:left;">
												<center>
												  <table style="width:625px;text-align:center">
													<tbody>
													  <tr>
														<td style="padding:0 0 20px 0;border-bottom:1px solid #e9edee;">
														  <a href="https://www.netko.it" style="display:block; margin:0 auto;" target="_blank">
															<img src="https://main.btrackcore.com/Pictures/logo_long.png" width="250"  alt="bTrack logo" style="border: 0px;">
														  </a>
														</td>
													  </tr>
													  <tr>
														<td colspan="2" style="padding:30px 0;">
														  <p style="color:#1d2227;line-height:28px;font-size:22px;margin:12px 10px 20px 10px;font-weight:400;">Hey ' . $participant["employee_name"] . " " . $participant["employee_surname"] . '</p>
														  <p style="margin:0 10px 10px 10px;padding:0;color:black;"><strong>' . $employee["employee_name"] . " " . $employee["employee_surname"] . '</strong> has declined your invitation for a event with the subject <strong>' . $event["event_subject"] . '</strong></p>
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
                    $mail->Subject = "Event " . $data["event_subject"] . " invitation declined";
                    $mail->msgHTML($emailBody);

                    $mail->send();
                }
                catch(Exception $e) {
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                }
            }
        }
        else {
            ViewHelper::render("View/inviteaccepted.php", ["message" => "You've already declined your participation in this event."]);
        }
    }

    public static function deleteEvent() {
        $data = $_POST;
        $event = EventDB::getEventByID($data["event_id"]);
        $employee = UserDB::getEmployeeById($_SESSION["id"]);
		
        if ($event["external_participants"] != "") {
				$attendees = array();
                $current_atendees = explode(";", $event["external_participants"]);
                foreach ($current_atendees as $atendee) {
                    if ($atendee != "") {
                        $exploded = explode("|", $atendee);
                        array_push($attendees, array(
                            "name" => $exploded[0],
                            "email" => $exploded[1]
                        ));
                    }
                }
				sendExternalCancellations($event["event_uid"], $event["event_subject"], $event["event_description"], $event["event_startdate"] . " " . $event["event_starttime"], $event["event_enddate"] . " " . $event["event_endtime"], $employee, $attendees, $event["event_address"]);
        }
		
        ReminderDB::removeEventReminders($data["event_id"]);
        $participants = EventDB::getParticipants($event["participants"]);
        foreach ($participants as $participant) {
			if ($participant["employee_online"] == 1) {
                $gcm = new GCM();
                $push = new Push();

                $sendingData = array();
				$sendingData['event_id'] = $data["event_id"];
                $sendingData['event_subject'] = $event["event_subject"];
                $sendingData['sentAt'] = round(microtime(true) * 1000);

                $push->setTitle("EventDeleted");
                $push->setIsBackground(false);
                $push->setFlag(1);
                $push->setData($sendingData);

                $gcm->send($participant['fcm_token'], $push->getPush());
            }
            if ($participant["employee_id"] != $_SESSION["id"] && $participant["employee_mailing"] == 1 && $participant["event_notifications"] == 1) {
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
                    $emailBody = '<div style="background-color:#fff;margin:0 auto 0 auto;padding:30px 0 30px 0;color:#4f565d;font-size:13px;line-height:20px;font-family:\'Helvetica Neue\',Arial,sans-serif;text-align:left;">
												<center>
												  <table style="width:625px;text-align:center">
													<tbody>
													  <tr>
														<td style="padding:0 0 20px 0;border-bottom:1px solid #e9edee;">
														  <a href="https://www.netko.it" style="display:block; margin:0 auto;" target="_blank">
															<img src="https://main.btrackcore.com/Pictures/logo_long.png" width="250"  alt="bTrack logo" style="border: 0px;">
														  </a>
														</td>
													  </tr>
													  <tr>
														<td colspan="2" style="padding:30px 0;">
														  <p style="color:#1d2227;line-height:28px;font-size:22px;margin:12px 10px 20px 10px;font-weight:400;">Hey ' . $participant["employee_name"] . " " . $participant["employee_surname"] . '</p>
														  <p style="margin:0 10px 10px 10px;padding:0;color:black;">A event with the subject <strong>' . $data["event_subject"] . '</strong> has been deleted by ' . $employee["employee_name"] . " " . $employee["employee_surname"] . '.</p>
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
                    $mail->Subject = "Event " . $data["event_subject"] . " deleted";
                    $mail->msgHTML($emailBody);

                    $mail->send();
                }
                catch(Exception $e) {
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                }
            }
            else if ($participant["employee_mailing"] == 1 && $participant["event_notifications"] == 1) {
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
                    $emailBody = '<div style="background-color:#fff;margin:0 auto 0 auto;padding:30px 0 30px 0;color:#4f565d;font-size:13px;line-height:20px;font-family:\'Helvetica Neue\',Arial,sans-serif;text-align:left;">
												<center>
												  <table style="width:625px;text-align:center">
													<tbody>
													  <tr>
														<td style="padding:0 0 20px 0;border-bottom:1px solid #e9edee;">
														  <a href="https://www.netko.it" style="display:block; margin:0 auto;" target="_blank">
															<img src="https://main.btrackcore.com/Pictures/logo_long.png" width="250"  alt="bTrack logo" style="border: 0px;">
														  </a>
														</td>
													  </tr>
													  <tr>
														<td colspan="2" style="padding:30px 0;">
														  <p style="color:#1d2227;line-height:28px;font-size:22px;margin:12px 10px 20px 10px;font-weight:400;">Hey ' . $participant["employee_name"] . " " . $participant["employee_surname"] . '</p>
														  <p style="margin:0 10px 10px 10px;padding:0;color:black;">You\'ve successfully deleted a event with the subject <strong>' . $event["event_subject"] . '</strong>.</p>
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
                    $mail->Subject = "Event " . $event["event_subject"] . " with " . $event["customer_name"]. " deleted";
                    $mail->msgHTML($emailBody);

                    $mail->send();
                }
                catch(Exception $e) {
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                }
            }
            EventDB::deleteEvent($data["event_id"]);

            EventDB::addEventAction($_SESSION["id"], $data["event_id"], "Event deleted", 1);
        }
    }

    public static function getEvents() {
        $events = EventDB::getEvents();
        echo json_encode($events);
    }

    public static function getAllTodaysEvents() {
        $events = EventDB::getAllTodaysEvents();
        echo json_encode($events);
    }

    public static function getEventsLastWeek() {
        $events = EventDB::getEventsLastWeek();
        echo json_encode($events);
    }

    public static function getTodaysEvents() {
        $data = $_POST;
        $events = EventDB::getTodaysEvents($data["employee_id"]);
        echo json_encode($events);
    }

    public static function setEventStatus() {
        $data = $_POST;
        $event = EventDB::getEventByID($data["event_id"]);
        EventDB::setEventStatus($data["event_id"], $data["status"]);

        $participants = EventDB::getParticipants($event["participants"]);

        foreach ($participants as $participant) {
            if ($participant["employee_online"] == 1) {
                $gcm = new GCM();
                $push = new Push();

                $sendingData = array();
                $sendingData['event_subject'] = $event["event_subject"];
                $sendingData["event_startdate"] = $event["event_startdate"];
                $sendingData["event_starttime"] = $event["event_starttime"];
                $sendingData["status"] = $data["status"];
                $sendingData['sentAt'] = round(microtime(true) * 1000);

                $push->setTitle("EventUpdated");
                $push->setIsBackground(false);
                $push->setFlag(1);
                $push->setData($sendingData);

                $gcm->send($participant['fcm_token'], $push->getPush());
            }
        }

    }

    public static function updateEvent() { //called when we change event datetime via calendar.
        $data = $_POST;
        $event = EventDB::getEventByID($data["event_id"]);
		$editor = UserDB::getEmployeeById($_SESSION["id"]);
		
		$event_start_date = date("Y-m-d", strtotime($data["event_startdate"]));
		$event_start_time = date("H:i", strtotime($data["event_starttime"]));
		$event_end_date = date("Y-m-d", strtotime($data["event_enddate"]));
		$event_end_time = date("H:i", strtotime($data["event_endtime"]));
		
        EventDB::updateEvent($data["event_id"], $event_start_date, $event_start_time, $event_end_date, $event_end_time);
        EventDB::addEventAction($_SESSION["id"], $data["event_id"], "Event rescheduled to " . $event_start_date . " " . $event_start_time, 0);

        $participants = EventDB::getParticipants($event["participants"]);

        foreach ($participants as $participant) {
			if ($participant["employee_mailing"] == 1 && $participant["event_notifications"] == 1) {
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
					$emailBody = '<div style="background-color:#fff;margin:0 auto 0 auto;padding:30px 0 30px 0;color:#4f565d;font-size:13px;line-height:20px;font-family:\'Helvetica Neue\',Arial,sans-serif;text-align:left;">
												<center>
												  <table style="width:625px;text-align:center">
													<tbody>
													  <tr>
														<td style="padding:0 0 20px 0;border-bottom:1px solid #e9edee;">
														  <a href="https://www.netko.it" style="display:block; margin:0 auto;" target="_blank">
															<img src="https://main.btrackcore.com/Pictures/logo_long.png" width="250"  alt="bTrack logo" style="border: 0px;">
														  </a>
														</td>
													  </tr>
													  <tr>
														<td colspan="2" style="padding:30px 0;">
														  <p style="color:#1d2227;line-height:28px;font-size:22px;margin:12px 10px 20px 10px;font-weight:400;">Hey ' . $participant["employee_name"] . " " . $participant["employee_surname"] . '</p>
														  <p style="margin:0 10px 10px 10px;padding:0;color:black;">A event with the subject <strong>' . $event["event_subject"] . '</strong> with <strong>' . $event["customer_name"] . '</strong> has been rescheduled by ' . $editor["employee_name"] . " " . $editor["employee_surname"] . '</strong>.<br>The event is currently scheduled on <strong>' . $event_start_date . ' at ' . $event_start_time . ' </strong>.</p>
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
					$mail->Subject = "Event " . $event["event_subject"] . " with " . $event["customer_name"] . " rescheduled";
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

    public static function getEmployeeEvents() {
        $data = $_POST;
        $events = EventDB::getEmployeeEvents($data["employee_id"]);
        echo json_encode($events);
    }

}

function sendExternalInvites($uid, $event_subject, $event_description, $event_startdatetime, $event_enddatetime, $organizer, $attendees, $location) {
    $mail = new PHPMailer(true); // Passing `true` enables exceptions
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
    foreach ($attendees as $attendee) {
        $mail->addAddress($attendee["email"], $attendee["email"]); // Add a recipient
        
    }
    $ical = new EasyPeasyICS();
    $ical->setOrganizer($organizer["employee_name"] . " " . $organizer["employee_surname"], $organizer["employee_email"]);
    $ical->addEvent(strtotime($event_startdatetime) , strtotime($event_enddatetime) , $event_subject, $event_description, $attendees, $location, "", $uid);
    $ical->setName('schedule');
    $mail->msgHTML('Invitation to ' . $event_subject);
    $mail->Subject .= 'Invitation to ' . $event_subject;
    $mail->Ical = $ical->render(false);
    //$mail->AddStringAttachment($ical->render(false), "invite.ics", "base64", "text/calendar; charset=UTF-8; method=REQUEST");
    $mail->send();
}

function sendExternalCancellations($uid, $event_subject, $event_description, $event_startdatetime, $event_enddatetime, $organizer, $attendees, $location){
	$mail = new PHPMailer(true); // Passing `true` enables exceptions
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
    foreach ($attendees as $attendee) {
        $mail->addAddress($attendee["email"], $attendee["email"]); // Add a recipient
        
    }
    $ical = new EasyPeasyICS();
    $ical->setOrganizer($organizer["employee_name"] . " " . $organizer["employee_surname"], $organizer["employee_email"]);
    $ical->addEvent(strtotime($event_startdatetime) , strtotime($event_enddatetime) , $event_subject, $event_description, $attendees, $location, "", $uid);
    $ical->setName('schedule');
    $mail->msgHTML('Event ' . $event_subject . " deleted");
    $mail->Subject .= 'Event ' . $event_subject . " deleted";
    $mail->Ical = $ical->renderCancellation(false);
    //$mail->AddStringAttachment($ical->render(false), "invite.ics", "base64", "text/calendar; charset=UTF-8; method=REQUEST");
    $mail->send();
}

?>
