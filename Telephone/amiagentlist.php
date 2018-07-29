<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once("../Model/DBConfig.php");  

$rpttype = $_REQUEST['rpttype'];
$agent = $_REQUEST['agent'];
$curagent = $_REQUEST['curagent'];
$queue = $_REQUEST['q'];
$timeout = 5;
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
	$responseStr = "";
		while($authdone){
			
		 $wrets=fgets($socket,128);

		 if (trim ($wrets) == "Response: Success"){
			 $wrets=fgets($socket,128);
			if ( trim ($wrets) == "Message: Authentication accepted"){
				$authdone=false;
			}
			
		}

		}		

		
                fputs($socket, "Action:QueueStatus
" );
if(trim($queue<>"")){
                fputs($socket, "Queue: $queue
" );
}
                fputs($socket, "ActionID:9240357


" );

$ii=0;
$ij="";
$cidnum="";
$chan="";
$cidname="";
$wkey="";
$wval="";
$warray = array();
$onagents = array();
$offagents =array();

$ona=0;
$offa=0;




		while($ij<>"done"){
		$wrets=trim(fgets($socket,128));
		$posw = "- $wrets -";
		$pos = strpos($posw,":");
		if( $pos === false ){

                $wkeyval=$wrets ;
                $wkey="";
                $wval="";

		}else{

                $wkeyval=explode(":",$wrets) ;
                $wkey=trim($wkeyval[0]);
                $wval=trim($wkeyval[1]);


		}
		if (trim($wrets)==""){
			if ( trim($warray['Event'])=="QueueMember"){
					$location = $warray['Location'];
					$agent = explode("@",$location);
					$agent = explode("/",$agent[0]);
					$agent = $agent[1];
					if($curagent<>$agent){
						switch (trim($warray['Status']."")){
						case "1":
							$status = "greenico.png";
							if(trim($warray['Paused'])=="1" ){
								$reason = $warray['PausedReason'];
								$onagents[$agent]= $warray['Name']."@Paused@". $reason;
							}else{
								$onagents[$agent]= $warray['Name']."@Online";
							}
							$ona++;
							break;
						case "2":
							$onagents[$agent]= $warray['Name'] . "@Oncall";
							$ona++;
							break;
						case "5":
							
							$offagents[$agent]= $warray['Name'] ;
							$offa++;
							break;
						case "6":
							$status = "ringing.png";
							$onagents[$agent]= $warray['Name']."@Ringing";
							$ona++;
							break;
						case "8":
							$status = "hold-icon.png";
							$onagents[$agent]= $warray['Name'] ."@Onhold";
							$ona++;
							break;
						default :
							$status ="";
						}
					}
			}
			if( trim($warray['Event'])== "QueueStatusComplete"){
				$ij="done";
			}
			
			$warray=array();
		}else{
				$warray[$wkey]=$wval;
		}

		}

	$prejdata['online'] = $onagents;
	$prejdata['offline'] = $offagents;
	
		$jdata = json_encode($prejdata);
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