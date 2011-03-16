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
				
		if($stdno==null) {
			$_SESSION['stdnoisnull'] = 1;
			$error = 1;
		}/*no student number*/
		
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
		
		if($stdno!=null && (!preg_match('/([0-9]{4})\-([0-9]{5})/',$stdno) || strlen($stdno)!=10)) {
			$_SESSION['wrongstdno'] = 1;
			$error = 1;
		}/*wrong student number format*/
		
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
			$_SESSION['error'] = 1;
			$_SESSION['addstdtype'] = $stdtype;
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
			header("Location: ../AddStudent");//there are errors present
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
		if($flag==1) header("Location: ../AddStudent/?addsuccess=1");
		else header("Location: ../AddStudent/?addnotsuccess=1");
	}//show message if add student is successful or not
}

$addstudentview = new AddStudentView(); //instance of AddStudentView
$addstudentview->requestAddStudent();

?>