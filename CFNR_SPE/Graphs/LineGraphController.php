<?php
include "GraphManager.php";

class LineGraphController{
	function lineGraph($stdno1,$stdno2){
		$graphMgr = new GraphManager();
		$success = $graphMgr->lineChart($stdno1,$stdno2);
		
		$lineGraphView = new LineGraphView();
		if(!empty($success)){
			$flag1 = 0;
			$flag2 = 0;
			
			if(in_array(1,$success)) $flag1 = 1;
			else if(in_array(2,$success)) $flag2 = 1;
		
			$lineGraphView->showMessage($flag1,$flag2);
		}
		else $lineGraphView->showMessage(0,0);//a line graph can be produced
	}
}
?>