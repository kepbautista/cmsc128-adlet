<!--
  - File Name: SearchStudentView.php
  - Version Information: Version 1.0
  - Date: 
  - Program Description: Search Student Form Validation
  -->
<?php
session_start();
include("SearchStudentController.php");

class searchStudentView
{
	function validateInfo($category, $query){
		$error = 0;
		
		if($query==null){
			$_SESSION['isnull'] = 1;
			$error = 1;
		}/*no query entered*/
		
		if($query!=null && $category=="stdno" && (!preg_match('/([0-9]{4})\-([0-9]{5})/',$query)|| strlen($query)!=10)){
			$_SESSION['wrongstdno'] = 1;
			$error = 1;
		}/*wrong student number format*/
		
		if($category=="fullname"){
			$firstname = strtok($query,"/");
			$middleinit = strtok("/");
			$lastname = strtok("/");
			
			if(($firstname==false) || ($middleinit==false) || ($lastname==false)){
				$_SESSION['fullnameerror'] = 1;
				$error = 1;
			}
		}/*no first name, middle initial or last name*/
		
		if((($category=="language")||($category=="reading") || ($category=="mathematics") || ($category=="science") || ($category=="upg")) && (!is_numeric($query)) && $query!=null){
			$_SESSION['notnum'] = 1;
			$error = 1;
		}/*non-numeric grades*/
		
		if((($category=="language")||($category=="reading") || ($category=="mathematics") || ($category=="science") || ($category=="upg")) && ($query<0)){
			$_SESSION['negnum'] = 1;
			$error = 1;
		}/*negative grades*/
		
		if($error==1) header("Location: ../SearchStudent/");
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
	
	function showMessage($flag,$category,$query){
		if($flag==0){
			$_SESSION['searchnull'] = 1;
			header("Location: ../SearchStudent/"); //show message if student is not found
		}else{
			$_SESSION['searchsuccess'] = 1;
			$_SESSION['category'] = $category;
			$_SESSION['query'] = $query;
			header("Location: ../SearchStudent/"); //successful search student
		}
	}
}

$searchstudent = new SearchStudentView();
$searchstudent->requestSearchStudent();

?>