<?php
 
error_reporting(-1);
ini_set('display_errors', 'On');
 
require_once '../include/db_handler.php';
require '.././libs/Slim/Slim.php';
 
\Slim\Slim::registerAutoloader();
 
$app = new \Slim\Slim();
 
$app->post('/login', function() use ($app) {
    
    // reading post params
    $username = $app->request->post('username');
    $password = $app->request->post('password');
	
    $db = new DbHandler();
    $response = $db->validateLogin($username, $password);
    
    // echo json response
	if ($response == NULL){
	    $response["error"] = true;
		echoResponse(200, $response);
	}
	else{
	    $response["error"] = false;
		echoResponse(200, $response);
	}
});

$app->post('/logoff', function() {
    global $app;
    $db = new DbHandler();
	
	$employee_id = $app->request->post('employee_id');
	
    $response = $db->employeeLogout($employee_id);
 
    echoResponse(200, $response);
});

$app->post('/customers', function() {
    global $app;
    $db = new DbHandler();
	
    $response = $db->getAllCustomers();
 
    echoResponse(200, $response);
});

$app->post('/customer/contacts', function() {
    global $app;
    $db = new DbHandler();
	$customer_id = $app->request->post('customer_id');
    $response = $db->getAllCustomerContacts($customer_id);
 
    echoResponse(200, $response);
});

$app->post('/customer/files', function() {
    global $app;
    $db = new DbHandler();
	$customer_id = $app->request->post('customer_id');
    $response = $db->getAllCustomerFiles($customer_id);
 
    echoResponse(200, $response);
});

$app->post('/event/files', function() {
    global $app;
    $db = new DbHandler();
	$event_id = $app->request->post('event_id');
    $response = $db->getAllEventFiles($event_id);
 
    echoResponse(200, $response);
});

$app->post('/workgrouptask/files', function() {
    global $app;
    $db = new DbHandler();
	$task_id = $app->request->post('task_id');
    $response = $db->getAllTaskFiles($task_id);
 
    echoResponse(200, $response);
});

$app->post('/ticket/files', function() {
    global $app;
    $db = new DbHandler();
	$ticket_id = $app->request->post('ticket_id');
    $response = $db->getAllTicketFiles($ticket_id);
 
    echoResponse(200, $response);
});

$app->post('/workorder/files', function() {
    global $app;
    $db = new DbHandler();
	$workorder_id = $app->request->post('workorder_id');
    $response = $db->getAllWorkorderFiles($workorder_id);
 
    echoResponse(200, $response);
});

$app->post('/customer/subsidiaries', function() {
    global $app;
    $db = new DbHandler();
	$customer_id = $app->request->post('customer_id');
    $response = $db->getAllCustomerSubsidiaries($customer_id);
 
    echoResponse(200, $response);
});

$app->post('/vehicles', function() {
    global $app;
    $db = new DbHandler();
	
    $response = $db->getAllVehicles();
 
    echoResponse(200, $response);
});

//workgroup functions

$app->post('/workgroup/sendmsg', function() {
    global $app;
    $db = new DbHandler();
	
	$workgroup_id = $app->request->post('workgroup_id');
	$employee_id = $app->request->post('employee_id');
	$message = $app->request->post('message');
	
    $response = $db->insertWorkgroupMessage($workgroup_id, $employee_id, $message);

    echoResponse(200, $response);
});

$app->post('/workgroup/tasks', function() {
    global $app;
    $db = new DbHandler();
	
	$workgroup_id = $app->request->post('workgroup_id');
	
    $response = $db->getWorkgroupTasks($workgroup_id);

    echoResponse(200, $response);
});

$app->post('/workgroup/addtask', function() {
    global $app;
    $db = new DbHandler();
	
	$task_subject = $app->request->post('task_subject');
	$task_description = $app->request->post('task_description');
	$task_startdate = $app->request->post('task_startdate');
	$task_starttime = $app->request->post('task_starttime');
	$task_enddate = $app->request->post('task_enddate');
	$task_endtime = $app->request->post('task_endtime');
	$task_location = $app->request->post('task_location');
	$priority = $app->request->post('priority');
	$latitude = $app->request->post('latitude');
	$longitude = $app->request->post('longitude');
	$participants = $app->request->post('participants');
	$employee_id = $app->request->post('employee_id');
	$customer_id = $app->request->post('customer_id');
	$workgroup_id = $app->request->post('workgroup_id');
	
    $response = $db->addWorkgroupTask($workgroup_id, $employee_id, $customer_id, $participants, $task_subject, $task_description, $priority, $task_startdate, $task_starttime, $task_enddate, $task_endtime, $task_location, $latitude, $longitude);

    echoResponse(200, $response);
});

$app->post('/workgroup/edittask', function() {
    global $app;
    $db = new DbHandler();
	
	$task_id = $app->request->post('task_id');
	$customer_id = $app->request->post('customer_id');
	$task_subject = $app->request->post('task_subject');
	$task_description = $app->request->post('task_description');
	$task_startdate = $app->request->post('task_startdate');
	$task_starttime = $app->request->post('task_starttime');
	$task_enddate = $app->request->post('task_enddate');
	$task_endtime = $app->request->post('task_endtime');
	$task_location = $app->request->post('task_location');
	$priority = $app->request->post('priority');
	$latitude = $app->request->post('latitude');
	$longitude = $app->request->post('longitude');
	$participants = $app->request->post('participants');
	$workgroup_id = $app->request->post('workgroup_id');
	
    $response = $db->editWorkgroupTask($task_id, $workgroup_id, $customer_id, $participants, $task_subject, $task_description, $priority, $task_startdate, $task_starttime, $task_enddate, $task_endtime, $task_location, $latitude, $longitude);

    echoResponse(200, $response);
});

$app->post("/workgroup/taskstatus", function(){
    global $app;
    $db = new DbHandler();
	
	$task_id = $app->request->post('task_id');
	$status = $app->request->post('status');
	
	$response = $db->updateWorkgroupTaskStatus($task_id, $status);

    echoResponse(200, $response);
});


$app->post('/workgroup/messages', function() {
    global $app;
    $db = new DbHandler();
	
	$workgroup_id = $app->request->post('workgroup_id');
	
    $response = $db->getWorkgroupMessages($workgroup_id);

    echoResponse(200, $response);
});

$app->post('/workgroup/files', function() {
    global $app;
    $db = new DbHandler();
	
	$workgroup_id = $app->request->post('workgroup_id');
	
    $response = $db->getWorkgroupFiles($workgroup_id);

    echoResponse(200, $response);
});

//end workgroup functions

$app->post('/customer/edit', function() {
    global $app;
    $db = new DbHandler();
	
	$customer_id = $app->request->post('customer_id');
	$customer_name = $app->request->post('customer_name');
	$customer_notes = $app->request->post('customer_notes');
	$customer_email = $app->request->post('customer_email');
	$customer_phone = $app->request->post('customer_phone');
	$customer_website = $app->request->post('customer_website');
	$customer_address = $app->request->post('customer_address');
	$latitude = $app->request->post('latitude');
	$longitude = $app->request->post('longitude');
	$employee_id = $app->request->post('employee_id');
	$customer_importance = $app->request->post('customer_importance');
	
    $response = $db->editCustomer($customer_id, $customer_name, $customer_notes, $customer_email, $customer_phone, $customer_website, $customer_address, $latitude, $longitude, $employee_id, $customer_importance);

    echoResponse(200, $response);
});

$app->post('/employee/settings', function() {
    global $app;
    $db = new DbHandler();
	
	$employee_id = $app->request->post('employee_id');
	$calendar_view = $app->request->post('calendar_view');
	$calendar_view = $calendar_view == "true" ? 1 : 0;
	$fingerprint_auth = $app->request->post('fingerprint_auth');
	$fingerprint_auth = $fingerprint_auth == "true" ? 1 : 0;
	$calendar_startday = $app->request->post('calendar_startday');
	$automatic_tracking = $app->request->post('automatic_tracking');
	$automatic_tracking = $automatic_tracking == "true" ? 1 : 0;
	$navigation_screen_on = $app->request->post('navigation_screen_on');
	$navigation_screen_on = $navigation_screen_on == "true" ? 1 : 0;
	$gps_interval = $app->request->post('gps_interval');
	$voiced_navigation = $app->request->post('voiced_navigation');
	$voiced_navigation = $voiced_navigation == "true" ? 1 : 0;
	$navigation_volume = $app->request->post('navigation_volume');
	$tracking_notifications = $app->request->post('tracking_notifications');
	$tracking_notifications = $tracking_notifications == "true" ? 1 : 0;
	$reservation_notification = $app->request->post('reservation_notification');
	$general_notifications = $app->request->post('general_notifications');
	$general_notifications = $general_notifications == "true" ? 1 : 0;
	$notification_vibrations = $app->request->post('notification_vibrations');
	$notification_vibrations = $notification_vibrations == "true" ? 1 : 0;
	$event_notification = $app->request->post('event_notification');
	$event_notification = $event_notification == "true" ? 1 : 0;
	
	$response = $db->updateEmployeeSettings($employee_id, $calendar_view, $fingerprint_auth, $calendar_startday, $automatic_tracking, $navigation_screen_on, $gps_interval, $voiced_navigation, $navigation_volume, $tracking_notifications,
	$reservation_notification, $general_notifications, $notification_vibrations, $event_notification);
	
	echoResponse(200, $response);
	
});

$app->post('/subsidiary/add', function() {
	global $app;
    $db = new DbHandler();
	
	$customer_id = $app->request->post('customer_id');
	$employee_id = $app->request->post('employee_id');
	$subsidiary_name = $app->request->post('subsidiary_name');
	$subsidiary_vat = $app->request->post('subsidiary_vat');
	$subsidiary_phone = $app->request->post('subsidiary_phone');
	$subsidiary_email = $app->request->post('subsidiary_email');
	$subsidiary_building = $app->request->post('subsidiary_building');
	$subsidiary_address = $app->request->post('subsidiary_address');
	$latitude = $app->request->post('latitude');
	$longitude = $app->request->post('longitude');
	$subsidiary_notes = $app->request->post('subsidiary_notes');
	
	$response = $db->addSubsidiary($customer_id, $employee_id, $subsidiary_name, $subsidiary_vat, $subsidiary_phone, $subsidiary_email, $subsidiary_building, $subsidiary_address, $latitude, $longitude, $subsidiary_notes);
	echoResponse(200, $response);
});

$app->post('/contact/add', function() {
	global $app;
    $db = new DbHandler();
	
	$customer_id = $app->request->post('customer_id');
	$employee_id = $app->request->post('employee_id');
	$contact_name = $app->request->post('contact_name');
	$contact_surname = $app->request->post('contact_surname');
	$contact_position = $app->request->post('contact_position');
	$contact_type = $app->request->post('contact_type');
	$contact_phone = $app->request->post('contact_position');
	$contact_email = $app->request->post('contact_email');
	$contact_notes = $app->request->post('contact_notes');
	
	$response = $db->addContact($customer_id, $employee_id, $contact_name, $contact_surname, $contact_position, $contact_type, $contact_phone, $contact_email, $contact_notes);
	echoResponse(200, $response);
});

$app->post('/employee/addevent', function() {
    global $app;
    $db = new DbHandler();
	
	$event_type = $app->request->post('event_type');
	$event_subject = $app->request->post('event_subject');
	$employee_id = $app->request->post('employee_id');
	$participants = $app->request->post('participants');
	$customer_id = $app->request->post('customer_id');
	if ($customer_id == ""){
		$customer_id = null;
	}
	$event_address = $app->request->post('event_address');
	$latitude = $app->request->post('latitude');
	$longitude = $app->request->post('longitude');
	$event_startdate = $app->request->post('event_startdate');
	$event_starttime = $app->request->post('event_starttime');
	$event_enddate = $app->request->post('event_enddate');
	$event_endtime = $app->request->post('event_endtime');
	$reminder1 = $app->request->post('reminder1');
	$reminder2 = $app->request->post('reminder2');
	$reminder3 = $app->request->post('reminder3');
	$importance = $app->request->post('event_importance');
	$event_description = $app->request->post('event_description');
	
	$reminderString = "";
	if ($reminder1 != ""){
	    $reminderString = $reminder1;
	}
	if ($reminder2 != ""){
	    if ($reminderString != ""){
	        $reminderString .= ";" . $reminder2;
	    }else{
	        $reminderString = $reminder2;
	    }
	}
	if ($reminder3 != ""){
	    if ($reminderString != ""){
	        $reminderString .= ";" . $reminder3;
	    }else{
	        $reminderString = $reminder3;
	    }
	}
	
    $response = $db->addEvent($event_type, $event_subject, $participants, $employee_id, $customer_id, $event_address, $latitude, $longitude, $event_startdate, $event_starttime, $event_enddate, $event_endtime, $reminderString, $importance, $event_description);
    
    $event_id = $response["event_id"];
    if ($reminder1 != ""){
	    $db->addReminder($event_id, $customer_id, $employee_id, $reminder1);
	}
	if ($reminder2 != ""){
	    $db->addReminder($event_id, $customer_id, $employee_id, $reminder2);
	}
	if ($reminder3 != ""){
	    $db->addReminder($event_id, $customer_id, $employee_id, $reminder3);
	}
 
    echoResponse(200, $response);
});

$app->post('/employee/eventstatus', function() {
    global $app;
    $db = new DbHandler();
	
	$event_id = $app->request->post('event_id');
	$status = $app->request->post('status');
	
    $response = $db->updateEventStatus($event_id, $status);
    
    echoResponse(200, $response);
});

$app->post('/travelorder/create', function() {
    global $app;
    $db = new DbHandler();
	
	$employee_id = $app->request->post('employee_id');
	$vehicle_id = $app->request->post('vehicle_id');
	$date_from = $app->request->post('date_from');
	$time_from = $app->request->post('time_from');
	$date_to = $app->request->post('date_to');
	$time_to = $app->request->post('time_to');
	
	$last_order = $db->getLastTravelOrder();
    $last_id = $last_order["travelorder_id"];
    $settings = $db->getFullSettings();
    $travelorder_number = $settings["travelorder_prefix"] . "-" . (intval($last_id) + 1);
	
    $reservation_id = $db->createVehicleReservation($employee_id, $vehicle_id, $date_from, $time_from, $date_to, $time_to);
    $travelorder_id = $db->createTravelOrder($travelorder_number, $employee_id, $vehicle_id, $date_from, $time_from, $date_to, $time_to);
    $trip_id = $db->createTripOrder($employee_id, $vehicle_id, $reservation_id, $travelorder_id, "");
    $response = $db->setTravelOrderTripID($travelorder_id, $trip_id);
    
    echoResponse(200, $response);
});

$app->post('/employee/travelorders', function() {
    global $app;
    $db = new DbHandler();
	
	$employee_id = $app->request->post('employee_id');
	
    $response = $db->getEmployeeTravelOrders($employee_id);
    
    echoResponse(200, $response);
});

$app->post('/employee/tickets', function() {
    global $app;
    $db = new DbHandler();
	
	$employee_id = $app->request->post('employee_id');
	
    $response = $db->getEmployeeTickets($employee_id);
    
    echoResponse(200, $response);
});

$app->post('/ticket/status', function() {
    global $app;
    $db = new DbHandler();
	
	$ticket_id = $app->request->post('ticket_id');
	$status = $app->request->post('status');
	
    $response = $db->updateTicketStatus($ticket_id, $status);
    
    echoResponse(200, $response);
});

$app->post('/workorder/status', function() {
    global $app;
    $db = new DbHandler();
	
	$workorder_id = $app->request->post('workorder_id');
	$status = $app->request->post('status');
	
    $response = $db->updateWorkorderStatus($workorder_id, $status);
    
    echoResponse(200, $response);
});

$app->post('/workorder/items', function() {
    global $app;
    $db = new DbHandler();
	
	$workorder_id = $app->request->post('workorder_id');
	
    $response = $db->getWorkorderItems($workorder_id);
    
    echoResponse(200, $response);
});

$app->post('/workorder/itemquantity', function() {
    global $app;
    $db = new DbHandler();

	$entry_id = $app->request->post('entry_id');
	$item_amount = $app->request->post('quantity');
	
    $response = $db->updateWorkorderItemQuantity($entry_id, $item_amount);
    
    echoResponse(200, $response);
});

$app->post('/employee/workorders', function() {
    global $app;
    $db = new DbHandler();
	
	$employee_id = $app->request->post('employee_id');
	
    $response = $db->getEmployeeWorkorders($employee_id);
    
    echoResponse(200, $response);
});

$app->post('/employee/fcmtoken', function() {
    global $app;
    $db = new DbHandler();
	
	$employee_id = $app->request->post('employee_id');
	$fcm_token = $app->request->post('fcm_token');
	
    $response = $db->storeEmployeeToken($employee_id, $fcm_token);
    
    echoResponse(200, $response);
});

$app->post('/employee/eventdistance', function() {
    global $app;
    $db = new DbHandler();
	
	$event_id = $app->request->post('event_id');
	$distance = $app->request->post('distance');
	
    $response = $db->updateEventDistance($event_id, $distance);
    
    echoResponse(200, $response);
});

$app->post('/employee/taskstatus', function() {
    global $app;
    $db = new DbHandler();
	
	$task_id = $app->request->post('task_id');
	$status = $app->request->post('status');
	
    $response = $db->updateTaskStatus($task_id, $status);
    
    echoResponse(200, $response);
});

$app->post('/event/delete', function() {
    global $app;
    $db = new DbHandler();
	
	$event_id = $app->request->post('event_id');
	
    $response = $db->deleteEvent($event_id);
    
    echoResponse(200, $response);
});

$app->post('/workgrouptask/delete', function() {
    global $app;
    $db = new DbHandler();
	
	$task_id = $app->request->post('task_id');
	
    $response = $db->deleteWorkgroupTask($task_id);
    
    echoResponse(200, $response);
});


$app->post('/employee/editevent', function() {
    global $app;
    $db = new DbHandler();
	
	$event_id = $app->request->post('event_id');
	$event_type = $app->request->post('event_type');
	$event_subject = $app->request->post('event_subject');
	$employee_id = $app->request->post('employee_id');
	$participants = $app->request->post('participants');
	$customer_id = $app->request->post('customer_id');
	if ($customer_id == ""){
		$customer_id = null;
	}
	$event_address = $app->request->post('event_address');
	$latitude = $app->request->post('latitude');
	$longitude = $app->request->post('longitude');
	$event_startdate = $app->request->post('event_startdate');
	$event_starttime = $app->request->post('event_starttime');
	$event_enddate = $app->request->post('event_enddate');
	$event_endtime = $app->request->post('event_endtime');
	$reminder1 = $app->request->post('reminder1');
	$reminder2 = $app->request->post('reminder2');
	$reminder3 = $app->request->post('reminder3');
	$importance = $app->request->post('event_importance');
	$event_description = $app->request->post('event_description');
	
	$reminderString = "";
	if ($reminder1 != ""){
	    $reminderString = $reminder1;
	}
	if ($reminder2 != ""){
	    if ($reminderString != ""){
	        $reminderString .= ";" . $reminder2;
	    }else{
	        $reminderString = $reminder2;
	    }
	}
	if ($reminder3 != ""){
	    if ($reminderString != ""){
	        $reminderString .= ";" . $reminder3;
	    }else{
	        $reminderString = $reminder3;
	    }
	}
	
    $response = $db->editEvent($event_id, $event_type, $event_subject, $participants, $employee_id, $customer_id, $event_address, $latitude, $longitude, $event_startdate, $event_starttime, $event_enddate, $event_endtime, $reminderString, $importance, $event_description);
    
    $db->removeEventReminders($event_id);
    if ($reminder1 != ""){
	    $db->addReminder($event_id, $customer_id, $employee_id, $reminder1);
	}
	if ($reminder2 != ""){
	    $db->addReminder($event_id, $customer_id, $employee_id, $reminder2);
	}
	if ($reminder3 != ""){
	    $db->addReminder($event_id, $customer_id, $employee_id, $reminder3);
	}
 
    echoResponse(200, $response);
});

$app->post('/employee/addtask', function() {
    global $app;
    $db = new DbHandler();
	
	$employee_id = $app->request->post('employee_id');
	$task_uid = $app->request->post('task_uid');
	$task_subject = $app->request->post('task_subject');
	$task_description = $app->request->post('task_description');
	$task_startdate = $app->request->post('task_startdate');
	$task_starttime = $app->request->post('task_starttime');
	$task_enddate = $app->request->post('task_enddate');
	$task_endtime = $app->request->post('task_endtime');
	$task_location = $app->request->post('task_location');
	$latitude = $app->request->post('latitude');
	$longitude = $app->request->post('longitude');
	$last_modified = $app->request->post('last_modified');
	
    $response = $db->addTask($employee_id, $task_uid, $task_subject, $task_description, $task_startdate, $task_starttime, $task_enddate, $task_endtime, $task_location, $latitude, $longitude, $last_modified);

    echoResponse(200, $response);
});

$app->post('/employee/edittask', function() {
    global $app;
    $db = new DbHandler();
	
	$task_id = $app->request->post('task_id');
	$employee_id = $app->request->post('employee_id');
	$task_uid = $app->request->post('task_uid');
	$task_subject = $app->request->post('task_subject');
	$task_description = $app->request->post('task_description');
	$task_startdate = $app->request->post('task_startdate');
	$task_starttime = $app->request->post('task_starttime');
	$task_enddate = $app->request->post('task_enddate');
	$task_endtime = $app->request->post('task_endtime');
	$task_location = $app->request->post('task_location');
	$latitude = $app->request->post('latitude');
	$longitude = $app->request->post('longitude');
	$last_modified = $app->request->post('last_modified');
	
    $response = $db->editTask($task_id, $employee_id, $task_uid, $task_subject, $task_description, $task_startdate, $task_starttime, $task_enddate, $task_endtime, $task_location, $latitude, $longitude, $last_modified);
 
    echoResponse(200, $response);
});


$app->post('/employee/events', function() {
    global $app;
    $db = new DbHandler();
	
	$employee_id = $app->request->post('employee_id');
	
    $response = $db->getEmployeeEvents($employee_id);
 
    echoResponse(200, $response);
});

$app->post('/employee/workgroups', function() {
    global $app;
    $db = new DbHandler();
	
	$employee_id = $app->request->post('employee_id');
	
    $response = $db->getEmployeeWorkgroups($employee_id);
 
    echoResponse(200, $response);
});

$app->post('/employees/list', function() {
    global $app;
    $db = new DbHandler();
	
    $response = $db->getEmployeeList();
 
    echoResponse(200, $response);
});

$app->post('/employee/allevents', function() {
    global $app;
    $db = new DbHandler();
	
	$employee_id = $app->request->post('employee_id');
	
    $response = $db->getAllEmployeeEvents($employee_id);
 
    echoResponse(200, $response);
});

$app->post('/employee/alltasks', function() {
    global $app;
    $db = new DbHandler();
	
	$employee_id = $app->request->post('employee_id');
	
    $response = $db->getAllEmployeeTasks($employee_id);
 
    echoResponse(200, $response);
});

$app->post('/employee/allevents', function() {
    global $app;
    $db = new DbHandler();
	
	$employee_id = $app->request->post('employee_id');
	
    $response = $db->getAllEmployeeEvents($employee_id);
 
    echoResponse(200, $response);
});

$app->post('/event/getnotes', function() {
    global $app;
    $db = new DbHandler();
	
	$event_id = $app->request->post('event_id');
	
    $response = $db->getEventNotes($event_id);
 
    echoResponse(200, $response);
});

$app->post('/event/addnote', function() {
    global $app;
    $db = new DbHandler();
	
	$event_id = $app->request->post('event_id');
	$employee_id = $app->request->post('employee_id');
	$note = $app->request->post('note');
	
    $response = $db->addEventNote($event_id, $employee_id, $note);
 
    echoResponse(200, $response);
});

$app->post('/workgrouptask/getnotes', function() {
    global $app;
    $db = new DbHandler();
	
	$task_id = $app->request->post('task_id');
	
    $response = $db->getWorkgroupTaskNotes($task_id);
 
    echoResponse(200, $response);
});

$app->post('/ticket/getnotes', function() {
    global $app;
    $db = new DbHandler();
	
	$ticket_id = $app->request->post('ticket_id');
	
    $response = $db->getTicketNotes($ticket_id);
 
    echoResponse(200, $response);
});

$app->post('/workorder/getnotes', function() {
    global $app;
    $db = new DbHandler();
	
	$workorder_id = $app->request->post('workorder_id');
	
    $response = $db->getWorkorderNotes($workorder_id);
 
    echoResponse(200, $response);
});

$app->post('/event/addnote', function() {
    global $app;
    $db = new DbHandler();
	
	$event_id = $app->request->post('event_id');
	$employee_id = $app->request->post('employee_id');
	$note = $app->request->post('note');
	
    $response = $db->addEventNote($event_id, $employee_id, $note);
 
    echoResponse(200, $response);
});

$app->post('/workgrouptask/addnote', function() {
    global $app;
    $db = new DbHandler();
	
	$task_id = $app->request->post('task_id');
	$employee_id = $app->request->post('employee_id');
	$note = $app->request->post('note');
	
    $response = $db->addWorkgroupTaskNote($task_id, $employee_id, $note);
 
    echoResponse(200, $response);
});

$app->post('/ticket/addnote', function() {
    global $app;
    $db = new DbHandler();
	
	$ticket_id = $app->request->post('ticket_id');
	$employee_id = $app->request->post('employee_id');
	$note = $app->request->post('note');
	
    $response = $db->addTicketNote($ticket_id, $employee_id, $note);
 
    echoResponse(200, $response);
});

$app->post('/workorder/addnote', function() {
    global $app;
    $db = new DbHandler();
	
	$workorder_id = $app->request->post('workorder_id');
	$employee_id = $app->request->post('employee_id');
	$note = $app->request->post('note');
	
    $response = $db->addWorkorderNote($workorder_id, $employee_id, $note);
 
    echoResponse(200, $response);
});


$app->post('/event/update', function() {
    global $app;
    $db = new DbHandler();
	
	$event_id = $app->request->post('event_id');
	$status = $app->request->post('status');
	
    $response = $db->updateEvent($event_id, $status);
 
    echoResponse(200, $response);
});

$app->post('/event/reached', function() {
    global $app;
    $db = new DbHandler();
	
	$event_id = $app->request->post('event_id');
	$status = $app->request->post('status');
	
    $response = $db->updateEventReached($event_id, $status);
 
    echoResponse(200, $response);
});

$app->post('/event/ended', function() {
    global $app;
    $db = new DbHandler();
	
	$event_id = $app->request->post('event_id');
	$status = $app->request->post('status');
	
    $response = $db->updateEventEnded($event_id, $status);
 
    echoResponse(200, $response);
});

$app->post('/settings', function() {
    global $app;
    $db = new DbHandler();
	
    $response = $db->getSettings();
 
    echoResponse(200, $response);
});

$app->post('/employee/getsettings', function() {
    global $app;
    $db = new DbHandler();
	$employee_id = $app->request->post('employee_id');
	
    $response = $db->getEmployeeSettings($employee_id);
 
    echoResponse(200, $response);
});

$app->post('/location', function() { //function to update CRM app location
    global $app;
    $db = new DbHandler();
	
	$employee_id = $app->request->post('employee_id');
	$speed = $app->request->post('speed');
	$latitude = $app->request->post('latitude');
	$longitude = $app->request->post('longitude');
	$distance = $app->request->post('distance');
	$datetime = $app->request->post('datetime');
	$response = $db->employeeLocationLog($employee_id, $speed, $latitude, $longitude, "Log", $datetime);
    $db->employeeLocation($employee_id, $speed, $latitude, $longitude, $distance);
 
    echoResponse(200, $response);
});

//Tracking app functions

$app->post('/location/update', function() { //function to update track app location
    global $app;
    $db = new DbHandler();
	
	$employee_id = $app->request->post('employee_id');
	$latitude = $app->request->post('latitude');
	$longitude = $app->request->post('longitude');
    $response = $db->trackingLocation($employee_id, $latitude, $longitude);
 
    echoResponse(200, $response);
});

$app->post('/locations/get', function() { //function to get employee work locations for the day
    global $app;
    $db = new DbHandler();
	
	$employee_id = $app->request->post('employee_id');
    $response = $db->getTodaysLocations($employee_id);
 
    echoResponse(200, $response);
});

$app->post('/trackinglogs/get', function() { //function to get employee work locations for the day
    global $app;
    $db = new DbHandler();
	
	$employee_id = $app->request->post('employee_id');
    $response = $db->getTodaysLogs($employee_id);
 
    echoResponse(200, $response);
});

$app->post('/location/arrival', function() { //function to mark location arrival for tracking app
    global $app;
    $db = new DbHandler();
	
	$employee_id = $app->request->post('employee_id');
	$location_id = $app->request->post('location_id');
	$exists = $db->trackingLogExists($employee_id, $location_id);
	if (!$exists){
	    $db->markWorkLocationVisited($location_id);
        $response = $db->trackingArrival($employee_id, $location_id);
	}else{
	    $response = array();
	    $response["error"] = true;
	}
 
    echoResponse(200, $response);
});

$app->post('/location/departure', function() { //function to mark location arrival for tracking app
    global $app;
    $db = new DbHandler();
	
	$employee_id = $app->request->post('employee_id');
	$location_id = $app->request->post('location_id');

    $response = $db->trackingDeparture($employee_id, $location_id);
	
    echoResponse(200, $response);
});

$app->post('/location/token', function() { //function to mark location arrival for tracking app
    global $app;
    $db = new DbHandler();
	
	$employee_id = $app->request->post('employee_id');
	$fcm_token = $app->request->post('fcm_token');

    $response = $db->storeTrackingToken($employee_id, $fcm_token);
	
    echoResponse(200, $response);
});

$app->post('/location/manualarrival', function() { //function to mark location arrival for tracking app
    global $app;
    $db = new DbHandler();
	
	$employee_id = $app->request->post('employee_id');
	$address = $app->request->post('address');
	$latitude = $app->request->post('latitude');
	$longitude = $app->request->post('longitude');
	$location_id = $db->addWorkLocation($employee_id, $address, $latitude, $longitude);
	$db->markWorkLocationVisited($location_id);
    $response = $db->trackingManualArrival($employee_id, $location_id);
 
    echoResponse(200, $response);
});

$app->post('/location/manualdeparture', function() { //function to mark location arrival for tracking app
    global $app;
    $db = new DbHandler();
	
	$employee_id = $app->request->post('employee_id');
	$location_id = $app->request->post('location_id');
    $response = $db->trackingManualDeparture($employee_id, $location_id);
 
    echoResponse(200, $response);
});

$app->post('/location/nfc', function() { //function to mark location arrival for tracking app
    global $app;
    $db = new DbHandler();
	
	$employee_id = $app->request->post('employee_id');
	$location_id = $app->request->post('location_id');
	$nfc_tag = $app->request->post('nfc_tag');
    $response = $db->trackingArrivalNFC($employee_id, $location_id, $nfc_tag);
 
    echoResponse(200, $response);
});

$app->post('/unknown/nfc', function() { //function to mark location arrival for tracking app
    global $app;
    $db = new DbHandler();
	
	$employee_id = $app->request->post('employee_id');
	$nfc_tag = $app->request->post('nfc_tag');
	
	$nfc = $db->checkNFCExists($nfc_tag);
	if ($nfc != null){
		$location_id = $db->checkTodaysLocationsByCustomer($employee_id, $nfc["customer_id"]);
		if ($location_id != null){
			$response = $db->trackingArrivalNFC($employee_id, $location_id, $nfc_tag);
		}else{
			$response = array();
			$response["error"] = true;
			$response["message"] = "Location with this NFC not found";
		}
	}else{
		$response = array();
		$response["error"] = true;
		$response["message"] = "NFC with this tag does not exist in database";
	}
 
    echoResponse(200, $response);
});

$app->post('/trackinglogs/add', function() { //function to mark location arrival for tracking app
    global $app;
    $db = new DbHandler();
	
	$employee_id = $app->request->post('employee_id');
	$location_id = $app->request->post('location_id');
	$nfc_tag = $app->request->post('nfc_tag');
	$date = $app->request->post('date');
	if ($location_id != ""){
		$response = $db->trackingDelayedArrivalNFC($employee_id, $location_id, $nfc_tag, $date);
	}else{
		$nfc = $db->checkNFCExists($nfc_tag);
		if ($nfc != null){
			$location_id = $db->checkTodaysLocationsByCustomer($employee_id, $nfc["customer_id"]);
			if ($location_id != null){
				$response = $db->trackingDelayedArrivalNFC($employee_id, $location_id, $nfc_tag, $date);
			}else{
				$response = array();
				$response["error"] = true;
				$response["message"] = "Location with this NFC not found";
			}
		}else{
			$response = array();
			$response["error"] = true;
			$response["message"] = "NFC with this tag does not exist in database";
		}
	}
 
    echoResponse(200, $response);
});

//End of tracking app functions


$app->post('/employee/distance', function() {
    global $app;
    $db = new DbHandler();
	
	$employee_id = $app->request->post('employee_id');
	$distance = $app->request->post('distance');
	
    $response = $db->employeeDistance($employee_id, $distance);
 
    echoResponse(200, $response);
});

$app->post('/location/logs', function() {
    global $app;
    $db = new DbHandler();
	
	$employee_id = $app->request->post('employee_id');
	$latitude = $app->request->post('latitude');
	$longitude = $app->request->post('longitude');
	$speed = $app->request->post('speed');
	$datetime = $app->request->post('datetime');
	$response = $db->employeeLocationLog($employee_id, $speed, $latitude, $longitude, "Log", $datetime);
 
    echoResponse(200, $response);
});

$app->post('/calls/log', function() {
    global $app;
    $db = new DbHandler();
	
	$employee_id = $app->request->post('employee_id');
	$phonenumber = $app->request->post('phonenumber');
	$call_start = $app->request->post('call_start');
	$call_end = $app->request->post('call_end');
	$type = $app->request->post('type');
	$customer_id = null;
	$customer = $db->getCustomerByPhone($phonenumber);
	if (!is_array($customer)){
		$contact = $db->getContactByPhone($phonenumber);
		if (is_array($contact)){
			$customer_id = $contact["customer_id"];
		}
	}else{
		$customer_id = $customer["customer_id"];
	}
	$response = $db->addCallLog($employee_id, $phonenumber, $customer_id, $call_start, $call_end, $type);
	$response["customer_id"] = $customer_id;
 
    echoResponse(200, $response);
});

$app->post('/calls/outgoing', function() {
    global $app;
    $db = new DbHandler();
	
	$employee_id = $app->request->post('employee_id');
	$phonenumber = $app->request->post('phonenumber');
	$customer_id = $app->request->post('customer_id');
	$call_duration = $app->request->post('duration');
	
	$response = $db->addOutgoingCall($employee_id, $phonenumber, $customer_id, $call_duration);
 
    echoResponse(200, $response);
});

$app->post('/employee/stop', function() {
    global $app;
    $db = new DbHandler();
	
	$employee_id = $app->request->post('employee_id');
	$duration = $app->request->post('duration');
	$latitude = $app->request->post('latitude');
	$longitude = $app->request->post('longitude');
	$start_time = $app->request->post("start_time");
	$end_time = $app->request->post("end_time");
	$speed = 0;
	$customers = $db->getCustomers();
	$customer_id = null;
	$earthRadius = 6371000;
	$minRadius = 50;
	foreach ($customers as $customer){
    	  // convert from degrees to radians
          $latFrom = deg2rad($latitude);
          $lonFrom = deg2rad($longitude);
          $latTo = deg2rad($customer["latitude"]);
          $lonTo = deg2rad($customer["longitude"]);
        
          $latDelta = $latTo - $latFrom;
          $lonDelta = $lonTo - $lonFrom;
        
          $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) + cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
          $distanceInMeters = $angle * $earthRadius;
          if ($distanceInMeters < $minRadius){
              $minRadius = $distanceInMeters;
              $customer_id = $customer["customer_id"];
          }
	}
    $response = $db->addEmployeeStop($employee_id, $duration, $latitude, $longitude, $start_time, $end_time, $customer_id);
    $db->employeeLocationLog($employee_id, $speed, $latitude, $longitude, "Stop", $end_time);
    echoResponse(200, $response);
});

$app->post('/version', function() {
    global $app;
    
    $version = "7";
    
    $response = array();
    $response["error"] = false;
    $response["version"] = $version;
 
    echoResponse(200, $response);
});

$app->post('/version/simple', function() {
    global $app;
    
    $db = new DbHandler();
    $settings = $db->getSettings();
    $version = "6";
    $terms = $settings["tracking_terms"];
    
    $response = array();
    $response["error"] = false;
    $response["version"] = $version;
    $response["terms"] = $terms;
 
    echoResponse(200, $response);
});

$app->post('/upload', function() {
    
    global $app;
	
	$db = new DbHandler();
    
    $target_dir = "../Uploads/EmployeeFiles/";
    $employee_id = $_POST["employee_id"];
    $uploaddir = $target_dir . "Employee" . $employee_id;
    
    if (!is_dir($uploaddir) && !mkdir($uploaddir)){
      die("Error creating folder $uploaddir");
    }
    $actual_file_name = basename($_FILES["file"]["name"]);
    $target_file = $uploaddir . "/" . $actual_file_name;
    $uploadOk = 1;
    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        $response = array("error" => true, "message" => "File is not an image.");
        $uploadOk = 0;
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        $response = array("error" => true, "message" => "File already exists.");
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            $db = new DbHandler();
            $employeeDir = "Uploads/EmployeeFiles/Employee" . $employee_id . "/" . $actual_file_name;
            $response = $db->addFileUpload($employee_id, null, null, null, null, null, $actual_file_name, $employeeDir); //params - employee_id, customer_id, event_id, task_id, ticket_id, workorder_id, filename, filepath
        } else {
            $response = array("error" => true, "message" => "Failed to move file to target directory");
        }
    }
    
    echoResponse(200, $response);

});

$app->post('/upload/event', function() {
    
    global $app;
	
	$db = new DbHandler();
	
    $employee_id = $_POST["employee_id"];
    $event_id = $_POST["event_id"];
    $event = $db->getEventByID($event_id);
    
    $target_dir = "../Uploads/EventFiles/";
    $uploaddir = "../Uploads/EmployeeFiles/" . "Employee" . $employee_id;
    if (!is_dir($uploaddir) && !mkdir($uploaddir)){
      die("Error creating folder $uploaddir");
    }
    $actual_file_name = basename($_FILES["file"]["name"]);
    $target_file = $target_dir . $actual_file_name;
    $target_file2 = $uploaddir . "/" . $actual_file_name;
    $uploadOk = 1;
    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        $response = array("error" => true, "message" => "File is not an image.");
        $uploadOk = 0;
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        $response = array("error" => true, "message" => "File already exists.");
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            if (copy($target_file, $target_file2)){
                $db = new DbHandler();
                $eventDir = "Uploads/EventFiles/" . $actual_file_name;
                $response = $db->addFileUpload($employee_id, $event["customer_id"], $event_id, null, null, null, $actual_file_name, $eventDir); //params - employee_id, customer_id, event_id, task_id, ticket_id, workorder_id, filename, filepath
                
            	$currentEventFiles = $event["event_files"];
            	
            	if ($currentEventFiles == ""){
            	    $currentEventFiles = $actual_file_name;
            	}else{
            	    $currentEventFiles .= ";" . $actual_file_name;
            	}
            
                $db->updateEventFiles($event_id, $currentEventFiles);
            }else{
                $response = array("error" => true, "message" => "Failed to copy file to target directory");
            }
        } else {
            $response = array("error" => true, "message" => "Failed to move file to target directory");
        }
    }
    echoResponse(200, $response);
});

$app->post('/upload/ticket', function() {
    
    global $app;
	
	$db = new DbHandler();
	
    $employee_id = $_POST["employee_id"];
    $ticket_id = $_POST["ticket_id"];
    $ticket = $db->getTicketByID($ticket_id);
    
    $target_dir = "../Uploads/OtherFiles/";
    $uploaddir = "../Uploads/EmployeeFiles/" . "Employee" . $employee_id;
    if (!is_dir($uploaddir) && !mkdir($uploaddir)){
      die("Error creating folder $uploaddir");
    }
    $actual_file_name = basename($_FILES["file"]["name"]);
    $target_file = $target_dir . $actual_file_name;
    $target_file2 = $uploaddir . "/" . $actual_file_name;
    $uploadOk = 1;
    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        $response = array("error" => true, "message" => "File is not an image.");
        $uploadOk = 0;
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        $response = array("error" => true, "message" => "File already exists.");
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            if (copy($target_file, $target_file2)){
                $db = new DbHandler();
                $ticketDir = "Uploads/OtherFiles/" . $actual_file_name;
                $response = $db->addFileUpload($employee_id, $ticket["customer_id"], null, null, $ticket_id, null, $actual_file_name, $ticketDir); //params - employee_id, customer_id, event_id, task_id, ticket_id, workorder_id, filename, filepath
                
            	$currentTicketFiles = $ticket["ticket_files"];
            	
            	if ($currentTicketFiles == ""){
            	    $currentTicketFiles = $actual_file_name;
            	}else{
            	    $currentTicketFiles .= ";" . $actual_file_name;
            	}
            
                $db->updateTicketFiles($ticket_id, $currentTicketFiles);
            }else{
                $response = array("error" => true, "message" => "Failed to copy file to target directory");
            }
        } else {
            $response = array("error" => true, "message" => "Failed to move file to target directory");
        }
    }
    echoResponse(200, $response);
});

$app->post('/upload/customer', function() {
    
    global $app;
	
	$db = new DbHandler();
	
    $employee_id = $_POST["employee_id"];
    $customer_id = $_POST["customer_id"];
    
    $target_dir = "../Uploads/OtherFiles/";
    $uploaddir = "../Uploads/EmployeeFiles/" . "Employee" . $employee_id;
    if (!is_dir($uploaddir) && !mkdir($uploaddir)){
      die("Error creating folder $uploaddir");
    }
    $actual_file_name = basename($_FILES["file"]["name"]);
    $target_file = $target_dir . $actual_file_name;
    $target_file2 = $uploaddir . "/" . $actual_file_name;
    $uploadOk = 1;
    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        $response = array("error" => true, "message" => "File is not an image.");
        $uploadOk = 0;
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        $response = array("error" => true, "message" => "File already exists.");
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            if (copy($target_file, $target_file2)){
                $db = new DbHandler();
                $customerDir = "Uploads/OtherFiles/" . $actual_file_name;
                $response = $db->addFileUpload($employee_id, $customer_id, null, null, null, null, $actual_file_name, $customerDir); //params - employee_id, customer_id, event_id, task_id, ticket_id, workorder_id, filename, filepath
            }else{
                $response = array("error" => true, "message" => "Failed to copy file to target directory");
            }
        } else {
            $response = array("error" => true, "message" => "Failed to move file to target directory");
        }
    }
    echoResponse(200, $response);
});

$app->post('/upload/workorder', function() {
    
    global $app;
	
	$db = new DbHandler();
	
    $employee_id = $_POST["employee_id"];
    $workorder_id = $_POST["workorder_id"];
    $workorder = $db->getWorkorderByID($workorder_id);
    
    $target_dir = "../Uploads/OtherFiles/";
    $uploaddir = "../Uploads/EmployeeFiles/" . "Employee" . $employee_id;
    if (!is_dir($uploaddir) && !mkdir($uploaddir)){
      die("Error creating folder $uploaddir");
    }
    $actual_file_name = basename($_FILES["file"]["name"]);
    $target_file = $target_dir . $actual_file_name;
    $target_file2 = $uploaddir . "/" . $actual_file_name;
    $uploadOk = 1;
    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        $response = array("error" => true, "message" => "File is not an image.");
        $uploadOk = 0;
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        $response = array("error" => true, "message" => "File already exists.");
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            if (copy($target_file, $target_file2)){
                $db = new DbHandler();
                $workorderDir = "Uploads/OtherFiles/" . $actual_file_name;
                $response = $db->addFileUpload($employee_id, $workorder["customer_id"], null, null, null, $workorder_id, $actual_file_name, $workorderDir); //params - employee_id, customer_id, event_id, task_id, ticket_id, workorder_id, filename, filepath
                
            	$currentWorkorderFiles = $workorder["workorder_files"];
            	
            	if ($currentWorkorderFiles == ""){
            	    $currentWorkorderFiles = $actual_file_name;
            	}else{
            	    $currentWorkorderFiles .= ";" . $actual_file_name;
            	}
            
                $db->updateWorkorderFiles($workorder_id, $currentWorkorderFiles);
            }else{
                $response = array("error" => true, "message" => "Failed to copy file to target directory");
            }
        } else {
            $response = array("error" => true, "message" => "Failed to move file to target directory");
        }
    }
    echoResponse(200, $response);
});


$app->post('/workgroup/upload', function() {
    
    global $app;
	
	$db = new DbHandler();
	
    $employee_id = $_POST["employee_id"];
    $task_id = $_POST["task_id"];
	$workgroup_id = $_POST["workgroup_id"];
    
    $target_dir = "../Workgroups/Workgroup" . $workgroup_id . "/";
    $uploaddir = "../Uploads/EmployeeFiles/Employee" . $employee_id;
    if (!is_dir($uploaddir) && !mkdir($uploaddir)){
      die("Error creating folder $uploaddir");
    }
    $actual_file_name = basename($_FILES["file"]["name"]);
    $target_file = $target_dir . $actual_file_name;
    $target_file2 = $uploaddir . "/" . $actual_file_name;
    $uploadOk = 1;
    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        $response = array("error" => true, "message" => "File is not an image.");
        $uploadOk = 0;
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        $response = array("error" => true, "message" => "File already exists.");
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            if (copy($target_file, $target_file2)){
                $db = new DbHandler();
				$workgroupDir = "Workgroups/Workgroup" . $workgroup_id . "/" . $actual_file_name;
                $response = $db->addFileUpload($employee_id, null, null, $task_id, null, null, $actual_file_name, $workgroupDir); //params - employee_id, customer_id, event_id, task_id, ticket_id, workorder_id, filename, filepath
                
                $task = $db->getWorkgroupTaskByID($task_id);
            	$currentTaskFiles = $task["task_files"];
            	
            	if ($currentTaskFiles == ""){
            	    $currentTaskFiles = $actual_file_name;
            	}else{
            	    $currentTaskFiles .= ";" . $actual_file_name;
            	}
            
                $db->updateWorkgroupTaskFiles($task_id, $currentTaskFiles);
            }else{
                $response = array("error" => true, "message" => "Failed to copy file to target directory");
            }
        } else {
            $response = array("error" => true, "message" => "Failed to move file to target directory");
        }
    }
    echoResponse(200, $response);
});


/**
 * Echoing json response to client
 * @param String $status_code Http response code
 * @param Int $response Json response
 */
function echoResponse($status_code, $response) {
    $app = \Slim\Slim::getInstance();
    // Http response code
    $app->status($status_code);
 
    // setting response content type to json
    $app->contentType('application/json');
 
    echo json_encode($response);
}

$app->run();

?>