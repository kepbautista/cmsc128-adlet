<?php
include "GraphManager.php";
class ScatterPlotController
{
	function scatterPlot(){
		$graphMgr = new GraphManager();
		$success = $graphMgr->scatterGraph();
		
		$scatterPlotView = new ScatterPlotView();
		if(in_array(0,$success))$scatterPlotView->showMessage(0);
		else $scatterPlotView->showMessage(1);//a scatter plot can be produced
	}
}
?>