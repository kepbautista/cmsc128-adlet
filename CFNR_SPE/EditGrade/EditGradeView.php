<!--
 - File Name: EditGradeView.php
 - Program Description: Validate Edited Grades & Courses
-->
<?php
session_start();
include "EditGradeController.php";

class EditGradeView {
	function validateInfo($cnum,$ctitle,$grade,$units,$stdno,$sem,$year,$cnum1,$sem1,$year1){
		$error = 0;
		
		$connect = new dbconnection();
		$con = $connect->connectdb();
		
		$yeara = substr($year,0,4);
		$yearb = substr($year,5,4);
		
		/*check if course number is a script that
		can harm the program*/
		if((stripos($cnum,"script") !== false)){
			if((stripos($cnum,"<") !== false) && 
			(stripos($cnum,">") !== false)){
				$cnum = "*former input is a script";
				$_SESSION['scriptcnum'] = 1;
				$error = 1;
			}
		}
		
		/*check if course title is a script that
		can harm the program*/
		if((stripos($ctitle,"script") !== false)){
			if((stripos($ctitle,"<") !== false) && 
			(stripos($ctitle,">") !== false)){
				$ctitle = "*former input is a script";
				$_SESSION['scriptcnum'] = 1;
				$error = 1;
			}
		}
		
		if($year!=null && (!preg_match('/([0-9]{4})\-([0-9]{4})/',$year) || strlen($year)!=9 || $yeara>$yearb)){
			$_SESSION['invalidsy'] = 1;
			$error = 1;
		}
		
		if($year!=null && substr($_SESSION['modifyStdno'],0,4)>$yeara){
			$_SESSION['wrongsyforbatch'] = 1;
			$error = 1;
		}
		
		/*check for duplicate subjects in one semester
		  (based on the database)
		*/
		if($cnum!=$cnum1){
		$check = trim(strtoupper($cnum));
		$sql = "SELECT * FROM `".$stdno."` WHERE CourseNumber like '$check' AND Semester like '$sem' AND SchoolYear LIKE '$year'";
		$checker = mysql_query($sql,$con);
			
		if(mysql_num_rows($checker)!=0) {
			$_SESSION['duplicateDB'] = 1;
			$error = 1;
		}
		$connect->closeconnection($con);
		}
		
		/*check if there are null values*/
		if(($cnum==null) || ($ctitle==null) || ($grade==null) ||
		   ($units==null) || ($sem==null) || ($year==null)){
			$_SESSION['isnull'] = 1;
			$error = 1;
		}
		
		/*check if grade is negative*/
		if(($grade!=null)&&($grade<0)){
			$_SESSION['neggrades'] = 1;
			$error = 1;
		}
		
		/*check if units value is negative*/
		if(($units!=null)&&($units<0)){
			$_SESSION['negunits'] = 1;
			$error = 1;
		}
		
		/*check if course units value is non-numeric*/
		if(($units!=null)&&(!is_numeric($units))){
			$_SESSION['notnum'] = 1;
			$error = 1;
		}
		
		if($error==1){
			$_SESSION['stdno'] = $stdno;
			$_SESSION['cnum'] = $cnum;
			$_SESSION['ctitle'] = $ctitle;
			$_SESSION['grade'] = $grade;
			$_SESSION['units'] = $units;
			$_SESSION['sem'] = $sem;
			$_SESSION['year'] = $year;
			header("Location: ../EditGrade/");//there are errors present
		}
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
		if($flag>0) header("Location: ../EditGrade/?editedgrade='$flag'");
		else header("Location: ../EditGrade/?notedited='$flag'");
	}//show message if editing grade is successful or not
}

$editGradeView = new EditGradeView();
$editGradeView->requestEditGrade();

?>