<?php
include "GradeManager.php";

class DeleteGradeController {
	function deleteGrade($stdno,$cnum,$sem,$year){
		$grademgr = new GradeManager();
		$deletesuccess = $grademgr->removeGrade($stdno,$cnum,$sem,$year);
		
		$deleteGradeView = new DeleteGradeView();
		if($deletesuccess!=0) $deleteGradeView->showMessage(1);
		else $deleteGradeView->showMessage(0);//grade not successfully deleted
	}
}

?>