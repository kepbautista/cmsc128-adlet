<?php
include "DisplayGradeController.php";
//session_start();

class DisplayGradeView {
	function requestDisplayGrade() {
		/*get student number submitted*/
		$stdno = $_SESSION['modifyStdno'];
		
		$displayController = new DisplayGradeController();
		return $displayController->displayGrade($stdno);
	}
	
	function showMessage($flag) {
		return $flag;
	}
}
?>