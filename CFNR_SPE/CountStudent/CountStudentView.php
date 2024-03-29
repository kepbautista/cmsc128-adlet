<!--
 - File Name: CountStudentView.php
 - Program Description: Count Student
 -->
 <?php
 session_start();
 include "CountStudentController.php";
 
 class CountStudentView
 {
	function requestCountStudent(){
		/*get submitted category*/
		$category = $_POST['count_category'];
		
		$countController = new CountStudentController();
		$countController->countStudent($category);
	}
	
	function showMessage($category){
		if($category=="Gender") $_SESSION['countGender'] = $category;
		else $_SESSION['countRegion'] = $category;
		header("Location: ../CountStudent/");
	}
 
 }
 
 $countView = new CountStudentView();
 $countView->requestCountStudent();
 ?>
 