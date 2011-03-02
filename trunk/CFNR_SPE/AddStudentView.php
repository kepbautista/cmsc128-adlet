<!--
  - File Name: AddStudentView.php
  - Version Information: Version 1.1
  - Date: February 4, 2011 (First Release)
  - Program Description: Add Student Form Validation
  -->
<?php
include "AddStudentController.php";
				
class AddStudentView
{
	//constructor
	function AddStudentView() {
	}
	
	function validateInfo($stdno,$lname,$fname,$mi,$lang,$rdg,
        $math,$sci,$upg,$gender,$region) {
		
		$error = 0;
		
		$link = "Location: add.php?stdno=".$stdno."&lname=".$lname."&fname=".$fname.
				"&mi=".$mi."&lang=".$lang."&rdg=".$rdg."&math=".$math."&sci=".$sci.
				"&upg=".$upg."&gender=".$gender."&region=".$region;
				
		if($stdno==null) {
			$link = $link."&isnull=1";
			$error = 1;
		}/*no student number*/
		
		if($stdno!=null && !preg_match('/([0-9]{4})\-([0-9]{5})/',$stdno)) {
			$link = $link."&wrongstdno=1";
			$error = 1;
		}/*wrong student number format*/
		
		if($rdg!=null && !is_numeric($rdg)) {
			$link = $link."&rdgnotnum=1";
			$error = 1;
		}/*reading grade is not a number*/
		
		if($rdg!=null && $rdg<0) {
			$link = $link."&negativerdg=1";
			$error = 1;
		}/*reading grade is negative*/
		
		if(($lang==null) || ($rdg==null) || ($math==null) ||
			($sci==null) || ($upg==null)) {
			$link = $link."&isnull=1";
			$error = 1;
		}/*some grades are null*/
		
		if($lang!=null && !is_numeric($lang)) {
			$link = $link."&langnotnum=1";	
			$error = 1;
		}/*language grade is not a number*/
		
		if($lang!=null && $lang<0) {
			$link = $link."&negativelang=1";
			$error = 1;
		}/*language grade is a negative number*/
		
		if($math!=null && !is_numeric($math)) {
			$link = $link."&mathnotnum=1";
			$error = 1;
		}/*mathematics grade is not a number*/
		
		if($math!=null && $math<0) {
			$link = $link."&negativemath=1";
			$error = 1;
		}/*mathematics grade is a negative number*/
		
		if($sci!=null && !is_numeric($sci)) {
			$link = $link."&scinotnum=1";
			$error = 1;
		}/*science grade is not a number*/
		
		if($sci!=null && $sci<0){
			$link = $link."&negativesci=1";
			$error = 1;
		}/*science grade is a negative number*/
		
		if($upg!=null && !is_numeric($upg)){
			$link = $link."&upgnotnum=1";
			$error = 1;
		}/*upg is not a number*/
		
		if($upg!=null && $upg<0){
			$link = $link."&negativeupg=1";
			$error = 1;
		}/*upg is a negative number*/
		
		if($error==1) header($link);//there are errors present
		else{
			$asc = new AddStudentController();
			$asc->addStudent($stdno,$lname,$fname,$mi,$lang,$rdg,$math,$sci,$upg,
				  $gender,$region);
		}//there are no errors
	}
	
	function requestAddStudent()
	{
		/*get submitted information*/
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
		$addstudentview2->validateInfo($stdno,$lname,$fname,$mi,$lang,$rdg,$math,$sci,$upg,
			   $gender,$region);
	}
	
	function showMessage($flag,$link) {
		if($flag==1) header("Location: add.php?addsuccess=1");
		else header($link."&addnotsuccess=1");
	}//show message if add student is successful or not
}

$addstudentview = new AddStudentView(); //instance of AddStudentView
$addstudentview->requestAddStudent();

?>