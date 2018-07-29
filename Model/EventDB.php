<?php

require_once "DBInit.php";

class EventDB{
	
	public static function getEventDates($employee_id){
		$db = DBInit::getInstance();
		$statement = $db->prepare("SELECT DISTINCT DATE(event_startdate) AS event_date FROM events WHERE FIND_IN_SET(:employee_id, participants)");
		$statement->bindParam(":employee_id", $employee_id);
		
		$statement->execute();
		
		return $statement->fetchAll();
	}

	public static function getEventFiles($event_id){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("SELECT uploads.*, employees.employee_name, employees.employee_surname FROM uploads INNER JOIN employees ON uploads.employee_id = employees.employee_id WHERE uploads.event_id = :event_id");
		$statement->bindParam(":event_id", $event_id);
		
		$statement->execute();
		
		return $statement->fetchAll();
	}
	
	public static function addEventAction($employee_id, $event_id, $description, $type){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("INSERT INTO event_actions (employee_id, event_id, description, type) VALUES (:employee_id, :event_id, :description, :type)");
		$statement->bindParam(":employee_id", $employee_id);
		$statement->bindParam(":event_id", $event_id);
		$statement->bindParam(":description", $description);
		$statement->bindParam(":type", $type);
		
		$statement->execute();
		
		return $db->lastInsertId();
	}
	
	public static function updateEventStatus($event_id, $status){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("UPDATE events SET status = :status WHERE event_id = :event_id");
		$statement->bindParam(":status", $status);
		$statement->bindParam(":event_id", $event_id);
		
		$statement->execute();
	}
	
	public static function getEventActions($event_id){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("SELECT event_actions.*, employees.employee_name, employees.employee_surname FROM event_actions INNER JOIN employees ON event_actions.employee_id = employees.employee_id WHERE event_id = :event_id");
		$statement->bindParam(":event_id", $event_id);
		
		$statement->execute();
		
		return $statement->fetchAll();
	}
	
	public static function getEventActionByID($action_id){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("SELECT event_actions.*, employees.employee_name, employees.employee_surname FROM event_actions INNER JOIN employees ON event_actions.employee_id = employees.employee_id WHERE action_id = :action_id");
		$statement->bindParam(":action_id", $action_id);
		
		$statement->execute();
		
		return $statement->fetch();
	}
    
    public static function addEvent($event_uid, $event_type, $event_subject, $event_startdate, $event_starttime, $event_enddate, $event_endtime, $event_reminders, $customer_id, $subsidiary_id, $employee_id, $participants, $external_participants,
		$event_description, $event_importance, $event_address, $latitude, $longitude, $last_modified, $event_files){
			
        $db = DBInit::getInstance();
        $statement = $db->prepare("INSERT INTO events (event_uid, event_type, event_subject, event_startdate, event_starttime, event_enddate, event_endtime, event_reminders, customer_id, subsidiary_id, employee_id, participants, external_participants, event_description, event_importance, event_address, latitude, longitude,
        last_modified, event_files) VALUES (:event_uid, :event_type, :event_subject, :event_startdate, :event_starttime, :event_enddate, :event_endtime, :event_reminders, :customer_id, :subsidiary_id, :employee_id, :participants, :external_participants, :event_description, :event_importance, :event_address, :latitude, :longitude, :last_modified, :event_files)");
        
		$statement->bindParam(":event_uid", $event_uid);
		$statement->bindParam(":event_type", $event_type);
        $statement->bindParam(":event_subject", $event_subject);
        $statement->bindParam(":event_startdate", $event_startdate);
        $statement->bindParam(":event_starttime", $event_starttime);
		$statement->bindParam(":event_enddate", $event_enddate);
		$statement->bindParam(":event_endtime", $event_endtime);
        $statement->bindParam(":event_reminders", $event_reminders);
        $statement->bindParam(":customer_id", $customer_id);
		$statement->bindParam(":subsidiary_id", $subsidiary_id);
        $statement->bindParam(":employee_id", $employee_id);
        $statement->bindParam(":participants", $participants);
		$statement->bindParam(":external_participants", $external_participants);
        $statement->bindParam(":event_description", $event_description);
        $statement->bindParam(":event_importance", $event_importance);
        $statement->bindParam(":event_address", $event_address);
        $statement->bindParam(":latitude", $latitude);
        $statement->bindParam(":longitude", $longitude);
		$statement->bindParam(":last_modified", $last_modified);
        $statement->bindParam(":event_files", $event_files);
        
        $statement->execute();
        
        return $db->lastInsertId();
    }
	
	public static function setEventUID($event_id, $event_uid){
		$db = DBInit::getInstance();
		$statement = $db->prepare("UPDATE events SET event_uid = :event_uid WHERE event_id = :event_id");
		
		$statement->bindParam(":event_uid", $event_uid);
		$statement->bindParam(":event_id", $event_id);
		
		$statement->execute();
	}
	
	public static function editGoogleEvent($event_uid, $event_type, $event_subject, $event_startdate, $event_starttime, $event_enddate, $event_endtime, $event_reminders, $participants, $external_participants,
		$event_description, $event_importance, $event_address, $latitude, $longitude, $status, $last_modified, $event_files){
			
        $db = DBInit::getInstance();
        $statement = $db->prepare("UPDATE events SET event_type = :event_type, event_subject = :event_subject, event_startdate = :event_startdate, event_starttime = :event_starttime, event_enddate = :event_enddate, event_endtime = :event_endtime,
		event_reminders = :event_reminders, participants = :participants, external_participants = :external_participants, event_description = :event_description, event_importance = :event_importance, event_address = :event_address, latitude = :latitude,
		longitude = :longitude, status = :status, last_modified = :last_modified, event_files = :event_files WHERE event_uid = :event_uid");
		
		$statement->bindParam(":event_type", $event_type);
		$statement->bindParam(":event_subject", $event_subject);
		$statement->bindParam(":event_startdate", $event_startdate);
		$statement->bindParam(":event_starttime", $event_starttime);
		$statement->bindParam(":event_enddate", $event_enddate);
		$statement->bindParam(":event_endtime", $event_endtime);
		$statement->bindParam(":event_reminders", $event_reminders);
		$statement->bindParam(":participants", $participants);
		$statement->bindParam(":external_participants", $external_participants);
		$statement->bindParam(":event_description", $event_description);
		$statement->bindParam(":event_importance", $event_importance);
		$statement->bindParam(":event_address", $event_address);
		$statement->bindParam(":latitude", $latitude);
		$statement->bindParam(":longitude", $longitude);
		$statement->bindParam(":status", $status);
		$statement->bindParam(":last_modified", $last_modified);
		$statement->bindParam(":event_files", $event_files);
		$statement->bindParam(":event_uid", $event_uid);
		
        $statement->execute();
    }
	
	public static function getAllGoogleEvents($employee_id){
		$db = DBInit::getInstance();
        $statement = $db->prepare("SELECT events.*, employees.employee_name, employees.employee_surname FROM events INNER JOIN employees ON events.employee_id = employees.employee_id WHERE events.employee_id = :employee_id AND events.event_uid != '' ORDER BY DATE(events.event_startdate) DESC");
        $statement->bindParam(":employee_id", $employee_id);
            
        $statement->execute();
        return $statement->fetchAll();
	}
    
    public static function updateEventLocation($event_id, $latitude, $longitude){
        $db = DBInit::getInstance();
        
        $statement = $db->prepare("UPDATE events SET latitude = :latitude, longitude = :longitude WHERE event_id = :event_id");
        
        $statement->bindParam(":latitude", $latitude);
        $statement->bindParam(":longitude", $longitude);
        $statement->bindParam(":event_id", $event_id);
        
        $statement->execute();
    }
    
    public static function googleEventExists($event_uid){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT * FROM events WHERE event_uid = :event_uid");
        $statement->bindParam(":event_uid", $event_uid);
        $statement->execute();

        return $statement->fetch();
    }
	
	public static function externalEventExists($event_uid){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("SELECT * FROM events WHERE event_uid = :event_uid LIMIT 1");
		
		$statement->bindParam(":event_uid", $event_uid);
		$statement->execute();
		
		return $statement->fetch();
	}
	
	public static function updateExternalParticipants($event_id, $external_participants){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("UPDATE events SET external_participants = :external_participants WHERE event_id = :event_id");
		
		$statement->bindParam(":external_participants", $external_participants);
		$statement->bindParam(":event_id", $event_id);
		
		$statement->execute();
	}
    
    public static function editEvent($event_id, $event_uid, $event_type, $event_subject, $event_startdate, $event_starttime, $event_enddate, $event_endtime, $event_reminders, $customer_id, $subsidiary_id, $participants, $external_participants, $event_description, $event_importance, $event_address, $latitude, $longitude, $status, $last_modified, $event_files){
        $db = DBInit::getInstance();
        $statement = $db->prepare("UPDATE events SET event_uid = :event_uid, event_type = :event_type, event_subject = :event_subject, event_startdate = :event_startdate, event_starttime = :event_starttime, event_enddate = :event_enddate, event_endtime = :event_endtime, event_reminders = :event_reminders, customer_id = :customer_id, subsidiary_id = :subsidiary_id, participants = :participants, external_participants = :external_participants,
        event_description = :event_description, event_importance = :event_importance, event_address = :event_address, latitude = :latitude, longitude = :longitude, status = :status, last_modified = :last_modified, event_files = :event_files WHERE event_id = :event_id");
        
		$statement->bindParam(":event_uid", $event_uid);
		$statement->bindParam(":event_type", $event_type);
        $statement->bindParam(":event_subject", $event_subject);
        $statement->bindParam(":event_startdate", $event_startdate);
        $statement->bindParam(":event_starttime", $event_starttime);
		$statement->bindParam(":event_enddate", $event_enddate);
		$statement->bindParam(":event_endtime", $event_endtime);
        $statement->bindParam(":event_reminders", $event_reminders);
        $statement->bindParam(":customer_id", $customer_id);
		$statement->bindParam(":subsidiary_id", $subsidiary_id);
        $statement->bindParam(":participants", $participants);
		$statement->bindParam(":external_participants", $external_participants);
        $statement->bindParam(":event_description", $event_description);
        $statement->bindParam(":event_importance", $event_importance);
        $statement->bindParam(":event_id", $event_id);
        $statement->bindParam(":event_address", $event_address);
        $statement->bindParam(":latitude", $latitude);
        $statement->bindParam(":longitude", $longitude);
        $statement->bindParam(":status", $status);
		$statement->bindParam(":last_modified", $last_modified);
        $statement->bindParam(":event_files", $event_files);

        $statement->execute();
        
        return $db->lastInsertId();
    }
    
    public static function updateEvent($event_id, $event_startdate, $event_starttime, $event_enddate, $event_endtime){
        $db = DBInit::getInstance();
        $statement = $db->prepare("UPDATE events SET event_startdate = :event_startdate, event_starttime = :event_starttime, event_enddate = :event_enddate, event_endtime = :event_endtime WHERE event_id = :event_id");
        
        $statement->bindParam(":event_startdate", $event_startdate);
        $statement->bindParam(":event_starttime", $event_starttime);
		$statement->bindParam(":event_enddate", $event_enddate);
		$statement->bindParam(":event_endtime", $event_endtime);
        $statement->bindParam(":event_id", $event_id);
        
        $statement->execute();
    }
    
    public static function getEvents(){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT events.*, employees.employee_name, employees.employee_surname, customers.customer_id, customers.customer_name, customers.customer_address, customers.customer_phone FROM events LEFT JOIN customers ON customers.customer_id = events.customer_id INNER JOIN employees ON employees.employee_id = events.employee_id WHERE employees.employee_type = 0 OR employees.employee_id = :employee_id");
        $statement->bindParam(":employee_id", $_SESSION["id"]);
        $statement->execute();
        return $statement->fetchAll();
    }
    
    public static function getEventsDate($employee_id, $datetime){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT events.*, employees.employee_name, employees.employee_surname, customers.customer_name, customers.customer_address, customers.customer_phone FROM events INNER JOIN employees ON events.employee_id = employees.employee_id LEFT JOIN customers ON customers.customer_id = events.customer_id WHERE FIND_IN_SET(:employee_id, events.participants) AND DATE(events.event_startdate) = DATE(:datetime)");
        $statement->bindParam(":employee_id", $employee_id);
        $statement->bindParam(":datetime", $datetime);
        
        $statement->execute();
        return $statement->fetchAll();
    }
    
    public static function getEmployeePendingEvents($employee_id){
            $db = DBInit::getInstance();
            $statement = $db->prepare("SELECT * FROM events WHERE FIND_IN_SET(:employee_id, events.participants) AND status < 3 AND DATE(event_startdate) = CURDATE()");
            $statement->bindParam(":employee_id", $employee_id);
            
            $statement->execute();
            return $statement->fetchAll();
    }
    
    public static function getEmployeeEvents($employee_id){
        if ($employee_id != ""){
            $db = DBInit::getInstance();
            $statement = $db->prepare("SELECT events.*, employees.employee_id, employees.employee_name, employees.employee_surname, customers.customer_id, customers.customer_name, customers.customer_address, customers.customer_phone FROM events LEFT JOIN customers ON customers.customer_id = events.customer_id INNER JOIN employees ON events.employee_id = employees.employee_id WHERE FIND_IN_SET(:employee_id, events.participants) ORDER BY DATE(event_startdate) DESC;");
            $statement->bindParam(":employee_id", $employee_id);
            
            $statement->execute();
            return $statement->fetchAll();
        }else{
            $db = DBInit::getInstance();
            $statement = $db->prepare("SELECT events.*, employees.employee_id, employees.employee_name, employees.employee_surname, customers.customer_id, customers.customer_name, customers.customer_address, customers.customer_phone FROM events LEFT JOIN customers ON customers.customer_id = events.customer_id INNER JOIN employees ON events.employee_id = employees.employee_id ORDER BY DATE(event_startdate) DESC;");
            
            $statement->execute();
            return $statement->fetchAll();
        }
    }
    
    public static function getTodaysEvents($employee_id){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT * FROM events WHERE FIND_IN_SET(:employee_id, events.participants) AND DATE(event_startdate) = CURDATE() ORDER BY event_starttime;");
        $statement->bindParam(":employee_id", $employee_id);
        
        $statement->execute();
        return $statement->fetchAll();
    }
    
    public static function getAllTodaysEvents(){
            $db = DBInit::getInstance();
            $statement = $db->prepare("SELECT * FROM events WHERE FIND_IN_SET(:employee_id, events.participants) AND DATE(event_startdate) = CURDATE();");
            $statement->bindParam(":employee_id", $_SESSION["id"]);
            
            $statement->execute();
            return $statement->fetchAll();
    }
    
    public static function getEventsLastWeek(){    
            $db = DBInit::getInstance();
            $statement = $db->prepare("SELECT COUNT(event_id) AS eventcount, DATE(event_startdate) AS date FROM events WHERE DATE(event_startdate) > DATE_SUB(NOW(), INTERVAL 1 WEEK) AND DATE(event_startdate) <= NOW() AND FIND_IN_SET(:employee_id, events.participants) GROUP BY DATE(event_startdate);");
            $statement->bindParam(":employee_id", $_SESSION["id"]);
            
            $statement->execute();
            return $statement->fetchAll();
    }
    
    public static function deleteEvent($event_id){
        $db = DBInit::getInstance();
        $statement = $db->prepare("DELETE FROM events WHERE event_id = :event_id");
        
        $statement->bindParam(":event_id", $event_id);
        
        $statement->execute();
    }
    
    public static function setEventStatus($event_id, $status){
        $db = DBInit::getInstance();
        $statement = $db->prepare("UPDATE events SET status = :status WHERE event_id = :event_id");
        $statement->bindParam(":status", $status);
        $statement->bindParam(":event_id", $event_id);
        
        $statement->execute();
    }
    
    public static function getEventByID($event_id){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT events.*, customers.customer_name FROM events LEFT JOIN customers ON events.customer_id = customers.customer_id WHERE event_id = :event_id");
        $statement->bindParam(":event_id", $event_id);
        $statement->execute();
        
        return $statement->fetch();
    }
    
    public static function getParticipants($employeeString){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT * FROM employees WHERE employee_id IN (" . $employeeString . ")");
        
        $statement->execute();
        
        return $statement->fetchAll();
    }
    
    public static function changeEventParticipants($event_id, $accepted_by, $declined_by){
        $db = DBInit::getInstance();
        $statement = $db->prepare("UPDATE events SET accepted_by = :accepted_by, declined_by = :declined_by WHERE event_id = :event_id;");
        $statement->bindParam(":accepted_by", $accepted_by);
        $statement->bindParam(":declined_by", $declined_by);
        $statement->bindParam(":event_id", $event_id);
        
        $statement->execute();
    }
    
   
    
    
}

?>