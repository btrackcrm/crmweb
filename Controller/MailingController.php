<?php
require_once 'vendor/autoload.php';

require_once ("Model/GeneralDB.php");
require_once ("Model/UserDB.php");
require_once ("Model/CustomerDB.php");
require_once ("Model/EventDB.php");
require_once ("Model/TemplateDB.php");
require_once ("Model/TelephonyDB.php");
require_once ("Controller/icsReader.php");
require_once ('libs/PHPMailer/src/Exception.php');
require_once ('libs/PHPMailer/src/PHPMailer.php');
require_once ('libs/PHPMailer/src/SMTP.php');
require_once ("ViewHelper.php");

use ICal\ICal;

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
use \jamesiarmes\PhpEws\Request\FindItemType;
use \jamesiarmes\PhpEws\Request\GetFolderType;
use \jamesiarmes\PhpEws\Enumeration\IndexBasePointType;
use \jamesiarmes\PhpEws\Enumeration\ItemQueryTraversalType;
use \jamesiarmes\PhpEws\Enumeration\ConflictResolutionType;
use \jamesiarmes\PhpEws\Type\IndexedPageViewType;
use \jamesiarmes\PhpEws\Type\ItemResponseShapeType;
use \jamesiarmes\PhpEws\Type\TargetFolderIdType;
use \jamesiarmes\PhpEws\Request\DeleteFolderType;
use \jamesiarmes\PhpEws\Request\MoveItemType;
use \jamesiarmes\PhpEws\Enumeration\DisposalType;
use \jamesiarmes\PhpEws\Request\DeleteItemType;
use \jamesiarmes\PhpEws\Type\FolderIdType;
use \jamesiarmes\PhpEws\Type\ItemIdType;
use \jamesiarmes\PhpEws\Request\GetItemType;
use \jamesiarmes\PhpEws\Request\UpdateItemType;
use \jamesiarmes\PhpEws\ArrayType\NonEmptyArrayOfBaseItemIdsType;
use \jamesiarmes\PhpEws\ArrayType\NonEmptyArrayOfPathsToElementType;
use \jamesiarmes\PhpEws\Enumeration\MapiPropertyTypeType;
use \jamesiarmes\PhpEws\Enumeration\ImportanceChoicesType;
use \jamesiarmes\PhpEws\Type\PathToExtendedFieldType;
use \jamesiarmes\PhpEws\ArrayType\NonEmptyArrayOfRequestAttachmentIdsType;
use \jamesiarmes\PhpEws\Request\CreateItemType;
use \jamesiarmes\PhpEws\ArrayType\NonEmptyArrayOfAllItemsType;
use jamesiarmes\PhpEws\Enumeration\BodyTypeType;
use jamesiarmes\PhpEws\Enumeration\MessageDispositionType;
use \jamesiarmes\PhpEws\ArrayType\ArrayOfRecipientsType;
use \jamesiarmes\PhpEws\Type\EmailAddressType;
use \jamesiarmes\PhpEws\Type\SingleRecipientType;
use \jamesiarmes\PhpEws\Request\SendItemType;
use \jamesiarmes\PhpEws\Request\CreateFolderType;
use \jamesiarmes\PhpEws\ArrayType\ArrayOfFoldersType;
use \jamesiarmes\PhpEws\Type\FolderType;
use \jamesiarmes\PhpEws\Request\GetAttachmentType;
use \jamesiarmes\PhpEws\Type\RequestAttachmentIdType;
use \jamesiarmes\PhpEws\Type\BodyType;
use \jamesiarmes\PhpEws\Type\ReplyAllToItemType;
use \jamesiarmes\PhpEws\Type\FileAttachmentType;
use \jamesiarmes\PhpEws\Type\ContainsExpressionType;
use \jamesiarmes\PhpEws\Type\MessageType;
use \jamesiarmes\PhpEws\Type\ItemChangeType;
use \jamesiarmes\PhpEws\Type\SetItemFieldType;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class MailingController {

    public static function showWebmailPage() {
        $employee = UserDB::getEmployeeByID($_SESSION["id"]);
        ViewHelper::render("View/webmail_chooser.php", ["employee" => $employee]);
    }

    public static function addEmailFilter() {
        $data = $_POST;
        $settings = UserDB::getIMAPSettings($_SESSION["id"]);
        GeneralDB::addEmailFilter($_SESSION["id"], $data["filter_field"], $data["filter_text"], $data["filter_mailbox"], $settings["imap_username"]);
    }

    public static function editEmailFilter() {
        $data = $_POST;
        GeneralDB::editEmailFilter($data["filter_id"], $data["filter_field"], $data["filter_text"], $data["filter_mailbox"]);
    }

    public static function deleteEmailFilter() {
        $data = $_POST;
        GeneralDB::deleteEmailFilter($data["filter_id"]);
    }

    public static function getEmailFilters() {
        $settings = UserDB::getIMAPSettings($_SESSION["id"]);
        $filters = GeneralDB::getEmailFilters($settings["imap_username"]);

        echo json_encode($filters);
    }
	
	public static function getEmailActions(){
		$data = $_POST;
		$settings = UserDB::getIMAPSettings($_SESSION["id"]);
		$actions = GeneralDB::getMailmanagerActions($settings["imap_username"], $data["date"]);
		
		echo json_encode($actions);
	}
	
	public static function runEmailFiltering(){
		$employeeList = UserDB::getListOfUsers();
		$filtered_emails = array();
		foreach ($employeeList as $employee){
			if ($employee["imap_username"] != "" && !in_array($employee["imap_username"], $filtered_emails)){
				runEmailFilters($employee["employee_id"]);
			}
		}
	}

    public static function filterEmails() {
        runEmailFilters($_SESSION["id"]);
    }
	
	public static function handleOffice365Callback(){
		$response = MailingController::authOffice365Account($_GET['code']);
		UserDB::saveOffice365Token($_SESSION["id"], $response["access_token"], $response["refresh_token"], date("Y-m-d H:i:s", strtotime("+" . $response["expires_in"] . " seconds")));
		ViewHelper::redirect(BASE_URL . "webmail/office365");
	}
	
	public static function authOffice365Account($auth) {
		$arraytoreturn = array();
		if (isset($_SERVER['HTTPS'])) {
            $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
        } else {
            $protocol = 'http';
        }
		$callbackURL = $protocol . "://" . $_SERVER['HTTP_HOST'] . BASE_URL . "office365/callback";
		$output = "";
		try {
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, "https://login.microsoftonline.com/1f50a38f-9604-4967-804d-bc6a7cf705ae/oauth2/v2.0/token");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);	
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
				'Content-Type: application/x-www-form-urlencoded',
				));
			curl_setopt($ch, CURLOPT_POST, TRUE);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);		

			$data = "client_id=c2785070-f16d-46f5-bc12-304410eca8ad&scope=profile%20offline_access%20https%3A%2F%2Fgraph.microsoft.com%2Fmail.read%20https%3A%2F%2Fgraph.microsoft.com%2Fmail.send%20https%3A%2F%2Fgraph.microsoft.com%2Fmail.readwrite%20https%3A%2F%2Fgraph.microsoft.com%2Fcalendars.readwrite%20https%3A%2F%2Fgraph.microsoft.com%2Fcontacts.readwrite%20https%3A%2F%2Fgraph.microsoft.com%2Ftasks.readwrite%20openid&redirect_uri=".urlencode($callbackURL)."&client_secret=" . urlencode("M8cOh7PR4Z7tOjPfB2GDxlmVJeyiN4IG4poSTXlmsR4=") . "&code=".$auth."&grant_type=authorization_code";	
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			$output = curl_exec($ch);
		} catch (Exception $e) {
			
		}
	
		$out2 = json_decode($output, true);
		curl_close($ch);
		return $out2;
	}

	public static function getOffice365Folders(){
		$token = getOffice365Token();
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, "https://graph.microsoft.com/v1.0/me/MailFolders?top=9999");
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/x-www-form-urlencoded',
			"Authorization: Bearer " . $token
		));

		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		$content = curl_exec($curl);
		$folders = json_decode($content);
		curl_close($curl);
		$jsonFolders = array();
		
		foreach ($folders->value as $key=>$values){
			$folder_id = $values->id;
			$displayName = $values->displayName;
			$totalItemCount = $values->totalItemCount;
			$parent_folder_id = $values->parentFolderId;
			array_push($jsonFolders, array("id" => $folder_id, "parent_id" => $parent_folder_id, "name" => $displayName, "count" => $totalItemCount));
		}
		echo json_encode($jsonFolders);
	}
	
	public static function getTelephonyOffice365Emails(){
		$data = $_POST;
		$perPage = $data["per_page"];
		$currentPage = $data["current_page"] - 1;
		$token = getOffice365Token();
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, 'https://graph.microsoft.com/v1.0/me/mailFolders/Inbox/messages?$count=true&$skip=' . ($perPage * $currentPage) . '&$top=' . $perPage);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/x-www-form-urlencoded',
			"Authorization: Bearer " . $token
		));

		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		$content = curl_exec($curl);
		$count = json_decode($content, true)["@odata.count"];
		$emails = json_decode($content);
		curl_close($curl);
		
		$jsonEmails = array();
		
		foreach ($emails->value as $key=>$values){
			$mail_id = $values->id;
			$message_id = $values->internetMessageId;
			$seen = $values->isRead;
			$status = $seen;
			$dbMail = TelephonyDB::checkEmailExists($message_id); //checks if we already have an email with this message id in database
            $exists = is_array($dbMail);
			$notes = "";
            $employee_namesurname = null;
			$ticket_id = null;
			if ($exists) {
                $status = $dbMail["status"];
                $notes = $dbMail["notes"];
                $email_id = $dbMail["email_id"];
				$ticket_id = $dbMail["ticket_id"];
                $employee_namesurname = $dbMail["employee_namesurname"];
            }else{
				$email_id = TelephonyDB::addEmail($message_id, $mail_id, $status);
			}
			$snippet = "";
			if (isset($values->bodyPreview) && $values->bodyPreview != null){
				$snippet = $values->bodyPreview;
			}
			
			$flagged = $values->importance;
			if ($flagged != "high"){
				$flagged = 0;
			}else{
				$flagged = 1;
			}
			$senderEmail = $values->sender->emailAddress->address;
			$senderName = $values->sender->emailAddress->name;
			$toEmail = array();
			$toRecipients = $values->toRecipients;
			foreach ($toRecipients as $toRecip){
				array_push($toEmail, $toRecip->emailAddress->address);
			}
			$receivedDateTime = $values->receivedDateTime;
			$subject = $values->subject;
			$body = $values->body->content;
			array_push($jsonEmails, array("email_id" => $email_id, "mail_id" => $mail_id, "ticket_id" => $ticket_id, "employee_namesurname" => $employee_namesurname, "subject" => $subject, "snippet" => $snippet, "flagged" => $flagged, "seen" => $status, "from" => $senderEmail, "fromname" => $senderName, "to" => implode(",", $toEmail), "date" => $receivedDateTime, "message" => $body));
		}
		$resp = array();
		$resp["count"] = $count;
		$resp["emails"] = $jsonEmails;
		echo json_encode($resp);
	}
	
	public static function getExchangeInboxCount() {
        $settings = UserDB::getExchangeSettings($_SESSION["id"]);

        $timezone = 'Eastern Standard Time';
        
        // Set connection information.
        $host = $settings["exchange_host"];
        $username = $settings["exchange_username"];
        $password = $settings["exchange_password"];
        $version = Client::VERSION_2010_SP2;
		
        $client = new Client($host, $username, $password, $version);
        // Build the request.
        $request = new GetFolderType();
        $request->FolderShape = new FolderResponseShapeType();
        $request->FolderShape->BaseShape = DefaultShapeNamesType::ALL_PROPERTIES;
        $request->ParentFolderIds = new NonEmptyArrayOfBaseFolderIdsType();
        // Search recursively.
        // Search within the root folder. Combined with the traversal set above, this
        // should search through all folders in the user's mailbox.
        $parent = new DistinguishedFolderIdType();
        $parent->Id = DistinguishedFolderIdNameType::INBOX;
        $request->FolderIds->DistinguishedFolderId[] = $parent;
        $response = $client->GetFolder($request);
        // Iterate over the results, printing any error messages or folder names and
        // ids.
        $response_messages = $response->ResponseMessages->GetFolderResponseMessage;

        foreach ($response_messages as $response_message) {
            // Make sure the request succeeded.
            if ($response_message->ResponseClass != ResponseClassType::SUCCESS) {
                $code = $response_message->ResponseCode;
                $message = $response_message->MessageText;
                $resp = array();
                $resp["error"] = true;
                $resp["message"] = "Failed to find folders with \"$code: $message\"\n";
                echo json_encode($response);
                break;
            }
            // The folders could be of any type, so combine all of them into a single
            // array to iterate over them.
            $folder = $response_message->Folders->Folder;
			$resp = array();
			$resp["error"] = false;
			$resp["count"] = $folder[0]->TotalCount;
			echo json_encode($resp);
			break;
        }
    }
	
	public static function getTelephonyExchangeEmails(){
        $data = $_POST;
        
		$settings = UserDB::getExchangeSettings($_SESSION["id"]);

        $timezone = 'Eastern Standard Time';
        
        // Set connection information.
        $host = $settings["exchange_host"];
        $username = $settings["exchange_username"];
        $password = $settings["exchange_password"];
        $version = Client::VERSION_2010_SP2;
        
        $client = new Client($host, $username, $password, $version);
        $client->setTimezone($timezone);
        
        $page_size = $data["per_page"];
        
        // Build the request.
        $request = new FindItemType();
        $request->ParentFolderIds = new NonEmptyArrayOfBaseFolderIdsType();
        $request->Traversal = ItemQueryTraversalType::SHALLOW;
        
        // Return all message properties.
        $request->ItemShape = new ItemResponseShapeType();
        $request->ItemShape->BaseShape = DefaultShapeNamesType::ALL_PROPERTIES;
        
        
        //By default, list emails in INBOX
        $folder_id = new DistinguishedFolderIdType();
        $folder_id->Id = DistinguishedFolderIdNameType::INBOX;
        $request->ParentFolderIds->DistinguishedFolderId[] = $folder_id;
        
        // Limits the number of items retrieved
        $request->IndexedPageItemView = new IndexedPageViewType();
        $request->IndexedPageItemView->BasePoint = IndexBasePointType::BEGINNING;
        $request->IndexedPageItemView->Offset = ($data["current_page"] - 1) * $page_size;
        $request->IndexedPageItemView->MaxEntriesReturned = $page_size;
        
        $response = $client->FindItem($request);
        
        $response_messages = $response->ResponseMessages->FindItemResponseMessage;
        $jsonEmails = array();
        
        foreach($response_messages as $curEmail) {
        	$emails = $curEmail->RootFolder->Items->Message;
        	if (isset($emails)) {
        		foreach($emails as $email) {
					$change_key = $email->ItemId->ChangeKey;
        			$message_id = $email->ItemId->Id;
					$seen = $email->IsRead;
					$status = $seen;
					$dbMail = TelephonyDB::checkEmailExists($message_id); //checks if we already have an email with this message id in database
					$exists = is_array($dbMail);
					$notes = "";
					$employee_namesurname = null;
					$ticket_id = null;
					if ($exists) {
						$status = $dbMail["status"];
						$notes = $dbMail["notes"];
						$email_id = $dbMail["email_id"];
						$ticket_id = $dbMail["ticket_id"];
						$employee_namesurname = $dbMail["employee_namesurname"];
					}else{
						$email_id = TelephonyDB::addEmail($message_id, $change_key, $status);
					}
        			$subject = $email->Subject;
        			$received = $email->DateTimeReceived;
        			$fromEmail = $email->Sender->Mailbox->EmailAddress;
					$fromName = $email->Sender->Mailbox->Name;
					if ($fromEmail == null){
						$fromEmail = "Unknown";
					}
					if ($fromName == null){
						$fromName = $fromEmail;
					}
					$flagged = $email->Importance;
					if ($email->Importance == "High"){
						$flagged = 1;
					}
					
        			$jEmail = array("email_id" => $email_id, "mail_id" => $message_id, "change_key" => $change_key, "ticket_id" => $ticket_id, "employee_namesurname" => $employee_namesurname, "flagged" => $flagged, "seen" => $status, "subject" => $subject, "from" => $fromEmail, "fromname" => $fromName, "to" => $email->DisplayTo, "date" => $received);
		
        			array_push($jsonEmails, $jEmail);
        		}
        	}
        }
        
		$resp = array();
		$resp["emails"] = $jsonEmails;
        echo json_encode($resp);
    }
	
	public static function searchTelephonyExchangeEmails(){
		$data = $_POST;

        $settings = UserDB::getExchangeSettings($_SESSION["id"]);

        $timezone = 'Eastern Standard Time';
        
        // Set connection information.
        $host = $settings["exchange_host"];
        $username = $settings["exchange_username"];
        $password = $settings["exchange_password"];
        $version = Client::VERSION_2010_SP2;
        
        $client = new Client($host, $username, $password, $version);
        $client->setTimezone($timezone);
		
		// Build the restriction that will search for emails containing our search query.
		$request->Restriction = new RestrictionType();
		$contains = new ContainsExpressionType();
		$contains->FieldURI = new PathToUnindexedFieldType();
		$contains->FieldURI->FieldURI = UnindexedFieldURIType::ITEM_SUBJECT;
		$contains->Constant = new ConstantValueType();
		$contains->Constant->Value = $data["query"];
		$contains->ContainmentComparison = ContainmentComparisonType::IGNORE_CASE_AND_NON_SPACING_CHARS;
		$contains->ContainmentMode = ContainmentModeType::SUBSTRING;
		$request->Restriction->Contains = $contains;
		$request->Traversal = ItemQueryTraversalType::SHALLOW;
		// Return all message properties.
		$request->ItemShape = new ItemResponseShapeType();
		$request->ItemShape->BaseShape = DefaultShapeNamesType::ALL_PROPERTIES;
		// Search in the user's inbox.
        $folder_id = new DistinguishedFolderIdType();
        $folder_id->Id = DistinguishedFolderIdNameType::INBOX;
        $request->ParentFolderIds->DistinguishedFolderId[] = $folder_id;
		$response = $client->FindItem($request);
		// Iterate over the results, printing any error messages or message subjects.
		$response_messages = $response->ResponseMessages->FindItemResponseMessage;
		$jsonEmails = array();
        
        foreach($response_messages as $curEmail) {
        	$emails = $curEmail->RootFolder->Items->Message;
        	if (isset($emails)) {
        		foreach($emails as $email) {
					$change_key = $email->ItemId->ChangeKey;
        			$message_id = $email->ItemId->Id;
        			$subject = $email->Subject;
        			$received = $email->DateTimeReceived;
        			$fromEmail = $email->Sender->Mailbox->EmailAddress;
					$fromName = $email->Sender->Mailbox->Name;
					if ($fromEmail == null){
						$fromEmail = "Unknown";
					}
					if ($fromName == null){
						$fromName = $fromEmail;
					}
					$flagged = $email->Importance;
					if ($email->Importance == "High"){
						$flagged = 1;
					}
					
        			$jEmail = array("mail_id" => $message_id, "change_key" => $change_key, "flagged" => $flagged, "seen" => $email->IsRead, "subject" => $subject, "from" => $fromEmail, "fromname" => $fromName, "to" => $email->DisplayTo, "date" => $received);
		
        			array_push($jsonEmails, $jEmail);
        		}
        	}
        }
        
		$resp = array();
		$resp["emails"] = $jsonEmails;
        echo json_encode($resp);
	}
	
	public static function getTelephonyExchangeEmailByID(){
        $data = $_POST;
        $email_id = $data["mail_id"];
        $file_destination = 'Uploads/EmailAttachments';
		
		$settings = UserDB::getExchangeSettings($_SESSION["id"]);

        $timezone = 'Eastern Standard Time';
        
        // Set connection information.
        $host = $settings["exchange_host"];
        $username = $settings["exchange_username"];
        $password = $settings["exchange_password"];
        $version = Client::VERSION_2010_SP2;
        
        $client = new Client($host, $username, $password, $version);
        $client->setTimezone($timezone);

        // Build the request.
        
        $request = new GetItemType();
        $request->ItemShape = new ItemResponseShapeType();
        $request->ItemShape->BaseShape = DefaultShapeNamesType::ALL_PROPERTIES;
        $request->ItemShape->AdditionalProperties = new NonEmptyArrayOfPathsToElementType();
        $request->ItemIds = new NonEmptyArrayOfBaseItemIdsType();
        
        // Add an extended property to the request. We'll use the replied on property
        // for this example.
        
        $property = new PathToExtendedFieldType();
        $property->PropertyTag = '0x1081';
        $property->PropertyType = MapiPropertyTypeType::INTEGER;
        $request->ItemShape->AdditionalProperties->ExtendedFieldURI[] = $property;
        
        // Iterate over the message ids, setting each one on the request.
        
        $item = new ItemIdType();
    	$item->Id = $email_id;
    	$request->ItemIds->ItemId[] = $item;
        
        $response = $client->GetItem($request);
        $response_messages = $response->ResponseMessages->GetItemResponseMessage;
        
        $jsonEmail = array();
        
        foreach($response_messages as $response_message) {
        
        	// Make sure the request succeeded.
        
        	if ($response_message->ResponseClass != ResponseClassType::SUCCESS) {
        		$code = $response_message->ResponseCode;
        		$message = $response_message->MessageText;
        		continue;
        	}
        
        	// Iterate over the messages, printing the subject for each.
        	$attachmentsArray = array();
        
        	foreach($response_message->Items->Message as $item) {
				$body = $item->Body;
				if (!empty($item->Attachments)){
				    if (!empty($item->Attachments->ItemAttachment)) {
        				foreach($item->Attachments->ItemAttachment as $attachment) {
        					$attachments[] = $attachment->AttachmentId->Id;
        				}
        			}
        			else {
        				foreach($item->Attachments->FileAttachment as $attachment) {
        					$attachments[] = $attachment->AttachmentId->Id;
        				}
        			}
        
        			// Build the request to get the attachments.
        
        			$request = new GetAttachmentType();
        			$request->AttachmentIds = new NonEmptyArrayOfRequestAttachmentIdsType();
        
        			// Iterate over the attachments for the message.
        
        			foreach($attachments as $attachment_id) {
        				$id = new RequestAttachmentIdType();
        				$id->Id = $attachment_id;
        				$request->AttachmentIds->AttachmentId[] = $id;
        			}
        
        			$response = $client->GetAttachment($request);
        
        			// Iterate over the response messages, printing any error messages or
        			// saving the attachments.
        
        			$attachment_response_messages = $response->ResponseMessages->GetAttachmentResponseMessage;
        			foreach($attachment_response_messages as $attachment_response_message) {

                    	// Make sure the request succeeded.
                    
                    	if ($attachment_response_message->ResponseClass != ResponseClassType::SUCCESS) {
                    		$code = $response_message->ResponseCode;
                    		$message = $response_message->MessageText;
                    	}
                    
                    	if (empty($attachment_response_message->Attachments)) {
                    		continue;
                    	}
                    	else {
                    		// Iterate over the file attachments, saving each one.
                    
                    		if (!empty($attachment_response_message->Attachments->ItemAttachment)) {
                    			$attachments = $attachment_response_message->Attachments->ItemAttachment;
                    		}
                    		else {
                    			$attachments = $attachment_response_message->Attachments->FileAttachment;
                    		}
                    
                    		foreach($attachments as $attachment) {
                    			$path = $file_destination . "/" . $attachment->Name;
                    			file_put_contents($path, $attachment->Content);
                    			array_push($attachmentsArray, array("name" => $attachment->Name, "cid" => $attachment->ContentId, "inline" => $attachment->IsInline));
                    		}
                    	}
                    }
				}
				$jsonEmail = array("message" => $body->_,"attachments" => $attachmentsArray);
        	}
        
        }
		$email = TelephonyDB::getEmailByID($data["email_id"]);
        $email_tickets = TelephonyDB::getEmailTickets($data["email_id"]);

        $email["tickets"] = $email_tickets;
		
		$response = array();
		$response["emaildetails"] = $jsonEmail;
		$response["email"] = $email;
		echo json_encode($response);
    }
	
	public static function getTelephonyOffice365EmailAttachments(){
		$data = $_POST;
		$token = getOffice365Token();
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, 'https://graph.microsoft.com/v1.0/me/mailFolders/Inbox/messages/' . $data["mail_id"] . "/attachments");
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/x-www-form-urlencoded',
			"Authorization: Bearer " . $token
		));

		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		$content = curl_exec($curl);
		$emails = json_decode($content);
		curl_close($curl);
		
		$attachmentArray = array();
		
		foreach ($emails->value as $key=>$values){
			$attachment_id = $values->id;
			$name = $values->name;
			$isInline = $values->isInline;
			$contentId = $values->contentId;
			$contentType = $values->contentType;
			$contentBytes = $values->contentBytes;
			array_push($attachmentArray, array("attachment_id" => $attachment_id, "name" => $name, "is_inline" => $isInline, "content_id" => $contentId, "content_type" => $contentType, "content_bytes" => $contentBytes));
		}
		
		$email = TelephonyDB::getEmailByID($data["email_id"]);
        $email_tickets = TelephonyDB::getEmailTickets($data["email_id"]);

        $email["tickets"] = $email_tickets;
		
		$response = array();
		$response["attachments"] = $attachmentArray;
		$response["email"] = $email;
		echo json_encode($response);
	}
	
	public static function searchTelephonyOffice365Emails(){
		$data = $_POST;
		$token = getOffice365Token();
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, 'https://graph.microsoft.com/v1.0/me/mailFolders/Inbox/messages?$search=' . urlencode($data["query"]));
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/x-www-form-urlencoded',
			"Authorization: Bearer " . $token
		));

		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		$content = curl_exec($curl);
		$emails = json_decode($content);
		curl_close($curl);
		
		$jsonEmails = array();
		
		foreach ($emails->value as $key=>$values){
			$message_id = $values->id;
			$snippet = $values->bodyPreview;
			$seen = $values->isRead;
			$flagged = $values->importance;
			if ($flagged != "High"){
				$flagged = 0;
			}else{
				$flagged = 1;
			}
			$senderEmail = $values->sender->emailAddress->address;
			$senderName = $values->sender->emailAddress->name;
			$toEmail = $values->toRecipients->emailAddress->address;
			$receivedDateTime = $values->receivedDateTime;
			$subject = $values->subject;
			$body = $values->body->content;
			array_push($jsonEmails, array("mail_id" => $message_id, "subject" => $subject, "snippet" => $snippet, "flagged" => $flagged, "seen" => $seen, "from" => $senderEmail, "fromname" => $senderName, "to" => $toEmail, "date" => $receivedDateTime, "message" => $body));
		}
		
		echo json_encode($jsonEmails);
	}
	
	
	public static function getOffice365Emails(){
		$data = $_POST;
		$perPage = $data["per_page"];
		$currentPage = $data["current_page"] - 1;
		$token = getOffice365Token();
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, 'https://graph.microsoft.com/v1.0/me/mailFolders/' . $data["folder_id"] . '/messages?$skip=' . ($perPage * $currentPage) . '&$top=' . $perPage);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/x-www-form-urlencoded',
			"Authorization: Bearer " . $token
		));

		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		$content = curl_exec($curl);
		$emails = json_decode($content);
		curl_close($curl);
		
		$jsonEmails = array();
		
		foreach ($emails->value as $key=>$values){
			$message_id = $values->id;
			$snippet = "";
			if (isset($values->bodyPreview) && $values->bodyPreview != null){
				$snippet = $values->bodyPreview;
			}
			$seen = $values->isRead;
			$flagged = $values->importance;
			if ($flagged != "high"){
				$flagged = 0;
			}else{
				$flagged = 1;
			}
			$senderEmail = $values->sender->emailAddress->address;
			$senderName = $values->sender->emailAddress->name;
			$toEmail = array();
			$toRecipients = $values->toRecipients;
			foreach ($toRecipients as $toRecip){
				array_push($toEmail, $toRecip->emailAddress->address);
			}
			$receivedDateTime = $values->receivedDateTime;
			$subject = $values->subject;
			$body = $values->body->content;
			array_push($jsonEmails, array("mail_id" => $message_id, "subject" => $subject, "snippet" => $snippet, "flagged" => $flagged, "seen" => $seen, "from" => $senderEmail, "fromname" => $senderName, "to" => implode(",", $toEmail), "date" => $receivedDateTime, "message" => $body));
		}
		echo json_encode($jsonEmails);
	}
	
	public static function getOffice365EmailAttachments(){
		$data = $_POST;
		$token = getOffice365Token();
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, 'https://graph.microsoft.com/v1.0/me/mailFolders/' . $data["folder_id"] . '/messages/' . $data["mail_id"] . "/attachments");
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/x-www-form-urlencoded',
			"Authorization: Bearer " . $token
		));

		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		$content = curl_exec($curl);
		$emails = json_decode($content);
		curl_close($curl);
		
		$attachmentArray = array();
		
		foreach ($emails->value as $key=>$values){
			$attachment_id = $values->id;
			$name = $values->name;
			$isInline = $values->isInline;
			$contentId = $values->contentId;
			$contentType = $values->contentType;
			$contentBytes = $values->contentBytes;
			array_push($attachmentArray, array("attachment_id" => $attachment_id, "name" => $name, "is_inline" => $isInline, "content_id" => $contentId, "content_type" => $contentType, "content_bytes" => $contentBytes));
		}
		
		echo json_encode($attachmentArray);
	}
	
	public static function searchOffice365Emails(){
		$data = $_POST;
		$token = getOffice365Token();
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, 'https://graph.microsoft.com/v1.0/me/mailFolders/' . $data["folder_id"] . '/messages?$search=' . urlencode($data["query"]));
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/x-www-form-urlencoded',
			"Authorization: Bearer " . $token
		));

		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		$content = curl_exec($curl);
		$emails = json_decode($content);
		curl_close($curl);
		
		$jsonEmails = array();
		
		foreach ($emails->value as $key=>$values){
			$message_id = $values->id;
			$snippet = $values->bodyPreview;
			$seen = $values->isRead;
			$flagged = $values->importance;
			if ($flagged != "High"){
				$flagged = 0;
			}else{
				$flagged = 1;
			}
			$senderEmail = $values->sender->emailAddress->address;
			$senderName = $values->sender->emailAddress->name;
			$toEmail = $values->toRecipients->emailAddress->address;
			$receivedDateTime = $values->receivedDateTime;
			$subject = $values->subject;
			$body = $values->body->content;
			array_push($jsonEmails, array("mail_id" => $message_id, "subject" => $subject, "snippet" => $snippet, "flagged" => $flagged, "seen" => $seen, "from" => $senderEmail, "fromname" => $senderName, "to" => $toEmail, "date" => $receivedDateTime, "message" => $body));
		}
		
		echo json_encode($jsonEmails);
	}
	
	public static function createOffice365Folder(){
		$data = $_POST;
		$token = getOffice365Token();
		
		$postData = array("displayName" => $data["folder_name"]);

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, "https://graph.microsoft.com/v1.0/me/MailFolders");
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			"Authorization: Bearer " . $token
		));
		curl_setopt($curl, CURLOPT_POST, TRUE);
		curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($postData));
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		
		$content = curl_exec($curl);
		curl_close($curl);
		
		$httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		
		$response = array();
		
		if ($httpcode == "201") {
			$response["error"] = false;
		}else{
			$response["error"] = true;
			$response["message"] = $httpcode;
		}
		
		echo json_encode($response);
	}
	
	public static function markOffice365EmailAsRead(){
		$data = $_POST;
		$response = array();
		$token = getOffice365Token();
		
		$patchData = array("isRead" => true); 
		$url = 'https://graph.microsoft.com/v1.0/me/messages/' . $data["mail_id"];
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'Authorization: Bearer ' . $token
		));
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PATCH");
		curl_setopt($ch, CURLOPT_POST, TRUE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($patchData));
		$patchResponse = curl_exec($ch);
		$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
				
		if ($httpcode == "200") {
			$response["error"] = false;
		}else{
			$response["error"] = true;
			$response["message"] = $patchResponse;
		}
		
		echo json_encode($response);
	}
	
	public static function markOffice365EmailAsImportant(){
		$data = $_POST;
		$response = array();
		$token = getOffice365Token();
		
		
		$patchData = array("importance" => $data["importance"]); 
		$url = 'https://graph.microsoft.com/v1.0/me/messages/' . $data["mail_id"];
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'Authorization: Bearer ' . $token
		));
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PATCH");
		curl_setopt($ch, CURLOPT_POST, TRUE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($patchData));
		$patchResponse = curl_exec($ch);
		$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
				
		if ($httpcode == "200") {
			$response["error"] = false;
		}else{
			$response["error"] = true;
			$response["message"] = $patchResponse;
		}
		
		echo json_encode($response);
	}
	
	public static function sendOffice365Email(){
		$data = $_POST;
		$recipients = explode(",", $data["recipients"]);
		$cc = explode(",", $data["cc"]);
		$bcc = explode(",", $data["bcc"]);
		$subject = $data["email_subject"];
		$message = $data["email_message"];
		
		$recipientArray = array();
		$ccArray = array();
		$bccArray = array();
			
		foreach ($recipients as $recipient){
			array_push($recipientArray, array("emailAddress" => array("address" => $recipient, "name" => $recipient)));
		}
		foreach ($cc as $recipient){
			array_push($ccArray, array("emailAddress" => array("address" => $recipient, "name" => $recipient)));
		}
		foreach ($bcc as $recipient){
			array_push($bccArray, array("emailAddress" => array("address" => $recipient, "name" => $recipient)));
		}
		
		if ($data["is_reply"] == 1){
			$token = getOffice365Token();
			$url = 'https://graph.microsoft.com/v1.0/me/messages/' . $data["mail_id"] . "/createReply";
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
				'Content-Type: application/json',
				'Content-Length: 0',
				'Authorization: Bearer ' . $token
			));
			curl_setopt($ch, CURLOPT_POST, TRUE);
			$output = curl_exec($ch);
			$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			
			$response = array();
			
			if ($httpcode == "201") {
				$email = json_decode($output, true);
				$message_id = $email["id"];
				$patchData = array("body" => array("contentType" => "HTML", "content" => $message)); 
				$url = 'https://graph.microsoft.com/v1.0/me/messages/' . $message_id;
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
				curl_setopt($ch, CURLOPT_HTTPHEADER, array(
					'Content-Type: application/json',
					'Authorization: Bearer ' . $token
				));
				curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PATCH");
				curl_setopt($ch, CURLOPT_POST, TRUE);
				curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($patchData));
				$patchResponse = curl_exec($ch);
				$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
				
				if ($httpcode == "200") {
					$response["error"] = false;
					$url = 'https://graph.microsoft.com/v1.0/me/messages/' . $message_id . '/send';
					$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL, $url);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
					curl_setopt($ch, CURLOPT_HTTPHEADER, array(
						'Content-Type: application/json',
						'Content-Length: 0',
						'Authorization: Bearer ' . $token
					));
					curl_setopt($ch, CURLOPT_POST, TRUE);
					$replyResponse = curl_exec($ch);
					$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
					
					$response = array();
					
					if ($httpcode == "202") {
						$response["error"] = false;
					} else {
						$response["error"] = true;
						$response["message"] = "Couldn't send reply message " . $replyResponse;
					}
				} else {
					$response["error"] = true;
					$response["message"] = "Couldn't update reply message " . $httpcode;
				}
			}else {
				$response["error"] = true;
				$response["message"] = "Could not create message " . $httpcode;
			}
			
			echo json_encode($response);
		} else if ($data["is_forward"] == 1){
			$token = getOffice365Token();
			$url = 'https://graph.microsoft.com/v1.0/me/messages/' . $data["mail_id"] . "/createForward";
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
				'Content-Type: application/json',
				'Content-Length: 0',
				'Authorization: Bearer ' . $token
			));
			curl_setopt($ch, CURLOPT_POST, TRUE);
			$output = curl_exec($ch);
			$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			
			$response = array();
			
			if ($httpcode == "201") {
				$email = json_decode($output, true);
				$message_id = $email["id"];
				$patchData = array("body" => array("contentType" => "HTML", "content" => $message)); 
				$url = 'https://graph.microsoft.com/v1.0/me/messages/' . $message_id;
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
				curl_setopt($ch, CURLOPT_HTTPHEADER, array(
					'Content-Type: application/json',
					'Authorization: Bearer ' . $token
				));
				curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PATCH");
				curl_setopt($ch, CURLOPT_POST, TRUE);
				curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($patchData));
				$patchResponse = curl_exec($ch);
				$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
				
				if ($httpcode == "200") {
					$postData = array("comment" => "", "toRecipients" => $recipientArray, "ccRecipients" => $ccArray, "bccRecipients" => $bccArray);
					$url = 'https://graph.microsoft.com/v1.0/me/messages/' . $data["mail_id"] . '/forward';
					$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL, $url);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
					curl_setopt($ch, CURLOPT_HTTPHEADER, array(
						'Content-Type: application/json',
						'Content-Length: 0',
						'Authorization: Bearer ' . $token
					));
					curl_setopt($ch, CURLOPT_POST, TRUE);
					curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
					curl_exec($ch);
					$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
					
					$response = array();
					
					if ($httpcode == "202") {
						$response["error"] = false;
					} else {
						$response["error"] = true;
						$response["message"] = "Couldn't send forward message " . $httpcode;
					}
				}else{
					$response["error"] = true;
					$response["message"] = "Couldn't update forward message " . $httpcode;
				}
			}else {
				$response["error"] = true;
				$response["message"] = "Could not create message " . $httpcode;
			}
			
			echo json_encode($response);
		} else{
			$token = getOffice365Token();
			$url = 'https://graph.microsoft.com/v1.0/me/messages';
			$attachments = array();
			if ($_FILES['uploaded_file']['name'] !== "") {
				$name_of_uploaded_file = basename($_FILES['uploaded_file']['name']);
				$type_of_uploaded_file = pathinfo($name_of_uploaded_file, PATHINFO_EXTENSION);
				$upload_folder = "Uploads/EmailAttachments/";
				$size_of_uploaded_file = $_FILES["uploaded_file"]["size"] / 1024;
					
				// copy the temp. uploaded file to uploads folder
					
				$path_of_uploaded_file = $upload_folder . $name_of_uploaded_file . date("Y-m-dH:i:s");
				$tmp_path = $_FILES["uploaded_file"]["tmp_name"];
				if (is_uploaded_file($tmp_path)) {
					if (!copy($tmp_path, $path_of_uploaded_file)) {
						$errors.= '\n error while copying the uploaded file';
					}
				}
					
				$type = pathinfo($path_of_uploaded_file, PATHINFO_EXTENSION);
				$fData = file_get_contents($path_of_uploaded_file);
				$content_byte = base64_encode($fData);
				array_push($attachments, array("@odata.type" => "#microsoft.graph.fileAttachment", "name" => $name_of_uploaded_file, "contentBytes" => $content_byte, "contentType" => $type_of_uploaded_file));
			}
			$postData = array("subject" => $subject,  "importance" => "Normal", "body" => array("contentType" => "HTML", "content" => $message), "toRecipients" => $recipientArray, "ccRecipients" => $ccArray, "bccRecipients" => $bccArray, "attachments" => $attachments);
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
				'Content-Type: application/json',
				'Authorization: Bearer ' . $token
			));
			curl_setopt($ch, CURLOPT_POST, TRUE);
			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
			$output = curl_exec($ch);
			$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			
			$response = array();
			
			if ($httpcode == "201") {
				$response["error"] = false;
				$email = json_decode($output, true);
				$message_id = $email["id"];
				$url = 'https://graph.microsoft.com/v1.0/me/messages/' . $message_id . '/send';
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
				curl_setopt($ch, CURLOPT_HTTPHEADER, array(
					'Content-Length: 0',
					'Authorization: Bearer ' . $token
				));
				curl_setopt($ch, CURLOPT_POST, TRUE);
				curl_exec($ch);
				$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
				
				$response = array();
				
				if ($httpcode == "202") {
					$response["error"] = false;
				} else {
					$response["error"] = true;
					$response["message"] = "Could not send message " . $httpcode;
				}
			} else {
				$response["error"] = true;
				$response["message"] = "Could not create message " . $httpcode;
			}
			echo json_encode($response);
		}
	}
	
	public static function deleteOffice365Email(){
		$data = $_POST;
		$token = getOffice365Token();
		
		$mailIds = explode(",", $data["mail_ids"]);
		
		foreach ($mailIds as $mail_id){
		
			$url = 'https://graph.microsoft.com/v1.0/me/mailFolders/' . $data["folder_id"] . "/messages/" . $mail_id;
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
				'Authorization: Bearer ' . $token
			));
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
			
			$output = curl_exec($ch);
			$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			
			$response = array();

			if ($httpcode == "204") {
				$response["error"] = false;
			} else {
				$response["error"] = true;
			}
		
		}
		
		echo json_encode($data);
	}
	
	public static function moveOffice365Email(){
		$data = $_POST;
		$token = getOffice365Token();
		
		$mailIds = explode(",", $data["mail_ids"]);
		
		$postData = array("DestinationId" => $data["folder_id"]);
		
		foreach ($mailIds as $mail_id){
		
			$url = 'https://graph.microsoft.com/v1.0/me/messages/' . $mail_id . "/move";
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
				'Content-Type: application/json',
				'Authorization: Bearer ' . $token
			));
			curl_setopt($ch, CURLOPT_POST, TRUE);
			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
			
			$output = curl_exec($ch);
			$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		
		}
		
		echo json_encode($output);
	}
	

    public static function getMailboxFolders() {
        $data = $_POST;
        $settings = UserDB::getIMAPSettings($_SESSION["id"]);
        $ssl = "";
        if ($settings["imap_ssl"] == 1 && $settings["imap_certificate"] == 1) {
            $ssl = "ssl/validate-cert";
        }
        else if ($settings["imap_ssl"] == 1) {
            $ssl = "ssl/novalidate-cert";
        }
        /* connect to server */
        $hostname = "{" . $settings["imap_hostaddress"] . ":" . $settings["imap_port"] . "/imap/" . $ssl . "}";
        $username = $settings["imap_username"];
        $password = $settings["imap_password"];

        $mailbox = new Mailbox($hostname, $settings["imap_username"], $settings["imap_password"], "Uploads/EmailAttachments");
        echo json_encode($mailbox->getMailboxes());
        $mailbox->disconnect();
    }

    public static function createMailbox() {
        $data = $_POST;
        $settings = UserDB::getIMAPSettings($_SESSION["id"]);
        $ssl = "";
        if ($settings["imap_ssl"] == 1 && $settings["imap_certificate"] == 1) {
            $ssl = "ssl/validate-cert";
        }
        else if ($settings["imap_ssl"] == 1) {
            $ssl = "ssl/novalidate-cert";
        }
        /* connect to server */
        $hostname = "{" . $settings["imap_hostaddress"] . ":" . $settings["imap_port"] . "/imap/" . $ssl . "}INBOX";
        $username = $settings["imap_username"];
        $password = $settings["imap_password"];

        $mailbox = new Mailbox($hostname, $settings["imap_username"], $settings["imap_password"], "Uploads/EmailAttachments");
        $mailbox->createMailbox($data["mailbox_name"]);
        $mailbox->disconnect();
		
		GeneralDB::addMailmanagerAction($_SESSION["id"], 1, "Created a new mailbox " . getFolderName($data["mailbox_name"]), $username);
    }

    public static function moveEmail() {
        $data = $_POST;

        $settings = UserDB::getIMAPSettings($_SESSION["id"]);
        $ssl = "";
        if ($settings["imap_ssl"] == 1 && $settings["imap_certificate"] == 1) {
            $ssl = "ssl/validate-cert";
        }
        else if ($settings["imap_ssl"] == 1) {
            $ssl = "ssl/novalidate-cert";
        }
        /* connect to server */
        $hostname = "{" . $settings["imap_hostaddress"] . ":" . $settings["imap_port"] . "/imap/" . $ssl . "}" . $data["curfolder"];
        $username = $settings["imap_username"];
        $password = $settings["imap_password"];

        $mailbox = new Mailbox($hostname, $settings["imap_username"], $settings["imap_password"], "Uploads/EmailAttachments");
        $mailbox->moveMail($data["mail_ids"], $data["folder"]);
        $mailbox->expungeDeletedMails();
        $mailbox->disconnect();
		
		GeneralDB::addMailmanagerAction($_SESSION["id"], 1, "Moved an e-mail from " . getFolderName($data["curfolder"]) . " to " . getFolderName($data["folder"]), $username);
    }

    public static function searchIMAPEmails() {
        $data = $_POST;

        $searchQuery = $data["query"];

        $response = array();

        $settings = UserDB::getIMAPSettings($_SESSION["id"]);
        $ssl = "";
        if ($settings["imap_ssl"] == 1 && $settings["imap_certificate"] == 1) {
            $ssl = "ssl/validate-cert";
        }
        else if ($settings["imap_ssl"] == 1) {
            $ssl = "ssl/novalidate-cert";
        }
        /* connect to server */
        $hostname = "{" . $settings["imap_hostaddress"] . ":" . $settings["imap_port"] . "/imap/" . $ssl . "}" . $data["folder"];
        $username = $settings["imap_username"];
        $password = $settings["imap_password"];

        $mailbox = new Mailbox($hostname, $settings["imap_username"], $settings["imap_password"], "Uploads/EmailAttachments");

        $mailsIds = $mailbox->searchMailbox("TEXT " . $searchQuery);

        if (!$mailsIds) {
            $response["emails"] = array();
            echo json_encode($response);
        }
        else {
            $jsonEmails = array();
            foreach ($mailsIds as $mailId) {
                $mail = $mailbox->getMail($mailId);

                $htmlMessage = $mail->replaceInternalLinks("/Uploads/EmailAttachments");

                $attachments = $mail->getAttachments();
                $attachmentFilePaths = "";

                foreach ($attachments as $attachment) {
                    if ($attachment->show) {
                        if ($attachmentFilePaths != "") {
                            $attachmentFilePaths .= $attachment->name . ";";
                        }
                        else {
                            $attachmentFilePaths = $attachment->name;
                        }
                    }
                }

                $attachmentFilePaths = "";

                $currentEmail = array(
                    "mail_id" => $mailId,
                    "flagged" => $mail->flagged,
                    "subject" => $mail->subject,
                    "from" => $mail->fromAddress,
                    "fromname" => $mail->fromName,
                    "seen" => $mail->seen,
                    "date" => $mail->date,
                    "message" => $mail->textPlain,
                    "htmlmsg" => $htmlMessage,
                    "attachments" => $attachmentFilePaths
                );
                array_push($jsonEmails, $currentEmail);
            }

            $response["emails"] = $jsonEmails;
            echo json_encode($response);
        }
        $mailbox->disconnect();
    }

    public static function getMailByID() {
        $data = $_POST;

        $settings = UserDB::getIMAPSettings($_SESSION["id"]);
        $ssl = "";
        if ($settings["imap_ssl"] == 1 && $settings["imap_certificate"] == 1) {
            $ssl = "ssl/validate-cert";
        }
        else if ($settings["imap_ssl"] == 1) {
            $ssl = "ssl/novalidate-cert";
        }
        /* connect to server */
        $hostname = "{" . $settings["imap_hostaddress"] . ":" . $settings["imap_port"] . "/imap/" . $ssl . "}" . $data["folder"];
        $username = $settings["imap_username"];
        $password = $settings["imap_password"];

        $mailbox = new Mailbox($hostname, $settings["imap_username"], $settings["imap_password"], "Uploads/EmailAttachments");

        $mailbox->enableAttachments();

        $mail = $mailbox->getMail($data["mail_id"]);

        $htmlMessage = $mail->replaceInternalLinks("/Uploads/EmailAttachments");

        $attachments = $mail->getAttachments();
        $attachmentFilePaths = "";

        foreach ($attachments as $attachment) {
            if ($attachment->show) {
                if ($attachmentFilePaths != "") {
                    $attachmentFilePaths .= $attachment->name . ";";
                }
                else {
                    $attachmentFilePaths = $attachment->name;
                }
            }
        }

        $currentEmail = array(
            "mail_id" => $data["mail_id"],
            "flagged" => $mail->flagged,
            "subject" => $mail->subject,
            "from" => $mail->fromAddress,
            "fromname" => $mail->fromName,
			"to" => $mail->toString,
            "seen" => $mail->seen,
            "date" => $mail->date,
            "message" => $mail->textPlain,
            "htmlmsg" => $htmlMessage,
            "attachments" => $attachmentFilePaths
        );
        echo json_encode($currentEmail);
    }

    public static function retrieveIMAPEmails() {
        $data = $_POST;

        $current_page = $data["current_page"] - 1;
        $per_page = $data["per_page"] - 1;

        $response = array();

        $settings = UserDB::getIMAPSettings($_SESSION["id"]);
        $ssl = "";
        if ($settings["imap_ssl"] == 1 && $settings["imap_certificate"] == 1) {
            $ssl = "ssl/validate-cert";
        }
        else if ($settings["imap_ssl"] == 1) {
            $ssl = "ssl/novalidate-cert";
        }
        /* connect to server */
        $hostname = "{" . $settings["imap_hostaddress"] . ":" . $settings["imap_port"] . "/imap/" . $ssl . "}" . $data["folder"];
        $username = $settings["imap_username"];
        $password = $settings["imap_password"];

        $mailbox = new Mailbox($hostname, $settings["imap_username"], $settings["imap_password"], "Uploads/EmailAttachments");

        $mailbox->disableAttachments();

        $total_messages = $mailbox->countMails();

        $display_to = $total_messages - ($current_page * $per_page);
        $display_from = $display_to - $per_page;
        if ($display_from < 1) {
            $display_from = 1;
        }

        // Fetch an overview for all messages in INBOX
        $mailsIds = $mailbox->getMailsInfo($display_from, $display_to);

        usort($mailsIds, function ($a, $b) {
            return strtotime($b->date) - strtotime($a->date);
        });

        if (!$mailsIds) {
            $response["emails"] = array();
            $response["amount"] = $total_messages;
            echo json_encode($response);
        }
        else {
            $jsonEmails = array();
            foreach ($mailsIds as $retMail) {
                $mailId = $retMail->uid;
                $currentEmail = array(
                    "mail_id" => $mailId,
                    "flagged" => $retMail->flagged,
                    "subject" => $retMail->subject,
                    "from" => str_replace('"', '', $retMail->from),
                    "fromname" => str_replace('"', '', $retMail->from),
					"to" => str_replace('"', '', $retMail->to),
                    "seen" => $retMail->seen,
                    "date" => $retMail->date
                );
                array_push($jsonEmails, $currentEmail);
            }

            $response["emails"] = $jsonEmails;
            $response["amount"] = $total_messages;
            echo json_encode($response);
        }
        $mailbox->disconnect();
    }
	
	public static function getExchangeEmails(){
        $data = $_POST;
        
		$settings = UserDB::getExchangeSettings($_SESSION["id"]);

        $timezone = 'Eastern Standard Time';
        
        // Set connection information.
        $host = $settings["exchange_host"];
        $username = $settings["exchange_username"];
        $password = $settings["exchange_password"];
        $version = Client::VERSION_2010_SP2;
        
        $client = new Client($host, $username, $password, $version);
        $client->setTimezone($timezone);
        
        $page_size = $data["per_page"];
        
        // Build the request.
        $request = new FindItemType();
        $request->ParentFolderIds = new NonEmptyArrayOfBaseFolderIdsType();
        $request->Traversal = ItemQueryTraversalType::SHALLOW;
        
        // Return all message properties.
        $request->ItemShape = new ItemResponseShapeType();
        $request->ItemShape->BaseShape = DefaultShapeNamesType::ALL_PROPERTIES;
        
        
        if ($data["folder_id"] == ""){ //By default, list emails in INBOX
            $folder_id = new DistinguishedFolderIdType();
            $folder_id->Id = DistinguishedFolderIdNameType::INBOX;
            $request->ParentFolderIds->DistinguishedFolderId[] = $folder_id;
        }else{ //when user switches folder, list emails from that folder by its ID
            $folder_id = $data["folder_id"];            
            $request->ParentFolderIds->FolderId = new FolderIdType();
            $request->ParentFolderIds->FolderId->Id = $folder_id;
        }
        
        
        // Limits the number of items retrieved
        $request->IndexedPageItemView = new IndexedPageViewType();
        $request->IndexedPageItemView->BasePoint = IndexBasePointType::BEGINNING;
        $request->IndexedPageItemView->Offset = ($data["current_page"] - 1) * $page_size;
        $request->IndexedPageItemView->MaxEntriesReturned = $page_size;
        
        $response = $client->FindItem($request);
        
        $response_messages = $response->ResponseMessages->FindItemResponseMessage;
        $jsonEmails = array();
        
        foreach($response_messages as $curEmail) {
        	$emails = $curEmail->RootFolder->Items->Message;
        	if (isset($emails)) {
        		foreach($emails as $email) {
					$change_key = $email->ItemId->ChangeKey;
        			$message_id = $email->ItemId->Id;
        			$subject = $email->Subject;
        			$received = $email->DateTimeReceived;
        			$fromEmail = $email->Sender->Mailbox->EmailAddress;
					$fromName = $email->Sender->Mailbox->Name;
					if ($fromEmail == null){
						$fromEmail = "Unknown";
					}
					if ($fromName == null){
						$fromName = $fromEmail;
					}
					$flagged = $email->Importance;
					if ($email->Importance == "High"){
						$flagged = 1;
					}
					
        			$jEmail = array("mail_id" => $message_id, "change_key" => $change_key, "flagged" => $flagged, "seen" => $email->IsRead, "subject" => $subject, "from" => $fromEmail, "fromname" => $fromName, "to" => $email->DisplayTo, "date" => $received);
		
        			array_push($jsonEmails, $jEmail);
        		}
        	}
        }
        
		$resp = array();
		$resp["emails"] = $jsonEmails;
        echo json_encode($resp);
    }
	
	public static function sendExchangeEmail(){
        $data = $_POST;

        $settings = UserDB::getExchangeSettings($_SESSION["id"]);

        $timezone = 'Eastern Standard Time';
        
        // Set connection information.
        $host = $settings["exchange_host"];
        $username = $settings["exchange_username"];
        $password = $settings["exchange_password"];
        $version = Client::VERSION_2010_SP2;
        
        $client = new Client($host, $username, $password, $version);
        $client->setTimezone($timezone);
        
        $recipients = explode(",", $data["recipients"]);
		$cc = explode(",", $data["cc"]);
		$bcc = explode(",", $data["bcc"]);
        
        // Build the request,
        $request = new CreateItemType();
        $request->Items = new NonEmptyArrayOfAllItemsType();
        // Save the message, but do not send it.
        $request->MessageDisposition = MessageDispositionType::SEND_AND_SAVE_COPY;
		
		
		if (isset($data["is_reply"]) && $data["is_reply"] == 1){
            $reply = new ReplyAllToItemType();
            $reply->ReferenceItemId = new ItemIdType();
            $reply->ReferenceItemId->Id = $data["reply_mail_id"];
            $reply->ReferenceItemId->ChangeKey = $data["reply_mail_change_key"];
            $reply->NewBodyContent = new BodyType();
            $reply->NewBodyContent->BodyType = BodyTypeType::HTML;
            $reply->NewBodyContent->_ = $data["email_message"];
            $request->Items->ReplyAllToItem[] = $reply;
        } else{
			// Create the message.
			$message = new MessageType();
			$message->Subject = $data["email_subject"];
			$message->ToRecipients = new ArrayOfRecipientsType();
			// Set the sender.
			$message->From = new SingleRecipientType();
			$message->From->Mailbox = new EmailAddressType();
			$message->From->Mailbox->EmailAddress = $username;
			// Set the recipients
			foreach ($recipients as $sendTo){
				if ($sendTo != ""){
					$recipient = new EmailAddressType();
					$recipient->Name = $sendTo;
					$recipient->EmailAddress = $sendTo;
					$message->ToRecipients->Mailbox[] = $recipient;
				}
			}
			foreach ($cc as $sendTo){
				if ($sendTo != ""){
					$recipient = new EmailAddressType();
					$recipient->Name = $sendTo;
					$recipient->EmailAddress = $sendTo;
					$message->CcRecipients->Mailbox[] = $recipient;
				}
			}
			foreach ($bcc as $sendTo){
				if ($sendTo != ""){
					$recipient = new EmailAddressType();
					$recipient->Name = $sendTo;
					$recipient->EmailAddress = $sendTo;
					$message->BccRecipients->Mailbox[] = $recipient;
				}
			}
			// Set the message body.
			$message->Body = new BodyType();
			$message->Body->BodyType = BodyTypeType::HTML;
			$message->Body->_ = $data["email_message"];
			
			if ($_FILES['uploaded_file']['name'] !== "") {
				$name_of_uploaded_file = basename($_FILES['uploaded_file']['name']);
				$type_of_uploaded_file = pathinfo($name_of_uploaded_file, PATHINFO_EXTENSION);
				$upload_folder = "Uploads/EmailAttachments/";
				$size_of_uploaded_file = $_FILES["uploaded_file"]["size"] / 1024;
					
				// copy the temp. uploaded file to uploads folder
					
				$path_of_uploaded_file = $upload_folder . $name_of_uploaded_file . date("Y-m-dH:i:s");
				$tmp_path = $_FILES["uploaded_file"]["tmp_name"];
				if (is_uploaded_file($tmp_path)) {
					if (!copy($tmp_path, $path_of_uploaded_file)) {
						$errors.= '\n error while copying the uploaded file';
					}
				}
					
				$type = pathinfo($path_of_uploaded_file, PATHINFO_EXTENSION);
				$fData = file_get_contents($path_of_uploaded_file);
				$content_byte = base64_encode($fData);
				$attachment = new FileAttachmentType();
				$attachment->Content = $fData;
				$attachment->Name = $name_of_uploaded_file;
				$attachment->ContentType = $type_of_uploaded_file;
				$message->Attachments->FileAttachment[] = $attachment;
			}
							 
			// Add the message to the request.
			$request->Items->Message[] = $message;
		}
        $response = $client->CreateItem($request);
        // Iterate over the results, printing any error messages or message ids.
        $response_messages = $response->ResponseMessages->CreateItemResponseMessage;
		$resp = array();
		$resp["error"] = false;
        foreach ($response_messages as $response_message) {
            // Make sure the request succeeded.
            if ($response_message->ResponseClass != ResponseClassType::SUCCESS) {
                $resp = array();
                $resp["error"] = true;
                $resp["message"] = $response_message->MessageText;
                break;
            }
            // Iterate over the created messages, printing the id for each.
            foreach ($response_message->Items->Message as $item) {
                $resp = array();
                $resp["error"] = false;
            }
        }
		echo json_encode($resp);
    }
	
	public static function searchExchangeEmails(){
		$data = $_POST;

        $settings = UserDB::getExchangeSettings($_SESSION["id"]);

        $timezone = 'Eastern Standard Time';
        
        // Set connection information.
        $host = $settings["exchange_host"];
        $username = $settings["exchange_username"];
        $password = $settings["exchange_password"];
        $version = Client::VERSION_2010_SP2;
        
        $client = new Client($host, $username, $password, $version);
        $client->setTimezone($timezone);
		
		// Build the restriction that will search for emails containing our search query.
		$request->Restriction = new RestrictionType();
		$contains = new ContainsExpressionType();
		$contains->FieldURI = new PathToUnindexedFieldType();
		$contains->FieldURI->FieldURI = UnindexedFieldURIType::ITEM_SUBJECT;
		$contains->Constant = new ConstantValueType();
		$contains->Constant->Value = $data["query"];
		$contains->ContainmentComparison = ContainmentComparisonType::IGNORE_CASE_AND_NON_SPACING_CHARS;
		$contains->ContainmentMode = ContainmentModeType::SUBSTRING;
		$request->Restriction->Contains = $contains;
		$request->Traversal = ItemQueryTraversalType::SHALLOW;
		// Return all message properties.
		$request->ItemShape = new ItemResponseShapeType();
		$request->ItemShape->BaseShape = DefaultShapeNamesType::ALL_PROPERTIES;
		// Search in the user's inbox.
		$folder_id = $data["folder_id"];            
        $request->ParentFolderIds->FolderId = new FolderIdType();
        $request->ParentFolderIds->FolderId->Id = $folder_id;
		$response = $client->FindItem($request);
		// Iterate over the results, printing any error messages or message subjects.
		$response_messages = $response->ResponseMessages->FindItemResponseMessage;
		$jsonEmails = array();
        
        foreach($response_messages as $curEmail) {
        	$emails = $curEmail->RootFolder->Items->Message;
        	if (isset($emails)) {
        		foreach($emails as $email) {
					$change_key = $email->ItemId->ChangeKey;
        			$message_id = $email->ItemId->Id;
        			$subject = $email->Subject;
        			$received = $email->DateTimeReceived;
        			$fromEmail = $email->Sender->Mailbox->EmailAddress;
					$fromName = $email->Sender->Mailbox->Name;
					if ($fromEmail == null){
						$fromEmail = "Unknown";
					}
					if ($fromName == null){
						$fromName = $fromEmail;
					}
					$flagged = $email->Importance;
					if ($email->Importance == "High"){
						$flagged = 1;
					}
					
        			$jEmail = array("mail_id" => $message_id, "change_key" => $change_key, "flagged" => $flagged, "seen" => $email->IsRead, "subject" => $subject, "from" => $fromEmail, "fromname" => $fromName, "to" => $email->DisplayTo, "date" => $received);
		
        			array_push($jsonEmails, $jEmail);
        		}
        	}
        }
        
		$resp = array();
		$resp["emails"] = $jsonEmails;
        echo json_encode($resp);
	}
	
	public static function moveExchangeEmail(){
		$data = $_POST;

        $settings = UserDB::getExchangeSettings($_SESSION["id"]);
        
        // Set connection information.
        $host = $settings["exchange_host"];
        $username = $settings["exchange_username"];
        $password = $settings["exchange_password"];
        $version = Client::VERSION_2010_SP2;
        
        $client = new Client($host, $username, $password, $version);
		
		$request = new MoveItemType();
		
		$request->ToFolderId->FolderId->Id = $data["folder_id"];
		$request->ToFolderId->FolderId->ChangeKey = $data["folder_change_key"];
		
		$emails_to_move = explode(",", $data["mail_ids"]);
		foreach ($emails_to_move as $email){
			$request->ItemIds->ItemId->Id = $email;

			// Generic execution sample code
			$response = $client->MoveItem($request);
			
			$response_messages = $response->ResponseMessages->ItemInfoResponseMessageType;
			$resp = array();
			$resp["error"] = false;
			foreach ($response_messages as $response_message) {
				// Make sure the request succeeded.
				if ($response_message->ResponseClass != ResponseClassType::SUCCESS) {
					$resp = array();
					$resp["error"] = true;
					$resp["message"] = $response_message->MessageText;
					break;
				}else{
					$resp = array();
					$resp["error"] = false;
				}
			}
			
			echo json_encode($resp);
		}
	}
	
	public static function getExchangeEmailByID(){
        $data = $_POST;
        $email_id = $data["mail_id"];
        $file_destination = 'Uploads/EmailAttachments';
		
		$settings = UserDB::getExchangeSettings($_SESSION["id"]);

        $timezone = 'Eastern Standard Time';
        
        // Set connection information.
        $host = $settings["exchange_host"];
        $username = $settings["exchange_username"];
        $password = $settings["exchange_password"];
        $version = Client::VERSION_2010_SP2;
        
        $client = new Client($host, $username, $password, $version);
        $client->setTimezone($timezone);

        // Build the request.
        
        $request = new GetItemType();
        $request->ItemShape = new ItemResponseShapeType();
        $request->ItemShape->BaseShape = DefaultShapeNamesType::ALL_PROPERTIES;
        $request->ItemShape->AdditionalProperties = new NonEmptyArrayOfPathsToElementType();
        $request->ItemIds = new NonEmptyArrayOfBaseItemIdsType();
        
        // Add an extended property to the request. We'll use the replied on property
        // for this example.
        
        $property = new PathToExtendedFieldType();
        $property->PropertyTag = '0x1081';
        $property->PropertyType = MapiPropertyTypeType::INTEGER;
        $request->ItemShape->AdditionalProperties->ExtendedFieldURI[] = $property;
        
        // Iterate over the message ids, setting each one on the request.
        
        $item = new ItemIdType();
    	$item->Id = $email_id;
    	$request->ItemIds->ItemId[] = $item;
        
        $response = $client->GetItem($request);
        $response_messages = $response->ResponseMessages->GetItemResponseMessage;
        
        $jsonEmail = array();
        
        foreach($response_messages as $response_message) {
        
        	// Make sure the request succeeded.
        
        	if ($response_message->ResponseClass != ResponseClassType::SUCCESS) {
        		$code = $response_message->ResponseCode;
        		$message = $response_message->MessageText;
        		continue;
        	}
        
        	// Iterate over the messages, printing the subject for each.
        	$attachmentsArray = array();
        
        	foreach($response_message->Items->Message as $item) {
				$body = $item->Body;
				if (!empty($item->Attachments)){
				    if (!empty($item->Attachments->ItemAttachment)) {
        				foreach($item->Attachments->ItemAttachment as $attachment) {
        					$attachments[] = $attachment->AttachmentId->Id;
        				}
        			}
        			else {
        				foreach($item->Attachments->FileAttachment as $attachment) {
        					$attachments[] = $attachment->AttachmentId->Id;
        				}
        			}
        
        			// Build the request to get the attachments.
        
        			$request = new GetAttachmentType();
        			$request->AttachmentIds = new NonEmptyArrayOfRequestAttachmentIdsType();
        
        			// Iterate over the attachments for the message.
        
        			foreach($attachments as $attachment_id) {
        				$id = new RequestAttachmentIdType();
        				$id->Id = $attachment_id;
        				$request->AttachmentIds->AttachmentId[] = $id;
        			}
        
        			$response = $client->GetAttachment($request);
        
        			// Iterate over the response messages, printing any error messages or
        			// saving the attachments.
        
        			$attachment_response_messages = $response->ResponseMessages->GetAttachmentResponseMessage;
        			foreach($attachment_response_messages as $attachment_response_message) {

                    	// Make sure the request succeeded.
                    
                    	if ($attachment_response_message->ResponseClass != ResponseClassType::SUCCESS) {
                    		$code = $response_message->ResponseCode;
                    		$message = $response_message->MessageText;
                    	}
                    
                    	if (empty($attachment_response_message->Attachments)) {
                    		continue;
                    	}
                    	else {
                    		// Iterate over the file attachments, saving each one.
                    
                    		if (!empty($attachment_response_message->Attachments->ItemAttachment)) {
                    			$attachments = $attachment_response_message->Attachments->ItemAttachment;
                    		}
                    		else {
                    			$attachments = $attachment_response_message->Attachments->FileAttachment;
                    		}
                    
                    		foreach($attachments as $attachment) {
                    			$path = $file_destination . "/" . $attachment->Name;
                    			file_put_contents($path, $attachment->Content);
                    			array_push($attachmentsArray, array("name" => $attachment->Name, "cid" => $attachment->ContentId, "inline" => $attachment->IsInline));
                    		}
                    	}
                    }
				}
				$jsonEmail = array("message" => $body->_,"attachments" => $attachmentsArray);
        	}
        
        }
		echo json_encode($jsonEmail);
    }
	
	public static function markExchangeRead(){
		$data = $_POST;
        
        $settings = UserDB::getExchangeSettings($_SESSION["id"]);

        $timezone = 'Eastern Standard Time';
        
        // Set connection information.
        $host = $settings["exchange_host"];
        $username = $settings["exchange_username"];
        $password = $settings["exchange_password"];
        $version = Client::VERSION_2010_SP2;
        
        $client = new Client($host, $username, $password, $version);
		
		$request = new UpdateItemType();
		$request->ConflictResolution = ConflictResolutionType::ALWAYS_OVERWRITE;
		
		$change = new ItemChangeType();
    	$change->ItemId = new ItemIdType();
		$change->ItemId->Id = $data["mail_id"];
		$change->ItemId->ChangeKey = $data["change_key"];
		
		$field = new SetItemFieldType();
		$field->FieldURI = new PathToUnindexedFieldType();
		$field->FieldURI->FieldURI = UnindexedFieldURIType::MESSAGE_IS_READ;
		$field->Message = new MessageType();
		$field->Message->IsRead = 1;
		$change->Updates->SetItemField[] = $field;
		
		$request->ItemChanges[] = $change;
		$request->MessageDisposition = 'SaveOnly';
		
		$response = $client->UpdateItem($request);
		
		$resp = array();
		$resp["error"] = false;
        foreach ($response_messages as $response_message) {
            // Make sure the request succeeded.
            if ($response_message->ResponseClass != ResponseClassType::SUCCESS) {
                $resp = array();
                $resp["error"] = true;
                $resp["message"] = $response_message->MessageText;
                break;
            }else{
                $resp = array();
                $resp["error"] = false;
            }
        }
		echo json_encode($resp);
	}
	
	public static function changeExchangeImportance(){
		$data = $_POST;
        
        $settings = UserDB::getExchangeSettings($_SESSION["id"]);

        $timezone = 'Eastern Standard Time';
        
        // Set connection information.
        $host = $settings["exchange_host"];
        $username = $settings["exchange_username"];
        $password = $settings["exchange_password"];
        $version = Client::VERSION_2010_SP2;
        
        $client = new Client($host, $username, $password, $version);
		
		$request = new UpdateItemType();
		$request->ConflictResolution = ConflictResolutionType::ALWAYS_OVERWRITE;
		
		$change = new ItemChangeType();
    	$change->ItemId = new ItemIdType();
		$change->ItemId->Id = $data["mail_id"];
		$change->ItemId->ChangeKey = $data["change_key"];
		
		$field = new SetItemFieldType();
		$field->FieldURI = new PathToUnindexedFieldType();
		$field->FieldURI->FieldURI = UnindexedFieldURIType::ITEM_IMPORTANCE;
		$field->Message = new MessageType();
		if ($data["importance"] == "High"){
			$field->Message->Importance = ImportanceChoicesType::HIGH;
		}else{
			$field->Message->Importance = ImportanceChoicesType::NORMAL;
		}
		$change->Updates->SetItemField[] = $field;
		
		$request->ItemChanges[] = $change;
		
		$request->MessageDisposition = 'SaveOnly';
		
		$response = $client->UpdateItem($request);
		
		$resp = array();
		$resp["error"] = false;
		foreach ($response_messages as $response_message) {
            // Make sure the request succeeded.
            if ($response_message->ResponseClass != ResponseClassType::SUCCESS) {
                $resp = array();
                $resp["error"] = true;
                $resp["message"] = $response_message->MessageText;
                break;
            }else{
                $resp = array();
                $resp["error"] = false;
            }
        }
		
		echo json_encode($resp);
	}
	
	public static function deleteExchangeEmail(){
        $data = $_POST;
        
        $settings = UserDB::getExchangeSettings($_SESSION["id"]);

        $timezone = 'Eastern Standard Time';
        
        // Set connection information.
        $host = $settings["exchange_host"];
        $username = $settings["exchange_username"];
        $password = $settings["exchange_password"];
        $version = Client::VERSION_2010_SP2;
        
        $client = new Client($host, $username, $password, $version);
		
		$mails_to_delete = explode(",", $data["mail_ids"]);
		
		foreach ($mails_to_delete as $mail_id){
        
			$request = new DeleteItemType();
			$request->DeleteType = DisposalType::MOVE_TO_DELETED_ITEMS;
			$request->ItemIds->ItemId = new ItemIdType();
			$request->ItemIds->ItemId->Id = $mail_id;
			$response = $client->DeleteItem($request);
			
		}
    }
	
	public static function createExchangeFolder(){
        $data = $_POST;
		
        $settings = UserDB::getExchangeSettings($_SESSION["id"]);

        $timezone = 'Eastern Standard Time';
        
        // Set connection information.
        $host = $settings["exchange_host"];
        $username = $settings["exchange_username"];
        $password = $settings["exchange_password"];
        $version = Client::VERSION_2010_SP2;
        
        $client = new Client($host, $username, $password, $version);
        // Build the request object.
        $request = new CreateFolderType();
        $request->Folders = new ArrayOfFoldersType();
        // Set the parent folder for the newly created folder.
        $parent = new TargetFolderIdType();
        $parent->DistinguishedFolderId = new DistinguishedFolderIdType();
        $parent->DistinguishedFolderId->Id = DistinguishedFolderIdNameType::ROOT;
        $request->ParentFolderId = $parent;
        // Configure the new folder to be created. You could create multiple folders in
        // a single request.
        $folder = new FolderType();
        $folder->DisplayName = $data["folder_name"];
        $request->Folders->Folder[] = $folder;
        $response = $client->CreateFolder($request);
        // Iterate over the results, printing any error messages or folder ids.
        $response_messages = $response->ResponseMessages->CreateFolderResponseMessage;
        $resp = array();
		$resp["error"] = false;
        foreach ($response_messages as $response_message) {
            // Make sure the request succeeded.
            if ($response_message->ResponseClass != ResponseClassType::SUCCESS) {
                $code = $response_message->ResponseCode;
                $message = $response_message->MessageText;
                $resp["error"] = true;
                $resp["message"] = "Folder failed to create with \"$code: $message\"\n";
                break;
            }
            // Iterate over the created folders.
            foreach ($response_message->Folders->Folder as $folder)
            {
                $id = $folder->FolderId->Id;
                $resp["id"] = $id;
            }
        }
        echo json_encode($resp);
    }

    public static function checkForICS() {
        $employee_id = 1;
        $settings = UserDB::getIMAPSettings($employee_id);
        $ssl = "";
        if ($settings["imap_ssl"] == 1 && $settings["imap_certificate"] == 1) {
            $ssl = "ssl/validate-cert";
        }
        else if ($settings["imap_ssl"] == 1) {
            $ssl = "ssl/novalidate-cert";
        }
        /* connect to server */
        $hostname = "{" . $settings["imap_hostaddress"] . ":" . $settings["imap_port"] . "/imap/" . $ssl . "}INBOX";
        $username = $settings["imap_username"];
        $password = $settings["imap_password"];

        $mailbox = new Mailbox($hostname, $settings["imap_username"], $settings["imap_password"], "Uploads/EmailAttachments");
        $mailsIds = $mailbox->searchMailbox('SINCE ' . date("Y-m-d") . ' BODY "BEGIN:VCALENDAR"'); //get only todays emails
        if (!$mailsIds) {
            return;
        }
        else {
            $jsonEmails = array();
            foreach ($mailsIds as $mailId) {
                $mail = $mailbox->getMail($mailId);
                $mailDate = strtotime($mail->date);
                if ($mailDate <= strtotime("-10 minutes")) { //if mail is not older than 10 minutes, process it
                    $message = $mail->textHtml;
                    $ical = new ICal();
                    $ical->initString($message);
                    $events = $ical->events();
                    foreach ($events as $event) {
                        $uid = $event->uid;
                        $dbevent = EventDB::externalEventExists($uid);
                        if (!is_array($dbevent)) { //event doesn't exist
                            $startdatetime = $ical->iCalDateToDateTime($event->dtstart);
                            $enddatetime = $ical->iCalDateToDateTime($event->dtend);
                            $event_startdate = $startdatetime->format("Y-m-d");
                            $event_starttime = $startdatetime->format("H:i");
                            $event_enddate = $enddatetime->format("Y-m-d");
                            $event_endtime = $enddatetime->format("H:i");

                            $attendees = $event->attendee_array;
                            $attendee_emails = explode(",", $event->attendee);

                            $externalParticipantsString = "";
                            $count = 0;
                            foreach ($attendees as $attendee) {
                                if (is_array($attendee)) {
                                    if ($externalParticipantsString == "") {
                                        $externalParticipantsString = $attendee["CN"] . "|" . explode(":", $attendee_emails[$count]) [1] . "|" . $attendee["PARTSTAT"];
                                    }
                                    else {
                                        $externalParticipantsString .= ";" . $attendee["CN"] . "|" . explode(":", $attendee_emails[$count]) [1] . "|" . $attendee["PARTSTAT"];
                                    }
                                    $count++;
                                }
                            }

                            $customer_id = 0;

                            $customer = CustomerDB::getCustomerByEmail($mail->fromAddress);
                            if (is_array($customer)) {
                                $customer_id = $customer["customer_id"];
                            }

                            $description = "";
                            if ($event->description != null) {
                                $description = $event->description;
                            }

                            $location = "";
                            if ($event->location != null) {
                                $location = $event->location;
                            }

                            $event_id = EventDB::addEvent($uid, "Regular", $event->summary, $event_startdate, $event_starttime, $event_enddate, $event_endtime, "", $customer_id, $employee_id, $employee_id, $externalParticipantsString, $description, "Normal", $location, "", "", "", "");

                            EventDB::setEventUID($event_id, $uid);

                            echo "Event created";
                        }
                        else {
                            $existing_participants = explode(";", $dbevent["external_participants"]);

                            $attendees = $event->attendee_array;
                            $attendee_emails = explode(",", $event->attendee);

                            $name = $attendees[0]["CN"];
                            $reply_email = explode(":", $attendee_emails[0]) [1];
                            $reply_status = $attendees[0]["PARTSTAT"];

                            $updated_participants = array();
                            foreach ($existing_participants as $participant) {
                                $participant_array = explode("|", $participant);
                                $participant_email = $participant_array[1];
                                if ($participant_email == $reply_email) {
                                    $participant_array[2] = $reply_status;
                                    array_push($updated_participants, implode("|", $participant_array));
                                }
                                else {
                                    array_push($updated_participants, $participant);
                                }
                            }

                            $externalParticipantsString = implode(";", $updated_participants);

                            EventDB::updateExternalParticipants($dbevent["event_id"], $externalParticipantsString);
                            echo "Event updated " . $externalParticipantsString . "<br>";

                        }
                    }
                }
            }
        }

        $mailbox->disconnect();
    }

    public static function markIMAPRead() {
        $data = $_POST;
        $settings = UserDB::getIMAPSettings($_SESSION["id"]);
        $ssl = "";
        if ($settings["imap_ssl"] == 1 && $settings["imap_certificate"] == 1) {
            $ssl = "ssl/validate-cert";
        }
        else if ($settings["imap_ssl"] == 1) {
            $ssl = "ssl/novalidate-cert";
        }
        /* connect to server */
        $hostname = "{" . $settings["imap_hostaddress"] . ":" . $settings["imap_port"] . "/imap/" . $ssl . "}" . $data["folder"];
        $username = $settings["imap_username"];
        $password = $settings["imap_password"];

        $mailbox = new Mailbox($hostname, $settings["imap_username"], $settings["imap_password"], "Uploads/EmailAttachments");
        $mailbox->markMailAsRead($data["mail_id"]);
        $mailbox->disconnect();
    }

    public static function toggleIMAPStarred() {
        $data = $_POST;

        $mailID = $data["mail_id"];
        $starred = $data["starred"];

        $settings = UserDB::getIMAPSettings($_SESSION["id"]);
        $ssl = "";
        if ($settings["imap_ssl"] == 1 && $settings["imap_certificate"] == 1) {
            $ssl = "ssl/validate-cert";
        }
        else if ($settings["imap_ssl"] == 1) {
            $ssl = "ssl/novalidate-cert";
        }
        /* connect to server */
        $hostname = "{" . $settings["imap_hostaddress"] . ":" . $settings["imap_port"] . "/imap/" . $ssl . "}" . $data["folder"];
        $username = $settings["imap_username"];
        $password = $settings["imap_password"];

        $mailbox = new Mailbox($hostname, $settings["imap_username"], $settings["imap_password"], "Uploads/EmailAttachments");
        if ($starred == 1) {
            $mailbox->markMailAsImportant($mailID);
        }
        else {
            $mailbox->markMailAsUnimportant($mailID);
        }

        $mailbox->disconnect();
    }

    public static function deleteIMAPEmail() {
        $data = $_POST;

        $settings = UserDB::getIMAPSettings($_SESSION["id"]);
        $ssl = "";
        if ($settings["imap_ssl"] == 1 && $settings["imap_certificate"] == 1) {
            $ssl = "ssl/validate-cert";
        }
        else if ($settings["imap_ssl"] == 1) {
            $ssl = "ssl/novalidate-cert";
        }
        /* connect to server */
        $hostname = "{" . $settings["imap_hostaddress"] . ":" . $settings["imap_port"] . "/imap/" . $ssl . "}" . $data["folder"];
        $username = $settings["imap_username"];
        $password = $settings["imap_password"];

        $mailbox = new Mailbox($hostname, $settings["imap_username"], $settings["imap_password"], "Uploads/EmailAttachments");

        $mailIds = explode(",", $data["mail_ids"]);
        foreach ($mailIds as $mailId) {
            $mailbox->deleteMail($mailId);
        }
        $mailbox->expungeDeletedMails();

        $mailbox->disconnect();
    }

    public static function markMailAsOpened() {
        GeneralDB::updateActionStatus($_GET["action_id"], 2);
    }

    public static function checkReminders() {
        $reminders = GeneralDB::getActiveReminders();
        $todaysDate = strtotime(date("Y-m-d H:i:s"));

        foreach ($reminders as $reminder) {
            $reminderDate = strtotime($reminder["reminder_datetime"]);
            $minutes = round(($reminderDate - $todaysDate) / 60, 2);
            if ($minutes < 5) {
                GeneralDB::setReminderInactive($reminder["reminder_id"]);
                $employee = UserDB::getEmployeeByID($reminder["employee_id"]);
                $event = EventDB::getEventByID($reminder["event_id"]);
                $customer = CustomerDB::getCustomerByID($reminder["customer_id"]);
                if ($employee["employee_mailing"] == "1") {
                    sendNotificationMail($employee, $event, $customer);

                }
                if ($employee["employee_sms"] == "1") {
                    sendNotificationSMS($employee, $event, $customer);
                }
            }
        }

        $tickets = TelephonyDB::getUnresolvedTickets();
        foreach ($tickets as $ticket) {
            $slaTime = $ticket["normal_sla"];
            if ($ticket["ticket_priority"] == "Low") {
                $slaTime = $ticket["low_sla"];
            }
            else if ($ticket["ticket_priority"] = "High") {
                $slaTime = $ticket["high_sla"];
            }
            $created_on = strtotime($ticket["created_on"]);
            $current_date = strtotime(date("Y-m-d H:i:s"));
            $participants = UserDB::getParticipants($ticket["assigned_to"]);

            $minutes = abs(round(($created_on - $current_date) / 60, 2));

            if ($minutes > ($slaTime / 2)) {
                foreach ($participants as $participant) {
                    $mail = new PHPMailer(true); // Passing `true` enables exceptions
                    try {
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
                        if (isset($_SERVER['HTTPS'])) {
                            $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
                        }
                        else {
                            $protocol = 'http';
                        }
                        $ticketURL = $protocol . "://" . $_SERVER['HTTP_HOST'] . "/" . BASE_URL . "ticketdetails?ticket_id=" . $ticket["ticket_id"];
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
												  <p style="margin:0 10px 10px 10px;padding:0;color:black;">A ticket with the subject <strong>' . $ticket["ticket_subject"] . '</strong> is still unopened.<br>You can view the ticket by clicking the button below.</p>
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
                        //Content
                        $mail->isHTML(true); // Set email format to HTML
                        $mail->Subject = 'Ticket - ' . $ticket["ticket_subject"] . " unopened";
                        $mail->msgHTML($emailBody);

                        $mail->send();

                    }
                    catch(Exception $e) {
                        echo 'Message could not be sent.';
                        echo 'Mailer Error: ' . $mail->ErrorInfo;
                    }
                }
                TelephonyDB::ticketNotificationSent($ticket["ticket_id"]);
            }
        }
    }

    public static function getExchangeFolders() {
        $settings = UserDB::getExchangeSettings($_SESSION["id"]);

        $timezone = 'Eastern Standard Time';
        
        // Set connection information.
        $host = $settings["exchange_host"];
        $username = $settings["exchange_username"];
        $password = $settings["exchange_password"];
        $version = Client::VERSION_2010_SP2;
		
        $client = new Client($host, $username, $password, $version);
        // Build the request.
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
                $code = $response_message->ResponseCode;
                $message = $response_message->MessageText;
                $resp = array();
                $resp["error"] = true;
                $resp["message"] = "Failed to find folders with \"$code: $message\"\n";
                echo json_encode($response);
                break;
            }
            // The folders could be of any type, so combine all of them into a single
            // array to iterate over them.
            $folders = $response_message->RootFolder->Folders->Folder;
            // Iterate over the found folders.
            $jsonFolders = array();
            foreach ($folders as $folder) {
                $name = $folder->DisplayName;
				$total = $folder->TotalCount;
                $id = $folder->FolderId->Id;
				$change_key = $folder->FolderId->ChangeKey;
                $jFolder = array(
                    "id" => $id,
					"change_key" => $change_key,
                    "name" => $name,
					"count" => $total
                );
				if ($total > 0){
					array_push($jsonFolders, $jFolder);
				}
            }
            $resp = array();
            $resp["error"] = false;
            $resp["folders"] = $jsonFolders;
            echo json_encode($resp);
        }
    }
	
	

    public static function sendEmail() {
        $data = $_POST;
        $recipients = explode(",", $data["recipients"]);
        $ccs = explode(",", $data["cc"]);
        $bccs = explode(",", $data["bcc"]);

        $settings = UserDB::getIMAPSettings($_SESSION["id"]);
        $ssl = "";
        if ($settings["imap_ssl"] == 1 && $settings["imap_certificate"] == 1) {
            $ssl = "ssl/validate-cert";
        }
        else if ($settings["imap_ssl"] == 1) {
            $ssl = "ssl/novalidate-cert";
        }
        /* connect to server */
        $emailhost = $settings["imap_hostaddress"];
        $emailusername = $settings["imap_username"];
        $emailpassword = $settings["imap_password"];

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
            $mail->Port = $settings["imap_outboundport"]; // TCP port to connect to
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
            else {
                $settings = UserDB::getIMAPSettings($_SESSION["id"]);
                $ssl = "";
                if ($settings["imap_ssl"] == 1 && $settings["imap_certificate"] == 1) {
                    $ssl = "ssl/validate-cert";
                }
                else if ($settings["imap_ssl"] == 1) {
                    $ssl = "ssl/novalidate-cert";
                }
                /* connect to server */
                $hostname = "{" . $settings["imap_hostaddress"] . ":" . $settings["imap_port"] . "/imap/" . $ssl . "}INBOX.Sent";
                $username = $settings["imap_username"];
                $password = $settings["imap_password"];
                $imapStream = imap_open($hostname, $username, $password);
                $result = imap_append($imapStream, $hostname, $mail->getSentMIMEMessage());
                imap_close($imapStream);
            }
        }
        catch(Exception $e) {
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }

    }

}

function sendNotificationMail($employee, $event, $customer) {
    $mail = new PHPMailer(true); // Passing `true` enables exceptions
    $template = TemplateDB::getEmailTemplateByID(1); //event reminder template
    try {
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

        $todaysDate = new DateTime();

        $eventDate = DateTime::createFromFormat("Y-m-d H:i", $event["event_startdate"] . " " . $event["event_starttime"]);

        $sinceThen = $eventDate->diff($todaysDate);

        $timeBetween = $sinceThen->h . " hours " . $sinceThen->i . " minutes";

        $nonHtmlMsg = 'You have event scheduled on ' . $event["event_startdate"] . " " . $event["event_starttime"] . ' which starts in ' . $timeBetween;
        $htmlMsg = $template["template_content"];
        $htmlMsg = str_replace("%name%", $employee["employee_name"] . " " . $employee["employee_surname"], $htmlMsg);
        $htmlMsg = str_replace("%priority%", strtolower($event["event_importance"]) , $htmlMsg);
        $htmlMsg = str_replace("%eventdate%", $event["event_startdate"] . " " . $event["event_starttime"], $htmlMsg);
        $htmlMsg = str_replace("%customername%", $customer["customer_name"], $htmlMsg);
        $htmlMsg = str_replace("%time%", $timeBetween, $htmlMsg);
        $htmlMsg = str_replace("%eventsubject%", $event["event_subject"], $htmlMsg);
        $htmlMsg = str_replace("%eventdescription%", $event["event_description"], $htmlMsg);
        $action_id = GeneralDB::addAction($employee["employee_id"], $customer["customer_id"], $nonHtmlMsg, $htmlMsg, "E-mail", 1); //save e-mail sent action to database.
        $htmlMsg .= '<img src="http://track.appdev.si/index.php/messages/mailopened?action_id=' . $action_id . '" />';

        $mail->addAddress($employee["employee_email"], $employee["employee_email"]); // Add a recipient
        //Content
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = 'Reminder for event - ' . $event["event_subject"] . ' with ' . $customer["customer_name"];
        $mail->msgHTML($htmlMsg);

        $mail->send();
        echo 'Message has been sent';

    }
    catch(Exception $e) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
        GeneralDB::updateActionStatus($action_id, 0); //email not sent due to error, save new status to DB.
        GeneralDB::updateActionError($action_id, $mail->ErrorInfo);
    }

}

function sendNotificationSMS($employee, $event, $customer) {
    $settings = GeneralDB::getSettings();
    if ($settings["sms_url"] != "") {
        $template = TemplateDB::getSMSTemplateByID(1); //template for event reminder
        $employee_phone = $employee["employee_phone"];
        $employee_phone = str_replace("+", "", $employee_phone); //removes + from phonenumber so we only get 386xxxxxxxx
        $username = $settings["sms_username"];
        $password = $settings["sms_password"];

        $todaysDate = new DateTime();

        $eventDate = DateTime::createFromFormat("Y-m-d H:i", $event["event_startdate"] . " " . $event["event_starttime"]);

        $sinceThen = $eventDate->diff($todaysDate);

        $timeBetween = $sinceThen->h . " hours " . $sinceThen->i . " minutes";

        $message = $template["template_content"];
        $message = str_replace("%name%", $employee["employee_name"] . " " . $employee["employee_surname"], $message);
        $message = str_replace("%priority%", $event["event_importance"], $message);
        $message = str_replace("%eventdate%", $event["event_startdate"] . " " . $event["event_starttime"], $message);
        $message = str_replace("%time%", $timeBetween, $message);
        $message = str_replace("%customername%", $customer["customer_name"], $message);
        $message = str_replace("%eventsubject%", $event["event_subject"], $message);

        // set post fields
        $data = array(
            'message' => $message,
            'from_number' => $settings["sms_label"],
            'to_number' => $employee_phone
        );
        $data_string = json_encode($data);

        $ch = curl_init($settings["sms_url"]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_string)
        ));
        curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);

        // execute!
        $response = curl_exec($ch);

        // close the connection, release resources used
        curl_close($ch);

        // do anything you want with your response
        $response = json_decode($response, true);
        if ($response["error_code"] == "0") { //no error
            GeneralDB::addAction($employee["employee_id"], $customer["customer_id"], $message, $message, "SMS", 1); //save e-mail sent action to database.
            return true;
        }
        else {
            $action_id = GeneralDB::addAction($employee["employee_id"], $customer["customer_id"], $message, $message, "SMS", 0); //save e-mail sent action to database.
            GeneralDB::updateActionError($action_id, $mail->ErrorInfo);
            return false; //sms sending failed.
            
        }
    }
}

function runEmailFilters($employee_id) {
        $settings = UserDB::getIMAPSettings($employee_id);
        $filters = GeneralDB::getEmailFilters($settings["imap_username"]);
        $ssl = "";
        if ($settings["imap_ssl"] == 1 && $settings["imap_certificate"] == 1) {
            $ssl = "ssl/validate-cert";
        }
        else if ($settings["imap_ssl"] == 1) {
            $ssl = "ssl/novalidate-cert";
        }
        /* connect to server */
        $hostname = "{" . $settings["imap_hostaddress"] . ":" . $settings["imap_port"] . "/imap/" . $ssl . "}INBOX";
        $username = $settings["imap_username"];
        $password = $settings["imap_password"];

        $mailbox = new Mailbox($hostname, $settings["imap_username"], $settings["imap_password"], "Uploads/EmailAttachments");

        $mailbox->disableAttachments();

        foreach ($filters as $filter) {
            // Fetch e-mails in INBOX by filter, then move them to mailbox specified in filter settings
            $mailsIds = $mailbox->searchMailbox($filter["filter_field"] . ' "' . $filter["filter_text"] . '" SINCE ' . date("Y-m-d"));
	
            if ($mailsIds != false) {
                $mailsString = implode(",", $mailsIds);
                $mailbox->moveMail($mailsString, $filter["filter_mailbox"]);
				
				GeneralDB::addMailmanagerAction(null, 0, "Moved " . count($mailsIds) . " e-mail(s) to " . getFolderName($filter["filter_mailbox"]), $username);
            }
        }

        $mailbox->expungeDeletedMails();
        $mailbox->disconnect();
}

	
function getFolderName($fName){
	$foldername = explode(".", $fName);
	$actualFolderName = strtolower($fName);
	if (count($foldername) > 1){
		$actualFolderName = strtolower($foldername[count($foldername) - 1]);
	}
	$actualFolderName = ucfirst($actualFolderName);
	return $actualFolderName;
}

function getOffice365Token(){
	$user = UserDB::getEmployeeByID($_SESSION["id"]);
	$curDate = strtotime(date("Y-m-d H:i:s"));
	$tokenDate = strtotime($user["expires_on"]);
	if ($curDate - $tokenDate >= 0){
		$response = refreshOffice365Token($user["refresh_token"]);
		UserDB::saveOffice365Token($_SESSION["id"], $response["access_token"], $response["refresh_token"], date("Y-m-d H:i:s", strtotime("+" . $response["expires_in"] . " seconds")));
		return $response["access_token"];
	}else{
		return $user["access_token"];
	}
}

function refreshOffice365Token($refresh_token) {
		$arraytoreturn = array();
		if (isset($_SERVER['HTTPS'])) {
            $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
        } else {
            $protocol = 'http';
        }
		$callbackURL = $protocol . "://" . $_SERVER['HTTP_HOST'] . BASE_URL . "office365/callback";
		$output = "";
		try {
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, "https://login.microsoftonline.com/1f50a38f-9604-4967-804d-bc6a7cf705ae/oauth2/v2.0/token");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);	
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
				'Content-Type: application/x-www-form-urlencoded',
				));
			curl_setopt($ch, CURLOPT_POST, TRUE);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);		

			$data = "client_id=c2785070-f16d-46f5-bc12-304410eca8ad&redirect_uri=".$callbackURL."&client_secret=".urlencode("M8cOh7PR4Z7tOjPfB2GDxlmVJeyiN4IG4poSTXlmsR4=")."&refresh_token=".$refresh_token."&grant_type=refresh_token";	
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			$output = curl_exec($ch);
		} catch (Exception $e) {
		}
	
		$out2 = json_decode($output, true);
		return $out2;
}
?>
