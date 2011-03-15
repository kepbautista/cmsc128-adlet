<?php
session_start();
include "DisplayGradeView.php";
	if(!isset($_SESSION['modifyStdno'])) header("Location: ../SearchStudent/");
	$stdno = $_SESSION['modifyStdno'];
	
	$connect = new dbconnection();
	$con = $connect->connectdb();
	
	/*search for the table first then the student*/
	$result = mysql_query("SELECT TableName FROM students_list WHERE StudentNumber='$stdno'");
	$row = mysql_fetch_array($result);
	$table = $row['TableName'];
	
	$result = mysql_query("SELECT * FROM $table WHERE StudentNumber='$stdno'");
	$row = mysql_fetch_array($result);
	
	if(isset($_GET['deleted'])){
		echo "<h3>Subject and Grade Successfully deleted!</h3>";
		$flag = 1;
	}
	else if(isset($_GET['notdeleted'])){
		echo "<h3>Subject and Grade not successfully deleted!</h3>";
		$flag = 1;
	}
	else {
		$displayGrade = new DisplayGradeView();
		$flag = $displayGrade->requestDisplayGrade();
	}
?>
<html>
<head>
	<title>CFNR Student Performance Evaluator</title>
	<link rel="stylesheet" type="text/css" href="../styles/view.css" />
	<script type='text/javascript' src='../jquery-1.4.1.min.js'></script>

</head>
<body>
	<div id="displaygradediv">
	<h2>GRADES OF <?php echo $row['FirstName']." ".$row['LastName']." (".$stdno.")"; ?></h2>
	
	<?php
		if($flag==0)
			echo "<h3>Grades are not yet available.</h3>"; //the student has no recorded grades
		else{
			if($row['GWA']>0)
				echo "<h3 style='text-align: left;'>Running GWA: ".$row['GWA']."</h3>";
			$view = new GradeManager();
			$view->ViewGrades($stdno);
		}//display the grades
	?>
	<?php
	if(isset($_GET['editedgrade']))
		echo "<h3 style='text-align: center;'>Grade is successfully updated!</h3>";
	?>
	</div>
	<a href="../SearchStudent/"><h5 style="text-align:center;">Back to Search</h5></a>
	
</body>
</html>

<?php
	unset($_SESSION['stdno']);
	unset($_SESSION['cnum']);
	unset($_SESSION['ctitle']);
	unset($_SESSION['grade']);
	unset($_SESSION['units']);
	unset($_SESSION['sem']);
	unset($_SESSION['year']);
?>