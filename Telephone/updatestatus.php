<?php

include_once("../Model/DBConfig.php");  

$uid = $_REQUEST['uid'];
$status = $_REQUEST['status'];

if(trim($status) == ""){
	$status = "done";
}

$conn = new mysqli($lservername, $ldbusername, $ldbpassword, $ldbname);
if ($conn2->connect_error) {
    echo "Connection failed";
	die("Connection failed: " . $conn2->connect_error);
}		
$sql = "update calltrack set status='$status' where custuid = '$uid'";
$result = $conn->query($sql);


if ($result=="1"){
	echo "Updated to " + $status;
}else{
    echo "ERROR";
}


?>