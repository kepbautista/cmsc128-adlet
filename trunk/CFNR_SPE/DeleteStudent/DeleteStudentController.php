<!--
  - File Name: DeleteStudentController.php
  - Program Description: show message for student deletion
  -->
<?php
include "../StudentManager.php";

class DeleteStudentController
{
	function deleteStudent($stdno){
		$studentmgr = new StudentManager();
		$table = $studentmgr->determineTable($stdno);
		$deletesuccess = $studentmgr->removeStudent($table,$stdno);
		
		$deletestudentview = new DeleteStudentView();
		if($deletesuccess==1)$deletestudentview->showMessage(1);
		else $deletestudentview->showMessage(0);//student not successfully deleted
	}
}
?>