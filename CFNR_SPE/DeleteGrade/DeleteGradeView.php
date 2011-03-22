<!--
  - File Name: DeleteGradeView.php
  - Program Description: validation for grade deletion
  -->
<?php
include "DeleteGradeController.php";

class DeleteGradeView {
	function requestDeleteGrade() {
		/*get needed information*/
		$stdno = $_GET['stdno'];
		$cnum = $_GET['cnum'];
		$sem = $_GET['sem'];
		$year = $_GET['year'];
		
		$deleteGradeController = new DeleteGradeController();
		$deleteGradeController->deleteGrade($stdno,$cnum,$sem,$year);
	}
	
	function showMessage($flag){
		if($flag==1) header("Location: ../DisplayGrade/?deleted=1");
		else if($flag==0) header("Location: ../DisplayGrade/?notdeleted=1");
	}//show if delete grade is successful or not
}

$deleteGradeView = new DeleteGradeView();
$deleteGradeView->requestDeleteGrade();
?>