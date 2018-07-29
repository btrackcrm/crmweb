<?php

require_once "DBInit.php";

class TravelOrderDB {
	
	public static function getEmployeeTravelOrders($employee_id){
		$db = DBInit::getInstance();
        $statement = $db->prepare("SELECT travelorders.*, employees.*, asset_vehicles.vehicle_brand, asset_vehicles.vehicle_model, asset_vehicles.vehicle_registration FROM travelorders INNER JOIN employees ON travelorders.employee_id = employees.employee_id INNER JOIN asset_vehicles ON asset_vehicles.vehicle_id = travelorders.vehicle_id WHERE travelorders.employee_id = :employee_id");
        $statement->bindParam(":employee_id", $employee_id);
		$statement->execute();
        
        return $statement->fetchAll();
	}
	
    public static function getTravelOrders(){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT travelorders.*, employees.*, asset_vehicles.vehicle_registration FROM travelorders INNER JOIN employees ON travelorders.employee_id = employees.employee_id INNER JOIN asset_vehicles ON asset_vehicles.vehicle_id = travelorders.vehicle_id");
        $statement->execute();
        
        return $statement->fetchAll();
    }
    
    public static function getTravelOrderEvents($employee_id, $date_from, $date_to){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT events.*, customers.customer_name FROM events LEFT JOIN customers ON events.customer_id = customers.customer_id WHERE DATE(events.event_startdate) BETWEEN DATE(:date_from) AND DATE(:date_to) AND events.employee_id = :employee_id");
        $statement->bindParam(":employee_id", $employee_id);
        $statement->bindParam(":date_from", $date_from);
        $statement->bindParam(":date_to", $date_to);
        
        $statement->execute();
        return $statement->fetchAll();
    }
    
    public static function getTravelOrderDistances($employee_id, $date_from, $date_to){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT * FROM tracking_distance WHERE DATE(date) BETWEEN DATE(:date_from) AND DATE(:date_to) AND employee_id = :employee_id");
        $statement->bindParam(":employee_id", $employee_id);
        $statement->bindParam(":date_from", $date_from);
        $statement->bindParam(":date_to", $date_to);
        
        $statement->execute();
        return $statement->fetchAll();
    }
    
    public static function getEmployeeLogs($employee_id, $date_from, $date_to){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT * FROM locationlogs WHERE DATE(datetime) BETWEEN DATE(:date_from) AND DATE(:date_to) AND employee_id = :employee_id");
        $statement->bindParam(":employee_id", $employee_id);
        $statement->bindParam(":date_from", $date_from);
        $statement->bindParam(":date_to", $date_to);
        
        $statement->execute();
        return $statement->fetchAll();
    }
    
    public static function getTravelOrderByID($travelorder_id){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT travelorders.*, employees.*, asset_vehicles.vehicle_registration, asset_vehicles.vehicle_brand, asset_vehicles.vehicle_model FROM travelorders INNER JOIN employees ON travelorders.employee_id = employees.employee_id INNER JOIN asset_vehicles ON asset_vehicles.vehicle_id = travelorders.vehicle_id WHERE travelorder_id = :travelorder_id");
        $statement->bindParam(":travelorder_id", $travelorder_id);
        
        $statement->execute();
        return $statement->fetch();
    }
    
    public static function getLastTravelOrder(){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT * FROM travelorders ORDER BY travelorder_id DESC LIMIT 1;");
        
        $statement->execute();
        return $statement->fetch();
    }
    
    public static function addTravelOrder($travelorder_number, $employee_id, $vehicle_id, $date_from, $time_from, $date_to, $time_to){
        $db = DBInit::getInstance();
        $statement = $db->prepare("INSERT INTO travelorders (travelorder_number, employee_id, vehicle_id, date_from, time_from, date_to, time_to) VALUES (:travelorder_number, :employee_id, :vehicle_id, :date_from, :time_from, :date_to, :time_to)");
        
        $statement->bindParam(":travelorder_number", $travelorder_number);
        $statement->bindParam(":employee_id", $employee_id);
        $statement->bindParam(":vehicle_id", $vehicle_id);
        $statement->bindParam(":date_from", $date_from);
        $statement->bindParam(":time_from", $time_from);
        $statement->bindParam(":date_to", $date_to);
        $statement->bindParam(":time_to", $time_to);
        
        $statement->execute();
        
        return $db->lastInsertId();
    }
    
    public static function setTravelOrderTripID($travelorder_id, $trip_id){
        $db = DBInit::getInstance();
        $statement = $db->prepare("UPDATE travelorders SET trip_id = :trip_id WHERE travelorder_id = :travelorder_id");
        
        $statement->bindParam(":trip_id", $trip_id);
        $statement->bindParam(":travelorder_id", $travelorder_id);
        
        $statement->execute();
    }
    
    public static function getTripOrders(){
        $db = DBInit::getInstance();
        
        $statement = $db->prepare("SELECT triporders.*, employees.employee_name, employees.employee_surname, asset_vehicles.vehicle_brand, asset_vehicles.vehicle_model, asset_vehicles.vehicle_registration, vehicle_reservations.date_from, vehicle_reservations.time_from, vehicle_reservations.date_to, vehicle_reservations.time_to FROM triporders INNER JOIN employees ON triporders.employee_id = employees.employee_id INNER JOIN vehicle_reservations ON vehicle_reservations.reservation_id = triporders.reservation_id INNER JOIN asset_vehicles ON triporders.vehicle_id = asset_vehicles.vehicle_id");
        
        $statement->execute();
        
        return $statement->fetchAll();
    }
    
    public static function getTripOrderByID($trip_id){
        $db = DBInit::getInstance();
        
        $statement = $db->prepare("SELECT triporders.*, employees.employee_name, employees.employee_surname, employees.employee_residence, employees.employee_position, asset_vehicles.vehicle_brand, asset_vehicles.vehicle_model, asset_vehicles.vehicle_registration, vehicle_reservations.date_from, vehicle_reservations.time_from, vehicle_reservations.date_to, vehicle_reservations.time_to FROM triporders INNER JOIN employees ON triporders.employee_id = employees.employee_id INNER JOIN vehicle_reservations ON vehicle_reservations.reservation_id = triporders.reservation_id INNER JOIN asset_vehicles ON triporders.vehicle_id = asset_vehicles.vehicle_id WHERE trip_id = :trip_id");
        $statement->bindParam(":trip_id", $trip_id);
        
        $statement->execute();
        
        return $statement->fetch();
    }
    
    public static function addTripOrder($employee_id, $vehicle_id, $reservation_id, $travelorder_id, $trip_description){
        $db = DBInit::getInstance();
        $statement = $db->prepare("INSERT INTO triporders (employee_id, vehicle_id, reservation_id, travelorder_id, trip_description) VALUES (:employee_id, :vehicle_id, :reservation_id, :travelorder_id, :trip_description)");
        
        $statement->bindParam(":employee_id", $employee_id);
        $statement->bindParam(":vehicle_id", $vehicle_id);
        $statement->bindParam(":reservation_id", $reservation_id);
        $statement->bindParam(":travelorder_id", $travelorder_id);
        $statement->bindParam(":trip_description", $trip_description);
        
        $statement->execute();
        
        return $db->lastInsertId();
    }
    
    public static function editTravelOrder($travelorder_id, $employee_id, $vehicle_id, $date_from, $date_to){
        $db = DBInit::getInstance();
        $statement = $db->prepare("UPDATE travelorders SET employee_id = :employee_id, vehicle_id = :vehicle_id, date:from = :date_from, date_to = :date_to WHERE travelorder_id = :travelorder_id");
        
        $statement->bindParam(":employee_id", $employee_id);
        $statement->bindParam(":vehicle_id", $vehicle_id);
        $statement->bindParam(":date_from", $date_from);
        $statement->bindParam(":date_to", $date_to);
        $statement->bindParam(":travelorder_id", $travelorder_id);

        $statement->execute();
    }
    
    public static function generateTravelOrder($travelorder_id, $date_from, $date_to, $elapsed_distance, $elapsed_time, $cost, $food_cost, $additional_fees, $additional_description, $events, $files){
        $db = DBInit::getInstance();
        $statement = $db->prepare("UPDATE travelorders SET date_from = :date_from, date_to = :date_to, elapsed_distance = :elapsed_distance, elapsed_time = :elapsed_time, cost = :cost, food_cost = :food_cost, additional_fees = :additional_fees, additional_description = :additional_description, events = :events, files = :files, status = 1 WHERE travelorder_id = :travelorder_id");
        
        $statement->bindParam(":date_from", $date_from);
        $statement->bindParam(":date_to", $date_to);
        $statement->bindParam(":elapsed_distance", $elapsed_distance);
        $statement->bindParam(":elapsed_time", $elapsed_time);
        $statement->bindParam(":cost", $cost);
        $statement->bindParam(":food_cost", $food_cost);
        $statement->bindParam(":additional_fees", $additional_fees);
        $statement->bindParam(":additional_description", $additional_description);
        $statement->bindParam(":events", $events);
        $statement->bindParam(":files", $files);
        $statement->bindParam(":travelorder_id", $travelorder_id);
        

        $statement->execute();
    }
    
    public static function deleteTravelOrder($travelorder_id){
        $db = DBInit::getInstance();
        $statement = $db->prepare("DELETE FROM travelorders WHERE travelorder_id = :travelorder_id");
        $statement->bindParam(":travelorder_id", $travelorder_id);

        $statement->execute();
    }
    
    public static function getTravelOrdersEmployeeDate($employee_id, $datetime){
        if ($employee_id != ""){
            $db = DBInit::getInstance();
            $statement = $db->prepare("SELECT travelorders.*, employees.*, asset_vehicles.vehicle_registration FROM travelorders INNER JOIN employees ON travelorders.employee_id = employees.employee_id INNER JOIN asset_vehicles ON asset_vehicles.vehicle_id = travelorders.vehicle_id WHERE travelorders.employee_id = :employee_id AND DATE(travelorders.date_from) = DATE(:datetime)");
            $statement->bindParam(":employee_id", $employee_id);
            $statement->bindParam(":datetime", $datetime);
            
            $statement->execute();
            
            return $statement->fetchAll();
        }else{
            $db = DBInit::getInstance();
            $statement = $db->prepare("SELECT travelorders.*, employees.*, asset_vehicles.vehicle_registration FROM travelorders INNER JOIN employees ON travelorders.employee_id = employees.employee_id INNER JOIN asset_vehicles ON asset_vehicles.vehicle_id = travelorders.vehicle_id WHERE DATE(travelorders.date_from) = DATE(:datetime)");
            $statement->bindParam(":datetime", $datetime);
            
            $statement->execute();
            
            return $statement->fetchAll();
        }
        
    }
    
    public static function getUniqueTravelOrderDates($employee_id){
        if ($employee_id == ""){
            $db = DBInit::getInstance();
            $statement = $db->prepare("SELECT DISTINCT DATE(date_format(date_from, '%Y-%m-%d')) AS datetime FROM travelorders");
            $statement->execute();
            
            return $statement->fetchAll();
        }else{
            $db = DBInit::getInstance();
            $statement = $db->prepare("SELECT DISTINCT DATE(date_format(date_from, '%Y-%m-%d')) AS datetime FROM travelorders WHERE employee_id = :employee_id");
            $statement->bindParam(":employee_id", $employee_id);
            $statement->execute();
            
            return $statement->fetchAll();
        }
    }
}

?>