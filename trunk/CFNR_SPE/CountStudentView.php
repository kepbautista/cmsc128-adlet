<!--
 - File Name: CountStudentView.php
 - Version Information: Version 1.0
 - Date: February 28, 2011 (3rd Release)
 - Program Description: Count Student
 -->
 <?php
 include "CountStudentController.php";
 
 class CountStudentView
 {
	function requestCountStudent() {
		/*get submitted category*/
		$category = $_POST['count_category'];
		
		$countController = new CountStudentController();
		$countController->countStudent($category);
	}
	
	function showMessage($category) {
		header("Location: count.php?counted=".$category);
	}
 
 }
 
 $countView = new CountStudentView();
 $countView->requestCountStudent();
 ?>
 