<!--
  - File Name: BarGraphView.php
  - Program Description: show the message for Bar Graph
  -->
<?php
include 'BarGraphController.php';

class BarGraphView {
	function requestBarGraph() {
		$barGraphController = new BarGraphController();
		$barGraphController->barGraph();
	}
	
	function showMessage($flag){
		if($flag==1) header("Location: BarGraph.php");
		else if($flag==0) header("Location: ../Graphs/?barnotsuccess=1");
	}
	
}

$barGraphView = new BarGraphView();
$barGraphView->requestBarGraph();
?>