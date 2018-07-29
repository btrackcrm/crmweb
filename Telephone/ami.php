<?php
header('Access-Control-Allow-Origin: *');
header('Content-type: text/html; charset=utf-8');

require_once("pAmi.php");
include("datalogin.php");

$ami = new Ami();
if ($ami->connect($amiip . ":" . $amiport, $amiuser, $amipass, 'off') === false) {
      echo ('Could not connect to Asterisk Management Interface.');
      exit(0);
}
   
// $result contains the output from the command
$ami->addEventHandler("QueueMember", "Derp");
//$response = $ami->queueStatus();
//$result = $ami->sendRequest("CoreShowChannels");
$result = $ami->originate("PJSIP/101", "031415246", "DLPN_DialPlan101", "1", null, null, null, "105547994", null, null, true, "123456");

echo print_r($result);

$ami->disconnect();

?>
