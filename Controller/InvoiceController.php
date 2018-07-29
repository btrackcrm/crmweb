<?php

require_once("Model/InvoiceDB.php");
require_once("Model/GeneralDB.php");
require_once("ViewHelper.php");

require_once('Model/InvoiceManager.php');

class InvoiceController {
    
    public static function testInvoice(){
        $settings = GeneralDB::getSettings();
        $db = new InvoiceManager();
    	// switch on test mode & create message
    	$db->setTestMode();
    	$invoice_amount = 10;
    	$invoice_number = InvoiceDB::getLastInvoiceNumber();
    	$operator_taxnr = 12345678;
    	$db->createInvoiceMsg($invoice_amount, $invoice_number, $operator_taxnr, date("Y-m-d H:i:s"));
    	
    	// post message to FURS
    	$response = $db->postXML2Furs();
    	
    	echo json_encode($response);
    }
    
    public static function testPremise(){
        $db = new InvoiceManager();
    	// switch on test mode & create message
    	$db->setTestMode();
    	
    	$db->createImmovablePremiseMsg("123BSM", "365", "123", "12", "Trubarjeva ulica", "6", "A", "Ljubljana", "Ljubljana", "1000", date("Y-m-d"));
        
        $response = $db->postXML2Furs();
        
        echo json_encode($response);
    }
    
    public static function registerMovablePremise(){
        $data = $_POST;
        
        $settings = GeneralDB::getSettings();
        $db = new InvoiceManager($settings["cert_pem"], $settings["cert_p12"], $settings["cert_password"], $settings["company_taxnumber"]);
        $db->setTestMode();
        $db->createMovablePremiseMsg($data["premise_mark"], $data["premise_type"], date("Y-m-d"));
        
        $response = $db->postXML2Furs();
        
        if (!$response["error"]){
            InvoiceDB::addMovableBusinessPremise($data["premise_mark"], $data["premise_type"], $data["premise_taxnumber"]);
        }else{
            echo ($response["errorMsg"]);
        }
    }
    
    public static function closeMovablePremise(){
        $data = $_POST;
        
        $settings = GeneralDB::getSettings();
        $premise = InvoiceDB::getPremiseByID($data["premise_id"]);
        $db = new InvoiceManager($settings["cert_pem"], $settings["cert_p12"], $settings["cert_password"], $settings["company_taxnumber"]);
        $db->setTestMode();
        $db->createMovablePremiseClosureMsg($premise["premise_mark"], $premise["premise_type"], date("Y-m-d"));
        
        $response = $db->postXML2Furs();
        
        if (!$response["error"]){
            InvoiceDB::markPremiseAsClosed($data["premise_id"]);
        }else{
            echo ($response["errorMsg"]);
        }
    }
    
    public static function registerImmovablePremise(){
        $data = $_POST;
        
        $settings = GeneralDB::getSettings();
        $db = new InvoiceManager($settings["cert_pem"], $settings["cert_p12"], $settings["cert_password"], $settings["company_taxnumber"]);
        $db->setTestMode();
        $db->createImmovablePremiseMsg($data["premise_mark"], $data["premise_cadastralnr"], $data["premise_buildingnr"], $data["premise_buildingsectionnr"], $data["premise_street"], $data["premise_housenr"], $data["premise_housenradditional"], 
        $data["premise_city"], $data["premise_post"], $data["premise_postalcode"], date("Y-m-d"));
        
        $response = $db->postXML2Furs();
        
        if (!$response["error"]){
            InvoiceDB::addImmovableBusinessPremise($data["premise_mark"], $data["premise_taxnumber"], $data["premise_cadastralnr"], $data["premise_buildingnr"], $data["premise_buildingsectionnr"], $data["premise_street"], $data["premise_housenr"], $data["premise_housenradditional"], 
            $data["premise_city"], $data["premise_post"], $data["premise_postalcode"]);
        }else{
            echo ($response["errorMsg"]);
        }
    }
    
    public static function closeImmovablePremise(){
        $data = $_POST;
        
        $settings = GeneralDB::getSettings();
        $db = new InvoiceManager($settings["cert_pem"], $settings["cert_p12"], $settings["cert_password"], $settings["company_taxnumber"]);
        $db->setTestMode();
        $db->createImmovablePremiseClosureMsg($data["premise_mark"], $data["premise_cadastralnr"], $data["premise_buildingnr"], $data["premise_buildingsectionnr"], $data["premise_street"], $data["premise_housenr"], $data["premise_housenradditional"], 
        $data["premise_city"], $data["premise_post"], $data["premise_postalcode"], date("Y-m-d"));
        
        $response = $db->postXML2Furs();
        
        if (!$response["error"]){
            InvoiceDB::markPremiseAsClosed($data["premise_id"]);
        }else{
            echo ($response["errorMsg"]);
        }
    }
    
    public static function cancelInvoice(){
        $data = $_POST;
        
        $settings = GeneralDB::getSettings();
        $db = new InvoiceManager($settings["cert_pem"], $settings["cert_p12"], $settings["cert_password"], $settings["company_taxnumber"]);
    	// switch on test mode & create message
    	$db->setTestMode();
    	
    	$invoice_id = $data["invoice_id"];
    	$invoice = InvoiceDB::getInvoiceByID($invoice_id);
    	$employee = UserDB::getEmployeeByID($_SESSION["id"]);
    	$referenceInvoiceAmount = $invoice["cost"];
    	$referenceInvoiceNr = $invoice["invoice_number"];
    	$referenceInvoiceIssueDateTime = $invoice["datetime"];
    	$invoiceNr = InvoiceDB::getLastInvoiceNumber();
    	$operatorTaxNumber = $employee["employee_taxnumber"];
    	
    	$db->createInvoiceCancelationMsg($referenceInvoiceAmount, $referenceInvoiceNr, $referenceInvoiceIssueDateTime, $invoiceNr, $operatorTaxNumber);

    	// post message to FURS
    	$response = $db->postXML2Furs();
    	
    	if (!$response["error"]){
    	    InvoiceDB::setInvoiceCanceled($invoice_id);
    	}
    	
    	echo json_encode($response);
    }
    
    public static function getInvoices(){
        $invoices = InvoiceDB::getInvoices();
        echo json_encode($invoices);
    }
    
    public static function getBusinessPremises(){
        $premises = InvoiceDB::getBusinessPremises();
        echo json_encode($premises);
    }
    
    public static function displayInvoiceDetails(){

        $invoice_id = $_GET['invoice_id'];
        $invoice = InvoiceDB::getInvoiceByID($invoice_id);
        $settings = GeneralDB::getSettings();
        ViewHelper::render("View/invoicedetails.php", ["invoice" => $invoice, "settings" => $settings]);
    }
}

?>