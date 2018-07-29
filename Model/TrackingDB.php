<?php

require_once "DBInit.php";

class TrackingDB {
	
	public static function getEventsVisitedBetween($date_from, $date_to){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("SELECT events.*, employees.employee_name, employees.employee_surname, customers.customer_name FROM events INNER JOIN employees ON events.employee_id = employees.employee_id LEFT JOIN customers ON events.customer_id = customers.customer_id WHERE DATE(event_startdate) BETWEEN DATE(:date_from) AND DATE(:date_to)");
		$statement->bindParam(":date_from", $date_from);
		$statement->bindParam(":date_to", $date_to);
		
		$statement->execute();
		
		return $statement->fetchAll();
	}
	
	public static function getUnknownStopsBetween($date_from, $date_to){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("SELECT stops.*, employees.employee_name, employees.employee_surname, customers.customer_name FROM stops INNER JOIN employees ON stops.employee_id = employees.employee_id LEFT JOIN customers ON stops.customer_id = customers.customer_id WHERE DATE(stops.start_time) BETWEEN DATE(:date_from) AND DATE(:date_to)");
		$statement->bindParam(":date_from", $date_from);
		$statement->bindParam(":date_to", $date_to);
		
		$statement->execute();
		
		return $statement->fetchAll();
	}
	
	public static function getTravelOrdersBetween($date_from, $date_to){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("SELECT travelorders.*, employees.*, asset_vehicles.vehicle_registration FROM travelorders INNER JOIN employees ON travelorders.employee_id = employees.employee_id INNER JOIN asset_vehicles ON asset_vehicles.vehicle_id = travelorders.vehicle_id WHERE DATE(travelorders.date_from) BETWEEN DATE(:date_from) AND DATE(:date_to)"); 
		$statement->bindParam(":date_from", $date_from);
		$statement->bindParam(":date_to", $date_to);
		
		$statement->execute();
		
		return $statement->fetchAll();
	}
	
	public static function getAllWorkLocations(){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("SELECT worklocations.*, employees.employee_name, employees.employee_surname, customers.customer_id, customers.customer_name FROM worklocations LEFT JOIN customers ON worklocations.customer_id = customers.customer_id INNER JOIN employees ON worklocations.employee_id = employees.employee_id ORDER BY location_id DESC;");
		$statement->execute();
		
		return $statement->fetchAll();
	}
	
	public static function getNFCTags(){
		$db = DBInit::getInstance();
		if ($_SESSION["admin"] == 1){
			$statement = $db->prepare("SELECT nfc.*, customers.customer_name, employees.employee_name, employees.employee_surname FROM nfc INNER JOIN customers ON nfc.customer_id = customers.customer_id INNER JOIN employees ON nfc.employee_id = employees.employee_id WHERE (employees.employee_type = 0 OR nfc.employee_id = :employee_id)");
			$statement->bindParam(":employee_id", $_SESSION["id"]);
			$statement->execute();
		}else{
			$statement = $db->prepare("SELECT nfc.*, customers.customer_name, employees.employee_name, employees.employee_surname FROM nfc INNER JOIN customers ON nfc.customer_id = customers.customer_id INNER JOIN employees ON nfc.employee_id = employees.employee_id WHERE nfc.employee_id = :employee_id");
			$statement->bindParam(":employee_id", $_SESSION["id"]);
			$statement->execute();
		}
		return $statement->fetchAll();
	}
	
	public static function addNFCTag($tag, $content, $customer_id, $employee_id, $notes){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("INSERT INTO nfc (tag, content, customer_id, employee_id, notes) VALUES (:tag, :content, :customer_id, :employee_id, :notes)");
		
		$statement->bindParam(":tag", $tag);
		$statement->bindParam(":content", $content);
		$statement->bindParam(":customer_id", $customer_id);
		$statement->bindParam(":employee_id", $employee_id);
		$statement->bindParam(":notes", $notes);
		
		$statement->execute();
	}
	
	public static function editNFCTag($nfc_id, $tag, $content, $customer_id, $notes){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("UPDATE nfc SET tag = :tag, content = :content, customer_id = :customer_id, notes = :notes WHERE nfc_id = :nfc_id");
		
		$statement->bindParam(":tag", $tag);
		$statement->bindParam(":content", $content);
		$statement->bindParam(":customer_id", $customer_id);
		$statement->bindParam(":notes", $notes);
		$statement->bindParam(":nfc_id", $nfc_id);
		
		$statement->execute();
	}
	
	public static function deleteNFCTag($nfc_id){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("DELETE FROM nfc WHERE nfc_id = :nfc_id");
		
		$statement->bindParam(":nfc_id", $nfc_id);
		
		$statement->execute();
	}
    
    public static function saveEmployeeElapsedDistance($employee_id, $elapsed_distance){
        $db = DBInit::getInstance();
        $statement = $db->prepare("INSERT INTO tracking_distance (employee_id, elapsed_distance) VALUES (:employee_id, :elapsed_distance)");
        $statement->bindParam(":employee_id", $employee_id);
        $statement->bindParam(":elapsed_distance", $elapsed_distance);
        
        $statement->execute();
    }
    
    public static function getWorkLocations($date_from, $date_to){
        $db = DBInit::getInstance();
		if ($_SESSION["admin"] == 1){ //Admin sees everything for everyone
			$statement = $db->prepare("SELECT worklocations.*, employees.employee_name, employees.employee_surname, customers.customer_id, customers.customer_name FROM worklocations LEFT JOIN customers ON worklocations.customer_id = customers.customer_id INNER JOIN employees ON worklocations.employee_id = employees.employee_id WHERE DATE(date) BETWEEN DATE(:date_from) AND DATE(:date_to) AND (employees.employee_type = 0 OR worklocations.employee_id = :employee_id) ORDER BY location_id DESC;");
			$statement->bindParam(":date_from", $date_from);
			$statement->bindParam(":date_to", $date_to);
			$statement->bindParam(":employee_id", $_SESSION["id"]);
			$statement->execute();
		}else{
			$statement = $db->prepare("SELECT worklocations.*, employees.employee_name, employees.employee_surname, customers.customer_id, customers.customer_name FROM worklocations LEFT JOIN customers ON worklocations.customer_id = customers.customer_id INNER JOIN employees ON worklocations.employee_id = employees.employee_id WHERE DATE(date) BETWEEN DATE(:date_from) AND DATE(:date_to) AND FIND_IN_SET(:employee_id, participants) ORDER BY location_id DESC;");
			$statement->bindParam(":date_from", $date_from);
			$statement->bindParam(":date_to", $date_to);
			$statement->bindParam(":employee_id", $_SESSION["id"]);
			$statement->execute();
		}
        
        return $statement->fetchAll();
    }
	
	public static function getRecurringLocations(){
        $db = DBInit::getInstance();
		if ($_SESSION["admin"] == 1){ //Admin sees everything for everyone
			$statement = $db->prepare("SELECT worklocations.*, employees.employee_name, employees.employee_surname, customers.customer_id, customers.customer_name FROM worklocations LEFT JOIN customers ON worklocations.customer_id = customers.customer_id INNER JOIN employees ON worklocations.employee_id = employees.employee_id WHERE worklocations.recurring = 1 AND (employees.employee_type = 0 OR worklocations.employee_id = :employee_id) ORDER BY location_id DESC;");
			$statement->bindParam(":employee_id", $_SESSION["id"]);
			$statement->execute();	
		}else{
			$statement = $db->prepare("SELECT worklocations.*, employees.employee_name, employees.employee_surname, customers.customer_id, customers.customer_name FROM worklocations LEFT JOIN customers ON worklocations.customer_id = customers.customer_id INNER JOIN employees ON worklocations.employee_id = employees.employee_id WHERE worklocations.recurring = 1 AND FIND_IN_SET(:employee_id, participants) ORDER BY location_id DESC;");
			$statement->bindParam(":employee_id", $_SESSION["id"]);
			$statement->execute();	
		}
        
        return $statement->fetchAll();
    }
    
    public static function addWorkLocation($employee_id, $customer_id, $priority, $participants, $date, $start_time, $end_time, $address, $latitude, $longitude, $recurring, $repeat_on){
        $db = DBInit::getInstance();
        $statement = $db->prepare("INSERT INTO worklocations (employee_id, customer_id, priority, participants, date, start_time, end_time, address, latitude, longitude, recurring, repeat_on) VALUES (:employee_id, :customer_id, :priority, :participants, :date, :start_time, :end_time, :address, :latitude, :longitude, :recurring, :repeat_on)");
        $statement->bindParam(":employee_id", $employee_id);
		$statement->bindParam(":customer_id", $customer_id);
		$statement->bindParam(":priority", $priority);
        $statement->bindParam(":participants", $participants);
        $statement->bindParam(":date", $date);
		$statement->bindParam(":start_time", $start_time);
		$statement->bindParam(":end_time", $end_time);
        $statement->bindParam(":address", $address);
        $statement->bindParam(":latitude", $latitude);
        $statement->bindParam(":longitude", $longitude);
		$statement->bindParam(":recurring", $recurring);
		$statement->bindParam(":repeat_on", $repeat_on);
        
        $statement->execute();
        
        return $db->lastInsertId();
    }
    
    public static function editWorkLocation($location_id, $customer_id, $priority, $participants, $date, $start_time, $end_time, $address, $latitude, $longitude, $recurring, $repeat_on){
        $db = DBInit::getInstance();
        $statement = $db->prepare("UPDATE worklocations SET customer_id = :customer_id, priority = :priority, participants = :participants, date = :date, start_time = :start_time, end_time = :end_time, address = :address, latitude = :latitude, longitude = :longitude, recurring = :recurring, repeat_on = :repeat_on WHERE location_id = :location_id");
        $statement->bindParam(":customer_id", $customer_id);
		$statement->bindParam(":priority", $priority);
        $statement->bindParam(":participants", $participants);
        $statement->bindParam(":date", $date);
		$statement->bindParam(":start_time", $start_time);
		$statement->bindParam(":end_time", $end_time);
        $statement->bindParam(":address", $address);
        $statement->bindParam(":latitude", $latitude);
        $statement->bindParam(":longitude", $longitude);
		$statement->bindParam(":recurring", $recurring);
		$statement->bindParam(":repeat_on", $repeat_on);
        $statement->bindParam(":location_id", $location_id);
        
        $statement->execute();
        
    }
    
    public static function deleteWorkLocation($location_id){
        $db = DBInit::getInstance();
        $statement = $db->prepare("DELETE FROM worklocations WHERE location_id = :location_id");
        $statement->bindParam(":location_id", $location_id);
        
        $statement->execute();
    }
    
    public static function getLogsBetween($date_from, $date_to){
        $db = DBInit::getInstance();
		if ($_SESSION["admin"] == 1){
			$statement = $db->prepare("SELECT trackinglogs.*, employees.employee_name, employees.employee_surname, worklocations.address, worklocations.latitude, worklocations.longitude, worklocations.visited, customers.customer_name FROM trackinglogs INNER JOIN worklocations ON trackinglogs.location_id = worklocations.location_id LEFT JOIN customers ON worklocations.customer_id = customers.customer_id INNER JOIN employees ON trackinglogs.employee_id = employees.employee_id WHERE DATE(trackinglogs.created_on) BETWEEN DATE(:date_from) AND DATE(:date_to) AND (employees.employee_type = 0 OR worklocations.employee_id = :employee_id)");
			$statement->bindParam(":date_from", $date_from);
			$statement->bindParam(":date_to", $date_to);
			$statement->bindParam(":employee_id", $_SESSION["id"]);
			$statement->execute();
		}else{
			$statement = $db->prepare("SELECT trackinglogs.*, employees.employee_name, employees.employee_surname, worklocations.address, worklocations.latitude, worklocations.longitude, worklocations.visited, customers.customer_name FROM trackinglogs INNER JOIN worklocations ON trackinglogs.location_id = worklocations.location_id LEFT JOIN customers ON worklocations.customer_id = customers.customer_id INNER JOIN employees ON trackinglogs.employee_id = employees.employee_id WHERE DATE(trackinglogs.created_on) BETWEEN DATE(:date_from) AND DATE(:date_to) AND trackinglogs.employee_id = :employee_id");
			$statement->bindParam(":date_from", $date_from);
			$statement->bindParam(":date_to", $date_to);
			$statement->bindParam(":employee_id", $_SESSION["id"]);
			$statement->execute();
		}
        
        return $statement->fetchAll();
        
    }
    
    public static function getLocationsBetween($date_from, $date_to){
        $db = DBInit::getInstance();
		if ($_SESSION["admin"] == 1){
			$statement = $db->prepare("SELECT worklocations.*, employees.employee_name, employees.employee_surname, customers.customer_id, customers.customer_name FROM worklocations LEFT JOIN customers ON worklocations.customer_id = customers.customer_id INNER JOIN employees ON employees.employee_id = worklocations.employee_id WHERE (DATE(worklocations.date) BETWEEN DATE(:date_from) AND DATE(:date_to) OR worklocations.recurring = 1) AND (employees.employee_type = 0 OR worklocations.employee_id = :employee_id)");
			$statement->bindParam(":date_from", $date_from);
			$statement->bindParam(":date_to", $date_to);
			$statement->bindParam(":employee_id", $_SESSION["id"]);
			
			$statement->execute();
		}else{
			$statement = $db->prepare("SELECT worklocations.*, employees.employee_name, employees.employee_surname, customers.customer_id, customers.customer_name FROM worklocations LEFT JOIN customers ON worklocations.customer_id = customers.customer_id INNER JOIN employees ON worklocations.employee_id = employees.employee_id WHERE DATE(date) BETWEEN DATE(:date_from) AND DATE(:date_to) AND FIND_IN_SET(:employee_id, participants) ORDER BY location_id DESC;");
			$statement->bindParam(":date_from", $date_from);
			$statement->bindParam(":date_to", $date_to);
			$statement->bindParam(":employee_id", $_SESSION["id"]);
			$statement->execute();
		}
        
        return $statement->fetchAll();
    }
    
    public static function getEmployeeLocationsWeek($employee_id){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT date, COUNT(location_id) AS nrOfLocations FROM worklocations WHERE date BETWEEN date_sub(now(), INTERVAL 1 WEEK) and now() AND FIND_IN_SET(:employee_id, participants) GROUP BY date");
        
        $statement->bindParam(":employee_id", $employee_id);
        
        $statement->execute();
        
        return $statement->fetchAll();
    }
    
    public static function getEmployeeLogDates($employee_id){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT DISTINCT DATE(date) AS date FROM worklocations WHERE FIND_IN_SET(:employee_id, participants)");
        $statement->bindParam(":employee_id", $employee_id);
        $statement->execute();
        
        return $statement->fetchAll();
    }
    
    public static function getWorkLocationByID($location_id){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT * FROM worklocations WHERE location_id = :location_id");
        $statement->bindParam(":location_id", $location_id);
        $statement->execute();
        
        return $statement->fetch();
    }
    
    public static function getEmployeeWorkLocationsDate($employee_id, $date){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT worklocations.*, customers.customer_id, customers.customer_name FROM worklocations LEFT JOIN customers ON worklocations.customer_id = customers.customer_id WHERE FIND_IN_SET(:employee_id, participants)
        AND DATE(worklocations.date) = DATE(:date) ORDER BY location_id DESC;");
        
        $statement->bindParam(":employee_id", $employee_id);
        $statement->bindParam(":date", $date);
        $statement->execute();
        
        return $statement->fetchAll();
    }
}

?>