<?php

class CampaignDB{
    
    public static function addCampaign($campaign_name, $campaign_subject, $campaign_content, $workgroup_id, $campaign_type, $list_id, $mailchimp_id, $created_on, $send_time, $status, $recipients, $opens){
    	$db = DBInit::getInstance();
        $statement = $db->prepare("INSERT INTO campaigns (campaign_name, campaign_subject, campaign_content, workgroup_id, campaign_type, list_id, mailchimp_id, created_on, send_time, status, recipients, opens) VALUES (:campaign_name, :campaign_subject, :campaign_content, :workgroup_id, :campaign_type, :list_id, :mailchimp_id, :created_on, :send_time, :status, :recipients, :opens)");
        
        $statement->bindParam(":campaign_name", $campaign_name);
        $statement->bindParam(":campaign_subject", $campaign_subject);
        $statement->bindParam(":campaign_content", $campaign_content);
        $statement->bindParam(":workgroup_id", $workgroup_id);
        $statement->bindParam(":campaign_type", $campaign_type);
        $statement->bindParam(":list_id", $list_id);
        $statement->bindParam(":created_on", $created_on);
        $statement->bindParam(":send_time", $send_time);
        $statement->bindParam(":status", $status);
        $statement->bindParam(":mailchimp_id", $mailchimp_id);
        $statement->bindParam(":recipients", $recipients);
        $statement->bindParam(":opens", $opens);
        
        $statement->execute();
    
    }
    
    public static function editCampaign($campaign_id, $campaign_name, $campaign_subject, $campaign_content, $list_id, $recipients){
        $db = DBInit::getInstance();
        
        $statement = $db->prepare("UPDATE campaigns SET campaign_name = :campaign_name, campaign_subject = :campaign_subject, campaign_content = :campaign_content, list_id = :list_id, recipients = :recipients WHERE campaign_id = :campaign_id");
        
        $statement->bindParam(":campaign_name", $campaign_name);
        $statement->bindParam(":campaign_subject", $campaign_subject);
        $statement->bindParam(":campaign_content", $campaign_content);
        $statement->bindParam(":list_id", $list_id);
        $statement->bindParam(":recipients", $recipients);
        $statement->bindParam(":campaign_id", $campaign_id);
        
        $statement->execute();
    }
    
    public static function updateCampaign($campaign_id, $campaign_name, $campaign_subject, $campaign_content, $workgroup_id, $campaign_type, $list_id, $mailchimp_id, $recipients, $opens){
        $db = DBInit::getInstance();
        $statement = $db->prepare("UPDATE campaigns SET campaign_name = :campaign_name, campaign_subject = :campaign_subject, campaign_content = :campaign_content, workgroup_id = :workgroup_id, campaign_type = :campaign_type, list_id = :list_id, mailchimp_id = :mailchimp_id, recipients = :recipients, opens = :opens WHERE campaign_id = :campaign_id");
        
        $statement->bindParam(":campaign_name", $campaign_name);
        $statement->bindParam(":campaign_subject", $campaign_subject);
        $statement->bindParam(":campaign_content", $campaign_content);
        $statement->bindParam(":workgroup_id", $workgroup_id);
        $statement->bindParam(":campaign_type", $campaign_type);
        $statement->bindParam(":list_id", $list_id);
        $statement->bindParam(":mailchimp_id", $mailchimp_id);
        $statement->bindParam(":recipients", $recipients);
        $statement->bindParam(":opens", $opens);
        $statement->bindParam(":campaign_id", $campaign_id);
        
        $statement->execute();
    }
    
    public static function getCampaigns(){
    
    	$db = DBInit::getInstance();
        $statement = $db->prepare("SELECT campaigns.*, campaign_lists.* FROM campaigns INNER JOIN campaign_lists ON campaigns.list_id = campaign_lists.list_id WHERE campaigns.workgroup_id IS NULL");
        
        $statement->execute();
        
        return $statement->fetchAll();
        
    }
    
    public static function getWorkgroupCampaigns($workgroup_id){
    
    	$db = DBInit::getInstance();
        $statement = $db->prepare("SELECT campaigns.*, campaign_lists.* FROM campaigns INNER JOIN campaign_lists ON campaigns.list_id = campaign_lists.list_id WHERE campaigns.workgroup_id = :workgroup_id");
        $statement->bindParam(":workgroup_id", $workgroup_id);
        $statement->execute();
        
        return $statement->fetchAll();
        
    }
    
    public static function getCampaignByID($campaign_id){
    
    	$db = DBInit::getInstance();
        $statement = $db->prepare("SELECT campaigns.*, campaign_lists.list_name, campaign_lists.list_id, campaign_lists.subscribers, campaign_lists.from_name, campaign_lists.from_email FROM campaigns INNER JOIN campaign_lists ON campaigns.list_id = campaign_lists.list_id WHERE campaigns.campaign_id = :campaign_id");
        
        $statement->bindParam(":campaign_id", $campaign_id);
        
        $statement->execute();
        
        return $statement->fetch();
    }
    
    public static function markCampaignAsSent($campaign_id){
    	$status = 1;
    	$send_time = date("Y-m-d H:i:s");
    	$db = DBInit::getInstance();
        $statement = $db->prepare("UPDATE campaigns SET status = :status, send_time = :send_time WHERE campaign_id = :campaign_id");
        
        $statement->bindParam(":status", $status);
        $statement->bindParam(":send_time", $send_time);
        $statement->bindParam(":campaign_id", $campaign_id);
        
        $statement->execute();
    }
    
    public static function checkMailchimpCampaignExists($mailchimp_id){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT * FROM campaigns WHERE mailchimp_id = :mailchimp_id");
        $statement->bindParam(":mailchimp_id", $mailchimp_id);
        
        $statement->execute();
        
        return $statement->fetch();
    }
    
    public static function addSubscriberList($list_name, $subscribers, $workgroup_id, $mailchimp_id, $created_on, $from_name, $from_email, $permission_reminder, $list_type){
       	$db = DBInit::getInstance();
       	$statement = $db->prepare("INSERT INTO campaign_lists (list_name, subscribers, workgroup_id, mailchimp_id, created_on, from_name, from_email, permission_reminder, list_type) VALUES (:list_name, :subscribers, :workgroup_id, :mailchimp_id, :created_on, :from_name, :from_email, :permission_reminder, :list_type)");
       	
       	$statement->bindParam(":list_name", $list_name);
       	$statement->bindParam(":subscribers", $subscribers);
       	$statement->bindParam(":workgroup_id", $workgroup_id);
    	$statement->bindParam(":mailchimp_id", $mailchimp_id);
    	$statement->bindParam(":created_on", $created_on);
    	$statement->bindParam(":from_name", $from_name);
    	$statement->bindParam(":from_email", $from_email);
    	$statement->bindParam(":permission_reminder", $permission_reminder);
    	$statement->bindParam(":list_type", $list_type);
       	
       	$statement->execute();
   
   }
   
   public static function updateListMailchimpID($list_id, $mailchimp_id){
       $db = DBInit::getInstance();
       $statement = $db->prepare("UPDATE campaign_lists SET mailchimp_id = :mailchimp_id WHERE list_id = :list_id");
       $statement->bindParam(":mailchimp_id", $mailchimp_id);
       $statement->bindParam(":list_id", $list_id);
       
       $statement->execute();
   }
   
   public static function getSubscriberLists(){
   	    $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT * FROM campaign_lists WHERE workgroup_id IS NULL");
        
        $statement->execute();
		
	    return $statement->fetchAll();
   
   }
   
   public static function getWorkgroupSubscriberLists($workgroup_id){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT * FROM campaign_lists WHERE workgroup_id = :workgroup_id");
        $statement->bindParam(":workgroup_id", $workgroup_id);
        $statement->execute();
		
	    return $statement->fetchAll();
   }
   
   public static function getListByID($list_id){
   	    $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT * FROM campaign_lists WHERE list_id = :list_id");
        
        $statement->bindParam(":list_id", $list_id);
        $statement->execute();
		
	    return $statement->fetch();
   }
   
   public static function getMailchimpListID($mailchimp_id){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT * FROM campaign_lists WHERE mailchimp_id = :mailchimp_id");
        $statement->bindParam(":mailchimp_id", $mailchimp_id);
        
        $statement->execute();
        
        return $statement->fetch();
   }
   
   public static function updateSubscriberList($list_id, $subscribers){
   	    $db = DBInit::getInstance();
        $statement = $db->prepare("UPDATE campaign_lists SET subscribers = :subscribers WHERE list_id = :list_id");
        
        $statement->bindParam(":list_id", $list_id);
        $statement->bindParam(":subscribers", $subscribers);
        
        $statement->execute();
   
   }
  
   public static function deleteSubscriberList($list_id) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("DELETE FROM campaign_lists WHERE list_id = :list_id");
        $statement->bindParam(":list_id", $list_id, PDO::PARAM_INT);
        $statement->execute();
    }   
    
    public static function deleteCampaign($campaign_id){
   	    $db = DBInit::getInstance();

        $statement = $db->prepare("DELETE FROM campaigns WHERE campaign_id = :campaign_id");
        $statement->bindParam(":campaign_id", $campaign_id, PDO::PARAM_INT);
        $statement->execute();
    }
     
    public static function getRecentlyCreatedCampaignsWorkgroup($workgroup_id){
        $db = DBInit::getInstance();
        
        $statement = $db->prepare("SELECT * FROM campaigns WHERE workgroup_id = :workgroup_id ORDER BY DATE(created_on) DESC LIMIT 5");
        $statement->bindParam(":workgroup_id", $workgroup_id);
        
        $statement->execute();
        
        return $statement->fetchAll();
    }
    
    public static function getRecentlySentCampaignsWorkgroup($workgroup_id){
        $db = DBInit::getInstance();
        
        $statement = $db->prepare("SELECT * FROM campaigns WHERE workgroup_id = :workgroup_id ORDER BY DATE(send_time) DESC LIMIT 5");
        $statement->bindParam(":workgroup_id", $workgroup_id);
        
        $statement->execute();
        
        return $statement->fetchAll();
    }
    
    public static function getRecentlyCreatedListsWorkgroup($workgroup_id){
        $db = DBInit::getInstance();
        
        $statement = $db->prepare("SELECT * FROM campaign_lists WHERE workgroup_id = :workgroup_id ORDER BY DATE(created_on) DESC LIMIT 5;");
        $statement->bindParam(":workgroup_id", $workgroup_id);
        
        $statement->execute();
        
        return $statement->fetchAll();
    }
    
    public static function getRecentlyCreatedCampaigns(){
        $db = DBInit::getInstance();
        
        $statement = $db->prepare("SELECT * FROM campaigns WHERE workgroup_id IS NULL ORDER BY DATE(created_on) DESC LIMIT 5");
        $statement->bindParam(":workgroup_id", $workgroup_id);
        
        $statement->execute();
        
        return $statement->fetchAll();
    }
    
    public static function getRecentlySentCampaigns(){
        $db = DBInit::getInstance();
        
        $statement = $db->prepare("SELECT * FROM campaigns WHERE workgroup_id IS NULL ORDER BY DATE(send_time) DESC LIMIT 5");
        $statement->bindParam(":workgroup_id", $workgroup_id);
        
        $statement->execute();
        
        return $statement->fetchAll();
    }
    
    public static function getRecentlyCreatedLists(){
        $db = DBInit::getInstance();
        
        $statement = $db->prepare("SELECT * FROM campaign_lists WHERE workgroup_id IS NULL ORDER BY DATE(created_on) DESC LIMIT 5;");
        $statement->bindParam(":workgroup_id", $workgroup_id);
        
        $statement->execute();
        
        return $statement->fetchAll();
    }
}

?>