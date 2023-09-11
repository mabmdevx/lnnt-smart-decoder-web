<?php
// MEA
// 2016-06-17

//error_reporting(E_ALL);
error_reporting(E_ALL ^ E_DEPRECATED);

session_start();

include_once("lib/lib.dbConnection.php");
include_once("config/constants.inc.php");
include_once("lib/lib.commonFunc.php");
include_once("lib/lib.formValidations.php");
include_once("lib/lib.formFunc.php");
include_once("lib/lib.syslog.php");
include_once("lib/lib.sysFunc.php");
include_once("lib/lib.ocr.php");

include_once("logincheck.php");

ob_start();

$page = "";
$pageRtn = false;
if(isset($_GET['pg']) && strlen($_GET['pg'])>0 )
{
	$page=$_GET['pg'];
}
else
{
	$page="default";
}

?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $sc_site_title; ?></title>

    <!-- Core CSS - Include with every page -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- SB Admin CSS - Include with every page -->
    <link href="css/sb-admin.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	
    <link href="css/bootstrap_switch/bootstrap3/bootstrap-switch.css" rel="stylesheet">
	<link href="css/pnotify/pnotify.custom.min.css" rel="stylesheet">
	
</head>

<body>
<?php
if($page=="login")
{
?>
<!--<div class="container">-->
<?php
	include_once("actions.php");
?>        
<!--</div>-->
<?php
}else{
?>
<div id="wrapper">

    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo HOME_PAGE; ?>?pg=dashboard"><?php echo $sc_site_title; ?></a>
        </div>
        <!-- /.navbar-header -->
        
        
<ul class="nav navbar-top-links navbar-right">
                
                <!-- /.dropdown -->
                
                <!-- /.dropdown -->
                
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        Welcome, <?php echo $_SESSION['username']; ?><i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?php echo HOME_PAGE; ?>?pg=user_profile"><i class="fa fa-user fa-fw"></i>&nbsp;User Profile</a>
                        </li>
                        <li><a href="<?php echo HOME_PAGE; ?>?pg=settings"><i class="fa fa-gear fa-fw"></i>&nbsp;Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo HOME_PAGE; ?>?pg=logout"><i class="fa fa-sign-out fa-fw"></i>&nbsp;Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        <!-- /.navbar-top-links -->

    </nav>
    <!-- /.navbar-static-top -->

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="side-menu">             
                <li>
                    <a href="<?php echo HOME_PAGE; ?>?pg=dashboard"><i class="fa fa-dashboard fa-fw"></i>&nbsp;Dashboard</a>
                </li>
                <li>
                    <a href="<?php echo HOME_PAGE; ?>?pg=decode_image"><i class="fa fa-edit fa-fw"></i>&nbsp;Decode Image</a>
                </li>
				<li>
                    <a href="<?php echo HOME_PAGE; ?>?pg=decode_history"><i class="fa fa-list fa-fw"></i>&nbsp;Decode History</a>
                </li>
                <li>
                    <a href="<?php echo HOME_PAGE; ?>?pg=manual_entry"><i class="fa fa-wrench fa-fw"></i>&nbsp;Manual Entry</a>
                </li>  
				<li>
                    <a href="<?php echo HOME_PAGE; ?>?pg=search_codes"><i class="fa fa-book fa-fw"></i>&nbsp;Search Codes</a>
                </li> 				
            </ul>
            <!-- /#side-menu -->
        </div>
        <!-- /.sidebar-collapse -->
    </nav>
    <!-- /.navbar-static-side -->

<div id="page-wrapper">
<?php
	include_once("actions.php");
?> 
</div>   
    <!-- /#page-wrapper -->

</div>
    <!-- /#wrapper -->
<?php
}
?>    

    <!-- Core Scripts - Include with every page -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- SB Admin Scripts - Include with every page -->
    <script src="js/sb-admin.js"></script>

	<!-- Bootstrap Switch -->
	<script src="js/bootstrap_switch/bootstrap-switch.min.js"></script>
	<script src="js/pnotify/pnotify.custom.min.js"></script>
	
	<!--upload-->
	<script src="js/bootsnipp_upload.js"></script>


</body>

</html>
<?php
ob_flush();
?>