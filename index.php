<?php

session_start();

require_once("Controller/GeneralController.php");
require_once("Controller/UserController.php");
require_once("Controller/InvoiceController.php");
require_once("Controller/EventController.php");
require_once("Controller/CustomerController.php");
require_once("Controller/MailingController.php");
require_once("Controller/TemplateController.php");
require_once("Controller/TravelOrderController.php");
require_once("Controller/WorkOrderController.php");
require_once("Controller/WorkgroupController.php");
require_once("Controller/CampaignController.php");
require_once("Controller/TelephonyController.php");
require_once("Controller/TrackingController.php");
require_once("Controller/AssetController.php");

define("BASE_URL", $_SERVER["SCRIPT_NAME"] . "/");
define("DIR_URL", rtrim($_SERVER["SCRIPT_NAME"], "index.php"));
define("UPLOADS_URL", rtrim($_SERVER["SCRIPT_NAME"], "index.php") . "Uploads/");
define("ASSETS_URL", rtrim($_SERVER["SCRIPT_NAME"], "index.php") . "assets/plugins/");
define("CSS_URL", rtrim($_SERVER["SCRIPT_NAME"], "index.php") . "assets/css/");
define("IMG_URL", rtrim($_SERVER["SCRIPT_NAME"], "index.php") . "assets/img/");
define("JS_URL", rtrim($_SERVER["SCRIPT_NAME"], "index.php") . "assets/js/");
define("TELEPHONY_URL", rtrim($_SERVER["SCRIPT_NAME"], "index.php") . "Telephone/");

$path = isset($_SERVER["PATH_INFO"]) ? trim($_SERVER["PATH_INFO"], "/") : "";
        $urls = [
			"transfer" => function(){
				GeneralController::showDownloadPage();
			},
			"file/transfer" => function(){
				GeneralController::transferFilesSecurely();
			},
            "diskspace" => function(){
                GeneralController::getFreeDiskSpace();  
            },
            "login" => function(){
                ViewHelper::render("View/login.php");
            },
            "passwordreset" => function(){
                ViewHelper::render("View/passwordreset.php");  
            },
            "sendreset" => function(){
                GeneralController::sendPasswordReset();  
            },
            "logout" => function(){
                GeneralController::logout();
            },
            "logmein" => function() {
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    GeneralController::login();
                }
                else {
                    GeneralController::showLoginForm();
                }
            },
            "bria" => function(){
                if (isset($_SESSION["id"])){
                    ViewHelper::render("View/bria.php");  
                }else{
                    ViewHelper::render("View/login.php", ["errorMessage" => "Session timed out, please relogin. "]);
                }
            },
            "dashboard" => function(){
                if (isset($_SESSION["id"])){
                    ViewHelper::render("View/dashboard.php");
                }else{
                    ViewHelper::render("View/login.php", ["errorMessage" => "Session timed out, please relogin. "]);
                }
            },
            "tracking" => function(){
                if (isset($_SESSION["id"])){
                    ViewHelper::render("View/tracking.php");  
                }else{
                    ViewHelper::render("View/login.php", ["errorMessage" => "Session timed out, please relogin. "]);
                }
            },
            "basic_tracking" => function(){
                 if (isset($_SESSION["id"])){
                    ViewHelper::render("View/tracking_locations.php");  
                }else{
                    ViewHelper::render("View/login.php", ["errorMessage" => "Session timed out, please relogin. "]);
                }
            },
            "departments" => function(){
                if (isset($_SESSION["id"])){
                    ViewHelper::render("View/departments.php");  
                }else{
                    ViewHelper::render("View/login.php", ["errorMessage" => "Session timed out, please relogin. "]);
                }
            },
            "employees" => function(){
                if (isset($_SESSION["id"])){
                    ViewHelper::render("View/employees.php");
                }else{
                    ViewHelper::render("View/login.php", ["errorMessage" => "Session timed out, please relogin. "]);
                }
            },
            "assets" => function(){
                if (isset($_SESSION["id"])){
                    ViewHelper::render("View/assets.php"); 
                }else{
                    ViewHelper::render("View/login.php", ["errorMessage" => "Session timed out, please relogin. "]);
                }
            }, 
            "workorders" => function(){
                if (isset($_SESSION["id"])){
                    ViewHelper::render("View/workorders.php");
                }else{
                    ViewHelper::render("View/login.php", ["errorMessage" => "Session timed out, please relogin. "]);
                }
            },
            "addworkorder" => function(){
                if (isset($_SESSION["id"])){
                    ViewHelper::render("View/workorder_add.php"); 
                }else{
                    ViewHelper::render("View/login.php", ["errorMessage" => "Session timed out, please relogin. "]);
                }
            },
            "travelorders" => function(){
                if (isset($_SESSION["id"])){
                    ViewHelper::render("View/travelorders.php");
                }else{
                    ViewHelper::render("View/login.php", ["errorMessage" => "Session timed out, please relogin. "]);
                }
            },
            "invoices" => function(){
                if (isset($_SESSION["id"])){
                    ViewHelper::render("View/invoices.php");
                }else{
                    ViewHelper::render("View/login.php", ["errorMessage" => "Session timed out, please relogin. "]);
                }
            },
            "documents" => function(){
                if (isset($_SESSION["id"])){
                    ViewHelper::render("View/documents.php"); 
                }else{
                    ViewHelper::render("View/login.php", ["errorMessage" => "Session timed out, please relogin. "]); 
                }
            },
            "events" => function(){
                if (isset($_SESSION["id"])){
                    ViewHelper::render("View/events.php"); 
                }else{
                    ViewHelper::render("View/login.php", ["errorMessage" => "Session timed out, please relogin. "]);   
                }
            },
            "customers" => function(){
                if (isset($_SESSION["id"])){
                    ViewHelper::render("View/customers.php");  
                }else{
                    ViewHelper::render("View/login.php", ["errorMessage" => "Session timed out, please relogin. "]);   
                }
            },
			"leads" => function(){
                if (isset($_SESSION["id"])){
                    ViewHelper::render("View/leads.php");  
                }else{
                    ViewHelper::render("View/login.php", ["errorMessage" => "Session timed out, please relogin. "]);   
                }
            },
			"opportunities" => function(){
                if (isset($_SESSION["id"])){
                    ViewHelper::render("View/opportunities.php");  
                }else{
                    ViewHelper::render("View/login.php", ["errorMessage" => "Session timed out, please relogin. "]);   
                }
            },
            "worklocations" => function(){
                if (isset($_SESSION["id"])){
                    ViewHelper::render("View/tracking_locations.php");  
                }else{
                    ViewHelper::render("View/login.php", ["errorMessage" => "Session timed out, please relogin. "]);   
                } 
            },
            "settings" => function(){
                if (isset($_SESSION["id"])){
                    ViewHelper::render("View/settings.php");  
                }else{
                    ViewHelper::render("View/login.php", ["errorMessage" => "Session timed out, please relogin. "]);  
                }
            },
            "reminders" => function(){
                if (isset($_SESSION["id"])){
                    ViewHelper::render("View/reminders.php"); 
                }else{
                    ViewHelper::render("View/login.php", ["errorMessage" => "Session timed out, please relogin. "]);
                }
            },
			"reports" => function(){
                if (isset($_SESSION["id"])){
					UserController::viewSLAReports(); 
                }else{
                    ViewHelper::render("View/login.php", ["errorMessage" => "Session timed out, please relogin. "]);
                }
            },
			"gdpr" => function(){
                if (isset($_SESSION["id"])){
                    ViewHelper::render("View/gdpr.php"); 
                }else{
                    ViewHelper::render("View/login.php", ["errorMessage" => "Session timed out, please relogin. "]);
                }
            },
            "unknownstops" => function(){
                if (isset($_SESSION["id"])){
                    ViewHelper::render("View/unknownstops.php");  
                }else{
                    ViewHelper::render("View/login.php", ["errorMessage" => "Session timed out, please relogin. "]);
                }
            },
            "wizard" => function(){
                ViewHelper::render("View/wizard.php");  
            },
            "campaign" => function(){
                if (isset($_SESSION["id"])){
                    CampaignController::showMailingPage();  
                }else{
                    ViewHelper::render("View/login.php", ["errorMessage" => "Session timed out, please relogin. "]);
                }
            },
            "calls" => function(){
                if (isset($_SESSION["id"])){
                    ViewHelper::render("View/phonecalls.php");  
                }else{
                    ViewHelper::render("View/login.php", ["errorMessage" => "Session timed out, please relogin. "]);
                }
            },
            "profilepage" => function(){
                if (isset($_SESSION["id"])){
                    UserController::viewProfilePage();
                }else{
                    ViewHelper::render("View/login.php", ["errorMessage" => "Session timed out, please relogin. "]);
                }
            },
            "employeepage" => function(){
                if (isset($_SESSION["id"])){
                    UserController::viewEmployeePage();
                }else{
                    ViewHelper::render("View/login.php", ["errorMessage" => "Session timed out, please relogin. "]);
                }
            },
            "workgroups" => function(){
                if (isset($_SESSION["id"])){
                    ViewHelper::render("View/workgroups.php");  
                }else{
                    ViewHelper::render("View/login.php", ["errorMessage" => "Session timed out, please relogin. "]);
                }
            },
            "workgroupdetails" => function(){
                if (isset($_SESSION["id"])){
                    WorkgroupController::goToWorkgroup();
                }else{
                    ViewHelper::render("View/login.php", ["errorMessage" => "Session timed out, please relogin. "]);
                }
            },
            "webmail" => function(){
                if (isset($_SESSION["id"])){
					MailingController::showWebmailPage();
                } else{
                    ViewHelper::render("View/login.php", ["errorMessage" => "Session timed out, please relogin. "]);
                }
            },
            "telephonydashboard" => function(){
                if (isset($_SESSION["id"])){
                    ViewHelper::render("View/telephony_dashboard.php");  
                }else{
                    ViewHelper::render("View/login.php", ["errorMessage" => "Session timed out, please relogin. "]);
                }
            },
            "callcenter" => function(){
                if (isset($_SESSION["id"])){
                    TelephonyController::showTelephonyPage();
                }else{
                    ViewHelper::render("View/login.php", ["errorMessage" => "Session timed out, please relogin. "]);
                }
            },
			"ticketingdashboard" => function(){
                if (isset($_SESSION["id"])){
					TelephonyController::showTicketingDashboard();
                }else{
                    ViewHelper::render("View/login.php", ["errorMessage" => "Session timed out, please relogin. "]);
                }
            },
            "ticketing" => function(){
                if (isset($_SESSION["id"])){
                    ViewHelper::render("View/my_tickets.php");
                }else{
                    ViewHelper::render("View/login.php", ["errorMessage" => "Session timed out, please relogin. "]);
                }
            },
            "ticketdetails" => function(){
                if (isset($_SESSION["id"])){
                    TelephonyController::showTicketPage(); 
                }else{
                    ViewHelper::render("View/login.php", ["errorMessage" => "Session timed out, please relogin. "]);
                }
            },
			"workforce" => function(){
				if (isset($_SESSION["id"])){
                    ViewHelper::render("View/workforce.php");
                }else{
                    ViewHelper::render("View/login.php", ["errorMessage" => "Session timed out, please relogin. "]);
                }
			},
			"filetransfer" => function(){
				if (isset($_SESSION["id"])){
                    ViewHelper::render("View/filetransfer.php");
                }else{
                    ViewHelper::render("View/login.php", ["errorMessage" => "Session timed out, please relogin. "]);
                }
			},
			"mailmanager" => function(){
				if (isset($_SESSION["id"])){
                    ViewHelper::render("View/mailmanager.php");
                }else{
                    ViewHelper::render("View/login.php", ["errorMessage" => "Session timed out, please relogin. "]);
                }
			},
			"filetransfer/getall" => function(){
				GeneralController::getAllFileTransfers();
			},
			"filteremails" => function(){
				MailingController::filterEmails();
			},
			"dashboard/getCalendar" => function(){
				UserController::getCalendarEvents();
			},
			"todolist/get" => function(){
				UserController::getTodoList();
			},
			"todolist/add" => function(){
				UserController::addTodoEntry();
			},
			"todolist/remove" => function(){
				UserController::removeTodoEntry();
			},
			"todolist/status" => function(){
				UserController::setTodoStatus();
			},
            "profile/edit" => function(){
                UserController::editProfileData();  
            },
            "csv/import" => function(){
                GeneralController::parseImportedCSV();  
            },
			"resetpassword" => function(){
				GeneralController::resetPassword();
			},
            "TFALogin" => function(){
                GeneralController::TFALogin();  
            },
            "wizardcomplete" => function(){
                GeneralController::completeWizard();  
            },
            "vat/search" => function(){
                GeneralController::searchByVAT();  
            },
            "mk/setup" => function(){
                GeneralController::saveMKSettings();  
            },
            "mk/disconnect" => function(){
                GeneralController::disconnectMK();  
            },
            "blacklist/add" => function(){
                TelephonyController::addToBlacklist();  
            },
            "blacklist/edit" => function(){
                TelephonyController::editBlacklist();
            },
            "blacklist/delete" => function(){
                TelephonyController::deleteBlacklist();  
            },
            "blacklist/get" => function(){
                TelephonyController::getBlacklist();  
            },
			"telephony/agentstatus" => function(){
				TelephonyController::getAgentStatuses();
			},
			"telephony/queuestatus" => function(){
				TelephonyController::getQueueStatuses();
			},
			"ticketcategory/get" => function(){
				TelephonyController::getTicketCategories();
			},
			"ticketcategory/add" => function(){
				TelephonyController::addTicketCategory();
			},
			"ticketcategory/edit" => function(){
				TelephonyController::editTicketCategory();
			},
			"ticketcategory/delete" => function(){
				TelephonyController::deleteTicketCategory();
			},
			"ticketing/addnote" => function(){
				TelephonyController::addTicketNote();
			},
			"telephony/sendemail" => function(){
				TelephonyController::sendTelephonyEmail();
			},
			"telephony/answered" => function(){
				TelephonyController::checkEmailsAnswered();
			},
            "telephony/testMK" => function(){
                TelephonyController::getMKProducts();  
            },
            "telephony/gettickets" => function(){
                TelephonyController::getTickets();  
            },
			"tickets/alltoday" => function(){
				TelephonyController::getTodaysTickets();
			},
			"tickets/lastweek" => function(){
				TelephonyController::getTicketsLastWeek();
			},
            "ticket/status" => function(){
                TelephonyController::updateTicketStatus();  
            },
			"ticket/opened" => function(){
				TelephonyController::markTicketAsOpened();
			},
			"ticket/upload" => function(){
				TelephonyController::uploadTicketFile();
			},
            "telephony/addticket" => function(){
                TelephonyController::addTicket();  
            },
            "telephony/editticket" => function(){
                TelephonyController::editTicket();  
            },
            "telephony/finishcampaign" => function(){
                TelephonyController::finishCampaign();  
            },
            "telephony/editcampaign" => function(){
                TelephonyController::editCampaign();  
            },
            "telephony/campaignlist" => function(){
                TelephonyController::getCampaigns();  
            },
            "telephony/campaignsubs" => function(){
                TelephonyController::getCampaignSubscribers();  
            },
            "telephony/campaignstats" => function(){
                TelephonyController::getCampaignStats();  
            },
            "telephony/customercalled" => function(){
                TelephonyController::markCustomerAsCalled();  
            },
            "telephony/campaigncalls" => function(){
                TelephonyController::getCampaignCalls();  
            },
            "telephony/insertcampaigncall" => function(){
                TelephonyController::insertCampaignCall();  
            },
            "telephony/addsubscriber" => function(){
                TelephonyController::addCampaignSubscriber();  
            },
            "telephony/campaign" => function(){
                TelephonyController::createCampaign();  
            },
            "telephony/import" => function(){
                TelephonyController::importCampaignSubscribers();  
            },
            "telephony/getMKCustomer" => function(){
                TelephonyController::getMKCustomer();  
            },
            "telephony/addMKCustomer" => function(){
                TelephonyController::addMKCustomer();  
            },
            "telephony/updateMKCustomer" => function(){
                TelephonyController::updateMKCustomer();  
            },
            "telephony/usersetup" => function(){
                TelephonyController::setupUser();  
            },
			"telephony/emailsetup" => function(){
				TelephonyController::setupUserEmail();
			},
			"telephony/imapdisconnect" => function(){
				TelephonyController::disconnectIMAP();
			},
            "telephony/logout" => function(){
                TelephonyController::logoutUser();  
            },
            "telephony/outgoing" => function(){
                TelephonyController::insertOutgoing();  
            },
            "telephony/pushmobile" => function(){
                TelephonyController::pushCallToMobile();  
            },
            "telephony/getEmails" => function(){
                TelephonyController::retrieveEmails();  
            },
			"telephony/365list" => function(){
				MailingController::getTelephonyOffice365Emails();
			},
			"telephony/365search" => function(){
				MailingController::searchTelephonyOffice365Emails();
			},
			"telephony/365attachments" => function(){
				MailingController::getTelephonyOffice365EmailAttachments();
			},
			"telephony/inboxcount" => function(){
				MailingController::getExchangeInboxCount();
			},
			"telephony/exchangelist" => function(){
				MailingController::getTelephonyExchangeEmails();
			},
			"telephony/exchangesearch" => function(){
				MailingController::searchTelephonyExchangeEmails();
			},
			"telephony/getexchangemail" => function(){
				MailingController::getTelephonyExchangeEmailByID();
			},
			"telephony/searchEmails" => function(){
				TelephonyController::searchEmails();
			},
            "telephony/emailRead" => function(){
                TelephonyController::setEmailStatus();  
            },
            "telephony/emailOpened" => function(){
                TelephonyController::setEmailOpened();  
            },
            "telephony/getEmail" => function(){
                TelephonyController::getEmailByID();  
            },
			"telephony/getattachments" => function(){
				TelephonyController::getEmailAttachments();
			},
            "telephony/stats" => function(){
                TelephonyController::getCallStatistics();  
            },
			"telephony/getEmployeeCalls" => function(){
				TelephonyController::getEmployeeCalls();
			},
			"telephony/test" => function(){
				TelephonyController::threadEmails();
			},
			"webmail/imap" => function(){
				if (isset($_SESSION["id"])){
                    ViewHelper::render("View/webmail_imap.php");
                }else{
                    ViewHelper::render("View/login.php", ["errorMessage" => "Session timed out, please relogin. "]);
                }
			},
			"webmail/exchange" => function(){
				if (isset($_SESSION["id"])){
                    ViewHelper::render("View/webmail_exchange.php");
                }else{
                    ViewHelper::render("View/login.php", ["errorMessage" => "Session timed out, please relogin. "]);
                }
			},
			"webmail/office365" => function(){
				if (isset($_SESSION["id"])){
                    ViewHelper::render("View/webmail_365.php");
                }else{
                    ViewHelper::render("View/login.php", ["errorMessage" => "Session timed out, please relogin. "]);
                }
			},
			"webmail/gmail" => function(){
				if (isset($_SESSION["id"])){
                    ViewHelper::render("View/webmail_gmail.php");
                }else{
                    ViewHelper::render("View/login.php", ["errorMessage" => "Session timed out, please relogin. "]);
                }
			},
			"webmail/filters" => function(){
				MailingController::getEmailFilters();
			},
			"webmail/actions" => function(){
				MailingController::getEmailActions();
			},
			"webmail/addfilter" => function(){
				MailingController::addEmailFilter();
			},
			"webmail/editfilter" => function(){
				MailingController::editEmailFilter();
			},
			"webmail/deletefilter" => function(){
				MailingController::deleteEmailFilter();
			},
			"webmail/runfilters" => function(){
				MailingController::filterEmails();
			},
			"webmail/getmail" => function(){
				MailingController::getMailByID();
			},
			"webmail/getexchangemail" => function(){
				MailingController::getExchangeEmailByID();
			},
			"webmail/ics" => function(){
				MailingController::checkForICS();
			},
			"webmail/imaplist" => function(){
				MailingController::retrieveIMAPEmails();
			},
			"webmail/exchangelist" => function(){
				MailingController::getExchangeEmails();
			},
			"webmail/imapsearch" => function(){
				MailingController::searchIMAPEmails();
			},
			"webmail/exchangesearch" => function(){
				MailingController::searchExchangeEmails();
			},
			"webmail/imapfolders" => function(){
				MailingController::getMailboxFolders();
			},
			"webmail/exchangefolders" => function(){
				MailingController::getExchangeFolders();
			},
			"webmail/imapfoldercreate" => function(){
				MailingController::createMailbox();
			},
			"webmail/exchangefoldercreate" => function(){
				MailingController::createExchangeFolder();
			},
			"webmail/imapread" => function(){
				MailingController::markIMAPRead();
			},
			"webmail/exchangeread" => function(){
				MailingController::markExchangeRead();
			},
			"webmail/imapstar" => function(){
				MailingController::toggleIMAPStarred();
			},
			"webmail/exchangestar" => function(){
				MailingController::changeExchangeImportance();
			},
			"webmail/imapmove" => function(){
				MailingController::moveEmail();
			},
			"webmail/exchangemove" => function(){
				MailingController::moveExchangeEmail();
			},
			"webmail/imapdelete" => function(){
				MailingController::deleteIMAPEmail();
			},
			"webmail/exchangedelete" => function(){
				MailingController::deleteExchangeEmail();
			},
			"office365/callback" => function(){
				MailingController::handleOffice365Callback();
			},
			"webmail/365folders" => function(){
				MailingController::getOffice365Folders();
			},
			"webmail/365list" => function(){
				MailingController::getOffice365Emails();
			},
			"webmail/365attachments" => function(){
				MailingController::getOffice365EmailAttachments();
			},
			"webmail/365search" => function(){
				MailingController::searchOffice365Emails();
			},
			"webmail/365foldercreate" => function(){
				MailingController::createOffice365Folder();
			},
			"webmail/365delete" => function(){
				MailingController::deleteOffice365Email();
			},
			"webmail/365read" => function(){
				MailingController::markOffice365EmailAsRead();
			},
			"webmail/365star" => function(){
				MailingController::markOffice365EmailAsImportant();
			},
			"webmail/365move" => function(){
				MailingController::moveOffice365Email();
			},
            "calltrack/insert" => function(){
                TelephonyController::insertIntoCalltrack();  
            },
            "mailing/test" => function(){
                MailingController::sendNotificationMail();
            }, 
            "mailing/reminders" => function(){
                MailingController::checkReminders();
            },
            "files/getDates" => function(){
                GeneralController::getUniqueUploadDates();  
            },
            "files/upload" => function(){
                GeneralController::uploadFile();  
            },
            "files/get" => function(){
                GeneralController::getListOfFiles();
            },
            "files/getForEmployee" => function(){
                GeneralController::getEmployeeFiles();
            },
			"employee/telephonyemail" => function(){
				UserController::setEmployeeTelephonyEmail();
			},
			"employee/sla" => function(){
				UserController::setEmployeeSLA();
			},
			"employee/ticketsla" => function(){
				UserController::getEmployeeTicketSLA();
			},
			"employee/workordersla" => function(){
				UserController::getEmployeeWorkorderSLA();
			},
			"employee/imap" => function(){
				UserController::setupIMAP();
			},
			"employee/exchange" => function(){
				UserController::setupExchange();
			},
			"employee/imapdisconnect" => function(){
				UserController::disconnectIMAP();
			},
			"employee/exchangedisconnect" => function(){
				UserController::disconnectExchange();
			},
			"employee/office365disconnect" => function(){
				UserController::disconnectOffice365();
			},
            "employee/tickets" => function(){
                UserController::getEmployeeTickets();  
            },
            "employee/files" => function(){
                UserController::getEmployeeFiles();  
            },
            "employee/picture" => function(){
                UserController::uploadEmployeePicture();  
            },
            "employee/busy" => function(){
                UserController::setEmployeeBusy();  
            },
            "employee/password" => function(){
                UserController::changePassword();  
            },
            "employee/2FA" => function(){
                UserController::set2FA();  
            },
            "employees/notification" => function(){
                UserController::sendPushNotification();
            },
            "employees/import" => function(){
                UserController::importEmployees();  
            },
            "employees/add" => function(){
                UserController::addUser();  
            },
            "employees/edit" => function(){
                UserController::editUser();  
            },
            "employees/list" => function(){
                UserController::getListOfUsers();  
            },
			"employees/listall" => function(){
				UserController::getListOfAllUsers();
			},
            "employees/locations" => function(){
                UserController::getEmployeeLocations();
            },
            "employees/logs" => function(){
                UserController::getEmployeeLogs();  
            },
            "employees/logDates" => function(){
                UserController::getEmployeeUniqueLogsDates();
            },
            "employees/activity" => function(){
                UserController::setEmployeeActivity();  
            },
            "employee/stats" => function(){
                UserController::getEmployeeStats();  
            },
            "employee/basicstats" => function(){
                UserController::getEmployeeBasicTrackingStats();  
            },
            "employee/stops" => function(){
                UserController::getEmployeeStops();  
            },
            "employee/events" => function(){
                UserController::getEmployeeEvents();  
            },
            "employee/mailing" => function(){
                UserController::setMailing();  
            },
            "employee/sms" => function(){
                UserController::setSMS();  
            },
            "employee/department" => function(){
                UserController::moveEmployeeToDepartment();
            },
			"tracking/stats" => function(){
				TrackingController::getTrackingStats();
			},
			"worklocations/getall" => function(){
				TrackingController::getAllWorkLocations();
			},
            "worklocations/get" => function(){
                TrackingController::getWorkLocations();  
            },
			"worklocations/recurring" => function(){
				TrackingController::getRecurringLocations();
			},
            "worklocations/add" => function(){
                TrackingController::addWorkLocation();  
            },
            "worklocations/edit" => function(){
                TrackingController::editWorkLocation();  
            },
            "worklocations/delete" => function(){
                TrackingController::deleteWorkLocation();  
            },
            "worklocations/logs" => function(){
                TrackingController::getEmployeeLogs();  
            },
			"nfc/get" => function(){
				TrackingController::getNFCTags();
			},
			"nfc/add" => function(){
				TrackingController::addNFCTag();
			},
			"nfc/edit" => function(){
				TrackingController::editNFCTag();
			},
			"nfc/delete" => function(){
				TrackingController::deleteNFCTag();
			},
            "department/add" => function(){
                UserController::addDepartment();  
            },
            "department/edit" => function(){
                UserController::editDepartment();  
            },
            "department/delete" => function(){
                UserController::deleteDepartment();  
            },
            "department/get" => function(){
                UserController::getDepartments();  
            },
            "assets/all" => function(){
                AssetController::getAllAssets();  
            },
            "vehicle/acceptreservation" => function(){
                AssetController::acceptReservation();
            },
            "vehicle/declinereservation" => function(){
                AssetController::declineReservation();  
            },
            "vehicles/reservations" => function(){
                AssetController::getVehicleReservations();  
            },
            "vehicles/import" => function(){
                AssetController::importVehicles();  
            },
            "vehicles/get" => function(){
                AssetController::getVehicles();  
            },
            "vehicles/add" => function(){
                AssetController::addVehicle();  
            },
            "vehicles/edit" => function(){
                AssetController::editVehicle();  
            },
            "vehicles/delete" => function(){
                AssetController::deleteVehicle();  
            },
            "vehicles/reserve" => function(){
                AssetController::makeVehicleReservation();  
            },
			"vehicle/reservationdelete" => function(){
				AssetController::deleteVehicleReservation();
			},
            "equipment/reserve" => function(){
                AssetController::makeEquipmentReservation();  
            },
			"equipment/reservationdelete" => function(){
				AssetController::deleteEquipmentReservation();
			},
			"place/reservationdelete" => function(){
				AssetController::deletePlaceReservation();
			},
			"otherasset/reservationdelete" => function(){
				AssetController::deleteOtherReservation();
			},
            "equipment/import" => function(){
                AssetController::importEquipment();  
            },
            "equipment/get" => function(){
                AssetController::getEquipment();  
            },
            "equipment/add" => function(){
                AssetController::addEquipment();  
            },
            "equipment/edit" => function(){
                AssetController::editEquipment();  
            },
            "equipment/delete" => function(){
                AssetController::deleteEquipment();  
            },
            "places/reserve" => function(){
                AssetController::makePlaceReservation();  
            },
            "places/import" => function(){
                AssetController::importPlaces();  
            },
            "places/get" => function(){
                AssetController::getPlaces();  
            },
            "places/add" => function(){
                AssetController::addPlace();  
            },
            "places/edit" => function(){
                AssetController::editPlace();  
            },
            "places/delete" => function(){
                AssetController::deletePlace();  
            },
            "otherassets/reserve" => function(){
                AssetController::makeOtherAssetReservation();  
            },
            "otherassets/import" => function(){
                AssetController::importOtherAssets();  
            },
            "otherassets/get" => function(){
                AssetController::getOtherAssets();  
            },
            "otherassets/add" => function(){
                AssetController::addOtherAsset();  
            },
            "otherassets/edit" => function(){
                AssetController::editOtherAsset();  
            },
            "otherassets/delete" => function(){
                AssetController::deleteOtherAsset();  
            },
            "invoices/get" => function(){
                InvoiceController::getInvoices();  
            },
            "premises/get" => function(){
                InvoiceController::getBusinessPremises();  
            },
            "invoices/addMovablePremise" => function(){
                InvoiceController::registerMovablePremise();
            },
            "invoices/addImmovablePremise" => function(){
                InvoiceController::registerImmovablePremise();  
            },
            "invoicedetails" => function(){
                InvoiceController::displayInvoiceDetails();  
            },
            "stops/unknown" => function(){
                GeneralController::getUnknownStops();  
            },
            "stop/addcustomer" => function(){
                GeneralController::addStopCustomer();  
            },
            "items/add" => function(){
                WorkOrderController::addItem();  
            },
            "items/edit" => function(){
                WorkOrderController::editItem();  
            },
            "items/delete" => function(){
                WorkOrderController::deleteItem();  
            },
            "items/get" => function(){
                WorkOrderController::getItems();  
            },
            "customer/upload" => function(){
                CustomerController::uploadCustomerFile();  
            },
            "customer/events" => function(){
                CustomerController::getCustomerEvents();  
            },
            "customer/documents" => function(){
                CustomerController::getCustomerDocuments();
            },
            "customer/calls" => function(){
                CustomerController::getCustomerCalls();  
            },
			"customer/sla" => function(){
				CustomerController::setCustomerSLA();
			},
            "customers/import" => function(){
                CustomerController::importCustomers();  
            },
			"subsidiary/getall" => function(){
				CustomerController::getAllSubsidiaries();
			},
			"subsidiary/get" => function(){
				CustomerController::getSubsidiaries();
			},
			"subsidiary/add" => function(){
				CustomerController::addSubsidiary();
			},
			"subsidiary/edit" => function(){
				CustomerController::editSubsidiary();
			},
			"subsidiary/delete" => function(){
				CustomerController::deleteSubsidiary();
			},
            "customer/add" => function(){
                CustomerController::addCustomer();  
            },
            "customer/edit" => function(){
                CustomerController::editCustomer();  
            },
            "customer/delete" => function(){
                CustomerController::deleteCustomer();  
            },
            "customer/get" => function(){
                CustomerController::getCustomers();  
            },
			"customers/list" => function(){
				CustomerController::getCustomersList();
			},
            "customer/getByPhone" => function(){
                CustomerController::getCustomerByPhone();  
            },
            "customer/getByEmail" => function(){
                CustomerController::getCustomerByEmail();  
            },
            "customer/contacts" => function(){
                CustomerController::getCustomerContacts();  
            },
            "customerdetails" => function(){
                CustomerController::showCustomerPage();  
            },
            "contacts/add" => function(){
                CustomerController::addContact();  
            },
            "contacts/edit" => function(){
                CustomerController::editContact();  
            },
            "contacts/delete" => function(){
                CustomerController::deleteContact();  
            },
			"eventdetails" => function(){
				EventController::showEventPage();
			},
			"event/dates" => function(){
				EventController::getEventDates();
			},
			"event/status" => function(){
				EventController::updateEventStatus();
			},
			"event/note" => function(){
				EventController::addEventNote();
			},
            "event/upload" => function(){
                EventController::uploadEventFile();  
            },
            "event/get" => function(){
                EventController::getEvents();  
            },
            "event/add" => function(){
                EventController::addEvent();  
            },
            "event/edit" => function(){
                EventController::editEvent();  
            },
            "event/update" => function(){
                EventController::updateEvent();  
            },
            "event/delete" => function(){
                EventController::deleteEvent();  
            },
            "event/alltoday" => function(){
                EventController::getAllTodaysEvents();  
            },
            "event/lastweek" => function(){
                EventController::getEventsLastWeek();  
            },
            "event/getEmployee" => function(){
                EventController::getEmployeeEvents();
            },
			"event/getCustomer" => function(){
				EventController::getCustomerEvents();
			},
            "event/getToday" => function(){
                EventController::getTodaysEvents();  
            },
            "event/accept" => function(){
                EventController::acceptInvite();  
            },
            "event/decline" => function(){
                EventController::declineInvite();  
            },
			"events/checkGoogle" => function(){
                EventController::googleEventExists();  
            },
			"event/checkdeleted" => function(){
				EventController::checkForDeletedEvents();
			},
            "event/status" => function(){
                EventController::setEventStatus();  
            },
			"settings/picture" => function(){
				GeneralController::uploadCompanyLogo();
			},
            "settings/get" => function(){
                GeneralController::getSettings();  
            },
			"settings/notifications" => function(){
				UserController::setNotificationSettings();
			},
            "settings/edit" => function(){
                GeneralController::editSettings();  
            },
			"settings/tracking" => function(){
				GeneralController::editTrackingSettings();
			},
			"settings/telephony" => function(){
				GeneralController::editTelephonySettings();
			},
			"settings/sms" => function(){
				GeneralController::editSMSSettings();
			},
            "settings/personal" => function(){
                UserController::editUserSettings();  
            },
            "settings/connection" => function(){
                GeneralController::testIMAPConnection();  
            },
            "settings/email" => function(){
                GeneralController::saveEmailSettings();  
            },
            "settings/trackingterms" => function(){
                GeneralController::saveTrackingTerms();  
            },
            "user/settings" => function(){
                UserController::getUserSettings();  
            },
            "emailtemplates/get" => function(){
                TemplateController::getEmailTemplates();  
            },
            "emailtemplates/view" => function(){
                TemplateController::displayEmailTemplate();  
            },
            "emailtemplates/edit" => function(){
                TemplateController::editEmailTemplate();
            },
            "smstemplates/get" => function(){
                TemplateController::getSMSTemplates();  
            },
            "smstemplates/view" => function(){
                TemplateController::displaySMSTemplate();  
            },
            "smstemplates/edit" => function(){
                TemplateController::editSMSTemplate();
            },
            "chat/get" => function(){
                WorkgroupController::getChatMessages();  
            },
            "chat/addMessage" => function(){
                WorkgroupController::addMessage();  
            },
			"taskdetails" => function(){
				WorkgroupController::showTaskPage();
			},
			"wgtask/upload" => function(){
				WorkgroupController::uploadTaskFile();
			},
			"workgroup/history" => function(){
				WorkgroupController::getHistory();
			},
			"workgroup/leave" => function(){
				WorkgroupController::leaveWorkgroup();
			},
			"workgroup/kick" => function(){
				WorkgroupController::kickWorkgroupMember();
			},
			"workgroup/request" => function(){
				WorkgroupController::sendJoinRequest();
			},
			"workgroup/deactivate" => function(){
				WorkgroupController::deactivateWorkgroup();
			},
			"workgroup/reactivate" => function(){
				WorkgroupController::reactivateWorkgroup();
			},
            "workgroup/members" => function(){
                WorkgroupController::getMembers();
            },
            "workgroup/add" => function(){
                WorkgroupController::addWorkgroup();  
            },
            "workgroup/delete" => function(){
                WorkgroupController::deleteWorkgroup();
            },
            "workgroup/editDescription" => function(){
                WorkgroupController::editWorkgroupDescription();  
            },
            "workgroup/editModerators" => function(){
                WorkgroupController::editModerators();  
            },
            "workgroup/getDirectory" => function(){
                WorkgroupController::getWorkgroupDirectory();  
            },
            "workgroup/getTasks" => function(){
                WorkgroupController::getWorkgroupTasks();  
            },
            "workgroup/addTask" => function(){
                WorkgroupController::addWorkgroupTask();  
            },
            "workgroup/editTask" => function(){
                WorkgroupController::editWorkgroupTask();  
            },
            "workgroup/tasknote" => function(){
                WorkgroupController::addTaskNote();  
            },
            "workgroup/tasknotes" => function(){
                WorkgroupController::getTaskNotes();
            },
            "workgroup/deleteTask" => function(){
                WorkgroupController::deleteWorkgroupTask();  
            },
            "workgroup/updateTask" => function(){
                WorkgroupController::updateWorkgroupTask();
            }, 
            "workgroup/moveTask" => function(){
                WorkgroupController::moveTask();
            },
            "workgroup/checkTasks" => function(){
                WorkgroupController::checkUnopenedTasks();  
            },
            "workgroup/renameFile" => function(){
                WorkgroupController::renameWorkgroupFile();  
            },
            "workgroup/moveFile" => function(){
                WorkgroupController::moveFile();  
            },
            "workgroup/deleteFile" => function(){
                WorkgroupController::deleteWorkgroupFile();  
            },
            "workgroup/createDir" => function(){
                WorkgroupController::createDirectory();  
            },
            "workgroup/upload" => function(){
                WorkgroupController::uploadFile();  
            },
            "workgroup/settings" => function(){
                WorkgroupController::editWorkgroupSettings();  
            },
            "workgroup/sendinvites" => function(){
                WorkgroupController::sendInvites();  
            },
            "workgroup/accept" => function(){
                WorkgroupController::acceptInvite();  
            },
			"workgroup/join" => function(){
				WorkgroupController::acceptJoin();
			},
            "workgroup/taskOpened" => function(){
                WorkgroupController::setTaskOpened();  
            },
            "workgroup/getByID" => function(){
                WorkgroupController::getWorkgroupByID();  
            },
            "campaign/overview" => function(){
                CampaignController::getRecentActions();  
            },
            "campaign/uploadImage" => function(){
                CampaignController::uploadImage();
            },
            "campaign/mailchimp" => function(){
                CampaignController::retrieveMailchimpData();  
            },
            "campaign/details" => function(){
                CampaignController::showCampaignPage();  
            },
            "campaign/send" => function(){
                CampaignController::sendCampaign();  
            },
            "campaign/add" => function(){
                CampaignController::addCampaign();  
            },
            "campaign/edit" => function(){
                CampaignController::editCampaign();  
            },
            "campaign/get" => function(){
                CampaignController::getCampaigns();  
            },
            "campaign/delete" => function(){
                CampaignController::deleteCampaign();  
            },
            "campaignlist/get" => function(){
                CampaignController::getCampaignLists();  
            },
            "campaignlist/add" => function(){
                CampaignController::addSubscriberList();  
            },
            "campaignlist/delete" => function(){
                CampaignController::deleteSubscriberList();  
            },
            "campaignlist/details" => function(){
                CampaignController::showCampaignListPage();  
            },
            "campaignlist/parse" => function(){
                CampaignController::parseImportedFile();  
            },
            "campaignlist/import" => function(){
                CampaignController::addSubscribersToList();  
            },
            "campaignlist/addsub" => function(){
                CampaignController::addSubscriberToList();  
            },
            "campaignlist/removesubs" => function(){
                CampaignController::removeSubscribersFromList();
            },
            "mailchimp/sync" => function(){
                CampaignController::setupWorkgroupMailchimp();  
            },
            "mailchimp/desync" => function(){
                CampaignController::removeWorkgroupMailchimp();  
            },
            "messages/getDates" => function(){
                GeneralController::getUniqueMessageDates();  
            },
            "messages/getemails" => function(){
                GeneralController::getSentEmails();  
            },
            "messages/getEmailsDate" => function(){
                GeneralController::getEmailDate();  
            },
            "messages/getsms" => function(){
                GeneralController::getSentSMS();  
            },
            "messages/getSMSDate" => function(){
                GeneralController::getSMSDate();  
            },
            "messages/getSMSDate" => function(){
                GeneralController::getSMSDate();  
            },
            "messages/mailopened" => function(){
                MailingController::markMailAsOpened();  
            },
            "reminders/get" => function(){
                GeneralController::getAllReminders();  
            },
            "reminders/getEmployee" => function(){
                GeneralController::getRemindersByEmployee();  
            },
            "reminders/getByDate" => function(){
                GeneralController::getRemindersByDate();  
            },
            "reminders/getDates" => function(){
                GeneralController::getUniqueReminderDates();
            },
            "reminders/alltoday" => function(){
                GeneralController::getAllTodaysReminders();  
            },
            "reminders/lastweek" => function(){
                GeneralController::getRemindersLastWeek();  
            },
            "reminders/getToday" => function(){
                GeneralController::getTodaysReminders();  
            },
            "triporders/get" => function(){
                TravelOrderController::getTripOrders();  
            },
			"travelorders/employee" => function(){
				TravelOrderController::getEmployeeTravelOrders();
			},
            "travelorders/stats" => function(){
                TravelOrderController::getTravelOrderStats();
            },
            "travelorders/upload" => function(){
                TravelOrderController::uploadTravelOrderFile();  
            },
            "travelorders/get" => function(){
                TravelOrderController::getTravelOrders();
            },
            "travelorders/add" => function(){
                TravelOrderController::addTravelOrder();
            },
            "travelorders/edit" => function(){
                TravelOrderController::editTravelOrder();
            },
            "travelorders/generate" => function(){
                TravelOrderController::generateTravelOrder();
            },
            "travelorders/delete" => function(){
                TravelOrderController::deleteTravelOrder();
            },
            "travelorders/getDates" => function(){
                TravelOrderController::getUniqueTravelOrderDates();
            },
            "travelorders/getEmployee" => function(){
                TravelOrderController::getTravelOrdersEmployeeDate();
            },
            "travelorderdetails" => function(){
                TravelOrderController::displayTravelOrderDetails();  
            },
            "triporderdetails" => function(){
                TravelOrderController::displayTripOrderDetails();  
            },
            "workorders/get" => function(){
                WorkOrderController::getWorkOrders();
            },
			"workorders/opened" => function(){
				WorkOrderController::setWorkorderOpened();
			},
			"workorders/getEmployee" => function(){
				WorkOrderController::getEmployeeWorkOrders();
			},
            "workorders/add" => function(){
                WorkOrderController::addWorkOrder();
            },
            "workorders/edit" => function(){
                WorkOrderController::editWorkOrder();
            },
            "workorders/delete" => function(){
                WorkOrderController::deleteWorkOrder();
            },
            "workorders/alltoday" => function(){
                WorkOrderController::getAllWorkOrdersToday();  
            },
            "workorders/lastweek" => function(){
                WorkOrderController::getWorkOrdersLastWeek();  
            },
			"workorders/getitems" => function(){
				WorkOrderController::getWorkOrderItems();
			},
			"workorders/addnote" => function(){
				WorkOrderController::addWorkOrderNote();
			},
			"workorders/upload" => function(){
				WorkOrderController::uploadWorkorderFile();
			},
			"workorderdetails" => function(){
				WorkOrderController::showWorkOrderPage();
			},
            "calls/get" => function(){
                GeneralController::getCalls();  
            },
            "calls/getDate" => function(){
                GeneralController::getCallsByDate();  
            },
            "calls/getDates" => function(){
                GeneralController::getUniqueCallDates();  
            },
            "telephony/insertCall" => function(){
                TelephonyController::insertCall();  
            },
            "telephony/editCall" => function(){
                TelephonyController::editCall();  
            },
            "telephony/getCalls" => function(){
                TelephonyController::getCalls();  
            },
            "telephony/getTodaysCalls" => function(){
                TelephonyController::getTodaysCalls();  
            },
            "reset/distance" => function(){
                GeneralController::resetElapsedDistances();  
            },
            "unknownstops/getDate" => function(){
                GeneralController::getUnknownStopsDate();
            },
            "unknownstops/getDates" => function(){
                GeneralController::getUniqueUnknownStopsDates();  
            },
            "workgroups/get" => function(){
                WorkgroupController::getWorkgroupList();  
            },
            "email/send" => function(){
                MailingController::sendEmail();  
            },
			"email/exchangesend" => function(){
				MailingController::sendExchangeEmail();
			},
			"email/365send" => function(){
				MailingController::sendOffice365Email();
			},
			"email/star" => function(){
				TelephonyController::toggleEmailStarred();
			},
			"email/delete" => function(){
				TelephonyController::deleteEmail();
			},
			"mailmanager/filterall" => function(){
				MailingController::runEmailFiltering();
			},
            "" => function() {
                if (isset($_SESSION['user'])) {
                    ViewHelper::redirect(BASE_URL . "dashboard");
                }
                else {
                    ViewHelper::redirect(BASE_URL . "login");
                }
            }
        ];
try {
    if (isset($urls[$path])) {
        if (!session_status() == PHP_SESSION_ACTIVE || !isset($_SESSION)) {
            $urls["logout"]();
        }else{
            $urls[$path]();
        }
    } else {
        ViewHelper::render("View/404.php"); ;
    }
} catch (Exception $e) {
    echo "An error occurred: <pre>$e</pre>";
    // ViewHelper::error404();
} 
