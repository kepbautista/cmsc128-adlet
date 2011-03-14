<!--
  - File Name: SearchStudentController.php
  - Version Information: Version 1.0
  - Date:
  - Program Description: search data transformations
  -->
<?php
include("StudentManager.php");

class SearchStudentController
{
	//constructor
	function SearchStudentController(){
	}
	
	function searchStudent($category,$query)
	{
		/*transform the query to uppercase letters
		& remove white spaces before and after*/
		$query = trim(strtoupper($query));
		
		$studentmanager = new StudentManager();
		$searchsuccess = $studentmanager->retrieveStudent($category,$query);
		
		$searchstudentv = new SearchStudentView();
		if($searchsuccess == 0) $searchstudentv->showMessage(0,null,null);//unsuccessful search student
		else  $searchstudentv->showMessage(1,$category,$query);//unsuccessful search student
	}
}
?>