<?php

function do_ocr_ssocr($filename)
{
	exec("ssocr -T -d 2 -b black ".PATH_UPLOAD.$filename." 2>&1", $output, $return_var);
	
	return implode(", ",$output);
}

function do_ocr_tesseract($filename)
{
	exec("tesseract ".PATH_UPLOAD.$filename." ".PATH_OUTPUT.$filename);
	
	$ocr_text = trim(file_get_contents(PATH_OUTPUT.$filename.".txt"));
	
	return $ocr_text;
}

function save_filename_in_db($filename, $serial_num, $upload_type)
{
    global $dbObj;
   
    $mysqlnow=date('Y-m-d H:i:s');
   
    $insertQry="INSERT INTO ocr_tasks SET
                ocr_imgfile='".$filename."',
				ocr_serial_num='".$serial_num."',
				ocr_upload_type = '".$upload_type."',
                created_at='".$mysqlnow."',
                updated_at='".$mysqlnow."' ";
   
    $insertRes=$dbObj->fireQuery($insertQry,"insert");
   
}

function save_ocr_output($filename, $ocr_output)
{
    global $dbObj;
   
    $mysqlnow=date('Y-m-d H:i:s');
   
    $updateQry="UPDATE ocr_tasks SET
				ocr_text = '".$ocr_output."',
				updated_at = '".$mysqlnow."'
                WHERE ocr_imgfile = '".$filename."' ";
   
    $updateRes=$dbObj->fireQuery($updateQry,"update");
   
}


?>