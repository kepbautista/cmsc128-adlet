<!--
  - File Name: AddGradeView.php
  - Version Information: Version 1.1
  - Date: March 2, 2011 (4th Release)
  - Program Description: Validate Input Grades
  -->
<?php
session_start();
include "AddGradeController.php";

class AddGradeView {
	function validateInfo($table,$sem,$sy,$cnum,$ctitle,$grades,$units,$n) {
		$link = "Location: addgrade.php?";
		$error = 0;
		
		$connect = new dbconnection();
		$con = $connect->connectdb();
		
		/*check for duplicate subjects in one semester
		  (based on the database)
		*/
		foreach($cnum as $value) {
			$check = trim(strtoupper($value));
			$sql = "SELECT * FROM `".$table."` WHERE CourseNumber like '$check' AND Semester like '$sem' AND SchoolYear LIKE '$sy'";
			$checker = mysql_query($sql,$con);
			
			if(mysql_num_rows($checker)!=0) {
				$link = $link."duplicateDB=1&";
				$error = 1;
			}
		}
		
		$connect->closeconnection($con);
		
		/*check for duplicate subjects in one semester
		  (based on the array of inputs)*/
		$checker = array_count_values($cnum);
		foreach($checker as $value){
			if($value>1){
				$link = $link."duplicateInput=1&";
				$error = 1;
			}
		}
		
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
		if(($n!=null) && (!is_numeric($n))){
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