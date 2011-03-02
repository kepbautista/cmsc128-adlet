<!--
  - File Name: SearchStudentView.php
  - Version Information: Version 1.0
  - Date: 
  - Program Description: Search Student Form Validation
  -->
<?php
include("SearchStudentController.php");

class searchStudentView
{
	function validateInfo($category, $query){
		$error = 0;
		$link = "Location: search.php?";
		
		if($query==null){
			$link = $link."isnull=1&";
			$error = 1;
		}/*no query entered*/
		
		if($query!=null && !preg_match('/([0-9]{4})\-([0-9]{5})/',$query) && $category=="stdno"){
			$link = $link."wrongstdno=1&";
			$error = 1;
		}/*wrong student number format*/
		
		if($category=="fullname"){
			$firstname = strtok($query,"/");
			$middleinit = strtok("/");
			$lastname = strtok("/");
			
			if(($firstname==false) || ($middleinit==false) || ($lastname==false)){
				$link = $link."fullnameerror=1&";
				$error = 1;
			}
		}/*no first name, middle initial or last name*/
		
		if((($category=="language")||($category=="reading") || ($category=="mathematics") || ($category=="science") || ($category=="upg")) && (!is_numeric($query)) && $query!=null){
			$link = $link."notnum=1&";
			$error = 1;
		}/*non-numeric grades*/
		
		if((($category=="language")||($category=="reading") || ($category=="mathematics") || ($category=="science") || ($category=="upg")) && ($query<0)){
			$link = $link."negnum=1&";
			$error = 1;
		}/*negative grades*/
		
		if($error==1) header($link);
		else{
			$ssc = new SearchStudentController();
			$ssc->searchStudent($category,$query);
		}
	}//function for validating information
	
	function requestSearchStudent(){
		/*get submitted information*/
		$category = $_POST['category'];
		
		if($category=="fullname"){
			$query = $_POST['firstname']."/".$_POST['middleinit']."/".$_POST['lastname'];
		}//tokenize full name
		else $query = $_POST['inputbox'];
		
		$searchstudentv = new SearchStudentView();
		$searchstudentv->validateInfo($category,$query);
	}
	
	function showMessage($flag,$query){
		if($flag==0) header("Location: search.php?searchnull=1&query=".$query);//show message if student is not found
	}
}

$searchstudent = new SearchStudentView();
$searchstudent->requestSearchStudent();

?>