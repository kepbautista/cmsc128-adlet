<!--
  - File Name: AddStudentController.php
  - Version Information: Version 1.1
  - Date: February 4, 2011 (First Release)
  - Program Description: data transformations
  -->
<?php
include "StudentManager.php";

class AddStudentController
{
	//constructor
	function AddStudentController(){
	}
	
	function addStudent($stdno,$lname,$fname,$mi,$lang,$rdg,$math,$sci,$upg,$gender,$region)
	{
		$link = "Location: add.php?stdno=".$stdno."&lname=".$lname."&fname=".$fname.
				"&mi=".$mi."&lang=".$lang."&rdg=".$rdg."&math=".$math."&sci=".$sci.
				"&upg=".$upg."&gender=".$gender."&region=".$region;
	
		/*transform each information to uppercase letters*/
		$stdno = strtoupper($stdno);
		$lname = strtoupper($lname);
		$fname = strtoupper($fname);
		$mi = strtoupper($mi);
		$lang = strtoupper($lang);
		$rdg = strtoupper($rdg);
		$math = strtoupper($math);
		$sci = strtoupper($sci);
		$upg = strtoupper($upg);
		$gender = strtoupper($gender);
		$region = strtoupper($region);
		
		$student = new AddStudentView(); //instance of AddStudentView
		$sm = new StudentManager(); //instance of StudentManager
		$addsuccess = $sm->insertStudent($stdno,$lname,$fname,$mi,$lang,$rdg,
		      $math,$sci,$upg,$gender,$region);
		
		echo $addsuccess;
		if($addsuccess==1) $student->showMessage(1,$link); //successful add student
		else $student->showMessage(0,$link); //unsuccessful add student
	}
}
?>