<?php

include_once("../lib/lib.dbConnection.php");
include_once("../config/constants.inc.php");
include_once("../lib/lib.sysFunc.php");
include_once("../lib/lib.syslog.php");
include_once("../lib/lib.rpiFunc.php");

$qry="select * from settingsconfig where sc_id = 1";
$res=$dbObj->fireQuery($qry,'select');

$webserver_url = "";

if(isset($res) && count($res)>0 && $res!=false)
{
	$webserver_url = $res[0]['sc_webserver_url'];
}

$local_ip=get_local_ip();
$ping_url = $webserver_url."/scripts/ping_rcv.php?local_addr=".base64_encode($local_ip);

$exec_cmd = "/usr/bin/wget -q --spider ".$ping_url."";
//echo $exec_cmd;
exec($exec_cmd, $rtn);

//phpinfo();

//curl_get_file_contents($url);

?>