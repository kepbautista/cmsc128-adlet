<!--
  - File Name: EditStudentView.php
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
		
		/*one or more input is/are scripts that
		can harm the program*/
		if((stripos($lname,"script") !== false)){
			if((stripos($lname,"<") !== false) && (stripos($lname,">") !== false)){
				$_SESSION['scriptlname'] = 1;
				$error = 1;
			}
		}
		if((stripos($fname,"script") !== false)){
			if((stripos($fname,"<") !== false) && (stripos($fname,">") !== false)){
				$_SESSION['scriptfname'] = 1;
				$error = 1;
			}
		}
		if((stripos($mi,"script") !== false)){
			if((stripos($mi,"<") !== false) && (stripos($mi,">") !== false)){
				$_SESSION['scriptmi'] = 1;
				$error = 1;
			}
		}
		
		if($lname==null){
			$_SESSION['lnameisnull'] = 1;
			$error = 1;
		}/*no last name*/
		
		if($fname==null){
			$_SESSION['fnameisnull'] = 1;
			$error = 1;
		}/*no first name*/
		
		if($mi==null){
			$_SESSION['miisnull'] = 1;
			$error = 1;
		}/*no last name*/
		
		if($lang==null){
			$_SESSION['langisnull'] = 1;
			$error = 1;
		}/*no language grade*/
		
		if($rdg==null){
			$_SESSION['rdgisnull'] = 1;
			$error = 1;
		}/*no reading grade*/
		
		if($math==null){
			$_SESSION['mathisnull'] = 1;
			$error = 1;
		}/*no math grade*/
		
		if($sci==null){
			$_SESSION['sciisnull'] = 1;
			$error = 1;
		}/*no science grade*/
		
		if($upg==null){
			$_SESSION['upgisnull'] = 1;
			$error = 1;
		}/*no upg*/
		
		if(strlen($mi)>5){
			$_SESSION['longmi'] = 1;
			$error = 1;
		}
		
		if($rdg!=null && (!is_numeric($rdg) || $rdg<0)) {
			$_SESSION['invalidrdg'] = 1;
			$error = 1;
		}/*reading grade is not a number*/
		
		if($lang!=null && (!is_numeric($lang) || $lang<0)) {
			$_SESSION['invalidlang'] = 1;
			$error = 1;
		}/*language grade is not a number*/
		
		if($math!=null && (!is_numeric($math) || $math<0)) {
			$_SESSION['invalidmath'] = 1;
			$error = 1;
		}/*mathematics grade is not a number*/
		
		if($sci!=null && (!is_numeric($sci) || $sci<0)) {
			$_SESSION['invalidsci'] = 1;
			$error = 1;
		}/*science grade is not a number*/
		
		if($upg!=null && (!is_numeric($upg) || $upg<0)){
			$_SESSION['invalidupg'] = 1;
			$error = 1;
		}/*upg is not a number*/
		
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