<?php

require_once("DBInit.php");

class UserDB{
	
	public static function setEmployeeTelephonyEmail($employee_id, $telephony_email){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("UPDATE employees SET telephony_email = :telephony_email WHERE employee_id = :employee_id");
		$statement->bindParam(":employee_id", $employee_id);
		$statement->bindParam(":telephony_email", $telephony_email);
		
		$statement->execute();
	}
	
	public static function setNotificationSettings($employee_id, $employee_mailing, $employee_sms, $event_notifications, $ticketing_notifications, $workorder_notifications, $workgroup_notifications){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("UPDATE employees SET employee_mailing = :employee_mailing, employee_sms = :employee_sms, event_notifications = :event_notifications, ticketing_notifications = :ticketing_notifications, workorder_notifications = :workorder_notifications, workgroup_notifications = :workgroup_notifications WHERE employee_id = :employee_id");
		$statement->bindParam(":employee_id", $employee_id);
		$statement->bindParam(":employee_mailing", $employee_mailing);
		$statement->bindParam(":employee_sms", $employee_sms);
		$statement->bindParam(":event_notifications", $event_notifications);
		$statement->bindParam(":ticketing_notifications", $ticketing_notifications);
		$statement->bindParam(":workorder_notifications", $workorder_notifications);
		$statement->bindParam(":workgroup_notifications", $workgroup_notifications);
		
		$statement->execute();
	}
	
	public static function getEmployeeTicketsByDate($employee_id){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("SELECT COUNT(*) AS ticketcount, DATE(ticket_date) AS date FROM tickets WHERE FIND_IN_SET(:employee_id, assigned_to) GROUP BY DATE(ticket_date)");
		$statement->bindParam(":employee_id", $employee_id);
		
		$statement->execute();
		
		return $statement->fetchAll();
	}
	
	public static function getEmployeeTicketsByCustomer($employee_id){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("SELECT COUNT(tickets.ticket_id) AS ticketcount, customers.customer_name FROM tickets INNER JOIN customers ON tickets.customer_id = customers.customer_id WHERE FIND_IN_SET(:employee_id, tickets.assigned_to) GROUP BY tickets.customer_id");
		$statement->bindParam(":employee_id", $employee_id);
		
		$statement->execute();
		
		return $statement->fetchAll();
	}
	
	public static function getEmployeeTicketResolutionTimesByPriority($employee_id){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("SELECT COUNT(tickets.ticket_id) AS ticketcount, AVG(TIMESTAMPDIFF(MINUTE, opened_on, finished_on)) AS resolution_time, tickets.ticket_priority FROM tickets WHERE opened_on != '' AND finished_on != '' AND FIND_IN_SET(:employee_id, assigned_to) GROUP BY tickets.ticket_priority");
		$statement->bindParam(":employee_id", $employee_id);
		
		$statement->execute();
		
		return $statement->fetchAll();
	}
	
	public static function getEmployeesWithTickets(){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("SELECT DISTINCT employees.employee_id FROM tickets LEFT JOIN employees ON FIND_IN_SET(employees.employee_id, tickets.assigned_to)");
		$statement->execute();
		
		return $statement->fetchAll();
	}
	
	public static function getEmployeeTicketCount($employee_id){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("SELECT COUNT(ticket_id) AS ticketcount, employees.employee_name, employees.employee_surname FROM tickets INNER JOIN employees ON :participant_id = employees.employee_id WHERE FIND_IN_SET(:employee_id, assigned_to)");
		$statement->bindParam(":participant_id", $employee_id);
		$statement->bindParam(":employee_id", $employee_id);
		$statement->execute();
		
		return $statement->fetch();
	}
	
	public static function getEmployeeTicketAvgResponseTime($employee_id){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("SELECT AVG(TIMESTAMPDIFF(MINUTE, opened_on, finished_on)) AS resolution_time, employees.employee_name, employees.employee_surname FROM tickets INNER JOIN employees ON :participant_id = employees.employee_id WHERE opened_on != '' AND finished_on != '' AND FIND_IN_SET(:employee_id, assigned_to)");
		$statement->bindParam(":participant_id", $employee_id);
		$statement->bindParam(":employee_id", $employee_id);
		$statement->execute();
		
		return $statement->fetch();
	}
	
	public static function getEmployeeTicketsByType($employee_id){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("SELECT COUNT(tickets.ticket_id) AS ticketcount, category_name FROM tickets INNER JOIN ticket_categories ON ticket_categories.category_id = tickets.ticket_type WHERE FIND_IN_SET(:employee_id, tickets.assigned_to) GROUP BY ticket_categories.category_name");
		$statement->bindParam(":employee_id", $employee_id);
		
		$statement->execute();
		
		return $statement->fetchAll();
	}
	
	public static function getEmployeesWithWorkorders(){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("SELECT DISTINCT employees.employee_id FROM workorders LEFT JOIN employees ON FIND_IN_SET(employees.employee_id, workorders.assigned_to)");
		$statement->execute();
		
		return $statement->fetchAll();
	}
	
	public static function getEmployeeWorkordersByDate($employee_id){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("SELECT COUNT(*) AS workordercount, DATE(workorder_startdate) AS date FROM workorders WHERE FIND_IN_SET(:employee_id, assigned_to) GROUP BY DATE(workorder_startdate)");
		$statement->bindParam(":employee_id", $employee_id);
		
		$statement->execute();
		
		return $statement->fetchAll();
	}
	
	public static function getEmployeeWorkorderCount($employee_id){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("SELECT COUNT(*) AS workordercount, employees.employee_name, employees.employee_surname FROM workorders INNER JOIN employees ON :participant_id = employees.employee_id WHERE FIND_IN_SET(:employee_id, assigned_to)");
		$statement->bindParam(":participant_id", $employee_id);
		$statement->bindParam(":employee_id", $employee_id);
		$statement->execute();
		
		return $statement->fetch();
	}
	
	public static function getEmployeeWorkorderAvgResponseTime($employee_id){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("SELECT AVG(TIMESTAMPDIFF(MINUTE, opened_on, finished_on)) AS resolution_time, employees.employee_name, employees.employee_surname FROM workorders INNER JOIN employees ON :participant_id = employees.employee_id WHERE opened_on != '' AND finished_on != '' AND FIND_IN_SET(:employee_id, assigned_to)");
		$statement->bindParam(":participant_id", $employee_id);
		$statement->bindParam(":employee_id", $employee_id);
		$statement->execute();
		
		return $statement->fetch();
	}
	
	public static function getEmployeeWorkorderResolutionTimesByPriority($employee_id){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("SELECT COUNT(workorders.workorder_id) AS workordercount, AVG(TIMESTAMPDIFF(MINUTE, opened_on, finished_on)) AS resolution_time, workorders.priority FROM workorders WHERE opened_on != '' AND finished_on != '' AND FIND_IN_SET(:employee_id, assigned_to) GROUP BY workorders.priority");
		$statement->bindParam(":employee_id", $employee_id);
		
		$statement->execute();
		
		return $statement->fetchAll();
	}
	
	public static function getEmployeeWorkordersByCustomer($employee_id){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("SELECT COUNT(workorders.workorder_id) AS workordercount, customers.customer_name FROM workorders INNER JOIN customers ON workorders.customer_id = customers.customer_id WHERE FIND_IN_SET(:employee_id, workorders.assigned_to) GROUP BY workorders.customer_id");
		$statement->bindParam(":employee_id", $employee_id);
		
		$statement->execute();
		
		return $statement->fetchAll();
	}
	
	public static function setEmployeeSLA($employee_id, $ticketing_sla, $workorder_sla, $workgroup_sla, $calls_sla){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("UPDATE employees SET ticketing_sla = :ticketing_sla, workorder_sla = :workorder_sla, workgroup_sla = :workgroup_sla, calls_sla = :calls_sla WHERE employee_id = :employee_id");
		$statement->bindParam(":ticketing_sla", $ticketing_sla);
		$statement->bindParam(":workorder_sla", $workorder_sla);
		$statement->bindParam(":workgroup_sla", $workgroup_sla);
		$statement->bindParam(":calls_sla", $calls_sla);
		$statement->bindParam(":employee_id", $employee_id);
		
		$statement->execute();
	}
	
	public static function createEmployeeSettings($employee_id){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("INSERT INTO employee_settings (employee_id) VALUES (:employee_id)");
		$statement->bindParam(":employee_id", $employee_id);
		
		$statement->execute();
	}
	
	public static function setupIMAP($hostaddress, $port, $outbound_port, $username, $password, $ssl, $certificate){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("UPDATE employees SET imap_hostaddress = :imap_hostaddress, imap_port = :imap_port, imap_outboundport = :imap_outboundport, imap_username = :imap_username, imap_password = :imap_password, imap_ssl = :imap_ssl, imap_certificate = :imap_certificate WHERE employee_id = :employee_id");
		
		$statement->bindParam(":imap_hostaddress", $hostaddress);
		$statement->bindParam(":imap_port", $port);
		$statement->bindParam(":imap_outboundport", $outbound_port);
		$statement->bindParam(":imap_username", $username);
		$statement->bindParam(":imap_password", $password);
		$statement->bindParam(":imap_ssl", $ssl);
		$statement->bindParam(":imap_certificate", $certificate);
		$statement->bindParam(":employee_id", $_SESSION["id"]);
		
		$statement->execute();
	}
	
	public static function setupExchange($exchange_host, $exchange_username, $exchange_password){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("UPDATE employees SET exchange_host = :exchange_host, exchange_username = :exchange_username, exchange_password = :exchange_password WHERE employee_id = :employee_id");
		
		$statement->bindParam(":exchange_host", $exchange_host);
		$statement->bindParam(":exchange_username", $exchange_username);
		$statement->bindParam(":exchange_password", $exchange_password);
		$statement->bindParam(":employee_id", $_SESSION["id"]);
		
		$statement->execute();
	}
	
	public static function saveOffice365Token($employee_id, $access_token, $refresh_token, $expires_in){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("UPDATE employees SET access_token = :access_token, refresh_token = :refresh_token, expires_in = :expires_in WHERE employee_id = :employee_id");
		
		$statement->bindParam(":access_token", $access_token);
		$statement->bindParam(":refresh_token", $refresh_token);
		$statement->bindParam(":expires_in", $expires_in);
		$statement->bindParam(":employee_id", $employee_id);
		
		$statement->execute();
	}
	
	public static function getIMAPSettings($employee_id){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("SELECT imap_hostaddress, imap_port, imap_outboundport, imap_username, imap_password, imap_ssl, imap_certificate FROM employees WHERE employee_id = :employee_id");
		
		$statement->bindParam(":employee_id", $employee_id);
		
		$statement->execute();
		
		return $statement->fetch();
	}
	
	public static function getExchangeSettings($employee_id){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("SELECT exchange_host, exchange_username, exchange_password FROM employees WHERE employee_id = :employee_id");
		
		$statement->bindParam(":employee_id", $employee_id);
		
		$statement->execute();
		
		return $statement->fetch();
	}
	
	public static function getTodoList($employee_id){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("SELECT * FROM todolist WHERE employee_id = :employee_id AND DATE(created_on) IN (CURDATE(), CURDATE() - INTERVAL 1 DAY)");
		$statement->bindParam(":employee_id", $employee_id);
		
		$statement->execute();
		
		return $statement->fetchAll();
	}
	
	public static function addTodoEntry($employee_id, $title, $description){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("INSERT INTO todolist (employee_id, title, description) VALUES (:employee_id, :title, :description)");
		$statement->bindParam(":employee_id", $employee_id);
		$statement->bindParam(":title", $title);
		$statement->bindParam(":description", $description);
		
		$statement->execute();
	}
	
	public static function removeTodoEntry($todo_id){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("DELETE FROM todolist WHERE todo_id = :todo_id");
		$statement->bindParam(":todo_id", $todo_id);
		
		$statement->execute();
	}
	
	public static function setTodoStatus($todo_id, $status){
		$db = DBInit::getInstance();
		
		$statement = $db->prepare("UPDATE todolist SET status = :status WHERE todo_id = :todo_id");
		
		$statement->bindParam(":status", $status);
		$statement->bindParam(":todo_id", $todo_id);
		
		$statement->execute();
	}
    
    public static function setEmployeeBusy($employee_id, $logged_in){
        $currentDate = "";
        if ($logged_in == 2){ //busy
            $currentDate = date("Y-m-d H:i:s");
        }
        $db = DBInit::getInstance();
        
        $statement = $db->prepare("UPDATE employees SET logged_in = :logged_in, inactive_since = :inactive_since WHERE employee_id = :employee_id");
        $statement->bindParam(":employee_id", $employee_id);
        $statement->bindParam(":inactive_since", $currentDate);
        $statement->bindParam(":logged_in", $logged_in);
        
        $statement->execute();
    }
    
    public static function editProfileData($employee_id, $employee_name, $employee_surname, $employee_residence, $residence_latitude, $residence_longitude, $employee_email, $employee_workphone, $employee_phone, $employee_position, $employee_workfrom, $employee_workto){
        $db = DBInit::getInstance();
        
        $statement = $db->prepare("UPDATE employees SET employee_name = :employee_name, employee_surname = :employee_surname, employee_residence = :employee_residence, residence_latitude = :residence_latitude, residence_longitude = :residence_longitude, employee_email = :employee_email, employee_workphone = :employee_workphone, employee_phone = :employee_phone, employee_position = :employee_position,
        employee_workfrom = :employee_workfrom, employee_workto = :employee_workto WHERE employee_id = :employee_id");
        
        $statement->bindParam(":employee_name", $employee_name);
        $statement->bindParam(":employee_surname", $employee_surname);
        $statement->bindParam(":employee_residence", $employee_residence);
		$statement->bindParam(":residence_latitude", $residence_latitude);
		$statement->bindParam(":residence_longitude", $residence_longitude);
        $statement->bindParam(":employee_phone", $employee_phone);
        $statement->bindParam(":employee_workphone", $employee_workphone);
        $statement->bindParam(":employee_position", $employee_position);
        $statement->bindParam(":employee_email", $employee_email);
        $statement->bindParam(":employee_workfrom", $employee_workfrom);
        $statement->bindParam(":employee_workto", $employee_workto);
        $statement->bindParam(":employee_id", $employee_id);
        
        $statement->execute();
    }
    
    public static function setWizardDone($user_id){
        $db = DBInit::getInstance();
        $statement = $db->prepare("UPDATE users SET show_wizard = 0 WHERE user_id = :user_id");
        $statement->bindParam(":user_id", $user_id);
        $statement->execute();
    }
    
    public static function editUserSettings($employee_id, $language, $date_format, $time_format){
        $db = DBInit::getInstance();
        $statement = $db->prepare("UPDATE employees SET language = :language, date_format = :date_format, time_format = :time_format WHERE employee_id = :employee_id");
        
        $statement->bindParam(":language", $language);
        $statement->bindParam(":date_format", $date_format);
        $statement->bindParam(":time_format", $time_format);
        $statement->bindParam(":employee_id", $employee_id);
        
        $statement->execute();
    }
    
    public static function getEmployeeTickets($employee_id){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT tickets.*, customers.customer_name, ticket_categories.category_name, subsidiaries.subsidiary_name, employees.employee_name, employees.employee_surname FROM tickets INNER JOIN employees ON tickets.employee_id = employees.employee_id INNER JOIN ticket_categories ON tickets.ticket_type = ticket_categories.category_id INNER JOIN customers ON tickets.customer_id = customers.customer_id LEFT JOIN subsidiaries ON tickets.subsidiary_id = subsidiaries.subsidiary_id WHERE FIND_IN_SET(:employee_id, tickets.assigned_to)");
        $statement->bindParam(":employee_id", $employee_id);
        
        $statement->execute();
        
        return $statement->fetchAll();
    }
	
	public static function getEmployeeWorkOrders($employee_id){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT workorders.*, customers.customer_name FROM workorders INNER JOIN customers ON workorders.customer_id = customers.customer_id WHERE FIND_IN_SET(:employee_id, workorders.assigned_to)");
        $statement->bindParam(":employee_id", $employee_id);
        
        $statement->execute();
        
        return $statement->fetchAll();
    }
    
    public static function getEmployeeTicketsToday($employee_id){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT tickets.*, customers.customer_name FROM tickets INNER JOIN customers ON tickets.customer_id = customers.customer_id WHERE tickets.employee_id = :employee_id AND ticket_date = CURDATE()");
        $statement->bindParam(":employee_id", $employee_id);
        
        $statement->execute();
        
        return $statement->fetchAll();
    }
    
    public static function getEmployeeTicketStats($employee_id){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT COUNT(*) AS ticketcount, ticket_date FROM tickets WHERE ticket_status != 2 AND employee_id = :employee_id GROUP BY ticket_date");
        $statement->bindParam(":employee_id", $employee_id);
        $statement->execute();
        
        return $statement->fetchAll();
    }
    
    public static function getUserSettings($user_id){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT language, dateformat, timeformat FROM users WHERE user_id = :user_id");
        $statement->bindParam(":user_id", $user_id);
        
        $statement->execute();
        
        return $statement->fetch();
    }
    
    public static function changePassword($user_id, $password){
        $db = DBInit::getInstance();
        
        $statement = $db->prepare("UPDATE users SET password = :password WHERE user_id = :user_id");
        $statement->bindParam(":password", $password);
        $statement->bindParam("user_id", $user_id);
        
        $statement->execute();
    }
    
    public static function moveEmployeeToDepartment($employee_id, $department_id){
        $db = DBInit::getInstance();
        $statement = $db->prepare("UPDATE employees SET employee_department = :department_id WHERE employee_id = :employee_id");
        $statement->bindParam(":department_id", $department_id);
        $statement->bindParam(":employee_id", $employee_id);
        
        $statement->execute();
    }
    
    public static function set2FAStatus($user_id, $status, $google_auth_code){
        $db = DBInit::getInstance();
        $statement = $db->prepare("UPDATE users SET 2fa_status = :status, google_auth_code = :google_auth_code WHERE user_id = :user_id");
        $statement->bindParam(":status", $status);
        $statement->bindParam(":google_auth_code", $google_auth_code);
        $statement->bindParam(":user_id", $user_id);
        
        $statement->execute();
    }
    
    public static function setEmployeeProfilePicture($employee_id, $filename){
        $db = DBInit::getInstance();
        $statement = $db->prepare("UPDATE employees SET profile_image = :filename WHERE employee_id = :employee_id");
        $statement->bindParam(":employee_id", $employee_id);
        $statement->bindParam(":filename", $filename);
        
        $statement->execute();
    }
    
    public static function addDepartment($department_name){
        $db = DBInit::getInstance();
        $statement = $db->prepare("INSERT INTO departments (department_name) VALUES (:department_name)");
        
        $statement->bindParam(":department_name", $department_name);
        
        $statement->execute();
    }
    
    public static function editDepartment($department_id, $department_name){
        $db = DBInit::getInstance();
        $statement = $db->prepare("UPDATE departments SET department_name = :department_name WHERE department_id = :department_id");
        $statement->bindParam(":department_name", $department_name);
        $statement->bindParam(":department_id", $department_id);
        $statement->execute();
    }
    
    public static function deleteDepartment($department_id){
        $db = DBInit::getInstance();
        $statement = $db->prepare("DELETE FROM departments WHERE department_id = :department_id");
        
        $statement->bindParam(":department_id", $department_id);
        
        $statement->execute();
    }
    
    public static function getDepartments(){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT departments.*, COUNT(employees.employee_id) AS department_members FROM departments LEFT JOIN employees ON departments.department_id = employees.employee_department GROUP BY departments.department_id");
        
        $statement->execute();
        return $statement->fetchAll();
    }
    
    public static function getListOfUsers(){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT employees.*, department_name FROM employees INNER JOIN departments ON employees.employee_department = departments.department_id WHERE employees.employee_type = 0 OR employees.employee_id = :employee_id");
        $statement->bindParam(":employee_id", $_SESSION["id"]);
        $statement->execute();
        return $statement->fetchAll();
    }
	
	public static function getListOfAllUsers(){
		$db = DBInit::getInstance();
        $statement = $db->prepare("SELECT employees.*, department_name FROM employees INNER JOIN departments ON employees.employee_department = departments.department_id");
        $statement->execute();
        return $statement->fetchAll();
	}
    
    public static function getListOfActiveUsers(){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT employees.*, department_name FROM employees INNER JOIN departments ON employees.employee_department = departments.department_id WHERE employees.employee_active = 1 AND employees.employee_type = 0 OR employees.employee_id = :employee_id");
        $statement->bindParam(":employee_id", $_SESSION["id"]);
        $statement->execute();
        return $statement->fetchAll();
    }
	
	public static function getListOfAllActiveUsers(){
		$db = DBInit::getInstance();
        $statement = $db->prepare("SELECT employees.*, department_name FROM employees INNER JOIN departments ON employees.employee_department = departments.department_id WHERE employees.employee_active = 1");
        
        $statement->execute();
        return $statement->fetchAll();
	}
	
	public static function getParticipants($employeeString){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT * FROM employees WHERE employee_id IN (" . $employeeString . ")");
        
        $statement->execute();
        
        return $statement->fetchAll();
    }

    public static function addUser($employee_type, $employee_name, $employee_surname, $employee_residence, $residence_latitude, $residence_longitude, $employee_phone, $employee_workphone, $employee_department, $employee_position, $employee_email, $employee_mailing, $employee_sms, $employee_workfrom, $employee_workto, $username, $password){
        $dateformat = "DD.MM.YYYY";
		$timeformat = "HH:mm";
		$language = "en";
		
		$db = DBInit::getInstance();
        $statement = $db->prepare("INSERT INTO employees (employee_type, employee_name, employee_surname, employee_residence, residence_latitude, residence_longitude, employee_phone, employee_workphone, employee_department, employee_position, employee_email, employee_mailing, employee_sms, employee_workfrom,
        employee_workto, language, date_format, time_format, username, password) VALUES (:employee_type, :employee_name, :employee_surname, :employee_residence, :residence_latitude, :residence_longitude, :employee_phone, :employee_workphone, :employee_department, :employee_position, :employee_email, :employee_mailing, :employee_sms, :employee_workfrom, :employee_workto, :language, :date_format, :time_format, :username, :password)");
        $statement->bindParam(":employee_type", $employee_type);
        $statement->bindParam(":employee_name", $employee_name);
        $statement->bindParam(":employee_surname", $employee_surname);
        $statement->bindParam(":employee_residence", $employee_residence);
		$statement->bindParam(":residence_latitude", $residence_latitude);
		$statement->bindParam(":residence_longitude", $residence_longitude);
        $statement->bindParam(":employee_phone", $employee_phone);
        $statement->bindParam(":employee_workphone", $employee_workphone);
        $statement->bindParam(":employee_department", $employee_department);
        $statement->bindParam(":employee_position", $employee_position);
        $statement->bindParam(":employee_email", $employee_email);
        $statement->bindParam(":employee_mailing", $employee_mailing);
        $statement->bindParam(":employee_sms", $employee_sms);
        $statement->bindParam(":employee_workfrom", $employee_workfrom);
        $statement->bindParam(":employee_workto", $employee_workto);
		$statement->bindParam(":language", $language);
		$statement->bindParam(":date_format", $dateformat);
		$statement->bindParam(":time_format", $timeformat);
        $statement->bindParam(":username", $username);
        $statement->bindParam(":password", $password);
        
        $statement->execute();
        
        return $db->lastInsertId();
    }
    
    public static function addWebUser($user_id, $type, $username, $password, $workfrom, $workto){
        $db = DBInit::getInstance();
        $statement = $db->prepare("INSERT INTO users (user_id, username, password, workfrom, workto, type) VALUES (:user_id, :username, :password, :workfrom, :workto, :type)");
        $statement->bindParam(":user_id", $user_id);
        $statement->bindParam(":username", $username);
        $statement->bindParam(":password", $password);
        $statement->bindParam(":workfrom", $workfrom);
        $statement->bindParam(":workto", $workto);
        $statement->bindParam(":type", $type);
        
        $statement->execute();
    }
    
    public static function editWebUser($user_id, $type, $username, $password, $workfrom, $workto){
        $db = DBInit::getInstance();
        $statement = $db->prepare("UPDATE users SET username = :username, password = :password, workfrom = :workfrom, workto = :workto, type = :type WHERE user_id = :user_id");

        $statement->bindParam(":username", $username);
        $statement->bindParam(":password", $password);
        $statement->bindParam(":workfrom", $workfrom);
        $statement->bindParam(":workto", $workto);
        $statement->bindParam(":user_id", $user_id);
        $statement->bindParam(":type", $type);
        
        $statement->execute();
        
    }
    
    public static function editWebUserNoPassword($user_id, $type, $username, $workfrom, $workto){
        $db = DBInit::getInstance();
        $statement = $db->prepare("UPDATE users SET username = :username, workfrom = :workfrom, workto = :workto, type = :type WHERE user_id = :user_id");

        $statement->bindParam(":username", $username);
        $statement->bindParam(":workfrom", $workfrom);
        $statement->bindParam(":workto", $workto);
        $statement->bindParam(":user_id", $user_id);
        $statement->bindParam(":type", $type);
        
        $statement->execute();
        
    }
    
    public static function getUserByUsername($username){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT * FROM users WHERE username = :username");
        $statement->bindParam(":username", $username);
        
        $statement->execute();
        return $statement->fetch();
    }
    
    public static function editUser($employee_id, $employee_type, $employee_name, $employee_surname, $employee_residence, $residence_latitude, $residence_longitude, $employee_phone, $employee_workphone, $employee_department, $employee_position, $employee_email, $employee_mailing, $employee_sms, $employee_workfrom, $employee_workto, $username, $password){
        $db = DBInit::getInstance();
        $statement = $db->prepare("UPDATE employees SET employee_name = :employee_name, employee_surname = :employee_surname, employee_residence = :employee_residence, residence_latitude = :residence_latitude, residence_longitude = :residence_longitude, employee_phone = :employee_phone, employee_workphone = :employee_workphone, employee_department = :employee_department,
        employee_position = :employee_position, employee_email = :employee_email, employee_mailing = :employee_mailing, employee_sms = :employee_sms, employee_workfrom = :employee_workfrom, employee_workto = :employee_workto,
        username = :username, password = :password, employee_type = :employee_type WHERE employee_id = :employee_id");
        $statement->bindParam(":employee_name", $employee_name);
        $statement->bindParam(":employee_surname", $employee_surname);
        $statement->bindParam(":employee_residence", $employee_residence);
		$statement->bindParam(":residence_latitude", $residence_latitude);
		$statement->bindParam(":residence_longitude", $residence_longitude);
        $statement->bindParam(":employee_phone", $employee_phone);
        $statement->bindParam(":employee_workphone", $employee_workphone);
        $statement->bindParam(":employee_department", $employee_department);
        $statement->bindParam(":employee_position", $employee_position);
        $statement->bindParam(":employee_email", $employee_email);
        $statement->bindParam(":employee_mailing", $employee_mailing);
        $statement->bindParam(":employee_sms", $employee_sms);
        $statement->bindParam(":employee_workfrom", $employee_workfrom);
        $statement->bindParam(":employee_workto", $employee_workto);
        $statement->bindParam(":username", $username);
        $statement->bindParam(":password", $password);
        $statement->bindParam(":employee_type", $employee_type);
        $statement->bindParam(":employee_id", $employee_id);
        
        $statement->execute();
    }
    
    public static function editUserNoPassword($employee_id, $employee_type, $employee_name, $employee_surname, $employee_residence, $residence_latitude, $residence_longitude, $employee_phone, $employee_workphone, $employee_department, $employee_position, $employee_email, $employee_mailing, $employee_sms, $employee_workfrom, $employee_workto, $username){
        $db = DBInit::getInstance();
        $statement = $db->prepare("UPDATE employees SET employee_name = :employee_name, employee_surname = :employee_surname, employee_residence = :employee_residence, residence_latitude = :residence_latitude, residence_longitude = :residence_longitude, employee_phone = :employee_phone, employee_workphone = :employee_workphone, employee_department = :employee_department,
        employee_position = :employee_position, employee_email = :employee_email, employee_mailing = :employee_mailing, employee_sms = :employee_sms, employee_workfrom = :employee_workfrom, employee_workto = :employee_workto,
        username = :username, employee_type = :employee_type WHERE employee_id = :employee_id");
        $statement->bindParam(":employee_name", $employee_name);
        $statement->bindParam(":employee_surname", $employee_surname);
        $statement->bindParam(":employee_residence", $employee_residence);
		$statement->bindParam(":residence_latitude", $residence_latitude);
		$statement->bindParam(":residence_longitude", $residence_longitude);
        $statement->bindParam(":employee_phone", $employee_phone);
        $statement->bindParam(":employee_workphone", $employee_workphone);
        $statement->bindParam(":employee_department", $employee_department);
        $statement->bindParam(":employee_position", $employee_position);
        $statement->bindParam(":employee_email", $employee_email);
        $statement->bindParam(":employee_mailing", $employee_mailing);
        $statement->bindParam(":employee_sms", $employee_sms);
        $statement->bindParam(":employee_workfrom", $employee_workfrom);
        $statement->bindParam(":employee_workto", $employee_workto);
        $statement->bindParam(":username", $username);
        $statement->bindParam(":employee_type", $employee_type);
        $statement->bindParam(":employee_id", $employee_id);
        
        $statement->execute();
    }
    
    public static function setMailing($employee_id, $employee_mailing){
        $db = DBInit::getInstance();
        $statement = $db->prepare("UPDATE employees SET employee_mailing = :employee_mailing WHERE employee_id = :employee_id");
        $statement->bindParam(":employee_mailing", $employee_mailing);
        $statement->bindParam(":employee_id", $employee_id);
        
        $statement->execute();
    }
    
    public static function setSMS($employee_id, $employee_sms){
        $db = DBInit::getInstance();
        $statement = $db->prepare("UPDATE employees SET employee_sms = :employee_sms WHERE employee_id = :employee_id");
        $statement->bindParam(":employee_sms", $employee_sms);
        $statement->bindParam(":employee_id", $employee_id);
        
        $statement->execute();
    }
    
    public static function getEmployeeLocations(){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT * FROM employees WHERE logged_in = 1");
        $statement->execute();
        
        return $statement->fetchAll();
    }
    
    public static function getActiveEmployeeLocations(){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT * FROM employees WHERE logged_in = 1 AND employee_active = 1");
        $statement->execute();
        
        return $statement->fetchAll();
    }
    
    public static function getEmployeeLogsDate($employee_id, $datetime){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT * FROM locationlogs WHERE employee_id = :employee_id AND DATE(datetime) = DATE(:datetime) ORDER BY TIMESTAMP(datetime) ASC;");
        $statement->bindParam(":datetime", $datetime);
        $statement->bindParam(":employee_id", $employee_id);
        
        $statement->execute();
        
        return $statement->fetchAll();
    }
    
    public static function setEmployeeActivity($employee_id, $employee_active){
        $db = DBInit::getInstance();
        $statement = $db->prepare("UPDATE employees SET employee_active = :employee_active WHERE employee_id = :employee_id");
        $statement->bindParam(":employee_active", $employee_active);
        $statement->bindParam(":employee_id", $employee_id);
         
        $statement->execute();
    }
    
    public static function getEmployeeByID($employee_id){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT employees.*, departments.* FROM employees LEFT JOIN departments ON employees.employee_department = departments.department_id WHERE employees.employee_id = :employee_id");
        $statement->bindParam(":employee_id", $employee_id);
        
        $statement->execute();
        return $statement->fetch();
    }
	
	public static function getUserByID($user_id){
		$db = DBInit::getInstance();
		$statement = $db->prepare("SELECT * FROM users WHERE user_id = :user_id");
		$statement->bindParam(":user_id", $user_id);
		
		$statement->execute();
		return $statement->fetch();
	}
    
    public static function checkUserExists($employee_email){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT * FROM employees WHERE employee_email = :employee_email");
        $statement->bindParam(":employee_email", $employee_email);
        $statement->execute();
        
        $result = $statement->fetch();
        return $result;
    }
    
    public static function getEmployeeUniqueLogsDates($employee_id){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT DISTINCT DATE(date_format(datetime, '%Y-%m-%d')) AS datetime FROM locationlogs WHERE employee_id = :employee_id");
        $statement->bindParam(":employee_id", $employee_id);
        $statement->execute();
        
        return $statement->fetchAll();
    }
    
    public static function getRecipients($employeeString){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT * FROM employees WHERE employee_id IN (" . $employeeString . ")");
        
        $statement->execute();
        
        return $statement->fetchAll();
    }
    
    
}

?>