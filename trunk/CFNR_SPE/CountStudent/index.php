<!--
  - File Name: CountStudent/index.php
  - Program Description: form for counting students per category
  -->
<?php
session_start();
if(!isset($_SESSION['username'])) header("Location: ../");
include "../StudentManager.php";
?>
<html>
	<head>
		<title>CFNR Student Performance Evaluator</title>
		<link rel="stylesheet" type="text/css" href="../styles/view.css" />
	</head>
<body id="countStudent">
	<div id="centerArea">
		<div id='logo'><img src='../images/logo.png'/></div>
		
		<div id='options'>
		<a href="../AddStudent/"><img src='../images/addstudent.jpg'/></a>
		<a href="../SearchStudent/"><img src='../images/searchstudent2.jpg'/></a>
		<a href="../CountStudent/"><img src='../images/countstudent.jpg'></a>
		<a href="../Graphs/"><img src='../images/viewstat.jpg'></a>
		<a href="../logout.php" id="logoutLink"><img src='../images/logout.jpg'></a>
		</div>
		
		<div id="content">
			<form name="search"  method="post" action="CountStudentView.php">
			<table>
				<th style="text-align:left; background-color: PeachPuff;">Count Students per:</th>
				<tr>
					<td><input type="radio" name="count_category" id="genderradio" value="gender" checked="true"/><label for="genderradio">Gender</label></td>
					<td><input type="radio" name="count_category" id="regionradio" value="region"/><label for="regionradio">Region</label></td>
				</tr>
			</table>
			<input type="submit" name="count" value="Count"/>
			</form>
		</div>
		
		<div style="margin-top:2%;margin-left:30%;width:50%;height:auto;">
			<?php
			$display = new StudentManager();
			if(isset($_SESSION['countGender'])){
				$display->tallyStudent($_SESSION['countGender']);
				unset($_SESSION['countGender']);
			}else if(isset($_SESSION['countRegion'])){
				$display->tallyStudent($_SESSION['countRegion']);
				unset($_SESSION['countRegion']);
			}
			?>
		</div>
	</div>
</body>
</html>