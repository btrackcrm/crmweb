<?php

require_once "DBInit.php";

class TelephonyDB{
	
	public static function getUnresolvedTickets(){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("SELECT tickets.*, customers.low_sla, customers.normal_sla, customers.high_sla FROM tickets INNER JOIN customers ON tickets.customer_id = customers.customer_id WHERE tickets.opened_on = '' AND tickets.notification_sent = 0");
		
		$statement->execute();
		
		return $statement->fetchAll();
	}
	
	public static function getTicketFiles($ticket_id){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("SELECT uploads.*, employees.employee_name, employees.employee_surname FROM uploads INNER JOIN employees ON uploads.employee_id = employees.employee_id WHERE uploads.ticket_id = :ticket_id");
		$statement->bindParam(":ticket_id", $ticket_id);
		
		$statement->execute();
		
		return $statement->fetchAll();
	}
	
	public static function removeTicketWorkOrder($ticket_id){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("UPDATE tickets SET workorder_id = NULL WHERE ticket_id = :ticket_id");
		$statement->bindParam(":ticket_id", $ticket_id);
		
		$statement->execute();
	}
	
	public static function ticketNotificationSent($ticket_id){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("UPDATE tickets SET notification_sent = 1 WHERE ticket_id = :ticket_id");
		$statement->bindParam(":ticket_id", $ticket_id);
		
		$statement->execute();
	}
	
	public static function markTicketAsOpened($ticket_id){
		$db = DBInit::getInstance();
		$opened_on = date("Y-m-d H:i:s");
		
		$statement = $db->prepare("UPDATE tickets SET opened_on = :opened_on WHERE ticket_id = :ticket_id");
		$statement->bindParam(":opened_on", $opened_on);
		$statement->bindParam(":ticket_id", $ticket_id);
		
		$statement->execute();
	}
	
	public static function markTicketAsFinished($ticket_id){
		$db = DBInit::getInstance();
		$finished_on = date("Y-m-d H:i:s");
		
		$statement = $db->prepare("UPDATE tickets SET finished_on = :finished_on WHERE ticket_id = :ticket_id");
		$statement->bindParam(":finished_on", $finished_on);
		$statement->bindParam(":ticket_id", $ticket_id);
		
		$statement->execute();
	}
	
	public static function setTicketWorkOrder($ticket_id, $workorder_id){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("UPDATE tickets SET workorder_id = :workorder_id WHERE ticket_id = :ticket_id");
		$statement->bindParam(":workorder_id", $workorder_id);
		$statement->bindParam(":ticket_id", $ticket_id);
		
		$statement->execute();
	}
	
	public static function getEmployeeCalls($employee_id){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("SELECT * FROM crmcalls WHERE employee_id = :employee_id");
		$statement->bindParam(":employee_id", $employee_id);
		
		$statement->execute();
		
		return $statement->fetchAll();
	}
	
	public static function getEmailTickets($email_id){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("SELECT ticket_id, ticket_subject, ticket_status FROM tickets WHERE email_id = :email_id");
		$statement->bindParam(":email_id", $email_id);
		
		$statement->execute();
		
		return $statement->fetchAll();
	}
	
	public static function getTicketCategories(){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("SELECT * FROM ticket_categories");
		
		$statement->execute();
		
		return $statement->fetchAll();
	}
	
	public static function addTicketCategory($category_name){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("INSERT INTO ticket_categories (category_name) VALUES (:category_name)");
		$statement->bindParam(":category_name", $category_name);
		
		$statement->execute();
	}
	
	public static function editTicketCategory($category_id, $category_name){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("UPDATE ticket_categories SET category_name = :category_name WHERE category_id = :category_id");
		
		$statement->bindParam(":category_name", $category_name);
		$statement->bindParam(":category_id", $category_id);
		
		$statement->execute();
	}
	
	public static function deleteTicketCategory($category_id){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("DELETE FROM ticket_categories WHERE category_id = :category_id");
		
		$statement->bindParam(":category_id", $category_id);
		
		$statement->execute();
	}
    
    public static function getTicketByID($ticket_id){
        $db = DBInit::getInstance();
        
        $statement = $db->prepare("SELECT tickets.*, customers.customer_name, subsidiaries.subsidiary_name, ticket_categories.category_name FROM tickets INNER JOIN ticket_categories ON tickets.ticket_type = ticket_categories.category_id INNER JOIN customers ON tickets.customer_id = customers.customer_id LEFT JOIN subsidiaries ON subsidiaries.subsidiary_id = tickets.subsidiary_id WHERE tickets.ticket_id = :ticket_id");
        
        $statement->bindParam(":ticket_id", $ticket_id);
        
        $statement->execute();
        
        return $statement->fetch();
    }
    
    public static function getLastTicketID(){
        $db = DBInit::getInstance();
        
        $statement = $db->prepare("SELECT * FROM tickets ORDER BY ticket_id DESC LIMIT 1;");
        
        $statement->execute();
        
        return $statement->fetch()["ticket_id"];
    }
    
    public static function getTickets(){
        $db = DBInit::getInstance();
        
		if ($_SESSION["admin"] == 1){
			$statement = $db->prepare("SELECT tickets.*, employees.employee_name, employees.employee_surname, customers.customer_name, subsidiaries.subsidiary_name, ticket_categories.category_name FROM tickets INNER JOIN ticket_categories ON tickets.ticket_type = ticket_categories.category_id INNER JOIN employees ON employees.employee_id = tickets.employee_id INNER JOIN customers ON customers.customer_id = tickets.customer_id LEFT JOIN subsidiaries ON tickets.subsidiary_id = subsidiaries.subsidiary_id WHERE (employees.employee_type = 0 OR tickets.employee_id = :employee_id)");
			$statement->bindParam(":employee_id", $_SESSION["id"]);
			$statement->execute();
		}else{
			$statement = $db->prepare("SELECT tickets.*, employees.employee_name, employees.employee_surname, customers.customer_name, subsidiaries.subsidiary_name, ticket_categories.category_name FROM tickets INNER JOIN ticket_categories ON tickets.ticket_type = ticket_categories.category_id INNER JOIN employees ON employees.employee_id = tickets.employee_id INNER JOIN customers ON customers.customer_id = tickets.customer_id LEFT JOIN subsidiaries ON tickets.subsidiary_id = subsidiaries.subsidiary_id WHERE FIND_IN_SET(:employee_id, tickets.assigned_to)");
			$statement->bindParam(":employee_id", $_SESSION["id"]);
			$statement->execute();
		}
        
        return $statement->fetchAll();
    }
	
	public static function getTodaysTickets(){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("SELECT * FROM tickets WHERE FIND_IN_SET(:employee_id, assigned_to) AND DATE(ticket_date) = CURDATE()");
		$statement->bindParam(":employee_id", $_SESSION["id"]);
		
		$statement->execute();
		
		return $statement->fetchAll();
	}
	
	public static function getTicketsLastWeek(){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("SELECT COUNT(ticket_id) AS ticketcount, DATE(ticket_date) AS ticketdate FROM tickets WHERE FIND_IN_SET(:employee_id, assigned_to) AND DATE(ticket_date) BETWEEN DATE_SUB(NOW(), INTERVAL 1 WEEK) AND DATE(ticket_date) <= NOW() GROUP BY DATE(ticket_date)");
		$statement->bindParam(":employee_id", $_SESSION["id"]);
		
		$statement->execute();
		
		return $statement->fetchAll();
	}
    
    public static function updateTicketStatus($ticket_id, $ticket_status){
        $db = DBInit::getInstance();
        
        $statement = $db->prepare("UPDATE tickets SET ticket_status = :ticket_status WHERE ticket_id = :ticket_id");
        
        $statement->bindParam(":ticket_status", $ticket_status);
        $statement->bindParam(":ticket_id", $ticket_id);
        
        $statement->execute();
    }
    
    public static function addTicketAction($ticket_id, $employee_id, $action_description, $action_type){
        $db = DBInit::getInstance();
        
        $statement = $db->prepare("INSERT INTO ticket_actions (ticket_id, employee_id, action_description, action_type) VALUES (:ticket_id, :employee_id, :action_description, :action_type)");
        
        $statement->bindParam(":ticket_id", $ticket_id);
        $statement->bindParam(":employee_id", $employee_id);
        $statement->bindParam(":action_description", $action_description);
		$statement->bindParam(":action_type", $action_type);
        
        $statement->execute();
		
		return $db->lastInsertId();
    }
	
	public static function getTicketActionByID($action_id){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("SELECT ticket_actions.*, employees.employee_name, employees.employee_surname FROM ticket_actions INNER JOIN employees ON employees.employee_id = ticket_actions.employee_id WHERE ticket_actions.action_id = :action_id");
		$statement->bindParam(":action_id", $action_id);
		$statement->execute();
		
		return $statement->fetch();
	}
    
    public static function getTicketActions($ticket_id){
        $db = DBInit::getInstance();
        
        $statement = $db->prepare("SELECT ticket_actions.*, employees.employee_name, employees.employee_surname FROM ticket_actions INNER JOIN employees ON employees.employee_id = ticket_actions.employee_id WHERE ticket_actions.ticket_id = :ticket_id ORDER BY DATE(ticket_actions.created_on) ASC");
        
        $statement->bindParam(":ticket_id", $ticket_id);
        $statement->execute();
        
        return $statement->fetchAll();
    }
    
    public static function addTicket($ticket_code, $call_id, $email_id, $ticket_subject, $ticket_date, $customer_id, $subsidiary_id, $employee_id, $assigned_to, $ticket_type, $ticket_location, $latitude, $longitude, $ticket_priority, $ticket_notes, $email_subject, $email_from, $email_body, $email_date, $ticket_files){
        
        $created_on = date("Y-m-d H:i:s");
        $db = DBInit::getInstance();
        
        $statement = $db->prepare("INSERT INTO tickets (ticket_code, call_id, email_id, ticket_subject, ticket_date, customer_id, subsidiary_id, employee_id, assigned_to, ticket_type, ticket_location, latitude, longitude, ticket_priority, ticket_notes, email_subject, email_from, email_body, email_date, ticket_files, created_on) VALUES
        (:ticket_code, :call_id, :email_id, :ticket_subject, :ticket_date, :customer_id, :subsidiary_id, :employee_id, :assigned_to, :ticket_type, :ticket_location, :latitude, :longitude, :ticket_priority, :ticket_notes, :email_subject, :email_from, :email_body, :email_date, :ticket_files, :created_on)");
        
        $statement->bindParam(":ticket_code", $ticket_code);
        $statement->bindParam(":call_id", $call_id);
        $statement->bindParam(":email_id", $email_id);
        $statement->bindParam(":ticket_subject", $ticket_subject);
        $statement->bindParam(":ticket_date", $ticket_date);
        $statement->bindParam(":customer_id", $customer_id);
		$statement->bindParam(":subsidiary_id", $subsidiary_id);
        $statement->bindParam(":employee_id", $employee_id);
        $statement->bindParam(":assigned_to", $assigned_to);
        $statement->bindParam(":ticket_type", $ticket_type);
        $statement->bindParam(":ticket_location", $ticket_location);
        $statement->bindParam(":latitude", $latitude);
        $statement->bindParam(":longitude", $longitude);
        $statement->bindParam(":ticket_priority", $ticket_priority);
        $statement->bindParam(":ticket_notes", $ticket_notes);
		$statement->bindParam(":email_subject", $email_subject);
		$statement->bindParam(":email_from", $email_from);
		$statement->bindParam(":email_body", $email_body);
		$statement->bindParam(":email_date", $email_date);
		$statement->bindParam(":ticket_files", $ticket_files);
        $statement->bindParam(":created_on", $created_on);
        
        $statement->execute();
        
        $ticket_id = $db->lastInsertId();
        
        if ($call_id != null){
            $statement2 = $db->prepare("UPDATE crmcalls SET ticket_id = :ticket_id WHERE call_id = :call_id");
            $statement2->bindParam(":ticket_id", $ticket_id);
            $statement2->bindParam(":call_id", $call_id);
            
            $statement2->execute();
        }
        
        if ($email_id != null){
            $statement2 = $db->prepare("UPDATE email SET ticket_id = :ticket_id WHERE email_id = :email_id");
            $statement2->bindParam(":ticket_id", $ticket_id);
            $statement2->bindParam(":email_id", $email_id);
            
            $statement2->execute();
        }
		
		return $ticket_id;
    }
    
    public static function editTicket($ticket_id, $ticket_subject, $ticket_date, $customer_id, $subsidiary_id, $assigned_to, $ticket_type, $ticket_location, $latitude, $longitude, $ticket_priority, $billing_fromdate, $billing_fromtime, $billing_todate, $billing_totime, $billing_notes, $ticket_notes, $ticket_status, $ticket_files){
        $db = DBInit::getInstance();
        $statement = $db->prepare("UPDATE tickets SET ticket_subject = :ticket_subject, ticket_date = :ticket_date, customer_id = :customer_id, subsidiary_id = :subsidiary_id, assigned_to = :assigned_to, ticket_type = :ticket_type, ticket_location = :ticket_location, latitude = :latitude,
        longitude = :longitude, ticket_priority = :ticket_priority, billing_fromdate = :billing_fromdate, billing_fromtime = :billing_fromtime, billing_todate = :billing_todate, billing_totime = :billing_totime, billing_notes = :billing_notes, ticket_notes = :ticket_notes, ticket_status = :ticket_status, ticket_files = :ticket_files WHERE ticket_id = :ticket_id");
        
        $statement->bindParam(":ticket_subject", $ticket_subject);
        $statement->bindParam(":ticket_date", $ticket_date);
        $statement->bindParam(":customer_id", $customer_id);
		$statement->bindParam(":subsidiary_id", $subsidiary_id);
        $statement->bindParam(":assigned_to", $assigned_to);
        $statement->bindParam(":ticket_type", $ticket_type);
        $statement->bindParam(":ticket_location", $ticket_location);
        $statement->bindParam(":latitude", $latitude);
        $statement->bindParam(":longitude", $longitude);
        $statement->bindParam(":ticket_priority", $ticket_priority);
        $statement->bindParam(":billing_fromdate", $billing_fromdate);
        $statement->bindParam(":billing_fromtime", $billing_fromtime);
        $statement->bindParam(":billing_todate", $billing_todate);
        $statement->bindParam(":billing_totime", $billing_totime);
        $statement->bindParam(":billing_notes", $billing_notes);
        $statement->bindParam(":ticket_notes", $ticket_notes);
        $statement->bindParam(":ticket_status", $ticket_status);
		$statement->bindParam(":ticket_files", $ticket_files);
        $statement->bindParam(":ticket_id", $ticket_id);
        
        $statement->execute();
    }
    
    public static function addToBlacklist($employee_id, $blacklist_phone, $blacklist_reason){
        $db = DBInit::getInstance();
        
        $statement = $db->prepare("INSERT INTO blacklist (employee_id, blacklist_phone, blacklist_reason) VALUES (:employee_id, :blacklist_phone, :blacklist_reason)");
        $statement->bindParam(":employee_id", $employee_id);
        $statement->bindParam(":blacklist_phone", $blacklist_phone);
        $statement->bindParam(":blacklist_reason", $blacklist_reason);
        
        $statement->execute();
    }
    
    public static function isNumberBlacklisted($blacklist_phone){
        $db = DBInit::getInstance();
        
        $statement = $db->prepare("SELECT * FROM blacklist WHERE blacklist_phone = :blacklist_phone");
        $statement->bindParam(":blacklist_phone", $blacklist_phone);
        $statement->execute();
        
        return is_array($statement->fetch());
    }
    
    public static function markBlacklistedAsCalled($phonenumber, $customer_called){
        $db = DBInit::getInstance();
        
        $statement = $db->prepare("UPDATE telephony_campaignlist SET customer_called = :customer_called WHERE customer_phone = :phonenumber");
        $statement->bindParam(":phonenumber", $phonenumber);
        $statement->bindParam(":customer_called", $customer_called);
        
        $statement->execute();
    }
    
    
    public static function deleteBlacklist($blacklist_id){
        $db = DBInit::getInstance();
        
        $statement = $db->prepare("DELETE FROM blacklist WHERE blacklist_id = :blacklist_id");
        $statement->bindParam(":blacklist_id", $blacklist_id);
        
        $statement->execute();
    }
    
    public static function editBlacklist($blacklist_id, $blacklist_reason){
        $db = DBInit::getInstance();
        
        $statement = $db->prepare("UPDATE blacklist SET blacklist_reason = :blacklist_reason WHERE blacklist_id = :blacklist_id");
        $statement->bindParam(":blacklist_reason", $blacklist_reason);
        $statement->bindParam(":blacklist_id", $blacklist_id);
        
        $statement->execute();
    }
    
    public static function getBlacklist(){
        $db = DBInit::getInstance();
        
        $statement = $db->prepare("SELECT blacklist.*, employees.employee_name, employees.employee_surname FROM blacklist INNER JOIN employees ON blacklist.employee_id = employees.employee_id");
        $statement->execute();
        
        return $statement->fetchAll();
    }
    
    public static function getCampaigns(){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT * FROM telephony_campaign WHERE campaign_finished = 0");
        $statement->execute();
        
        return $statement->fetchAll();
    }
    
    public static function finishCampaign($campaign_id){
        $db = DBInit::getInstance();
        $statement = $db->prepare("UPDATE telephony_campaign SET campaign_finished = 1 WHERE campaign_id = :campaign_id");
        $statement->bindParam(":campaign_id", $campaign_id);
        
        $statement->execute();
    }
    
    public static function getCampaignSubscribers($campaign_id){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT telephony_campaignlist.*, telephony_campaign.campaign_name FROM telephony_campaignlist INNER JOIN telephony_campaign ON telephony_campaignlist.campaign_id = telephony_campaign.campaign_id WHERE telephony_campaignlist.campaign_id = :campaign_id AND telephony_campaignlist.customer_called = 0");
        
        $statement->bindParam(":campaign_id", $campaign_id);
        
        $statement->execute();
        return $statement->fetchAll();
    }
    
    public static function markCustomerAsCalled($customer_id){
        $db = DBInit::getInstance();
        $statement = $db->prepare("UPDATE telephony_campaignlist SET customer_called = 1 WHERE customer_id = :customer_id");
        $statement->bindParam(":customer_id", $customer_id);
        
        $statement->execute();
    }
    
    public static function getCampaignCalls($campaign_id){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT telephony_campaigncalls.*, telephony_campaignlist.customer_name, telephony_campaignlist.customer_phone, employees.employee_name, employees.employee_surname FROM telephony_campaigncalls INNER JOIN employees ON telephony_campaigncalls.employee_id = employees.employee_id INNER JOIN telephony_campaignlist ON telephony_campaignlist.customer_id = telephony_campaigncalls.customer_id WHERE telephony_campaigncalls.campaign_id = :campaign_id");
        $statement->bindParam(":campaign_id", $campaign_id);
        
        $statement->execute();
        return $statement->fetchAll();
    }
    
    public static function getCallsToday($campaign_id){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT * FROM telephony_campaigncalls WHERE campaign_id = :campaign_id AND DATE(call_datetime) = CURDATE()");
        $statement->bindParam(":campaign_id", $campaign_id);
        
        $statement->execute();
        return $statement->fetchAll();
    }
    
    public static function getCampaignCallsByDate($campaign_id){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT COUNT(*) AS nrOfCalls, DATE(call_datetime) AS date FROM telephony_campaigncalls WHERE campaign_id = :campaign_id GROUP BY DATE(call_datetime)");
        
        $statement->bindParam(":campaign_id", $campaign_id);
        $statement->execute();
        
        return $statement->fetchAll();
    }
    
    public static function insertCampaignCall($customer_id, $employee_id, $campaign_id, $call_notes, $call_type){
        $db = DBInit::getInstance();
        
        $call_datetime = date("Y-m-d H:i");
        $statement = $db->prepare("INSERT INTO telephony_campaigncalls (customer_id, employee_id, campaign_id, call_notes, call_datetime, call_type) VALUES (:customer_id, :employee_id, :campaign_id, :call_notes, :call_datetime, :call_type)");
        $statement->bindParam(":customer_id", $customer_id);
        $statement->bindParam(":employee_id", $employee_id);
        $statement->bindParam(":campaign_id", $campaign_id);
        $statement->bindParam(":call_notes", $call_notes);
        $statement->bindParam(":call_datetime", $call_datetime);
        $statement->bindParam(":call_type", $call_type);
        
        $statement->execute();
    }
    
    public static function createCampaign($campaign_name, $campaign_description, $campaign_participants){
        $db = DBInit::getInstance();
        $statement = $db->prepare("INSERT INTO telephony_campaign (campaign_name, campaign_description, campaign_participants) VALUES (:campaign_name, :campaign_description, :campaign_participants)");
        $statement->bindParam(":campaign_name", $campaign_name);
        $statement->bindParam(":campaign_description", $campaign_description);
        $statement->bindParam(":campaign_participants", $campaign_participants);
        
        $statement->execute();
        
        return $db->lastInsertId();
    }
    
    public static function editCampaign($campaign_id, $campaign_name, $campaign_description, $campaign_participants){
        $db = DBInit::getInstance();
        $statement = $db->prepare("UPDATE telephony_campaign SET campaign_name = :campaign_name, campaign_description = :campaign_description, campaign_participants = :campaign_participants WHERE campaign_id = :campaign_id");
        
        $statement->bindParam(":campaign_id", $campaign_id);
        $statement->bindParam(":campaign_name", $campaign_name);
        $statement->bindParam(":campaign_description", $campaign_description);
        $statement->bindParam(":campaign_participants", $campaign_participants);
        
        $statement->execute();
    }
    
    public static function addCampaignSubscriber($campaign_id, $customer_name, $customer_phone, $customer_email, $customer_notes){
        $db = DBInit::getInstance();
        $statement = $db->prepare("INSERT INTO telephony_campaignlist (campaign_id, customer_name, customer_phone, customer_email, customer_notes) VALUES (:campaign_id, :customer_name, :customer_phone, :customer_email, :customer_notes)");
        
        $statement->bindParam(":campaign_id", $campaign_id);
        $statement->bindParam(":customer_name", $customer_name);
        $statement->bindParam(":customer_phone", $customer_phone);
        $statement->bindParam(":customer_email", $customer_email);
        $statement->bindParam(":customer_notes", $customer_notes);
    
        
        $statement->execute();
    }
    
    public static function getLastWeekCalls(){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT COUNT(*) AS nrOfCalls, call_datetime FROM crmcalls WHERE DATE(call_datetime) BETWEEN date_sub(now(),INTERVAL 1 WEEK) AND now() GROUP BY DATE(call_datetime);");
        $statement->execute();
        
        return $statement->fetchAll();
    }
    
    public static function groupTodaysCalls(){
        $db = DBInit::getInstance();
        
        $statement = $db->prepare("SELECT COUNT(*) AS nrOfCalls, call_subject FROM crmcalls WHERE DATE(call_datetime) = CURDATE() GROUP BY call_subject");
        $statement->execute();
        
        return $statement->fetchAll();
    }
    
    public static function groupTodaysCallsAgent(){
        $db = DBInit::getInstance();
        
        $statement = $db->prepare("SELECT COUNT(*) AS nrOfCalls, employees.employee_name, employees.employee_surname FROM crmcalls INNER JOIN employees ON crmcalls.employee_id = employees.employee_id WHERE DATE(crmcalls.call_datetime) = CURDATE() GROUP BY crmcalls.employee_id");
        $statement->execute();
        
        return $statement->fetchAll();
    }
    
    public static function checkQueueAndExtensionValidity($queue, $extension){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT * FROM users WHERE queue = :queue AND extension = :extension AND user_id != :user_id");
        
        $statement->bindParam(":queue", $queue);
        $statement->bindParam(":extension", $extension);
		$statement->bindParam(":user_id", $_SESSION["id"]);
        
        $statement->execute();
        
        return is_array($statement->fetch());
    }
    
    public static function setupUser($user_id, $queue, $extension){
        $db = DBInit::getInstance();
        $statement = $db->prepare("UPDATE users SET queue = :queue, extension = :extension WHERE user_id = :user_id");
        
        $statement->bindParam(":queue", $queue);
        $statement->bindParam(":extension", $extension);
        $statement->bindParam(":user_id", $user_id);
        
        $statement->execute();
    }
	
	public static function setupUserEmail($user_id, $telephony_emailhost, $telephony_emailport, $telephony_email, $telephony_password, $telephony_ssl, $telephony_certificate){
		$db = DBInit::getInstance();
		$statement = $db->prepare("UPDATE users SET telephony_emailhost = :telephony_emailhost, telephony_emailport = :telephony_emailport, telephony_email = :telephony_email, telephony_password = :telephony_password, telephony_ssl = :telephony_ssl, telephony_certificate = :telephony_certificate WHERE user_id = :user_id");
        
		$statement->bindParam(":telephony_emailhost", $telephony_emailhost);
		$statement->bindParam(":telephony_emailport", $telephony_emailport);
		$statement->bindParam(":telephony_email", $telephony_email);
		$statement->bindParam(":telephony_password", $telephony_password);
		$statement->bindParam(":telephony_ssl", $telephony_ssl);
		$statement->bindParam(":telephony_certificate", $telephony_certificate);
        $statement->bindParam(":user_id", $user_id);
		
		$statement->execute();
	}
	
	public static function logoutTelephonyUser($user_id){
		$db = DBInit::getInstance();
		$statement = $db->prepare("UPDATE users SET queue = 0, extension = 0 WHERE user_id = :user_id");
		
		$statement->bindParam(":user_id", $user_id);
		
		$statement->execute();
	}
	
	public static function getUserSettings($user_id){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("SELECT telephony_emailhost, telephony_emailport, telephony_email, telephony_password, telephony_ssl, telephony_certificate FROM users WHERE user_id = :user_id");
		
		$statement->bindParam(":user_id", $user_id);
		
		$statement->execute();
		
		return $statement->fetch();
	}
    
    public static function insertCall($call_subject, $employee_id, $customer_id, $call_phonenumber, $call_duration, $call_notes){
        $call_source = "Telephone";
        $db = DBInit::getInstance();
        $statement = $db->prepare("INSERT INTO crmcalls (call_subject, employee_id, customer_id, call_phonenumber, call_duration, call_notes, call_source) VALUES (:call_subject, :employee_id, :customer_id, :call_phonenumber, :call_duration, :call_notes, :call_source)");
        $statement->bindParam(":call_subject", $call_subject);
        $statement->bindParam(":employee_id", $employee_id);
        $statement->bindParam(":customer_id", $customer_id);
        $statement->bindParam(":call_phonenumber", $call_phonenumber);
        $statement->bindParam(":call_duration", $call_duration);
        $statement->bindParam(":call_notes", $call_notes);
        $statement->bindParam(":call_source", $call_source);
        
        $statement->execute();
    }
	
	public static function insertOutgoingCall($call_subject, $employee_id, $customer_id, $call_phonenumber, $call_duration, $call_notes, $call_answered){
        $call_source = "Telephone";
		$call_type = 0; //outgoing
        $db = DBInit::getInstance();
        $statement = $db->prepare("INSERT INTO crmcalls (call_subject, employee_id, customer_id, call_phonenumber, call_duration, call_notes, call_type, call_source, call_answered) VALUES (:call_subject, :employee_id, :customer_id, :call_phonenumber, :call_duration, :call_notes, :call_type, :call_source, :call_answered)");
        $statement->bindParam(":call_subject", $call_subject);
        $statement->bindParam(":employee_id", $employee_id);
        $statement->bindParam(":customer_id", $customer_id);
        $statement->bindParam(":call_phonenumber", $call_phonenumber);
        $statement->bindParam(":call_duration", $call_duration);
        $statement->bindParam(":call_notes", $call_notes);
		$statement->bindParam(":call_answered", $call_answered);
		$statement->bindParam(":call_type", $call_type);
        $statement->bindParam(":call_source", $call_source);
        
        $statement->execute();
    }
    
    
    
    public static function editCall($call_id, $call_subject, $customer_id, $call_notes){
        $db = DBInit::getInstance();
        $statement = $db->prepare("UPDATE crmcalls SET call_subject = :call_subject, customer_id = :customer_id, call_notes = :call_notes WHERE call_id = :call_id");
        $statement->bindParam(":call_subject", $call_subject);
        $statement->bindParam(":customer_id", $customer_id);
        $statement->bindParam(":call_notes", $call_notes);
        $statement->bindParam("call_id", $call_id);
        
        $statement->execute();
    }
    
    public static function calltrackCallExists($call_uid){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT * FROM calltrack WHERE custuid = :call_uid");
        $statement->bindParam(":call_uid", $call_uid);
        
        $statement->execute();
        $result = $statement->fetch();
        
        if (is_array($result)){
            if ($result["status"] == "done"){
                return 2;
            }else{
                return 1;
            }
        }else{
            return 0;
        }
    }
    
    public static function addCalltrackCall($call_uid, $call_number, $status){
        $db = DBInit::getInstance();
        $statement = $db->prepare("INSERT INTO calltrack (custuid, dialeduid, status) VALUES (:call_uid, :call_number, :status)");
        $statement->bindParam(":call_uid", $call_uid);
        $statement->bindParam(":call_number", $call_number);
        $statement->bindParam(":status", $status);
        
        $statement->execute();
    }
    
    public static function updateCalltrackCall($call_uid){
        $db = DBInit::getInstance();
        $statement = $db->prepare("UPDATE calltrack SET status = 'done' WHERE custuid = :call_uid");
        $statement->bindParam(":call_uid", $call_uid);
        
        $statement->execute();
    }
    
    public static function getCalls(){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT crmcalls.*, employees.employee_name, employees.employee_surname, customers.* FROM crmcalls LEFT JOIN customers ON crmcalls.customer_id = customers.customer_id INNER JOIN employees ON crmcalls.employee_id = employees.employee_id ORDER BY DATE(crmcalls.call_datetime) DESC;");
        $statement->execute();
        
        return $statement->fetchAll();
    }
    
    public static function getTodaysCalls(){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT crmcalls.*, employees.employee_name, employees.employee_surname, customers.* FROM crmcalls LEFT JOIN customers ON crmcalls.customer_id = customers.customer_id INNER JOIN employees ON crmcalls.employee_id = employees.employee_id WHERE DATE(crmcalls.call_datetime) = CURDATE()");
        $statement->execute();
        
        return $statement->fetchAll();
    }
	
	public static function getEmailID($email_id){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("SELECT * FROM email WHERE email_id = :email_id");
		$statement->bindParam(":email_id", $email_id);
		
		$statement->execute();
		
		return $statement->fetch();
	}
    
    public static function addEmail($message_id, $mailID, $status){
        $db = DBInit::getInstance();
        
        $statement = $db->prepare("INSERT INTO email (message_id, mail_id, status) VALUES (:message_id, :mail_id, :status)");
        $statement->bindParam(":message_id", $message_id);
		$statement->bindParam(":mail_id", $mailID);
        $statement->bindParam(":status", $status);
        
        $statement->execute();
        
        return $db->lastInsertId();
    }
    
    public static function checkEmailExists($message_id){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT email.*, CONCAT(employees.employee_name, ' ', employees.employee_surname) AS employee_namesurname FROM email LEFT JOIN employees ON email.employee_id = employees.employee_id WHERE email.message_id = :message_id");
        $statement->bindParam(":message_id", $message_id);
        $statement->execute();
        
        $result = $statement->fetch();
        return $result;
    }
    
    public static function getEmailByID($email_id){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT email.*, CONCAT(employees.employee_name, ' ', employees.employee_surname) AS employee_namesurname FROM email LEFT JOIN employees ON email.opened_by = employees.employee_id WHERE email.email_id = :email_id");
        $statement->bindParam(":email_id", $email_id);
        $statement->execute();
        
        $result = $statement->fetch();
        return $result;
    }
    
    public static function setEmailStatus($email_id, $notes, $status){
        $db = DBInit::getInstance();
        
        $statement = $db->prepare("UPDATE email SET notes = :notes, status = :status WHERE email_id = :email_id");
        $statement->bindParam(":email_id", $email_id);
        $statement->bindParam(":notes", $notes);
        $statement->bindParam(":status", $status);
        
        $statement->execute();
    }
    
    public static function markEmailAsFinished($email_id, $employee_id, $notes, $status){
        $db = DBInit::getInstance();
        
        $statement = $db->prepare("UPDATE email SET employee_id = :employee_id, notes = :notes, status = :status WHERE email_id = :email_id");
        $statement->bindParam(":email_id", $email_id);
        $statement->bindParam(":employee_id", $employee_id);
        $statement->bindParam(":notes", $notes);
        $statement->bindParam(":status", $status);
        
        $statement->execute();
    }
    
    public static function markEmailAsOpened($email_id, $employee_id, $opened){
		$opened_on = date("Y-m-d H:i:s");
        $db = DBInit::getInstance();
        
        $statement = $db->prepare("UPDATE email SET opened = :opened, opened_by = :opened_by, opened_on = :opened_on WHERE email_id = :email_id");
        
        $statement->bindParam(":email_id", $email_id);
        $statement->bindParam(":opened_by", $employee_id);
        $statement->bindParam(":opened", $opened);
		$statement->bindParam(":opened_on", $opened_on);
        
        $statement->execute();
    }
}

?>