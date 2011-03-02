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
		/*transform the query to uppercase letters*/
		$query = strtoupper($query);
		
		$studentmanager = new StudentManager();
		$searchsuccess = $studentmanager->retrieveStudent($category,$query);
		
		$searchstudentv = new SearchStudentView();
		if($searchsuccess == 0) $searchstudentv->showMessage(0,$query);//unsuccessful search student
		else header("Location: search.php?searchsuccess=1&category=".$category."&query=".$query);//successful search student
	}
}
?>