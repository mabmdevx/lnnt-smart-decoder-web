<?php
// Access Rights - Start
$_SESSION['pageaccesstype']="superadmin#admin#agent";
// Access Rights - End

log_activity("Decode History");

$errorMsg=""; // Clear Error Msg

// Permanent Delete
if( (isset($_GET['do']) && strlen($_GET['do'])>0 && ($_GET['do']=="delete")) )
{
	$ocr_id=$_GET['ocr_id'];
	
	$deleteQry="DELETE from ocr_tasks WHERE ocr_id = '".$ocr_id."'";
	
	$deleteRes=$dbObj->fireQuery($deleteQry,'delete');
	
	$_SESSION['successMsg']="Decoded Task Deleted Successfully";
	log_activity("Decoded Task Deleted Successfully : Id-".$ocr_id."");
	header("Location: ".HOME_PAGE."?pg=decode_history");
	exit;
}

$ocrTasksQry="SELECT * FROM ocr_tasks ORDER BY ocr_id DESC";
$ocrTasksRes=$dbObj->fireQuery($ocrTasksQry);


?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Decode History</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
        	<div class="panel-heading">
                History of Decoding Tasks
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
                    <div class="col-lg-12">
                            <table class="table table-striped table-bordered table-hover" style="margin-bottom:0px;">
                            <thead>
                                <tr>
                                <th>Image Filename</th>
                                <th>OCR Text</th>
								<th width="150">Serial Number</th>
								<th width="150">Source</th>
        						<th><img src="images/delete.png" width="20" height="20" /></th>                                
                              	</tr>
                            </thead>
                            <tbody>
                            <?php
							if(isset($ocrTasksRes) && $ocrTasksRes!=false && count($ocrTasksRes)>0)
							{
								for($k=0;$k<count($ocrTasksRes);$k++)
								{
							?>
                              <tr>
                                <td><?php echo htmlentities($ocrTasksRes[$k]['ocr_imgfile']); ?></td>
                                <td><?php echo htmlentities($ocrTasksRes[$k]['ocr_text']); ?></td>
								<td><?php echo htmlentities($ocrTasksRes[$k]['ocr_serial_num']); ?></td>
								<td><?php echo htmlentities($ocrTasksRes[$k]['ocr_upload_type']); ?></td>
        						<td><a href="?pg=decode_history&ocr_id=<?php echo $ocrTasksRes[$k]['ocr_id'];?>&do=delete"><img src="images/delete.png" width="20" height="20" /></a></td>                                  
                              </tr>
							<?php
								}
							}
							else
							{
							?>
                            <tr>
                                <td colspan="5" style="text-align:center">No Data Available</td>                                
                             </tr>
                            <?php
							}
							?>
                              </tbody>
                          </table> 
						  <br/><br/>
                    </div>
                    <!-- /.col-lg-12 (nested) -->
                    
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