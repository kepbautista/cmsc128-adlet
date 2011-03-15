<!--
  - File Name: AddGradeController.php
  - Version Information: Version 1.0
  - Date: March 2, 2011 (4th Release)
  - Program Description: data transformations
  -->
<?php
include "../GradeManager.php";

class AddGradeController {
	function addGrade($table,$sem,$sy,$cnum,$ctitle,$grades,$units) {
		/*convert course numbers to uppercase letters
		 & remove white spaces before and after*/
		$i = 0;
		foreach($cnum as $value){
			$cnum[$i] = trim(strtoupper($value));
			$i++;
		}
	
		/*convert course titles to uppercase letters
		& remove white spaces before and after*/
		$i = 0;	
		foreach($ctitle as $value){
			$ctitle[$i] = trim(strtoupper($value));
			$i++;
		}
		
		/*convert grades to uppercase letters
		& remove white spaces before and after*/
		$i = 0;
		foreach($grades as $value){
			$grades[$i] = trim(strtoupper($value));
			$i++;
		}
		
		$addgradeview  = new AddGradeView();
		$grademanager = new GradeManager();
		$addgradesuccess = $grademanager->InsertGrades($table,$sem,$sy,$cnum,$ctitle,$grades,$units);
		
		echo $addgradesuccess;
		$addgradeview->showMessage($addgradesuccess);
	}
}
?>