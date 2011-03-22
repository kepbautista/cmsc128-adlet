<!--
 - File Name: EditStudentController.php
 - Program Description: data transformations
-->
<?php
include "../StudentManager.php";
class EditStudentController
{
	//constructor
	function EditStudentController(){
	}
	
	function editStudent($stdtype,$stdno,$lname,$fname,$mi,$lang,$rdg,$math,$sci,$upg,$gender,$region)
	{
		/*transform each information to uppercase letters,
		remove white spaces before and after,
		and look for characters which can harm the program*/
		$search = array("<",">");
		$replace = array("bawal1","bawal2");
		$stdno = trim(strtoupper($stdno));
		$lname = str_replace($search,$replace,trim(strtoupper($lname)));
		$fname = str_replace($search,$replace,trim(strtoupper($fname)));
		$mi = str_replace($search,$replace,trim(strtoupper($mi)));
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