<!--
  - File Name: search.php
  - Version Information: Version 1.0
  - Date: 
  - Program Description: validation for student deletion
  -->
<?php
session_start();
include "DeleteStudentController.php";
class DeleteStudentView
{
	function requestDeleteStudent(){
		$stdno = $_SESSION['modifyStdno'];
		$deletestudentcontroller = new DeleteStudentController();
		$deletestudentcontroller->deleteStudent($stdno);
	}
	
	function showMessage($flag){
		if($flag==1) header("Location: search.php?deletesuccess=1");
		else if($flag==0) header("Location: search.php?deletenotsuccess=1");
	}
}

$deletestudentview = new DeleteStudentView(); //instance of DeleteStudentView
$deletestudentview->requestDeleteStudent();
?>