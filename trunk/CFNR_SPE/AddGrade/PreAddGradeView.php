<?php
session_start();
include "AddGradeController.php";

class PreAddGradeView{
	function requestPreAddGrade(){
		$sem = $_POST['Semester'];
		$schoolyr = $_POST['SchoolYear'];
		$numofsubj = $_POST['N'];
		
		$preaddgradeview2 = new PreAddGradeView();
		$preaddgradeview2->validateInfo($sem,$schoolyr,$numofsubj);
	}
	
	function validateInfo($sem,$schoolyr,$numofsubj){
		$error = 0;
		
		if($schoolyr==null){
			$_SESSION['syisnull'] = 1;
			$error = 1;
		}
		
		$year1 = substr($schoolyr,0,4);
		$year2 = substr($schoolyr,5,4);
		
		if($schoolyr!=null && (!preg_match('/([0-9]{4})\-([0-9]{4})/',$schoolyr) || strlen($schoolyr)!=9 || $year1>$year2)){
			$_SESSION['invalidsy'] = 1;
			$error = 1;
		}
		
		if($schoolyr!=null && substr($_SESSION['modifyStdno'],0,4)>$year1){
			$_SESSION['wrongsyforbatch'] = 1;
			$error = 1;
		}
		
		if($numofsubj==null){
			$_SESSION['Nisnull'] = 1;
			$error = 1;
		}
		
		if($numofsubj!=null && (!is_numeric($numofsubj) || $numofsubj<0)){
			$_SESSION['invalidN'] = 1;
			$error = 1;
		}
		
		if($error == 1){
			$_SESSION['addgradeerror'] = 1;
			$_SESSION['addgradesem'] = $sem;
			$_SESSION['addgradesy'] = $schoolyr;
			$_SESSION['addgradeN'] = $numofsubj;
		}
		else{
			$_SESSION['addgradesem'] = $sem;
			$_SESSION['addgradesy'] = $schoolyr;
			$_SESSION['addgradeN'] = $numofsubj;
			$_SESSION['addgradelevel'] = 2;
		}
		
		header("Location: ../AddGrade/");
	}
}

$preaddgradeview = new PreAddGradeView();
$preaddgradeview->requestPreAddGrade();
?>