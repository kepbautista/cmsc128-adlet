<!--
  - File Name: AddStudentView.php
  - Version Information: Version 1.1
  - Date: February 4, 2011 (First Release)
  - Program Description: Add Student Form Validation
  -->
<?php
session_start();
include "AddStudentController.php";
				
class AddStudentView
{
	//constructor
	function AddStudentView() {
	}
	
	function validateInfo($stdtype,$stdno,$lname,$fname,$mi,$lang,$rdg,
        $math,$sci,$upg,$gender,$region) {
		
		if($stdtype=="upcatpasser"){
			$lang=1;$rdg=1;$math=1;$sci=1;$upg=1;
		}
		$error = 0;
		
		//$link = "";
				
		if(($stdno==null) || ($lname==null) || ($fname==null) || ($mi==null) || ($lang==null) || ($rdg==null) || ($math==null) || ($sci==null) || ($upg==null)) {
			$_SESSION['isnull'] = 1;
			$error = 1;
		}/*no student number*/
		
		if($stdno!=null && !preg_match('/([0-9]{4})\-([0-9]{5})/',$stdno)) {
			$_SESSION['wrongstdno'] = 1;
			$error = 1;
		}/*wrong student number format*/
		
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
			$_SESSION['error'] = 1;
			$_SESSION['addstdno'] = $stdno;
			$_SESSION['addlname'] = $lname;
			$_SESSION['addfname'] = $fname;
			$_SESSION['addmi'] = $mi;
			if(!($stdtype=="upcatpasser")){
				$_SESSION['addlang'] = $lang;
				$_SESSION['addrdg'] = $rdg;
				$_SESSION['addmath'] = $math;
				$_SESSION['addsci'] = $sci;
				$_SESSION['addupg'] = $upg;
			}
			$_SESSION['addgender'] = $gender;
			$_SESSION['addregion'] = $region;
			header("Location: add.php");//there are errors present
		}
		else{
			$asc = new AddStudentController();
			$asc->addStudent($stdtype,$stdno,$lname,$fname,$mi,$lang,$rdg,$math,$sci,$upg,
				  $gender,$region);
		}//there are no errors
	}
	
	function requestAddStudent()
	{
		/*get submitted information*/
		$stdtype = $_POST[studentType];
		$stdno = $_POST['stdno'];
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
		
		$addstudentview2 = new AddStudentView();
		$addstudentview2->validateInfo($stdtype,$stdno,$lname,$fname,$mi,$lang,$rdg,$math,$sci,$upg,
			   $gender,$region);
	}
	
	function showMessage($flag) {
		if($flag==1) header("Location: add.php?addsuccess=1");
		else header("Location: add.php?addnotsuccess=1");
	}//show message if add student is successful or not
}

$addstudentview = new AddStudentView(); //instance of AddStudentView
$addstudentview->requestAddStudent();

?>