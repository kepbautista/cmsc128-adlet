<!--
  - File Name: StudentManager.php
  - Version Information: Version 1.2
  - Date: March 2, 2011 (4th Release)
  - Program Description: Manipulate Database Queries
  -->
<?php
include "dbconnection.php";	//class that includes functions for database connections
		
class StudentManager
{
	//constructor
	function StudentManager(){
	}
	
	function determineTable($stdno){
		$connect = new dbconnection();
		$con = $connect->connectdb();
		
		$result = mysql_query("SELECT TableName FROM students_list where StudentNumber='$stdno'");
		$table = mysql_fetch_array($result);
		
		$connect->closeconnection($con);
		
		return $table['TableName'];
	}
	
	function insertStudent($stdtype,$stdno,$lname,$fname,$mi,$lang,$rdg,$math,$sci,$upg,$gender,$region)
	{
		$connect = new dbconnection();
		$con = $connect->connectdb();
		
		/*make value of $stdtype the name of the table to which the student should be inserted*/
		if($stdtype=="waitlisted") $stdtype="waitlist_students";
		else if($stdtype=="upcatpasser") $stdtype="upcat_passers";
		
		/*create index for student for easy searching*/
		$result = mysql_query("INSERT INTO students_list VALUES('".$stdno."','".$stdtype."')");
		
		if($result>0){
			/*create table for student's grades*/
			$sql = "CREATE TABLE `".$stdno."`
			(
			`CourseNumber` varchar(20) NOT NULL,
			`CourseTitle` varchar(100) NOT NULL,
			`Grade` varchar(4) NOT NULL,
			`Units` float NOT NULL,
			`Semester` varchar(30) NOT NULL,
			`SchoolYear` varchar(20) NOT NULL
			)";
			mysql_query($sql,$con);
		
			/*create table for student's GWA (per semester)*/
			$table = $stdno."/gwa";
			$sql = "CREATE TABLE `".$table."`
			(
			Semester varchar(10) NOT NULL,
			SchoolYear varchar(10) NOT NULL,
			GWA float NULL
			)";
			mysql_query($sql,$con);
		
			/*insert student to database*/
			if($stdtype=="waitlist_students") $sql = "INSERT INTO waitlist_students VALUES ('".$stdno."', '".$lname."', 
						'".$fname."', '".$mi."', '".$lang."', '".$rdg."', '".$math."',
						'".$sci."', '".$upg."', '".$gender."', '".$region."','NULL')";
			else if($stdtype=="upcat_passers") $sql = "INSERT INTO upcat_passers VALUES ('".$stdno."', '".$lname."', 
						'".$fname."', '".$mi."', '".$gender."', '".$region."','NULL')";
			mysql_query($sql);
			mysql_query($sql);
		}
		
		$connect->closeconnection($con);
		
		if($result>0) return 1;
		else return 0;
	}
	
	function retrieveStudent($category, $query)
	{
		$connect = new dbconnection();
		$con = $connect->connectdb();	
		
		/*search for the query*/
		$result = $connect->searchStudents($category, $query);
		
		$number_of_rows = mysql_num_rows($result);
		$connect->closeconnection($con);
		
		if($number_of_rows==0) return 0;
		else{
			return 1;
		}
	}
	
	function updateStudent($stdtype,$stdno,$lname,$fname,$mi,$lang,$rdg,$math,$sci,$upg,$gender,$region)
	{
		$connect = new dbconnection();
		$con = $connect->connectdb();
		
		/*update the query*/
		if(stdtype=="waitlist_students") $result = mysql_query("UPDATE $stdtype SET LastName='$lname', FirstName='$fname', MiddleInitial='$mi', Language='$lang', Reading='$rdg', Mathematics='$math', Science='$sci', UPG='$upg', Gender='$gender', Region='$region' WHERE StudentNumber LIKE '$stdno'");
		else $result = mysql_query("UPDATE $stdtype SET LastName='$lname', FirstName='$fname', MiddleInitial='$mi', Gender='$gender', Region='$region' WHERE StudentNumber LIKE '$stdno'");
		
		//$num_of_rows = mysql_num_rows($result);
		$connect->closeconnection($con);
		
		return $result;
	}
	
	function showStudents($category,$query)
	{
		$connect = new dbconnection();
		$con = $connect->connectdb();	
		
		/*search for the query*/
		$result = $connect->searchStudents($category, $query);
		
		/*print the table*/
		$row = mysql_fetch_array($result);
		echo "<table id='result'>
			<tr><th  id='student'>Student Number</th><th  id='student'>Last Name</th><th  id='student'>First Name</th>
			<th  id='student'>Middle Initial</th>";
		if(isset($row['Language'])) echo "<th  id='student'>Language</th><th  id='student'>Reading</th>
			<th  id='student'>Mathematics</th><th  id='student'>Science</th><th  id='student'>UPG</th>";
		echo "<th  id='student'>Gender</th><th  id='student'>Region</th>
			<th  id='student' colspan='2'>Modify</th><th id='student' colspan='2'>Grades</th></tr>";//table headers
			
			do{
				echo "<tr>";
				echo "<td id='result'>".$row['StudentNumber']."</td>
					  <td id='result'>".$row['LastName']."</td>
					  <td id='result'>".$row['FirstName']."</td>
					  <td id='result'>".$row['MiddleInitial']."</td>";
				if(isset($row['Language'])){
					  echo "<td id='result'>".$row['Language']."</td>
					  <td id='result'>".$row['Reading']."</td>
					  <td id='result'>".$row['Mathematics']."</td>
					  <td id='result'>".$row['Science']."</td>
					  <td id='result'>".$row['UPG']."</td>";
				}
				echo "<td id='result'>".$row['Gender']."</td>
					  <td id='result'>".$row['Region']."</td>
					  <td><input type='button' name='edit' id='edit".$row['StudentNumber']."' value='edit' title='".$row['StudentNumber']."'/></td>
					  <td><input type='button' name='edit' id='delete".$row['StudentNumber']."' value='delete' title='".$row['StudentNumber']."'/></td>
					  <td id='result'><input type='button' name='edit' id='addgrade".$row['StudentNumber']."' value='addgrade' title='".$row['StudentNumber']."'/></td>";
				echo "</tr>";
				echo "<script>$('#edit".$row['StudentNumber']."').click(function(){
									$.post('modify.php', {stdno: $('#edit".$row['StudentNumber']."').attr('title')});
									location.href = 'edit.php';
								});
							  $('#delete".$row['StudentNumber']."').click(function(){
									$.post('modify.php', {stdno: $('#delete".$row['StudentNumber']."').attr('title')});
									location.href = 'DeleteStudentView.php';
								});
								$('#addgrade".$row['StudentNumber']."').click(function(){
									$.post('modify.php', {stdno: $('#addgrade".$row['StudentNumber']."').attr('title')});
									location.href = 'addgrade.php';
								});
					  </script>";
			}while($row = mysql_fetch_array($result));//print each row
			echo "</table>";
		
		$connect->closeconnection($con);
	}
	
	function removeStudent($table,$stdno)
	{
		$connect = new dbconnection();
		$con = $connect->connectdb();
		
		/*delete the student from the table*/
		mysql_query("DELETE FROM $table WHERE StudentNumber='$stdno'");
		
		/*drop table that contains student grades*/
		$sql = "DROP TABLE `".$stdno."`";
		mysql_query($sql,$con);
		
		/*drop table that contains the student's GWA (per semester)*/
		$table = $stdno."/gwa";
		$sql = "DROP TABLE `".$table."`";
		mysql_query($sql,$con);
		
		/*drop the student from the students_list table*/
		$result = mysql_query("DELETE FROM students_list WHERE StudentNumber='$stdno'");
		
		$connect->closeconnection($con);
		
		if($result>0) return 1;
		else return 0;
	}
	
	function tallyStudent($category)
	{
		$connect = new dbconnection();
		$con = $connect->connectdb();	
		
		/*determine which category to count*/
		if($category=='Gender') 
			$count = array("F","M");
		else if($category=='Region') {
			$count = array("NCR",1,"CAR",2,3,"4-A","4-B",5,6);
			$count1 = array(7,8,9,10,11,12,"CARAGA","ARMM");
		}
		
		echo "<table id='count_results'><tr><th id='student'>".$category."</th><th id='student'>Frequency</th></tr>";
		foreach($count as $value){		
			
			/*search for all members of the category*/
			$result = mysql_query("SELECT * FROM waitlist_students WHERE ".$category."='".$value."'");
			$frequency = mysql_num_rows($result);
			echo "<tr>";
			echo "<td id='result'>".$value."</td><td id='result'>".$frequency."</td>";
			echo "</tr>";
		}
		echo "</table>";
		
		if($category=='Region') {
			echo "<table id='count_results'><tr><th id='student'>".$category."</th><th id='student'>Frequency</th></tr>";
		
			foreach($count1 as $value){
			/*search for all members of the category*/
			$result = mysql_query("SELECT * FROM waitlist_students WHERE ".$category."='".$value."'");
			$frequency = mysql_num_rows($result);
			echo "<tr>";
			echo "<td id='result'>".$value."</td><td id='result'>".$frequency."</td>";
			echo "</tr>";
			}
			
			echo "</table>";
		}
		
		$connect->closeconnection($con);
	}
}
?>