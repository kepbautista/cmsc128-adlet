<?php
include "GradeManager.php";

class DisplayGradeController {
	function displayGrade($stdno) {
		$grademgr = new GradeManager();
		$flag = $grademgr->retrieveGrades($stdno);
		
		$displayGradeView = new DisplayGradeView();
		return $displayGradeView->showMessage($flag);
	}
}
?>