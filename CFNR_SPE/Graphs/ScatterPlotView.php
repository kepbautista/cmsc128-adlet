<?php
include 'ScatterPlotController.php';

class ScatterPlotView {
	function requestScatterPlot(){
		$scatterPlotController = new ScatterPlotController();
		$scatterPlotController->scatterPlot();
	}
	
	function showMessage($flag){
		if($flag==1) header("Location: ScatterPlot.php");
		else if($flag==0) header("Location: graphs.php?scatternotsuccess=1");
	}
}

$scatterPlotView = new ScatterPlotView();
$scatterPlotView->requestScatterPlot();
?>