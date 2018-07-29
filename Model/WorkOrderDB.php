<?php

require_once "DBInit.php";

class WorkOrderDB {
	
	public static function getLastWorkOrder(){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT * FROM workorders ORDER BY workorder_id DESC LIMIT 1;");
        
        $statement->execute();
        return $statement->fetch();
    }
	
	public static function setWorkorderOpened($workorder_id){
		$db = DBInit::getInstance();
		
		$opened_on = date("Y-m-d H:i:s");
		$statement = $db->prepare("UPDATE workorders SET opened_on = :opened_on WHERE workorder_id = :workorder_id");
		
		$statement->bindParam(":opened_on", $opened_on);
		$statement->bindParam(":workorder_id", $workorder_id);
		
		$statement->execute();
	}
	
	public static function setWorkorderFinished($workorder_id){
		$db = DBInit::getInstance();
		
		$finished_on = date("Y-m-d H:i:s");
		$statement = $db->prepare("UPDATE workorders SET finished_on = :finished_on WHERE workorder_id = :workorder_id");
		
		$statement->bindParam(":finished_on", $finished_on);
		$statement->bindParam(":workorder_id", $workorder_id);
		
		$statement->execute();
	}
	
	public static function addWorkOrderAction($workorder_id, $employee_id, $action_description, $action_type){
        $db = DBInit::getInstance();
        
        $statement = $db->prepare("INSERT INTO workorder_actions (workorder_id, employee_id, action_description, action_type) VALUES (:workorder_id, :employee_id, :action_description, :action_type)");
        
        $statement->bindParam(":workorder_id", $workorder_id);
        $statement->bindParam(":employee_id", $employee_id);
        $statement->bindParam(":action_description", $action_description);
		$statement->bindParam(":action_type", $action_type);
        
        $statement->execute();
		
		return $db->lastInsertId();
    }
	
	public static function getWorkOrderActionByID($action_id){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("SELECT workorder_actions.*, employees.employee_name, employees.employee_surname FROM workorder_actions INNER JOIN employees ON employees.employee_id = workorder_actions.employee_id WHERE workorder_actions.action_id = :action_id");
		$statement->bindParam(":action_id", $action_id);
		$statement->execute();
		
		return $statement->fetch();
	}
	
	public static function getWorkOrderFiles($workorder_id){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("SELECT uploads.*, employees.employee_name, employees.employee_surname FROM uploads INNER JOIN employees ON uploads.employee_id = employees.employee_id WHERE uploads.workorder_id = :workorder_id");
		$statement->bindParam(":workorder_id", $workorder_id);
		
		$statement->execute();
		
		return $statement->fetchAll();
	}
	
	public static function getWorkOrderActions($workorder_id){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("SELECT workorder_actions.*, employees.employee_name, employees.employee_surname FROM workorder_actions INNER JOIN employees ON employees.employee_id = workorder_actions.employee_id WHERE workorder_actions.workorder_id = :workorder_id");
		
		$statement->bindParam(":workorder_id", $workorder_id);
		
		$statement->execute();
		
		return $statement->fetchAll();
	}
	
	public static function getWorkOrderItems($workorder_id){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("SELECT workorder_items.*, items.item_name, items.item_description, items.item_type, items.item_price, items.item_vat, items.item_unit, items.item_currency FROM workorder_items INNER JOIN items ON items.item_id = workorder_items.item_id WHERE workorder_items.workorder_id = :workorder_id");
		
		$statement->bindParam(":workorder_id", $workorder_id);
		
		$statement->execute();
		
		return $statement->fetchAll();
	}
	
	public static function addWorkOrderItem($workorder_id, $item_id, $item_amount){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("INSERT INTO workorder_items (workorder_id, item_id, item_amount) VALUES (:workorder_id, :item_id, :item_amount)");
		$statement->bindParam(":workorder_id", $workorder_id);
		$statement->bindParam(":item_id", $item_id);
		$statement->bindParam(":item_amount", $item_amount);
		
		$statement->execute();
	}
	
	public static function deleteWorkOrderItems($workorder_id){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("DELETE FROM workorder_items WHERE workorder_id = :workorder_id");
		
		$statement->bindParam(":workorder_id", $workorder_id);
		
		$statement->execute();
	}
	
	public static function getWorkOrderByID($workorder_id){
		$db = DBInit::getInstance();
        $statement = $db->prepare("SELECT workorders.*, employees.*, customers.customer_name, subsidiaries.subsidiary_name FROM workorders INNER JOIN employees ON workorders.employee_id = employees.employee_id INNER JOIN customers ON customers.customer_id = workorders.customer_id LEFT JOIN subsidiaries ON subsidiaries.subsidiary_id = workorders.subsidiary_id WHERE workorders.workorder_id = :workorder_id");
        $statement->bindParam(":workorder_id", $workorder_id);
		$statement->execute();
        
        return $statement->fetch();
	}
	
	public static function getEmployeeWorkOrders($employee_id){
		$db = DBInit::getInstance();
		$statement = $db->prepare("SELECT workorders.*, employees.*, customers.customer_name, subsidiaries.subsidiary_name FROM workorders INNER JOIN employees ON workorders.employee_id = employees.employee_id INNER JOIN customers ON customers.customer_id = workorders.customer_id LEFT JOIN subsidiaries ON subsidiaries.subsidiary_id = workorders.subsidiary_id WHERE workorders.employee_id = :employee_id");
		$statement->bindParam(":employee_id", $employee_id);
		
		$statement->execute();
		
		return $statement->fetchAll();
	}
	
    public static function getWorkOrders(){
        $db = DBInit::getInstance();
		if ($_SESSION["admin"] == 1){
			$statement = $db->prepare("SELECT workorders.*, employees.employee_name, employees.employee_surname, customers.customer_name, subsidiaries.subsidiary_name FROM workorders INNER JOIN employees ON workorders.employee_id = employees.employee_id INNER JOIN customers ON customers.customer_id = workorders.customer_id LEFT JOIN subsidiaries ON subsidiaries.subsidiary_id = workorders.subsidiary_id WHERE (employees.employee_type = 0 OR workorders.employee_id = :employee_id)");
			$statement->bindParam(":employee_id", $_SESSION["id"]);
			$statement->execute();
		}else{
			$statement = $db->prepare("SELECT workorders.*, employees.employee_name, employees.employee_surname, customers.customer_name, subsidiaries.subsidiary_name FROM workorders INNER JOIN employees ON workorders.employee_id = employees.employee_id INNER JOIN customers ON customers.customer_id = workorders.customer_id LEFT JOIN subsidiaries ON subsidiaries.subsidiary_id = workorders.subsidiary_id WHERE FIND_IN_SET(:employee_id, assigned_to)");
			$statement->bindParam(":employee_id", $_SESSION["id"]);
			$statement->execute();
		}
        
        return $statement->fetchAll();
    }
    
    public static function getAllWorkOrdersToday(){
        if ($_SESSION["admin"] == 1){
            $db = DBInit::getInstance();
            $statement = $db->prepare("SELECT workorders.* FROM workorders INNER JOIN employees ON workorders.employee_id = employees.employee_id WHERE DATE(workorders.workorder_startdate) = CURDATE() AND (employees.employee_type = 0 OR workorders.employee_id = :employee_id);");
            $statement->bindParam(":employee_id", $_SESSION["id"]);
			$statement->execute();
            
            return $statement->fetchAll();
        }else{
            $db = DBInit::getInstance();
            $statement = $db->prepare("SELECT * FROM workorders WHERE DATE(workorder_startdate) = CURDATE() AND employee_id = :employee_id;");
            $statement->bindParam(":employee_id", $_SESSION["id"]);
            $statement->execute();
            
            return $statement->fetchAll();
        }
    }
    
    public static function getWorkOrdersLastWeek(){
        if ($_SESSION["admin"] == 1){
            $db = DBInit::getInstance();
            $statement = $db->prepare("SELECT COUNT(workorder_id) AS workordercount, DATE(workorder_startdate) AS date FROM workorders INNER JOIN employees ON workorders.employee_id = employees.employee_id WHERE DATE(workorder_startdate) > DATE_SUB(NOW(), INTERVAL 1 WEEK) AND (employees.employee_type = 0 OR workorders.employee_id = :employee_id) GROUP BY DATE(workorder_startdate);");
            $statement->bindParam(":employee_id", $_SESSION["id"]);
			$statement->execute();
            return $statement->fetchAll();
        }else{
            $db = DBInit::getInstance();
            $statement = $db->prepare("SELECT COUNT(workorder_id) AS workordercount, DATE(workorder_startdate) AS date FROM workorders WHERE DATE(workorder_startdate) > DATE_SUB(NOW(), INTERVAL 1 WEEK) AND employee_id = :employee_id GROUP BY DATE(workorder_startdate);");
            $statement->bindParam(":employee_id", $_SESSION["id"]);
            $statement->execute();
            return $statement->fetchAll();
        }
    }
    
    public static function addWorkOrder($workorder_subject, $workorder_code, $ticket_id, $employee_id, $assigned_to, $workorder_startdate, $workorder_enddate, $customer_id, $subsidiary_id, $workorder_location, $latitude, $longitude, $priority, $workorder_notes, $workorder_files){
        $db = DBInit::getInstance();
        $statement = $db->prepare("INSERT INTO workorders (workorder_subject, workorder_code, ticket_id, employee_id, assigned_to, workorder_startdate, workorder_enddate, customer_id, subsidiary_id, workorder_location, latitude, longitude, priority, workorder_notes, workorder_files)
		VALUES (:workorder_subject, :workorder_code, :ticket_id, :employee_id, :assigned_to, :workorder_startdate, :workorder_enddate, :customer_id, :subsidiary_id, :workorder_location, :latitude, :longitude, :priority, :workorder_notes, :workorder_files)");
        
		$statement->bindParam(":workorder_subject", $workorder_subject);
		$statement->bindParam(":workorder_code", $workorder_code);
		$statement->bindParam(":ticket_id", $ticket_id);
		$statement->bindParam(":employee_id", $employee_id);
		$statement->bindParam(":assigned_to", $assigned_to);
		$statement->bindParam(":workorder_startdate", $workorder_startdate);
		$statement->bindParam(":workorder_enddate", $workorder_enddate);
		$statement->bindParam(":customer_id", $customer_id);
		$statement->bindParam(":subsidiary_id", $subsidiary_id);
		$statement->bindParam(":workorder_location", $workorder_location);
		$statement->bindParam(":latitude", $latitude);
		$statement->bindParam(":longitude", $longitude);
		$statement->bindParam(":priority", $priority);
		$statement->bindParam(":workorder_notes", $workorder_notes);
		$statement->bindParam(":workorder_files", $workorder_files);
        
        $statement->execute();
		
		return $db->lastInsertId();
    }
    
    public static function editWorkOrder($workorder_id, $workorder_subject, $assigned_to, $workorder_startdate, $workorder_enddate, $customer_id, $subsidiary_id, $workorder_location, $latitude, $longitude, $priority, $workorder_notes, $status, $workorder_files){
        $db = DBInit::getInstance();
		
		$last_modified = date("Y-m-d H:i:s");
		
        $statement = $db->prepare("UPDATE workorders SET workorder_subject = :workorder_subject, assigned_to = :assigned_to, workorder_startdate = :workorder_startdate, workorder_enddate = :workorder_enddate, customer_id = :customer_id,
		subsidiary_id = :subsidiary_id, workorder_location = :workorder_location, latitude = :latitude, longitude = :longitude, priority = :priority, workorder_notes = :workorder_notes, status = :status, workorder_files = :workorder_files, last_modified = :last_modified WHERE workorder_id = :workorder_id");
        
        $statement->bindParam(":workorder_subject", $workorder_subject);
		$statement->bindParam(":assigned_to", $assigned_to);
		$statement->bindParam(":workorder_startdate", $workorder_startdate);
		$statement->bindParam(":workorder_enddate", $workorder_enddate);
		$statement->bindParam(":customer_id", $customer_id);
		$statement->bindParam(":subsidiary_id", $subsidiary_id);
		$statement->bindParam(":workorder_location", $workorder_location);
		$statement->bindParam(":latitude", $latitude);
		$statement->bindParam(":longitude", $longitude);
		$statement->bindParam(":workorder_notes", $workorder_notes);
		$statement->bindParam(":status", $status);
		$statement->bindParam(":priority", $priority);
		$statement->bindParam(":workorder_files", $workorder_files);
		$statement->bindParam(":last_modified", $last_modified);
        $statement->bindParam(":workorder_id", $workorder_id);

        $statement->execute();
    }
	
	public static function updateWorkOrderStatus($workorder_id, $status){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("UPDATE workorders SET status = :status WHERE workorder_id = :workorder_id");
		$statement->bindParam(":status", $status);
		$statement->bindParam(":workorder_id", $workorder_id);
		
		$statement->execute();
	}
    
    
    public static function deleteWorkOrder($workorder_id){
        $db = DBInit::getInstance();
        $statement = $db->prepare("DELETE FROM workorders WHERE workorder_id = :workorder_id");
        $statement->bindParam(":workorder_id", $workorder_id);

        $statement->execute();
    }
	
	public static function getItems(){
		$db = DBInit::getInstance();
		$statement = $db->prepare("SELECT items.*, employees.employee_name, employees.employee_surname FROM items INNER JOIN employees ON items.employee_id = employees.employee_id");
		$statement->execute();
		
		return $statement->fetchAll();
	}
	
	public static function addItem($employee_id, $item_name, $item_serial, $item_code, $item_type, $item_unit, $item_vat, $item_price, $item_currency, $item_description){
		$db = DBInit::getInstance();
		$statement = $db->prepare("INSERT INTO items (employee_id, item_name, item_serial, item_code, item_type, item_unit, item_vat, item_price, item_currency, item_description) VALUES
		(:employee_id, :item_name, :item_serial, :item_code, :item_type, :item_unit, :item_vat, :item_price, :item_currency, :item_description)");
		
		$statement->bindParam(":employee_id", $employee_id);
		$statement->bindParam(":item_name", $item_name);
		$statement->bindParam(":item_serial", $item_serial);
		$statement->bindParam(":item_code", $item_code);
		$statement->bindParam(":item_type", $item_type);
		$statement->bindParam(":item_unit", $item_unit);
		$statement->bindParam(":item_vat", $item_vat);
		$statement->bindParam(":item_price", $item_price);
		$statement->bindParam(":item_currency", $item_currency);
		$statement->bindParam(":item_description", $item_description);
		
		$statement->execute();
	
		return $db->lastInsertId();
	}
	
	public static function editItem($item_id, $item_name, $item_serial, $item_code, $item_type, $item_unit, $item_vat, $item_price, $item_currency, $item_description){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("UPDATE items SET item_name = :item_name, item_serial = :item_serial, item_code = :item_code, item_type = :item_type, item_unit = :item_unit, item_vat = :item_vat, item_price = :item_price,
		item_currency = :item_currency, item_description = :item_description WHERE item_id = :item_id");
		
		$statement->bindParam(":item_name", $item_name);
		$statement->bindParam(":item_serial", $item_serial);
		$statement->bindParam(":item_code", $item_code);
		$statement->bindParam(":item_type", $item_type);
		$statement->bindParam(":item_unit", $item_unit);
		$statement->bindParam(":item_vat", $item_vat);
		$statement->bindParam(":item_price", $item_price);
		$statement->bindParam(":item_currency", $item_currency);
		$statement->bindParam(":item_description", $item_description);
		$statement->bindParam(":item_id", $item_id);
		
		$statement->execute();
	}
	
	public static function deleteItem($item_id){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("DELETE FROM items WHERE item_id = :item_id");
		
		$statement->bindParam(":item_id", $item_id);
		
		$statement->execute();
	}
}

?>