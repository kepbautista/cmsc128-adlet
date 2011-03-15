<?php
include '../jpgraph/jpgraph.php';
include '../jpgraph/jpgraph_bar.php';
include '../jpgraph/jpgraph_scatter.php';
include '../jpgraph/jpgraph_line.php';
include '../dbconnection.php';

class GraphManager {
	function scatterGraph() {
		$result = array();//initialize array for results
	
		/*connect to the database*/
		$connect = new dbconnection();
		$con = $connect->connectdb();
	
		$r1 = mysql_query("SELECT * FROM waitlist_students");
		
		/*check if all information are available*/
		if(is_bool($r1)) array_push($result,0);
		//empty waitlist_students table
		else {
			while($row = mysql_fetch_array($r1)){
				if($row['GWA']==0) {
					array_push($result,0);
					break;
				}//lack of GWA information
			}
		}
		
		/*close database connection*/
		$connect->closeconnection($con);
		return $result;
	}
	
	function barChart() {
		$result = array();//initialize array for results
		
		/*connect to the database*/
		$connect = new dbconnection();
		$con = $connect->connectdb();
		
		$r1 = mysql_query("SELECT * FROM waitlist_students");
		$r2 = mysql_query("SELECT * FROM upcat_passers");
		
		if(is_bool($r1)) array_push($result,0);//empty waitlist_students table
		else if(is_bool($r2)) array_push($result,0);//empty upcat_passers table
		else {
			while($row = mysql_fetch_array($r1)){
				if($row['GWA']==0) {
					array_push($result,0);
					break;
				}//lack of GWA information for waitlist_students
			}
			while($row = mysql_fetch_array($r2)){
				if($row['GWA']==0) {
					array_push($result,0);
					break;
				}//lack of GWA information for upcat_passers
			}
		}
		
		/*close database connection*/
		$connect->closeconnection($con);
		return $result;
	}
	
	/**INSUFFICIENT INFORMATION FOR LINE GRAPH**/
	function lineChart($stdno1,$stdno2){
		$result = array();//initialize result
		
		/*connect to the database*/
		$connect = new dbconnection();
		$con = $connect->connectdb();
		
		/*for 1st student*/
		$table = $stdno1."/gwa";
		$r = mysql_query("SELECT GWA FROM `".$table."`");
		if(is_bool($r)) array_push($result,1);
		//no GRADES available
		
		/*for 2nd student*/
		$table = $stdno2."/gwa";
		$r = mysql_query("SELECT GWA FROM `".$table."`");
		if(is_bool($r)) array_push($result,2);
		//no GRADES available
		
		/*close database connection*/
		$connect->closeconnection($con);
		return $result;
	}
}
?>