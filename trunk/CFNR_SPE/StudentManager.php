<!--
  - File Name: StudentManager.php
  - Version Information: Version 1.1
  - Date: February 4, 2011 (First Release)
  - Program Description: Manipulate Database Queries
  -->
<?php
include "dbconnection.php";	//class that includes functions for database connections
		
class StudentManager
{
	//constructor
	function StudentManager(){
	}
	
	function insertStudent($stdno,$lname,$fname,$mi,$lang,$rdg,$math,$sci,$upg,$gender,$region)
	{
		$connect = new dbconnection();
		$con = $connect->connectdb();

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
		
		$table = $stdno."/gwa";
		$sql = "CREATE TABLE `".$table."`
		(
		Semester varchar(10) NOT NULL,
		SchoolYear varchar(10) NOT NULL,
		GWA float NULL
		)";
		mysql_query($sql,$con);
		
		/*insert student to database*/
		$result = mysql_query("INSERT INTO waitlist_students VALUES ('".$stdno."', '".$lname."', 
					'".$fname."', '".$mi."', '".$lang."', '".$rdg."', '".$math."', 
					'".$sci."', '".$upg."', '".$gender."', '".$region."','NULL')");
		
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
	
	function updateStudent($stdno,$lname,$fname,$mi,$lang,$rdg,$math,$sci,$upg,$gender,$region)
	{
		$connect = new dbconnection();
		$con = $connect->connectdb();

		/*update the query*/
		$result = mysql_query("UPDATE waitlist_students SET LastName='$lname', FirstName='$fname', MiddleInitial='$mi', Language='$lang', Reading='$rdg', Mathematics='$math', Science='$sci', UPG='$upg', Gender='$gender', Region='$region' WHERE StudentNumber LIKE '$stdno'");
		
		$num_of_rows = mysql_num_rows($result);
		$connect->closeconnection($con);
		
		if($result>0) return $result;
		else return $result;
	}
	
	function showStudents($category,$query)
	{
		$connect = new dbconnection();
		$con = $connect->connectdb();	
		
		/*search for the query*/
		$result = $connect->searchStudents($category, $query);
		
		/*print the table*/
		echo "<table id='result'>
			<tr><th  id='student'>Student Number</th><th  id='student'>Last Name</th><th  id='student'>First Name</th>
			<th  id='student'>Middle Initial</th><th  id='student'>Language</th><th  id='student'>Reading</th>
			<th  id='student'>Mathematics</th><th  id='student'>Science</th><th  id='student'>UPG</th>
			<th  id='student'>Gender</th><th  id='student'>Region</th>
			<th  id='student' colspan='2'>Modify</th><th id='student'>Grades</th></tr>";//table headers
			
			while($row = mysql_fetch_array($result)){
				echo "<tr>";
				echo "<td id='result'>".$row['StudentNumber']."</td>
					  <td id='result'>".$row['LastName']."</td>
					  <td id='result'>".$row['FirstName']."</td>
					  <td id='result'>".$row['MiddleInitial']."</td>
					  <td id='result'>".$row['Language']."</td>
					  <td id='result'>".$row['Reading']."</td>
					  <td id='result'>".$row['Mathematics']."</td>
					  <td id='result'>".$row['Science']."</td>
					  <td id='result'>".$row['UPG']."</td>
					  <td id='result'>".$row['Gender']."</td>
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
			}//print each row
			echo "</table>";
		
		$connect->closeconnection($con);
	}
	
	function removeStudent($stdno)
	{
		$connect = new dbconnection();
		$con = $connect->connectdb();
		
		/*delete the student from the table*/
		$result = mysql_query("DELETE FROM waitlist_students WHERE StudentNumber='".$stdno."'");
		
		/*drop table that contains student grades*/
		$sql = "DROP TABLE `".$stdno."`";
		mysql_query($sql,$con);
		
		/*drop table that contains the student's GWA (per semester)*/
		$table = $stdno."/gwa";
		$sql = "DROP TABLE `".$table."`";
		mysql_query($sql,$con);
		
		$connect->closeconnection($con);
		
		if($result>0) return 1;
		else return 0;
	}
	
	function tallyStudent($category)
	{
		$connect = new dbconnection();
		$con = $connect->connectdb();	
		
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