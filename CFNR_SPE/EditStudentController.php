<?php
include "StudentManager.php";
class EditStudentController
{
	//constructor
	function EditStudentController(){
	}
	
	function editStudent($stdno,$lname,$fname,$mi,$rdg,$lang,$math,$sci,$upg,$gender,$region)
	{
		/*transform each information to uppercase letters*/
		$stdno = strtoupper($stdno);
		$lname = strtoupper($lname);
		$fname = strtoupper($fname);
		$mi = strtoupper($mi);
		$rdg = strtoupper($rdg);
		$lang = strtoupper($lang);
		$math = strtoupper($math);
		$sci = strtoupper($sci);
		$upg = strtoupper($upg);
		$gender = strtoupper($gender);
		$region = strtoupper($region);
		
		$editstudentview = new EditStudentView(); //instance of EditStudentView
		$studentmanager = new StudentManager(); //instance of StudentManager
		$editsuccess = $studentmanager->updateStudent($stdno,$lname,$fname,$mi,$rdg,
		    $lang,$math,$sci,$upg,$gender,$region);
		
		echo $editsuccess;
		if($editsuccess>0) $editstudentview->showMessage($editsuccess); //successfully edited student
		else $editstudentview->showMessage($editsuccess); //unsuccessfully edited student
	}
}
?>