<?php

require_once("Model/TrackingDB.php");
require_once("Model/CustomerDB.php");
require_once("ViewHelper.php");
require_once("Controller/gcm.php");
require_once("Controller/push.php");

class TrackingController {
	
	public static function getTrackingStats(){
		$data = $_POST;
		$response = array();
		$unknownstops = TrackingDB::getUnknownStopsBetween($data["date_from"], $data["date_to"]);
		$events = TrackingDB::getEventsVisitedBetween($data["date_from"], $data["date_to"]);
		$travelorders = TrackingDB::getTravelOrdersBetween($data["date_from"], $data["date_to"]);
		
		$response["unknownstops"] = $unknownstops;
		$response["events"] = $events;
		$response["travelorders"] = $travelorders;
		
		echo json_encode($response);
	}
	
	public static function getAllWorkLocations(){
		$data = $_POST;
		$locations = TrackingDB::getAllWorkLocations();
		
		echo json_encode($locations);
	}
    
    public static function getWorkLocations(){
        $data = $_POST;
        $locations = TrackingDB::getWorkLocations($data["date_from"], $data["date_to"]);
        
        echo json_encode($locations);
    }
	
	public static function getRecurringLocations(){
		$data = $_POST;
		
		$locations = TrackingDB::getRecurringLocations();
		
		echo json_encode($locations);
	}
	
	public static function getNFCTags(){
		$data = $_POST;
		
		$tags = TrackingDB::getNFCTags();
		
		echo json_encode($tags);
	}
	
	public static function addNFCTag(){
		$data = $_POST;
		
		TrackingDB::addNFCTag($data["tag"], $data["content"], $data["customer_id"], $_SESSION["id"], $data["notes"]);
	}
	
	public static function editNFCTag(){
		$data = $_POST;
		
		TrackingDB::editNFCTag($data["nfc_id"], $data["tag"], $data["content"], $data["customer_id"], $data["notes"]);
	}
	
	public static function deleteNFCTag(){
		$data = $_POST;
		
		TrackingDB::deleteNFCTag($data["nfc_id"]);
	}
    
    public static function addWorkLocation(){
        $data = $_POST;
        $participants = implode(",", $data["participants"]);
		$repeat_on = "";
		
		$location_start_time = date("H:i", strtotime($data["start_time"]));
		$location_end_time = date("H:i", strtotime($data["end_time"]));
		if ($data["recurring"] == 1){
			$date = "";
			$repeat_on = implode(",", $data["repeat_on"]);
		}else{
			$date = date("Y-m-d", strtotime($data["date"]));
		}
		
        $location_id = TrackingDB::addWorkLocation($_SESSION["id"], $data["customer_id"], $data["priority"], $participants, $date, $location_start_time, $location_end_time, $data["address"], $data["latitude"], $data["longitude"], $data["recurring"], $repeat_on);
        
        $isToday = ($date == date("Y-m-d"));
        if ($isToday || $data["recurring"] == 1){
            $customer = CustomerDB::getCustomerByID($data["customer_id"]);
            $employees = EventDB::getParticipants($participants);
            
            $fcm_tokens = array();
            
            foreach($employees as $employee){
                if ($employee["tracking_fcm_token"] != "" && $employee["employee_online"] == 1){
                    array_push($fcm_tokens, $employee["tracking_fcm_token"]);
                } 
            }
            
    		$gcm = new GCM();
            $push = new Push();
    		  
    		$sendingData = array();
    		$sendingData["location_id"] = $location_id;
    		$sendingData["customer_id"] = $data["customer_id"];
    		$sendingData["customer_name"] = $customer["customer_name"];
			$sendingData["customer_phone"] = $customer["customer_phone"];
    		$sendingData["address"] = $data["address"];
    		$sendingData["latitude"] = $data["latitude"];
    		$sendingData["longitude"] = $data["longitude"];
			$sendingData["start_time"] = $location_start_time;
			$sendingData["end_time"] = $location_end_time;
    		$sendingData['sentAt'] = round(microtime(true) * 1000);
            
            $push->setTitle("Add");
            $push->setIsBackground(FALSE);
            $push->setFlag(1);
            $push->setData($sendingData);
            
            $gcm->sendMultiple($fcm_tokens, $push->getPush());
        }
    }
    
    public static function editWorkLocation(){
        $data = $_POST;
        $participants = implode(",", $data["participants"]);
		$repeat_on = "";
		
		$location_start_time = date("H:i", strtotime($data["start_time"]));
		$location_end_time = date("H:i", strtotime($data["end_time"]));
		
		if ($data["recurring"] == 1){
			$date = "";
			$repeat_on = implode(",", $data["repeat_on"]);
		}else{
			$date = date("Y-m-d", strtotime($data["date"]));
		}
		
        TrackingDB::editWorkLocation($data["location_id"], $data["customer_id"], $data["priority"], $participants, $date, $location_start_time, $location_end_time, $data["address"], $data["latitude"], $data["longitude"], $data["recurring"], $repeat_on);
        
        $isToday = ($date == date("Y-m-d"));
        if ($isToday || $data["recurring"] == 1){
            $customer = CustomerDB::getCustomerByID($data["customer_id"]);
            $employees = EventDB::getParticipants($participants);
            
            $fcm_tokens = array();
            
            foreach($employees as $employee){
                if ($employee["tracking_fcm_token"] != "" && $employee["employee_online"] == 1){
                    array_push($fcm_tokens, $employee["tracking_fcm_token"]);
                } 
            }
            
    		$gcm = new GCM();
            $push = new Push();
    		  
    		$sendingData = array();
    		$sendingData["location_id"] = $data["location_id"];
    		$sendingData["customer_id"] = $data["customer_id"];
    		$sendingData["customer_name"] = $customer["customer_name"];
			$sendingData["customer_phone"] = $customer["customer_phone"];
    		$sendingData["address"] = $data["address"];
    		$sendingData["latitude"] = $data["latitude"];
    		$sendingData["longitude"] = $data["longitude"];
			$sendingData["start_time"] = $location_start_time;
			$sendingData["end_time"] = $location_end_time;
    		$sendingData['sentAt'] = round(microtime(true) * 1000);
            
            $push->setTitle("Edit");
            $push->setIsBackground(FALSE);
            $push->setFlag(1);
            $push->setData($sendingData);
            
            $gcm->sendMultiple($fcm_tokens, $push->getPush());
        }

		
    }
    
    public static function deleteWorkLocation(){
        $data = $_POST;
        $worklocation = TrackingDB::getWorkLocationByID($data["location_id"]);
        TrackingDB::deleteWorkLocation($data["location_id"]);
        
        $isToday = ($worklocation["date"] == date("Y-m-d"));
        if ($isToday || $worklocation["recurring"] == 1){
            $employees = EventDB::getParticipants($worklocation["participants"]);
            
            $fcm_tokens = array();
            
            foreach($employees as $employee){
                if ($employee["tracking_fcm_token"] != "" && $employee["employee_online"] == 1){
                    array_push($fcm_tokens, $employee["tracking_fcm_token"]);
                } 
            }
            
    		$gcm = new GCM();
            $push = new Push();
    		  
    		$sendingData = array();
    		$sendingData["location_id"] = $data["location_id"];
    		$sendingData['sentAt'] = round(microtime(true) * 1000);
            
            $push->setTitle("Delete");
            $push->setIsBackground(FALSE);
            $push->setFlag(1);
            $push->setData($sendingData);
            
            $gcm->sendMultiple($fcm_tokens, $push->getPush());
        }
    }
    
    public static function getEmployeeLogs(){
        $data = $_POST;
        $response = array();
        $logs = TrackingDB::getLogsBetween($data["date_from"], $data["date_to"]);
        $worklocations = TrackingDB::getLocationsBetween($data["date_from"], $data["date_to"]);
        $response["logs"] = $logs;
        $response["locations"] = $worklocations;
        echo json_encode($response);
    }
}

?>