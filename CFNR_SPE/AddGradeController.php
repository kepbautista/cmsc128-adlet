<?php
include "GradeManager.php";

class AddGradeController {
	function addGrade($table,$sem,$sy,$cnum,$ctitle,$grades,$units) {
		/*convert course numbers to uppercase letters*/
		$i = 0;
		foreach($cnum as $value){
			$cnum[$i] = strtoupper($value);
			$i++;
		}
	
		/*convert course titles to uppercase letters*/
		$i = 0;	
		foreach($ctitle as $value){
			$ctitle[$i] = strtoupper($value);
			$i++;
		}
		
		/*convert grades to uppercase letters*/
		$i = 0;
		foreach($grades as $value){
			$grades[$i] = strtoupper($value);
			$i++;
		}
		
		$addgradeview  = new AddGradeView();
		$grademanager = new GradeManager();
		$addgradesuccess = $grademanager->InsertGrades($table,$sem,$sy,$cnum,$ctitle,$grades,$units);
		
		echo $addgradesuccess;
		if($addgradesuccess>0) $addgradeview->showMessage($addgradesuccess);//grades successfully added
		else $addgradeview->showMessage($editsuccess);//grades unsuccessfully added
	}
}
?>