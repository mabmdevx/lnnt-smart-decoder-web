<?php
// Access Rights - Start
$_SESSION['pageaccesstype']="superadmin#admin#agent";
// Access Rights - End

log_activity("Manual Entry Output");

$errorMsg=""; // Clear Error Msg


 
// Path to move uploaded files
$target_path = "uploads/";
 
// array for final json respone
$response = array();
 
// getting server ip address
$server_ip = gethostbyname(gethostname());
 
// final file url that is being uploaded
$file_upload_url = WEBSITE_URL.'/'.$target_path;
 
 
if (isset($_FILES['image']['name'])) {
    $target_path = "../".$target_path . basename($_FILES['image']['name']);
 
    // reading other post parameters
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $website = isset($_POST['website']) ? $_POST['website'] : '';
 
    $response['file_name'] = basename($_FILES['image']['name']);
    $response['email'] = $email;
    $response['website'] = $website;
 
    try {
        // Throws exception incase file is not being moved
        if (!move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) {
            // make error flag true
            $response['error'] = true;
            $response['message'] = 'Could not move the file!';
        }
 
        // File successfully uploaded
        $response['message'] = 'File uploaded successfully!';
        $response['error'] = false;
        $response['file_path'] = $file_upload_url . basename($_FILES['image']['name']);
    } catch (Exception $e) {
        // Exception occurred. Make error flag true
        $response['error'] = true;
        $response['message'] = $e->getMessage();
    }
} else {
    // File parameter is missing
    $response['error'] = true;
    $response['message'] = 'Not received any file!F';
}

//Serial Number
$serial_num = "";
if(isset($_POST['serial_num']))
{
	$serial_num = htmlentities($_POST['serial_num']);
}

//Do OCR
$filename = basename($_FILES['image']['name']);

//SSOCR
$ocr_output = do_ocr_ssocr($filename);

//TesseractOCR
//$ocr_output = do_ocr_tesseract($filename);

//Save Filename to DB
save_filename_in_db($filename, $serial_num, 'WEB-APP');

//Save OCR Output to DB
save_ocr_output($filename, $ocr_output);

//Get Code Description
$code_desc = get_code_desc($ocr_output);


 
// Echo final json response to client
//echo json_encode($response);
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
						<span style="font-size:20px;"><?php echo "Description : "; ?></span>
						<br/>
						<span style="font-size:20px;"><?php echo $ocr_output." - ".$code_desc; ?></span>
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