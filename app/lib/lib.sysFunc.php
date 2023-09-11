<?php

function cleanData($value)
{
	$value = str_replace('"','',$value);
	return trim(mysql_real_escape_string($value));
}

function cleanData2($value)
{	
	$value = convert_smart_quotes($value);
	$value = preg_replace('/[^(\x20-\x7F)]*/','', $value);
	return trim(mysql_real_escape_string($value));
}

function custom_date_diff_days($date_start,$date_end)
{
	$date_diff = $date_end-$date_start;
	$date_diff_days = floor($date_diff/86400);
	return $date_diff_days;
}

function get_global_ip() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
 
    return $ipaddress;
}

function get_local_ip() {
    $ipaddress = '';
	
	exec("/sbin/ifconfig eth0 | grep 'inet addr:' | cut -d: -f2 | awk '{ print $1}'", $eth_data);
	if(array_key_exists(0,$eth_data))
	{
		$ipaddress = $eth_data[0];
	}
	
	if(strlen($ipaddress)==0)
	{
		exec("/sbin/ifconfig wlan0 | grep 'inet addr:' | cut -d: -f2 | awk '{ print $1}'", $wlan_data);
		if(array_key_exists(0,$wlan_data))
		{
			$ipaddress = $wlan_data[0];
		}
	}
 
    return $ipaddress;
}

function curl_get_file_contents($URL)
{
	$c = curl_init();
	//curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($c, CURLOPT_URL, $URL);
	$contents = curl_exec($c);
	curl_close($c);
	
	if ($contents) return $contents;
	else return FALSE;
}

function get_code_desc($ocr_output)
{
    global $dbObj;
   
    $selectQry="SELECT code_id, code_value, code_desc FROM codes WHERE
                code_value='".$ocr_output."' ";
   
    $selectRes=$dbObj->fireQuery($selectQry,"select");
	
	return $selectRes[0]['code_desc'];
}


?>