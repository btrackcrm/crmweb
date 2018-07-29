<?php
require_once ("Model/GeneralDB.php");
require_once ("Model/UserDB.php");
require_once ("Model/TrackingDB.php");
require_once ("Model/CustomerDB.php");
require_once ("ViewHelper.php");
require_once ('libs/PHPMailer/src/Exception.php');
require_once ('libs/PHPMailer/src/PHPMailer.php');
require_once ('libs/PHPMailer/src/SMTP.php');
require_once ('libs/GoogleAuthenticator/GoogleAuthenticator.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class GeneralController {

    public static function login() {
        $user = GeneralDB::getUserInfo($_POST["username"]);
        $employee = UserDB::getEmployeeByID($user["user_id"]);
        if ($employee["employee_active"] == 0) {
            ViewHelper::render("View/login.php", ["errorMessage" => "Your account has been deactivated. Please contact the admin for further details."]);
        }
        else if (password_verify($_POST["password"], $user["password"])) {
            $_SESSION['user'] = $user["username"];
            $_SESSION['namesurname'] = $employee["employee_name"] . " " . $employee["employee_surname"];
            $_SESSION['position'] = $employee["employee_position"];
			$_SESSION['dateformat'] = $employee["date_format"];
			$_SESSION['timeformat'] = $employee["time_format"];
            $_SESSION['workfrom'] = $user["workfrom"];
            $_SESSION['workto'] = $user["workto"];
            $_SESSION['admin'] = $user["type"];
            $_SESSION['license_id'] = $user["license_id"];
            $_SESSION['expiry_date'] = $user["expiry_date"];
            $_SESSION["2fa_status"] = $user["2fa_status"];
            $_SESSION["queue"] = $user["queue"];
            $_SESSION["extension"] = $user["extension"];
			$_SESSION["menuitems"] = array(0,1,2,3,4,5,6,7,8);
            if ($user["2fa_status"] == 0) { //2fa turned off, login user
                $_SESSION['id'] = $user["user_id"];
                GeneralDB::loginUser($_SESSION["id"]);
                if ($user["show_wizard"] == 1 && $user["license_id"] != "") {
                    ViewHelper::redirect(BASE_URL . "wizard");
                }
                else {
                    ViewHelper::redirect(BASE_URL . "dashboard");
                }
            }
            else {
                $secret = $user['google_auth_code'];
                $email = $user['username'];

                $ga = new GoogleAuthenticator();

                $qrCodeUrl = $ga->getQRCodeGoogleUrl($email, $secret, 'bTrack.io');
                ViewHelper::render("View/2fa.php", ["QRCode" => $qrCodeUrl, "secret" => $secret]);
            }
        }
        else {
            ViewHelper::render("View/login.php", ["errorMessage" => "Incorrect username and/or password entered."]);
        }
    }

    public static function TFALogin() {
        $user = GeneralDB::getUserInfo($_SESSION["user"]);
        $secret = $user['google_auth_code'];
        $email = $user['username'];

        $ga = new GoogleAuthenticator();

        $qrCodeUrl = $ga->getQRCodeGoogleUrl($email, $secret, 'bTrack.io');
        $code = $_POST['code'];
        $ga = new GoogleAuthenticator();
        $checkResult = $ga->verifyCode($secret, $code, 3); // 2 = 2 * 30sec clock tolerance
        if ($checkResult) {
            $_SESSION['id'] = $user["user_id"];
            GeneralDB::loginUser($_SESSION["id"]);
            if ($user["show_wizard"] == 1 && $user["license_id"] != "") {
                ViewHelper::redirect(BASE_URL . "wizard");
            }
            else {
                ViewHelper::redirect(BASE_URL . "dashboard");
            }
        }
        else {
            ViewHelper::render("View/login.php", ["errorMessage" => "2FA authentication failed, please try again. "]);
        }
    }
	
	public static function deleteOldFiles(){
		$transfers_to_delete = GeneralDB::getExpiredTransfers(); //get transfers that are 7+ days old
		
		foreach ($transfers_to_delete as $transfer){
			unlink($transfer["filepath"]);
			GeneralDB::deleteTransfer($transfer["transfer_id"]);
		}
	}
	
	public static function showDownloadPage(){
		$data = $_GET;
		$unique_id = $data["transfer_id"];
		
		$transfer = GeneralDB::getFileTransfer($unique_id);
		if (is_array($transfer)){
			$filepath = $transfer["filepath"];
		
			ViewHelper::render("View/filedownload.php", ["download_link" => $filepath]);
		}else{
			ViewHelper::render("View/expired.php");
		}
	}
	
	public static function getAllFileTransfers(){
		$transfers = GeneralDB::getAllTransfers();
		echo json_encode($transfers);
	}
	
	public static function transferFilesSecurely(){
		$uploadResponse = array();
		$storeFolder = 'Uploads/TransferFiles/';
		$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
		
		$randFilename = substr(str_shuffle($chars), 0, 12) . ".zip"; //shuffles above string and returns first 12 characters to be used as ZIP name
		
		if (!empty($_FILES)) {
			$fileList = "";
			$fileCount = 0;
			$zip = new ZipArchive();
			$zipname = "Uploads/TransferFiles/" . $randFilename;

			if ($zip->open($zipname, ZipArchive::CREATE)!== TRUE) {
				$uploadResponse["error"] = true;
				$uploadResponse["message"] = "Could not create ZIP archive";
				echo json_encode($uploadResponse);
				return;
			}
			
			$password = substr(str_shuffle($chars), 0, 8); //shuffles above string and returns first 8 characters to be used as ZIP password
			
			$zip->setPassword($password);
			foreach($_FILES['file']['tmp_name'] as $key => $value) {
				$tempFile = $_FILES['file']['tmp_name'][$key];
				$filename = basename($_FILES['file']['name'][$key]);
				$fileList .= $filename . "<br>";
				$zip->addFile($tempFile, $filename);
				$zip->setEncryptionName($filename, ZipArchive::EM_AES_256);
				$fileCount++;
			}
			
			$zip->close();
			
			
			$bytes = filesize($zipname);
			
			if ($bytes >= 1073741824)
			{
				$bytes = number_format($bytes / 1073741824, 2) . ' GB';
			}
			elseif ($bytes >= 1048576)
			{
				$bytes = number_format($bytes / 1048576, 2) . ' MB';
			}
			elseif ($bytes >= 1024)
			{
				$bytes = number_format($bytes / 1024, 2) . ' KB';
			}
			elseif ($bytes > 1)
			{
				$bytes = $bytes . ' bytes';
			}
			elseif ($bytes == 1)
			{
				$bytes = $bytes . ' byte';
			}
			else
			{
				$bytes = '0 bytes';
			}

			$unique_transfer_id = str_shuffle($chars);
			
			$settings = GeneralDB::getSettings();
			// set post fields
			$data = array(
				'message' => $_POST["email_from"] . " has sent some files to your e-mail. You can access the files with the following password: " . $password,
				'from_number' => "38664119001",
				'to_number' => str_replace("+", "", $_POST["phonenr"])
			);
			$data_string = json_encode($data);

			$ch = curl_init($settings["sms_url"]);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
				'Content-Type: application/json',
				'Content-Length: ' . strlen($data_string)
			));
			curl_setopt($ch, CURLOPT_USERPWD, $settings["sms_username"] . ":" . $settings["sms_password"]);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);

			// execute!
			$response = curl_exec($ch);

			// close the connection, release resources used
			curl_close($ch);

			// do anything you want with your response
			$response = json_decode($response, true);
			
			if ($response["error_code"] == "0") { //no error
				$customer = CustomerDB::getCustomerOrContactByEmail($_POST["email_to"]);
				$customer_id = null;
				if (is_array($customer)){
					$customer_id = $customer["customer_id"];
				}
				GeneralDB::addFileTransfer($unique_transfer_id, $_SESSION["id"], $zipname, $_POST["email_to"], $_POST["phonenr"], $customer_id);
				$recipients = explode(",", $_POST["email_to"]);
				if (isset($_SERVER['HTTPS'])) {
                    $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
                }
				else {
                    $protocol = 'http';
                }
                $download_link = $protocol . "://" . $_SERVER['HTTP_HOST'] . BASE_URL . "transfer?transfer_id=" . $unique_transfer_id;
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
					$mail->setFrom("notify@btrack.io", "notify@btrack.io");
					foreach ($recipients as $recipient){
						$mail->addAddress($recipient, $recipient);
					}
					//Content
					$mail->isHTML(true); // Set email format to HTML
					$mail->Subject = $_POST["email_from"] . " sent you files via bTrack";

					$emailBody = '<div style="background-color:rgb(240, 243, 244);width:100%;height:auto;padding:40px;">
								<div style="margin:0px auto;background-color:white;width: 600px;">
									<div style="height: 50px; background-color: #ff5b57;">
									</div>
									<div style="padding:40px 80px;">
										<img src="https://copy.btrackcore.com/assets/img/b-io.png" style="width: 64px;margin: 0 auto; display:block" />
										<h3 style="text-align:center;"><a href="mailto:neicrihar@gmail.com" style="text-decoration:none;color:#348fe2;">' . $_POST["email_from"] . '</a><br>sent you some files</h3>
										<p style="outline: none;text-align:center;color: #6a6d70;font-size: 14px;font-style: normal;font-weight: normal;line-height: 23px;word-spacing: 0;margin: 0;padding: 20px 0px 0;">' . $fileCount .' file(s), ' . $bytes . ' in total - Will be deleted on ' . date("d F, Y", strtotime("+7 days")) . '</p>
										<a href="' . $download_link . '" target="_blank" style="display:block;font-size:14px;text-align:center;width:150px;margin:15px auto;background-color: rgb(255,82,82);letter-spacing: .5px;overflow: hidden;vertical-align: middle;text-decoration: none;color: #fff;border: none;height: 36px;line-height: 36px;padding: 0 2rem;">GET FILES</a>
										<div style="width: 100%;height: 1px;margin: 20px 0px;background-color: #f4f4f4;"></div>
										<h4 style="margin-bottom: 0px;margin-top:20px;">Download link</h4>
										<a href="' . $download_link . '" style="text-decoration:none;color:#348fe2;font-size: 14px;">' . $download_link . '</a>
										<h4 style="margin-bottom: 0px;margin-top:20px;">Message</h5>
										<p style="outline: none;color: #6a6d70;font-size: 14px;font-style: normal;font-weight: normal;line-height: 23px;word-spacing: 0;margin: 0;">' . $_POST["message"] . '</p>
										<h4 style="margin-bottom: 0px;margin-top:20px;">Files</h5>
										<p style="outline: none;color: #6a6d70;font-size: 14px;font-style: normal;font-weight: normal;line-height: 23px;word-spacing: 0;margin: 0;">' . $fileList . '</p>
									</div>
									<div style="border-top:1px solid #f4f4f4;">
										<p style="outline: none;text-align:center;color: #797c7f;font-size: 11px;font-style: normal;font-weight: normal;line-height: 23px;word-spacing: 0;margin: 0;padding: 10px 0px 10px 0px;">To make sure you don\'t miss any of our e-mails, please add notify@btrack.io to your contacts list.</p>
									</div>
								</div>
							</div>';
					$mail->msgHTML($emailBody);

					if ($mail->send()){
						$uploadResponse["error"] = false;
						$uploadResponse["message"] = "Files were successfully sent";
						echo json_encode($uploadResponse);
					}else{
						$uploadResponse["error"] = true;
						$uploadResponse["message"] = "E-mail sending failed";
						echo json_encode($uploadResponse);
					}
				}catch(Exception $e) {
					echo 'Mailer Error: ' . $mail->ErrorInfo;
					$uploadResponse["error"] = true;
					$uploadResponse["message"] = $mail->ErrorInfo;
					echo json_encode($uploadResponse);
					return false;
				}
				return true;
			}else {
				$uploadResponse["error"] = true;
				$uploadResponse["errorcode"] = $response;
				$uploadResponse["message"] = "Could not send SMS to specified phone number - " . str_replace("+", "", $_POST["phonenr"]);
				echo json_encode($uploadResponse);
				return false; //sms sending failed.
			}
		}else{
			$uploadResponse["error"] = true;
			$uploadResponse["message"] = "You must upload at least one file.";
			echo json_encode($uploadResponse);
		}
		
	}
	
	public static function uploadCompanyLogo(){
		$data = $_POST;
        $imageFolder = "assets/img/";
		reset ($_FILES);
  		$temp = current($_FILES);
  		if (is_uploaded_file($temp['tmp_name'])){
  			if (!in_array(strtolower(pathinfo($temp['name'], PATHINFO_EXTENSION)), array("gif", "jpg", "png"))) {
        		header("HTTP/1.0 500 Invalid extension.");
				echo "Invalid file extension";
        		return;
    		}
    		$filetowrite = $imageFolder . $temp['name'];
			if (file_exists($filetowrite)){
				GeneralDB::setCompanyLogo($temp["name"]);
				echo json_encode(array('location' => $filetowrite));
			}else if (move_uploaded_file($temp['tmp_name'], $filetowrite)){
    			GeneralDB::setCompanyLogo($temp["name"]);
				echo json_encode(array('location' => $filetowrite));
			}
  		}else {
    			// Notify editor that the upload failed
    			header("HTTP/1.0 500 Server Error");
				echo "File upload failed.";
  		}
	}

    public static function logout() {
        GeneralDB::logoutUser($_SESSION["id"]);
        session_destroy();
        ViewHelper::render("View/login.php");
    }

    public static function parseImportedCSV() {
        $tmpName = $_FILES['csv']['tmp_name'];
        $handle = fopen($tmpName, 'r');
        $response = array();
        if ($handle !== false) {
            $row = 0;
            $columns = array();
            $rows = array();
            while (($data = fgetcsv($handle, 1000, ',')) !== false && $row < 5) {
                // number of fields in the csv
                $col_count = count($data);

                if ($row == 0) {
                    foreach ($data as $column) {
                        array_push($columns, $column);
                    }
                }
                else {
                    foreach ($data as $column) {
                        array_push($rows, $column);
                    }
                }

                // inc the row
                $row++;
            }
            fclose($handle);
        }
        $uploadPath = "Uploads/" . $_FILES["csv"]["name"];
        if (!file_exists($uploadPath)) {
            move_uploaded_file($_FILES["csv"]["tmp_name"], $uploadPath);
        }
        $_SESSION["csv"] = $uploadPath;
        $response["columns"] = $columns;
        $response["rows"] = $rows;
        echo json_encode($response);
    }

    public static function testIMAPConnection() {
        $data = $_POST;
        $ssl = "";
        if ($data["email_ssl"] == 1 && $data["email_validatecert"] == 1) {
            $ssl = "ssl/validate-cert";
        }
        else if ($data["email_ssl"] == 1) {
            $ssl = "ssl/novalidate-cert";
        }
        /* connect to server */
        $hostname = "{" . $data["email_host"] . ":993/imap/" . $ssl . "}INBOX";
        $username = $data["email_username"];
        $password = $data["email_password"];

        /* try to connect */
        imap_open($hostname, $username, $password) or die('Cannot connect to mailbox: ' . imap_last_error());

        echo "OK";
    }

    public static function saveTrackingTerms() {
        $data = $_POST;

        GeneralDB::saveTrackingTerms($data["terms"]);
    }

    public static function saveEmailSettings() {
        $data = $_POST;

        GeneralDB::saveEmailSettings($data["email_host"], $data["email_username"], $data["email_password"], $data["email_ssl"], $data["email_validatecert"]);
    }

    public static function saveMKSettings() {
        $data = $_POST;
        GeneralDB::saveMKSettings($data["mk_secretkey"], $data["mk_companyid"]); //MK being MetaKocka API
        
    }

    public static function disconnectMK() {
        GeneralDB::saveMKSettings("", 0);
    }

    public static function sendPasswordReset() {
        $user = GeneralDB::getUserInfo($_POST["username"]);
        if (is_array($user)) { //if user with this email exists, send email, otherwise give no user exists error.
            $employee = UserDB::getEmployeeByID($user["user_id"]);
            if ($employee["employee_active"] == 1) {
                $resetURL = "http://" . $_SERVER['SERVER_NAME'] . BASE_URL . "/resetpassword?employee_id=" . $employee["employee_id"]; 
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
                    $mail->addAddress($_POST["username"], $_POST["username"]);
                    //Content
                    $mail->isHTML(true); // Set email format to HTML
                    $mail->Subject = "bTrack password reset";

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
											  <p style="color:#1d2227;line-height:28px;font-size:22px;margin:12px 10px 20px 10px;font-weight:400;">Hey ' . $employee["employee_name"] . " " . $employee["employee_surname"] . '</p>
											  <p style="margin:0 10px 10px 10px;padding:0;color:black;">It seems you\'ve sent us a password reset request.<br>To reset your password click the button below.</p>
											  <a style="display: inline-block;background-color: rgb(255, 82, 82);font-weight: bold;text-align: center;letter-spacing: .5px;position: relative;cursor: pointer;overflow: hidden;-webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;-webkit-tap-highlight-color: transparent;vertical-align: middle;z-index: 1;-webkit-transition: .3s ease-out;transition: .3s ease-out;text-decoration: none;color: #fff;text-align: center;-webkit-box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2);box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2);border: none;border-radius: 2px;height: 36px;line-height: 36px;padding: 0 2rem;text-transform: uppercase;" href="' . $resetURL . '" target="_blank">RESET MY PASSWORD</a>
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
                    $mail->msgHTML($emailBody);

                    $mail->send();
                    ViewHelper::render("View/login.php", ["errorMessage" => "Password reset e-mail sent."]);
                }
                catch(Exception $e) {
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                    ViewHelper::render("View/login.php", ["errorMessage" => "Error when trying to send e-mail."]);
                }
            }
            else {
                ViewHelper::render("View/login.php", ["errorMessage" => "User with this e-mail address has been deactivated, cannot reset password."]);
            }
        }
        else {
            ViewHelper::render("View/login.php", ["errorMessage" => "User with this e-mail address does not exist."]);
        }
    }
	
	public static function resetPassword(){
			$data = $_GET;
			$employee = UserDB::getEmployeeByID($data["employee_id"]);
			$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
            $pass = array(); //remember to declare $pass as an array
            $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
            for ($i = 0;$i < 8;$i++) {
                $n = rand(0, $alphaLength);
                $pass[] = $alphabet[$n];
            }
            $password = implode($pass); //turn the array into a string
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
			
			$loginURL = "http://" . $_SERVER['SERVER_NAME'] . BASE_URL;
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
                $mail->addAddress($employee["employee_email"], $employee["employee_email"]);
                //Content
                $mail->isHTML(true); // Set email format to HTML
                $mail->Subject = "bTrack password reset";

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
											  <p style="color:#1d2227;line-height:28px;font-size:22px;margin:12px 10px 20px 10px;font-weight:400;">Hey there ' . $employee["employee_name"] . " " . $employee["employee_surname"] . '</p>
											  <p style="margin:0 10px 10px 10px;padding:0;color:black;">You\'ve successfully changed your password.<br>Your new password is <strong>' . $password . '</strong></p>
											  <a style="display: inline-block;background-color: rgb(255, 82, 82);font-weight: bold;text-align: center;letter-spacing: .5px;position: relative;cursor: pointer;overflow: hidden;-webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;-webkit-tap-highlight-color: transparent;vertical-align: middle;z-index: 1;-webkit-transition: .3s ease-out;transition: .3s ease-out;text-decoration: none;color: #fff;text-align: center;-webkit-box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2);box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2);border: none;border-radius: 2px;height: 36px;line-height: 36px;padding: 0 2rem;text-transform: uppercase;" href="' . $loginURL . '" target="_blank">GO TO LOGIN PAGE</a>
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
                $mail->msgHTML($emailBody);

                $mail->send();
                GeneralDB::changeUserPassword($employee["employee_email"], $hashed_password);
                ViewHelper::render("View/login.php", ["errorMessage" => "Password reset successful. New password sent to e-mail."]);
            }
            catch(Exception $e) {
                echo 'Mailer Error: ' . $mail->ErrorInfo;
                ViewHelper::render("View/login.php", ["errorMessage" => "Error when trying to send e-mail."]);
            }
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

    public static function completeWizard() {
        $data = $_POST;
        GeneralDB::updateBasicSettings($data["company_name"], $data["company_address"], $data["company_city"], $data["company_zipcode"], $data["company_contact"]);
        UserDB::setWizardDone($_SESSION["id"]);
        ViewHelper::redirect(BASE_URL . "dashboard");
    }

    public static function resetElapsedDistances() {
        //Resets elapsed distances to 0 and saves today's elapsed distances into DB table
        $employees = UserDB::getListOfUsers();
        foreach ($employees as $employee) {
            if ($employee["distance"] > 0) {
                TrackingDB::saveEmployeeElapsedDistance($employee["employee_id"], $employee["distance"]);
            }
        }
        GeneralDB::resetElapsedDistances();
    }

    public static function getFreeDiskSpace() {
        $data = $_POST;

        $response = array();
        $disk_used = foldersize($data["directory"]);
        $response["disk_used"] = formatSize($disk_used);
        echo json_encode($response);
    }

    public static function getListOfFiles() {
        $response = array();
        $filesDB = GeneralDB::getListOfFiles();
        $dir = "Uploads/EmployeeFiles";
        $order = "a";
        $ext = array(
            "jpg",
            "gif",
            "jpeg",
            "png",
            "doc",
            "xls",
            "pdf",
            "tif",
            "ico",
            "xcf",
            "gif87",
            "scr"
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
                            else if ($extension == "zip" || $extension == "rar" || $extension == "7z") {
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
                $listDir['children'][] = GeneralController::dir_to_jstree_array($d);
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

        $response["listdir"] = $listDir;
        $response["files"] = $filesDB;

        echo json_encode($response);
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
                "7z"
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
                            else if ($extension == "zip" || $extension == "rar" || $extension == "7z") {
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
                $listDir['children'][] = GeneralController::dir_to_jstree_array($d);
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

    public static function getUnknownStopsDate() {
        $data = $_POST;
        $unknownstops = GeneralDB::getUnknownStopsDate($data["employee_id"], $data["datetime"]);
        echo json_encode($unknownstops);
    }

    public static function getUniqueUploadDates() {
        $data = $_POST;
        $dates = GeneralDB::getUniqueUploadDates($data["employee_id"]);
        echo json_encode($dates);
    }

    public static function getUniqueUnknownStopsDates() {
        $data = $_POST;
        $dates = GeneralDB::getUniqueUnknownStopsDates($data["employee_id"]);
        echo json_encode($dates);
    }

    public static function getEmployeeFiles() {
        $data = $_POST;
        $response = array();
        $filesDB = GeneralDB::getEmployeeFiles($data["employee_id"], $data["datetime"]);
        $dir = "Uploads/EmployeeFiles/Employee" . $data["employee_id"];
        $order = "a";
        $ext = array(
            "jpg",
            "gif",
            "jpeg",
            "png",
            "doc",
            "xls",
            "pdf",
            "tif",
            "ico",
            "xcf",
            "gif87",
            "scr"
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
                            else if ($extension == "zip" || $extension == "rar" || $extension == "7z") {
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
                $listDir['children'][] = GeneralController::dir_to_jstree_array($d);
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

        $response["listdir"] = $listDir;
        $response["files"] = $filesDB;

        echo json_encode($response);
    }

    public static function editSettings() {
        $data = $_POST;
        GeneralDB::editSettings($data["notifications_email"], $data["company_name"], $data["company_address"], $data["company_city"], $data["company_zipcode"], $data["company_phonenumber"], $data["decimal_seperator"], $data["employees_showinactive"]);
    }
	
	public static function editTelephonySettings(){
		$data = $_POST;
		GeneralDB::editTelephonySettings($data["telephony_showemails"], $data["telephony_showmobile"], $data["ticketing_prefix"], $data["workorder_prefix"]);
	}
	
	public static function editTrackingSettings(){
		$data = $_POST;
		GeneralDB::editTrackingSettings($data["event_radius"], $data["location_radius"], $data["worktime_from"], $data["worktime_to"], $data["stop_duration"], $data["trip_cost"], $data["daily_allowance"], $data["travelorder_prefix"]);
	}
	
	public static function editSMSSettings(){
		$data = $_POST;
		GeneralDB::editSMSSettings($data["sms_url"], $data["sms_label"], $data["sms_username"], $data["sms_password"]);
	}
	
    public static function getSettings() {
        $settings = GeneralDB::getSettings();

        echo json_encode($settings);
    }

    public static function searchByVAT() {
        $data = $_POST;
        $curl_request = curl_init();
        $url = "http://ddv.inetis.com/Ajax.aspx?a=isci&niz=" . urlencode($data["searchQ"]);
        $headers = array(
            'Accept: application/json',
            'Content-Type: application/json',
        );
        curl_setopt($curl_request, CURLOPT_URL, $url);
        curl_setopt($curl_request, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($curl_request, CURLOPT_TIMEOUT, 10);
        curl_setopt($curl_request, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl_request, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl_request, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl_request, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($curl_request);
        $err = curl_error($curl_request);

        echo $result;
    }

    public static function getEmailDate() {
        $data = $_POST;
        $emails = GeneralDB::getEmailDate($data["employee_id"], $data["datetime"]);
        echo json_encode($emails);
    }

    public static function getSMSDate() {
        $data = $_POST;
        $sms = GeneralDB::getSMSDate($data["employee_id"], $data["datetime"]);
        echo json_encode($sms);
    }

    public static function getUnknownStops() {
        $stops = GeneralDB::getUnknownStops(); //get all stops with no customers nearby
        echo json_encode($stops);
    }

    public static function addStopCustomer() {
        $data = $_POST;
        GeneralDB::addStopCustomer($data["stop_id"], $data["customer_name"]);
    }

    public static function getSentEmails() {
        $emails = GeneralDB::getSentEmails();
        echo json_encode($emails);
    }

    public static function getSentSMS() {
        $sms = GeneralDB::getSentSMS();
        echo json_encode($sms);
    }

    public static function getAllReminders() {
        $reminders = GeneralDB::getAllReminders();
        echo json_encode($reminders);
    }

    public static function getTodaysReminders() {
        $data = $_POST;
        $reminders = GeneralDB::getTodaysReminders($data["employee_id"]);
        echo json_encode($reminders);
    }

    public static function getRemindersByDate() {
        $data = $_POST;
        $reminders = GeneralDB::getRemindersByDate($data["employee_id"], $data["datetime"]);
        echo json_encode($reminders);
    }

    public static function getRemindersLastWeek() {
        $reminders = GeneralDB::getRemindersLastWeek();
        echo json_encode($reminders);
    }

    public static function getRemindersByEmployee() {
        $data = $_POST;
        $reminders = GeneralDB::getRemindersByEmployee($data["employee_id"]);
        echo json_encode($reminders);
    }

    public static function getCallsByDate() {
        $data = $_POST;
        $calls = GeneralDB::getCallsByDate($data["employee_id"], $data["datetime"]);
        echo json_encode($calls);
    }

    public static function getUniqueReminderDates() {
        $data = $_POST;
        $dates = GeneralDB::getUniqueReminderDates($data["employee_id"]);
        echo json_encode($dates);
    }

    public static function getUniqueCallDates() {
        $data = $_POST;
        $dates = GeneralDB::getUniqueCallDates($data["employee_id"]);
        echo json_encode($dates);
    }

    public static function getUniqueMessageDates() {
        $dates = GeneralDB::getUniqueMessageDates($_POST["type"], $_POST["employee_id"]);
        echo json_encode($dates);
    }

    public static function getAllTodaysReminders() {
        $reminders = GeneralDB::getAllTodaysReminders();
        echo json_encode($reminders);
    }

    public static function getCalls() {
        $calls = GeneralDB::getCalls();
        echo json_encode($calls);
    }
}

function foldersize($path) {
    $total_size = 0;
    $files = scandir($path);
    $cleanPath = rtrim($path, '/') . '/';

    foreach ($files as $t) {
        if ($t <> "." && $t <> "..") {
            $currentFile = $cleanPath . $t;
            if (is_dir($currentFile)) {
                $size = foldersize($currentFile);
                $total_size += $size;
            }
            else {
                $size = filesize($currentFile);
                $total_size += $size;
            }
        }
    }

    return $total_size;
}

function formatSize($bytes) {
    $types = array(
        'B',
        'KB',
        'MB',
        'GB',
        'TB'
    );
    for ($i = 0;$bytes >= 1024 && $i < (count($types) - 1);$bytes /= 1024, $i++);
    return (round($bytes, 2) . " " . $types[$i]);
}

?>
