<?php

// Access Rights - Start
$_SESSION['pageaccesstype']="superadmin#admin#agent";
// Access Rights - End

log_activity("Manual Entry Output");

$errorMsg=""; // Clear Error Msg

$code_value = "";
if(isset($_GET['code_value']))
{
	$code_value = htmlentities($_GET['code_value']);
}

//Get Code Description
$code_desc = get_code_desc($code_value);

?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Manual Entry</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Code Description
            </div>
            <div class="panel-body">
                <div class="row">
                	<div id="msgdiv" style="height:30px;">
                    <p>
                    <?php if(isset($errorMsg) && strlen($errorMsg)>0 ) { ?>
                    <div align="center" class="errorMsg"><strong><?php echo $errorMsg; ?></strong></div>
                    <?php } else if(isset($_SESSION['successMsg']) && strlen($_SESSION['successMsg'])>0 ) { ?>
                    <div align="center" class="successMsg"><strong><?php echo $_SESSION['successMsg']; ?></strong></div>
                    <?php } ?>
                    </p>
                    </div>
					<div class="col-lg-4"></div>
                    <div class="col-lg-4">
						<span style="font-size:20px;"><?php echo "Code : ".$code_value; ?></span>
						<br/><br/>
						<span style="font-size:20px;"><?php echo "Description : "; ?></span>
						<br/>
						<span style="font-size:20px;"><?php echo $code_desc; ?></span>
						<br/><br/>
                    </div>
					<div class="col-lg-4"></div>
                    <!-- /.col-lg-4 (nested) -->
					<br/><br/><br/><br/>
                </div>
                <!-- /.row (nested) -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>

<?php
// Clear Success Msg
$_SESSION['successMsg']="";
?>