<?php
include "GradeManager.php";
class EditGradeController {
	function editGrade($cnum,$ctitle,$grade,$units,$stdno,$sem,$year,$cnum1,$sem1,$year1){
		/*transform each information to uppercase letters
		& remove white spaces before and after*/
		$cnum = trim(strtoupper($cnum));
		$ctitle = trim(strtoupper($ctitle));
		$grade = trim(strtoupper($grade));
		$units = trim(strtoupper($units));
		
		$editGradeView = new EditGradeView();
		$grademgr = new GradeManager();
		$editSuccess = $grademgr->updateGrade($cnum,$ctitle,$grade,$units,$stdno,$sem,$year,$cnum1,$sem1,$year1);
		
		if($editSuccess>0) $editGradeView->showMessage($editSuccess);
		else $editGradeView->showMessage($editSuccess);
	}
}

?>