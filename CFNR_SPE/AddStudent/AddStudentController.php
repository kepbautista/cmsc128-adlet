<!--
  - File Name: AddStudentController.php
  - Version Information: Version 1.1
  - Date: February 4, 2011 (First Release)
  - Program Description: data transformations
  -->
<?php
include "../StudentManager.php";

class AddStudentController
{
	//constructor
	function AddStudentController(){
	}
	
	function addStudent($stdtype,$stdno,$lname,$fname,$mi,$lang,$rdg,$math,$sci,$upg,$gender,$region)
	{
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
			
		/*transform each information to uppercase letters
		& remove white spaces before and after*/
		$stdno = trim(strtoupper($stdno));
		$lname = trim(strtoupper($lname));
		$fname = trim(strtoupper($fname));
		$mi = trim(strtoupper($mi));
		$lang = trim(strtoupper($lang));
		$rdg = trim(strtoupper($rdg));
		$math = trim(strtoupper($math));
		$sci = trim(strtoupper($sci));
		$upg = trim(strtoupper($upg));
		$gender = trim(strtoupper($gender));
		$region = trim(strtoupper($region));
		
		$student = new AddStudentView(); //instance of AddStudentView
		$sm = new StudentManager(); //instance of StudentManager
		$addsuccess = $sm->insertStudent($stdtype,$stdno,$lname,$fname,$mi,$lang,$rdg,
		      $math,$sci,$upg,$gender,$region);
		
		echo $addsuccess;
		if($addsuccess==1){  //successful add student
			unset($_SESSION['addstdno']);
			unset($_SESSION['addlname']);
			unset($_SESSION['addfname']);
			unset($_SESSION['addmi']);
			if(isset($_SESSION['addlang'])) unset($_SESSION['addlang']);
			if(isset($_SESSION['addrdg'])) unset($_SESSION['addrdg']);
			if(isset($_SESSION['addmath'])) unset($_SESSION['addmath']);
			if(isset($_SESSION['addsci'])) unset($_SESSION['addsci']);
			if(isset($_SESSION['addupg'])) unset($_SESSION['addupg']);
			unset($_SESSION['addgender']);
			unset($_SESSION['addregion']);
			
			$student->showMessage(1);
		}
		else $student->showMessage(0); //unsuccessful add student
	}
}
?>