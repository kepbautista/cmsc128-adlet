<!--
  - File Name: ControllerStudentView.php
  - Version Information: Version 1.0
  - Date:
  - Program Description: show message for counting students
  -->
<?php
include "StudentManager.php";

class CountStudentController
{
	function countStudent($category) {
		/*transform the category to uppercase first letter*/
		$category = ucfirst($category);
	
		$studentmgr = new StudentManager();
		$countsuccess = $studentmgr->tallyStudent($category);
		
		$countView = new CountStudentView();
		$countView->showMessage($category);
	}
	
}
?>