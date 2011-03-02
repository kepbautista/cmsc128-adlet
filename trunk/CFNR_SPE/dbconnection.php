<!--
  - File Name: dbconnection.php
  - Version Information: Version 1.0
  - Date: February 20, 2011
  - Program Description: class that contains database connections
  -->
<?php
class dbconnection {

	function connectdb() {
		$con = mysql_connect("localhost","root");//create connection to the database
		if (!$con)
			die('Could not connect: ' . mysql_error());
			
		mysql_select_db("CFNR_SPE", $con);//select database from user
		return $con;
	}//connect to the database
	
	function closeconnection($con) {
		mysql_close($con);
	}//close database connection
	
	function searchStudents($category, $query) {
		if($category=="stdno")$result = mysql_query("SELECT * FROM waitlist_students where StudentNumber='$query'");
		else if($category=="fullname"){
			$firstname = strtok($query,"/");
			$middleinit = strtok("/");
			$lastname = strtok("/");
			
			$result = mysql_query("SELECT * FROM waitlist_students WHERE FirstName='$firstname' and MiddleInitial='$middleinit' and LastName='$lastname'");
		}
		else if($category=="language") $result = mysql_query("SELECT * FROM waitlist_students where Language='$query'");
		else if($category=="reading") $result = mysql_query("SELECT * FROM waitlist_students where Reading='$query'");
		else if($category=="mathematics") $result = mysql_query("SELECT * FROM waitlist_students where Mathematics='$query'");
		else if($category=="science") $result = mysql_query("SELECT * FROM waitlist_students where Science='$query'");
		else if($category=="upg") $result = mysql_query("SELECT * FROM waitlist_students where UPG LIKE '$query'");
		
		return $result;
	}
}

?>