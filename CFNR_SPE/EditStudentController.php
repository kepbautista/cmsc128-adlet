<?php
include "StudentManager.php";
class EditStudentController
{
	//constructor
	function EditStudentController(){
	}
	
	function editStudent($stdtype,$stdno,$lname,$fname,$mi,$lang,$rdg,$math,$sci,$upg,$gender,$region)
	{
		/*transform each information to uppercase letters
		& remove white spaces before and after*/
		$stdno = trim(strtoupper($stdno));
		$lname = trim(strtoupper($lname));
		$fname = trim(strtoupper($fname));
		$mi = trim(strtoupper($mi));
		$rdg = trim(strtoupper($rdg));
		$lang = trim(strtoupper($lang));
		$math = trim(strtoupper($math));
		$sci = trim(strtoupper($sci));
		$upg = trim(strtoupper($upg));
		$gender = trim(strtoupper($gender));
		$region = trim(strtoupper($region));
		
		$editstudentview = new EditStudentView(); //instance of EditStudentView
		$studentmanager = new StudentManager(); //instance of StudentManager
		$editsuccess = $studentmanager->updateStudent($stdtype,$stdno,$lname,$fname,$mi,$rdg,
		    $lang,$math,$sci,$upg,$gender,$region);
		
		$editstudentview->showMessage($editsuccess);
	}
}
?>