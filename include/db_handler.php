<?php
 
/**
 * Class to handle all db operations
 * This class will have CRUD methods for database tables
 *
 */
error_reporting(-1);
ini_set('display_errors', 'On');

class DbHandler {
 
    private $conn;
 
    function __construct() {
        require_once dirname(__FILE__) . '/db_connect.php';
        // opening db connection
        $db = new DbConnect();
        $this->conn = $db->connect();
    }
    
    public function validateLogin($username, $password) {
        $response = array();
        $stmt = $this->conn->prepare("SELECT employee_id, password, employee_name, employee_surname FROM employees WHERE employee_email = ?");
        $stmt->bind_param("s", $username);
 
            if ($stmt->execute()) {
				$stmt->bind_result($employee_id, $hashedPassword, $employee_name, $employee_surname);
				$stmt->fetch();
				$user = array();
				if (password_verify($password, $hashedPassword)){	
					$user["employee_id"] = $employee_id;
					$user["employee_name"] = $employee_name;
					$user["employee_surname"] = $employee_surname;
					$stmt->close();
					$curDate = date("Y-m-d H:i:s");
					$updateOnline = $this->conn->prepare("UPDATE employees SET employee_online = 1, last_login = ? WHERE employee_id = ?");	
					$updateOnline->bind_param("si", $curDate, $employee_id);
					$updateOnline->execute();
					$updateOnline->close();	
					$action = "login";
					$updateLogs = $this->conn->prepare("INSERT INTO employeelogs (employee_id, datetime, action) VALUES (?, ?, ?)");	
					$updateLogs->bind_param("iss", $employee_id, $curDate, $action);
					$updateLogs->execute();
					$updateLogs->close();	
				}else{
					$stmt->close();
					$user = NULL;
				}
				return $user;
			} else {
				$stmt->close();
				return NULL;
			}
    }
	
	public function updateEmployeeSettings($employee_id, $calendar_view, $fingerprint_auth, $calendar_startday, $automatic_tracking, $navigation_screen_on, $gps_interval, $voiced_navigation, $navigation_volume, $tracking_notifications,
	$reservation_notification, $general_notifications, $notification_vibrations, $event_notification){
		
		$stmt = $this->conn->prepare("UPDATE employee_settings SET calendar_view = ?, fingerprint_auth = ?, calendar_startday = ?, automatic_tracking = ?, navigation_screen_on = ?, gps_interval = ?, voiced_navigation = ?, navigation_volume = ?,
		tracking_notifications = ?, reservation_notification = ?, general_notifications = ?, notification_vibrations = ?, event_notification = ? WHERE employee_id = ?");
		
		$stmt->bind_param("iiiiiiiiiiiiii", $calendar_view, $fingerprint_auth, $calendar_startday, $automatic_tracking, $navigation_screen_on, $gps_interval, $voiced_navigation, $navigation_volume, $tracking_notifications,
		$reservation_notification, $general_notifications, $notification_vibrations, $event_notification, $employee_id);
		
		if ($stmt->execute()) {
            $response["error"] = false;
            $stmt->error;
        } else {
            $response["error"] = true;
            $stmt->error;
        }
        $stmt->close();
		return $response;
	}
    
    public function getWorkgroupTasks($workgroup_id){
        $response = array();
        $stmt = $this->conn->prepare("SELECT wgtasks.*, customers.customer_name FROM wgtasks LEFT JOIN customers ON wgtasks.customer_id = customers.customer_id WHERE wgtasks.workgroup_id = ?");
        $stmt->bind_param("i", $workgroup_id);
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $response = $result->fetch_all(MYSQLI_ASSOC);
        } else {
            $response["error"] = true;
            $stmt->error;
        }
        $stmt->close();
 
        return $response;
    }
	
	public function getWorkgroupTaskByID($task_id){
        $stmt = $this->conn->prepare("SELECT * FROM wgtasks WHERE task_id = ?");
        $stmt->bind_param("i", $task_id);
        $stmt->execute();
        
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        
        $stmt->close();
        return $row;
    }
	
	public function getCustomerByPhone($phonenumber){
		$phoneNr = "%" . substr($phonenumber, 1) . "%";
		$stmt = $this->conn->prepare("SELECT * FROM customers WHERE customer_phone LIKE ?");
		$stmt->bind_param("s", $phoneNr);
		
		$stmt->execute();
		
		$result = $stmt->get_result();
        $row = $result->fetch_assoc();
        
        $stmt->close();
        return $row;
	}
	
	public function getContactByPhone($phonenumber){
		$phoneNr = "%" . substr($phonenumber, 1) . "%";
		$stmt = $this->conn->prepare("SELECT * FROM contacts WHERE contact_phone LIKE ?");
		$stmt->bind_param("s", $phoneNr);
		
		$stmt->execute();
		
		$result = $stmt->get_result();
        $row = $result->fetch_assoc();
        
        $stmt->close();
        return $row;
	}
    
    public function updateWorkgroupTaskFiles($task_id, $task_files){
        $response = array();
        $stmt = $this->conn->prepare("UPDATE wgtasks SET task_files = ? WHERE task_id = ?");
        $stmt->bind_param("si", $task_files, $task_id);
        $stmt->execute();
        
        if ($stmt->execute()) {
            $response["error"] = false;
        } else {
            $response["error"] = true;
            $stmt->error;
        }
        $stmt->close();
 
        return $response;
    }
	
	
    
    public function insertWorkgroupMessage($workgroup_id, $employee_id, $content){
        $response = array();
        $datetime = date("Y-m-d H:i");
        $stmt = $this->conn->prepare("INSERT INTO messages (employee_id, workgroup_id, content, datetime) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("iiss", $employee_id, $workgroup_id, $content, $datetime);
        if ($stmt->execute()) {
            $response["error"] = false;
            $response["message_id"] = $stmt->insert_id;
        } else {
            $response["error"] = true;
            $stmt->error;
        }
        $stmt->close();
 
        return $response;
    }
    
    public function addWorkgroupTask($workgroup_id, $employee_id, $customer_id, $participants, $task_subject, $task_description, $priority, $task_startdate, $task_starttime, $task_enddate, $task_endtime, $task_location, $latitude, $longitude){
        $response = array();
        $stmt = $this->conn->prepare("INSERT INTO wgtasks (workgroup_id, employee_id, customer_id, participants, task_subject, task_description, priority, task_startdate, task_starttime, task_enddate, task_endtime, task_location, latitude, longitude) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("iiisssssssssss", $workgroup_id, $employee_id, $customer_id, $participants, $task_subject, $task_description, $priority, $task_startdate, $task_starttime, $task_enddate, $task_endtime, $task_location, $latitude, $longitude);
        if ($stmt->execute()) {
            $response["error"] = false;
			$response["task_id"] = $stmt->insert_id;
        } else {
            $response["error"] = true;
            $stmt->error;
        }
        $stmt->close();
 
        return $response;
    }
    
    public function editWorkgroupTask($task_id, $workgroup_id, $customer_id, $participants, $task_subject, $task_description, $priority, $task_startdate, $task_starttime, $task_enddate, $task_endtime, $task_location, $latitude, $longitude){
        $response = array();
        $stmt = $this->conn->prepare("UPDATE wgtasks SET workgroup_id = ?, customer_id = ?, participants = ?, task_subject = ?, task_description = ?, priority = ?, task_startdate = ?, task_starttime = ?, task_enddate = ?, task_endtime = ?, task_location = ?, latitude = ?,
        longitude = ? WHERE task_id = ?");
        $stmt->bind_param("iisssssssssssi", $workgroup_id, $customer_id, $participants, $task_subject, $task_description, $priority, $task_startdate, $task_starttime, $task_enddate, $task_endtime, $task_location, $latitude, $longitude, $task_id);
        if ($stmt->execute()) {
            $response["error"] = false;
        } else {
            $response["error"] = true;
            $stmt->error;
        }
        $stmt->close();
 
        return $response;
    }
    
    public function updateWorkgroupTaskStatus($task_id, $status){
        $response = array();
        $stmt = $this->conn->prepare("UPDATE wgtasks SET status = ? WHERE task_id = ?");
        $stmt->bind_param("ii", $status, $task_id);
        if ($stmt->execute()) {
            $response["error"] = false;
        } else {
            $response["error"] = true;
            $stmt->error;
        }
        $stmt->close();
 
        return $response;
    }
    
    public function getWorkgroupMessages($workgroup_id){
        $response = array();
        $stmt = $this->conn->prepare("SELECT messages.*, employees.employee_name, employees.employee_surname FROM messages INNER JOIN employees ON messages.employee_id = employees.employee_id WHERE messages.workgroup_id = ?");
        $stmt->bind_param("i", $workgroup_id);
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $response = $result->fetch_all(MYSQLI_ASSOC);
        } else {
            $response["error"] = true;
            $stmt->error;
        }
        $stmt->close();
 
        return $response;
    }
    
    public function getEmployeeList(){
        $response = array();
        $stmt = $this->conn->prepare("SELECT employees.*, departments.department_name FROM employees INNER JOIN departments ON employees.employee_department = departments.department_id");
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $response = $result->fetch_all(MYSQLI_ASSOC);
        } else {
            $response["error"] = true;
            $stmt->error;
        }
        $stmt->close();
 
        return $response;
    }
    
    public function getEmployeeTravelOrders($employee_id){
        $response = array();
        $stmt = $this->conn->prepare("SELECT * FROM travelorders WHERE employee_id = ? AND CURDATE() BETWEEN DATE(date_from) AND DATE(date_to) AND status = 0");
        $stmt->bind_param("i", $employee_id);
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $response = $result->fetch_assoc();
            if (is_array($response)){
                $response["error"] = false;
            }else{
                $response["error"] = true;
            }
        } else {
            $response["error"] = true;
            $stmt->error;
        }
        $stmt->close();
 
        return $response;
    }
	
	public function getEmployeeWorkOrders($employee_id){
        $response = array();
        $stmt = $this->conn->prepare("SELECT workorders.*, customers.customer_name, subsidiaries.subsidiary_name FROM workorders INNER JOIN customers ON workorders.customer_id = customers.customer_id LEFT JOIN subsidiaries ON workorders.subsidiary_id = subsidiaries.subsidiary_id WHERE FIND_IN_SET(?, workorders.assigned_to)");
        $stmt->bind_param("i", $employee_id);
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $response = $result->fetch_all(MYSQLI_ASSOC);
        } else {
            $response["error"] = true;
            $stmt->error;
        }
        $stmt->close();
 
        return $response;
    }
	
	public function getWorkorderItems($workorder_id){
		$response = array();
		$stmt = $this->conn->prepare("SELECT workorder_items.entry_id, workorder_items.item_amount, items.* FROM workorder_items INNER JOIN items ON workorder_items.item_id = items.item_id WHERE workorder_items.workorder_id = ?");
        $stmt->bind_param("i", $workorder_id);
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $response = $result->fetch_all(MYSQLI_ASSOC);
        } else {
            $response["error"] = true;
            $stmt->error;
        }
        $stmt->close();
 
        return $response;
	}
	
	public function updateWorkorderItemQuantity($entry_id, $item_amount){
		$response = array();
		$stmt = $this->conn->prepare("UPDATE workorder_items SET item_amount = ? WHERE entry_id = ?");
        $stmt->bind_param("ii", $entry_id, $item_amount);
        if ($stmt->execute()) {
            // User successfully updated
            $response["error"] = false;
        } else {
            // Failed to update user
            $response["error"] = true;
            $stmt->error;
        }
        $stmt->close();
        return $response;
	}
	
	public function getEmployeeTickets($employee_id){
        $response = array();
        $stmt = $this->conn->prepare("SELECT tickets.*, customers.customer_name, subsidiaries.subsidiary_name FROM tickets INNER JOIN customers ON tickets.customer_id = customers.customer_id LEFT JOIN subsidiaries ON tickets.subsidiary_id = subsidiaries.subsidiary_id WHERE FIND_IN_SET(?, tickets.assigned_to)");
        $stmt->bind_param("i", $employee_id);
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $response = $result->fetch_all(MYSQLI_ASSOC);
        } else {
            $response["error"] = true;
            $stmt->error;
        }
        $stmt->close();
 
        return $response;
    }
    
    public function getLastTravelOrder(){
        $stmt = $this->conn->prepare("SELECT * FROM travelorders ORDER BY travelorder_id DESC LIMIT 1;");
        
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        
        return $row;
    }
    
    public function createVehicleReservation($employee_id, $vehicle_id, $date_from, $time_from, $date_to, $time_to){
        $reservation_status = 1;
        $stmt = $this->conn->prepare("INSERT INTO vehicle_reservations (employee_id, vehicle_id, date_from, time_from, date_to, time_to, reservation_status) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("iissssi", $employee_id, $vehicle_id, $date_from, $time_from, $date_to, $time_to, $reservation_status);
        $stmt->execute();
        
        return $stmt->insert_id;
    }
    
    public function createTravelOrder($travelorder_number, $employee_id, $vehicle_id, $date_from, $time_from, $date_to, $time_to){
        $stmt = $this->conn->prepare("INSERT INTO travelorders (travelorder_number, employee_id, vehicle_id, date_from, time_from, date_to, time_to) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("siissss", $travelorder_number, $employee_id, $vehicle_id, $date_from, $time_from, $date_to, $time_to);
        $stmt->execute();
        
        return $stmt->insert_id;
    }
    
    public function createTripOrder($employee_id, $vehicle_id, $reservation_id, $travelorder_id, $trip_description){
        $stmt = $this->conn->prepare("INSERT INTO triporders (employee_id, vehicle_id, reservation_id, travelorder_id, trip_description) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("iiiis", $employee_id, $vehicle_id, $reservation_id, $travelorder_id, $trip_description);
        $stmt->execute();
        
        return $stmt->insert_id;
    }
    
    public function setTravelOrderTripID($travelorder_id, $trip_id){
        $response = array();
        $stmt = $this->conn->prepare("UPDATE travelorders SET trip_id = ? WHERE travelorder_id = ?");
        $stmt->bind_param("ii", $trip_id, $travelorder_id);
        if ($stmt->execute()) {
            // User successfully updated
            $response["error"] = false;
        } else {
            // Failed to update user
            $response["error"] = true;
            $stmt->error;
        }
        $stmt->close();
        return $response;
    }
    
    public function getWorkgroupFiles(){
        
    }
    
    public function employeeLogout($employee_id) {
        $response = array();
		$status = 0;
        $stmt = $this->conn->prepare("UPDATE employees SET employee_online = 0 WHERE employee_id = ?");
        $stmt->bind_param("i", $employee_id);
 
        if ($stmt->execute()) {
            // User successfully updated
            $response["error"] = false;
            $response["message"] = 'Logout successful';
        } else {
            // Failed to update user
            $response["error"] = true;
            $response["message"] = "Failed to logout";
            $stmt->error;
        }
        $stmt->close();
        $action = "logout";
        $curDate = date("Y-m-d H:i:s");
	    $updateLogs = $this->conn->prepare("INSERT INTO employeelogs (employee_id, datetime, action) VALUES (?, ?, ?)");	
		$updateLogs->bind_param("iss", $employee_id, $curDate, $action);
		$updateLogs->execute();
		$updateLogs->close();
 
        return $response;
    }
    
    public function trackingLocation($employee_id, $latitude, $longitude){
        $response = array();
        $stmt = $this->conn->prepare("UPDATE employees SET latitude = ?, longitude = ? WHERE employee_id = ?");
        $stmt->bind_param("ssi", $latitude, $longitude, $employee_id);
 
        if ($stmt->execute()) {
            $response["error"] = false;
        } else {
            $response["error"] = true;
            $stmt->error;
        }
        $stmt->close();
 
        return $response;
    }
    
    public function storeTrackingToken($employee_id, $fcm_token){
        $response = array();
        $stmt = $this->conn->prepare("UPDATE employees SET tracking_fcm_token = ? WHERE employee_id = ?");
        $stmt->bind_param("si", $fcm_token, $employee_id);
        if ($stmt->execute()) {
            $response["error"] = false;
        } else {
            $response["error"] = true;
            $stmt->error;
        }
        
        $stmt->close();
        
        return $response;
    }
    
    public function storeEmployeeToken($employee_id, $fcm_token){
        $response = array();
        $stmt = $this->conn->prepare("UPDATE employees SET fcm_token = ? WHERE employee_id = ?");
        $stmt->bind_param("si", $fcm_token, $employee_id);
        if ($stmt->execute()) {
            $response["error"] = false;
        } else {
            $response["error"] = true;
            $stmt->error;
        }
        
        $stmt->close();
        
        return $response;
    }
    
    public function addWorkLocation($employee_id, $address, $latitude, $longitude){
        $date = date("Y-m-d");
        $stmt = $this->conn->prepare("INSERT INTO worklocations (employee_id, participants, date, address, latitude, longitude) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $employee_id, $employee_id, $date, $address, $latitude, $longitude);
        
        if ($stmt->execute()) {
            $response["error"] = false;
            $location_id = $stmt->insert_id;
        } else {
            $response["error"] = true;
            $stmt->error;
        }
        
        $stmt->close();
        return $location_id;
    }
	
	public function addSubsidiary($customer_id, $employee_id, $subsidiary_name, $subsidiary_vat, $subsidiary_phone, $subsidiary_email, $subsidiary_building, $subsidiary_address, $latitude, $longitude, $subsidiary_notes){
		$stmt = $this->conn->prepare("INSERT INTO subsidiaries (customer_id, added_by, subsidiary_name, subsidiary_vat, subsidiary_phone, subsidiary_email, subsidiary_building, subsidiary_address, latitude, longitude, subsidiary_notes) 
		VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("iisssssssss", $customer_id, $employee_id, $subsidiary_name, $subsidiary_vat, $subsidiary_phone, $subsidiary_email, $subsidiary_building, $subsidiary_address, $latitude, $longitude, $subsidiary_notes);
        
        if ($stmt->execute()) {
            $response["error"] = false;
            $response["subsidiary_id"] = $stmt->insert_id;
        } else {
            $response["error"] = true;
            $stmt->error;
        }
        
        $stmt->close();
        return $response;
	}
	
	public function addContact($customer_id, $employee_id, $contact_name, $contact_surname, $contact_position, $contact_type, $contact_phone, $contact_email, $contact_notes){
		$stmt = $this->conn->prepare("INSERT INTO contacts (customer_id, employee_id, contact_name, contact_surname, contact_position, contact_type, contact_phone, contact_email, contact_notes) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("iisssssss", $customer_id, $employee_id, $contact_name, $contact_surname, $contact_position, $contact_type, $contact_phone, $contact_email, $contact_notes);
        
        if ($stmt->execute()) {
            $response["error"] = false;
            $response["contact_id"] = $stmt->insert_id;
        } else {
            $response["error"] = true;
            $response["message"] = $stmt->error;
        }
        
        $stmt->close();
        return $response;
	}
    
    public function editCustomer($customer_id, $customer_name, $customer_notes, $customer_email, $customer_phone, $customer_website, $customer_address, $latitude, $longitude, $employee_id, $customer_importance){
        $response = array();
        $stmt = $this->conn->prepare("UPDATE customers SET customer_name = ?, customer_notes = ?, customer_email = ?, customer_phone = ?, customer_website = ?, customer_address = ?, latitude = ?, longitude = ?, employee_id = ?, customer_importance = ? WHERE customer_id = ?");
        $stmt->bind_param("ssssssssiii", $customer_name, $customer_notes, $customer_email, $customer_phone, $customer_website, $customer_address, $latitude, $longitude, $employee_id, $customer_importance, $customer_id);
        
        if ($stmt->execute()) {
            $response["error"] = false;
        } else {
            $response["error"] = true;
            $stmt->error;
        }
        
        $stmt->close();
        
        return $response;
        
    }
    
    public function getTodaysLocations($employee_id){
        $response = array();
        $stmt = $this->conn->prepare("SELECT worklocations.*, customers.customer_id, customers.customer_name, customers.customer_phone FROM worklocations INNER JOIN customers ON worklocations.customer_id = customers.customer_id WHERE FIND_IN_SET(?, worklocations.participants) AND (DATE(worklocations.date) = CURDATE() OR FIND_IN_SET(WEEKDAY(CURDATE()), repeat_on)) ORDER BY priority ASC;");
        $stmt->bind_param("s", $employee_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $locations = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
       
        return $locations;
    }
	
	public function getTodaysLogs($employee_id){
		$response = array();
        $stmt = $this->conn->prepare("SELECT * FROM trackinglogs WHERE employee_id = ? AND DATE(created_on) = CURDATE()");
        $stmt->bind_param("s", $employee_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $locations = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
       
        return $locations;
	}
    
    public function trackingArrival($employee_id, $location_id){
        $response = array();
        $stmt = $this->conn->prepare("INSERT INTO trackinglogs (employee_id, location_id) VALUES (?, ?)");
        $stmt->bind_param("ii", $employee_id, $location_id);
        if ($stmt->execute()){
            $response["error"] = false;
			$response["location_id"] = $location_id;
        }else{
            $response["error"] = true;
        }
        $stmt->close();
        
        return $response;
    }
	
	public function trackingManualArrival($employee_id, $location_id){
        $response = array();
		$manual_checkin = 1;
        $stmt = $this->conn->prepare("INSERT INTO trackinglogs (employee_id, location_id, manual_checkin) VALUES (?, ?, ?)");
        $stmt->bind_param("iii", $employee_id, $location_id, $manual_checkin);
        if ($stmt->execute()){
            $response["error"] = false;
			$response["location_id"] = $location_id;
        }else{
            $response["error"] = true;
        }
        $stmt->close();
        
        return $response;
    }
    
    public function trackingArrivalNFC($employee_id, $location_id, $nfc_tag){
        $response = array();
        $stmt = $this->conn->prepare("INSERT INTO trackinglogs (employee_id, location_id, nfc_tag) VALUES (?, ?, ?)");
        $stmt->bind_param("iis", $employee_id, $location_id, $nfc_tag);
        if ($stmt->execute()){
            $response["error"] = false;
        }else{
            $response["error"] = true;
        }
        $stmt->close();
        
        return $response;
    }
	
	public function trackingDelayedArrivalNFC($employee_id, $location_id, $nfc_tag, $date){
        $response = array();
        $stmt = $this->conn->prepare("INSERT INTO trackinglogs (employee_id, location_id, nfc_tag, created_on) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("iiss", $employee_id, $location_id, $nfc_tag, $date);
        if ($stmt->execute()){
            $response["error"] = false;
        }else{
            $response["error"] = true;
        }
        $stmt->close();
        
        return $response;
    }
	
	public function checkNFCExists($nfc_tag){
		$stmt = $this->conn->prepare("SELECT * FROM nfc WHERE content = ? LIMIT 1");
		$stmt->bind_param("s", $nfc_tag);
		$stmt->execute();
		
		$result = $stmt->get_result();
        $nfc = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
		
		if (count($nfc) == 1){
			return $nfc[0];
		}else{
			return null;
		}
	}
	
	public function checkTodaysLocationsByCustomer($employee_id, $customer_id){
		$stmt = $this->conn->prepare("SELECT * FROM worklocations WHERE FIND_IN_SET(?, participants) AND customer_id = ? AND (DATE(date) = CURDATE() OR recurring = 1) LIMIT 1");
		$stmt->bind_param("ii", $employee_id, $customer_id);
		$stmt->execute();
		
		$result = $stmt->get_result();
        $locations = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
		
		if (is_array($locations)){
			return $locations;
		}else{
			return null;
		}
	}
    
    public function markWorkLocationVisited($location_id){
        $stmt = $this->conn->prepare("UPDATE worklocations SET visited = 1 WHERE location_id = ?");
        $stmt->bind_param("i", $location_id);
        $stmt->execute();
        $stmt->close();
    }
    
    public function trackingDeparture($employee_id, $location_id){
        $response = array();
        $departure_date = date("Y-m-d H:i");
        $stmt = $this->conn->prepare("UPDATE trackinglogs SET departure_date = ? WHERE employee_id = ? AND location_id = ?");
        $stmt->bind_param("sii", $departure_date, $employee_id, $location_id);
        if ($stmt->execute()){
            $response["error"] = false;
        }else{
            $response["error"] = true;
        }
        $stmt->close();
        
        return $response;
    }
	
	public function trackingManualDeparture($employee_id, $location_id){
        $response = array();
        $departure_date = date("Y-m-d H:i");
		$manual_checkin = 1;
        $stmt = $this->conn->prepare("UPDATE trackinglogs SET departure_date = ?, manual_checkin = ? WHERE employee_id = ? AND location_id = ?");
        $stmt->bind_param("siii", $departure_date, $manual_checkin, $employee_id, $location_id);
        if ($stmt->execute()){
            $response["error"] = false;
        }else{
            $response["error"] = true;
        }
        $stmt->close();
        
        return $response;
    }
    
    public function trackingLogExists($employee_id, $location_id){
        $stmt = $this->conn->prepare("SELECT * FROM trackinglogs WHERE employee_id = ? AND location_id = ? AND DATE(created_on) = CURDATE()");
        $stmt->bind_param("ii", $employee_id, $location_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        
        $stmt->close();
        return $row;
    }
    
    public function getEventByID($event_id){
        $stmt = $this->conn->prepare("SELECT * FROM events WHERE event_id = ?");
        $stmt->bind_param("i", $event_id);
        $stmt->execute();
        
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        
        $stmt->close();
        return $row;
    }
	
	public function getTicketByID($ticket_id){
        $stmt = $this->conn->prepare("SELECT * FROM tickets WHERE ticket_id = ?");
        $stmt->bind_param("i", $ticket_id);
        $stmt->execute();
        
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        
        $stmt->close();
        return $row;
    }
	
	public function getWorkorderByID($workorder_id){
        $stmt = $this->conn->prepare("SELECT * FROM workorders WHERE workorder_id = ?");
        $stmt->bind_param("i", $workorder_id);
        $stmt->execute();
        
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        
        $stmt->close();
        return $row;
    }
	
	public function getEventNotes($event_id){
		$stmt = $this->conn->prepare("SELECT event_actions.*, employees.employee_name, employees.employee_surname FROM event_actions INNER JOIN employees ON employees.employee_id = event_actions.employee_id WHERE event_actions.event_id = ?");
		$stmt->bind_param("i", $event_id);
		
		$stmt->execute();
        $result = $stmt->get_result();
        $notes = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
		
		return $notes;
	}
	
	public function addEventNote($event_id, $employee_id, $note){
		$type = 1;
		$stmt = $this->conn->prepare("INSERT INTO event_actions (event_id, employee_id, description, type) VALUES (?, ?, ?, ?)");
		$stmt->bind_param("iisi", $event_id, $employee_id, $note, $type);
		if ($stmt->execute()) {
            $response["error"] = false;
			$response["action_id"] = $stmt->insert_id;
        } else {
            $response["error"] = true;
            $stmt->error;
        }
        $stmt->close();
 
        return $response;
	}
	
	public function getWorkgroupTaskNotes($task_id){
		$stmt = $this->conn->prepare("SELECT wgtasks_actions.*, employees.employee_name, employees.employee_surname FROM wgtasks_actions INNER JOIN employees ON employees.employee_id = wgtasks_actions.employee_id WHERE wgtasks_actions.task_id = ?");
		$stmt->bind_param("i", $task_id);
		
		$stmt->execute();
        $result = $stmt->get_result();
        $notes = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
		
		return $notes;
	}
	
	public function addWorkgroupTaskNote($task_id, $employee_id, $note){
		$type = 1;
		$stmt = $this->conn->prepare("INSERT INTO wgtasks_actions (task_id, employee_id, description, type) VALUES (?, ?, ?, ?)");
		$stmt->bind_param("iisi", $task_id, $employee_id, $note, $type);
		if ($stmt->execute()) {
            $response["error"] = false;
			$response["action_id"] = $stmt->insert_id;
        } else {
            $response["error"] = true;
            $stmt->error;
        }
        $stmt->close();
 
        return $response;
	}
	
	public function getTicketNotes($ticket_id){
		$stmt = $this->conn->prepare("SELECT ticket_actions.*, employees.employee_name, employees.employee_surname FROM ticket_actions INNER JOIN employees ON employees.employee_id = ticket_actions.employee_id WHERE ticket_actions.ticket_id = ?");
		$stmt->bind_param("i", $ticket_id);
		
		$stmt->execute();
        $result = $stmt->get_result();
        $notes = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
		
		return $notes;
	}
	
	public function addTicketNote($ticket_id, $employee_id, $note){
		$type = 1;
		$stmt = $this->conn->prepare("INSERT INTO ticket_actions (ticket_id, employee_id, action_description, action_type) VALUES (?, ?, ?, ?)");
		$stmt->bind_param("iisi", $ticket_id, $employee_id, $note, $type);
		if ($stmt->execute()) {
            $response["error"] = false;
			$response["action_id"] = $stmt->insert_id;
        } else {
            $response["error"] = true;
            $stmt->error;
        }
        $stmt->close();
 
        return $response;
	}
	
	public function getWorkorderNotes($event_id){
		$stmt = $this->conn->prepare("SELECT workorder_actions.*, employees.employee_name, employees.employee_surname FROM workorder_actions INNER JOIN employees ON employees.employee_id = workorder_actions.employee_id WHERE workorder_actions.workorder_id = ?");
		$stmt->bind_param("i", $event_id);
		
		$stmt->execute();
        $result = $stmt->get_result();
        $notes = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
		
		return $notes;
	}
	
	public function addWorkorderNote($workorder_id, $employee_id, $note){
		$type = 1;
		$stmt = $this->conn->prepare("INSERT INTO workorder_actions (workorder_id, employee_id, action_description, action_type) VALUES (?, ?, ?, ?)");
		$stmt->bind_param("iisi", $workorder_id, $employee_id, $note, $type);
		if ($stmt->execute()) {
            $response["error"] = false;
			$response["action_id"] = $stmt->insert_id;
        } else {
            $response["error"] = true;
            $stmt->error;
        }
        $stmt->close();
 
        return $response;
	}
    
    public function updateEventFiles($event_id, $event_files){
        $response = array();
        $stmt = $this->conn->prepare("UPDATE events SET event_files = ? WHERE event_id = ?");
        $stmt->bind_param("si", $event_files, $event_id);
        $stmt->execute();
        
        if ($stmt->execute()) {
            $response["error"] = false;
        } else {
            $response["error"] = true;
            $stmt->error;
        }
        $stmt->close();
 
        return $response;
    }
	
	public function updateTicketFiles($ticket_id, $ticket_files){
        $response = array();
        $stmt = $this->conn->prepare("UPDATE tickets SET ticket_files = ? WHERE ticket_id = ?");
        $stmt->bind_param("si", $ticket_files, $ticket_id);
        $stmt->execute();
        
        if ($stmt->execute()) {
            $response["error"] = false;
        } else {
            $response["error"] = true;
            $stmt->error;
        }
        $stmt->close();
 
        return $response;
    }
	
	public function updateWorkorderFiles($workorder_id, $workorder_files){
        $response = array();
        $stmt = $this->conn->prepare("UPDATE workorders SET workorder_files = ? WHERE workorder_id = ?");
        $stmt->bind_param("si", $workorder_files, $workorder_id);
        $stmt->execute();
        
        if ($stmt->execute()) {
            $response["error"] = false;
        } else {
            $response["error"] = true;
            $stmt->error;
        }
        $stmt->close();
 
        return $response;
    }
    
    public function employeeLocation($employee_id, $speed, $latitude, $longitude, $distance) {
        $response = array();
        $stmt = $this->conn->prepare("UPDATE employees SET latitude = ?, longitude = ?, speed = ?, distance = ? WHERE employee_id = ?");
        $stmt->bind_param("ssiii", $latitude, $longitude, $speed, $distance, $employee_id);
 
        if ($stmt->execute()) {
            $response["error"] = false;
        } else {
            $response["error"] = true;
            $stmt->error;
        }
        $stmt->close();
 
        return $response;
    }
    
    public function employeeDistance($employee_id, $distance){
        $response = array();
        $stmt = $this->conn->prepare("UPDATE employees SET distance = ? WHERE employee_id = ?");
        $stmt->bind_param("ii", $distance, $employee_id);
 
        if ($stmt->execute()) {
            $response["error"] = false;
        } else {
            $response["error"] = true;
            $stmt->error;
        }
        $stmt->close();
 
        return $response;
    }
    
    public function employeeLocationLog($employee_id, $speed, $latitude, $longitude, $type, $datetime) {
        $response = array();
        $stmt = $this->conn->prepare("INSERT INTO locationlogs (employee_id, speed, latitude, longitude, datetime, type) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("iissss", $employee_id, $speed, $latitude, $longitude, $datetime, $type);
 
        if ($stmt->execute()) {
            $response["error"] = false;
        } else {
            $response["error"] = true;
            
        }
        $stmt->close();
 
        return $response;
    }
    
    public function addEmployeeStop($employee_id, $duration, $latitude, $longitude, $start_time, $end_time, $customer_id){
        $response = array();
        
        $stmt = $this->conn->prepare("INSERT INTO stops (employee_id, duration, latitude, longitude, start_time, end_time, customer_id) VALUES (?, ?, ?, ?, ?, ?, ?);");
        $stmt->bind_param("issssss", $employee_id, $duration, $latitude, $longitude, $start_time, $end_time, $customer_id);
        
        if ($stmt->execute()) {
            $response["error"] = false;
        } else {
            $response["error"] = true;
        }
        $stmt->close();
 
        return $response;
    }
    
    public function addCallLog($employee_id, $phonenumber, $customer_id, $call_start, $call_end, $type){
        $response = array();
        
        $stmt = $this->conn->prepare("INSERT INTO calls (employee_id, phonenumber, customer_id, call_start, call_end, type) VALUES (?, ?, ?, ?, ?, ?);");
        $stmt->bind_param("isisss", $employee_id, $phonenumber, $customer_id, $call_start, $call_end, $type);
        
        if ($stmt->execute()) {
            $response["error"] = false;
        } else {
            $response["error"] = true;
        }
        $stmt->close();
 
        return $response;
    }
    
    public function addOutgoingCall($employee_id, $phonenumber, $customer_id, $call_duration){
        $response = array();
        $call_subject = "Other";
        $call_type = 0;
        $call_source = "Mobile";
        $stmt = $this->conn->prepare("INSERT INTO crmcalls (call_subject, employee_id, customer_id, call_phonenumber, call_duration, call_type, call_source) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("siissis", $call_subject, $employee_id, $customer_id, $phonenumber, $call_duration, $call_type, $call_source);
        if ($stmt->execute()) {
            $response["error"] = false;
        } else {
            $response["error"] = true;
        }
        $stmt->close();
 
        return $response;
    }
    
    public function updateEvent($event_id, $status){
        $response = array();
        $stmt = $this->conn->prepare("UPDATE events SET status = ? WHERE event_id = ?");
        $stmt->bind_param("si", $status, $event_id);
        
        if ($stmt->execute()) {
            $response["error"] = false;
        } else {
            $response["error"] = true;
        }
        
        $stmt->close();
 
        return $response;
    }
    
    public function addEvent($event_type, $event_subject, $participants, $employee_id, $customer_id, $event_address, $latitude, $longitude, $event_startdate, $event_starttime, $event_enddate, $event_endtime, $reminderString, $importance, $event_description){
        $response = array();
        $stmt = $this->conn->prepare("INSERT INTO events (event_type, event_subject, participants, customer_id, event_address, latitude, longitude, event_startdate, event_starttime, event_enddate, event_endtime, event_reminders, event_importance, event_description, employee_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssssssssssi", $event_type, $event_subject, $participants, $customer_id, $event_address, $latitude, $longitude, $event_startdate, $event_starttime, $event_enddate, $event_endtime, $reminderString, $importance, $event_description, $employee_id);
        
        if ($stmt->execute()) {
            $response["error"] = false;
            $response["event_id"] = $stmt->insert_id;
        } else {
            $response["error"] = true;
        }
        
        $stmt->close();
 
        return $response;
    }
    
    public function editEvent($event_id, $event_type, $event_subject, $participants, $employee_id, $customer_id, $event_address, $latitude, $longitude, $event_startdate, $event_starttime, $event_enddate, $event_endtime, $reminderString, $importance, $event_description){
        $response = array();
        $stmt = $this->conn->prepare("UPDATE events SET event_type = ?, event_subject = ?, participants = ?, customer_id = ?, event_address = ?, latitude = ?, longitude = ?, event_startdate = ?, event_starttime = ?, event_enddate = ?, event_endtime = ?, event_reminders = ?, event_importance = ?, event_description = ?, employee_id = ? WHERE event_id = ?");
        $stmt->bind_param("ssssssssssssssii", $event_type, $event_subject, $participants, $customer_id, $event_address, $latitude, $longitude, $event_startdate, $event_starttime, $event_enddate, $event_endtime, $reminderString, $importance, $event_description, $employee_id, $event_id);
        
        if ($stmt->execute()) {
            $response["error"] = false;
        } else {
            $response["error"] = true;
        }
        
        $stmt->close();
 
        return $response;
    }
	
	public function deleteEvent($event_id){
		$response = array();
		$stmt = $this->conn->prepare("DELETE FROM events WHERE event_id = ?");
		$stmt->bind_param("i", $event_id);
		
		if ($stmt->execute()) {
            $response["error"] = false;
        } else {
            $response["error"] = true;
        }
        
        $stmt->close();
 
        return $response;
	}
	
	public function deleteWorkgroupTask($task_id){
		$response = array();
		$stmt = $this->conn->prepare("DELETE FROM wgtasks WHERE task_id = ?");
		$stmt->bind_param("i", $task_id);
		
		if ($stmt->execute()) {
            $response["error"] = false;
        } else {
            $response["error"] = true;
        }
        
        $stmt->close();
 
        return $response;
	}
    
    public function updateEventStatus($event_id, $status){
        $response = array();
        $stmt = $this->conn->prepare("UPDATE events SET status = ? WHERE event_id = ?");
        $stmt->bind_param("ii", $status, $event_id);
        
        if ($stmt->execute()) {
            $response["error"] = false;
        } else {
            $response["error"] = true;
        }
        
        $stmt->close();
 
        return $response;
    }
	
	public function updateTicketStatus($ticket_id, $status){
        $response = array();
        $stmt = $this->conn->prepare("UPDATE tickets SET ticket_status = ? WHERE ticket_id = ?");
        $stmt->bind_param("ii", $status, $ticket_id);
        
        if ($stmt->execute()) {
            $response["error"] = false;
        } else {
            $response["error"] = true;
        }
        
        $stmt->close();
 
        return $response;
    }
    
	public function updateWorkorderStatus($workorder_id, $status){
        $response = array();
        $stmt = $this->conn->prepare("UPDATE workorders SET status = ? WHERE workorder_id = ?");
        $stmt->bind_param("ii", $status, $workorder_id);
        
        if ($stmt->execute()) {
            $response["error"] = false;
        } else {
            $response["error"] = true;
        }
        
        $stmt->close();
 
        return $response;
    }
	
    public function updateEventDistance($event_id, $distance){
        $response = array();
        $stmt = $this->conn->prepare("UPDATE events SET distance = ? WHERE event_id = ?");
        $stmt->bind_param("si", $distance, $event_id);
        
        if ($stmt->execute()) {
            $response["error"] = false;
        } else {
            $response["error"] = true;
        }
        
        $stmt->close();
 
        return $response;
    }
    
    public function addReminder($event_id, $customer_id, $employee_id, $reminder){
        $stmt = $this->conn->prepare("INSERT INTO reminders (event_id, customer_id, employee_id, reminder_datetime) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("iiis", $event_id, $customer_id, $employee_id, $reminder);
        $stmt->execute();
    }
    
    public function removeEventReminders($event_id){
        $stmt = $this->conn->prepare("DELETE FROM reminders WHERE event_id = ?");
        $stmt->bind_param("i", $event_id);
        
        $stmt->execute();
    }
    
    public function updateEventReached($event_id, $status){
        $date = date("Y-m-d H:i:s");
        $response = array();
        $stmt = $this->conn->prepare("UPDATE events SET status = ?, event_arrivaldate = ? WHERE event_id = ?");
        $stmt->bind_param("ssi", $status, $date, $event_id);
        
        if ($stmt->execute()) {
            $response["error"] = false;
        } else {
            $response["error"] = true;
        }
        
        $stmt->close();
 
        return $response;
    }
    
    public function updateEventEnded($event_id, $status){
        $date = date("Y-m-d H:i:s");
        $response = array();
        $stmt = $this->conn->prepare("UPDATE events SET status = ?, event_endingdate = ? WHERE event_id = ?");
        $stmt->bind_param("ssi", $status, $date, $event_id);
        
        if ($stmt->execute()) {
            $response["error"] = false;
        } else {
            $response["error"] = true;
        }
        
        $stmt->close();
 
        return $response;
    }
    
    public function addFileUpload($employee_id, $customer_id, $event_id, $wgtask_id, $ticket_id, $workorder_id, $filename, $filepath){
        $curdate = date("Y-m-d H:i:s");
		$upload_source = 1;
        $stmt = $this->conn->prepare("INSERT INTO uploads (employee_id, customer_id, event_id, wgtask_id, ticket_id, workorder_id, datetime, filename, filepath, upload_source) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("issssssssi", $employee_id, $customer_id, $event_id, $wgtask_id, $ticket_id, $workorder_id, $curdate, $filename, $filepath, $upload_source);
        if ($stmt->execute()) {
            $response["error"] = false;
        } else {
            $response["error"] = true;
        }
        $stmt->close();
        
        return $response;
    }
    
    public function getAllCustomers(){
        $stmt = $this->conn->prepare("SELECT * FROM customers ORDER BY customer_name ASC");
        $stmt->execute();
        $result = $stmt->get_result();
        $customers = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
       
        return $customers;
    }
    
    public function getAllCustomerContacts($customer_id){
        $stmt = $this->conn->prepare("SELECT * FROM contacts WHERE customer_id = ?");
		$stmt->bind_param("i", $customer_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $customers = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
       
        return $customers;
    }
	
	public function getAllCustomerFiles($customer_id){
        $stmt = $this->conn->prepare("SELECT uploads.*, employees.employee_name, employees.employee_surname FROM uploads INNER JOIN employees ON uploads.employee_id = employees.employee_id WHERE uploads.customer_id = ?");
		$stmt->bind_param("i", $customer_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $files = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
       
        return $files;
    }
	
	public function getAllEventFiles($event_id){
        $stmt = $this->conn->prepare("SELECT uploads.*, employees.employee_name, employees.employee_surname FROM uploads INNER JOIN employees ON uploads.employee_id = employees.employee_id WHERE uploads.event_id = ?");
		$stmt->bind_param("i", $event_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $files = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
       
        return $files;
    }
	
	public function getAllTaskFiles($task_id){
        $stmt = $this->conn->prepare("SELECT uploads.*, employees.employee_name, employees.employee_surname FROM uploads INNER JOIN employees ON uploads.employee_id = employees.employee_id WHERE uploads.wgtask_id = ?");
		$stmt->bind_param("i", $task_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $files = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
       
        return $files;
    }
	
	public function getAllWorkorderFiles($workorder_id){
        $stmt = $this->conn->prepare("SELECT uploads.*, employees.employee_name, employees.employee_surname FROM uploads INNER JOIN employees ON uploads.employee_id = employees.employee_id WHERE uploads.workorder_id = ?");
		$stmt->bind_param("i", $workorder_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $files = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
       
        return $files;
    }
	
	public function getAllTicketFiles($ticket_id){
        $stmt = $this->conn->prepare("SELECT uploads.*, employees.employee_name, employees.employee_surname FROM uploads INNER JOIN employees ON uploads.employee_id = employees.employee_id WHERE uploads.ticket_id = ?");
		$stmt->bind_param("i", $ticket_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $files = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
       
        return $files;
    }
	
	public function getAllCustomerSubsidiaries($customer_id){
        $stmt = $this->conn->prepare("SELECT * FROM subsidiaries WHERE customer_id = ?");
		$stmt->bind_param("i", $customer_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $customers = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
       
        return $customers;
    }
    
    public function getAllVehicles(){
        $stmt = $this->conn->prepare("SELECT * FROM asset_vehicles");
        $stmt->execute();
        $result = $stmt->get_result();
        $vehicles = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
       
        return $vehicles;
    }
    
    public function getEmployeeEvents($employee_id){
        $stmt = $this->conn->prepare("SELECT events.*, customers.customer_name FROM events LEFT JOIN customers ON events.customer_id = customers.customer_id WHERE FIND_IN_SET(?, events.participants) AND DATE(events.event_startdate) = CURDATE() ORDER BY DATE(events.event_startdate) ASC;");
        $stmt->bind_param("i", $employee_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $events = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
       
        return $events;
    }
    
    public function getAllEmployeeEvents($employee_id){
        $stmt = $this->conn->prepare("SELECT events.*, customers.customer_name FROM events LEFT JOIN customers ON events.customer_id = customers.customer_id WHERE FIND_IN_SET(?, events.participants) ORDER BY DATE(events.event_startdate) ASC;");
        $stmt->bind_param("i", $employee_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $events = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
       
        return $events;
    }
    
    public function getEmployeeWorkgroups($employee_id){
        $stmt = $this->conn->prepare("SELECT * FROM workgroups WHERE FIND_IN_SET(?, users)");
        $stmt->bind_param("i", $employee_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $workgroups = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
       
        return $workgroups;
    }
    
    public function getCustomers(){
        $stmt = $this->conn->prepare("SELECT customer_name, latitude, longitude FROM customers");
        $stmt->execute();
        $result = $stmt->get_result();
        $customers = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
       
        return $customers;
    }
    
    public function getFullSettings(){
        $stmt = $this->conn->prepare("SELECT * FROM settings");
        $stmt->execute();
        
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        
        return $row;
    }
	
	public function getEmployeeSettings($employee_id){
        $stmt = $this->conn->prepare("SELECT * FROM employee_settings WHERE employee_id = ?");
		$stmt->bind_param("i", $employee_id);
        if ($stmt->execute()){
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$row["error"] = false;
		 
			return $row;
		}else{
			$response = array();
			$response["error"] = true;
			return $response;
		}
    }
    
    public function getSettings(){
        $stmt = $this->conn->prepare("SELECT company_address, company_latitude, company_longitude, event_radius, location_radius, worktime_from, worktime_to, stop_duration, trip_cost, daily_allowance, travelorder_prefix, tracking_terms FROM settings");
        $settings = array();
        if ($stmt->execute()) {
			$stmt->bind_result($company_address, $company_latitude, $company_longitude, $event_radius, $location_radius, $worktime_from, $worktime_to, $stop_duration, $trip_cost, $daily_allowance, $travelorder_prefix, $tracking_terms);
			$stmt->fetch();
			$settings["company_address"] = $company_address;
			$settings["company_latitude"] = $company_latitude;
			$settings["company_longitude"] = $company_longitude;
			$settings["event_radius"] = $event_radius;
			$settings["location_radius"] = $location_radius;
			$settings["worktime_from"] = $worktime_from;
			$settings["worktime_to"] = $worktime_to;
			$settings["stop_duration"] = $stop_duration;
			$settings["trip_cost"] = $trip_cost;
			$settings["daily_allowance"] = $daily_allowance;
			$settings["travelorder_prefix"] = $travelorder_prefix;
			$settings["tracking_terms"] = $tracking_terms;
			$settings["error"] = false;
			
			$stmt->close();
			return $settings;
        }else{
            return null;
        }
    }
    
}

?>