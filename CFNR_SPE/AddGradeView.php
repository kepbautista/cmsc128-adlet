<?php
session_start();
include "AddGradeController.php";

class AddGradeView {
	function validateInfo($table,$sem,$sy,$cnum,$ctitle,$grades,$units,$n) {
		$link = "Location: addgrade.php?";
		$error = 0;
		
		/*check if the user has input a school year*/
		if($sy==null) {
			$link = $link."nullsy=1&";
			$error = 1;
		}
		
		/*check if the user has input the number of courses*/
		if($n==null){
			$link = $link."nulln=1&";
			$error = 1;
		}
		
		/*check if the number of courses is numeric*/
		if(!is_numeric($n)){
			$link = $link."nnotnum=1&";
			$error = 1;
		}
		
		/*check if there are null course numbers*/
		foreach($cnum as $value) {
			if($value==null){
				$link = $link."nullcnum=1&";
				$error = 1;
			}
		}
		
		/*check if there are null course titles*/
		foreach($ctitle as $value) {
			if($value==null){
				$link = $link."nullctitle=1&";
				$error = 1;
			}
		}
		
		/*check if there are null course grades*/
		foreach($grades as $value) {
			if($value==null){
				$link = $link."nullgrades=1&";
				$error = 1;
			}
		}
		
		/*check if there are null course units*/
		foreach($units as $value) {
			if($value==null){
				$link = $link."nullunits=1";
				$error = 1;
			}
		}
		
		/*check if there are negative course grades*/
		foreach($grades as $value) {
			if(($value!=null)&&($value<0)){
				$link = $link."neggrades=1&";
				$error = 1;
			}
		}
		
		/*check if there are negative course units*/
		foreach($units as $value) {
			if(($value!=null)&&($value<0)){
				$link = $link."negunits=1&";
				$error = 1;
			}
		}
		
		/*check if there are non-numeric course units*/
		foreach($units as $value) {
			if(($value!=null)&&(!is_numeric($value))){
				
					$link = $link."notnumunits=1&";
					$error = 1;
			}
		}
		
		if($error==1) header($link);//there are errors present
		else{
			$agd = new AddGradeController();
			$agd->addGrade($table,$sem,$sy,$cnum,$ctitle,$grades,$units);
		}//there are no errors
	}
	
	function requestAddGrade() {
		/*get submitted information*/
		$table = $_SESSION['modifyStdno'];
		$sem = $_POST['Semester'];
		$sy = $_POST['SchoolYear'];
		$cnum = $_POST['CourseNumber'];
		$ctitle = $_POST['CourseTitle'];
		$grades = $_POST['Grade'];
		$units = $_POST['Units'];
		$n = $_POST['N'];
		
		$addgradeview2 = new AddGradeView();
		$addgradeview2->validateInfo($table,$sem,$sy,$cnum,$ctitle,$grades,$units,$n);
	}
	
	function showMessage($flag) {
		if($flag>0) header("Location: addgrade.php?addgradesuccess='$flag'");
		else header("Location: addgrade.php?addgradenotsuccess='$flag'");
	}
}

$addgradeview = new AddGradeView();
$addgradeview->requestAddGrade();
?>