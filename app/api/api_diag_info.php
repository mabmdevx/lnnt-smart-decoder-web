<?php
//error_reporting(E_ALL);
error_reporting(E_ALL ^ E_DEPRECATED);

include_once("../lib/lib.dbConnection.php");
include_once("../config/constants.inc.php");
include_once("../lib/lib.commonFunc.php");
include_once("../lib/lib.formValidations.php");
include_once("../lib/lib.formFunc.php");
include_once("../lib/lib.syslog.php");
include_once("../lib/lib.sysFunc.php");
include_once("../lib/lib.ocr.php");

exec("cat /proc/meminfo 2>&1", $output, $return_var); 

foreach($output as $out){
    echo $out;
    echo "\n";
} 

?>