<?php

// $genericSnmpPath = $_SERVER["DOCUMENT_ROOT"] . "/vanguardhe/php_scripts/oidget/genericSnmp.php";
// require_once($genericSnmpPath);  // to initialize snmp 
// $ip = "69.70.200.246";

// $value [0] = snmpget_smallp ( $ip, ".1.3.6.1.4.1.3222.4.6.1.1.1.1" );
// $value [1] = snmpget_smallp ( $ip, ".1.3.6.1.4.1.3222.4.6.1.1.2.1" );
// $value [2] = snmpget_smallp ( $ip, ".1.3.6.1.4.1.3222.4.6.1.1.3.1" );
// $value [3] = snmpget_smallp ( $ip, ".1.3.6.1.4.1.3222.4.6.1.1.4.1" );
// $value [4] = snmpget_smallp ( $ip, ".1.3.6.1.4.1.3222.4.6.1.1.5.1" );
// $value [5] = snmpget_smallp ( $ip, ".1.3.6.1.4.1.3222.4.6.1.1.6.1" );
// $value [6] = snmpget_smallp ( $ip, ".1.3.6.1.4.1.3222.4.6.1.1.7.1" );
// $value [7] = snmpget_smallp ( $ip, ".1.3.6.1.4.1.3222.4.6.1.1.8.1" );
// $value [8] = snmpget_smallp ( $ip, ".1.3.6.1.4.1.3222.4.6.1.1.9.1" );
// $value [9] = snmpget_smallp ( $ip, ".1.3.6.1.4.1.3222.4.6.1.1.10.1" );
// $value [10] = snmpget_smallp ( $ip, ".1.3.6.1.4.1.3222.4.6.1.1.11.1" );
// $value [11] = snmpget_smallp ( $ip, ".1.3.6.1.4.1.3222.4.6.1.1.12.1" );
// $value [12] = snmpget_smallp ( $ip, ".1.3.6.1.4.1.3222.4.6.1.1.13.1" );
// $value [13] = snmpget_smallp ( $ip, ".1.3.6.1.4.1.3222.4.6.1.1.14.1" );
// $value [14] = snmpget_smallp ( $ip, ".1.3.6.1.4.1.3222.4.6.1.1.15.1" );
// $value [15] = snmpget_smallp ( $ip, ".1.3.6.1.4.1.3222.4.6.1.1.16.1" );
// $value [16] = snmpget_smallp ( $ip, ".1.3.6.1.4.1.3222.4.6.1.1.17.1" );
// $value [17] = snmpget_smallp ( $ip, ".1.3.6.1.4.1.3222.4.6.1.1.18.1" );
// $value [18] = snmpget_smallp ( $ip, ".1.3.6.1.4.1.3222.4.6.1.1.19.1" );
// $value [19] = snmpget_smallp ( $ip, ".1.3.6.1.4.1.3222.4.6.1.1.20.1" );

// for ($i=0; $i < 20; $i++) { 
// 	# code...
// 	echo $value [$i] . "<br>";
// }


// w


// unit test   --- begin 

// for ($i=0; $i < 1; $i++) { 
// 	# code...
// 	daemon_snmpScanIntoDb_1550("69.70.200.246");
// }


// unit test    --- end 

function daemon_snmpScanIntoDb_1550($ip){

	// TO-DO: 1) extract all snmp value from 1550, 2) check if the table is existed, 3) if not existed, create it, and 4) put it into db. This action should be wrapped in a function. 

	// header for initialization
	$genericSnmpPath = $_SERVER["DOCUMENT_ROOT"] . "/vanguardhe/php_scripts/oidget/genericSnmp.php";
	require_once($genericSnmpPath);  // to initialize snmp 
	require("daemon_db_init.php");  // to initialize database connection 
	require_once("daemon_getDeviceIdPerIp.php");  // to initialize database connection 

	// 1, extract all snmp value from 1550 
	//$timestamp = "'" . date('YmdGis') . "'";

	$deviceid=getDeviceIdPerIp($ip);

	//echo $deivceid;
	global $timestamp;
	$recordedIp = trim(deco_1550($ip));
	$sysDescr = deco_1550(snmpget_smallp ( $ip, ".1.3.6.1.2.1.1.1.0" ));
	$sysObjectID = deco_1550(snmpget_smallp ( $ip, ".1.3.6.1.2.1.1.2.0" ));
	$sysUpTime = deco_1550(snmpget_smallp ( $ip, ".1.3.6.1.2.1.1.3.0" ));
	$sysContact = deco_1550(snmpget_smallp ( $ip, ".1.3.6.1.2.1.1.4.0" ));
	$sysName = deco_1550(snmpget_smallp ( $ip, ".1.3.6.1.2.1.1.5.0" ));
	$sysLocation = deco_1550(snmpget_smallp ( $ip, ".1.3.6.1.2.1.1.6.0")) ;
	$sysService = deco_1550(snmpget_smallp ( $ip, ".1.3.6.1.2.1.1.7.0" ));

	$defaultIp = trim(deco_1550(snmpget_smallp ( $ip, ".1.3.6.1.4.1.33826.3.1.1.0" )));
	$defaultMac = deco_1550(snmpget_smallp ( $ip, ".1.3.6.1.4.1.33826.3.1.5.0" ));

	$value [0] = snmpget_smallp ( $ip, ".1.3.6.1.4.1.3222.4.6.1.1.1.1" );
	$value [1] = snmpget_smallp ( $ip, ".1.3.6.1.4.1.3222.4.6.1.1.2.1" );
	$value [2] = snmpget_smallp ( $ip, ".1.3.6.1.4.1.3222.4.6.1.1.3.1" );
	$value [3] = snmpget_smallp ( $ip, ".1.3.6.1.4.1.3222.4.6.1.1.4.1" );
	$value [4] = snmpget_smallp ( $ip, ".1.3.6.1.4.1.3222.4.6.1.1.5.1" );
	$value [5] = snmpget_smallp ( $ip, ".1.3.6.1.4.1.3222.4.6.1.1.6.1" );
	$value [6] = snmpget_smallp ( $ip, ".1.3.6.1.4.1.3222.4.6.1.1.7.1" );
	$value [7] = snmpget_smallp ( $ip, ".1.3.6.1.4.1.3222.4.6.1.1.8.1" );
	$value [8] = snmpget_smallp ( $ip, ".1.3.6.1.4.1.3222.4.6.1.1.9.1" );
	$value [9] = snmpget_smallp ( $ip, ".1.3.6.1.4.1.3222.4.6.1.1.10.1" );
	$value [10] = snmpget_smallp ( $ip, ".1.3.6.1.4.1.3222.4.6.1.1.11.1" );
	$value [11] = snmpget_smallp ( $ip, ".1.3.6.1.4.1.3222.4.6.1.1.12.1" );
	$value [12] = snmpget_smallp ( $ip, ".1.3.6.1.4.1.3222.4.6.1.1.13.1" );
	$value [13] = snmpget_smallp ( $ip, ".1.3.6.1.4.1.3222.4.6.1.1.14.1" );
	$value [14] = snmpget_smallp ( $ip, ".1.3.6.1.4.1.3222.4.6.1.1.15.1" );
	$value [15] = snmpget_smallp ( $ip, ".1.3.6.1.4.1.3222.4.6.1.1.16.1" );
	$value [16] = snmpget_smallp ( $ip, ".1.3.6.1.4.1.3222.4.6.1.1.17.1" );
	$value [17] = snmpget_smallp ( $ip, ".1.3.6.1.4.1.3222.4.6.1.1.18.1" );
	$value [18] = snmpget_smallp ( $ip, ".1.3.6.1.4.1.3222.4.6.1.1.19.1" );
	$value [19] = snmpget_smallp ( $ip, ".1.3.6.1.4.1.3222.4.6.1.1.20.1" );

	for ($i=0; $i < 20; $i++) { 
			# code...
		$value [$i] = deco_1550($value [$i]);
	}

	$lab [0] = "StatusIndex";
	$lab [1] = "IDcode";
	$lab [2] = "subID";
	$lab [3] = "FirmwareVersion";
	$lab [4] = "Laser IM";
	$lab [5] = "Laser Temperature (C)";
	$lab [6] = "Laser Bias";
	$lab [7] = "RF Modulation Level";
	$lab [8] = "DC24V Voltage";
	$lab [9] = "DC12V Voltage";
	$lab [10] = "DC5V Voltage";
	$lab [11] = "-5VDC Voltage";
	$lab [12] = "Tx Optical Power";
	$lab [13] = "Gain Control Setting";
	$lab [14] = "SBS CONTROL Setting";
	$lab [15] = "CTB_CONTROL_Setting";
	$lab [16] = "Tx RF Module Level";
	$lab [17] = "Present AC Power 1 status";
	$lab [18] = "Present AC Power 2 status";
	$lab [19] = "Tx AC Power supply status";

	// 2, check if the table "dameonSnmp1550Value" in the database "vanguardhe"

	$query_exist = "SELECT relname FROM pg_class 
	WHERE relname = 'dameonsnmp1550value';";

	$result_exist = pg_query($query_exist) or die('Query failed: ' . pg_last_error());

	$exist = '';
	while ($row_exist = pg_fetch_object($result_exist)){

		$exist = $row_exist->relname;

	}

	// // 3, if not existed, create it 
	if ($exist != "dameonsnmp1550value") {
	# code...
		$query_construct = "CREATE TABLE PUBLIC.dameonsnmp1550value(
			deviceid int,
			time           TEXT    ,
			recordip	TEXT,
			description            TEXT  ,
			oids       TEXT,
			uptime         TEXT,
			contact         TEXT,
			name        TEXT,
			location         TEXT,
			service        TEXT,
			ip         TEXT,
			mac         MACADDR,
			statusindex            TEXT  ,
			idcode       TEXT,
			subID         TEXT,
			FirmwareVersion         TEXT,
			LaserIM        TEXT,
			LaserTemperature        TEXT,
			LaserBias        TEXT,
			RFModulationLevel         TEXT,
			DC24VVoltage         TEXT,
			DC12VVoltage            TEXT  ,
			DC5VVoltage      TEXT,
			minor5VDCVoltage         TEXT,
			TxOpticalPower         TEXT,
			GainControlSetting        TEXT,
			SBSCONTROLSetting        TEXT,
			CTBCONTROLSetting       TEXT,
			TxRFModuleLevel         TEXT,
			PresentACPower1status        TEXT,
			PresentACPower2status         TEXT,
			TxACPowersupplystatus       TEXT			);";

	$result_construct = pg_query($query_construct) or die('Query failed: ' . pg_last_error());
	pg_free_result($result_construct);
	}


	// 4, insert data into the table 

	$query_insert = "INSERT INTO PUBLIC.dameonsnmp1550value VALUES ($deviceid, $timestamp, $recordedIp, $sysDescr, $sysObjectID, $sysUpTime, $sysContact, $sysName, $sysLocation, $sysService, $defaultIp, $defaultMac, $value[0], $value[1], $value[2], $value[3], $value[4], $value[5], $value[6], $value[7], $value[8], $value[9], $value[10], $value[11], $value[12], $value[13], $value[14], $value[15], $value[16], $value[17], $value[18], $value[19]);";

	$result_insert = pg_query($query_insert) or die('Query failed: ' . pg_last_error());


	// 5, check if the table "dameonSnmp1550Summary" in the database "vanguardhe": this table is for the other maybe info further

	$query_exist_sum = "SELECT relname FROM pg_class 
	WHERE relname = 'dameonsnmp1550summary';";

	$result_exist_sum = pg_query($query_exist_sum) or die('Query failed: ' . pg_last_error());

	$exist_sum = '';
	while ($row_exist_sum = pg_fetch_object($result_exist_sum)){

		$exist_sum = $row_exist_sum->relname;

	}




	// // 3, if not existed, create it 
	if ($exist_sum != "dameonsnmp1550summary") {
	# code...
		$query_construct_sum = "CREATE TABLE PUBLIC.dameonsnmp1550summary(
			description	Text,
			comments           TEXT  		);";

		$result_construct_sum = pg_query($query_construct_sum) or die('Query failed: ' . pg_last_error());
		pg_free_result($result_construct_sum);
	}


	pg_free_result($result_exist);
	pg_free_result($result_insert);
	
	pg_free_result($result_exist_sum);

	pg_close($dbconn);

}

// helper function for decorating 'xxxx'
function deco_1550($str){
	return "'".$str."'";
}



?>