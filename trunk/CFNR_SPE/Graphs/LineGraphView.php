<?php
session_start();
include "LineGraphController.php";

class LineGraphView {
	function validateInfo($stdno1,$stdno2){
		$_SESSION['stdno1'] = $stdno1;
		$_SESSION['stdno2'] = $stdno2;
		
		if(($stdno1==null) || ($stdno2==null)){
			$_SESSION['isnull'] = 1;
			$error = 1;
		}/*null student number input*/
		
		if($stdno1!=null && !preg_match('/([0-9]{4})\-([0-9]{5})/',$stdno1)) {
			$_SESSION['wrongstdno1'] = 1;
			$error = 1;
		}/*wrong student number format*/
		
		if($stdno2!=null && !preg_match('/([0-9]{4})\-([0-9]{5})/',$stdno2)) {
			$_SESSION['wrongstdno2'] = 1;
			$error = 1;
		}/*wrong student number format*/
		
		if((strlen($stdno1)!=10 && $stdno1!=null)  || (strlen($stdno2)!=10 && $stdno2!=null)) {
			$_SESSION['wronglength'] = 1;
			$error = 1;
		}/*wrong student number length*/
		
		if($error==1)
			header("Location: ../Graphs");
		else{
			$lineGraphController = new LineGraphController();
			$lineGraphController->lineGraph($stdno1,$stdno2);
		}//there are no errors
	}

	function requestLineGraph() {
		$stdno1 = $_POST['student1'];
		$stdno2 = $_POST['student2'];
		
		$lineGraphView2 = new LineGraphView();
		$lineGraphView2->validateInfo($stdno1,$stdno2);
	}
	
	function showMessage($flag1,$flag2){
		if(($flag1==1) || ($flag2==1)) {
			$link = "Location: ../Graphs?";
			
			if($flag1==1) $link = $link."stdno1=1&";
			else if($flag2==1) $link = $link."stdno2=1&";
			
			header($link);
		}//insufficient information
		else header("Location: LineGraph.php");
		//a line graph can be produced
	}
}

$lineGraphView = new LineGraphView();
$lineGraphView->requestLineGraph();
?>