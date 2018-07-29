<?php

require_once "DBInit.php";

class InvoiceDB{
    
    public static function getInvoices(){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT * FROM invoices INNER JOIN employees ON invoices.employee_id = employees.employee_id");
        
        $statement->execute();
        return $statement->fetchAll();
    }
    
    public static function getBusinessPremises(){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT * FROM business_premises");
        
        $statement->execute();
        return $statement->fetchAll();
    }
    
    public static function getInvoiceByID($invoice_id){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT * FROM invoices WHERE invoice_id = :invoice_id");
        $statement->bindParam(":invoice_id", $invoice_id);
        
        $statement->execute();
        return $statement->fetch();
    }
    
    public static function getLastInvoiceNumber(){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT * FROM invoices ORDER BY invoice_id DESC LIMIT 1;");
        $statement->execute();
        
        return $statement->fetch()["invoice_number"];
    }
    
    public static function addMovableBusinessPremise($premise_mark, $premise_type, $premise_taxnumber){
        $db = DBInit::getInstance();
        $statement = $db->prepare("INSERT INTO business_premises (premise_mark, premise_type, premise_taxnumber) VALUES (:premise_mark, :premise_type, :premise_taxnumber)");
        $statement->bindParam(":premise_mark", $premise_mark);
        $statement->bindParam(":premise_type", $premise_type);
        $statement->bindParam(":premise_taxnumber", $premise_taxnumber);
        
        $statement->execute();
        
    }
    
    public static function addImmovableBusinessPremise($premise_mark, $premise_taxnumber, $premise_cadastralnr, $premise_buildingnr, $premise_buildingsectionnr, $premise_street, $premise_housenr, $premise_housenradditional, $premise_city, $premise_post, $premise_postalcode){
        $db = DBInit::getInstance();
        $statement = $db->prepare("INSERT INTO business_premises (premise_mark, premise_taxnumber, premise_cadastralnr, premise_buildingnr, premise_buildingsectionnr, premise_street, premise_housenr, premise_housenradditional, premise_city, premise_post, premise_postalcode) VALUES
        (:premise_mark, :premise_taxnumber, :premise_cadastralnr, :premise_buildingnr, :premise_buildingsectionnr, :premise_street, :premise_housenr, :premise_housenradditional, :premise_city, :premise_post, :premise_postalcode");
        
        $statement->bindParam(":premise_mark", $premise_mark);
        $statement->bindParam(":premise_taxnumber", $premise_taxnumber);
        $statement->bindParam(":premise_cadastralnr", $premise_cadastralnr);
        $statement->bindParam(":premise_buildingnr", $premise_buildingnr);
        $statement->bindParam(":premise_buildingsectionnr", $premise_buildingsectionnr);
        $statement->bindParam(":premise_street", $premise_street);
        $statement->bindParam(":premise_housenr", $premise_housenr);
        $statement->bindParam(":premise_housenradditional", $premise_housenradditional);
        $statement->bindParam(":premise_city", $premise_city);
        $statement->bindParam(":premise_post", $premise_post);
        $statement->bindParam(":premise_postalcode", $premise_postalcode);
        
        $statement->execute();
    }
    
    public static function markPremiseAsClosed($premise_id){
        $db = DBInit::getInstance();
        $statement = $db->prepare("UPDATE business_premises SET premise_status = 0 WHERE premise_id = :premise_id");
        
        $statement->bindParam(":premise_id", $premise_id);
        
        $statement->execute();
    }
    
}

?>