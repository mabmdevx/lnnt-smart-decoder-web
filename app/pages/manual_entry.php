<?php

// Access Rights - Start
$_SESSION['pageaccesstype']="superadmin#admin#agent";
// Access Rights - End

log_activity("Manual Entry");

$errorMsg=""; // Clear Error Msg


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
                Enter the Code manually
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
						

						<form role="form" class="form-inline" id="manual_entry_form" name="manual_entry_form" method="get" >
							<div class="form-group">						  
								<input id="pg" name="pg" type="hidden" value="manual_entry_output">
								<div class="col-xs-8">
								<input id="code_value" name="code_value" type="text" class="form-control" placeholder="Enter Code" style="">
								</div>
								<button class="btn btn-default" type="submit">Submit</button>
							</div>	
						</form>
						
						
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