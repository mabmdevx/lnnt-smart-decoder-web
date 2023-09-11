<?php
// Access Rights - Start
$_SESSION['pageaccesstype']="superadmin#admin#agent";
// Access Rights - End

log_activity("Decode Image");

$errorMsg=""; // Clear Error Msg


?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Decode Image</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Decode Image to Text
            </div>
            <div class="panel-body">
                <div class="row">
                	<div id="msgdiv">
                    <p>
                    <?php if(isset($errorMsg) && strlen($errorMsg)>0 ) { ?>
                    <div align="center" class="errorMsg"><strong><?php echo $errorMsg; ?></strong></div>
                    <?php } else if(isset($_SESSION['successMsg']) && strlen($_SESSION['successMsg'])>0 ) { ?>
                    <div align="center" class="successMsg"><strong><?php echo $_SESSION['successMsg']; ?></strong></div>
                    <?php } ?>
                    </p>
                    </div>
                    <div class="col-lg-6">
                        <form id="settingsForm" name="settingsForm" role="form" method="post" enctype="multipart/form-data" action="?pg=decode_image_done" style="height:300px">
							
                            <div class="container">
							
								<div class="row">
								
									<div class="col-lg-3"></div>
									<div class="col-lg-6">
										<div class="form-group">
											<label for="serialNum">Enter Serial Number</label>
											<input type="text" class="form-control" id="serial_num" name="serial_num" placeholder="">
										 </div>
									</div>
									<div class="col-lg-3"></div>
									
								</div>
							
								<div class="row">    
									<div class="col-xs-12 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">  
										<!-- image-preview-filename input [CUT FROM HERE]-->
										<div class="input-group image-preview">
											<input type="text" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
											<span class="input-group-btn">
												<!-- image-preview-clear button -->
												<button type="button" class="btn btn-default image-preview-clear" style="display:none;">
													<span class="glyphicon glyphicon-remove"></span> Clear
												</button>
												<!-- image-preview-input -->
												<div class="btn btn-default image-preview-input">
													<span class="glyphicon glyphicon-folder-open"></span>
													<span class="image-preview-input-title">Browse</span>
													<input id="image" name="image" type="file" accept="image/*"/> <!-- rename it -->
												</div>
												<button type="submit" class="btn btn-default">Upload</button>
											</span>
										</div><!-- /input-group image-preview [TO HERE]--> 
									</div>
								</div>
							</div>
							
                        </form>
                    </div>
                    <!-- /.col-lg-6 (nested) -->
                    
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