<!--
  - File Name: dbconnection.php
  - Program Description: class that contains database connections
  -->
<?php
class dbconnection {

	function connectdb() {
		$con = mysql_connect("localhost","cfnr_spe","adlet");//create connection to the database
		if (!$con)
			die('Could not connect: ' . mysql_error());
			
		mysql_select_db("cfnr_spe", $con);//select database from user
		return $con;
	}//connect to the database
	
	function closeconnection($con) {
		mysql_close($con);
	}//close database connection
	
	function searchStudents($category, $query) {
		$numrows2=-1;
		if($category=="stdno"){
			$row = mysql_query("SELECT TableName FROM students_list WHERE StudentNumber='$query'");
			$row = mysql_fetch_array($row);
			$table = $row['TableName'];
			$result = mysql_query("SELECT * FROM $table where StudentNumber='$query'");
		}
		else if($category=="fullname"){
			$firstname = strtok($query,"/");
			$middleinit = strtok("/");
			$lastname = strtok("/");
			
			$result = mysql_query("SELECT * FROM waitlist_students WHERE FirstName='$firstname' and MiddleInitial='$middleinit' and LastName='$lastname'");
			$result2 = mysql_query("SELECT * FROM upcat_passers WHERE FirstName='$firstname' and MiddleInitial='$middleinit' and LastName='$lastname'");
			
			$numrows2 = mysql_num_rows($result2);
		}
		else if($category=="language") $result = mysql_query("SELECT * FROM waitlist_students where Language='$query'");
		else if($category=="reading") $result = mysql_query("SELECT * FROM waitlist_students where Reading='$query'");
		else if($category=="mathematics") $result = mysql_query("SELECT * FROM waitlist_students where Mathematics='$query'");
		else if($category=="science") $result = mysql_query("SELECT * FROM waitlist_students where Science='$query'");
		else if($category=="upg") $result = mysql_query("SELECT * FROM waitlist_students where UPG LIKE '$query'");
		
		if($numrows2>0) return $result2;
		else return $result;
	}
}

?>