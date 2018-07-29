<?php

require_once("DBInit.php");

class AssetDB{
    
    //functions for vehicles
	
	public static function deleteVehicleReservation($reservation_id){
		$db = DBInit::getInstance();
		$statement = $db->prepare("DELETE FROM vehicle_reservations WHERE reservation_id = :reservation_id");
		$statement->bindParam(":reservation_id", $reservation_id);
		
		$statement->execute();
	}
	
	public static function deleteEquipmentReservation($reservation_id){
		$db = DBInit::getInstance();
		$statement = $db->prepare("DELETE FROM equipment_reservations WHERE reservation_id = :reservation_id");
		$statement->bindParam(":reservation_id", $reservation_id);
		
		$statement->execute();
	}
	
	public static function deletePlaceReservation($reservation_id){
		$db = DBInit::getInstance();
		$statement = $db->prepare("DELETE FROM place_reservations WHERE reservation_id = :reservation_id");
		$statement->bindParam(":reservation_id", $reservation_id);
		
		$statement->execute();
	}
	
	public static function deleteOtherReservation($reservation_id){
		$db = DBInit::getInstance();
		$statement = $db->prepare("DELETE FROM otherasset_reservations WHERE reservation_id = :reservation_id");
		$statement->bindParam(":reservation_id", $reservation_id);
		
		$statement->execute();
	}
    
    public static function getVehicleReservations(){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT vehicle_reservations.*, employees.employee_name, employees.employee_surname FROM vehicle_reservations INNER JOIN employees ON vehicle_reservations.employee_id = employees.employee_id");
        
        $statement->execute();
        return $statement->fetchAll();
    }
    
    public static function getActiveVehicleReservations(){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT vehicle_reservations.*, employees.employee_name, employees.employee_surname, asset_vehicles.vehicle_brand, asset_vehicles.vehicle_model, asset_vehicles.vehicle_registration FROM vehicle_reservations INNER JOIN asset_vehicles ON vehicle_reservations.vehicle_id = asset_vehicles.vehicle_id INNER JOIN employees ON vehicle_reservations.employee_id = employees.employee_id");
        $statement->execute();
        return $statement->fetchAll();
    }
    
    public static function getActiveEquipmentReservations(){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT equipment_reservations.*, employees.employee_name, employees.employee_surname, asset_equipment.equipment_name FROM equipment_reservations INNER JOIN asset_equipment ON equipment_reservations.equipment_id = asset_equipment.equipment_id INNER JOIN employees ON equipment_reservations.employee_id = employees.employee_id");
        $statement->execute();
        return $statement->fetchAll();
    }
    
    public static function getActivePlacesReservations(){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT place_reservations.*, employees.employee_name, employees.employee_surname, asset_place.place_name FROM place_reservations INNER JOIN asset_place ON place_reservations.place_id = asset_place.place_id INNER JOIN employees ON place_reservations.employee_id = employees.employee_id");
        $statement->execute();
        return $statement->fetchAll();
    }
    
    public static function getActiveOtherAssetReservations(){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT otherasset_reservations.*, employees.employee_name, employees.employee_surname, asset_other.asset_name FROM otherasset_reservations INNER JOIN asset_other ON otherasset_reservations.asset_id = asset_other.asset_id INNER JOIN employees ON otherasset_reservations.employee_id = employees.employee_id");
        $statement->execute();
        return $statement->fetchAll();
    }
    
    public static function getReservationByID($reservation_id){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT * FROM vehicle_reservations WHERE reservation_id = :reservation_id");
        
        $statement->bindParam(":reservation_id", $reservation_id);
        
        $statement->execute();
        
        return $statement->fetch();
    }
    
    public static function deleteReservation($reservation_id){
        $db = DBInit::getInstance();
        $statement = $db->prepare("DELETE FROM vehicle_reservations WHERE reservation_id = :reservation_id");
        
        $statement->bindParam(":reservation_id", $reservation_id);
        
        $statement->execute();
    }
    
    public static function setReservationStatus($reservation_id, $status){
        $db = DBInit::getInstance();
        
        $statement = $db->prepare("UPDATE vehicle_reservations SET reservation_status = :status WHERE reservation_id = :reservation_id");
        
        $statement->bindParam(":status", $status);
        $statement->bindParam(":reservation_id", $reservation_id);
        
        $statement->execute();
    }
    
    public static function getVehicleActiveReservations($vehicle_id){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT * FROM vehicle_reservations WHERE DATE(date_to) >= CURDATE() AND vehicle_id = :vehicle_id");
        $statement->bindParam(":vehicle_id", $vehicle_id);
        $statement->execute();
        return $statement->fetchAll();
    }
    
    public static function getEquipmentActiveReservations($equipment_id){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT * FROM equipment_reservations WHERE DATE(date_to) >= CURDATE() AND equipment_id = :equipment_id");
        $statement->bindParam(":equipment_id", $equipment_id);
        $statement->execute();
        return $statement->fetchAll();
    }
    
    public static function getPlaceActiveReservations($place_id){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT * FROM place_reservations WHERE DATE(date_to) >= CURDATE() AND place_id = :place_id");
        $statement->bindParam(":place_id", $place_id);
        $statement->execute();
        return $statement->fetchAll();
    }
    
    public static function getOtherAssetActiveReservations($place_id){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT * FROM otherasset_reservations WHERE DATE(date_to) >= CURDATE() AND asset_id = :asset_id");
        $statement->bindParam(":asset_id", $asset_id);
        $statement->execute();
        return $statement->fetchAll();
    }
    
    public static function getVehicles(){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT asset_vehicles.*, employees.employee_name, employees.employee_surname FROM asset_vehicles LEFT JOIN employees ON asset_vehicles.owner_id = employees.employee_id");
        $statement->execute();
        return $statement->fetchAll();
    }
    
    public static function getVehicleByID($vehicle_id){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT * FROM asset_vehicles WHERE vehicle_id = :vehicle_id");
        $statement->bindParam(":vehicle_id", $vehicle_id);
        
        $statement->execute();
        return $statement->fetch();
    }
    
    public static function addVehicle($vehicle_type, $fuel_type, $owner_id, $vehicle_vin, $vehicle_year, $vehicle_mileage, $vehicle_brand, $vehicle_model, $vehicle_registration,
                            $vehicle_seats, $vehicle_vignette, $permanent_reservation, $vehicle_insurancedate, $vehicle_registrationdate, $vehicle_servicedate){
        $db = DBInit::getInstance();
        $statement = $db->prepare("INSERT INTO asset_vehicles (vehicle_type, fuel_type, owner_id, vehicle_vin, vehicle_year, vehicle_mileage, vehicle_brand, vehicle_model, vehicle_registration, vehicle_seats, vehicle_vignette, permanent_reservation, vehicle_insurancedate, vehicle_registrationdate, vehicle_servicedate)
                                VALUES (:vehicle_type, :fuel_type, :owner_id, :vehicle_vin, :vehicle_year, :vehicle_mileage, :vehicle_brand, :vehicle_model, :vehicle_registration, :vehicle_seats, :vehicle_vignette, :permanent_reservation, :vehicle_insurancedate, :vehicle_registrationdate, :vehicle_servicedate)");
        
        $statement->bindParam(":vehicle_type", $vehicle_type);
        $statement->bindParam(":fuel_type", $fuel_type);
        $statement->bindParam(":owner_id", $owner_id);
        $statement->bindParam(":vehicle_vin", $vehicle_vin);
        $statement->bindParam(":vehicle_year", $vehicle_year);
        $statement->bindParam(":vehicle_mileage", $vehicle_mileage);
        $statement->bindParam(":vehicle_brand", $vehicle_brand);
        $statement->bindParam(":vehicle_model", $vehicle_model);
        $statement->bindParam(":vehicle_registration", $vehicle_registration);
        $statement->bindParam(":vehicle_seats", $vehicle_seats);
        $statement->bindParam(":vehicle_vignette", $vehicle_vignette);
        $statement->bindParam(":permanent_reservation", $permanent_reservation);
        $statement->bindParam(":vehicle_insurancedate", $vehicle_insurancedate);
        $statement->bindParam(":vehicle_registrationdate", $vehicle_registrationdate);
        $statement->bindParam(":vehicle_servicedate", $vehicle_servicedate);
        
        $statement->execute();
    }
    
    public static function editVehicle($vehicle_id, $vehicle_type, $fuel_type, $owner_id, $vehicle_vin, $vehicle_year, $vehicle_mileage, $vehicle_brand, $vehicle_model, $vehicle_registration,
                            $vehicle_seats, $vehicle_vignette, $permanent_reservation, $vehicle_insurancedate, $vehicle_registrationdate, $vehicle_servicedate){
        $db = DBInit::getInstance();
        $statement = $db->prepare("UPDATE asset_vehicles SET vehicle_type = :vehicle_type, fuel_type = :fuel_type, owner_id = :owner_id, vehicle_vin = :vehicle_vin, vehicle_year = :vehicle_year, vehicle_mileage = :vehicle_mileage, 
        vehicle_brand = :vehicle_brand, vehicle_model = :vehicle_model, vehicle_registration = :vehicle_registration, vehicle_seats = :vehicle_seats, vehicle_vignette = :vehicle_vignette, permanent_reservation = :permanent_reservation, vehicle_insurancedate = :vehicle_insurancedate,
        vehicle_registrationdate = :vehicle_registrationdate, vehicle_servicedate = :vehicle_servicedate WHERE vehicle_id = :vehicle_id");
        
        $statement->bindParam(":vehicle_type", $vehicle_type);
        $statement->bindParam(":fuel_type", $fuel_type);
        $statement->bindParam(":owner_id", $owner_id);
        $statement->bindParam(":vehicle_vin", $vehicle_vin);
        $statement->bindParam(":vehicle_year", $vehicle_year);
        $statement->bindParam(":vehicle_mileage", $vehicle_mileage);
        $statement->bindParam(":vehicle_brand", $vehicle_brand);
        $statement->bindParam(":vehicle_model", $vehicle_model);
        $statement->bindParam(":vehicle_registration", $vehicle_registration);
        $statement->bindParam(":vehicle_seats", $vehicle_seats);
        $statement->bindParam(":vehicle_vignette", $vehicle_vignette);
        $statement->bindParam(":permanent_reservation", $permanent_reservation);
        $statement->bindParam(":vehicle_insurancedate", $vehicle_insurancedate);
        $statement->bindParam(":vehicle_registrationdate", $vehicle_registrationdate);
        $statement->bindParam(":vehicle_servicedate", $vehicle_servicedate);
        $statement->bindParam(":vehicle_id", $vehicle_id);
        
        $statement->execute();
    }
    
    public static function deleteVehicle($vehicle_id){
        $db = DBInit::getInstance();
        $statement = $db->prepare("DELETE FROM asset_vehicles WHERE vehicle_id = :vehicle_id");
        $statement->bindParam(":vehicle_id", $vehicle_id);
        
        $statement->execute();
    }
    
    public static function makeVehicleReservation($employee_id, $vehicle_id, $date_from, $time_from, $date_to, $time_to, $reservation_status){
        $db = DBInit::getInstance();
        $statement = $db->prepare("INSERT INTO vehicle_reservations (employee_id, vehicle_id, date_from, time_from, date_to, time_to, reservation_status) VALUES (:employee_id, :vehicle_id, :date_from, :time_from, :date_to, :time_to, :reservation_status)");
        $statement->bindParam(":employee_id", $employee_id);
        $statement->bindParam(":vehicle_id", $vehicle_id);
        $statement->bindParam(":date_from", $date_from);
        $statement->bindParam(":time_from", $time_from);
        $statement->bindParam(":date_to", $date_to);
        $statement->bindParam(":time_to", $time_to);
        $statement->bindParam(":reservation_status", $reservation_status);
        
        $statement->execute();
        
        return $db->lastInsertId();
    }
    
    //end of functions for vehicles
    
    //functions for equipment
    
    public static function getEquipment(){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT asset_equipment.*, employees.employee_name, employees.employee_surname FROM asset_equipment LEFT JOIN employees ON asset_equipment.employee_id = employees.employee_id");
        $statement->execute();
        return $statement->fetchAll();
    }
    
    public static function addEquipment($equipment_name, $equipment_code, $equipment_location, $latitude, $longitude, $equipment_description, $equipment_category, $contact_name, $contact_surname, $contact_phone){
        $db = DBInit::getInstance();
        $statement = $db->prepare("INSERT INTO asset_equipment (equipment_name, equipment_code, equipment_location, latitude, longitude, equipment_description, equipment_category, contact_name, contact_surname, contact_phone) VALUES (:equipment_name, :equipment_code, :equipment_location, :latitude, :longitude, :equipment_description, :equipment_category, :contact_name, :contact_surname, :contact_phone)");
        $statement->bindParam(":equipment_name", $equipment_name);
        $statement->bindParam(":equipment_code", $equipment_code);
		$statement->bindParam(":equipment_location", $equipment_location);
		$statement->bindParam(":latitude", $latitude);
		$statement->bindParam(":longitude", $longitude);
        $statement->bindParam(":equipment_description", $equipment_description);
        $statement->bindParam(":equipment_category", $equipment_category);
		$statement->bindParam(":contact_name", $contact_name);
		$statement->bindParam(":contact_surname", $contact_surname);
		$statement->bindParam(":contact_phone", $contact_phone);
        
        $statement->execute();
    }
    
    public static function editEquipment($equipment_id, $equipment_name, $equipment_code, $equipment_location, $latitude, $longitude, $equipment_description, $equipment_category, $contact_name, $contact_surname, $contact_phone){
        $db = DBInit::getInstance();
        $statement = $db->prepare("UPDATE asset_equipment SET equipment_name = :equipment_name, equipment_code = :equipment_code, equipment_location = :equipment_location, latitude = :latitude, longitude = :longitude, equipment_description = :equipment_description, equipment_category = :equipment_category, contact_name = :contact_name, contact_surname = :contact_surname, contact_phone = :contact_phone WHERE equipment_id = :equipment_id");
        $statement->bindParam(":equipment_name", $equipment_name);
        $statement->bindParam(":equipment_code", $equipment_code);
		$statement->bindParam(":equipment_location", $equipment_location);
		$statement->bindParam(":latitude", $latitude);
		$statement->bindParam(":longitude", $longitude);
        $statement->bindParam(":equipment_description", $equipment_description);
        $statement->bindParam(":equipment_category", $equipment_category);
        $statement->bindParam(":equipment_id", $equipment_id);
		$statement->bindParam(":contact_name", $contact_name);
		$statement->bindParam(":contact_surname", $contact_surname);
		$statement->bindParam(":contact_phone", $contact_phone);
        
        $statement->execute();
    }
    
    public static function deleteEquipment($equipment_id){
        $db = DBInit::getInstance();
        $statement = $db->prepare("DELETE FROM asset_equipment WHERE equipment_id = :equipment_id");
        $statement->bindParam(":equipment_id", $equipment_id);
        
        $statement->execute();
    }
    
    public static function setEquipmentEmployee($employee_id, $equipment_id, $date_from, $date_to){
        $db = DBInit::getInstance();
        $statement = $db->prepare("UPDATE asset_equipment SET employee_id = :employee_id, date_from = :date_from, date_to = :date_to WHERE equipment_id = :equipment_id");
        $statement->bindParam(":employee_id", $employee_id);
        $statement->bindParam(":date_from", $date_from);
        $statement->bindParam(":date_to", $date_to);
        $statement->bindParam(":equipment_id", $equipment_id);
        
        $statement->execute();
    }
    
    public static function makeEquipmentReservation($employee_id, $equipment_id, $date_from, $time_from, $date_to, $time_to, $reservation_status){
        $db = DBInit::getInstance();
        $statement = $db->prepare("INSERT INTO equipment_reservations (employee_id, equipment_id, date_from, time_from, date_to, time_to, reservation_status) VALUES (:employee_id, :equipment_id, :date_from, :time_from, :date_to, :time_to, :reservation_status)");
        $statement->bindParam(":employee_id", $employee_id);
        $statement->bindParam(":equipment_id", $equipment_id);
        $statement->bindParam(":date_from", $date_from);
        $statement->bindParam(":time_from", $time_from);
        $statement->bindParam(":date_to", $date_to);
        $statement->bindParam(":time_to", $time_to);
        $statement->bindParam(":reservation_status", $reservation_status);
        
        $statement->execute();
        
        return $db->lastInsertId();
    }
    
    //end of functions for equipment
    
    //functions for places
    
    public static function getPlaces(){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT asset_place.*, employees.employee_name, employees.employee_surname FROM asset_place LEFT JOIN employees ON asset_place.employee_id = employees.employee_id");
        $statement->execute();
        return $statement->fetchAll();
    }
    
    public static function addPlace($place_name, $place_room, $place_floor, $place_description, $place_address, $latitude, $longitude, $contact_name, $contact_surname, $contact_phone){
        $db = DBInit::getInstance();
        $statement = $db->prepare("INSERT INTO asset_place (place_name, place_room, place_floor, place_description, place_address, latitude, longitude, contact_name, contact_surname, contact_phone) VALUES (:place_name, :place_room, :place_floor, :place_description, :place_address, :latitude, :longitude, :contact_name, :contact_surname, :contact_phone)");
        $statement->bindParam(":place_name", $place_name);
        $statement->bindParam(":place_room", $place_room);
        $statement->bindParam(":place_floor", $place_floor);
        $statement->bindParam(":place_description", $place_description);
        $statement->bindParam(":place_address", $place_address);
        $statement->bindParam(":latitude", $latitude);
        $statement->bindParam(":longitude", $longitude);
		$statement->bindParam(":contact_name", $contact_name);
		$statement->bindParam(":contact_surname", $contact_surname);
		$statement->bindParam(":contact_phone", $contact_phone);
        
        $statement->execute();
    }
    
    public static function editPlace($place_id, $place_name, $place_room, $place_floor, $place_description, $place_address, $latitude, $longitude, $contact_name, $contact_surname, $contact_phone){
        $db = DBInit::getInstance();
        $statement = $db->prepare("UPDATE asset_place SET place_name = :place_name, place_room = :place_room, place_floor = :place_floor, place_description = :place_description, place_address = :place_address, latitude = :latitude, longitude = :longitude, contact_name = :contact_name, contact_surname = :contact_surname, contact_phone = :contact_phone WHERE place_id = :place_id");
        $statement->bindParam(":place_name", $place_name);
        $statement->bindParam(":place_room", $place_room);
        $statement->bindParam(":place_floor", $place_floor);
        $statement->bindParam(":place_description", $place_description);
        $statement->bindParam(":place_address", $place_address);
        $statement->bindParam(":latitude", $latitude);
        $statement->bindParam(":longitude", $longitude);
        $statement->bindParam(":place_id", $place_id);
        
        $statement->execute();
    }
    
    public static function deletePlace($equipment_id){
        $db = DBInit::getInstance();
        $statement = $db->prepare("DELETE FROM asset_place WHERE place_id = :place_id");
        $statement->bindParam(":place_id", $place_id);
        
        $statement->execute();
    }
    
    public static function makePlaceReservation($employee_id, $place_id, $date_from, $time_from, $date_to, $time_to, $reservation_status){
        $db = DBInit::getInstance();
        $statement = $db->prepare("INSERT INTO place_reservations (employee_id, place_id, date_from, time_from, date_to, time_to, reservation_status) VALUES (:employee_id, :place_id, :date_from, :time_from, :date_to, :time_to, :reservation_status)");
        $statement->bindParam(":employee_id", $employee_id);
        $statement->bindParam(":place_id", $place_id);
        $statement->bindParam(":date_from", $date_from);
        $statement->bindParam(":time_from", $time_from);
        $statement->bindParam(":date_to", $date_to);
        $statement->bindParam(":time_to", $time_to);
        $statement->bindParam(":reservation_status", $reservation_status);
        
        $statement->execute();
        
        return $db->lastInsertId();
    }
    
    //end of functions for places
    
    //functions for misc. assets
    
    public static function getOtherAssets(){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT asset_other.*, employees.employee_name, employees.employee_surname FROM asset_other LEFT JOIN employees ON asset_other.employee_id = employees.employee_id");
        $statement->execute();
        return $statement->fetchAll();
    }
    
    public static function addOtherAsset($asset_name, $asset_location, $latitude, $longitude, $asset_description, $contact_name, $contact_surname, $contact_phone){
        $db = DBInit::getInstance();
        $statement = $db->prepare("INSERT INTO asset_other (asset_name, asset_location, latitude, longitude, asset_description, contact_name, contact_surname, contact_phone) VALUES (:asset_name, :asset_location, :latitude, :longitude, :asset_description, :contact_name, :contact_surname, :contact_phone)");
        $statement->bindParam(":asset_name", $asset_name);
		$statement->bindParam(":asset_location", $asset_location);
		$statement->bindParam(":latitude", $latitude);
		$statement->bindParam(":longitude", $longitude);
        $statement->bindParam(":asset_description", $asset_description);
		$statement->bindParam(":contact_name", $contact_name);
		$statement->bindParam(":contact_surname", $contact_surname);
		$statement->bindParam(":contact_phone", $contact_phone);
        
        $statement->execute();
    }
    
    public static function editOtherAsset($asset_id, $asset_name, $asset_location, $latitude, $longitude, $asset_description, $contact_name, $contact_surname, $contact_phone){
        $db = DBInit::getInstance();
        $statement = $db->prepare("UPDATE asset_other SET asset_name = :asset_name, asset_location = :asset_location, latitude = :latitude, longitude = :longitude, asset_description = :asset_description, contact_name = :contact_name, contact_surname = :contact_surname, contact_phone = :contact_phone WHERE asset_id = :asset_id");
        $statement->bindParam(":asset_name", $asset_name);
		$statement->bindParam(":asset_location", $asset_location);
		$statement->bindParam(":latitude", $latitude);
		$statement->bindParam(":longitude", $longitude);
        $statement->bindParam(":asset_description", $asset_description);
        $statement->bindParam(":asset_id", $asset_id);
		$statement->bindParam(":contact_name", $contact_name);
		$statement->bindParam(":contact_surname", $contact_surname);
		$statement->bindParam(":contact_phone", $contact_phone);
        
        $statement->execute();
    }
    
    public static function deleteOtherAsset($asset_id){
        $db = DBInit::getInstance();
        $statement = $db->prepare("DELETE FROM asset_other WHERE asset_id = :asset_id");
        $statement->bindParam(":asset_id", $asset_id);
        
        $statement->execute();
    }
    
    public static function makeOtherAssetReservation($employee_id, $asset_id, $date_from, $time_from, $date_to, $time_to, $reservation_status){
        $db = DBInit::getInstance();
        $statement = $db->prepare("INSERT INTO otherasset_reservations (employee_id, asset_id, date_from, time_from, date_to, time_to, reservation_status) VALUES (:employee_id, :asset_id, :date_from, :time_from, :date_to, :time_to, :reservation_status)");
        $statement->bindParam(":employee_id", $employee_id);
        $statement->bindParam(":asset_id", $asset_id);
        $statement->bindParam(":date_from", $date_from);
        $statement->bindParam(":time_from", $time_from);
        $statement->bindParam(":date_to", $date_to);
        $statement->bindParam(":time_to", $time_to);
        $statement->bindParam(":reservation_status", $reservation_status);
        
        $statement->execute();
        
        return $db->lastInsertId();
    }
    
    //end of functions for misc. assets
    
}

?>