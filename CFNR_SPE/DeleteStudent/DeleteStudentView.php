<!--
  - File Name: search.php
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
		if($flag==1) header("Location: ../SearchStudent/?deletesuccess=1");
		else if($flag==0) header("Location: ../SearchStudent/?deletenotsuccess=1");
	}
}

$deletestudentview = new DeleteStudentView(); //instance of DeleteStudentView
$deletestudentview->requestDeleteStudent();
?>