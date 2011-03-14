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
	function validateInfo($stdtype,$stdno,$lname,$fname,$mi,$lang,$rdg,
        $math,$sci,$upg,$gender,$region) {
		
		if($stdtype=="upcat_passers"){
			$lang=1;$rdg=1;$math=1;$sci=1;$upg=1;
		}
		$error = 0;
		
		$link = "";
		
		if(($rdg==null) || ($lname==null) || ($fname==null) || ($mi==null) || ($lang==null) || ($math==null) || ($sci==null) || ($upg==null)) {
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
		
		if($lang!=null && !is_numeric($lang)) {
			$link = $link."langnotnum=1&";	
			$error = 1;
		}/*language grade is not a number*/
		
		if($lang!=null && $lang<0) {
			$link = $link."negativelang=1&";
			$error = 1;
		}/*language grade is a negative number*/
		
		if($math!=null && !is_numeric($math)) {
			$link = $link."mathnotnum=1&";
			$error = 1;
		}/*mathematics grade is not a number*/
		
		if($math!=null && $math<0) {
			$link = $link."negativemath=1&";
			$error = 1;
		}/*mathematics grade is a negative number*/
		
		if($sci!=null && !is_numeric($sci)) {
			$link = $link."scinotnum=1&";
			$error = 1;
		}/*science grade is not a number*/
		
		if($sci!=null && $sci<0){
			$link = $link."negativesci=1&";
			$error = 1;
		}/*science grade is a negative number*/
		
		if($upg!=null && !is_numeric($upg)){
			$link = $link."upgnotnum=1&";
			$error = 1;
		}/*upg is not a number*/
		
		if($upg!=null && $upg<0){
			$link = $link."negativeupg=1&";
			$error = 1;
		}/*upg is a negative number*/
		
		if($error==1){
			if($stdtype=="upcatpasser"){
				$lang=null;$rdg=null;$math=null;$sci=null;$upg=null;
			}
			$link = "Location: edit.php?error=1&lname=$lname&
				fname=$fname&mi=$mi&lang=$lang&rdg=$rdg&
				math=$math&sci=$sci&upg=$upg&gender=$gender&region=$region&".$link;
			header($link);//there are errors present
		}
		else{
			$esc = new EditStudentController();
			$esc->editStudent($stdtype,$stdno,$lname,$fname,$mi,$lang,$rdg,$math,$sci,$upg,
				  $gender,$region);
		}//there are no errors
	}
	
	function requestEditStudent(){
		/*get submitted information*/
		$studentmanager = new StudentManager();
		
		$stdno = $_SESSION['modifyStdno'];
		$stdtype = $studentmanager->determineTable($stdno);
		$lname = $_POST['lname'];
		$fname = $_POST['fname'];
		$mi = $_POST['mi'];
		$lang = $_POST['lang'];
		$rdg = $_POST['rdg'];
		$math = $_POST['math'];
		$sci = $_POST['sci'];
		$upg = $_POST['upg'];
		$gender = $_POST['gender'];
		$region = $_POST['region'];
		
		$editstudentview2 = new EditStudentView();
		$editstudentview2->validateInfo($stdtype,$stdno,$lname,$fname,$mi,$lang,$rdg,$math,$sci,$upg,
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