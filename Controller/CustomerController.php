<?php

require_once("Model/CustomerDB.php");
require_once("Model/UserDB.php");
require_once("ViewHelper.php");


class CustomerController {
	
	public static function setCustomerSLA(){
		$data = $_POST;
		CustomerDB::setCustomerSLA($data["customer_id"], $data["low_sla"], $data["normal_sla"], $data["high_sla"]);
	}
    
    public static function showCustomerPage(){
        $customer = CustomerDB::getCustomerByID($_GET["customer_id"]);
        $employee = UserDB::getEmployeeByID($customer["employee_id"]);
		$added_by = UserDB::getEmployeeByID($customer["created_by"]);
        $contacts = CustomerDB::getCustomerContacts($_GET["customer_id"]);
        $events = CustomerDB::getCustomerEvents($_GET["customer_id"]);
        $calls = CustomerDB::getCustomerCalls($_GET["customer_id"]);
		$subsidiaries = CustomerDB::getSubsidiaries($_GET["customer_id"]);
		$allemployees = UserDB::getListOfAllUsers();
        $documents = CustomerDB::getCustomerDocuments($_GET["customer_id"]);
		$SLAStats = array();
		$alltickets = CustomerDB::getCustomerTickets($_GET["customer_id"]);
		$tickets_by_date = CustomerDB::getAllCustomerTicketsByDate($_GET["customer_id"]);
		$tickets_by_type = CustomerDB::getCustomerTicketsByType($_GET["customer_id"]);
		$ticketResponseTimes = CustomerDB::getAverageTicketResolutionTime($_GET["customer_id"]);
		$allworkorders = CustomerDB::getCustomerWorkorders($_GET["customer_id"]);
		$workorders_by_date = CustomerDB::getAllCustomerWorkordersByDate($_GET["customer_id"]);
		$workorderResponseTimes = CustomerDB::getAverageWorkorderResolutionTime($_GET["customer_id"]);
		$SLAStats["tickets"] = $alltickets;
		$SLAStats["tickets_by_date"] = $tickets_by_date;
		$SLAStats["tickets_by_type"] = $tickets_by_type;
		$SLAStats["ticket_resolution_times"] = $ticketResponseTimes;
		$SLAStats["workorders"] = $allworkorders;
		$SLAStats["workorders_by_date"] = $workorders_by_date;
		$SLAStats["workorder_resolution_times"] = $workorderResponseTimes;
        ViewHelper::render("View/customer_page.php", ["customer" => $customer, "added_by" => $added_by, "employee" => $employee, "contacts" => $contacts, "subsidiaries" => $subsidiaries, "events" => $events, "calls" => $calls, "employees" => $allemployees, "documents" => $documents, "sla" => $SLAStats]);
    }
    
    public static function getCustomerEvents(){
        $data = $_POST;
        $events = CustomerDB::getCustomerEvents($data["customer_id"]);
        
        echo json_encode($events);
    }
    
    public static function getCustomerDocuments(){
        $data = $_POST;
        $documents = CustomerDB::getCustomerDocuments($data["customer_id"]);
        
        echo json_encode($documents);
    }
    
    public static function getCustomerCalls(){
        $data = $_POST;
        $calls = CustomerDB::getCustomerCalls($data["customer_id"]);
        
        echo json_encode($calls);
    }
    
    public static function uploadCustomerFile(){
        $response = array();
        $ext = array (
                "jpg", "gif", "jpeg", "png", "doc", "docx", "xls", "xlsx", "csv", "ppt", "pptx", "pdf", "tif", "ico", "gif87", "zip", "rar", "7z"
        );
        $target_dir = "Uploads/EmployeeFiles/Employee" . $_SESSION["id"] . "/";
  		$target_file = $target_dir . basename($_FILES["file"]["name"]);
  		$extension = strtolower(pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION));
        $uploadOk = 1;
        
        // Check if file already exist
        // Check file size
        if (!in_array($extension, $ext)) {
            echo "Sorry, this this type of file (" . $extension . ") is not allowed for upload.";
            $uploadOk = 0;
        }else if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }else if ($_FILES["file"]["size"] > 20000000) { //5 MB max size
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                CustomerDB::saveCustomerFileUpload($_SESSION["id"], $_POST["customer_id"], $_FILES["file"]["name"], $target_file);
            } else {
                echo "There was an error with the file upload.";
            }
        }
    }
    
    public static function importCustomers(){
        $handle = fopen($_SESSION["csv"], 'r');
        $customer_importance = 5;
        $customer_visibility = 1;
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
                    $website = "";
                    $industry = "Other";
                    if ($_POST["customer_website"] != -1){
                        $website = $data[$_POST["customer_website"]];
                    }
                    if ($_POST["customer_industry"] != -1){
                        $industry = $data[$_POST["customer_industry"]];
                    }
                    CustomerDB::addCustomer($data[$_POST["customer_name"]], "", "1", "0", $data[$_POST["customer_phone"]], $data[$_POST["customer_email"]], $website, $data[$_POST["customer_address"]], $industry, $data[$_POST["customer_latitude"]], $data[$_POST["customer_longitude"]], $_POST["employee_id"], $data[$_POST["customer_notes"]], $customer_importance, $customer_visibility, $_SESSION["id"]);
                }
                $row++;
            }
            fclose($handle);
        }
    }
    
    public static function getCustomerContacts(){
        $data = $_POST;
        $contacts = CustomerDB::getCustomerContacts($data["customer_id"]);
        
        echo json_encode($contacts);
    }
    
    public static function addContact(){
        $data = $_POST;
        $data["contact_phones"] = explode(",", $data["contact_phones"]);
        $phonenumbers = $data["contact_phones"];
        $emails = $data["contact_email"];
        $phoneNrString = "";
        $emailString = "";
        $mainPhone;
        $count = 0;
        foreach ($phonenumbers as $phonenumber){
            if ($count == 0){
                $mainPhone = $phonenumber;
            }
            if ($phonenumber != ""){
                if ($phoneNrString == ""){
                    $phoneNrString = $phonenumber;
                }else{
                    $phoneNrString .= ";" . $phonenumber;
                }
            }
            $count++;
        }
        foreach ($emails as $email){
            if ($email != ""){
                if ($emailString == ""){
                    $emailString = $email;
                }else{
                    $emailString .= ";" . $email;
                }
            }
        }
        CustomerDB::addContact($data["customer_id"], $_SESSION["id"], $data["contact_type"], $data["contact_name"], $data["contact_surname"], $data["contact_position"], $phoneNrString, $emailString, $data["contact_notes"]);
    }
    
    public static function editContact(){
        $data = $_POST;
        $data["contact_phones"] = explode(",", $data["contact_phones"]);
        $phonenumbers = $data["contact_phones"];
        $emails = $data["contact_email"];
        $phoneNrString = "";
        $emailString = "";
        $mainPhone;
        $count = 0;
        foreach ($phonenumbers as $phonenumber){
            if ($count == 0){
                $mainPhone = $phonenumber;
            }
            if ($phonenumber != ""){
                if ($phoneNrString == ""){
                    $phoneNrString = $phonenumber;
                }else{
                    $phoneNrString .= ";" . $phonenumber;
                }
            }
            $count++;
        }
        foreach ($emails as $email){
            if ($email != ""){
                if ($emailString == ""){
                    $emailString = $email;
                }else{
                    $emailString .= ";" . $email;
                }
            }
        }
        CustomerDB::editContact($data["contact_id"], $data["contact_type"], $data["contact_name"], $data["contact_surname"], $data["contact_position"], $phoneNrString, $emailString, $data["contact_notes"]);
    }
    
    public static function deleteContact(){
        $data = $_POST;
        CustomerDB::deleteContact($data["contact_id"]);
    }
	
	public static function getCustomersList(){
		$customers = CustomerDB::getCustomersList();
		echo json_encode($customers);
	}
    
    public static function addCustomer(){
        $response = array();
        $data = $_POST;
        $data["customer_phonenr"] = explode(",", $data["customer_phonenr"]);
        $phonenumbers = $data["customer_phonenr"];
        $emails = $data["customer_email"];
        $phoneNrString = "";
        $emailString = "";
        foreach ($phonenumbers as $phonenumber){
            if ($phonenumber != ""){
                if ($phoneNrString == ""){
                    $phoneNrString = $phonenumber;
                }else{
                    $phoneNrString .= ";" . $phonenumber;
                }
            }
            $count++;
        }
        foreach ($emails as $email){
            if ($email != ""){
                if ($emailString == ""){
                    $emailString = $email;
                }else{
                    $emailString .= ";" . $email;
                }
            }
        }
        $exists = CustomerDB::checkCustomerExists($data["customer_name"]); //check if customer with matching name exists.
        if (!$exists){
            $customer_id = CustomerDB::addCustomer($data["customer_name"], $data["customer_vat"], $data["business_entity"], $data["taxpayer"], $phoneNrString, $emailString, $data["customer_website"], $data["customer_building"], $data["customer_address"], $data["customer_industry"], $data["latitude"], $data["longitude"], $data["employee_id"], $data["customer_notes"], $data["customer_importance"], $data["customer_visibility"], $_SESSION["id"]);
            $response["error"] = false;
            $response["customer_id"] = $customer_id;
        }else{
            $response["error"] = true;
            $response["msg"] = 'Customer with matching name, email or phone already exists.';
        }
        echo json_encode($response);
       
    }
    
    public static function editCustomer(){
        $data = $_POST;
        $data["customer_phonenr"] = explode(",", $data["customer_phonenr"]);
        $phonenumbers = $data["customer_phonenr"];
        $emails = $data["customer_email"];
        $phoneNrString = "";
        $emailString = "";
        foreach ($phonenumbers as $phonenumber){
            if ($phonenumber != ""){
                if ($phoneNrString == ""){
                    $phoneNrString = $phonenumber;
                }else{
                    $phoneNrString .= ";" . $phonenumber;
                }
            }
            $count++;
        }
        foreach ($emails as $email){
            if ($email != ""){
                if ($emailString == ""){
                    $emailString = $email;
                }else{
                    $emailString .= ";" . $email;
                }
            }
        }
        CustomerDB::editCustomer($data["customer_id"], $data["customer_vat"], $data["business_entity"], $data["taxpayer"], $data["customer_name"], $phoneNrString, $emailString, $data["customer_website"], $data["customer_building"], $data["customer_address"], $data["customer_industry"], $data["latitude"], $data["longitude"], $data["employee_id"], $data["customer_notes"], $data["customer_importance"], $data["customer_visibility"]);
    }
    
    public static function deleteCustomer(){
        $data = $_POST;
        CustomerDB::deleteCustomer($data["customer_id"]);
    }
	
	public static function getAllSubsidiaries(){
		$data = $_POST;
		
		$subsidiaries = CustomerDB::getAllSubsidiaries();
		
		echo json_encode($subsidiaries);
	}
	
	public static function getSubsidiaries(){
		$data = $_POST;
		$subsidiaries = CustomerDB::getSubsidiaries($data["customer_id"]);
		
		echo json_encode($subsidiaries);
	}
	
	public static function addSubsidiary(){
		$data = $_POST;
		$data["subsidiary_phones"] = explode(",", $data["subsidiary_phones"]);
        $phonenumbers = $data["subsidiary_phones"];
        $emails = $data["subsidiary_email"];
        $phoneNrString = "";
        $emailString = "";
        foreach ($phonenumbers as $phonenumber){
            if ($phonenumber != ""){
                if ($phoneNrString == ""){
                    $phoneNrString = $phonenumber;
                }else{
                    $phoneNrString .= ";" . $phonenumber;
                }
            }
            $count++;
        }
        foreach ($emails as $email){
            if ($email != ""){
                if ($emailString == ""){
                    $emailString = $email;
                }else{
                    $emailString .= ";" . $email;
                }
            }
        }
		CustomerDB::addSubsidiary($data["customer_id"], $data["subsidiary_vat"], $data["subsidiary_name"], $phoneNrString, $emailString, $data["subsidiary_building"], $data["subsidiary_address"], $data["latitude"], $data["longitude"], $_SESSION["id"], $data["subsidiary_notes"]);
	}
	
	public static function editSubsidiary(){
		$data = $_POST;
		$data["subsidiary_phones"] = explode(",", $data["subsidiary_phones"]);
        $phonenumbers = $data["subsidiary_phones"];
        $emails = $data["subsidiary_email"];
        $phoneNrString = "";
        $emailString = "";
        foreach ($phonenumbers as $phonenumber){
            if ($phonenumber != ""){
                if ($phoneNrString == ""){
                    $phoneNrString = $phonenumber;
                }else{
                    $phoneNrString .= ";" . $phonenumber;
                }
            }
            $count++;
        }
        foreach ($emails as $email){
            if ($email != ""){
                if ($emailString == ""){
                    $emailString = $email;
                }else{
                    $emailString .= ";" . $email;
                }
            }
        }
		CustomerDB::editSubsidiary($data["subsidiary_id"], $data["customer_id"], $data["subsidiary_vat"], $data["subsidiary_name"], $phoneNrString, $emailString, $data["subsidiary_building"], $data["subsidiary_address"], $data["latitude"], $data["longitude"], $data["subsidiary_notes"]);
	}
	
	public static function deleteSubsidiary(){
		$data = $_POST;
		CustomerDB::deleteSubsidiary($data["subsidiary_id"]);
	}
    
    public static function getCustomers(){
        $customers = CustomerDB::getCustomers();
        echo json_encode($customers);
    }
    
    public static function getCustomerByPhone(){
        $data = $_POST;
        $customer = CustomerDB::getCustomerByPhone($data["phonenumber"]);
        if (is_array($customer)){
            $customer["exists"] = 1;
        }else{
			$contact = CustomerDB::getContactByPhone($data["phonenumber"]);
			if (is_array($contact)){
				$customer = $contact;
				$customer["exists"] = 1;
			}else{
				$customer = array("exists" => 0);
			}
            
        }
        echo json_encode($customer);
    }
    
    public static function getCustomerByEmail(){
        $data = $_POST;
        $customer = CustomerDB::getCustomerByEmail($data["email"]);
        if (is_array($customer)){
            $customer["exists"] = 1;
        }else{
            $customer = array("exists" => 0);
        }
        echo json_encode($customer);
    }
    
}

?>