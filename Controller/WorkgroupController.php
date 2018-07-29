<?php
require_once ("Model/WorkgroupDB.php");
require_once ("Model/UserDB.php");
require_once ('libs/PHPMailer/src/Exception.php');
require_once ('libs/PHPMailer/src/PHPMailer.php');
require_once ('libs/PHPMailer/src/SMTP.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class WorkgroupController {

    public static function showTaskPage() {
        $data = $_GET;
        $task = WorkgroupDB::getTaskByID($data["task_id"]);
        $task_actions = WorkgroupDB::getTaskActions($data["task_id"]);
        $participants = WorkgroupDB::getWorkgroupEmployees($task["participants"]);
		$files = WorkgroupDB::getWorkgroupTaskFiles($data["task_id"]);
		$workgroupmembers = WorkgroupDB::getWorkgroupMembers($task["workgroup_id"]);
        ViewHelper::render("View/task_details.php", ["task" => $task, "task_actions" => $task_actions, "participants" => $participants, "members" => $workgroupmembers]);
    }
	
	public static function getHistory(){
		$data = $_POST;
		$history = WorkgroupDB::getWorkgroupActivity($data["workgroup_id"]);
		echo json_encode($history);
	}

    public static function addTaskNote() {
        $data = $_POST;
        $response = array();
        $task = WorkgroupDB::getTaskByID($data["task_id"]);
        $employee = UserDB::getEmployeeById($_SESSION["id"]);
        $action_id = WorkgroupDB::addTaskAction($data["task_id"], $_SESSION["id"], $data["description"], 1); //the 1 signifies that this action is of type NOTE, instead of a log made automatically when a meeting is e.g. added or edited.
        WorkgroupDB::addWorkgroupActivity($task["workgroup_id"], $_SESSION["id"], "Note added to task with subject " . $task["task_subject"]);
		if ($action_id != null) {
            $note = WorkgroupDB::getTaskActionByID($action_id);
            $participants = WorkgroupDB::getWorkgroupEmployees($task["participants"]);

            foreach ($participant as $participant) {
                if ($participant["employee_mailing"] == 1 && $participant["workgroup_notifications"] == 1) {
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
                        $workgroupURL = $protocol . "://" . $_SERVER['HTTP_HOST'] . "/" . BASE_URL . "workgroupdetails?workgroup_id=" . $task["workgroup_id"];
                        $emailBody = '<div style="background-color:#fff;margin:0 auto 0 auto;padding:30px 0 30px 0;color:#4f565d;font-size:13px;line-height:20px;font-family:\'Helvetica Neue\',Arial,sans-serif;text-align:left;">
											<center>
											  <table style="width:625px;text-align:center">
												<tbody>
												  <tr>
													<td style="padding:0 0 20px 0;border-bottom:1px solid #e9edee;">
													  <a href="https://www.netko.it" style="display:block; margin:0 auto;" target="_blank">
														<img src="https://main.btrackcore.com/Pictures/logo_long.png" width="75" height="75" alt="bTrack logo" style="border: 0px;">
													  </a>
													</td>
												  </tr>
												  <tr>
													<td colspan="2" style="padding:30px 0;">
													  <p style="color:#1d2227;line-height:28px;font-size:22px;margin:12px 10px 20px 10px;font-weight:400;">Hey ' . $participant["employee_name"] . " " . $participant["employee_surname"] . '</p>
													  <p style="margin:0 10px 10px 10px;padding:0;color:black;"><br>' . $employee["employee_name"] . " " . $employee["employee_surname"] . " has added a note to a task with the subject <strong>" . $task["task_subject"] . '</strong>.<br>You can view the task by clicking the link below.</p>
													  <a style="display: inline-block;background-color: rgb(255, 82, 82);font-weight: bold;text-align: center;letter-spacing: .5px;position: relative;cursor: pointer;overflow: hidden;-webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;-webkit-tap-highlight-color: transparent;vertical-align: middle;z-index: 1;-webkit-transition: .3s ease-out;transition: .3s ease-out;text-decoration: none;color: #fff;text-align: center;-webkit-box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2);box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2);border: none;border-radius: 2px;height: 36px;line-height: 36px;padding: 0 2rem;text-transform: uppercase;" href="' . $workgroupURL . '" target="_blank">GO TO WORKGROUP</a>
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

                        $mail->Subject = "Task " . $task["task_subject"] . " note added";
                        $mail->msgHTML($emailBody);

                        $mail->send();
                    }
                    catch(Exception $e) {
                        echo 'Message could not be sent.';
                        echo 'Mailer Error: ' . $mail->ErrorInfo;
                    }
                }
            }
            $response["error"] = false;
            $response["note"] = $note;
        }
        else {
            $response["error"] = true;
        }
        echo json_encode($response);
    }

    public static function uploadTaskFile() {
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
        $target_dir = "Workgroups/Workgroup" . $_POST["workgroup_id"] . "/";
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

    public static function getWorkgroupList() {
        $workgroups = WorkgroupDB::getWorkgroupList();
        echo json_encode($workgroups);
    }

    public static function setTaskOpened() {
        $data = $_POST;
        $curdate = date("Y-m-d H:i:s");
        WorkgroupDB::setTaskOpened($data["task_id"], $curdate);
		WorkgroupDB::addTaskAction($data["task_id"], $_SESSION["id"], "Task opened", 0);
    }

    public static function editWorkgroupSettings() {
        $data = $_POST;
        WorkgroupDB::editWorkgroupSettings($data["workgroup_id"], $data["workgroup_name"], $data["workgroup_taskpermissions"], $data["workgroup_viewpermissions"], $data["workgroup_remindertime"], $data["workgroup_filepermissions"], $data["workgroup_campaignpermissions"], $data["workgroup_ownernotifications"]);
		WorkgroupDB::addWorkgroupActivity($data["workgroup_id"], $_SESSION["id"], "Edited workgroup settings");
	}

    public static function checkUnopenedTasks() {
        $workgroupTasks = WorkgroupDB::getTodaysUnopenedTasks();
        $todaysDateTime = strtotime($todaysDate);

        foreach ($workgroupTasks as $task) {
            $createdOn = strtotime($task["created_on"]);
            $minutes = round(($createdOn - $todaysDateTime) / 60, 2);
            if ($minutes > 120) {
                WorkgroupDB::setTaskRemindMe($task["task_id"]);
                $workgroup = WorkgroupDB::getWorkgroupByID($task["workgroup_id"]);

                $participants = WorkgroupDB::getWorkgroupEmployees($task["participants"]);

                foreach ($participant as $participant) {
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
                        $workgroupURL = $protocol . "://" . $_SERVER['HTTP_HOST'] . "/" . BASE_URL . "workgroupdetails?workgroup_id=" . $task["workgroup_id"];
                        $emailBody = '<div style="background-color:#fff;margin:0 auto 0 auto;padding:30px 0 30px 0;color:#4f565d;font-size:13px;line-height:20px;font-family:\'Helvetica Neue\',Arial,sans-serif;text-align:left;">
										<center>
										  <table style="width:625px;text-align:center">
											<tbody>
											  <tr>
												<td style="padding:0 0 20px 0;border-bottom:1px solid #e9edee;">
												  <a href="https://www.netko.it" style="display:block; margin:0 auto;" target="_blank">
													<img src="https://main.btrackcore.com/Pictures/logo_long.png" width="75" height="75" alt="bTrack logo" style="border: 0px;">
												  </a>
												</td>
											  </tr>
											  <tr>
												<td colspan="2" style="padding:30px 0;">
												  <p style="color:#1d2227;line-height:28px;font-size:22px;margin:12px 10px 20px 10px;font-weight:400;">Hey ' . $participant["employee_name"] . " " . $participant["employee_surname"] . '</p>
												  <p style="margin:0 10px 10px 10px;padding:0;color:black;">A task with the subject <strong>' . $task["task_subject"] . '</strong> in the <strong>' . $workgroup["name"] . '</strong> workgroup that is scheduled for today, hasn\'t been opened yet.<br>You can view this task by clicking the link below.</p>
												  <a style="display: inline-block;background-color: rgb(255, 82, 82);font-weight: bold;text-align: center;letter-spacing: .5px;position: relative;cursor: pointer;overflow: hidden;-webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;-webkit-tap-highlight-color: transparent;vertical-align: middle;z-index: 1;-webkit-transition: .3s ease-out;transition: .3s ease-out;text-decoration: none;color: #fff;text-align: center;-webkit-box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2);box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2);border: none;border-radius: 2px;height: 36px;line-height: 36px;padding: 0 2rem;text-transform: uppercase;" href="' . $workgroupURL . '" target="_blank">GO TO WORKGROUP</a>
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

                        $mail->Subject = "Task " . $task["task_subject"] . " unfinished";
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
    }

    public static function moveTask() {
        $data = $_POST;

        $task = WorkgroupDB::getTaskByID($data["task_id"]);
        $workgroup = WorkgroupDB::getWorkgroupByID($task["workgroup_id"]);
        $participants = WorkgroupDB::getWorkgroupEmployees($task["participants"]);
        $task_datetime = $task["task_startdate"] . " " . $task["task_starttime"];
        $task_newdatetime = $data["task_startdate"] . " " . $data["task_starttime"];
        foreach ($participants as $participant) {
            if ($participant["employee_mailing"] == 1 && $participant["workgroup_notifications"] == 1) {
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
                    $workgroupURL = $protocol . "://" . $_SERVER['HTTP_HOST'] . "/" . BASE_URL . "workgroupdetails?workgroup_id=" . $workgroup["workgroup_id"];
                    $emailBody = '<div style="background-color:#fff;margin:0 auto 0 auto;padding:30px 0 30px 0;color:#4f565d;font-size:13px;line-height:20px;font-family:\'Helvetica Neue\',Arial,sans-serif;text-align:left;">
										<center>
										  <table style="width:625px;text-align:center">
											<tbody>
											  <tr>
												<td style="padding:0 0 20px 0;border-bottom:1px solid #e9edee;">
												  <a href="https://www.netko.it" style="display:block; margin:0 auto;" target="_blank">
													<img src="https://main.btrackcore.com/Pictures/logo_long.png" width="75" height="75" alt="bTrack logo" style="border: 0px;">
												  </a>
												</td>
											  </tr>
											  <tr>
												<td colspan="2" style="padding:30px 0;">
												  <p style="color:#1d2227;line-height:28px;font-size:22px;margin:12px 10px 20px 10px;font-weight:400;">Hey ' . $participant["employee_name"] . " " . $participant["employee_surname"] . '</p>
												  <p style="margin:0 10px 10px 10px;padding:0;color:black;">A task with the subject <strong>' . $task["task_subject"] . '</strong> in the <strong>' . $workgroup["name"] . '</strong> workgroup, has been moved from ' . date("l, d. F Y, H:i", strtotime($task_datetime)) . ' to ' . date("l, d. F Y, H:i", strtotime($task_newdatetime)) . '.<br>To view this task, simply click the link below.</p>
												  <a style="display: inline-block;background-color: rgb(255, 82, 82);font-weight: bold;text-align: center;letter-spacing: .5px;position: relative;cursor: pointer;overflow: hidden;-webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;-webkit-tap-highlight-color: transparent;vertical-align: middle;z-index: 1;-webkit-transition: .3s ease-out;transition: .3s ease-out;text-decoration: none;color: #fff;text-align: center;-webkit-box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2);box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2);border: none;border-radius: 2px;height: 36px;line-height: 36px;padding: 0 2rem;text-transform: uppercase;" href="' . $workgroupURL . '" target="_blank">GO TO WORKGROUP</a>
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

                    $mail->Subject = "Task " . $task["task_subject"] . " rescheduled";
                    $mail->msgHTML($emailBody);

                    $mail->send();
                }
                catch(Exception $e) {
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                }
            }
        }
        WorkgroupDB::moveTask($data["task_id"], $data["task_startdate"], $data["task_starttime"], $data["task_enddate"], $data["task_endtime"]);
		WorkgroupDB::addWorkgroupActivity($task["workgroup_id"], $_SESSION["id"], "Rescheduled a task with the subject " . $task["task_subject"]);
    }

    public static function getMembers() {
        $data = $_POST;
        $workgroup = WorkgroupDB::getWorkgroupByID($data["workgroup_id"]);
        $employees = WorkgroupDB::getWorkgroupEmployees($workgroup["users"]);
        $moderators = array();
		if ($workgroup["moderators"] != ""){
			$moderators = WorkgroupDB::getWorkgroupEmployees($workgroup["moderators"]);
		}
        foreach ($employees as $employee) {
            if ($employee["employee_id"] == $workgroup["owner_id"]) {
                $owner = $employee;
            }
        }
        $response = array();
        $response["employees"] = $employees;
        $response["moderators"] = $moderators;
        $response["owner"] = $owner;
        echo json_encode($response);
    }

    public static function createDirectory() {
        $data = $_POST;
        mkdir($data["dirname"]);
    }

    public static function renameWorkgroupFile() {
        $data = $_POST;
        $file_location = $data["file_location"];
        $file_newname = $data["new_name"];
        $path_parts = pathinfo($file_location);
        $newFileName = $path_parts["dirname"] . "/" . $file_newname . "." . $path_parts["extension"];
        if ($path_parts["extension"] == "") {
            $newFileName = $path_parts["dirname"] . "/" . $file_newname;
        }
        rename($file_location, $newFileName);
    }

    public static function moveFile() {
        $data = $_POST;
        $old_location = $data["old_location"];
        $path_parts = pathinfo($old_location);
        rename($old_location, $data["new_location"] . "/" . $path_parts["basename"]); //move file to new location
        
    }

    public static function deleteWorkgroupFile() {
        $data = $_POST;
        $file_location = $data["file_location"];
        unlink($file_location);
    }

    public static function uploadFile() {
        $data = $_POST;
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
        $target_dir = $data["directory"];
        $target_file = $target_dir . "/" . basename($_FILES["file"]["name"]);
        $actual_file_name = basename($_FILES["file"]["name"]);
        $extension = strtolower(pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION));
        $uploadOk = 1;

        if (!in_array($extension, $ext)) {
            echo "Sorry, this this type of file (" . $extension . ") is not allowed for upload.";
            $uploadOk = 0;
        }
        else if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        else if ($_FILES["file"]["size"] > 20000000) { //5 MB max size
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        }
        else {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                GeneralDB::saveFileUpload($_SESSION["id"], $actual_file_name, $target_file);
            }
            else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }

    public static function getWorkgroupDirectory() {
        $data = $_POST;
        $dir = "Workgroups/Workgroup" . $data["workgroup_id"];
        $order = "a";
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
            "7z",
            "tar.gz"
        );

        $listDir = array(
            'id' => basename($dir) ,
            'text' => basename($dir) ,
            'type' => "default",
            'dirurl' => $dir,
            'children' => array() ,
        );

        $files = array();
        $dirs = array();

        if ($handler = opendir($dir)) {
            while (($sub = readdir($handler)) !== false) {
                if ($sub != "." && $sub != "..") {
                    if (is_file($dir . "/" . $sub)) {
                        $extension = strtolower(pathinfo($dir . "/" . $sub, PATHINFO_EXTENSION));
                        if (in_array($extension, $ext)) {
                            $fileType = "file";
                            if ($extension == "jpg" || $extension == "gif" || $extension == "jpeg" || $extension == "png" || $extension == "ico" || $extension == "gif87" || $extension == "tif") {
                                $fileType = "image";
                            }
                            else if ($extension == "pdf") {
                                $fileType = "pdf";
                            }
                            else if ($extension == "doc" || $extension == "docx") {
                                $fileType = "word";
                            }
                            else if ($extension == "xls" || $extension == "xlsx" || $extension == "csv") {
                                $fileType = "excel";
                            }
                            else if ($extension == "ppt" || $extension == "pptx") {
                                $fileType = "powerpoint";
                            }
                            else if ($extension == "zip" || $extension == "rar" || $extension == "7z" || $extension == "tar.gz") {
                                $fileType = "archive";
                            }
                            $files[] = array(
                                "dirurl" => $dir . "/" . $sub,
                                "type" => $fileType,
                                "text" => $sub
                            );
                        }
                    }
                    elseif (is_dir($dir . "/" . $sub)) {
                        $dirs[] = $dir . "/" . $sub;
                    }
                }
            }
            if ($order === "a") {
                asort($dirs);
            }
            else {
                arsort($dirs);
            }

            foreach ($dirs as $d) {
                $listDir['children'][] = WorkgroupController::dir_to_jstree_array($d);
            }

            if ($order === "a") {
                asort($files);
            }
            else {
                arsort($files);
            }

            foreach ($files as $file) {
                $listDir['children'][] = $file;
            }

            closedir($handler);
        }

        echo json_encode($listDir);
    }

    public static function dir_to_jstree_array($dir, $order = "a", $ext = array()) {
        if (empty($ext)) {
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
                "7z",
                "tar.gz"
            );
        }

        $listDir = array(
            'id' => basename($dir) ,
            'text' => basename($dir) ,
            'type' => "default",
            'dirurl' => $dir,
            'children' => array() ,
        );

        $files = array();
        $dirs = array();

        if ($handler = opendir($dir)) {
            while (($sub = readdir($handler)) !== false) {
                if ($sub != "." && $sub != "..") {
                    if (is_file($dir . "/" . $sub)) {
                        $extension = strtolower(pathinfo($dir . "/" . $sub, PATHINFO_EXTENSION));
                        if (in_array($extension, $ext)) {
                            $fileType = "file";
                            if ($extension == "jpg" || $extension == "gif" || $extension == "jpeg" || $extension == "png" || $extension == "ico" || $extension == "gif87" || $extension == "tif") {
                                $fileType = "image";
                            }
                            else if ($extension == "pdf") {
                                $fileType = "pdf";
                            }
                            else if ($extension == "doc" || $extension == "docx") {
                                $fileType = "word";
                            }
                            else if ($extension == "xls" || $extension == "xlsx" || $extension == "csv") {
                                $fileType = "excel";
                            }
                            else if ($extension == "ppt" || $extension == "pptx") {
                                $fileType = "powerpoint";
                            }
                            else if ($extension == "zip" || $extension == "rar" || $extension == "7z" || $extension == "tar.gz") {
                                $fileType = "archive";
                            }
                            $files[] = array(
                                "dirurl" => $dir . "/" . $sub,
                                "type" => $fileType,
                                "text" => $sub
                            );
                        }
                    }
                    elseif (is_dir($dir . "/" . $sub)) {
                        $dirs[] = $dir . "/" . $sub;
                    }
                }
            }
            if ($order === "a") {
                asort($dirs);
            }
            else {
                arsort($dirs);
            }

            foreach ($dirs as $d) {
                $listDir['children'][] = WorkgroupController::dir_to_jstree_array($d);
            }

            if ($order === "a") {
                asort($files);
            }
            else {
                arsort($files);
            }

            foreach ($files as $file) {
                $listDir['children'][] = $file;
            }

            closedir($handler);
        }
        return $listDir;
    }

    public static function addWorkgroup() {
        $data = $_POST;
        $exists = WorkgroupDB::checkWorkgroupExists($data["workgroup_name"]);
        if (!$exists) {
            $members = implode(",", $data["members"]);
            if ($members == "") {
                $members = $_SESSION["id"];
            }
            else {
                $members .= "," . $_SESSION["id"];
            }
            $workgroup_id = WorkgroupDB::addWorkgroup($_SESSION["id"], $data["workgroup_name"], $data["workgroup_description"], $members, $data["workgroup_type"]);
            mkdir("Workgroups/Workgroup" . $workgroup_id);
        }
        else {
            echo "A workgroup with this name already exists!";
        }
    }
	
	public static function reactivateWorkgroup(){
		$data = $_POST;
        $workgroup = WorkgroupDB::getWorkgroupByID($data["workgroup_id"]);
        $workgroup_members = explode(",", $workgroup["users"]);
        $workgroup_moderators = explode(",", $workgroup["moderators"]);
		
		$recips = array_merge($workgroup_members, $workgroup_moderators);
		
		$recipients = WorkgroupDB::getWorkgroupEmployees(implode(",", $recips));
		
		$mail = new PHPMailer(true); // Passing `true` enables exceptions
		foreach ($recipients as $recipient){
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

                $mail->addAddress($recipient["employee_email"], $recipient["employee_email"]); // Add a recipient

                //Content
                $mail->isHTML(true); // Set email format to HTML
                $emailBody = '<div style="background-color:#fff;margin:0 auto 0 auto;padding:30px 0 30px 0;color:#4f565d;font-size:13px;line-height:20px;font-family:\'Helvetica Neue\',Arial,sans-serif;text-align:left;">
                                <center>
                                  <table style="width:625px;text-align:center">
                                    <tbody>
                                      <tr>
                                        <td style="padding:0 0 20px 0;border-bottom:1px solid #e9edee;">
                                          <a href="https://www.netko.it" style="display:block; margin:0 auto;" target="_blank">
                                            <img src="https://main.btrackcore.com/Pictures/logo_long.png" width="75" height="75" alt="bTrack logo" style="border: 0px;">
                                          </a>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td colspan="2" style="padding:30px 0;">
                                          <p style="color:#1d2227;line-height:28px;font-size:22px;margin:12px 10px 20px 10px;font-weight:400;">Hey ' . $recipient["employee_name"] . " " . $recipient["employee_surname"] . '</p>
                                          <p style="margin:0 10px 10px 10px;padding:0;color:black;">The <strong>' . $workgroup["name"] . '</strong> workgroup has been reactivated.</p>
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
                $mail->Subject = "Workgroup " . $workgroup["name"] . " reactivated.";
                $mail->msgHTML($emailBody);
                $mail->send();
            }
            catch(Exception $e) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            }
		}
		
		WorkgroupDB::toggleWorkgroupActive($data["workgroup_id"], 1);
		WorkgroupDB::addWorkgroupActivity($data["workgroup_id"], $_SESSION["id"], "Reactivated workgroup.");
		
	}
	
	public static function deactivateWorkgroup(){
		$data = $_POST;
        $workgroup = WorkgroupDB::getWorkgroupByID($data["workgroup_id"]);
        $workgroup_members = explode(",", $workgroup["users"]);
        $workgroup_moderators = explode(",", $workgroup["moderators"]);
		
		$recips = array_merge($workgroup_members, $workgroup_moderators);
		
		$recipients = WorkgroupDB::getWorkgroupEmployees(implode(",", $recips));
		
		$mail = new PHPMailer(true); // Passing `true` enables exceptions
		foreach ($recipients as $recipient){
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

                $mail->addAddress($recipient["employee_email"], $recipient["employee_email"]); // Add a recipient

                //Content
                $mail->isHTML(true); // Set email format to HTML
                $emailBody = '<div style="background-color:#fff;margin:0 auto 0 auto;padding:30px 0 30px 0;color:#4f565d;font-size:13px;line-height:20px;font-family:\'Helvetica Neue\',Arial,sans-serif;text-align:left;">
                                <center>
                                  <table style="width:625px;text-align:center">
                                    <tbody>
                                      <tr>
                                        <td style="padding:0 0 20px 0;border-bottom:1px solid #e9edee;">
                                          <a href="https://www.netko.it" style="display:block; margin:0 auto;" target="_blank">
                                            <img src="https://main.btrackcore.com/Pictures/logo_long.png" width="75" height="75" alt="bTrack logo" style="border: 0px;">
                                          </a>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td colspan="2" style="padding:30px 0;">
                                          <p style="color:#1d2227;line-height:28px;font-size:22px;margin:12px 10px 20px 10px;font-weight:400;">Hey ' . $recipient["employee_name"] . " " . $recipient["employee_surname"] . '</p>
                                          <p style="margin:0 10px 10px 10px;padding:0;color:black;">The <strong>' . $workgroup["name"] . '</strong> workgroup has been deactivated.</p>
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
                $mail->Subject = "Workgroup " . $workgroup["name"] . " deactivated.";
                $mail->msgHTML($emailBody);
                $mail->send();
            }
            catch(Exception $e) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            }
		}
		
		WorkgroupDB::toggleWorkgroupActive($data["workgroup_id"], 0);
		WorkgroupDB::addWorkgroupActivity($data["workgroup_id"], $_SESSION["id"], "Deactivated workgroup.");
		
	}
	
	public static function kickWorkgroupMember(){
		$data = $_POST;
		$workgroup = WorkgroupDB::getWorkgroupByID($data["workgroup_id"]);
        $workgroup_members = explode(",", $workgroup["users"]);
        $workgroup_moderators = explode(",", $workgroup["moderators"]);
        $indexOfUser = array_search($data["employee_id"], $workgroup_members);
        if ($indexOfUser !== false) {
            array_splice($workgroup_members, $indexOfUser, 1);
        }
        $indexOfModerator = array_search($data["employee_id"], $workgroup_moderators);
        if ($indexOfModerator !== false) {
            array_splice($workgroup_moderators, $indexOfModerator, 1);
        }
        $new_members = implode(",", $workgroup_members);
        $new_moderators = implode(",", $workgroup_moderators);

        WorkgroupDB::setUsersAndModerators($data["workgroup_id"], $new_members, $new_moderators);
		
		$owner = UserDB::getEmployeeById($workgroup["owner_id"]);
		$leaver = UserDB::getEmployeeById($data["employee_id"]);
		
		WorkgroupDB::addWorkgroupActivity($data["workgroup_id"], $_SESSION["id"], "Kicked " . $leaver["employee_name"] . " " . $leaver["employee_surname"] . " from workgroup.");
		
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

                $mail->addAddress($owner["employee_email"], $owner["employee_email"]); // Add a recipient

                //Content
                $mail->isHTML(true); // Set email format to HTML
                $emailBody = '<div style="background-color:#fff;margin:0 auto 0 auto;padding:30px 0 30px 0;color:#4f565d;font-size:13px;line-height:20px;font-family:\'Helvetica Neue\',Arial,sans-serif;text-align:left;">
                                <center>
                                  <table style="width:625px;text-align:center">
                                    <tbody>
                                      <tr>
                                        <td style="padding:0 0 20px 0;border-bottom:1px solid #e9edee;">
                                          <a href="https://www.netko.it" style="display:block; margin:0 auto;" target="_blank">
                                            <img src="https://main.btrackcore.com/Pictures/logo_long.png" width="75" height="75" alt="bTrack logo" style="border: 0px;">
                                          </a>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td colspan="2" style="padding:30px 0;">
                                          <p style="color:#1d2227;line-height:28px;font-size:22px;margin:12px 10px 20px 10px;font-weight:400;">Hey ' . $owner["employee_name"] . " " . $owner["employee_surname"] . '</p>
                                          <p style="margin:0 10px 10px 10px;padding:0;color:black;">' . $leaver["employee_name"] . " " . $leaver["employee_surname"] . ' has been kicked from the <strong>' . $workgroup["name"] . '</strong> workgroup.</p>
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
                $mail->Subject = "Workgroup " . $workgroup["name"] . " member kicked";
                $mail->msgHTML($emailBody);
                $mail->send();

            }
            catch(Exception $e) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            }
			
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

                $mail->addAddress($leaver["employee_email"], $leaver["employee_email"]); // Add a recipient

                //Content
                $mail->isHTML(true); // Set email format to HTML
                $emailBody = '<div style="background-color:#fff;margin:0 auto 0 auto;padding:30px 0 30px 0;color:#4f565d;font-size:13px;line-height:20px;font-family:\'Helvetica Neue\',Arial,sans-serif;text-align:left;">
                                <center>
                                  <table style="width:625px;text-align:center">
                                    <tbody>
                                      <tr>
                                        <td style="padding:0 0 20px 0;border-bottom:1px solid #e9edee;">
                                          <a href="https://www.netko.it" style="display:block; margin:0 auto;" target="_blank">
                                            <img src="https://main.btrackcore.com/Pictures/logo_long.png" width="75" height="75" alt="bTrack logo" style="border: 0px;">
                                          </a>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td colspan="2" style="padding:30px 0;">
                                          <p style="color:#1d2227;line-height:28px;font-size:22px;margin:12px 10px 20px 10px;font-weight:400;">Hey ' . $leaver["employee_name"] . " " . $leaver["employee_surname"] . '</p>
                                          <p style="margin:0 10px 10px 10px;padding:0;color:black;">You\'ve been kicked from the <strong>' . $workgroup["name"] . '</strong> workgroup.</p>
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
                $mail->Subject = "Workgroup " . $workgroup["name"] . " kick notice";
                $mail->msgHTML($emailBody);
                $mail->send();

            }
            catch(Exception $e) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            }
	}

    public static function leaveWorkgroup() {
        $data = $_POST;
        $workgroup = WorkgroupDB::getWorkgroupByID($data["workgroup_id"]);
        $workgroup_members = explode(",", $workgroup["users"]);
        $workgroup_moderators = explode(",", $workgroup["moderators"]);
        $indexOfUser = array_search($_SESSION["id"], $workgroup_members);
        if ($indexOfUser !== false) {
            array_splice($workgroup_members, $indexOfUser, 1);
        }
        $indexOfModerator = array_search($_SESSION["id"], $workgroup_moderators);
        if ($indexOfModerator !== false) {
            array_splice($workgroup_moderators, $indexOfModerator, 1);
        }
        $new_members = implode(",", $workgroup_members);
        $new_moderators = implode(",", $workgroup_moderators);

        WorkgroupDB::setUsersAndModerators($data["workgroup_id"], $new_members, $new_moderators);
		
		$owner = UserDB::getEmployeeById($workgroup["owner_id"]);
		$leaver = UserDB::getEmployeeById($_SESSION["id"]);
		
		WorkgroupDB::addWorkgroupActivity($data["workgroup_id"], $leaver["employee_id"], "Left the workgroup.");
		
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

                $mail->addAddress($owner["employee_email"], $owner["employee_email"]); // Add a recipient

                //Content
                $mail->isHTML(true); // Set email format to HTML
                $emailBody = '<div style="background-color:#fff;margin:0 auto 0 auto;padding:30px 0 30px 0;color:#4f565d;font-size:13px;line-height:20px;font-family:\'Helvetica Neue\',Arial,sans-serif;text-align:left;">
                                <center>
                                  <table style="width:625px;text-align:center">
                                    <tbody>
                                      <tr>
                                        <td style="padding:0 0 20px 0;border-bottom:1px solid #e9edee;">
                                          <a href="https://www.netko.it" style="display:block; margin:0 auto;" target="_blank">
                                            <img src="https://main.btrackcore.com/Pictures/logo_long.png" width="75" height="75" alt="bTrack logo" style="border: 0px;">
                                          </a>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td colspan="2" style="padding:30px 0;">
                                          <p style="color:#1d2227;line-height:28px;font-size:22px;margin:12px 10px 20px 10px;font-weight:400;">Hey ' . $owner["employee_name"] . " " . $owner["employee_surname"] . '</p>
                                          <p style="margin:0 10px 10px 10px;padding:0;color:black;">' . $leaver["employee_name"] . " " . $leaver["employee_surname"] . ' has left the <strong>' . $workgroup["name"] . '</strong> workgroup.</p>
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
                $mail->Subject = "Workgroup " . $workgroup["name"] . " left";
                $mail->msgHTML($emailBody);
                $mail->send();

            }
            catch(Exception $e) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            }
			
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

                $mail->addAddress($leaver["employee_email"], $leaver["employee_email"]); // Add a recipient

                //Content
                $mail->isHTML(true); // Set email format to HTML
                $emailBody = '<div style="background-color:#fff;margin:0 auto 0 auto;padding:30px 0 30px 0;color:#4f565d;font-size:13px;line-height:20px;font-family:\'Helvetica Neue\',Arial,sans-serif;text-align:left;">
                                <center>
                                  <table style="width:625px;text-align:center">
                                    <tbody>
                                      <tr>
                                        <td style="padding:0 0 20px 0;border-bottom:1px solid #e9edee;">
                                          <a href="https://www.netko.it" style="display:block; margin:0 auto;" target="_blank">
                                            <img src="https://main.btrackcore.com/Pictures/logo_long.png" width="75" height="75" alt="bTrack logo" style="border: 0px;">
                                          </a>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td colspan="2" style="padding:30px 0;">
                                          <p style="color:#1d2227;line-height:28px;font-size:22px;margin:12px 10px 20px 10px;font-weight:400;">Hey ' . $leaver["employee_name"] . " " . $leaver["employee_surname"] . '</p>
                                          <p style="margin:0 10px 10px 10px;padding:0;color:black;">You\'ve left the <strong>' . $workgroup["name"] . '</strong> workgroup.</p>
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
                $mail->Subject = "Workgroup " . $workgroup["name"] . " left";
                $mail->msgHTML($emailBody);
                $mail->send();

            }
            catch(Exception $e) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            }
        
    }

    public static function deleteWorkgroup() {
        $data = $_POST;
        WorkgroupDB::deleteWorkgroup($data["workgroup_id"]);
    }

    public static function editWorkgroupDescription() {
        $data = $_POST;
        WorkgroupDB::editWorkgroupDescription($data["workgroup_id"], $data["workgroup_description"]);
		WorkgroupDB::addWorkgroupActivity($data["workgroup_id"], $_SESSION["id"], "Edited workgroup description.");
    }

    public static function editModerators() {
        $data = $_POST;
        WorkgroupDB::setModerators($data["workgroup_id"], implode(",", $data["moderators"]));
    }

    public static function goToWorkgroup() {
        $workgroup_id = $_GET["workgroup_id"];
        $workgroup = WorkgroupDB::getWorkgroupByID($workgroup_id);
        $employees = WorkgroupDB::getWorkgroupEmployees($workgroup["users"]);
		$moderators = array();
		if ($workgroup["moderators"] != ""){
			$moderators = WorkgroupDB::getWorkgroupEmployees($workgroup["moderators"]);
		}
		$history = WorkgroupDB::getWorkgroupActivity($workgroup_id);
        foreach ($employees as $employee) {
            if ($employee["employee_id"] == $workgroup["owner_id"]) {
                $owner = $employee;
            }
        }
		$disk_used_bytes = foldersize("Workgroups/Workgroup" . $workgroup_id);
        $disk_used = formatSize($disk_used_bytes);
        $disk_free["disk_bytes"] = $disk_used_bytes;
        $disk_free["disk_used"] = $disk_used;
        ViewHelper::render("View/workgroupdetails.php", ["workgroup" => $workgroup, "history" => $history, "disk_free" => $disk_free, "employees" => $employees, "owner" => $owner, "moderators" => $moderators]);

    }

    public static function sendInvites() {
        $data = $_POST;
        $workgroup = WorkgroupDB::getWorkgroupByID($data["workgroup_id"]);
        $recipients = WorkgroupDB::getWorkgroupEmployees(implode(",", $data["members"]));
		$inviter = UserDB::getEmployeeById($_SESSION["id"]);
		$recipientString = "";
		foreach ($recipients as $recipient){
			if ($recipientString != ""){
				$recipientString .= ", " . $recipient["employee_name"] . $recipient["employee_surname"];
			}else{
				$recipientString = $recipient["employee_name"] . $recipient["employee_surname"];
			}
		}
		WorkgroupDB::addWorkgroupActivity($data["workgroup_id"], $_SESSION["id"], "Sent workgroup invitations to " . $recipientString);
        $mail = new PHPMailer(true); // Passing `true` enables exceptions
        foreach ($recipients as $recipient) {
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

                $mail->addAddress($recipient["employee_email"], $recipient["employee_email"]); // Add a recipient
                if (isset($_SERVER['HTTPS'])) {
                    $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
                }
                else {
                    $protocol = 'http';
                }
                $inviteURL = $protocol . "://" . $_SERVER['HTTP_HOST'] . "/" . BASE_URL . "workgroup/accept?employee_id=" . $recipient["employee_id"] . "&workgroup_id=" . $workgroup["workgroup_id"];

                //Content
                $mail->isHTML(true); // Set email format to HTML
                $emailBody = '<div style="background-color:#fff;margin:0 auto 0 auto;padding:30px 0 30px 0;color:#4f565d;font-size:13px;line-height:20px;font-family:\'Helvetica Neue\',Arial,sans-serif;text-align:left;">
                                <center>
                                  <table style="width:625px;text-align:center">
                                    <tbody>
                                      <tr>
                                        <td style="padding:0 0 20px 0;border-bottom:1px solid #e9edee;">
                                          <a href="https://www.netko.it" style="display:block; margin:0 auto;" target="_blank">
                                            <img src="https://main.btrackcore.com/Pictures/logo_long.png" width="75" height="75" alt="bTrack logo" style="border: 0px;">
                                          </a>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td colspan="2" style="padding:30px 0;">
                                          <p style="color:#1d2227;line-height:28px;font-size:22px;margin:12px 10px 20px 10px;font-weight:400;">Hey ' . $recipient["employee_name"] . " " . $recipient["employee_surname"] . '</p>
                                          <p style="margin:0 10px 10px 10px;padding:0;color:black;">' . $inviter["employee_name"] . " " . $inviter["employee_surname"] . ' has invited you into the <strong>' . $workgroup["name"] . '</strong> workgroup.<br>To accept your workgroup invitation, simply click the link below.</p>
                                          <a style="display: inline-block;background-color: rgb(255, 82, 82);font-weight: bold;text-align: center;letter-spacing: .5px;position: relative;cursor: pointer;overflow: hidden;-webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;-webkit-tap-highlight-color: transparent;vertical-align: middle;z-index: 1;-webkit-transition: .3s ease-out;transition: .3s ease-out;text-decoration: none;color: #fff;text-align: center;-webkit-box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2);box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2);border: none;border-radius: 2px;height: 36px;line-height: 36px;padding: 0 2rem;text-transform: uppercase;" href="' . $inviteURL . '" target="_blank">ACCEPT INVITATION</a>
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
                $mail->Subject = "Invite to " . $workgroup["name"] . " workgroup";
                $mail->msgHTML($emailBody);
                $mail->send();

            }
            catch(Exception $e) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            }
        }
    }
	
	function sendJoinRequest(){
		$data = $_POST;
		
        $workgroup = WorkgroupDB::getWorkgroupByID($data["workgroup_id"]);
		$owner = UserDB::getEmployeeById($workgroup["owner_id"]);
		$inviter = UserDB::getEmployeeById($_SESSION["id"]);
		
		WorkgroupDB::addWorkgroupActivity($data["workgroup_id"], $_SESSION["id"], "Sent a request to join the workgroup.");
		
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

                $mail->addAddress($owner["employee_email"], $owner["employee_email"]); // Add a recipient
				
                if (isset($_SERVER['HTTPS'])) {
                    $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
                }
                else {
                    $protocol = 'http';
                }
                $inviteURL = $protocol . "://" . $_SERVER['HTTP_HOST'] . "/" . BASE_URL . "workgroup/accept?employee_id=" . $inviter["employee_id"] . "&workgroup_id=" . $workgroup["workgroup_id"];

                //Content
                $mail->isHTML(true); // Set email format to HTML
                $emailBody = '<div style="background-color:#fff;margin:0 auto 0 auto;padding:30px 0 30px 0;color:#4f565d;font-size:13px;line-height:20px;font-family:\'Helvetica Neue\',Arial,sans-serif;text-align:left;">
                                <center>
                                  <table style="width:625px;text-align:center">
                                    <tbody>
                                      <tr>
                                        <td style="padding:0 0 20px 0;border-bottom:1px solid #e9edee;">
                                          <a href="https://www.netko.it" style="display:block; margin:0 auto;" target="_blank">
                                            <img src="https://main.btrackcore.com/Pictures/logo_long.png" width="75" height="75" alt="bTrack logo" style="border: 0px;">
                                          </a>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td colspan="2" style="padding:30px 0;">
                                          <p style="color:#1d2227;line-height:28px;font-size:22px;margin:12px 10px 20px 10px;font-weight:400;">Hey ' . $owner["employee_name"] . " " . $owner["employee_surname"] . '</p>
                                          <p style="margin:0 10px 10px 10px;padding:0;color:black;"><strong>' . $inviter["employee_name"] . " " . $inviter["employee_surname"] . '</strong> wishes to join the <strong>' . $workgroup["name"] . '</strong> workgroup.<br>You can accept their request to join by simply clicking the link below.</p>
                                          <a style="display: inline-block;background-color: rgb(255, 82, 82);font-weight: bold;text-align: center;letter-spacing: .5px;position: relative;cursor: pointer;overflow: hidden;-webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;-webkit-tap-highlight-color: transparent;vertical-align: middle;z-index: 1;-webkit-transition: .3s ease-out;transition: .3s ease-out;text-decoration: none;color: #fff;text-align: center;-webkit-box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2);box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2);border: none;border-radius: 2px;height: 36px;line-height: 36px;padding: 0 2rem;text-transform: uppercase;" href="' . $inviteURL . '" target="_blank">ADD TO WORKGROUP</a>
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
                $mail->Subject = "Request to join workgroup";
                $mail->msgHTML($emailBody);
                $mail->send();

            }
            catch(Exception $e) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            }
			
		
	}
	
	public static function acceptJoin() {
        $workgroup = WorkgroupDB::getWorkgroupByID($_GET["workgroup_id"]);
        $workgroup_members = explode(",", $workgroup["users"]);
        $employee = UserDB::getEmployeeById($_GET["employee_id"]);
        $owner = UserDB::getEmployeeById($workgroup["owner"]);
        if (array_search($_GET["employee_id"], $workgroup_members) === false) {
            WorkgroupDB::addMember($_GET["workgroup_id"], $_GET["employee_id"]);
			WorkgroupDB::addWorkgroupActivity($_GET["workgroup_id"], $_GET["employee_id"], "Joined the workgroup.");
            ViewHelper::render("View/inviteaccepted.php", ["message" => "Member added to work group."]);
            if ($owner["employee_mailing"] == 1 && $participant["workgroup_notifications"] == 1) {
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
                    $mail->addAddress($owner["employee_email"], $owner["employee_email"]); // Add a recipient
                    //Content
                    $mail->isHTML(true); // Set email format to HTML
                    if (isset($_SERVER['HTTPS'])) {
                        $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
                    }
                    else {
                        $protocol = 'http';
                    }
                    $workgroupURL = $protocol . "://" . $_SERVER['HTTP_HOST'] . "/" . BASE_URL . "workgroupdetails?workgroup_id=" . $task["workgroup_id"];
                    $emailBody = '<div style="background-color:#fff;margin:0 auto 0 auto;padding:30px 0 30px 0;color:#4f565d;font-size:13px;line-height:20px;font-family:\'Helvetica Neue\',Arial,sans-serif;text-align:left;">
											<center>
											  <table style="width:625px;text-align:center">
												<tbody>
												  <tr>
													<td style="padding:0 0 20px 0;border-bottom:1px solid #e9edee;">
													  <a href="https://www.netko.it" style="display:block; margin:0 auto;" target="_blank">
														<img src="https://main.btrackcore.com/Pictures/logo_long.png" width="75" height="75" alt="bTrack logo" style="border: 0px;">
													  </a>
													</td>
												  </tr>
												  <tr>
													<td colspan="2" style="padding:30px 0;">
													  <p style="color:#1d2227;line-height:28px;font-size:22px;margin:12px 10px 20px 10px;font-weight:400;">Hey ' . $owner["employee_name"] . " " . $owner["employee_surname"] . '</p>
													  <p style="margin:0 10px 10px 10px;padding:0;color:black;"><strong>' . $employee["employee_name"] . " " . $employee["employee_surname"] . '</strong> has accepted your workgroup invitation. To view the workgroup, simply click the link below.</p>
													  <a style="display: inline-block;background-color: rgb(255, 82, 82);font-weight: bold;text-align: center;letter-spacing: .5px;position: relative;cursor: pointer;overflow: hidden;-webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;-webkit-tap-highlight-color: transparent;vertical-align: middle;z-index: 1;-webkit-transition: .3s ease-out;transition: .3s ease-out;text-decoration: none;color: #fff;text-align: center;-webkit-box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2);box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2);border: none;border-radius: 2px;height: 36px;line-height: 36px;padding: 0 2rem;text-transform: uppercase;" href="' . $workgroupURL . '" target="_blank">GO TO WORKGROUP</a>
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
                    $mail->Subject = "Task edited";
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
            ViewHelper::render("View/inviteaccepted.php", ["message" => "You've already added this member to your work group."]);
        }
    }

    public static function acceptInvite() {
        $workgroup = WorkgroupDB::getWorkgroupByID($_GET["workgroup_id"]);
        $workgroup_members = explode(",", $workgroup["users"]);
        $employee = UserDB::getEmployeeById($_GET["employee_id"]);
        $owner = UserDB::getEmployeeById($workgroup["owner"]);
        if (array_search($_GET["employee_id"], $workgroup_members) === false) {
            WorkgroupDB::addMember($_GET["workgroup_id"], $_GET["employee_id"]);
			WorkgroupDB::addWorkgroupActivity($_GET["workgroup_id"], $_GET["employee_id"], "Accepted invitation to workgroup.");
            ViewHelper::render("View/inviteaccepted.php", ["message" => "Invite accepted. You've successfully joined the workgroup."]);
            if ($owner["employee_mailing"] == 1 && $participant["workgroup_notifications"] == 1) {
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
                    $mail->addAddress($owner["employee_email"], $owner["employee_email"]); // Add a recipient
                    //Content
                    $mail->isHTML(true); // Set email format to HTML
                    if (isset($_SERVER['HTTPS'])) {
                        $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
                    }
                    else {
                        $protocol = 'http';
                    }
                    $workgroupURL = $protocol . "://" . $_SERVER['HTTP_HOST'] . "/" . BASE_URL . "workgroupdetails?workgroup_id=" . $task["workgroup_id"];
                    $emailBody = '<div style="background-color:#fff;margin:0 auto 0 auto;padding:30px 0 30px 0;color:#4f565d;font-size:13px;line-height:20px;font-family:\'Helvetica Neue\',Arial,sans-serif;text-align:left;">
											<center>
											  <table style="width:625px;text-align:center">
												<tbody>
												  <tr>
													<td style="padding:0 0 20px 0;border-bottom:1px solid #e9edee;">
													  <a href="https://www.netko.it" style="display:block; margin:0 auto;" target="_blank">
														<img src="https://main.btrackcore.com/Pictures/logo_long.png" width="75" height="75" alt="bTrack logo" style="border: 0px;">
													  </a>
													</td>
												  </tr>
												  <tr>
													<td colspan="2" style="padding:30px 0;">
													  <p style="color:#1d2227;line-height:28px;font-size:22px;margin:12px 10px 20px 10px;font-weight:400;">Hey ' . $owner["employee_name"] . " " . $owner["employee_surname"] . '</p>
													  <p style="margin:0 10px 10px 10px;padding:0;color:black;"><strong>' . $employee["employee_name"] . " " . $employee["employee_surname"] . '</strong> has accepted your workgroup invitation. To view the workgroup, simply click the link below.</p>
													  <a style="display: inline-block;background-color: rgb(255, 82, 82);font-weight: bold;text-align: center;letter-spacing: .5px;position: relative;cursor: pointer;overflow: hidden;-webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;-webkit-tap-highlight-color: transparent;vertical-align: middle;z-index: 1;-webkit-transition: .3s ease-out;transition: .3s ease-out;text-decoration: none;color: #fff;text-align: center;-webkit-box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2);box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2);border: none;border-radius: 2px;height: 36px;line-height: 36px;padding: 0 2rem;text-transform: uppercase;" href="' . $workgroupURL . '" target="_blank">GO TO WORKGROUP</a>
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
                    $mail->Subject = "Task edited";
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
            ViewHelper::render("View/inviteaccepted.php", ["message" => "You're already a member of this workgroup."]);
        }
    }

    public static function getWorkgroupByID() {
        $data = $_POST;
        $workgroup = WorkgroupDB::getWorkgroupByID($data["workgroup_id"]);
        echo json_encode($workgroup);
    }

    public static function getChatMessages() {
        $data = $_POST;
        $messages = WorkgroupDB::getChatMessages($data["workgroup_id"]);
        echo json_encode($messages);
    }

    public static function addMessage() {
        $data = $_POST;
        WorkgroupDB::addMessage($_SESSION["id"], $data["workgroup_id"], $data["content"]);
		WorkgroupDB::addWorkgroupActivity($data["workgroup_id"], $_SESSION["id"], "Added a message to the workgroup chat.");
    }

    public static function getWorkgroupTasks() {
        $data = $_POST;
        $tasks = WorkgroupDB::getWorkgroupTasks($data["workgroup_id"]);
        echo json_encode($tasks);
    }

    public static function addWorkgroupTask() {
        $data = $_POST;
        $files = explode(",", $data["files"]);
        $fileString = implode(";", $files);
        $workgroup = WorkgroupDB::getWorkgroupByID($data["workgroup_id"]);
        $participantString = implode(",", $data["participants"]);
        $participants = WorkgroupDB::getWorkgroupEmployees($participantString);
		
		$task_start_date = date("Y-m-d", strtotime($data["task_startdate"]));
		$task_start_time = date("H:i", strtotime($data["task_starttime"]));
		$task_end_date = date("Y-m-d", strtotime($data["task_enddate"]));
		$task_end_time = date("H:i", strtotime($data["task_endtime"]));
		
        $prettyDate = date("l, d. F Y, H:i", strtotime($task_start_date + " " + $task_start_time));
		$creator = UserDB::getEmployeeByID($_SESSION["id"]);
		$custID = $data["customer_id"];
		$subsID = $data["subsidiary_id"];
		if ($custID == ""){
			$custID = null;
		}
		if ($subsID == ""){
			$subsID = null;
		}
        foreach ($participants as $participant) {
            if ($participant["employee_mailing"] == 1 && $participant["workgroup_notifications"] == 1) {
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
                    $workgroupURL = $protocol . "://" . $_SERVER['HTTP_HOST'] . "/" . BASE_URL . "workgroupdetails?workgroup_id=" . $workgroup["workgroup_id"];
                    $emailBody = '<div style="background-color:#fff;margin:0 auto 0 auto;padding:30px 0 30px 0;color:#4f565d;font-size:13px;line-height:20px;font-family:\'Helvetica Neue\',Arial,sans-serif;text-align:left;">
										<center>
										  <table style="width:625px;text-align:center">
											<tbody>
											  <tr>
												<td style="padding:0 0 20px 0;border-bottom:1px solid #e9edee;">
												  <a href="https://www.netko.it" style="display:block; margin:0 auto;" target="_blank">
													<img src="https://main.btrackcore.com/Pictures/logo_long.png" width="75" height="75" alt="bTrack logo" style="border: 0px;">
												  </a>
												</td>
											  </tr>
											  <tr>
												<td colspan="2" style="padding:30px 0;">
												  <p style="color:#1d2227;line-height:28px;font-size:22px;margin:12px 10px 20px 10px;font-weight:400;">Hey ' . $participant["employee_name"] . " " . $participant["employee_surname"] . '</p>
												  <p style="margin:0 10px 10px 10px;padding:0;color:black;">' . $creator["employee_name"] . " " . $creator["employee_surname"] . ' has created a new task in the <strong>' . $workgroup["name"] . '</strong> workgroup, with the following subject <strong>' . $data["task_subject"] . '</strong>.<br>The task is scheduled on ' . $prettyDate . '.<br>To view the newly added task, simply click the link below.</p>
												  <a style="display: inline-block;background-color: rgb(255, 82, 82);font-weight: bold;text-align: center;letter-spacing: .5px;position: relative;cursor: pointer;overflow: hidden;-webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;-webkit-tap-highlight-color: transparent;vertical-align: middle;z-index: 1;-webkit-transition: .3s ease-out;transition: .3s ease-out;text-decoration: none;color: #fff;text-align: center;-webkit-box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2);box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2);border: none;border-radius: 2px;height: 36px;line-height: 36px;padding: 0 2rem;text-transform: uppercase;" href="' . $workgroupURL . '" target="_blank">GO TO WORKGROUP</a>
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
                    $mail->Subject = "New task " . $data["task_subject"] . "added";
                    $mail->msgHTML($emailBody);

                    $mail->send();
                }
                catch(Exception $e) {
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                }
            }
        }
        $task_id = WorkgroupDB::addWorkgroupTask($data["workgroup_id"], $_SESSION["id"], $participantString, $data["task_subject"], $data["task_description"], $task_start_date, $task_start_time, $task_end_date, $task_end_time, $custID, $subsID, $data["task_location"], $data["latitude"], $data["longitude"], $data["priority"], $fileString, $data["task_status"], $data["task_visibility"]);
        WorkgroupDB::addTaskAction($task_id, $_SESSION["id"], "Task created", 0);
		WorkgroupDB::addWorkgroupActivity($data["workgroup_id"], $_SESSION["id"], "Created a task with the subject " . $data["task_subject"]);
		
		foreach ($files as $filename){
			$filePath = "Workgroups/Workgroup/" . $data["workgroup_id"] . "/" . $filename;
			GeneralDB::addFileUpload($_SESSION["id"], $data["customer_id"], null, $task_id, null, null, $filename, $filePath);
		}
		
        if ($fileString != "") {
            WorkgroupDB::addTaskAction($task_id, $_SESSION["id"], "Uploaded task files - " . $data["files"], 0);
			WorkgroupDB::addWorkgroupActivity($data["workgroup_id"], $_SESSION["id"], "Uploaded the following following files to a task with the subject " . $data["task_subject"] . " - " . $data["files"]);
        }
		
    }

    public static function editWorkgroupTask() {
        $data = $_POST;
        $files = explode(",", $data["files"]);
        $fileString = implode(";", $files);
        $task = WorkgroupDB::getTaskByID($data["task_id"]);
		$taskExists = is_array($task);
		$custID = $data["customer_id"];
		$subsID = $data["subsidiary_id"];
		
		$task_start_date = date("Y-m-d", strtotime($data["task_startdate"]));
		$task_start_time = date("H:i", strtotime($data["task_starttime"]));
		$task_end_date = date("Y-m-d", strtotime($data["task_enddate"]));
		$task_end_time = date("H:i", strtotime($data["task_endtime"]));
		
		if ($custID == ""){
			$custID = null;
		}
		if ($subsID == ""){
			$subsID = null;
		}
		if ($taskExists){
			$workgroup = WorkgroupDB::getWorkgroupByID($task["workgroup_id"]);

			$curFiles = $task["task_files"];

			if ($curFiles == "") {
				$curFiles = $fileString;
			}
			else {
				$curFiles .= ";" . $fileString;
			}
			
			$edited_fields = array();
			$participantString = implode(",", $data["participants"]);
			if ($task["task_subject"] != $data["task_subject"]){
				array_push($edited_fields, "Subject changed to " . $data["task_subject"]);
			}
			if ($task["task_startdate"] != $task_start_date){
				array_push($edited_fields, "Start date changed to " . $task_start_date);
			}
			if ($task["task_starttime"] != $task_start_time){
				array_push($edited_fields, "Start time changed to " . $task_start_time);
			}
			if ($task["task_enddate"] != $task_end_date){
				array_push($edited_fields, "End date changed to " . $task_end_date);
			}
			if ($task["task_endtime"] != $task_end_time){
				array_push($edited_fields, "End time changed to " . $task_end_time);
			}
			if ($task["task_location"] != $data["task_location"]){
				array_push($edited_fields, "Location changed to " . $data["task_location"]);
			}
			if ($task["participants"] != $participantString){
				$newParticipants = WorkgroupDB::getWorkgroupEmployees($participantString);
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
			if ($task["task_description"] != $data["description"]){
				array_push($edited_fields, "Description changed to " . $data["task_description"]);
			}
			if ($task["status"] != $data["status"]){
				$statusString = "";
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

			WorkgroupDB::editWorkgroupTask($data["task_id"], $participantString, $data["task_subject"], $data["task_description"], $task_start_date, $task_start_time, $task_end_date, $task_end_time, $custID, $subsID, $data["task_location"], $data["latitude"], $data["longitude"], $data["priority"], $curFiles, $data["task_visibility"], $data["status"]);
			WorkgroupDB::addTaskAction($data["task_id"], $_SESSION["id"], "Task edited:<br>" . $editedFieldsString, 0);
			WorkgroupDB::addWorkgroupActivity($task["workgroup_id"], $_SESSION["id"], "Edited a task with the subject " . $data["task_subject"]);
			foreach ($files as $filename){
				$filePath = "Workgroups/Workgroup/" . $data["workgroup_id"] . "/" . $filename;
				GeneralDB::addFileUpload($_SESSION["id"], $data["customer_id"], null, $data["task_id"], null, null, $filename, $filePath);
			}
			if ($data["files"] != "") {
				WorkgroupDB::addTaskAction($data["task_id"], $_SESSION["id"], "Uploaded task files - " . $data["files"], 0);
				WorkgroupDB::addWorkgroupActivity($task["workgroup_id"], $_SESSION["id"], "Uploaded the following following files to a task with the subject " . $data["task_subject"] . " - " . $data["files"]);
			}

			$participants = WorkgroupDB::getWorkgroupEmployees($task["participants"]);

			$prettyDate = date("l, d. F Y, H:i", strtotime($task_start_date + " " + $task_start_time));
			
			$editor = UserDB::getEmployeeByID($_SESSION["id"]);

			foreach ($participants as $participant) {
				if ($participant["employee_mailing"] == 1 && $participant["workgroup_notifications"] == 1) {
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
						$workgroupURL = $protocol . "://" . $_SERVER['HTTP_HOST'] . "/" . BASE_URL . "workgroupdetails?workgroup_id=" . $task["workgroup_id"];
						$emailBody = '<div style="background-color:#fff;margin:0 auto 0 auto;padding:30px 0 30px 0;color:#4f565d;font-size:13px;line-height:20px;font-family:\'Helvetica Neue\',Arial,sans-serif;text-align:left;">
												<center>
												  <table style="width:625px;text-align:center">
													<tbody>
													  <tr>
														<td style="padding:0 0 20px 0;border-bottom:1px solid #e9edee;">
														  <a href="https://www.netko.it" style="display:block; margin:0 auto;" target="_blank">
															<img src="https://main.btrackcore.com/Pictures/logo_long.png" width="75" height="75" alt="bTrack logo" style="border: 0px;">
														  </a>
														</td>
													  </tr>
													  <tr>
														<td colspan="2" style="padding:30px 0;">
														  <p style="color:#1d2227;line-height:28px;font-size:22px;margin:12px 10px 20px 10px;font-weight:400;">Hey ' . $participant["employee_name"] . " " . $participant["employee_surname"] . '</p>
														  <p style="margin:0 10px 10px 10px;padding:0;color:black;">' . $editor["employee_name"] . " " . $editor["employee_surname"] . ' has edited a task with the subject <strong>' . $task["task_subject"] . '</strong> in the <strong>' . $workgroup["name"] . '</strong> workgroup. It\'s currently scheduled at ' . $prettyDate . '<br>To view the task, simply click the link below.</p>
														  <a style="display: inline-block;background-color: rgb(255, 82, 82);font-weight: bold;text-align: center;letter-spacing: .5px;position: relative;cursor: pointer;overflow: hidden;-webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;-webkit-tap-highlight-color: transparent;vertical-align: middle;z-index: 1;-webkit-transition: .3s ease-out;transition: .3s ease-out;text-decoration: none;color: #fff;text-align: center;-webkit-box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2);box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2);border: none;border-radius: 2px;height: 36px;line-height: 36px;padding: 0 2rem;text-transform: uppercase;" href="' . $workgroupURL . '" target="_blank">GO TO WORKGROUP</a>
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
						$mail->Subject = "Task " . $task["task_subject"] . " edited";
						$mail->msgHTML($emailBody);

						$mail->send();
					}
					catch(Exception $e) {
						echo 'Message could not be sent.';
						echo 'Mailer Error: ' . $mail->ErrorInfo;
					}
				}
			}
		}else{
			echo "This task has been deleted by another workgroup member, edit canceled.";
		}
    }

    public static function deleteWorkgroupTask() {
        $data = $_POST;
        $task = WorkgroupDB::getTaskByID($data["task_id"]);
		$taskExists = is_array($task);
		if ($taskExists){
			$participants = WorkgroupDB::getWorkgroupEmployees($task["participants"]);

			WorkgroupDB::deleteWorkgroupTask($data["task_id"]);
			WorkgroupDB::addTaskAction($data["task_id"], $_SESSION["id"], "Task deleted", 0);
			WorkgroupDB::addWorkgroupActivity($task["workgroup_id"], $_SESSION["id"], "Deleted a task with the subject " . $task["task_subject"]);
			
			$employee = UserDB::getEmployeeByID($_SESSION["id"]);

			foreach ($participants as $participant) {
				if ($participant["employee_mailing"] == 1 && $participant["workgroup_notifications"] == 1) {
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
															<img src="https://main.btrackcore.com/Pictures/logo_long.png" width="75" height="75" alt="bTrack logo" style="border: 0px;">
														  </a>
														</td>
													  </tr>
													  <tr>
														<td colspan="2" style="padding:30px 0;">
														  <p style="color:#1d2227;line-height:28px;font-size:22px;margin:12px 10px 20px 10px;font-weight:400;">Hey ' . $participant["employee_name"] . " " . $participant["employee_surname"] . '</p>
														  <p style="margin:0 10px 10px 10px;padding:0;color:black;">' . $employee["employee_name"] . " " . $employee["employee_surname"] . ' has deleted a task with the subject <strong>' . $task["task_subject"] . '</strong> in the <strong>' . $workgroup["name"] . '</strong> workgroup.</p>
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
						$mail->Subject = "Task " . $task["task_subject"] . " deleted";
						$mail->msgHTML($emailBody);

						$mail->send();
					}
					catch(Exception $e) {
						echo 'Message could not be sent.';
						echo 'Mailer Error: ' . $mail->ErrorInfo;
					}
				}
			}
		}else{
			echo "This task has already been deleted by another workgroup member, delete canceled.";
		}
    }

    public static function updateWorkgroupTask() {
        $data = $_POST;
		$task = WorkgroupDB::getTaskByID($data["task_id"]);
		$taskExists = is_array($task);
		if ($taskExists){
			WorkgroupDB::updateWorkgroupTask($data["task_id"], $data["status"]);

			$status = "INCOMPLETE";
			if ($data["status"] == 1) {
				$status = "IN PROGRESS";
			}
			else if ($data["status"] == 2) {
				$status = "FINISHED";
			}

			WorkgroupDB::addTaskAction($data["task_id"], $_SESSION["id"], "Task status updated to " . $status, 0);
			WorkgroupDB::addWorkgroupActivity($task["workgroup_id"], $_SESSION["id"], "Updated the status of a task with the subject " . $data["task_subject"] . " to " . $status);

			if ($data["status"] == 2) {
				$workgroup = WorkgroupDB::getWorkgroupByID($task["workgroup_id"]);
				$participants = WorkgroupDB::getWorkgroupEmployees($task["participants"]);
				foreach ($participant as $participant) {
					if ($participant["employee_mailing"] == 1 && $participant["workgroup_notifications"] == 1) {
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
							$workgroupURL = $protocol . "://" . $_SERVER['HTTP_HOST'] . "/" . BASE_URL . "workgroupdetails?workgroup_id=" . $task["workgroup_id"];
							$emailBody = '<div style="background-color:#fff;margin:0 auto 0 auto;padding:30px 0 30px 0;color:#4f565d;font-size:13px;line-height:20px;font-family:\'Helvetica Neue\',Arial,sans-serif;text-align:left;">
												<center>
												  <table style="width:625px;text-align:center">
													<tbody>
													  <tr>
														<td style="padding:0 0 20px 0;border-bottom:1px solid #e9edee;">
														  <a href="https://www.netko.it" style="display:block; margin:0 auto;" target="_blank">
															<img src="https://main.btrackcore.com/Pictures/logo_long.png" width="75" height="75" alt="bTrack logo" style="border: 0px;">
														  </a>
														</td>
													  </tr>
													  <tr>
														<td colspan="2" style="padding:30px 0;">
														  <p style="color:#1d2227;line-height:28px;font-size:22px;margin:12px 10px 20px 10px;font-weight:400;">Hey ' . $participant["employee_name"] . " " . $participant["employee_surname"] . '</p>
														  <p style="margin:0 10px 10px 10px;padding:0;color:black;">A task with the subject <strong>' . $task["task_subject"] . '</strong> in the <strong>' . $workgroup["name"] . '</strong> workgroup has been successfully finished.<br>To view the task, simply click the link below.</p>
														  <a style="display: inline-block;background-color: rgb(255, 82, 82);font-weight: bold;text-align: center;letter-spacing: .5px;position: relative;cursor: pointer;overflow: hidden;-webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;-webkit-tap-highlight-color: transparent;vertical-align: middle;z-index: 1;-webkit-transition: .3s ease-out;transition: .3s ease-out;text-decoration: none;color: #fff;text-align: center;-webkit-box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2);box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2);border: none;border-radius: 2px;height: 36px;line-height: 36px;padding: 0 2rem;text-transform: uppercase;" href="' . $workgroupURL . '" target="_blank">GO TO WORKGROUP</a>
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
							$mail->Subject = "Task " . $task["task_subject"] . " finished";
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
		}else{
			echo "This task has been deleted by a workgroup member, update canceled";
		}
    }

}

?>
