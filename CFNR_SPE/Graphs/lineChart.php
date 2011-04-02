<?php
/**File Name: lineChart.php
   Program Description: Draw Line Graph
**/
session_start();
include '../jpgraph/jpgraph.php';
include '../jpgraph/jpgraph_line.php';

$student1 = array();//initialize list of gwa per semester
$student2 = array();

$stdno1 = $_SESSION['stdno1'];
$stdno2 = $_SESSION['stdno2'];

$con = mysql_connect("localhost","cfnr_spe","adlet");//create connection to the database
if (!$con)
	die('Could not connect: ' . mysql_error());
		
mysql_select_db("cfnr_spe", $con);//select database from user

$table1 = $stdno1."/gwa";
$table2 = $stdno2."/gwa";

/*For Student 1*/
$result = mysql_query("SELECT GWA FROM `".$table1."` ORDER BY SchoolYear,Semester");

/*list GWA for Student 1*/
while($row = mysql_fetch_array($result))
	array_push($student1,$row['GWA']);

/*For Student 2*/
$result = mysql_query("SELECT GWA FROM `".$table2."` ORDER BY SchoolYear,Semester");

/*list GWA for Student 2*/
while($row = mysql_fetch_array($result))
	array_push($student2,$row['GWA']);	
	
mysql_close($con);
	
// Create the graph. These two calls are always required
$graph = new Graph(800,600,"auto");
$graph->SetScale("textlin");
	
// Create the linear plot
/*for Student 1*/
$p1=new LinePlot($student1);
$p1->mark->SetType(MARK_FILLEDCIRCLE);
$p1->mark->SetFillColor("red");
$p1->SetLegend($stdno1);
$p1->SetColor("blue");

/*for Student 2*/
$p2=new LinePlot($student2);
$p2->mark->SetType(MARK_FILLEDCIRCLE);
$p2->mark->SetFillColor("green");
$p2->SetLegend($stdno2);
$p2->SetColor("red");

/*Set Graph Labels*/
$graph->title->Set("One-on-One Comparison of GWA Trend\n(".$stdno1." and ".$stdno2.")");
$graph->yaxis->title->Set("GWA per Semester Taken");
$graph->xaxis->title->Set("Number of Semesters Taken");

/*Set Font Styles*/
$graph->title->SetFont(FF_FONT1,FS_BOLD);
$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);

// Add the plot to the graph
$graph->Add($p1);
$graph->Add($p2);
	
// Display the graph
$graph->Stroke();
?>