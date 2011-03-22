<!--
  - File Name: modifygrade.php
  - Program Description: determines if the user clicked editGrade or deleteGrade
  -->
<?php
	session_start();
	if((isset($_POST['EditGrade'])) || isset($_POST['DeleteGrade'])) {
		/*get information*/
		$stdno = $_POST['StudentNumber'];
		$cnum = $_POST['CourseNumber'];
		$sem = $_POST['Semester'];
		$year = $_POST['SchoolYear'];
		
		$ctitle = $_POST['CourseTitle'];
		$grade = $_POST['Grade'];
		$units = $_POST['Units'];
		
		$link = "stdno=".$stdno."&cnum=".$cnum."&sem=".$sem."&year=".$year."&ctitle=".$ctitle."&grade=".$grade."&units=".$units;
		
		$_SESSION['stdno'] = $stdno;
		$_SESSION['cnum'] = $cnum;
		$_SESSION['ctitle'] = $ctitle;
		$_SESSION['grade'] = $grade;
		$_SESSION['units'] = $units;
		$_SESSION['sem'] = $sem;
		$_SESSION['year'] = $year;
		
		if(isset($_POST['EditGrade']))
			header("Location: EditGrade/");//the user pressed EditGrade
		else
			header("Location: DeleteGrade/DeleteGradeView.php?".$link);//the user pressed DeleteGrade
	}
	else
		header("Location: SearchStudent/");
?>