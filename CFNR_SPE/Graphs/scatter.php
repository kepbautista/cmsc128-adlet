<?php
/**File Name: scatter.php
   Program Description: Draw Scatter Plot
**/
include ("../jpgraph/jpgraph.php");
include ("../jpgraph/jpgraph_scatter.php");

$datax = array();
$datay = array();

$con = mysql_connect("localhost","cfnr_spe","adlet");//create connection to the database
		if (!$con)
			die('Could not connect: ' . mysql_error());
			
		mysql_select_db("cfnr_spe", $con);//select database from user

$result = mysql_query("SELECT * FROM waitlist_students ORDER BY RAND() LIMIT 100");

while($row = mysql_fetch_array($result)){
	array_push($datax,$row['UPG']);
	array_push($datay,$row['GWA']);
}

mysql_close($con);

$graph = new Graph(800,600,"auto");
$graph->SetScale("linlin");

$graph->img->SetMargin(40,40,40,40);        
$graph->SetShadow();

/*Set Graph Labels*/
$graph->title->Set("Correlation between UPG & GWA for Waitlist Students");
$graph->xaxis->title->Set("UPG");
$graph->yaxis->title->Set("GWA");
	
/*Set Font Styles*/
$graph->title->SetFont(FF_FONT1,FS_BOLD);
$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);

$sp1 = new ScatterPlot($datay,$datax);

$graph->Add($sp1);
$graph->Stroke();

?>