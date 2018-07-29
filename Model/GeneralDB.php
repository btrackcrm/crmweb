<?php

require_once "DBInit.php";

class GeneralDB {
	
	public static function getTrackingDistance($employee_id, $datetime){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("SELECT * FROM tracking_distance WHERE employee_id = :employee_id AND DATE(date) = DATE(:datetime) LIMIT 1;");
		$statement->bindParam(":employee_id", $employee_id);
		$statement->bindParam(":datetime", $datetime);
		
		$statement->execute();
		
		return $statement->fetch();
	}
	
	public static function addEmailFilter($employee_id, $filter_field, $filter_text, $filter_mailbox, $filter_email){
		$added_on = date("Y-m-d H:i:s");
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("INSERT INTO email_filters (employee_id, filter_field, filter_text, filter_mailbox, filter_email, created_on) VALUES (:employee_id, :filter_field, :filter_text, :filter_mailbox, :filter_email, :created_on)");
		$statement->bindParam(":employee_id", $employee_id);
		$statement->bindParam(":filter_field", $filter_field);
		$statement->bindParam(":filter_text", $filter_text);
		$statement->bindParam(":filter_mailbox", $filter_mailbox);
		$statement->bindParam(":filter_email", $filter_email);
		$statement->bindParam(":created_on", $added_on);
		
		$statement->execute();
	}
	
	public static function editEmailFilter($filter_id, $filter_field, $filter_text, $filter_mailbox){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("UPDATE email_filters SET filter_field = :filter_field, filter_text = :filter_text, filter_mailbox = :filter_mailbox WHERE filter_id = :filter_id");
		$statement->bindParam(":filter_field", $filter_field);
		$statement->bindParam(":filter_text", $filter_text);
		$statement->bindParam(":filter_mailbox", $filter_mailbox);
		$statement->bindParam(":filter_id", $filter_id);
		
		$statement->execute();
	}
	
	public static function deleteEmailFilter($filter_id){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("DELETE FROM email_filters WHERE filter_id = :filter_id");
		$statement->bindParam(":filter_id", $filter_id);
		
		$statement->execute();
	}
	

	public static function addMailmanagerAction($employee_id, $action_type, $action_description, $action_email){
		$created_on = date("Y-m-d H:i:s");
		
		$db = DBInit::getInstance();
		$statement = $db->prepare("INSERT INTO mailmanager_actions (employee_id, action_type, action_description, action_email, created_on) VALUES (:employee_id, :action_type, :action_description, :action_email, :created_on)");
		
		$statement->bindParam(":employee_id", $employee_id);
		$statement->bindParam(":action_type", $action_type);
		$statement->bindParam(":action_description", $action_description);
		$statement->bindParam(":action_email", $action_email);
		$statement->bindParam(":created_on", $created_on);
		
		$statement->execute();
	}
	
	public static function getMailmanagerActions($action_email, $created_on){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("SELECT mailmanager_actions.*, employees.employee_name, employees.employee_surname FROM mailmanager_actions LEFT JOIN employees ON mailmanager_actions.employee_id = employees.employee_id WHERE mailmanager_actions.action_email = :action_email AND DATE(mailmanager_actions.created_on) = DATE(:created_on)");
		$statement->bindParam(":action_email", $action_email);
		$statement->bindParam(":created_on", $created_on);
		
		$statement->execute();
		
		return $statement->fetchAll();
	}
	
	public static function getEmailFilters($filter_email){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("SELECT email_filters.*, employees.employee_name, employees.employee_surname FROM email_filters INNER JOIN employees ON email_filters.employee_id = employees.employee_id WHERE email_filters.filter_email = :filter_email");
		$statement->bindParam(":filter_email", $filter_email);
		$statement->execute();
		
		return $statement->fetchAll();
	}
	
	public static function setCompanyLogo($filename){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("UPDATE settings SET company_logo = :company_logo");
		$statement->bindParam(":company_logo", $filename);
		
		$statement->execute();
	}
	
	public static function getExpiredTransfers(){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("SELECT * FROM transfers WHERE DATE(created_on) < DATE_SUB(CURDATE(), INTERVAL 7 DAY)"); //fetch entries older than 7 days
		$statement->execute();
		
		return $statement->fetchAll();
	}
	
	public static function deleteTransfer($transfer_id){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("DELETE FROM transfers WHERE transfer_id = :transfer_id");
		
		$statement->bindParam(":transfer_id", $transfer_id);
		
		$statement->execute();
	}
	
	public static function addFileTransfer($unique_id, $employee_id, $filepath, $email_to, $sent_to, $customer_id){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("INSERT INTO filetransfers (unique_id, employee_id, filepath, email_to, sent_to, customer_id) VALUES (:unique_id, :employee_id, :filepath, :email_to, :sent_to, :customer_id)");
		$statement->bindParam(":unique_id", $unique_id);
		$statement->bindParam(":employee_id", $employee_id);
		$statement->bindParam(":filepath", $filepath);
		$statement->bindParam(":email_to", $email_to);
		$statement->bindParam(":sent_to", $sent_to);
		$statement->bindParam(":customer_id", $customer_id);
		
		$statement->execute();
	}
	
	public static function getFileTransfer($unique_id){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("SELECT * FROM filetransfers WHERE unique_id = :unique_id");
		$statement->bindParam(":unique_id", $unique_id);
		
		$statement->execute();
		
		return $statement->fetch();
	}
	
	public static function getAllTransfers(){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("SELECT filetransfers.*, employees.employee_name, employees.employee_surname, customers.customer_name FROM filetransfers INNER JOIN employees ON filetransfers.employee_id = employees.employee_id LEFT JOIN customers ON filetransfers.customer_id = customers.customer_id WHERE filetransfers.employee_id = :employee_id ORDER BY DATE(filetransfers.created_on) DESC;");
		$statement->bindParam(":employee_id", $_SESSION["id"]);
		$statement->execute();
		
		return $statement->fetchAll();
	}
	
	public static function addFileUpload($employee_id, $customer_id, $event_id, $wgtask_id, $ticket_id, $workorder_id, $filename, $filepath){
		$curdate = date("Y-m-d H:i:s");
        $db = DBInit::getInstance();
		
		$statement = $db->prepare("INSERT INTO uploads (employee_id, customer_id, event_id, wgtask_id, ticket_id, workorder_id, datetime, filename, filepath)
		VALUES (:employee_id, :customer_id, :event_id, :wgtask_id, :ticket_id, :workorder_id, :datetime, :filename, :filepath)");
									
		$statement->bindParam(":employee_id", $employee_id);
		$statement->bindParam(":customer_id", $customer_id);
		$statement->bindParam(":event_id", $event_id);
		$statement->bindParam(":wgtask_id", $wgtask_id);
		$statement->bindParam(":ticket_id", $ticket_id);
		$statement->bindParam(":workorder_id", $workorder_id);
		$statement->bindParam(":datetime", $curdate);
		$statement->bindParam(":filename", $filename);
		$statement->bindParam(":filepath", $filepath);
		
		$statement->execute();
	}
    
    public static function saveFileUpload($employee_id, $filename, $filepath){
        $curdate = date("Y-m-d H:i:s");
        $db = DBInit::getInstance();
        $statement = $db->prepare("INSERT INTO uploads (employee_id, datetime, filename, filepath) VALUES (:employee_id, :datetime, :filename, :filepath)");
        $statement->bindParam(":employee_id", $employee_id);
        $statement->bindParam(":datetime", $curdate);
        $statement->bindParam(":filename", $filename);
        $statement->bindParam(":filepath", $filepath);
        
        $statement->execute();
    }
    
    public static function getUserInfo($username){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT * FROM users WHERE username = :username");
        $statement->bindParam(":username", $username);
        
        $statement->execute();
        return $statement->fetch();
    }
    
    public static function saveTrackingTerms($tracking_terms){
        $db = DBInit::getInstance();
        $statement = $db->prepare("UPDATE settings SET tracking_terms = :tracking_terms");
        $statement->bindParam(":tracking_terms", $tracking_terms);
        
        $statement->execute();
    }
    
    public static function saveMKSettings($mk_secretkey, $mk_companyid){
        $db = DBInit::getInstance();
        $statement = $db->prepare("UPDATE settings SET mk_secretkey = :mk_secretkey, mk_companyid = :mk_companyid");
        $statement->bindParam(":mk_secretkey", $mk_secretkey);
        $statement->bindParam(":mk_companyid", $mk_companyid);
        
        $statement->execute();
    }
    
    public static function changeUserPassword($username, $password){
        $db = DBInit::getInstance();
        $statement = $db->prepare("UPDATE users SET password = :password WHERE username = :username");
        $statement->bindParam(":password", $password);
        $statement->bindParam(":username", $username);
        
        $statement->execute();
    }
    
    public static function setupMailchimp($mailchimp_key){
        $db = DBInit::getInstance();
        $statement = $db->prepare("UPDATE settings SET mailchimp_key = :mailchimp_key");
        $statement->bindParam(":mailchimp_key", $mailchimp_key);
        $statement->execute();
    }
    
    public static function removeMailchimp(){
        $db = DBInit::getInstance();
        $statement = $db->prepare("UPDATE settings SET mailchimp_key = ''");
        $statement->execute();
    }
    
    public static function loginUser($employee_id){
        $curdate = date("Y-m-d H:i:s");
        $db = DBInit::getInstance();
        $statement = $db->prepare("UPDATE employees SET logged_in = 1, last_login_web = :curdate WHERE employee_id = :employee_id");
		
		$statement->bindParam(":curdate", $curdate);
        $statement->bindParam(":employee_id", $employee_id);
		
        $statement->execute();
    }
    
    public static function logoutUser($employee_id){
        $db = DBInit::getInstance();
        $statement = $db->prepare("UPDATE employees SET logged_in = 0 WHERE employee_id = :employee_id");
        $statement->bindParam(":employee_id", $employee_id);
        $statement->execute();
    }
    public static function resetElapsedDistances(){
        $db = DBInit::getInstance();
        $statement = $db->prepare("UPDATE employees SET distance = 0");
        
        $statement->execute();
    }
    
    public static function updateBasicSettings($company_name, $company_address, $company_city, $company_zipcode, $company_phonenumber){
        $db = DBInit::getInstance();
        $statement = $db->prepare("UPDATE settings SET company_name = :company_name, company_address = :company_address, company_city = :company_city, company_zipcode = :company_zipcode, company_phonenumber = :company_phonenumber");
        $statement->bindParam(":company_name", $company_name);
        $statement->bindParam(":company_address", $company_address);
        $statement->bindParam(":company_city", $company_city);
        $statement->bindParam(":company_zipcode", $company_zipcode);
        $statement->bindParam(":company_phonenumber", $company_phonenumber);
        
        $statement->execute();
    }
    
    public static function getUnknownStopsDate($employee_id, $datetime){
        if ($employee_id != ""){
            $db = DBInit::getInstance();
            $statement = $db->prepare("SELECT stops.*, employees.employee_name, employees.employee_surname FROM stops INNER JOIN employees ON stops.employee_id = employees.employee_id WHERE stops.customer_id = NULL AND stops.employee_id = :employee_id AND DATE(stops.start_time) = DATE(:datetime)");
            $statement->bindParam(":employee_id", $employee_id);
            $statement->bindParam(":datetime", $datetime);
            $statement->execute();
            
            return $statement->fetchAll();
        }else{
            $db = DBInit::getInstance();
            $statement = $db->prepare("SELECT stops.*, employees.employee_name, employees.employee_surname FROM stops INNER JOIN employees ON stops.employee_id = employees.employee_id WHERE stops.customer_id = NULL AND DATE(stops.start_time) = DATE(:datetime)");
            $statement->bindParam(":datetime", $datetime);
            $statement->execute();
            
            return $statement->fetchAll();
        }
    }
    
    public static function getUniqueUnknownStopsDates($employee_id){
        if ($employee_id == ""){
            $db = DBInit::getInstance();
            $statement = $db->prepare("SELECT DISTINCT DATE(date_format(start_time, '%Y-%m-%d')) AS datetime FROM stops");
            $statement->execute();
            
            return $statement->fetchAll();
        }else{
            $db = DBInit::getInstance();
            $statement = $db->prepare("SELECT DISTINCT DATE(date_format(start_time, '%Y-%m-%d')) AS datetime FROM stops WHERE employee_id = :employee_id");
            $statement->bindParam(":employee_id", $employee_id);
            $statement->execute();
            
            return $statement->fetchAll();
        }
    }
    
    public static function getUniqueUploadDates($employee_id){
        if ($employee_id == ""){
            $db = DBInit::getInstance();
            $statement = $db->prepare("SELECT DISTINCT DATE(date_format(datetime, '%Y-%m-%d')) AS datetime FROM uploads");
            $statement->execute();
            
            return $statement->fetchAll();
        }else{
            $db = DBInit::getInstance();
            $statement = $db->prepare("SELECT DISTINCT DATE(date_format(datetime, '%Y-%m-%d')) AS datetime FROM uploads WHERE employee_id = :employee_id");
            $statement->bindParam(":employee_id", $employee_id);
            $statement->execute();
            
            return $statement->fetchAll();
        }
    }
    
    public static function getUniqueReminderDates($employee_id){
        if ($employee_id == ""){
            $db = DBInit::getInstance();
            $statement = $db->prepare("SELECT DISTINCT DATE(date_format(reminder_datetime, '%Y-%m-%d')) AS datetime FROM reminders");
            $statement->execute();
            
            return $statement->fetchAll();
        }else{
            $db = DBInit::getInstance();
            $statement = $db->prepare("SELECT DISTINCT DATE(date_format(reminder_datetime, '%Y-%m-%d')) AS datetime FROM reminders WHERE employee_id = :employee_id");
            $statement->bindParam(":employee_id", $employee_id);
            $statement->execute();
            
            return $statement->fetchAll();
        }
    }
    
    public static function getUniqueCallDates($employee_id){
        if ($employee_id == ""){
            $db = DBInit::getInstance();
            $statement = $db->prepare("SELECT DISTINCT DATE(date_format(call_start, '%Y-%m-%d')) AS datetime FROM calls");
            $statement->execute();
            
            return $statement->fetchAll();
        }else{
            $db = DBInit::getInstance();
            $statement = $db->prepare("SELECT DISTINCT DATE(date_format(call_start, '%Y-%m-%d')) AS datetime FROM calls WHERE employee_id = :employee_id");
            $statement->bindParam(":employee_id", $employee_id);
            $statement->execute();
            
            return $statement->fetchAll();
        }
    }
    
    public static function getUniqueMessageDates($type, $employee_id){
        if ($employee_id == ""){
            $db = DBInit::getInstance();
            $statement = $db->prepare("SELECT DISTINCT DATE(date_format(datetime, '%Y-%m-%d')) AS datetime FROM actions WHERE type = :type");
            $statement->bindParam(":type", $type);
            $statement->execute();
            
            return $statement->fetchAll();
        }else{
            $db = DBInit::getInstance();
            $statement = $db->prepare("SELECT DISTINCT DATE(date_format(datetime, '%Y-%m-%d')) AS datetime FROM actions WHERE type = :type AND employee_id = :employee_id");
            $statement->bindParam(":employee_id", $employee_id);
            $statement->bindParam(":type", $type);
            $statement->execute();
            
            return $statement->fetchAll();
        }
    }
    
    public static function getListOfFiles(){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT uploads.*, employees.* FROM uploads INNER JOIN employees ON employees.employee_id = uploads.employee_id");
        $statement->execute();
        
        return $statement->fetchAll();
    }
    
    public static function getEmployeeFiles($employee_id, $datetime){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT uploads.*, employees.* FROM uploads INNER JOIN employees ON employees.employee_id = uploads.employee_id WHERE DATE(uploads.datetime) = DATE(:datetime) AND uploads.employee_id = :employee_id");
        $statement->bindParam(":employee_id", $employee_id);
        $statement->bindParam(":datetime", $datetime);
        $statement->execute();
        
        return $statement->fetchAll();
    }
    
    public static function getLastActivityLogs($employee_id){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT * FROM locationlogs WHERE employee_id = :employee_id ORDER BY log_id DESC LIMIT 1;");
        $statement->bindParam(":employee_id", $employee_id);
        
        $statement->execute();
        return $statement->fetch();
    }
    
    public static function getTodaysStops($employee_id){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT stops.*, employees.employee_name, employees.employee_surname FROM stops INNER JOIN employees ON stops.employee_id = employees.employee_id WHERE stops.employee_id = :employee_id AND DATE(stops.start_time) = CURDATE();");
        $statement->bindParam(":employee_id", $employee_id);
        
        $statement->execute();
        return $statement->fetchAll();
    }
    
    public static function getStopsDate($employee_id, $datetime){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT stops.*, employees.employee_name, employees.employee_surname FROM stops INNER JOIN employees ON stops.employee_id = employees.employee_id WHERE stops.employee_id = :employee_id AND DATE(stops.start_time) = DATE(:datetime);");
        $statement->bindParam(":employee_id", $employee_id);
        $statement->bindParam(":datetime", $datetime);
        
        $statement->execute();
        return $statement->fetchAll();
    }
    
    public static function editSettings($notifications_email, $company_name, $company_address, $company_city, $company_zipcode, $company_phonenumber, $decimal_seperator, $employees_showinactive){
        $db = DBInit::getInstance();
		
        $statement = $db->prepare("UPDATE settings SET notifications_email = :notifications_email, company_name = :company_name, company_address = :company_address, company_city = :company_city, company_zipcode = :company_zipcode, company_phonenumber = :company_phonenumber,
        decimal_seperator = :decimal_seperator, employees_showinactive = :employees_showinactive");
        
		$statement->bindParam(":notifications_email", $notifications_email);
        $statement->bindParam(":company_name", $company_name);
        $statement->bindParam(":company_address", $company_address);
        $statement->bindParam(":company_city", $company_city);
        $statement->bindParam(":company_zipcode", $company_zipcode);
        $statement->bindParam(":company_phonenumber", $company_phonenumber);
        $statement->bindParam(":decimal_seperator", $decimal_seperator);
        $statement->bindParam(":employees_showinactive", $employees_showinactive);
        
        $statement->execute();
    }
	
	public static function editSMSSettings($sms_url, $sms_label, $sms_username, $sms_password){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("UPDATE settings SET sms_url = :sms_url, sms_label = :sms_label, sms_username = :sms_username, sms_password = :sms_password");
		
		$statement->bindParam(":sms_url", $sms_url);
		$statement->bindParam(":sms_label", $sms_label);
		$statement->bindParam(":sms_username", $sms_username);
		$statement->bindParam(":sms_password", $sms_password);
		
		$statement->execute();
	}
	
	public static function editTelephonySettings($telephony_showemails, $telephony_showmobile, $ticketing_prefix, $workorder_prefix){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("UPDATE settings SET telephony_showemails = :telephony_showemails, telephony_showmobile = :telephony_showmobile, ticketing_prefix = :ticketing_prefix, workorder_prefix = :workorder_prefix");
		
		$statement->bindParam(":telephony_showemails", $telephony_showemails);
        $statement->bindParam(":telephony_showmobile", $telephony_showmobile);
		$statement->bindParam(":ticketing_prefix", $ticketing_prefix);
		$statement->bindParam(":workorder_prefix", $workorder_prefix);
		
		$statement->execute();
	}
	
	public static function editTrackingSettings($event_radius, $location_radius, $worktime_from, $worktime_to, $stop_duration, $trip_cost, $daily_allowance, $travelorder_prefix){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("UPDATE settings SET event_radius = :event_radius, location_radius = :location_radius, worktime_from = :worktime_from, worktime_to = :worktime_to, stop_duration = :stop_duration, trip_cost = :trip_cost, daily_allowance = :daily_allowance,
        travelorder_prefix = :travelorder_prefix");
		
		$statement->bindParam(":event_radius", $event_radius);
        $statement->bindParam(":location_radius", $location_radius);
        $statement->bindParam(":worktime_from", $worktime_from);
        $statement->bindParam(":worktime_to", $worktime_to);
        $statement->bindParam(":stop_duration", $stop_duration);
        $statement->bindParam(":trip_cost", $trip_cost);
        $statement->bindParam(":daily_allowance", $daily_allowance);
        $statement->bindParam(":travelorder_prefix", $travelorder_prefix);
		
		$statement->execute();
	}
    
    public static function saveEmailSettings($email_host, $email_username, $email_password, $email_ssl, $email_validatecert){
        $db = DBInit::getInstance();
        $statement = $db->prepare("UPDATE settings SET email_host = :email_host, email_username = :email_username, email_password = :email_password, email_ssl = :email_ssl, email_validatecert = :email_validatecert");
        $statement->bindParam(":email_host", $email_host);
        $statement->bindParam(":email_username", $email_username);
        $statement->bindParam(":email_password", $email_password);
        $statement->bindParam(":email_ssl", $email_ssl);
        $statement->bindParam(":email_validatecert", $email_validatecert);
        
        $statement->execute();
    }
    
    public static function getSettings(){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT * FROM settings");
        
        $statement->execute();
        return $statement->fetch();
    }
    
    public static function getActiveReminders(){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT * FROM reminders WHERE reminder_active = 1");
        $statement->execute();
        
        return $statement->fetchAll();
    }
    
    public static function getAllReminders(){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT reminders.*, events.event_subject, employees.employee_name, employees.employee_surname FROM reminders INNER JOIN events ON reminders.event_id = events.event_id INNER JOIN employees ON reminders.employee_id = employees.employee_id WHERE employees.employee_type = 0 OR employees.employee_id = :employee_id");
        $statement->bindParam(":employee_id", $_SESSION["id"]);
		$statement->execute();
        return $statement->fetchAll();
    }
    
    public static function getRemindersLastWeek(){
        if ($_SESSION["admin"] == 1){
            $db = DBInit::getInstance();
            $statement = $db->prepare("SELECT COUNT(reminder_id) AS remindercount, DATE(reminder_datetime) AS date FROM reminders WHERE DATE(reminder_datetime) > DATE_SUB(NOW(), INTERVAL 1 WEEK) GROUP BY DATE(reminder_datetime);");
            $statement->execute();
            return $statement->fetchAll();
        }else{
            $db = DBInit::getInstance();
            $statement = $db->prepare("SELECT COUNT(reminder_id) AS remindercount, DATE(reminder_datetime) AS date FROM reminders WHERE DATE(reminder_datetime) > DATE_SUB(NOW(), INTERVAL 1 WEEK) AND employee_id = :employee_id GROUP BY DATE(reminder_datetime);");
            $statement->bindParam(":employee_id", $_SESSION["id"]);
            $statement->execute();
            return $statement->fetchAll(); 
        }
    }
    
    public static function getTodaysReminders($employee_id){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT * FROM reminders WHERE employee_id = :employee_id AND DATE(reminder_datetime) = DATE(:reminder_datetime)");
        $statement->bindParam(":employee_id", $employee_id);
        $statement->bindParam(":reminder_datetime", $reminder_datetime);
        $statement->execute();
        return $statement->fetchAll();
    }
    
    public static function setReminderInactive($reminder_id){
        $db = DBInit::getInstance();
        $statement = $db->prepare("UPDATE reminders SET reminder_active = 0 WHERE reminder_id = :reminder_id");
        $statement->bindParam(":reminder_id", $reminder_id);
        $statement->execute();
    }
    
    public static function getUnknownStops(){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT stops.*, employees.employee_name, employees.employee_surname FROM stops INNER JOIN employees ON stops.employee_id = employees.employee_id WHERE customer_id = NULL");
        $statement->execute();
        
        return $statement->fetchAll();
    }
    
    public static function addStopCustomer($stop_id, $customer_name){
        $db = DBInit::getInstance();
        $statement = $db->prepare("UPDATE stops SET customers = :customer_name WHERE stop_id = :stop_id");
        
        $statement->bindParam(":customer_name", $customer_name);
        $statement->bindParam(":stop_id", $stop_id);
        
        $statement->execute();
    }
    
    public static function addAction($employee_id, $customer_id, $summary, $message, $type, $status){
        $db = DBInit::getInstance();
        $statement = $db->prepare("INSERT INTO actions (employee_id, customer_id, summary, message, type, status) VALUES (:employee_id, :customer_id, :summary, :message, :type, :status)");
        
        $statement->bindParam(":employee_id", $employee_id);
        $statement->bindParam(":customer_id", $customer_id);
        $statement->bindParam(":summary", $summary);
        $statement->bindParam(":message", $message);
        $statement->bindParam(":type", $type);
        $statement->bindParam(":status", $status);
        
        $statement->execute();
        
        return $db->lastInsertId();
        
    }
    
    public static function getSentEmails(){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT actions.*, customers.customer_name, employees.* FROM actions INNER JOIN customers ON actions.customer_id = customers.customer_id INNER JOIN employees ON actions.employee_id = employees.employee_id WHERE actions.type = 'E-mail'");
        $statement->execute();
        
        return $statement->fetchAll();
    }
    
    public static function getEmailDate($employee_id, $datetime){
        if ($employee_id == ""){
            $db = DBInit::getInstance();
            $statement = $db->prepare("SELECT actions.*, customers.customer_name, employees.* FROM actions INNER JOIN customers ON actions.customer_id = customers.customer_id INNER JOIN employees ON actions.employee_id = employees.employee_id WHERE actions.type = 'E-mail' AND DATE(actions.datetime) = DATE(:datetime)");
            $statement->bindParam(":datetime", $datetime);
            $statement->execute();
            
            return $statement->fetchAll();
        }else{
            $db = DBInit::getInstance();
            $statement = $db->prepare("SELECT actions.*, customers.customer_name, employees.* FROM actions INNER JOIN customers ON actions.customer_id = customers.customer_id INNER JOIN employees ON actions.employee_id = employees.employee_id WHERE actions.type = 'E-mail' AND DATE(actions.datetime) = DATE(:datetime) AND actions.employee_id = :employee_id");
            $statement->bindParam(":employee_id", $employee_id);
            $statement->bindParam(":datetime", $datetime);
            $statement->execute();
            
            return $statement->fetchAll();
        }
    }
    
    public static function getSentSMS(){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT actions.*, customers.customer_name, employees.* FROM actions INNER JOIN customers ON actions.customer_id = customers.customer_id INNER JOIN employees ON actions.employee_id = employees.employee_id WHERE actions.type = 'SMS'");
        $statement->execute();
        
        return $statement->fetchAll();
    }
    
    public static function getSMSDate($employee_id, $datetime){
        if ($employee_id == ""){
            $db = DBInit::getInstance();
            $statement = $db->prepare("SELECT actions.*, customers.customer_name, employees.* FROM actions INNER JOIN customers ON actions.customer_id = customers.customer_id INNER JOIN employees ON actions.employee_id = employees.employee_id WHERE actions.type = 'SMS' AND DATE(actions.datetime) = DATE(:datetime)");
            $statement->bindParam(":datetime", $datetime);
            $statement->execute();
            
            return $statement->fetchAll();
        }else{
            $db = DBInit::getInstance();
            $statement = $db->prepare("SELECT actions.*, customers.customer_name, employees.* FROM actions INNER JOIN customers ON actions.customer_id = customers.customer_id INNER JOIN employees ON actions.employee_id = employees.employee_id WHERE actions.type = 'SMS' AND DATE(actions.datetime) = DATE(:datetime) AND actions.employee_id = :employee_id");
            $statement->bindParam(":employee_id", $employee_id);
            $statement->bindParam(":datetime", $datetime);
            $statement->execute();
            
            return $statement->fetchAll();
        }
    }
    
    public static function getRemindersByDate($employee_id, $reminder_datetime){
        $db = DBInit::getInstance();
        if ($employee_id != ""){
            $statement = $db->prepare("SELECT reminders.*, customers.customer_name, employees.*, events.* FROM reminders INNER JOIN events ON reminders.event_id = events.event_id INNER JOIN employees ON reminders.employee_id = employees.employee_id INNER JOIN customers ON reminders.customer_id = customers.customer_id WHERE DATE(reminders.reminder_datetime) = DATE(:reminder_datetime) AND reminders.employee_id = :employee_id");
            $statement->bindParam(":employee_id", $employee_id);
            $statement->bindParam(":reminder_datetime", $reminder_datetime);
            $statement->execute();
        
            return $statement->fetchAll();
        }else{
            $statement = $db->prepare("SELECT reminders.*, customers.customer_name, employees.*, events.* FROM reminders INNER JOIN events ON reminders.event_id = events.event_id INNER JOIN employees ON reminders.employee_id = employees.employee_id INNER JOIN customers ON reminders.customer_id = customers.customer_id WHERE DATE(reminders.reminder_datetime) = DATE(:reminder_datetime)");
            $statement->bindParam(":reminder_datetime", $reminder_datetime);
            $statement->execute();
            
            return $statement->fetchAll();
        }
        
    }
    
    public static function getRemindersByEmployee($employee_id){
        $db = DBInit::getInstance();
        if ($employee_id != ""){
            $statement = $db->prepare("SELECT reminders.*, customers.customer_name, employees.*, events.* FROM reminders INNER JOIN events ON reminders.event_id = events.event_id INNER JOIN employees ON reminders.employee_id = employees.employee_id INNER JOIN customers ON reminders.customer_id = customers.customer_id WHERE reminders.employee_id = :employee_id");
            $statement->bindParam(":employee_id", $employee_id);
            $statement->execute();
        
            return $statement->fetchAll();
        }else{
            $statement = $db->prepare("SELECT reminders.*, customers.customer_name, employees.*, events.* FROM reminders INNER JOIN events ON reminders.event_id = events.event_id INNER JOIN employees ON reminders.employee_id = employees.employee_id INNER JOIN customers ON reminders.customer_id = customers.customer_id");
            $statement->execute();
            
            return $statement->fetchAll();
        }
    }
    
    public static function getCallsByDate($employee_id, $datetime){
        if ($employee_id == ""){
            $db = DBInit::getInstance();
            $statement = $db->prepare("SELECT calls.*, employees.*, customers.customer_name FROM calls LEFT JOIN customers ON customers.customer_id = calls.customer_id INNER JOIN employees ON calls.employee_id = employees.employee_id WHERE DATE(call_start) = DATE(:datetime);");
            $statement->bindParam(":datetime", $datetime);
            $statement->execute();
            
            return $statement->fetchAll();
        }else{
            $db = DBInit::getInstance();
            $statement = $db->prepare("SELECT calls.*, employees.*, customers.customer_name FROM calls LEFT JOIN customers ON customers.customer_id = calls.customer_id INNER JOIN employees ON calls.employee_id = employees.employee_id WHERE DATE(call_start) = DATE(:datetime) AND calls.employee_id = :employee_id;");
            $statement->bindParam(":datetime", $datetime);
            $statement->bindParam(":employee_id", $employee_id);
            $statement->execute();
            
            return $statement->fetchAll();
        }
    }
    
    public static function getAllTodaysReminders(){
        if ($_SESSION["admin"] == 1){
            $db = DBInit::getInstance();
            $statement = $db->prepare("SELECT * FROM reminders WHERE DATE(reminder_datetime) = CURDATE()");
            $statement->execute();
            
            return $statement->fetchAll();
        }else{
            $db = DBInit::getInstance();
            $statement = $db->prepare("SELECT * FROM reminders WHERE DATE(reminder_datetime) = CURDATE() AND employee_id = :employee_id");
            $statement->bindParam(":employee_id", $_SESSION["id"]);
            $statement->execute();
            
            return $statement->fetchAll();
        }
    }
    
    public static function updateActionStatus($action_id, $status){
        $db = DBInit::getInstance();
        $statement = $db->prepare("UPDATE actions SET status = :status WHERE action_id = :action_id");
        
        $statement->bindParam(":action_id", $action_id);
        $statement->bindParam(":status", $status);
        
        $statement->execute();
    }
    
    public static function updateActionError($action_id, $errors){
        $db = DBInit::getInstance();
        $statement = $db->prepare("UPDATE actions SET errors = :errors WHERE action_id = :action_id");
        
        $statement->bindParam(":action_id", $action_id);
        $statement->bindParam(":errors", $errors);
        
        $statement->execute();
    }
    
    public static function getCalls(){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT calls.*, employees.*, customers.customer_name FROM calls LEFT JOIN customers ON customers.customer_id = calls.customer_id INNER JOIN employees ON calls.employee_id = employees.employee_id;");
        
        $statement->execute();
        
        return $statement->fetchAll();
    }
    
    
}