<?php

$alarmid=$_GET[ 'alarmid'];

$dbpath = $_SERVER["DOCUMENT_ROOT"] . "/vanguardhe/daemon_scr/daemon_db_init.php";
require($dbpath);  // to initialize snmp 


// $serverIp = gethostbyname(gethostname());

// //$serverIp = "10.100.0.199";

// $data = "alarmId=" . $alarmid . "&action=ack";

// //$url = "http://10.100.0.199:8980/opennms/rest/acks";
// $url = "http://" . $serverIp . ":8980/opennms/rest/acks";

// $curl = curl_init ();
// curl_setopt($curl, CURLOPT_URL, $url);
// curl_setopt($curl, CURLOPT_USERPWD, "admin:admin");
// curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
// curl_setopt($curl, CURLOPT_POST, 1);
// curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
// $result =  curl_exec ($curl);
// if(gettype($result) == "string"){
	
// }else{
// 	echo "Please Acknowledged Later!";
// }

$query = "UPDATE public.daemonalarm
	SET ack='yes' 
	WHERE daemonalarm.alarmid = $alarmid;";

$result = pg_query($query) or die('Query failed: ' . pg_last_error());

pg_free_result($result);

pg_close($dbconn);

$rp=$_SERVER["DOCUMENT_ROOT"] . "/vanguardhe/alarm.html";

header("Location: ../alarm.html");

echo "Acknowledged Successfully!";

echo "<br>";
echo "<br>";


echo "<button onclick=closeWin()>Close</button>";
echo
"<script>
function closeWin() {
	window.close();
}
</script>";






?>




