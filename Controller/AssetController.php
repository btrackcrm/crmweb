<?php

require_once("ViewHelper.php");
require_once("Model/AssetDB.php");
require_once("Model/GeneralDB.php");
require_once("Model/TravelOrderDB.php");
require_once("Model/UserDB.php");
require_once('libs/PHPMailer/src/Exception.php');
require_once('libs/PHPMailer/src/PHPMailer.php');
require_once('libs/PHPMailer/src/SMTP.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class AssetController {
   
    public static function getAllAssets(){
        $response = array();
        $vehicles = AssetDB::getVehicles();
        $equipment = AssetDB::getEquipment();
        $places = AssetDB::getPlaces();
        $otherassets = AssetDB::getOtherAssets();
        $vehicle_reservations = AssetDB::getActiveVehicleReservations();
        $equipment_reservations = AssetDB::getActiveEquipmentReservations();
        $place_reservations = AssetDB::getActivePlacesReservations();
        $asset_reservations = AssetDB::getActiveOtherAssetReservations();
        $response["vehicles"] = $vehicles;
        $response["equipment"] = $equipment;
        $response["places"] = $places;
        $response["otherassets"] = $otherassets;
        $response["vehicle_reservations"] = $vehicle_reservations;
        $response["equipment_reservations"] = $equipment_reservations;
        $response["place_reservations"] = $place_reservations;
        $response["other_reservations"] = $asset_reservations;
        
        echo json_encode($response);
    }
    
    public static function getVehicleReservations(){
        $reservations = AssetDB::getVehicleReservations();
        
        echo json_encode($reservations);
    }
    
    public static function importVehicles(){
        $handle = fopen($_SESSION["csv"], 'r');
        $response = array();
        if($handle !== FALSE) {
            $row = 0;
            $columns = array();
            $rows = array();
            while(($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
                if ($row == 0){
                    $row++;
                    continue;
                }else{
                    $vehicle_vin = "";
                    $vehicle_year = "";
                    $vehicle_mileage = "";
                    $vehicle_seats = "";
                    $vehicle_insurancedate = "";
                    $vehicle_registrationdate = "";
                    $vehicle_servicedate = "";
                    if ($_POST["vehicle_vin"] != -1){
                        $vehicle_vin = $data[$_POST["vehicle_vin"]];
                    }
                    if ($_POST["vehicle_year"] != -1){
                        $vehicle_year = $data[$_POST["vehicle_year"]];
                    }
                    if ($_POST["vehicle_mileage"] != -1){
                        $vehicle_mileage = $data[$_POST["vehicle_mileage"]];
                    }
                    if ($_POST["vehicle_seats"] != -1){
                        $vehicle_seats = $data[$_POST["vehicle_mileage"]];
                    }
                    if ($_POST["vehicle_insurancedate"] != -1){
                        $vehicle_insurancedate = $data[$_POST["vehicle_insurancedate"]];
                    }
                    if ($_POST["vehicle_registrationdate"] != -1){
                        $vehicle_registrationdate = $data[$_POST["vehicle_registrationdate"]];
                    }
                    if ($_POST["vehicle_servicedate"] != -1){
                        $vehicle_servicedate = $data[$_POST["vehicle_servicedate"]];
                    }
                    AssetDB::addVehicle($_POST["vehicle_type"], $_POST["fuel_type"], null, $vehicle_vin, $vehicle_year, $vehicle_mileage, $data[$_POST["vehicle_brand"]], $data[$_POST["vehicle_model"]], $data[$_POST["vehicle_registration"]],
                            $vehicle_seats, $_POST["vehicle_vignette"], $vehicle_insurancedate, $vehicle_registrationdate, $vehicle_servicedate);
                }
                $row++;
            }
            fclose($handle);
        }
    }
    
    public static function getVehicles(){
        $vehicles = AssetDB::getVehicles();
        echo json_encode($vehicles);
    }
    
    public static function addVehicle(){
        $data = $_POST;
        $owner_id = null;
        if ($data["vehicle_type"] == "Personal"){
            $owner_id = $data["employee_id"];
        }
        
        $permanent_reservation = 0;
        if (isset($data["permanent_reservation"]) && $data["permanent_reservation"] == "1"){
            $permanent_reservation = 1;
            $owner_id = $data["employee_id"];
        }
		
		$vehicle_insurance_date = $data["vehicle_insurancedate"];
		if ($vehicle_insurance_date != ""){
			$vehicle_insurance_date = date("Y-m-d", strtotime($vehicle_insurance_date));
		}
		
		$vehicle_registration_date = $data["vehicle_registrationdate"];
		if ($vehicle_registration_date != ""){
			$vehicle_registration_date = date("Y-m-d", strtotime($vehicle_registration_date));
		}
		
		$vehicle_service_date = $data["vehicle_servicedate"];
		if ($vehicle_service_date != ""){
			$vehicle_service_date = date("Y-m-d", strtotime($vehicle_service_date));
		}
        
        AssetDB::addVehicle($data["vehicle_type"], $data["fuel_type"], $owner_id, $data["vehicle_vin"], $data["vehicle_year"], $data["vehicle_mileage"], $data["vehicle_brand"], $data["vehicle_model"], $data["vehicle_registration"],
                            $data["vehicle_seats"], $data["vehicle_vignette"], $permanent_reservation, $vehicle_insurance_date, $vehicle_registration_date, $vehicle_service_date);
    }
    
    public static function editVehicle(){
        $data = $_POST;
        
        if ($data["vehicle_type"] == "Personal"){
            $owner_id = $data["employee_id"];
        }
        
        $permanent_reservation = 0;
        if (isset($data["permanent_reservation"]) && $data["permanent_reservation"] == "1"){
            $permanent_reservation = 1;
            $owner_id = $data["employee_id"];
        }
		
		$vehicle_insurance_date = $data["vehicle_insurancedate"];
		if ($vehicle_insurance_date != ""){
			$vehicle_insurance_date = date("Y-m-d", strtotime($vehicle_insurance_date));
		}
		
		$vehicle_registration_date = $data["vehicle_registrationdate"];
		if ($vehicle_registration_date != ""){
			$vehicle_registration_date = date("Y-m-d", strtotime($vehicle_registration_date));
		}
		
		$vehicle_service_date = $data["vehicle_servicedate"];
		if ($vehicle_service_date != ""){
			$vehicle_service_date = date("Y-m-d", strtotime($vehicle_service_date));
		}
        
        AssetDB::editVehicle($data["vehicle_id"], $data["vehicle_type"], $data["fuel_type"], $owner_id, $data["vehicle_vin"], $data["vehicle_year"], $data["vehicle_mileage"], $data["vehicle_brand"], $data["vehicle_model"], $data["vehicle_registration"],
                            $data["vehicle_seats"], $data["vehicle_vignette"], $permanent_reservation, $vehicle_insurance_date, $vehicle_registration_date, $vehicle_service_date);
    }
    
    public static function deleteVehicle(){
        $data = $_POST;
        AssetDB::deleteVehicle($data["vehicle_id"]);
    }
    
    public static function makeVehicleReservation(){
        $data = $_POST;
        $status = $_SESSION["admin"];
        
        $active_reservations = AssetDB::getVehicleActiveReservations($data["vehicle_id"]);
        $reservation_valid = true;
		
		$reservation_start_date = date("Y-m-d", strtotime($data["start_date"]));
		$reservation_start_time = date("H:i", strtotime($data["start_time"]));
		$reservation_end_date = date("Y-m-d", strtotime($data["end_date"]));
		$reservation_end_time = date("H:i", strtotime($data["end_time"]));
		
        foreach ($active_reservations as $reservation){
            $startdate1 = strtotime($reservation_start_date . " " . $reservation_start_time);
            $enddate1 = strtotime($reservation_end_date . " " . $reservation_end_time);
            $startdate2 = strtotime($reservation["date_from"] . " " . $reservation["time_from"]);
            $enddate2 = strtotime($reservation["date_to"] . " " . $reservation["time_to"]);
            if (($enddate2 >= $startdate1) && ($enddate1 >= $startdate1)){
                $reservation_valid = false;
            }
        }
        if ($reservation_valid){
            $reservation_id = AssetDB::makeVehicleReservation($data["employee_id"], $data["vehicle_id"], $reservation_start_date, $reservation_start_time, $reservation_end_date, $reservation_end_time, $status);
    
            
                if ($status == 1){
                    $last_order = TravelOrderDB::getLastTravelOrder();
                    $last_id = $last_order["travelorder_id"];
                    $settings = GeneralDB::getSettings();
                    $travelorder_number = $settings["travelorder_prefix"] . "-" . (intval($last_id) + 1);
                    
                    $travelorder_id = TravelOrderDB::addTravelOrder($travelorder_number, $data["employee_id"], $data["vehicle_id"], $reservation_start_date, $reservation_start_time, $reservation_end_date, $reservation_end_time);
                    $trip_id = TravelOrderDB::addTripOrder($data["employee_id"], $data["vehicle_id"], $reservation_id, $travelorder_id, $data["reservation_description"]);
                    TravelOrderDB::setTravelOrderTripID($travelorder_id, $trip_id);
                    
                    $employee = UserDB::getEmployeeByID($data["employee_id"]);
                    $vehicle = AssetDB::getVehicleByID($data["vehicle_id"]);
                    if ($employee["employee_online"] == 1){
                        $gcm = new GCM();
                        $push = new Push();
                        		  
                        $sendingData = array();
                        $sendingData['reservation_status'] = 1;
                        $sendingData["vehicle"] = $vehicle["vehicle_brand"] . " " . $vehicle["vehicle_model"];
                        $sendingData['sentAt'] = round(microtime(true) * 1000);
                                
                        $push->setTitle("Reservation");
                        $push->setIsBackground(FALSE);
                        $push->setFlag(1);
                        $push->setData($sendingData);
                                
                        $gcm->send($employee['fcm_token'], $push->getPush());
                    }
                }else{
                    $vehicle = AssetDB::getVehicleByID($data["vehicle_id"]);
                    $employee = UserDB::getEmployeeByID($data["employee_id"]);
                    $prettyStartDate = date("l, F jS @ H:i", strtotime($reservation_start_date . " " . $reservation_start_time));
                    $prettyEndDate = date("l, F jS @ H:i", strtotime($reservation_end_date . " " . $reservation_end_time));
                    $mail = new PHPMailer(true);  // Passing `true` enables exceptions
                        try {
                            //Server settings
                            $mail->SMTPDebug = 0;                                 // Enable verbose debug output
							$mail->CharSet = 'UTF-8';
                            $mail->isSMTP();                                      // Set mailer to use SMTP
                            $mail->Host = 'mail.appdev.si';                       // Specify main and backup SMTP servers
                            $mail->SMTPAuth = true;                               // Enable SMTP authentication
                            $mail->Username = 'reminders@appdev.si';              // SMTP username
                            $mail->Password = '12Tojegeslo#';                     // SMTP password
                            $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
                            $mail->Port = 465;                                    // TCP port to connect to
                            
                            //Recipients
                            $mail->setFrom('reminders@appdev.si', 'reminders@appdev.si');
        
                            $mail->addAddress("neicrihar@gmail.com", "neicrihar@gmail.com");     // Add a recipient
                            //Content
                            $mail->isHTML(true);// Set email format to HTML
                            if(isset($_SERVER['HTTPS'])){
                                    $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
                            }
                            else{
                                    $protocol = 'http';
                            }
                            $acceptURL = $protocol . "://" . $_SERVER['HTTP_HOST'] . "/" . BASE_URL . "vehicle/acceptreservation?vehicle_id=" . $data["vehicle_id"] . "&employee_id=" . $data["employee_id"] . "&reservation_id=" . $reservation_id;
                            $declineURL = $protocol . "://" . $_SERVER['HTTP_HOST'] . "/" . BASE_URL . "vehicle/declinereservation?vehicle_id=" . $data["vehicle_id"] . "&employee_id=" . $data["employee_id"] . "&reservation_id=" . $reservation_id;;
                            $emailBody = '<div style="background-color:#fff;margin:0 auto 0 auto;padding:30px 0 30px 0;color:#4f565d;font-size:13px;line-height:20px;font-family:\'Helvetica Neue\',Arial,sans-serif;text-align:left;">
                                                <center>
                                                  <table style="width:550px;text-align:center">
                                                    <tbody>
                                                      <tr>
                                                        <td style="padding:0 0 20px 0;border-bottom:1px solid #e9edee;">
                                                          <a href="https://www.netko.it" style="display:block; margin:0 auto;" target="_blank">
                                                            <img src="https://main.btrackcore.com/Pictures/logo_long.png" width="250" alt="bTrack logo" style="border: 0px;">
                                                          </a>
                                                        </td>
                                                      </tr>
                                                      <tr>
                                                        <td colspan="2" style="padding:30px 0;">
                                                          <p style="color:#1d2227;line-height:28px;font-size:22px;margin:12px 10px 20px 10px;font-weight:400;">Hey ' . "Nejc" . '</p>
                                                          <p style="margin:0 10px 10px 10px;padding:0;color:black;"><strong>' . $employee["employee_name"] . " " . $employee["employee_surname"] . '</strong> wants to reserve a vehicle, namely a <strong>' . $vehicle["vehicle_brand"] . " " . $vehicle["vehicle_model"] . "</strong> with the registration number <strong>" . $vehicle["vehicle_registration"] . '</strong><br>The vehicle would be reserved from <strong>' . $prettyStartDate . '</strong> to <strong>' . $prettyEndDate . '</strong><br>The purpose of the reservation is as follows: ' . $data["reservation_description"] . '<br><br>You can either accept or decline the reservation by clicking one of the buttons below.</p>
                                                          <a style="display: inline-block;background-color: #33B679;font-weight: bold;text-align: center;letter-spacing: .5px;position: relative;cursor: pointer;overflow: hidden;-webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;-webkit-tap-highlight-color: transparent;vertical-align: middle;z-index: 1;-webkit-transition: .3s ease-out;transition: .3s ease-out;text-decoration: none;color: #fff;text-align: center;-webkit-box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2);box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2);border: none;border-radius: 2px;height: 36px;line-height: 36px;padding: 0 2rem;text-transform: uppercase;" href="' . $acceptURL . '" target="_blank">Accept</a>
                                                          <a style="display: inline-block;background-color: rgb(255, 82, 82);font-weight: bold;text-align: center;letter-spacing: .5px;position: relative;cursor: pointer;overflow: hidden;-webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;-webkit-tap-highlight-color: transparent;vertical-align: middle;z-index: 1;-webkit-transition: .3s ease-out;transition: .3s ease-out;text-decoration: none;color: #fff;text-align: center;-webkit-box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2);box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2);border: none;border-radius: 2px;height: 36px;line-height: 36px;padding: 0 2rem;text-transform: uppercase;" href="' . $declineURL . '" target="_blank">Decline</a>
                                                        </td>
                                                      </tr>
                                                      <tr>
                                                        <td colspan="2" style="padding:30px 0 0 0;border-top:1px solid #e9edee;color:#9b9fa5">
                                                          If you have any questions you can contact us at <a style="color:#666d74;text-decoration:none;" href="mailto:support@btrack.si" target="_blank">support@btrack.si</a>
                                                        </td>
                                                      </tr>
                                                    </tbody>
                                                  </table>
                                                </center>
                                              </div>';
                            $mail->Subject = $vehicle["vehicle_brand"] . " " . $vehicle["vehicle_model"] . " reservation request";
                            $mail->msgHTML($emailBody);
                            $mail->send();
                        } catch (Exception $e) {
                            echo 'Message could not be sent.';
                            echo 'Mailer Error: ' . $mail->ErrorInfo;
                        }
                }
            
        }else{
            echo "A reservation for this vehicle already exists in the specified date range!";
        }
    }
	
	public static function deleteVehicleReservation(){
		$data = $_POST;
		AssetDB::deleteVehicleReservation($data["reservation_id"]);
	}
	
	public static function deleteEquipmentReservation(){
		$data = $_POST;
		AssetDB::deleteEquipmentReservation($data["reservation_id"]);
	}
	
	public static function deletePlaceReservation(){
		$data = $_POST;
		AssetDB::deletePlaceReservation($data["reservation_id"]);
	}
	
	public static function deleteOtherReservation(){
		$data = $_POST;
		AssetDB::deleteOtherReservation($data["reservation_id"]);
	}
    
    public static function makeEquipmentReservation(){
        $data = $_POST;
        
        $active_reservations = AssetDB::getEquipmentActiveReservations($data["equipment_id"]);
        $reservation_valid = true;
		$reservation_start_date = date("Y-m-d", strtotime($data["start_date"]));
		$reservation_start_time = date("H:i", strtotime($data["start_time"]));
		$reservation_end_date = date("Y-m-d", strtotime($data["end_date"]));
		$reservation_end_time = date("H:i", strtotime($data["end_time"]));
		
        foreach ($active_reservations as $reservation){
            $startdate1 = strtotime($reservation_start_date . " " . $reservation_start_time);
            $enddate1 = strtotime($reservation_end_date . " " . $reservation_end_time);
            $startdate2 = strtotime($reservation["date_from"] . " " . $reservation["time_from"]);
            $enddate2 = strtotime($reservation["date_to"] . " " . $reservation["time_to"]);
            if (($enddate2 >= $startdate1) && ($enddate1 >= $startdate1)){
                $reservation_valid = false;
            }
        }
        
        if ($reservation_valid){
            $reservation_id = AssetDB::makeEquipmentReservation($data["employee_id"], $data["equipment_id"], $reservation_start_date, $reservation_start_time, $reservation_end_date, $reservation_end_time, 1);
        }else{
            echo "A reservation for this equipment already exists in the specified date range!";
        }
    }
    
    public static function makePlaceReservation(){
        $data = $_POST;
        
        $active_reservations = AssetDB::getPlaceActiveReservations($data["place_id"]);
        $reservation_valid = true;
		$reservation_start_date = date("Y-m-d", strtotime($data["start_date"]));
		$reservation_start_time = date("H:i", strtotime($data["start_time"]));
		$reservation_end_date = date("Y-m-d", strtotime($data["end_date"]));
		$reservation_end_time = date("H:i", strtotime($data["end_time"]));
        foreach ($active_reservations as $reservation){
            $startdate1 = strtotime($reservation_start_date . " " . $reservation_start_time);
            $enddate1 = strtotime($reservation_end_date . " " . $reservation_end_time);
            $startdate2 = strtotime($reservation["date_from"] . " " . $reservation["time_from"]);
            $enddate2 = strtotime($reservation["date_to"] . " " . $reservation["time_to"]);
            if (($enddate2 >= $startdate1) && ($enddate1 >= $startdate1)){
                $reservation_valid = false;
            }
        }
        
        if ($reservation_valid){
            $reservation_id = AssetDB::makePlaceReservation($data["employee_id"], $data["place_id"], $reservation_start_date, $reservation_start_time, $reservation_end_date, $reservation_end_time, 1);
        }else{
            echo "A reservation for this place already exists in the specified date range!";
        }
    }
    
    public static function makeOtherAssetReservation(){
        $data = $_POST;
        
        $active_reservations = AssetDB::getOtherAssetActiveReservations($data["equipment_id"]);
        $reservation_valid = true;
		$reservation_start_date = date("Y-m-d", strtotime($data["start_date"]));
		$reservation_start_time = date("H:i", strtotime($data["start_time"]));
		$reservation_end_date = date("Y-m-d", strtotime($data["end_date"]));
		$reservation_end_time = date("H:i", strtotime($data["end_time"]));
        foreach ($active_reservations as $reservation){
            $startdate1 = strtotime($reservation_start_date . " " . $reservation_start_time);
            $enddate1 = strtotime($reservation_end_date . " " . $reservation_end_time);
            $startdate2 = strtotime($reservation["date_from"] . " " . $reservation["time_from"]);
            $enddate2 = strtotime($reservation["date_to"] . " " . $reservation["time_to"]);
            if (($enddate2 >= $startdate1) && ($enddate1 >= $startdate1)){
                $reservation_valid = false;
            }
        }
        
        if ($reservation_valid){
            $reservation_id = AssetDB::makeOtherAssetReservation($data["employee_id"], $data["asset_id"], $reservation_start_date, $reservation_start_time, $reservation_end_date, $reservation_end_time, 1);
        }else{
            echo "A reservation for this asset already exists in the specified date range!";
        }
    }
    
    public static function acceptReservation(){
        $data = $_GET;
        $vehicle = AssetDB::getVehicleByID($data["vehicle_id"]);
        $reservation = AssetDB::getReservationByID($data["reservation_id"]);
        $reservation_id = $data["reservation_id"];
        $message = "Vehicle reservation is now marked as approved. A notification e-mail has been sent to the responsible employee.";
        if ($reservation == null || $reservation["reservation_status"] == 1){
            $message = "This reservation has already been accepted.";
            ViewHelper::render("View/inviteaccepted.php", ["message" => $message]);
        }else{
            $last_order = TravelOrderDB::getLastTravelOrder();
            $last_id = $last_order["travelorder_id"];
            $settings = GeneralDB::getSettings();
            $travelorder_number = $settings["travelorder_prefix"] . "-" . (intval($last_id) + 1);
            $travelorder_id = TravelOrderDB::addTravelOrder($travelorder_number, $data["employee_id"], $data["vehicle_id"], $reservation["date_from"], $reservation["time_from"], $reservation["date_to"], $reservation["time_to"]);
            $trip_id = TravelOrderDB::addTripOrder($data["employee_id"], $data["vehicle_id"], $reservation_id, $travelorder_id, "");
            TravelOrderDB::setTravelOrderTripID($travelorder_id, $trip_id);
            AssetDB::setReservationStatus($data["reservation_id"], 1);
            ViewHelper::render("View/inviteaccepted.php", ["message" => $message]);
            
            $employee = UserDB::getEmployeeByID($data["employee_id"]);
            
            if ($employee["employee_online"] == 1){
                $gcm = new GCM();
                $push = new Push();
                        		  
                $sendingData = array();
                $sendingData['reservation_status'] = 1;
                $sendingData["vehicle"] = $vehicle["vehicle_brand"] . " " . $vehicle["vehicle_model"];
                $sendingData['sentAt'] = round(microtime(true) * 1000);
                                
                $push->setTitle("Reservation");
                $push->setIsBackground(FALSE);
                $push->setFlag(1);
                $push->setData($sendingData);
                                
                $gcm->send($employee['fcm_token'], $push->getPush());
            }
            
            $mail = new PHPMailer(true);  // Passing `true` enables exceptions
                        try {
                            //Server settings
                            $mail->SMTPDebug = 0;                                 // Enable verbose debug output
                            $mail->isSMTP();                                      // Set mailer to use SMTP
							$mail->CharSet = 'UTF-8';
                            $mail->Host = 'mail.appdev.si';                       // Specify main and backup SMTP servers
                            $mail->SMTPAuth = true;                               // Enable SMTP authentication
                            $mail->Username = 'reminders@appdev.si';              // SMTP username
                            $mail->Password = '12Tojegeslo#';                     // SMTP password
                            $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
                            $mail->Port = 465;                                    // TCP port to connect to
                            
                            //Recipients
                            $mail->setFrom('reminders@appdev.si', 'reminders@appdev.si');
        
                            $mail->addAddress($employee["employee_email"], $employee["employee_email"]);     // Add a recipient
                            //Content
                            $mail->isHTML(true);// Set email format to HTML
                            if(isset($_SERVER['HTTPS'])){
                                    $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
                            }
                            else{
                                    $protocol = 'http';
                            }
                            
                            $emailBody = '<div style="background-color:#fff;margin:0 auto 0 auto;padding:30px 0 30px 0;color:#4f565d;font-size:13px;line-height:20px;font-family:\'Helvetica Neue\',Arial,sans-serif;text-align:left;">
                                                <center>
                                                  <table style="width:550px;text-align:center">
                                                    <tbody>
                                                      <tr>
                                                        <td style="padding:0 0 20px 0;border-bottom:1px solid #e9edee;">
                                                          <a href="https://www.netko.it" style="display:block; margin:0 auto;" target="_blank">
                                                            <img src="https://main.btrackcore.com/Pictures/logo_long.png" width="250" alt="bTrack logo" style="border: 0px;">
                                                          </a>
                                                        </td>
                                                      </tr>
                                                      <tr>
                                                        <td colspan="2" style="padding:30px 0;">
                                                          <p style="color:#1d2227;line-height:28px;font-size:22px;margin:12px 10px 20px 10px;font-weight:400;">Hey ' . $employee["employee_name"] . " " . $employee["employee_surname"] . '</p>
                                                          <p style="margin:0 10px 10px 10px;padding:0;color:black;">Your vehicle registration request has been accepted.</p>
                                                        </td>
                                                      </tr>
                                                      <tr>
                                                        <td colspan="2" style="padding:30px 0 0 0;border-top:1px solid #e9edee;color:#9b9fa5">
                                                          If you have any questions you can contact us at <a style="color:#666d74;text-decoration:none;" href="mailto:support@btrack.si" target="_blank">support@btrack.si</a>
                                                        </td>
                                                      </tr>
                                                    </tbody>
                                                  </table>
                                                </center>
                                              </div>';
                            $mail->Subject = "Vehicle reservation accepted";
                            $mail->msgHTML($emailBody);
                            $mail->send();
                        } catch (Exception $e) {
                            echo 'Message could not be sent.';
                            echo 'Mailer Error: ' . $mail->ErrorInfo;
                        }
        }
    }
    
    public static function declineReservation(){
        $data = $_GET;
        
        $reservation = AssetDB::getReservationByID($data["reservation_id"]);
        $message = "Vehicle reservation is now marked as declined. A notification e-mail has been sent to the responsible employee.";
        if ($reservation == null){
            $message = "This reservation request has already been declined.";
            ViewHelper::render("View/inviteaccepted.php", ["message" => $message]);
        }else{
            AssetDB::deleteReservation($data["reservation_id"]);
            ViewHelper::render("View/inviteaccepted.php", ["message" => $message]);
            $employee = UserDB::getEmployeeByID($data["employee_id"]);
            
            if ($employee["employee_online"] == 1){
                $gcm = new GCM();
                $push = new Push();
                        		  
                $sendingData = array();
                $sendingData['reservation_status'] = 0;
                $sendingData["vehicle"] = $vehicle["vehicle_brand"] . " " . $vehicle["vehicle_model"];
                $sendingData['sentAt'] = round(microtime(true) * 1000);
                                
                $push->setTitle("Reservation");
                $push->setIsBackground(FALSE);
                $push->setFlag(1);
                $push->setData($sendingData);
                                
                $gcm->send($employee['fcm_token'], $push->getPush());
            }
            
            $mail = new PHPMailer(true);  // Passing `true` enables exceptions
                        try {
                            //Server settings
                            $mail->SMTPDebug = 0;                                 // Enable verbose debug output
                            $mail->isSMTP();                                      // Set mailer to use SMTP
							$mail->CharSet = 'UTF-8';
                            $mail->Host = 'mail.appdev.si';                       // Specify main and backup SMTP servers
                            $mail->SMTPAuth = true;                               // Enable SMTP authentication
                            $mail->Username = 'reminders@appdev.si';              // SMTP username
                            $mail->Password = '12Tojegeslo#';                     // SMTP password
                            $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
                            $mail->Port = 465;                                    // TCP port to connect to
                            
                            //Recipients
                            $mail->setFrom('reminders@appdev.si', 'reminders@appdev.si');
        
                            $mail->addAddress($employee["employee_email"], $employee["employee_email"]);     // Add a recipient
                            //Content
                            $mail->isHTML(true);// Set email format to HTML
                            if(isset($_SERVER['HTTPS'])){
                                    $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
                            }
                            else{
                                    $protocol = 'http';
                            }
                            
                            $emailBody = '<div style="background-color:#fff;margin:0 auto 0 auto;padding:30px 0 30px 0;color:#4f565d;font-size:13px;line-height:20px;font-family:\'Helvetica Neue\',Arial,sans-serif;text-align:left;">
                                                <center>
                                                  <table style="width:550px;text-align:center">
                                                    <tbody>
                                                      <tr>
                                                        <td style="padding:0 0 20px 0;border-bottom:1px solid #e9edee;">
                                                          <a href="https://www.netko.it" style="display:block; margin:0 auto;" target="_blank">
                                                            <img src="https://main.btrackcore.com/Pictures/logo_long.png" width="250" alt="bTrack logo" style="border: 0px;">
                                                          </a>
                                                        </td>
                                                      </tr>
                                                      <tr>
                                                        <td colspan="2" style="padding:30px 0;">
                                                          <p style="color:#1d2227;line-height:28px;font-size:22px;margin:12px 10px 20px 10px;font-weight:400;">Hey ' . $employee["employee_name"] . " " . $employee["employee_surname"] . '</p>
                                                          <p style="margin:0 10px 10px 10px;padding:0;color:black;">Your vehicle registration request has been declined.</p>
                                                        </td>
                                                      </tr>
                                                      <tr>
                                                        <td colspan="2" style="padding:30px 0 0 0;border-top:1px solid #e9edee;color:#9b9fa5">
                                                          If you have any questions you can contact us at <a style="color:#666d74;text-decoration:none;" href="mailto:support@btrack.si" target="_blank">support@btrack.si</a>
                                                        </td>
                                                      </tr>
                                                    </tbody>
                                                  </table>
                                                </center>
                                              </div>';
                            $mail->Subject = "Vehicle reservation accepted";
                            $mail->msgHTML($emailBody);
                            $mail->send();
                        } catch (Exception $e) {
                            echo 'Message could not be sent.';
                            echo 'Mailer Error: ' . $mail->ErrorInfo;
                        }
        }
    }
    
    public static function importEquipment(){
        $handle = fopen($_SESSION["csv"], 'r');
        $response = array();
        if($handle !== FALSE) {
            $row = 0;
            $columns = array();
            $rows = array();
            while(($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
                if ($row == 0){
                    $row++;
                    continue;
                }else{
                    $equipment_code = "";
                    $equipment_description = "";
                    $equipment_category = "Other";
                    if ($_POST["equipment_code"] != -1){
                        $equipment_code = $data[$_POST["equipment_code"]];
                    }
                    if ($_POST["equipment_description"] != -1){
                        $equipment_description = $data[$_POST["equipment_description"]];
                    }
                    if ($_POST["equipment_category"] != -1){
                        $equipment_category = $data[$_POST["equipment_category"]];
                    }
                    AssetDB::addEquipment($data[$_POST["equipment_name"]], $equipment_code, $equipment_description, $equipment_category);
                }
                $row++;
            }
            fclose($handle);
        }
    }
    
    public static function getEquipment(){
        $equipment = AssetDB::getEquipment();
        echo json_encode($equipment);
    }
    
    public static function addEquipment(){
        $data = $_POST;
        AssetDB::addEquipment($data["equipment_name"], $data["equipment_code"], $data["equipment_location"], $data["latitude"], $data["longitude"], $data["equipment_description"], $data["equipment_category"], $data["contact_name"], $data["contact_surname"], $data["contact_phone"]);
    }
    
    public static function editEquipment(){
        $data = $_POST;
        AssetDB::editEquipment($data["equipment_id"], $data["equipment_name"], $data["equipment_code"], $data["equipment_location"], $data["latitude"], $data["longitude"], $data["equipment_description"], $data["equipment_category"], $data["contact_name"], $data["contact_surname"], $data["contact_phone"]);
    }
    
    public static function deleteEquipment(){
        $data = $_POST;
        AssetDB::deleteEquipment($data["equipment_id"]);
    }
    
    
    
    public static function importPlaces(){
        $handle = fopen($_SESSION["csv"], 'r');
        $response = array();
        if($handle !== FALSE) {
            $row = 0;
            $columns = array();
            $rows = array();
            while(($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
                if ($row == 0){
                    $row++;
                    continue;
                }else{
                    $place_room = "";
                    $place_floor = "0";
                    $place_description = "";
                    $latitude = $data[$_POST["latitude"]];
                    $longitude = $data[$_POST["longitude"]];
                    if ($_POST["place_room"] != -1){
                        $place_room = $data[$_POST["place_room"]];
                    }
                    if ($_POST["place_floor"] != -1){
                        $place_floor = $data[$_POST["place_floor"]];
                    }
                    if ($_POST["place_description"] != -1){
                        $place_description = $data[$_POST["place_description"]];
                    }
                    if (is_numeric($latitude) && is_numeric($longitude)){
                        AssetDB::addPlace($data[$_POST["place_name"]], $place_room, $place_floor, $place_description, $data[$_POST["place_address"]], $latitude, $longitude);
                    }
                }
                $row++;
            }
            fclose($handle);
        }
    }
    
    public static function getPlaces(){
        $places = AssetDB::getPlaces();
        echo json_encode($places);
    }
    
    public static function addPlace(){
        $data = $_POST;
        AssetDB::addPlace($data["place_name"], $data["place_room"], $data["place_floor"], $data["place_description"], $data["place_address"], $data["latitude"], $data["longitude"], $data["contact_name"], $data["contact_surname"], $data["contact_phone"]);
    }
    
    public static function editPlace(){
        $data = $_POST;
        AssetDB::editPlace($data["place_id"], $data["place_name"], $data["place_room"], $data["place_floor"], $data["place_description"], $data["place_address"], $data["latitude"], $data["longitude"], $data["contact_name"], $data["contact_surname"], $data["contact_phone"]);
    }
    
    public static function deletePlace(){
        $data = $_POST;
        AssetDB::deletePlace($data["place_id"]);
    }
    
    public static function importOtherAssets(){
        $handle = fopen($_SESSION["csv"], 'r');
        $response = array();
        if($handle !== FALSE) {
            $row = 0;
            $columns = array();
            $rows = array();
            while(($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
                if ($row == 0){
                    $row++;
                    continue;
                }else{
                    $asset_description = "";
                    if ($_POST["asset_description"] != -1){
                        $asset_description = $data[$_POST["asset_description"]];
                    }
                    
                    AssetDB::addOtherAsset($data[$_POST["asset_name"]], $asset_description);
                }
                $row++;
            }
            fclose($handle);
        }
    }
    
    public static function getOtherAssets(){
        $assets = AssetDB::getOtherAssets();
        echo json_encode($assets);
    }
    
    public static function addOtherAsset(){
        $data = $_POST;
        AssetDB::addOtherAsset($data["asset_name"], $data["asset_location"], $data["latitude"], $data["longitude"], $data["asset_description"], $data["contact_name"], $data["contact_surname"], $data["contact_phone"]);
    }
    
    public static function editOtherAsset(){
        $data = $_POST;
        AssetDB::editOtherAsset($data["asset_id"], $data["asset_name"], $data["asset_location"], $data["latitude"], $data["longitude"], $data["asset_description"], $data["contact_name"], $data["contact_surname"], $data["contact_phone"]);
    }
    
    public static function deleteOtherAsset(){
        $data = $_POST;
        AssetDB::deleteOtherAsset($data["asset_id"]);
    }
    
    
}

?>