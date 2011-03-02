<!--
  - File Name: StudentManager.php
  - Version Information: Version 1.0
  - Date: March 2, 2011 (4th Release)
  - Program Description: Manipulate Database Queries for Grades
  -->
<?php
include "dbconnection.php";

class GradeManager {
	function ComputeGWA($stdno,$con,$sem,$year) {
		$check = array("S","U","DRP","PASS","FAIL");
		
		if($sem=="running")
			$sql = "SELECT * FROM `".$stdno."`"; //query for computing running GWA
		else
			$sql = "SELECT * FROM `".$stdno."` WHERE Semester LIKE 
				   '$sem' and SchoolYear LIKE '$year'"; //query for computing a semester's GWA
			
		$query = mysql_query($sql,$con);
		$numerator = 0; //initialize numerator
		$units = 0; //initialize number of units
		
		/*Get the summation of (grades*units) & summation of units*/
		while($row = mysql_fetch_array($query)){
			if((!in_array($row['Grade'],$check)) && (substr($row['CourseNumber'],0,3)!="PE ")) {
				$numerator = $numerator + ($row['Grade'] * $row['Units']);
				$units = $units + $row['Units'];
			}
		}
		
		/*if no units (to avoid division by zero)*/
		if($units<1)
			$units = 1;
			
		$gwa = $numerator/$units;
		
		return $gwa;
	}//function for computing General Weighted Average (GWA);
	
	function InsertGrades($table,$sem,$sy,$cnum,$ctitle,$grades,$units) {
		$gm = new GradeManager();
		$connect = new dbconnection();
		$con = $connect->connectdb();
		
		$N = count($grades);//count number of subjects;
		$result = array();
		
		/*insert grades to table*/
		for($i=0;$i<$N;$i++){
			$result[$i] = mysql_query("INSERT INTO `".$table."` VALUES ('".$cnum[$i]."', '".$ctitle[$i]."', '".$grades[$i]."', '".$units[$i]."', '$sem', '$sy')");
		}
		
		/*Compute GWA for Current Semester*/
		$gwa = $gm->ComputeGWA($table,$con,$sem,$sy);
		$student = $table."/gwa";
		$sql = "SELECT * FROM `".$student."` WHERE Semester like '$sem' AND SchoolYear LIKE '$sy'";
		$check = mysql_query($sql,$con);
		
		if((mysql_num_rows($check)==0))
			mysql_query("INSERT INTO `".$student."` VALUES ('$sem','$sy','$gwa')"); //semester is not yet in the table
		else{
			$sql = "UPDATE `".$student."` SET GWA='$gwa' WHERE Semester like '$sem' AND SchoolYear LIKE '$sy'";
			mysql_query($sql,$con);
		} //semester is already in the table
			
		
		/*Compute Running GWA*/
		$gwa = $gm->ComputeGWA($table,$con,"running",$sy);
		mysql_query("UPDATE waitlist_students SET GWA='$gwa' WHERE StudentNumber LIKE '$table'");
		
		$connect->closeconnection($con);
		
		if(!in_array(0,$result)) return 1; //one or more query is not succesful
		else return 0;
	}
}
?>
