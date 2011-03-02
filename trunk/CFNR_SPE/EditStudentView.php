<!--
  - File Name: EditStudentView.php
  - Version Information: Version 1.0
  - Date:
  - Program Description: Edit Student Form Validation
  -->
<?php
session_start();
include "EditStudentController.php";
class EditStudentView
{
	function validateInfo($stdno,$lname,$fname,$mi,$rdg,$lang,
        $math,$sci,$upg,$gender,$region) {
		
		$error = 0;
		
		$link = "Location: edit.php?";
		
		if($rdg==null) {
			$link = $link."isnull=1&";
			$error = 1;
		}/*no reading grade*/
		
		if($rdg!=null && !is_numeric($rdg)) {
			$link = $link."rdgnotnum=1&";
			$error = 1;
		}/*reading grade is not a number*/
		
		if($rdg!=null && $rdg<0) {
			$link = $link."negativerdg=1&";
			$error = 1;
		}/*reading grade is negative*/
		
		if($lang==null) {
			$link = $link."isnull=1&";
			$error = 1;
		}/*no language grade*/
		
		if($lang!=null && !is_numeric($lang)) {
			$link = $link."langnotnum=1&";	
			$error = 1;
		}/*language grade is not a number*/
		
		if($lang!=null && $lang<0) {
			$link = $link."negativelang=1&";
			$error = 1;
		}/*language grade is a negative number*/
		
		if($math==null) {
			$link = $link."isnull=1&";
			$error = 1;
		}/*no mathematics grade*/
		
		if($math!=null && !is_numeric($math)) {
			$link = $link."mathnotnum=1&";
			$error = 1;
		}/*mathematics grade is not a number*/
		
		if($math!=null && $math<0) {
			$link = $link."negativemath=1&";
			$error = 1;
		}/*mathematics grade is a negative number*/
		
		if($sci==null) {
			$link = $link."isnull=1&";
			$error = 1;
		}/*no science grade*/
		
		if($sci!=null && !is_numeric($sci)) {
			$link = $link."scinotnum=1&";
			$error = 1;
		}/*science grade is not a number*/
		
		if($sci!=null && $sci<0){
			$link = $link."negativesci=1&";
			$error = 1;
		}/*science grade is a negative number*/
		
		if($upg==null){
			$link = $link."isnull=1&";
			$error = 1;
		}/*no upg*/
		
		if($upg!=null && !is_numeric($upg)){
			$link = $link."upgnotnum=1&";
			$error = 1;
		}/*upg is not a number*/
		
		if($upg!=null && $upg<0){
			$link = $link."negativeupg=1&";
			$error = 1;
		}/*upg is a negative number*/
		
		if($error==1) header($link);//there are errors present
		else{
			$asc = new EditStudentController();
			$asc->editStudent($stdno,$lname,$fname,$mi,$rdg,$lang,$math,$sci,$upg,
				  $gender,$region);
		}//there are no errors
	}
	
	function requestEditStudent(){
		/*get submitted information*/
		$stdno = $_SESSION['editStdno'];
		$lname = $_POST['lname'];
		$fname = $_POST['fname'];
		$mi = $_POST['mi'];
		$rdg = $_POST['rdg'];
		$lang = $_POST['lang'];
		$math = $_POST['math'];
		$sci = $_POST['sci'];
		$upg = $_POST['upg'];
		$gender = $_POST['gender'];
		$region = $_POST['region'];
		
		$editstudentview2 = new EditStudentView();
		$editstudentview2->validateInfo($stdno,$lname,$fname,$mi,$rdg,$lang,$math,$sci,$upg,
			   $gender,$region);
	}
	
	function showMessage($flag) {
		if($flag>0) header("Location: edit.php?editsuccess='$flag'");
		else header("Location: edit.php?editnotsuccess='$flag'");
	}
}

$editstudentview = new EditStudentView(); //instance of EditStudentView
$editstudentview->requestEditStudent();
?>