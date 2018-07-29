<?php

require_once "DBInit.php";

class TemplateDB {
    
    public static function getEmailTemplates(){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT * FROM emailtemplates");
        
        $statement->execute();
        return $statement->fetchAll();
    }
    
    public static function getSMSTemplates(){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT * FROM smstemplates");
        
        $statement->execute();
        return $statement->fetchAll();
    }
    
    public static function getEmailTemplateByID($template_id){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT * FROM emailtemplates WHERE template_id = :template_id");
        $statement->bindParam(":template_id", $template_id);
        
        $statement->execute();
        return $statement->fetch();
    }
    
    public static function getSMSTemplateByID($template_id){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT * FROM smstemplates WHERE template_id = :template_id");
        $statement->bindParam(":template_id", $template_id);
        
        $statement->execute();
        return $statement->fetch();
    }
    
    public static function editEmailTemplate($template_id, $template_subject, $template_content){
        $db = DBInit::getInstance();
        $statement = $db->prepare("UPDATE emailtemplates SET template_subject = :template_subject, template_content = :template_content WHERE template_id = :template_id");
        
        $statement->bindParam(":template_subject", $template_subject);
        $statement->bindParam(":template_content", $template_content);
        $statement->bindParam(":template_id", $template_id);
        
        $statement->execute();
    }
    
    public static function editSMSTemplate($template_id, $template_content){
        $db = DBInit::getInstance();
        $statement = $db->prepare("UPDATE smstemplates SET template_content = :template_content WHERE template_id = :template_id");
        
        $statement->bindParam(":template_content", $template_content);
        $statement->bindParam(":template_id", $template_id);
        
        $statement->execute();
    }
}

?>