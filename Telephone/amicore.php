<?php
header('Access-Control-Allow-Origin: *');
header('Content-type: text/html; charset=utf-8' );

include_once("../Model/DBConfig.php");  

$qname = $_REQUEST['q'];
$days = $_REQUEST['days'];
   

                
				$conn3 = new mysqli($lservername, $ldbusername, $ldbpassword, $ldbname);
				if ($conn3->connect_error) {
					die("Connection failed: " . $lservername);
				}
				


$timeout = 2;
$socket = fsockopen($amiip,$amiport, $errno, $errstr, $timeout);
if ($errno>0){
echo $errno . " : " . $errstr;
exit(0);
}

$wrets=fgets($socket,128);


                fputs($socket, "Action:Login\r\n");
                fputs($socket, "Username:$amiuser\r\n");
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
		
                fputs($socket, "Action:CoreShowChannels
" );
                fputs($socket, "ActionID:9240357


" );

//$ii=0;
$ij="";
$cidnum="";
$chan="";
$cidname="";
$wkey="";
$wval="";
$incalls = array();
$connectedcalls = array();
$warray=array();

		while($ij<>"done"){
		$wrets=trim(fgets($socket,128));
		$posw = "- $wrets -";
		$pos = strpos($posw,":");
		if( $pos === false ){
                $wkeyval=$wrets ;
                $wkey="";
                $wval="";
		}else{
				$wkey="";
				$wval="";
                $wkeyval=explode(":",$wrets) ;
                $wkey=trim($wkeyval[0]);
                $wval=trim($wkeyval[1]);
		}

		if(trim($wrets)=="Event: CoreShowChannelsComplete")
		{
			$ij="done";
		}
		if( (trim($wrets)=="") && (array_key_exists("Event",$warray)) ){
			if( (trim($warray['Event'])=="CoreShowChannel") && 
				(trim($warray['Application'])=="Queue" ) && 
				(trim($warray['Uniqueid'])==trim($warray['Linkedid'])) 
				&&
				(trim($warray['BridgeId'])=="")){

				$incall = "Ringing".";".trim($warray['Exten']).";". trim($warray['CallerIDNum']).";;;;". trim($warray['Duration']);
				array_push($incalls,$incall);
				}elseif( (trim($warray['Event'])=="CoreShowChannel") && 
                    (trim($warray['Application'])=="Queue" ) && 
                    (trim($warray['ConnectedLineName']) != "" ) &&
                    (trim($warray['Uniqueid'])==trim($warray['Linkedid']))  &&
                    (trim($warray['BridgeId']) != "")){

    				$agent = explode("@",trim($warray['Channel']));
    				$agent = explode("/",$agent[0]);
    				$agent = $agent[1];
    				$incall = "Connected".";".trim($warray['Exten']).";". trim($warray['CallerIDNum']).";;". trim($agent).";". trim($warray['ConnectedLineName']) .";".trim($warray['Duration']);
    				array_push($incalls,$incall);
				}
			$warray="";
			$warray=array();
		}else{
			if($wkey=="Duration"){
				$warray[$wkey] = trim(str_replace("Duration:","",$wrets));
			}else{
				$warray[$wkey]=$wval;
			}
		}

		}
		

$ji=0;
$jcalls = array();
$jmissedcalls = array();
	foreach ( $incalls as $incall ){
                $incall = explode(";",$incall);
		$jcalls[$ji] = array("status" => $incall[0],"queue" => $incall[1],"clidnum" => $incall[2] ,"clidname" => $incall[3] ,"agentnum" => $incall[4],"agentname" => $incall[5],"duration" => $incall[6]);
		$ji++;
        }
        
$conn2 = new mysqli($cdrserver, $cdruser, $cdrpass, $cdrdb);
if ($conn2->connect_error) {
	die("Connection failed: " . $conn2->connect_error);
}		
		$sql = "select datetime,src,dst,dcontext,uniqueid from cdr where disposition <> 'ANSWERED' and datetime > '" . date('Y-m-d',strtotime("-" . $days ." days")) . "' group by uniqueid";
		$result = $conn2->query($sql);
		$totalrows = $result->num_rows ;

		if ($totalrows > 0) {
			$ij=0;
			while($row = $result->fetch_assoc()) {
	            $datetime = $row['datetime'];
				$clid = $row['src'];
				$uniqueid = $row['uniqueid'];

				$sql3 = "select * from calltrack where custuid = '$uniqueid' ";
				$result3 = $conn3->query($sql3);
				$totalrows3 = $result3->num_rows ;
				 $status ="";
				if ($totalrows3 > 0) {
					while($row3 = $result3->fetch_assoc()) {
					$status = $row3['status'];
					}
				}
				
				if (strpos($row["dcontext"], "DLPN") === false){
					$queue = str_replace("queue_", "", $row['dcontext']);
				}else{
					$queue = "Internal";
				}

				if($status<>"done"){
					$jmissedcalls[$ij] = array("datetime"=>$datetime,"clid"=>$clid,"callid"=>$uniqueid,"queue"=>$queue,"status"=>$status);
					$ij++;
				}
			}
		}			
	$conn2->close();
	
	//$conn3->close();
	$jdata['calls'] = $jcalls;
	$jdata['missedcalls'] = $jmissedcalls;
	$jdata = json_encode($jdata);
	echo $jdata;

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