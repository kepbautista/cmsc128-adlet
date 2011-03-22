<!--
  - File Name: ScatterPlotView.php
  - Program Description: show the message for Scatter Plot
  -->
<?php
include 'ScatterPlotController.php';

class ScatterPlotView {
	function requestScatterPlot(){
		$scatterPlotController = new ScatterPlotController();
		$scatterPlotController->scatterPlot();
	}
	
	function showMessage($flag){
		if($flag==1) header("Location: ScatterPlot.php");
		else if($flag==0) header("Location: ../Graphs/?scatternotsuccess=1");//can' show scatter plot
	}
}

$scatterPlotView = new ScatterPlotView();
$scatterPlotView->requestScatterPlot();
?>