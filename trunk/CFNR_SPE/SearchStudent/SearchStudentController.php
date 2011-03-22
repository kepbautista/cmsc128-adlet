<!--
  - File Name: SearchStudentController.php
  - Program Description: search data transformations
  -->
<?php
include("../StudentManager.php");

class SearchStudentController
{
	//constructor
	function SearchStudentController(){
	}
	
	function searchStudent($category,$query)
	{
		/*transform each information to uppercase letters,
		remove white spaces before and after,
		and look for characters which can harm the program*/
		$search = array("<",">");
		$replace = array("bawal1","bawal2");
		$query = str_replace($search,$replace,trim(strtoupper($query)));
		
		$studentmanager = new StudentManager();
		$searchsuccess = $studentmanager->retrieveStudent($category,$query);
		
		$searchstudentv = new SearchStudentView();
		if($searchsuccess == 0) $searchstudentv->showMessage(0,null,null);//unsuccessful search student
		else  $searchstudentv->showMessage(1,$category,$query);//unsuccessful search student
	}
}
?>