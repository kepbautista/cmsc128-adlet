<?php
	if((isset($_POST['EditGrade'])) || isset($_POST['DeleteGrade'])) {
		$stdno = $_POST['StudentNumber'];
		$cnum = $_POST['CourseNumber'];
		$sem = $_POST['Semester'];
		$year = $_POST['SchoolYear'];
		
		$ctitle = $_POST['CourseTitle'];
		$grade = $_POST['Grade'];
		$units = $_POST['Units'];
		
		$link = "stdno=".$stdno."&cnum=".$cnum."&sem=".$sem."&year=".$year."&ctitle=".$ctitle."&grade=".$grade."&units=".$units;
		
		if(isset($_POST['EditGrade']))
			header("Location: editgrade.php?".$link);//the user pressed EditGrade
		else
			header("Location: DeleteGradeView.php?".$link);//the user pressed DeleteGrade
	}
	else
		header("Location: search.php");
?>