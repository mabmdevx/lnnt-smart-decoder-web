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
save_filename_in_db($filename, $serial_num, 'ANDROID-APP');

//Save OCR Output to DB
save_ocr_output($filename, $ocr_output);

//Get Code Description
$code_desc = get_code_desc($ocr_output);

//Output Response
echo $ocr_output." - ".$code_desc;
 
// Echo final json response to client
//echo json_encode($response);
?>