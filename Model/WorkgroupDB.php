<?php

require_once("Model/DBInit.php");

class WorkgroupDB{
	
	public static function getWorkgroupTaskFiles($wgtask_id){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("SELECT uploads.*, employees.employee_name, employees.employee_surname FROM uploads INNER JOIN employees ON uploads.employee_id = employees.employee_id WHERE uploads.wgtask_id = :wgtask_id");
		$statement->bindParam(":wgtask_id", $wgtask_id);
		
		$statement->execute();
		
		return $statement->fetchAll();
	}
	
	public static function addWorkgroupActivity($workgroup_id, $employee_id, $description){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("INSERT INTO workgroup_activity (workgroup_id, employee_id, description) VALUES (:workgroup_id, :employee_id, :description)");
		$statement->bindParam(":workgroup_id", $workgroup_id);
		$statement->bindParam(":employee_id", $employee_id);
		$statement->bindParam(":description", $description);
		
		$statement->execute();
	}
	
	public static function getWorkgroupActivity($workgroup_id){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("SELECT workgroup_activity.*, employees.employee_name, employees.employee_surname, employees.profile_image FROM workgroup_activity INNER JOIN employees ON workgroup_activity.employee_id = employees.employee_id WHERE workgroup_activity.workgroup_id = :workgroup_id");
		$statement->bindParam(":workgroup_id", $workgroup_id);
		
		$statement->execute();
		
		return $statement->fetchAll();
	}
	
	public static function toggleWorkgroupActive($workgroup_id, $active){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("UPDATE workgroups SET active = :active WHERE workgroup_id = :workgroup_id");
		$statement->bindParam(":active", $active);
		$statement->bindParam(":workgroup_id", $workgroup_id);
		
		$statement->execute();
	}
    
    public static function getChatMessages($workgroup_id){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT messages.*, employees.employee_name, employees.employee_surname, employees.profile_image FROM messages INNER JOIN employees ON messages.employee_id = employees.employee_id WHERE messages.workgroup_id = :workgroup_id AND DATE(datetime) > DATE(NOW()) - INTERVAL 3 DAY ORDER BY DATE(datetime) ASC");
        $statement->bindParam(":workgroup_id", $workgroup_id);
        $statement->execute();
        
        return $statement->fetchAll();
    }
    
    public static function getEmployeeWorkgroups($employee_id){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT workgroups.*, employees.employee_name, employees.employee_surname FROM workgroups INNER JOIN employees ON workgroups.owner_id = employees.employee_id WHERE FIND_IN_SET(:employee_id, workgroups.users)");
        $statement->bindParam(":employee_id", $employee_id);
        $statement->execute();
        return $statement->fetchAll();
    }
	
	public static function setUsersAndModerators($workgroup_id, $workgroup_users, $workgroup_moderators){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("UPDATE workgroups SET users = :users, moderators = :moderators WHERE workgroup_id = :workgroup_id");
		$statement->bindParam(":users", $workgroup_users);
		$statement->bindParam(":moderators", $workgroup_moderators);
		$statement->bindParam(":workgroup_id", $workgroup_id);
		
		$statement->execute();
	}
    
    public static function editWorkgroupSettings($workgroup_id, $workgroup_name, $workgroup_taskpermissions, $workgroup_viewpermissions, $workgroup_remindertime, $workgroup_filepermissions, $workgroup_campaignpermissions, $workgroup_ownernotifications){
        $db = DBInit::getInstance();
        $statement = $db->prepare("UPDATE workgroups SET name = :workgroup_name, workgroup_taskpermissions = :workgroup_taskpermissions, workgroup_viewpermissions = :workgroup_viewpermissions, workgroup_remindertime = :workgroup_remindertime,
        workgroup_filepermissions = :workgroup_filepermissions, workgroup_campaignpermissions = :workgroup_campaignpermissions, workgroup_ownernotifications = :workgroup_ownernotifications WHERE workgroup_id = :workgroup_id");
        
        $statement->bindParam(":workgroup_name", $workgroup_name);
        $statement->bindParam(":workgroup_taskpermissions", $workgroup_taskpermissions);
        $statement->bindParam(":workgroup_viewpermissions", $workgroup_viewpermissions);
        $statement->bindParam(":workgroup_remindertime", $workgroup_remindertime);
        $statement->bindParam(":workgroup_filepermissions", $workgroup_filepermissions);
        $statement->bindParam(":workgroup_campaignpermissions", $workgroup_campaignpermissions);
        $statement->bindParam(":workgroup_ownernotifications", $workgroup_ownernotifications);
        $statement->bindParam(":workgroup_id", $workgroup_id);
        
        $statement->execute();
    }
    
    public static function getTodaysUnopenedTasks(){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT * FROM wgtasks WHERE opened_on = '' AND DATE(task_datetime) = CURDATE() AND task_remindme = 1");
        $statement->execute();
        return $statement->fetchAll();
    }
    
    public static function setTaskRemindMe($task_id){
        $db = DBInit::getInstance();
        $statement = $db->prepare("UPDATE wgtasks SET task_remindme = 0 WHERE task_id = :task_id");
        $statement->bindParam(":task_id", $task_id);
        $statement->execute();
    }
    
    public static function setTaskOpened($task_id, $opened_on){
        $db = DBInit::getInstance();
        $statement = $db->prepare("UPDATE wgtasks SET opened_on = :opened_on WHERE task_id = :task_id");
        $statement->bindParam(":opened_on", $opened_on);
        $statement->bindParam(":task_id", $task_id);
        
        $statement->execute();
    }
    
    public static function addWorkgroup($owner_id, $name, $description, $users, $type){
        $db = DBInit::getInstance();
        $moderators = $owner_id;
        $created_on = date("Y-m-d H:i");
        $statement = $db->prepare("INSERT INTO workgroups (owner_id, moderators, users, name, description, created_on, type) VALUES (:owner_id, :moderators, :users, :name, :description, :created_on, :type)");
        $statement->bindParam(":owner_id", $owner_id);
        $statement->bindParam(":moderators", $moderators);
        $statement->bindParam(":users", $users);
        $statement->bindParam(":name", $name);
        $statement->bindParam(":description", $description);
        $statement->bindParam(":created_on", $created_on);
        $statement->bindParam(":type", $type);
        
        $statement->execute();
        
        return $db->lastInsertId();
    }
    
    public static function deleteWorkgroup($workgroup_id){
        $db = DBInit::getInstance();
        $statement = $db->prepare("DELETE FROM workgroups WHERE workgroup_id = :workgroup_id");
        $statement->bindParam(":workgroup_id", $workgroup_id);
        
        $statement->execute();
    }
    
    public static function editWorkgroupDescription($workgroup_id, $description){
        $db = DBInit::getInstance();
        $statement = $db->prepare("UPDATE workgroups SET description = :description WHERE workgroup_id = :workgroup_id");
        $statement->bindParam(":workgroup_id", $workgroup_id);
        $statement->bindParam(":description", $description);
        
        $statement->execute();
    }
    
    public static function setModerators($workgroup_id, $moderators){
        $db = DBInit::getInstance();
        $statement = $db->prepare("UPDATE workgroups SET moderators = :moderators WHERE workgroup_id = :workgroup_id");
        $statement->bindParam(":moderators", $moderators);
        $statement->bindParam(":workgroup_id", $workgroup_id);
        
        $statement->execute();
    }
    
    public static function getWorkgroupList(){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT workgroups.*, employees.employee_name, employees.employee_surname FROM workgroups INNER JOIN employees ON workgroups.owner_id = employees.employee_id");
        $statement->execute();
        
        return $statement->fetchAll();
    }
    
    public static function getWorkgroupByID($workgroup_id){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT * FROM workgroups WHERE workgroup_id = :workgroup_id");
        $statement->bindParam(":workgroup_id", $workgroup_id);
        $statement->execute();
        
        return $statement->fetch();
    }
    
    public static function getTaskByID($task_id){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT wgtasks.*, employees.employee_name, employees.employee_surname FROM wgtasks INNER JOIN employees ON wgtasks.employee_id = employees.employee_id WHERE wgtasks.task_id = :task_id");
        $statement->bindParam(":task_id", $task_id);
        $statement->execute();
        
        return $statement->fetch();
    }
    
    public static function setupWorkgroupMailchimp($workgroup_id, $mailchimp_key){
        $db = DBInit::getInstance();
        $statement = $db->prepare("UPDATE workgroups SET mailchimp_key = :mailchimp_key WHERE workgroup_id = :workgroup_id");
        $statement->bindParam(":mailchimp_key", $mailchimp_key);
        $statement->bindParam(":workgroup_id", $workgroup_id);
        
        $statement->execute();
    }
    
    public static function removeWorkgroupMailchimp($workgroup_id){
        $db = DBInit::getInstance();
        $statement = $db->prepare("UPDATE workgroups SET mailchimp_key = '' WHERE workgroup_id = :workgroup_id");
        $statement->bindParam(":workgroup_id", $workgroup_id);
        
        $statement->execute();
    }
    
    public static function addMember($workgroup_id, $employee_id){
        $db = DBInit::getInstance();
        $employee_id = "," . $employee_id;
        $statement = $db->prepare("UPDATE workgroups SET users = CONCAT(users, :employee_id) WHERE workgroup_id = :workgroup_id;");
        $statement->bindParam(":employee_id", $employee_id);
        $statement->bindParam(":workgroup_id", $workgroup_id);
        
        $statement->execute();
    }
	
	public static function checkWorkgroupExists($workgroup_name){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("SELECT * FROM workgroups WHERE name = :workgroup_name");
		
		$statement->bindParam(":workgroup_name", $workgroup_name);
		
		$statement->execute();
		
		return is_array($statement->fetch());
	}
    
    public static function getWorkgroupEmployees($employeeString){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT * FROM employees WHERE employee_id IN (" . $employeeString . ")");
        
        $statement->execute();
        
        return $statement->fetchAll();
    }
	
	public static function getWorkgroupMembers($workgroup_id){
		$db = DBInit::getInstance();
		$statement = $db->prepare("SELECT employees.* FROM employees JOIN workgroups WHERE FIND_IN_SET(employees.employee_id, workgroups.users) AND workgroup_id = :workgroup_id");
		$statement->bindParam(":workgroup_id", $workgroup_id);
		
		$statement->execute();
		
		return $statement->fetchAll();
	}
    
    public static function addMessage($employee_id, $workgroup_id, $content){
        $datetime = date("Y-m-d H:i");
        $db = DBInit::getInstance();
        $statement = $db->prepare("INSERT INTO messages (employee_id, workgroup_id, content, datetime) VALUES (:employee_id, :workgroup_id, :content, :datetime)");
        
        $statement->bindParam(":employee_id", $employee_id);
        $statement->bindParam(":workgroup_id", $workgroup_id);
        $statement->bindParam(":content", $content);
        $statement->bindParam(":datetime", $datetime);
        
        $statement->execute();
    }
    
    public static function getWorkgroupTasks($workgroup_id){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT wgtasks.*, employees.employee_name, employees.employee_surname, customers.customer_name FROM wgtasks INNER JOIN employees ON employees.employee_id = wgtasks.employee_id LEFT JOIN customers ON customers.customer_id = wgtasks.customer_id WHERE workgroup_id = :workgroup_id AND (wgtasks.task_visibility = 1 OR FIND_IN_SET(:employee_id, wgtasks.participants))");
        $statement->bindParam(":employee_id", $_SESSION["id"]);
        $statement->bindParam(":workgroup_id", $workgroup_id);
        
        $statement->execute();
        
        return $statement->fetchAll();
    }
    
    public static function addTaskAction($task_id, $employee_id, $description, $type){
        $db = DBInit::getInstance();
        
        $statement = $db->prepare("INSERT INTO wgtasks_actions (task_id, employee_id, description, type) VALUES (:task_id, :employee_id, :description, :type)");
        $statement->bindParam(":task_id", $task_id);
        $statement->bindParam(":employee_id", $employee_id);
        $statement->bindParam(":description", $description);
		$statement->bindParam(":type", $type);
        
        $statement->execute();
		
		return $db->lastInsertId();
    }
    
    public static function getTaskActions($task_id){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT wgtasks_actions.*, employees.employee_name, employees.employee_surname, employees.profile_image FROM wgtasks_actions INNER JOIN employees ON wgtasks_actions.employee_id = employees.employee_id WHERE wgtasks_actions.task_id = :task_id");
        $statement->bindParam(":task_id", $task_id);
        
        $statement->execute();
        
        return $statement->fetchAll();
    }
	
	public static function getTaskActionByID($action_id){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("SELECT wgtasks_actions.*, employees.employee_name, employees.employee_surname, employees.profile_image FROM wgtasks_actions INNER JOIN employees ON employees.employee_id = wgtasks_actions.employee_id WHERE wgtasks_actions.action_id = :action_id");
		$statement->bindParam(":action_id", $action_id);
		$statement->execute();
		
		return $statement->fetch();
	}
    
    public static function addWorkgroupTask($workgroup_id, $employee_id, $participants, $task_subject, $task_description, $task_startdate, $task_starttime, $task_enddate, $task_endtime, $customer_id, $subsidiary_id, $task_location, $latitude, $longitude, $priority, $task_files, $task_status, $task_visibility){
        $db = DBInit::getInstance();
        $statement = $db->prepare("INSERT INTO wgtasks (workgroup_id, employee_id, participants, task_subject, task_description, task_startdate, task_starttime, task_enddate, task_endtime, customer_id, subsidiary_id, task_location, latitude, longitude, priority, task_files, status, task_visibility)
        VALUES (:workgroup_id, :employee_id, :participants, :task_subject, :task_description, :task_startdate, :task_starttime, :task_enddate, :task_endtime, :customer_id, :subsidiary_id, :task_location, :latitude, :longitude, :priority, :task_files, :status, :task_visibility)");
        $statement->bindParam(":workgroup_id", $workgroup_id);
        $statement->bindParam(":employee_id", $employee_id);
        $statement->bindParam(":participants", $participants);
        $statement->bindParam(":task_subject", $task_subject);
        $statement->bindParam(":task_description", $task_description);
        $statement->bindParam(":task_startdate", $task_startdate);
        $statement->bindParam(":task_starttime", $task_starttime);
        $statement->bindParam(":task_enddate", $task_enddate);
        $statement->bindParam(":task_endtime", $task_endtime);
		$statement->bindParam(":customer_id", $customer_id);
		$statement->bindParam(":subsidiary_id", $subsidiary_id);
        $statement->bindParam(":task_location", $task_location);
        $statement->bindParam(":latitude", $latitude);
        $statement->bindParam(":longitude", $longitude);
		$statement->bindParam(":priority", $priority);
		$statement->bindParam(":task_files", $task_files);
        $statement->bindParam(":status", $task_status);
        $statement->bindParam(":task_visibility", $task_visibility);
        
        $statement->execute();
		
		return $db->lastInsertId();
    }
    
    public static function editWorkgroupTask($task_id, $participants, $task_subject, $task_description, $task_startdate, $task_starttime, $task_enddate, $task_endtime, $customer_id, $subsidiary_id, $task_location, $latitude, $longitude, $priority, $task_files, $task_visibility, $status){
        $db = DBInit::getInstance();
        $statement = $db->prepare("UPDATE wgtasks SET participants = :participants, task_subject = :task_subject, task_description = :task_description, task_startdate = :task_startdate, task_starttime = :task_starttime, task_enddate = :task_enddate,
        task_endtime = :task_endtime, customer_id = :customer_id, subsidiary_id = :subsidiary_id, task_location = :task_location, latitude = :latitude, longitude = :longitude, priority = :priority, task_files = :task_files, task_visibility = :task_visibility, status = :status WHERE task_id = :task_id");
        $statement->bindParam(":participants", $participants);
        $statement->bindParam(":task_subject", $task_subject);
        $statement->bindParam(":task_description", $task_description);
        $statement->bindParam(":task_startdate", $task_startdate);
        $statement->bindParam(":task_starttime", $task_starttime);
        $statement->bindParam(":task_enddate", $task_enddate);
        $statement->bindParam(":task_endtime", $task_endtime);
		$statement->bindParam(":customer_id", $customer_id);
		$statement->bindParam(":subsidiary_id", $subsidiary_id);
        $statement->bindParam(":task_location", $task_location);
        $statement->bindParam(":latitude", $latitude);
        $statement->bindParam(":longitude", $longitude);
		$statement->bindParam(":priority", $priority);
		$statement->bindParam(":task_files", $task_files);
        $statement->bindParam(":task_visibility", $task_visibility);
        $statement->bindParam(":status", $status);
        $statement->bindParam(":task_id", $task_id);
        
        $statement->execute();
    }
    
    public static function deleteWorkgroupTask($task_id){
        $db = DBInit::getInstance();
        $statement = $db->prepare("DELETE FROM wgtasks WHERE task_id = :task_id");
        
        $statement->bindParam(":task_id", $task_id);
        
        $statement->execute();
    }
    
    public static function updateWorkgroupTask($task_id, $status){
        $db = DBInit::getInstance();
        $finished_on = "";
        if ($status == 2){
            $finished_on = date("Y-m-d H:i:s");
        }
        
        $statement = $db->prepare("UPDATE wgtasks SET status = :status, finished_on = :finished_on WHERE task_id = :task_id");
        $statement->bindParam(":task_id", $task_id);
        $statement->bindParam(":finished_on", $finished_on);
        $statement->bindParam(":status", $status);
        
        $statement->execute();
    }
    
    public static function moveTask($task_id, $task_startdate, $task_starttime, $task_enddate, $task_endtime){
        $db = DBInit::getInstance();
        
        $statement = $db->prepare("UPDATE wgtasks SET task_startdate = :task_startdate, task_starttime = :task_starttime, task_enddate = :task_enddate, task_endtime = :task_endtime WHERE task_id = :task_id");
        $statement->bindParam(":task_id", $task_id);
        $statement->bindParam(":task_startdate", $task_startdate);
        $statement->bindParam(":task_starttime", $task_starttime);
        $statement->bindParam(":task_enddate", $task_enddate);
        $statement->bindParam(":task_endtime", $task_endtime);
        
        $statement->execute();
    }
}

?>