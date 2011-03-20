<!--
  - File Name: GradeManager.php
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
		
		$result = mysql_query("SELECT TableName from students_list WHERE StudentNumber='$table'");
		$stdtype = mysql_fetch_array($result);
		$stdtype = $stdtype['TableName'];
		/*Compute Running GWA*/
		$gwa = $gm->ComputeGWA($table,$con,"running",$sy);
		mysql_query("UPDATE $stdtype SET GWA='$gwa' WHERE StudentNumber LIKE '$table'");
		
		$connect->closeconnection($con);
		
		if(!in_array(0,$result)) return 1; //one or more query is not succesful
		else return 0;
	}//function for inserting grades
	
	function retrieveGrades($stdno) {
		$connect = new dbconnection();
		$con = $connect->connectdb();
	
		/*list of semesters taken*/
		$table = $stdno."/gwa";
		$sql = "SELECT * FROM `".$table."`";
		$result = mysql_query($sql,$con);
		
		$rows = mysql_num_rows($result);
		$connect->closeconnection($con);
		
		if($rows==0) return 0;
		else return 1;
	}//function for viewing grades
	
	function ViewGrades($stdno) {
		$connect = new dbconnection();
		$con = $connect->connectdb();
		
		/*list of semesters taken*/
		$table = $stdno."/gwa";
		$sql = "SELECT * FROM `".$table."`";
		$result = mysql_query($sql,$con);
		
		/*list of semesters taken*/
		$sql = "SELECT * FROM `".$table."` ORDER BY SchoolYear, Semester";
		$result = mysql_query($sql,$con);
		
		/*Display Student's Grades*/
		while($row = mysql_fetch_array($result)){
			echo "<h3 style='text-align:center;'>".$row['Semester'];
			if($row['Semester']=="1st" || $row['Semester']=="2nd") echo " Semester, ";
			else echo ", ";
			echo $row['SchoolYear']."</h3>";
			echo "<table style='margin-left:auto;margin-right:auto;' id='count_results'><th id='result'>Course Number</th>
			      <th id='result'>Course Title</th><th id='result'>Grade</th>
				  <th id='result'>Units</th><th id='result' colspan='2'>Modify</th>";
			
			$semester = $row['Semester'];
			$year = $row['SchoolYear'];
			
			$sql = "SELECT * FROM `".$stdno."` WHERE Semester='$semester' and SchoolYear='$year'";
			$view = mysql_query($sql,$con);
			
			while($data = mysql_fetch_array($view)){
				echo "<form method='post' action='../modifygrade.php'>";
				echo "<tr><td id='result'>".$data['CourseNumber']."</td>
				      <td id='result'>".$data['CourseTitle']."</td>
					  <td id='result'>".$data['Grade']."</td>
					  <td id='result'>".$data['Units']."</td>
					  <td id='result'><input type='submit' name='EditGrade' value='Edit'></td>
					  <td id='result'><input type='submit' name='DeleteGrade' value='Delete'></td>
					  <input type='hidden' name='StudentNumber' value='".$stdno."'/>
					  <input type='hidden' name='CourseNumber' value='".$data['CourseNumber']."'/>
					  <input type='hidden' name='CourseTitle' value='".$data['CourseTitle']."'/>
					  <input type='hidden' name='Grade' value='".$data['Grade']."'/>
					  <input type='hidden' name='Units' value='".$data['Units']."'/>
					  <input type='hidden' name='Semester' value='".$row['Semester']."'/>
					  <input type='hidden' name='SchoolYear' value='".$row['SchoolYear']."'/>";
				echo "</form>";
			}//display grades and subject information
			
			$sql = "SELECT * FROM `".$table."` WHERE Semester='$semester' and SchoolYear='$year'";
			$sem = mysql_query($sql,$con);
			
			while($data = mysql_fetch_array($sem)){
				if($data['GWA'] == 0) $show = "-";
				else $show = $data['GWA'];
					
				echo "<tr><td id='result'>GWA</td><td id='result'>".$show."
					 <td id='result'>&nbsp;</td><td id='result'>&nbsp;</td>
					 <td id='result'>&nbsp;</td><td id='result'>&nbsp;</td></tr>";
			}//display GWA for the semester
			
		echo "</table>";
		}
				
		$connect->closeconnection($con);
	}
	
	function removeGrade($stdno,$cnum,$sem,$year) {
		$gm = new GradeManager();
		$connect = new dbconnection();
		$con = $connect->connectdb();
		$table = $stdno."/gwa";
		
		/*delete subject from table*/
		$result = mysql_query("DELETE FROM `$stdno` WHERE CourseNumber LIKE '$cnum' AND Semester LIKE '$sem' AND SchoolYear LIKE '$year'");
		
		/*RECOMPUTE GWA*/
		/*Compute GWA for Current Semester*/
		$gwa = $gm->ComputeGWA($stdno,$con,$sem,$year);
		
		/*update GWA*/
		$sql = "UPDATE `".$table."` SET GWA='$gwa' WHERE Semester like '$sem' AND SchoolYear LIKE '$year'";
		mysql_query($sql,$con);
		
		/*Compute Running GWA*/
		$gwa = $gm->ComputeGWA($stdno,$con,"running",$year);
		$result = mysql_query("SELECT TableName FROM students_list where StudentNumber='$stdno'");
		$row = mysql_fetch_array($result);
		$table = $row['TableName'];
		mysql_query("UPDATE `".$table."` SET GWA='$gwa' WHERE StudentNumber LIKE '$stdno'");
		
		$sql = "SELECT * FROM `".$stdno."` WHERE Semester like '$sem' AND SchoolYear like '$year'";
		$check = mysql_query($sql,$con);
		
		$table = $stdno."/gwa";
		if(mysql_num_rows($check)==0)
			mysql_query("DELETE FROM `".$table."` WHERE Semester like '$sem' AND SchoolYear like '$year'");
			//Semester is not existing anymore.
		
		$connect->closeconnection($con);
		
		if($result!=0) return 1;
		else return 0;
	}
	
	function updateGrade($cnum,$ctitle,$grade,$units,$stdno,$sem,$year,$cnum1,$sem1,$year1)
	{
		$gm = new GradeManager();
		$connect = new dbconnection();
		$con = $connect->connectdb();
		$table = $stdno."/gwa";
		
		/*update information*/
		mysql_query("DELETE FROM `$stdno` WHERE CourseNumber LIKE '$cnum1' AND Semester LIKE '$sem1' AND SchoolYear LIKE '$year1'");
		$result = mysql_query("INSERT INTO `".$stdno."` VALUES ('".$cnum."', '".$ctitle."', '".$grade."', '".$units."', '$sem', '$year')");
		
		/**RECOMPUTE GWA**/
		/*Compute GWA for previous semester*/
		$sql = "SELECT * FROM `".$stdno."` WHERE Semester like '$sem1' AND SchoolYear LIKE '$year1'";
		$check = mysql_query($sql,$con);
		
		/*update GWA for previous semester*/
		if((mysql_num_rows($check)==0)) {
			mysql_query("DELETE FROM `".$table."` WHERE Semester like '$sem1' AND SchoolYear LIKE '$year1'");
			//previous semester doesn't contain grades anymore
		}
		else {
			$gwa = $gm->ComputeGWA($stdno,$con,$sem1,$year1);
			$sql = "UPDATE `".$table."` SET GWA='$gwa' WHERE Semester LIKE '$sem1' AND SchoolYear LIKE '$year1'";
			mysql_query($sql,$con);
		}//previous semester still contains grades
		
		/*Compute GWA for Current Semester*/
		$gwa = $gm->ComputeGWA($stdno,$con,$sem,$year);
		$sql = "SELECT * FROM `".$table."` WHERE Semester like '$sem' AND SchoolYear LIKE '$year'";
		$check = mysql_query($sql,$con);
		
		/*update GWA for current semester*/
		if((mysql_num_rows($check)==0))
			mysql_query("INSERT INTO `".$table."` VALUES ('$sem','$year','$gwa')"); //semester is not yet in the table
		else {
			$sql = "UPDATE `".$table."` SET GWA='$gwa' WHERE Semester like '$sem' AND SchoolYear LIKE '$year'";
			mysql_query($sql,$con);
		}
		
		/*Compute Running GWA*/
		$gwa = $gm->ComputeGWA($stdno,$con,"running",$year);
		$result = mysql_query("SELECT TableName FROM students_list where StudentNumber='$stdno'");
		$row = mysql_fetch_array($result);
		$table = $row['TableName'];
		echo $table;
		mysql_query("UPDATE `".$table."` SET GWA='$gwa' WHERE StudentNumber LIKE '$stdno'");
		
		$connect->closeconnection($con);
		
		if($result!=0) return 1;
		else return 0;
	}
}
?>
