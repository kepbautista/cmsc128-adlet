<?php
include "EditGradeController.php";

class EditGradeView {
	function validateInfo($cnum,$ctitle,$grade,$units,$stdno,$sem,$year,$cnum1,$sem1,$year1){
		$link = "Location: editgrade.php?stdno=".$stdno.
		        "&cnum=".$cnum."&ctitle=".$ctitle.
				"&grade=".$grade."&units=".$units.
				"&sem=".$sem."&year=".$year."&";
		
		$error = 0;
		
		$connect = new dbconnection();
		$con = $connect->connectdb();
		
		/*check for duplicate subjects in one semester
		  (based on the database)
		*/
		if($cnum!=$cnum1){
		$check = trim(strtoupper($cnum));
		$sql = "SELECT * FROM `".$stdno."` WHERE CourseNumber like '$check' AND Semester like '$sem' AND SchoolYear LIKE '$year'";
		$checker = mysql_query($sql,$con);
			
		if(mysql_num_rows($checker)!=0) {
			$link = $link."duplicateDB=1&";
			$error = 1;
		}
		$connect->closeconnection($con);
		}
		
		/*check if there are null values*/
		if(($cnum==null) || ($ctitle==null) || ($grade==null) ||
		   ($units==null) || ($sem==null) || ($year==null)){
			$link = $link."isnull=1&";
			$error = 1;
		}
		
		/*check if grade is negative*/
		if(($grade!=null)&&($grade<0)){
			$link = $link."neggrades=1&";
			$error = 1;
		}
		
		/*check if units value is negative*/
		if(($units!=null)&&($units<0)){
			$link = $link."negunits=1&";
			$error = 1;
		}
		
		/*check if course units value is non-numeric*/
		if(($units!=null)&&(!is_numeric($units))){
			$link = $link."notnum=1&";
			$error = 1;
		}
		
		if($error==1) header($link);//there are errors present
		else{
			$editGradeController = new EditGradeController();
			$editGradeController->editGrade($cnum,$ctitle,$grade,$units,$stdno,$sem,$year,$cnum1,$sem1,$year1);
		}//there are no errors
	}
	
	function requestEditGrade(){
		/*get needed information*/
		$cnum = $_POST['CourseNumber'];
		$ctitle = $_POST['CourseTitle'];
		$grade = $_POST['Grade'];
		$units = $_POST['Units'];
		$stdno = $_POST['StudentNumber'];
		$sem = $_POST['Semester'];
		$year = $_POST['SchoolYear'];
		
		$cnum1 = $_POST['CourseNumber1'];
		$ctitle1 = $_POST['CourseTitle1'];
		$grade1 = $_POST['Grade1'];
		$units1 = $_POST['Units1'];
		$sem1 = $_POST['Semester1'];
		$year1 = $_POST['SchoolYear1'];
		
		$editGradeView2 = new EditGradeView();
		$editGradeView2->validateInfo($cnum,$ctitle,$grade,$units,$stdno,$sem,$year,$cnum1,$sem1,$year1);
	}
	
	function showMessage($flag){
		if($flag>0) header("Location: editgrade.php?editedgrade='$flag'");
		else header("Location: editgrade.php?notedited='$flag'");
	}//show message if editing grade is successful or not
}

$editGradeView = new EditGradeView();
$editGradeView->requestEditGrade();

?>