<?php

require_once("Model/TemplateDB.php");
require_once("ViewHelper.php");


class TemplateController {
    
    public static function getEmailTemplates(){
        $templates = TemplateDB::getEmailTemplates();
        echo json_encode($templates);
    }
    
    public static function editEmailTemplate(){
        $data = $_POST;
        TemplateDB::editEmailTemplate($data["template_id"], $data["template_subject"], $data["template_content"]);
        
        ViewHelper::redirect(BASE_URL . "settings#emails");
    }
    
    public static function displayEmailTemplate(){
        $template_id = $_GET['template_id'];
        $template = TemplateDB::getEmailTemplateByID($template_id);
        ViewHelper::render("View/emailtemplate.php", ["template" => $template]);
    }
    
    public static function getSMSTemplates(){
        $templates = TemplateDB::getSMSTemplates();
        echo json_encode($templates);
    }
    
    public static function editSMSTemplate(){
        $data = $_POST;
        TemplateDB::editSMSTemplate($data["template_id"], $data["template_content"]);
        
        ViewHelper::redirect(BASE_URL . "settings#sms");
    }
    
    public static function displaySMSTemplate(){
        $template_id = $_GET["template_id"];
        $template = TemplateDB::getSMSTemplateByID($template_id);
        ViewHelper::render("View/smstemplate.php", ["template" => $template]);
    }
}

?>