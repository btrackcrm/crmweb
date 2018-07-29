<?php

require_once("Model/TravelOrderDB.php");
require_once("Model/GeneralDB.php");
require_once("Model/UserDB.php");
require_once("ViewHelper.php");


class TravelOrderController {
    
    public static function uploadTravelOrderFile(){
        $response = array();
        $target_dir = "Uploads/TravelOrderFiles/";
  		$target_file = $target_dir . basename($_FILES["file"]["name"]);
        $uploadOk = 1;
        
        // Check if file already exist
        // Check file size
        if ($_FILES["file"]["size"] > 500000) {
            $uploadOk = 0;
        }
        
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $response["error"] = true;
            echo json_encode($response);
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                $response["error"] = false;
                $response["filename"] = $_FILES["file"]["name"];
                echo json_encode($response);
            } else {
                $response["error"] = true;
                echo json_encode($response);
            }
        }
    }

    public static function getTravelOrderStats(){
        $data = $_POST;
        $response = array();
        
        $events = TravelOrderDB::getTravelOrderEvents($data["employee_id"], $data["date_from"], $data["date_to"]);
        $tracking_distances = TravelOrderDB::getTravelOrderDistances($data["employee_id"], $data["date_from"], $data["date_to"]);
        $logs = TravelOrderDB::getEmployeeLogs($data["employee_id"], $data["date_from"], $data["date_to"]);
        $todays_distance = 0;
        if ($data["date_to"] == date("Y-m-d")){
            $employee = UserDB::getEmployeeByID($data["employee_id"]);
            $todays_distance = $employee["distance"];
        }
        
        $response["events"] = $events;
        $response["distances"] = $tracking_distances;
        $response["logs"] = $logs;
        $response["todays_distance"] = $todays_distance;
        
        echo json_encode($response);
        
    }
    
    public static function getTravelOrders(){
        $travelorders = TravelOrderDB::getTravelOrders();
        echo json_encode($travelorders);
    }
	
	public static function getEmployeeTravelOrders(){
		$data = $_POST;
		$travelorders = TravelOrderDB::getEmployeeTravelOrders($data["employee_id"]);
		echo json_encode($travelorders);
	}
    
    public static function getTripOrders(){
        $triporders = TravelOrderDB::getTripOrders();
        
        echo json_encode($triporders);
    }
    
    public static function addTravelOrder(){
        $data = $_POST;
        $last_order = TravelOrderDB::getLastTravelOrder();
        $last_id = $last_order["travelorder_id"];
        $settings = GeneralDB::getSettings();
        $travelorder_number = $settings["travelorder_prefix"] . "-" . (intval($last_id) + 1);
        TravelOrderDB::addTravelOrder($travelorder_number, $data["employee_id"], $data["vehicle_id"], $data["date_from"], $data["date_to"]);
    }
    
    public static function editTravelOrder(){
        $data = $_POST;
        TravelOrderDB::editTravelOrder($data["travelorder_id"], $data["employee_id"], $data["registration_nr"], $data["date"]);
    }
    
    public static function generateTravelOrder(){
        $data = $_POST;
        $fileString = implode(";", $data["files"]);
        TravelOrderDB::generateTravelOrder($data["travelorder_id"], $data["date_from"], $data["date_to"], $data["elapsed_distance"], $data["elapsed_time"], $data["cost"], $data["foodcost"], $data["additionalfees"], $data["additionaldescription"], $data["events"], $fileString);
    }
    
    public static function deleteTravelOrder(){
        $data = $_POST;
        TravelOrderDB::deleteTravelOrder($data["travelorder_id"]);
    }
    
    public static function getTravelOrdersEmployeeDate(){
        $data = $_POST;
        $travelorders = TravelOrderDB::getTravelOrdersEmployeeDate($data["employee_id"], $data["datetime"]);
        echo json_encode($travelorders);
    }
    
    public static function getUniqueTravelOrderDates(){
        $data = $_POST;
        $dates = TravelOrderDB::getUniqueTravelOrderDates($data["employee_id"]);
        echo json_encode($dates);
    }
    
    public static function displayTravelOrderDetails(){
        $data = $_POST;
        $travelorder_id = $_GET['travelorder_id'];
        $travelorder = TravelOrderDB::getTravelOrderByID($travelorder_id);
        $settings = GeneralDB::getSettings();
        ViewHelper::render("View/travelorderdetails.php", ["travelorder" => $travelorder, "settings" => $settings]);
    }
    
    public static function displayTripOrderDetails(){
        $data = $_POST;
        $trip_id = $_GET['trip_id'];
        $triporder = TravelOrderDB::getTripOrderByID($trip_id);
        $settings = GeneralDB::getSettings();
        ViewHelper::render("View/triporderdetails.php", ["triporder" => $triporder, "settings" => $settings]);
    }
    
}

?>