<?php
  include '../jpgraph/jpgraph.php';
  include '../jpgraph/jpgraph_bar.php';

	$con = mysql_connect("localhost","root");//create connection to the database
	if (!$con)
		die('Could not connect: ' . mysql_error());
			
	mysql_select_db("CFNR_SPE", $con);//select database from user
	
	$batch = array();
	
	$result1 = mysql_query("SELECT DISTINCT Batch from waitlist_students");
	$result2 = mysql_query("SELECT DISTINCT Batch from upcat_passers");
	
	/*List of Batches available*/
	while($row = mysql_fetch_array($result1))
		array_push($batch,$row['Batch']);
	while($row = mysql_fetch_array($result2)){
		if(!in_array($row['Batch'],$batch))
			array_push($batch,$row['Batch']);
	}
	sort($batch);
  
	$average = array();
    foreach($batch as $value){
		$sql = "SELECT GWA FROM waitlist_students where Batch=$value
				UNION ALL SELECT GWA FROM upcat_passers where Batch=$value";
		$result = mysql_query($sql,$con);
		
		$num = mysql_num_rows($result);
		$numerator = 0;
		while($row = mysql_fetch_array($result))
			$numerator  = $numerator + $row['GWA'];
			
		array_push($average,round(($numerator/$num),2));
    }
	mysql_close($con);
	
	$graph = new Graph(800,600);
	$graph->SetScale('textlin',0,5);
	
	$graph->xaxis->SetTickLabels($batch);
	$plot = new BarPlot($average);
	
	$graph->Add($plot);
	
	/*Set Graph Labels*/
	$graph->title->Set("Average GWA Per Batch");
	$graph->xaxis->title->Set("Batch");
	$graph->yaxis->title->Set("Average GWA");
	
	/*Set Font Styles*/
	$graph->title->SetFont(FF_FONT1,FS_BOLD);
	$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
	$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);
	
	$graph->Stroke();
?>