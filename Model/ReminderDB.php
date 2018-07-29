<?php

require_once "DBInit.php";

class ReminderDB{
    
    public static function addReminder($event_id, $customer_id, $employee_id, $reminder_datetime){
        $db = DBInit::getInstance();
        $statement = $db->prepare("INSERT INTO reminders (event_id, customer_id, employee_id, reminder_datetime) VALUES (:event_id, :customer_id, :employee_id, :reminder_datetime)");
        
        $statement->bindParam(":event_id", $event_id);
        $statement->bindParam(":customer_id", $customer_id);
        $statement->bindParam(":employee_id", $employee_id);
        $statement->bindParam(":reminder_datetime", $reminder_datetime);
        
        $statement->execute();
    }
    
    public static function removeEventReminders($event_id){
        $db = DBInit::getInstance();
        $statement = $db->prepare("DELETE FROM reminders WHERE event_id = :event_id");
        
        $statement->bindParam(":event_id", $event_id);
        
        $statement->execute();
    }
    
}

?>