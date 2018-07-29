<?php

include_once("../Model/DBConfig.php");  

$exten = $_REQUEST['exten'];
$name = $_REQUEST['name'];
$pass = $_REQUEST['pass'];
$action = $_REQUEST['action'];

	$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}		


if($action=="add"){
	$sql = "INSERT INTO users (
		extension, password, name, voicemail, ringtimer, noanswer, recording,
		outboundcid, sipname, noanswer_cid, busy_cid, chanunavail_cid,
		noanswer_dest, busy_dest, chanunavail_dest, mohclass
	)
	VALUES (
		'$exten', '', '$name', 'novm', '0', '', '', '',
		'$name', '', '', '', '', '', '', 'default'
	)";

	$result = $conn->query($sql);

	if($result=="1"){
	$sql = "INSERT INTO devices (
		id, tech, dial, devicetype, user, description, emergency_cid
	)
	VALUES
		('$exten', 'sip', 'SIP/$exten', 'fixed', '$exten', '$name', '')";
		$result = $conn->query($sql);
		echo "insert into devices $result <br>";
	}
	if($result=="1"){
	$sql = "INSERT INTO sip (
		id, keyword, data, flags
	)
	VALUES
		('$exten', 'secret', '$pass', 2),
		('$exten', 'dtmfmode', 'rfc2833', 3),
		('$exten', 'canreinvite', 'no', 4),
		('$exten', 'context', 'from-internal', 5),
		('$exten', 'host', 'dynamic', 6),
		('$exten', 'trustrpid', 'yes', 7),
		('$exten', 'sendrpid', 'yes', 8),
		('$exten', 'type', 'friend', 9),
		('$exten', 'nat', 'yes', 10),
		('$exten', 'port', '5060', 11),
		('$exten', 'qualify', 'yes', 12),
		('$exten', 'qualifyfreq', '60', 13),
		('$exten', 'transport', 'udp', 14),
		('$exten', 'avpf', 'no', 15),
		('$exten', 'icesupport', 'no', 16),
		('$exten', 'encryption', 'no', 17),
		('$exten', 'callgroup', '', 18),
		('$exten', 'pickupgroup', '', 19),
		('$exten', 'disallow', '', 20),
		('$exten', 'allow', '', 21),
		('$exten', 'dial', 'SIP/$exten', 22),
		('$exten', 'mailbox', '$exten@device', 23),
		('$exten', 'deny', '0.0.0.0/0.0.0.0', 24),
		('$exten', 'permit', '0.0.0.0/0.0.0.0', 25),
		('$exten', 'account', '$exten', 26),
		('$exten', 'callerid', 'device <$exten>', 27)";



	$result = $conn->query($sql);
	}

	if ($result=="1"){
		echo "updated";
	}
}elseif($action=="del"){
	
	$sql = "delete from users where extension = '$exten'";

	$result = $conn->query($sql);

	if($result=="1"){
	$sql = "delete from devices where id = '$exten'";
		$result = $conn->query($sql);
	}
	if($result=="1"){
	$sql = "delete from sip where id = '$exten'";
	$result = $conn->query($sql);
	}

	if ($result=="1"){
		echo "Deleted";
	}
}
?>