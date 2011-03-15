<?php
include "GraphManager.php";

class BarGraphController {

	function barGraph(){
		$graphMgr = new GraphManager();
		$success = $graphMgr->barChart();
		
		$barGraphView = new BarGraphView();
		if(in_array(0,$success))$barGraphView->showMessage(0);
		else $barGraphView->showMessage(1);//a bar graph can be produced
	}
}
?>