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
		
		if(($rdg==null) || ($lname==null) || ($fname==null) || ($mi==null) || ($lang==null) || ($math==null) || ($sci==null) || ($upg==null)) {
			$_SESSION['isnull'] = 1;
			$error = 1;
		}/*no reading grade*/
		
		if($rdg!=null && !is_numeric($rdg)) {
			$_SESSION['rdgnotnum'] = 1;
			$error = 1;
		}/*reading grade is not a number*/
		
		if($rdg!=null && $rdg<0) {
			$_SESSION['negativerdg'] = 1;
			$error = 1;
		}/*reading grade is negative*/
		
		if($lang!=null && !is_numeric($lang)) {
			$_SESSION['langnotnum'] = 1;
			$error = 1;
		}/*language grade is not a number*/
		
		if($lang!=null && $lang<0) {
			$_SESSION['negativelang'] = 1;
			$error = 1;
		}/*language grade is a negative number*/
		
		if($math!=null && !is_numeric($math)) {
			$_SESSION['mathnotnum'] = 1;
			$error = 1;
		}/*mathematics grade is not a number*/
		
		if($math!=null && $math<0) {
			$_SESSION['negativemath'] = 1;
			$error = 1;
		}/*mathematics grade is a negative number*/
		
		if($sci!=null && !is_numeric($sci)) {
			$_SESSION['scinotnum'] = 1;
			$error = 1;
		}/*science grade is not a number*/
		
		if($sci!=null && $sci<0){
			$_SESSION['negativesci'] = 1;
			$error = 1;
		}/*science grade is a negative number*/
		
		if($upg!=null && !is_numeric($upg)){
			$_SESSION['upgnotnum'] = 1;
			$error = 1;
		}/*upg is not a number*/
		
		if($upg!=null && $upg<0){
			$_SESSION['negativeupg'] = 1;
			$error = 1;
		}/*upg is a negative number*/
		
		if($error==1){
			$_SESSION['editerror'] = 1;
			$_SESSION['editlname'] = $lname;
			$_SESSION['editfname'] = $fname;
			$_SESSION['editmi'] = $mi;
			if(!($stdtype=="upcatpasser")){
				$_SESSION['editlang'] = $lang;
				$_SESSION['editrdg'] = $rdg;
				$_SESSION['editmath'] = $math;
				$_SESSION['editsci'] = $sci;
				$_SESSION['editupg'] = $upg;
			}
			$_SESSION['editgender'] = $gender;
			$_SESSION['editregion'] = $region;
			
			header("Location: ../EditStudent/");//there are errors present
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
		if($flag>0) header("Location: ../EditStudent?editsuccess='$flag'");
		else header("Location: ../EditStudent/?editnotsuccess='$flag'");
	}
}

$editstudentview = new EditStudentView(); //instance of EditStudentView
$editstudentview->requestEditStudent();
?>