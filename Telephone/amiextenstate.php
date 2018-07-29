<?php
header('Content-Type: application/json');
include_once("../Model/DBConfig.php");  

$exten = $_REQUEST['exten'];

$timeout = 30;
$socket = fsockopen($amiip,$amiport, $errno, $errstr, $timeout);
if ($errno>0){
echo $errno . " : AA" . $errstr;
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
                fputs($socket, "Action: ExtensionState
" );
                fputs($socket, "Exten: $exten
" );

                fputs($socket, "Context: from-internal
" );
                fputs($socket, "ActionID:9240357


" );

$ii=0;
$ij="";
$wkey="";
$wval="";

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
                $wkey=$wkeyval[0];
                $wval=$wkeyval[1];

		}
			if (trim($wrets)==""){
				if( (trim($warray["Response"])=="Error") && (trim($warray["ActionID"])=="9240357") && (trim($warray["Message"])=="Extension not specified")  ){
					$ij="done";
				}elseif( (trim($warray["Response"])=="Success") &&  (trim($warray["ActionID"])=="9240357") && (trim($warray["Message"]) =="Extension Status") ){
					$ij="done";
						$extens[trim($warray['Exten'])]= trim($warray['StatusText']);
				}
				
				$warray=array();
			}else{
					$warray[$wkey]=$wval;
			}
		}

	$jdata = json_encode($extens);
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