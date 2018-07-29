<?php
header('Access-Control-Allow-Origin: *');
include_once("DBConfig.php"); 
$uid = $_REQUEST['uid'];
$exten = $_REQUEST['exten'];
$number = $_REQUEST['num'];
$callerID = $_REQUEST['callerid'];

                $timeout = 30;
                $socket = fsockopen($amiip,$amiport, $errno, $errstr, $timeout);
if ($errno>0){
echo $errno . " : " . $errstr;
exit(0);
}
                $wrets=fgets($socket,128);

                fputs($socket, "Action:Login
");
                fputs($socket, "Username:$amiuser
");
                fputs($socket, "Secret:$amipass\r\n\r\n");

$authdone=true;

		while($authdone){
		 $wrets=fgets($socket,128);
			 if (trim ($wrets) == "Response: Success"){
				 $wrets=fgets($socket,128);
				if ( trim ($wrets) == "Message: Authentication accepted"){
					$authdone=false;
				}
				
			}

		}		
	
                fputs($socket, "Action:Originate
" );
                fputs($socket, "Channel:PJSIP/$exten
" );
                fputs($socket, "Context:DLPN_DialPlan$exten
" );
                fputs($socket, "Exten:$number
" );
				fputs($socket, "CallerID:$callerID
" );
                fputs($socket, "Priority:1
" );
                fputs($socket, "Async:true
" );
				fputs($socket, "Variable: calluid=$uid
" );

                fputs($socket, "ActionID:$uid\r\n\r\n" );
$ii=0;
$ij="";
$wkey="";
$wval="";

		while($ij<>"done"){
			$wrets=trim(fgets($socket,128));
			$wkeyval=explode(":",$wrets) ;
			$wkey=$wkeyval[0];
			$wval=$wkeyval[1];
			$sval = strstr($wval,"hint");
			if( (trim($wrets)=="") && (array_key_exists("Event",$warray)) ){
				if( (trim($warray['Response'])=="Error") && (trim($warray['ActionID'])== $uid) ){

					$ij="done";
					echo "Error!!<br>";
						
				}elseif( (trim($warray['Event'])=="OriginateResponse") && (trim($warray['ActionID'])== $uid) ){
					$ij="done";
					
					$conn2 = new mysqli($lservername, $ldbusername, $ldbpassword, $ldbname);
					if ($conn2->connect_error) {
						die("Connection failed: " . $conn2->connect_error);
					}		
					$sql = "select * from calltrack where custuid = '$uid'";
					$result = $conn2->query($sql);
					$totalrows = $result->num_rows ;

					if ($totalrows > 0) {
						$sql1 = "update calltrack set dialeduid = '". $warray['Uniqueid'] ."' , status='dialed' where custuid = '$uid'";
						$result1 = $conn2->query($sql1);
					}else{
						$sql1 = "insert into calltrack values('','$uid', '" . $warray['Uniqueid'] ."' ,'dialed')";
						$result1 = $conn2->query($sql1);
					}			
					

				}
				$warray="";
				$warray=array();
			}else{
					$warray[$wkey]=$wval;
				
			}
		}
		

                fputs($socket, "Action:Logoff


");
$authdone=true;
		while($authdone){
		 $wrets=fgets($socket,128);
		 if (trim ($wrets) == "Message: Thanks for all the fish."){
				$authdone=false;
			}		
		}


?>
