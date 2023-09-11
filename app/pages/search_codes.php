<?php
// Access Rights - Start
$_SESSION['pageaccesstype']="superadmin#admin#agent";
// Access Rights - End

log_activity("Search Codes");

$errorMsg=""; // Clear Error Msg



// Search
$searchTerm = "";
$searchQry = "";
if(isset($_GET['search']))
{
	$searchTerm = htmlentities($_GET['search']);
	$searchQry = " WHERE code_id LIKE '%".$searchTerm."%' OR code_desc LIKE '%".$searchTerm."%' ";
}

$codesQry="SELECT * FROM codes ".$searchQry." ORDER BY code_id ASC";
$codesRes=$dbObj->fireQuery($codesQry);

?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Search Codes</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
        	<div class="panel-heading">
                Controller LED Codes
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
							<div class="container">
								<div class="row">
									   <div id="custom-search-input">
														<div class="input-group col-md-12">
														<form role="form" id="searchForm" method="GET" action="" >
															<input id="pg" name="pg" type="hidden" value="search_codes">
															<input type="text" class="search-query form-control" placeholder="Search" name="search" id="search" />
														</form>	
														</div>
													</div>
								</div>
							</div>							
							<br/><br/>
                            <table class="table table-striped table-bordered table-hover" style="margin-bottom:0px;">
                            <thead>
                                <tr>
                                <th>Code</th>
                                <th>Description</th>                           
                              	</tr>
                            </thead>
                            <tbody>
                            <?php
							if(isset($codesRes) && $codesRes!=false && count($codesRes)>0)
							{
								for($k=0;$k<count($codesRes);$k++)
								{
							?>
                              <tr>
                                <td><?php echo htmlentities($codesRes[$k]['code_value']); ?></td>
                                <td><?php echo htmlentities($codesRes[$k]['code_desc']); ?></td>                                
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