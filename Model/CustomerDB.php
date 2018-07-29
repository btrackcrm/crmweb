<?php

require_once "DBInit.php";

class CustomerDB{
	
	public static function getCustomerTicketsByType($employee_id){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("SELECT COUNT(tickets.ticket_id) AS ticketcount, category_name FROM tickets INNER JOIN ticket_categories ON ticket_categories.category_id = tickets.ticket_type WHERE tickets.customer_id = :customer_id GROUP BY ticket_categories.category_name");
		$statement->bindParam(":customer_id", $employee_id);
		
		$statement->execute();
		
		return $statement->fetchAll();
	}
	
	public static function getAllCustomerTicketsByDate($customer_id){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("SELECT COUNT(*) AS ticketcount, DATE(created_on) AS date FROM tickets WHERE customer_id = :customer_id GROUP BY DATE(created_on)");
		$statement->bindParam(":customer_id", $customer_id);
		
		$statement->execute();
		
		return $statement->fetchAll();
	}
	
	public static function getAllCustomerWorkordersByDate($customer_id){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("SELECT COUNT(*) AS workordercount, DATE(created_on) AS date FROM workorders WHERE customer_id = :customer_id GROUP BY DATE(created_on)");
		$statement->bindParam(":customer_id", $customer_id);
		
		$statement->execute();
		
		return $statement->fetchAll();
	}
	
	public static function getAverageTicketResolutionTime($customer_id){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("SELECT COUNT(tickets.ticket_id) AS ticketcount, AVG(TIMESTAMPDIFF(MINUTE, opened_on, finished_on)) AS resolution_time, ticket_priority FROM tickets WHERE customer_id = :customer_id AND opened_on != '' AND finished_on != '' GROUP BY ticket_priority");
		$statement->bindParam(":customer_id", $customer_id);
		
		$statement->execute();
		
		return $statement->fetchAll();
	}
	
	public static function getTicketsByStatus($customer_id){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("SELECT COUNT(*) AS nrOfTickets, ticket_status FROM tickets WHERE customer_id = :customer_id GROUP BY ticket_status");
		$statement->bindParam(":customer_id", $customer_id);
		
		$statement->execute();
		
		return $statement->fetchAll();
	}
	
	public static function getAverageWorkorderResolutionTime($customer_id){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("SELECT COUNT(workorders.workorder_id) AS workordercount, AVG(TIMESTAMPDIFF(MINUTE, opened_on, finished_on)) AS resolution_time FROM workorders WHERE customer_id = :customer_id AND opened_on != '' AND finished_on != '' GROUP BY priority");
		$statement->bindParam(":customer_id", $customer_id);
		
		$statement->execute();
		
		return $statement->fetchAll();
	}
	
	public static function getWorkordersByStatus($customer_id){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("SELECT COUNT(*) AS nrOfWorkorders, status FROM workorders WHERE customer_id = :customer_id GROUP BY status");
		$statement->bindParam(":customer_id", $customer_id);
		
		$statement->execute();
		
		return $statement->fetchAll();
	}
	
	public static function setCustomerSLA($customer_id, $low_sla, $normal_sla, $high_sla){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("UPDATE customers SET low_sla = :low_sla, normal_sla = :normal_sla, high_sla = :high_sla WHERE customer_id = :customer_id");
		
		$statement->bindParam(":low_sla", $low_sla);
		$statement->bindParam(":normal_sla", $normal_sla);
		$statement->bindParam(":high_sla", $high_sla);
		$statement->bindParam(":customer_id", $customer_id);
		
		$statement->execute();
	}
    
    public static function saveCustomerFileUpload($employee_id, $customer_id, $filename, $filepath){
        $curdate = date("Y-m-d H:i:s");
        $db = DBInit::getInstance();
        $statement = $db->prepare("INSERT INTO uploads (employee_id, customer_id, datetime, filename, filepath) VALUES (:employee_id, :customer_id, :datetime, :filename, :filepath)");
        $statement->bindParam(":employee_id", $employee_id);
        $statement->bindParam(":customer_id", $customer_id);
        $statement->bindParam(":datetime", $curdate);
        $statement->bindParam(":filename", $filename);
        $statement->bindParam(":filepath", $filepath);
        
        $statement->execute();
    }
    
    public static function getCustomerContacts($customer_id){
        $db = DBInit::getInstance();
		$employee_id = $_SESSION["id"];
		$is_admin = $_SESSION["admin"];
		
		if ($is_admin == 1){
			$statement = $db->prepare("SELECT contacts.*, employees.employee_name, employees.employee_surname FROM contacts INNER JOIN employees ON contacts.employee_id = employees.employee_id WHERE contacts.customer_id = :customer_id");
			$statement->bindParam(":customer_id", $customer_id);
			
			$statement->execute();
			
			return $statement->fetchAll();
		}else{
			$statement = $db->prepare("SELECT contacts.*, employees.employee_name, employees.employee_surname FROM contacts INNER JOIN employees ON contacts.employee_id = employees.employee_id WHERE contacts.customer_id = :customer_id AND contacts.employee_id = :employee_id");
			$statement->bindParam(":customer_id", $customer_id);
			$statement->bindParam(":employee_id", $employee_id);
			$statement->execute();
			
			return $statement->fetchAll();
		}
    }
	
	public static function getCustomerTickets($customer_id){
		$db = DBInit::getInstance();
		
		$employee_id = $_SESSION["id"];
		$is_admin = $_SESSION["admin"];
		
		if ($is_admin == 1){
			$statement = $db->prepare("SELECT tickets.*, customers.customer_name, ticket_categories.category_name, subsidiaries.subsidiary_name, employees.employee_name, employees.employee_surname FROM tickets INNER JOIN employees ON tickets.employee_id = employees.employee_id INNER JOIN ticket_categories ON tickets.ticket_type = ticket_categories.category_id INNER JOIN customers ON tickets.customer_id = customers.customer_id LEFT JOIN subsidiaries ON tickets.subsidiary_id = subsidiaries.subsidiary_id WHERE tickets.customer_id = :customer_id");
			
			$statement->bindParam(":customer_id", $customer_id);
			$statement->execute();
			
			return $statement->fetchAll();
		}else{
			$statement = $db->prepare("SELECT tickets.*, customers.customer_name, ticket_categories.category_name, subsidiaries.subsidiary_name, employees.employee_name, employees.employee_surname FROM tickets INNER JOIN employees ON tickets.employee_id = employees.employee_id INNER JOIN ticket_categories ON tickets.ticket_type = ticket_categories.category_id INNER JOIN customers ON tickets.customer_id = customers.customer_id LEFT JOIN subsidiaries ON tickets.subsidiary_id = subsidiaries.subsidiary_id WHERE tickets.customer_id = :customer_id AND FIND_IN_SET(:employee_id, tickets.assigned_to)");
			
			$statement->bindParam(":customer_id", $customer_id);
			$statement->bindParam(":employee_id", $employee_id);
			$statement->execute();
			
			return $statement->fetchAll();	
		}
	}
	
	public static function getCustomerWorkorders($customer_id){
		$db = DBInit::getInstance();
		
		$employee_id = $_SESSION["id"];
		$is_admin = $_SESSION["admin"];
		
		if ($is_admin == 1){
			$statement = $db->prepare("SELECT workorders.*, customers.customer_name, subsidiaries.subsidiary_name, employees.employee_name, employees.employee_surname FROM workorders INNER JOIN employees ON workorders.employee_id = employees.employee_id INNER JOIN customers ON workorders.customer_id = customers.customer_id LEFT JOIN subsidiaries ON workorders.subsidiary_id = subsidiaries.subsidiary_id WHERE workorders.customer_id = :customer_id");
			
			$statement->bindParam(":customer_id", $customer_id);
			$statement->execute();
			
			return $statement->fetchAll();
		}else{
			$statement = $db->prepare("SELECT workorders.*, customers.customer_name, subsidiaries.subsidiary_name FROM workorders INNER JOIN employees ON workorders.employee_id = employees.employee_id INNER JOIN customers ON workorders.customer_id = customers.customer_id LEFT JOIN subsidiaries ON workorders.subsidiary_id = subsidiaries.subsidiary_id WHERE workorders.customer_id = :customer_id AND FIND_IN_SET(:employee_id, workorders.assigned_to)");
			
			$statement->bindParam(":customer_id", $customer_id);
			$statement->bindParam(":employee_id", $employee_id);
			$statement->execute();
			
			return $statement->fetchAll();	
		}
	}
    
    public static function getCustomerCalls($customer_id){
        $db = DBInit::getInstance();
		
		$employee_id = $_SESSION["id"];
		$is_admin = $_SESSION["admin"];
		
		if ($is_admin == 1){
			$statement = $db->prepare("SELECT crmcalls.*, employees.employee_name, employees.employee_surname FROM crmcalls INNER JOIN employees ON employees.employee_id = crmcalls.employee_id INNER JOIN customers ON customers.customer_id = crmcalls.customer_id WHERE crmcalls.customer_id = :customer_id ORDER BY DATE(crmcalls.call_datetime) DESC");
			
			$statement->bindParam(":customer_id", $customer_id);
			$statement->execute();
			
			return $statement->fetchAll();
		}else{
			$statement = $db->prepare("SELECT crmcalls.*, employees.employee_name, employees.employee_surname FROM crmcalls INNER JOIN employees ON employees.employee_id = crmcalls.employee_id INNER JOIN customers ON customers.customer_id = crmcalls.customer_id WHERE crmcalls.customer_id = :customer_id AND crmcalls.employee_id = :employee_id ORDER BY DATE(crmcalls.call_datetime) DESC");
			
			$statement->bindParam(":customer_id", $customer_id);
			$statement->bindParam(":employee_id", $employee_id);
			$statement->execute();
			
			return $statement->fetchAll();	
		}
    }
    
    public static function getCustomerDocuments($customer_id){
        $db = DBInit::getInstance();
		
		$employee_id = $_SESSION["id"];
		$is_admin = $_SESSION["admin"];
		
		if ($is_admin == 1){
			$statement = $db->prepare("SELECT uploads.*, employees.employee_name, employees.employee_surname FROM uploads INNER JOIN employees ON employees.employee_id = uploads.employee_id WHERE uploads.customer_id = :customer_id ORDER BY uploads.upload_id DESC");
			
			$statement->bindParam(":customer_id", $customer_id);
			$statement->execute();
			
			return $statement->fetchAll();
		}else{
			$statement = $db->prepare("SELECT uploads.*, employees.employee_name, employees.employee_surname FROM uploads INNER JOIN employees ON employees.employee_id = uploads.employee_id WHERE uploads.customer_id = :customer_id AND uploads.employee_id = :employee_id ORDER BY uploads.upload_id DESC");
			
			$statement->bindParam(":customer_id", $customer_id);
			$statement->bindParam(":employee_id", $employee_id);
			$statement->execute();
			
			return $statement->fetchAll();
		}
    }
    
    public static function getCustomerEvents($customer_id){
        $db = DBInit::getInstance();
        $employee_id = $_SESSION["id"];
		$is_admin = $_SESSION["admin"];
		
		if ($is_admin == 1){
			$statement = $db->prepare("SELECT events.*, employees.employee_name, employees.employee_surname FROM events INNER JOIN employees ON events.employee_id = employees.employee_id WHERE events.customer_id = :customer_id ORDER BY DATE(events.event_startdate) DESC");
			
			$statement->bindParam(":customer_id", $customer_id);
			
			$statement->execute();
			
			return $statement->fetchAll();
		}else{
			$statement = $db->prepare("SELECT events.*, employees.employee_name, employees.employee_surname FROM events INNER JOIN employees ON events.employee_id = employees.employee_id WHERE events.customer_id = :customer_id AND FIND_IN_SET(:employee_id, participants) ORDER BY DATE(events.event_startdate) DESC");
			
			$statement->bindParam(":customer_id", $customer_id);
			$statement->bindParam(":employee_id", $employee_id);
			$statement->execute();
			
			return $statement->fetchAll();

		}
    }
    
    public static function addContact($customer_id, $employee_id, $contact_type, $contact_name, $contact_surname, $contact_position, $contact_phone, $contact_email, $contact_notes){
        $created_on = date("Y-m-d H:i");
		
		$db = DBInit::getInstance();
        $statement = $db->prepare("INSERT INTO contacts (customer_id, employee_id, contact_type, contact_name, contact_surname, contact_position, contact_phone, contact_email, contact_notes, created_on) VALUES (:customer_id, :employee_id, :contact_type, :contact_name, :contact_surname, :contact_position, :contact_phone, :contact_email, :contact_notes, :created_on)");
        
        $statement->bindParam(":customer_id", $customer_id);
		$statement->bindParam(":employee_id", $employee_id);
        $statement->bindParam(":contact_type", $contact_type);
        $statement->bindParam(":contact_name", $contact_name);
        $statement->bindParam(":contact_surname", $contact_surname);
        $statement->bindParam(":contact_position", $contact_position);
        $statement->bindParam(":contact_phone", $contact_phone);
        $statement->bindParam(":contact_email", $contact_email);
        $statement->bindParam(":contact_notes", $contact_notes);
		$statement->bindParam(":created_on", $created_on);
        
        $statement->execute();
    }
    
    public static function editContact($contact_id, $contact_type, $contact_name, $contact_surname, $contact_position, $contact_phone, $contact_email, $contact_notes){
        $db = DBInit::getInstance();
        $statement = $db->prepare("UPDATE contacts SET contact_type = :contact_type, contact_name = :contact_name, contact_surname = :contact_surname, contact_position = :contact_position, contact_phone = :contact_phone,
        contact_email = :contact_email, contact_notes = :contact_notes WHERE contact_id = :contact_id");
    
        $statement->bindParam(":contact_type", $contact_type);
        $statement->bindParam(":contact_name", $contact_name);
        $statement->bindParam(":contact_surname", $contact_surname);
        $statement->bindParam(":contact_position", $contact_position);
        $statement->bindParam(":contact_phone", $contact_phone);
        $statement->bindParam(":contact_email", $contact_email);
        $statement->bindParam(":contact_notes", $contact_notes);
        $statement->bindParam(":contact_id", $contact_id);
        
        $statement->execute();
    }
    
    public static function deleteContact($contact_id){
        $db = DBInit::getInstance();
        $statement = $db->prepare("DELETE FROM contacts WHERE contact_id = :contact_id");
        
        $statement->execute();
    }
    
    public static function addCustomer($customer_name, $customer_vat, $business_entity, $taxpayer, $customer_phone, $customer_email, $customer_website, $customer_building, $customer_address, $customer_industry, $latitude, $longitude, $employee_id, $customer_notes, $customer_importance, $customer_visibility, $created_by){
        $db = DBInit::getInstance();
        $statement = $db->prepare("INSERT INTO customers (customer_name, customer_vat, business_entity, taxpayer, customer_phone, customer_email, customer_website, customer_building, customer_address, customer_industry, latitude, longitude, employee_id, customer_notes, customer_importance, customer_visibility, created_by) VALUES (:customer_name, :customer_vat, :business_entity, :taxpayer, :customer_phone, :customer_email, :customer_website, :customer_building, :customer_address, :customer_industry, :latitude, :longitude, :employee_id, :customer_notes, :customer_importance, :customer_visibility, :created_by)");
        
        $statement->bindParam(":customer_name", $customer_name);
        $statement->bindParam(":customer_vat", $customer_vat);
        $statement->bindParam(":business_entity", $business_entity);
        $statement->bindParam(":taxpayer", $taxpayer);
        $statement->bindParam(":customer_phone", $customer_phone);
        $statement->bindParam(":customer_email", $customer_email);
        $statement->bindParam(":customer_website", $customer_website);
		$statement->bindParam(":customer_building", $customer_building);
        $statement->bindParam(":customer_address", $customer_address);
        $statement->bindParam(":customer_industry", $customer_industry);
        $statement->bindParam(":latitude", $latitude);
        $statement->bindParam(":longitude", $longitude);
        $statement->bindParam(":employee_id", $employee_id);
        $statement->bindParam(":customer_notes", $customer_notes);
        $statement->bindParam(":customer_importance", $customer_importance);
        $statement->bindParam(":customer_visibility", $customer_visibility);
		$statement->bindParam(":created_by", $created_by);
        
        $statement->execute();
        
        return $db->lastInsertId();
    }
    
    public static function editCustomer($customer_id, $customer_vat, $business_entity, $taxpayer, $customer_name, $customer_phone, $customer_email, $customer_website, $customer_building, $customer_address, $customer_industry, $latitude, $longitude, $employee_id, $customer_notes, $customer_importance, $customer_visibility){
        $db = DBInit::getInstance();
        $statement = $db->prepare("UPDATE customers SET customer_name = :customer_name, customer_vat = :customer_vat, business_entity = :business_entity, taxpayer = :taxpayer, customer_phone = :customer_phone, customer_email = :customer_email, customer_website = :customer_website, customer_building = :customer_building, customer_address = :customer_address, customer_industry = :customer_industry, latitude = :latitude, longitude = :longitude, employee_id = :employee_id, customer_notes = :customer_notes, customer_importance = :customer_importance, customer_visibility = :customer_visibility WHERE customer_id = :customer_id");
        
        $statement->bindParam(":customer_name", $customer_name);
        $statement->bindParam(":customer_vat", $customer_vat);
        $statement->bindParam(":business_entity", $business_entity);
        $statement->bindParam(":taxpayer", $taxpayer);
        $statement->bindParam(":customer_phone", $customer_phone);
        $statement->bindParam(":customer_email", $customer_email);
        $statement->bindParam(":customer_website", $customer_website);
		$statement->bindParam(":customer_building", $customer_building);
        $statement->bindParam(":customer_address", $customer_address);
        $statement->bindParam(":customer_industry", $customer_industry);
        $statement->bindParam(":latitude", $latitude);
        $statement->bindParam(":longitude", $longitude);
        $statement->bindParam(":employee_id", $employee_id);
        $statement->bindParam(":customer_notes", $customer_notes);
        $statement->bindParam(":customer_importance", $customer_importance);
        $statement->bindParam(":customer_visibility", $customer_visibility);
        $statement->bindParam(":customer_id", $customer_id);

        $statement->execute();
    }
	
	public static function getAllSubsidiaries(){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("SELECT * FROM subsidiaries");
		
		$statement->execute();
		return $statement->fetchAll();
	}
	
	public static function getSubsidiaries($customer_id){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("SELECT subsidiaries.*, employees.employee_name, employees.employee_surname FROM subsidiaries INNER JOIN employees ON subsidiaries.added_by = employees.employee_id WHERE subsidiaries.customer_id = :customer_id");
		$statement->bindParam(":customer_id", $customer_id);
		
		$statement->execute();
		
		return $statement->fetchAll();
	}
	
	public static function addSubsidiary($customer_id, $subsidiary_vat, $subsidiary_name, $subsidiary_phone, $subsidiary_email, $subsidiary_building, $subsidiary_address, $latitude, $longitude, $added_by, $subsidiary_notes){
		$db = DBInit::getInstance();
		$statement = $db->prepare("INSERT INTO subsidiaries (customer_id, subsidiary_vat, subsidiary_name, subsidiary_phone, subsidiary_email, subsidiary_building, subsidiary_address, latitude, longitude, added_by, subsidiary_notes) VALUES
		(:customer_id, :subsidiary_vat, :subsidiary_name, :subsidiary_phone, :subsidiary_email, :subsidiary_building, :subsidiary_address, :latitude, :longitude, :added_by, :subsidiary_notes)");
		
		$statement->bindParam(":customer_id", $customer_id);
		$statement->bindParam(":subsidiary_vat", $subsidiary_vat);
		$statement->bindParam(":subsidiary_name", $subsidiary_name);
		$statement->bindParam(":subsidiary_phone", $subsidiary_phone);
		$statement->bindParam(":subsidiary_email", $subsidiary_email);
		$statement->bindParam(":subsidiary_building", $subsidiary_building);
		$statement->bindParam(":subsidiary_address", $subsidiary_address);
		$statement->bindParam(":latitude", $latitude);
		$statement->bindParam(":longitude", $longitude);
		$statement->bindParam(":added_by", $added_by);
		$statement->bindParam(":subsidiary_notes", $subsidiary_notes);
		
		$statement->execute();
	}
	
	public static function editSubsidiary($subsidiary_id, $customer_id, $subsidiary_vat, $subsidiary_name, $subsidiary_phone, $subsidiary_email, $subsidiary_building, $subsidiary_address, $latitude, $longitude, $subsidiary_notes){
		$db = DBInit::getInstance();
		$statement = $db->prepare("UPDATE subsidiaries SET customer_id = :customer_id, subsidiary_vat = :subsidiary_vat, subsidiary_name = :subsidiary_name, subsidiary_phone = :subsidiary_phone, subsidiary_email = :subsidiary_email, subsidiary_building = :subsidiary_building,
		subsidiary_address = :subsidiary_address, latitude = :latitude, longitude = :longitude, subsidiary_notes = :subsidiary_notes WHERE subsidiary_id = :subsidiary_id");
		
		$statement->bindParam(":customer_id", $customer_id);
		$statement->bindParam(":subsidiary_vat", $subsidiary_vat);
		$statement->bindParam(":subsidiary_name", $subsidiary_name);
		$statement->bindParam(":subsidiary_phone", $subsidiary_phone);
		$statement->bindParam(":subsidiary_email", $subsidiary_email);
		$statement->bindParam(":subsidiary_building", $subsidiary_building);
		$statement->bindParam(":subsidiary_address", $subsidiary_address);
		$statement->bindParam(":latitude", $latitude);
		$statement->bindParam(":longitude", $longitude);
		$statement->bindParam(":subsidiary_notes", $subsidiary_notes);
		$statement->bindParam(":subsidiary_id", $subsidiary_id);
		
		$statement->execute();
	}
	
	public static function deleteSubsidiary($subsidiary_id){
		$db = DBInit::getInstance();
		$statement = $db->prepare("DELETE FROM subsidiaries WHERE subsidiary_id = :subsidiary_id");
		
		$statement->bindParam(":subsidiary_id", $subsidiary_id);
		
		$statement->execute();
	}
    
    public static function getCustomers(){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT customers.*, employees.employee_name, employees.employee_surname, employees.employee_id FROM customers LEFT JOIN employees ON customers.employee_id = employees.employee_id WHERE customers.customer_visibility = 1 OR customers.created_by = :employee_id");
        $statement->bindParam(":employee_id", $_SESSION["id"]);
        $statement->execute();
        return $statement->fetchAll();
    }
	
	public static function getCustomersList(){
		$db = DBInit::getInstance();
        $statement = $db->prepare("SELECT customers.*, employees.employee_name, employees.employee_surname, employees.employee_id FROM customers LEFT JOIN employees ON customers.created_by = employees.employee_id WHERE customers.customer_visibility = 1 OR customers.created_by = :employee_id");
        $statement->bindParam(":employee_id", $_SESSION["id"]);
        $statement->execute();
        return $statement->fetchAll();
	}

    
    public static function deleteCustomer($customer_id){
        $db = DBInit::getInstance();
        $statement = $db->prepare("DELETE FROM customers WHERE customer_id = :customer_id");
        
        $statement->bindParam(":customer_id", $customer_id);
        
        $statement->execute();
    }
    
    public static function getCustomerByID($customer_id){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT * FROM customers WHERE customer_id = :customer_id");
        $statement->bindParam(":customer_id", $customer_id);
        $statement->execute();
        
        return $statement->fetch();
    }
    
    public static function getCustomerByPhone($phonenumber){
        $db = DBInit::getInstance();
        $customer_phone = "%" . $phonenumber . "%";
        $customer_altphone = "%" . substr($phonenumber, 1) . "%";
        $statement = $db->prepare("SELECT * FROM customers WHERE customer_phone LIKE :customer_phone OR customer_phone LIKE :customer_altphone LIMIT 1;");
        $statement->bindParam(":customer_phone", $customer_phone);
        $statement->bindParam(":customer_altphone", $customer_altphone);
        $statement->execute();
        
        return $statement->fetch();
    }
	
	public static function getContactByPhone($phonenumber){
		$db = DBInit::getInstance();
        $customer_phone = "%" . $phonenumber . "%";
        $customer_altphone = "%" . substr($phonenumber, 1) . "%";
        $statement = $db->prepare("SELECT contacts.*, customers.customer_name FROM contacts INNER JOIN customers ON contacts.customer_id = customers.customer_id WHERE contacts.contact_phone LIKE :contact_phone OR contacts.contact_phone LIKE :contact_altphone LIMIT 1;");
        $statement->bindParam(":contact_phone", $customer_phone);
        $statement->bindParam(":contact_altphone", $customer_altphone);
        $statement->execute();
        
        return $statement->fetch();
	}
	
	public static function getCustomerOrContactByEmail($email){
		$db = DBInit::getInstance();
        $statement = $db->prepare("SELECT * FROM customers WHERE customer_email LIKE :customer_email LIMIT 1;");
        $statement->bindParam(":customer_email", $email);
        $statement->execute();
        
        $result = $statement->fetch();
		if (!is_array($result)){ //customer with specified phone number not found, search in contacts
			$statement = $db->prepare("SELECT contacts.*, customers.customer_name FROM contacts INNER JOIN customers ON contacts.customer_id = customers.customer_id WHERE contacts.contact_email LIKE :contact_email LIMIT 1;");
			$statement->bindParam(":contact_email", $email);
			$statement->execute();
			
			$result = $statement->fetch();
			return $result;
		}else{
			return $result;
		}
	}
	
	public static function getCustomerOrContactByPhone($phonenumber){
		$db = DBInit::getInstance();
		$phonenumber = str_replace("+", "", $phonenumber);
        $customer_phone = "%" . $phonenumber . "%";
        $customer_altphone = "%" . substr($phonenumber, 1) . "%";
        $statement = $db->prepare("SELECT * FROM customers WHERE customer_phone LIKE :customer_phone OR customer_phone LIKE :customer_altphone LIMIT 1;");
        $statement->bindParam(":customer_phone", $customer_phone);
        $statement->bindParam(":customer_altphone", $customer_altphone);
        $statement->execute();
        
        $result = $statement->fetch();
		if (!is_array($result)){ //customer with specified phone number not found, search in contacts
			$statement = $db->prepare("SELECT contacts.*, customers.customer_name FROM contacts INNER JOIN customers ON contacts.customer_id = customers.customer_id WHERE contacts.contact_phone LIKE :contact_phone OR contacts.contact_phone LIKE :contact_altphone LIMIT 1;");
			$statement->bindParam(":contact_phone", $customer_phone);
			$statement->bindParam(":contact_altphone", $customer_altphone);
			$statement->execute();
			
			$result = $statement->fetch();
			return $result;
		}else{
			return $result;
		}
	}
    
    public static function getCustomerByEmail($email){
        $db = DBInit::getInstance();
        $customer_email = "%" . $email . "%";
        $statement = $db->prepare("SELECT * FROM customers WHERE customer_email LIKE :customer_email LIMIT 1;");
        $statement->bindParam(":customer_email", $customer_email);
        $statement->execute();
        
        return $statement->fetch();
    }
    
    public static function checkCustomerExists($customer_name){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT * FROM customers WHERE customer_name = :customer_name");
        $statement->bindParam(":customer_name", $customer_name);
        $statement->execute();
        
        $result = $statement->fetch();
        if (!is_array($result)){
            return false;
        }else{
            return true;
        }
    }
}

?>