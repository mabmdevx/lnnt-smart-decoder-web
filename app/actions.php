<?php

switch($page)
{
case "login":
$pageRtn=include_once("pages/login.php");
break;

case "logout":
$pageRtn=include_once("pages/logout.php");
break;

case "dashboard":
$pageRtn=include_once("pages/dashboard.php");
break;

case "user_profile":
$pageRtn=include_once("pages/user_profile.php");
break;

case "settings":
$pageRtn=include_once("pages/settings.php");
break;

case "manual_entry":
$pageRtn=include_once("pages/manual_entry.php");
break;

case "manual_entry_output":
$pageRtn=include_once("pages/manual_entry_output.php");
break;

case "decode_image":
$pageRtn=include_once("pages/decode_image.php");
break;

case "decode_image_done":
$pageRtn=include_once("pages/decode_image_done.php");
break;

case "decode_history":
$pageRtn=include_once("pages/decode_history.php");
break;

case "search_codes":
$pageRtn=include_once("pages/search_codes.php");
break;

default:
$pageRtn=include_once("pages/404page.php");
break;
}




if($pageRtn==false)
{
include_once("pages/404page.php");
}




?>
