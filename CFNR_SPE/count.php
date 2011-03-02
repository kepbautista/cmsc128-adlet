<!--
  - File Name: count.php
  - Version Information: Version 1.0
  - Date: February 28, 2011 (3rd Release)
  - Program Description: form for counting students per category
  -->
<?php
include "StudentManager.php";
?>
<html>
	<head>
		<title>CFNR Student Performance Evaluator</title>
		<link rel="stylesheet" type="text/css" href="styles/view.css" />
	</head>
<body id="addStudent">
<h1>CFNR Student Performance Evaluator</h1>
	<ul id="tabs">
		<li id="tab1"><a href="add.php">Add Student</a></li>
		<li id="tab2"><a href="search.php">Search Student</a></li>
		<li id="tab3"><a href="count.php">Count Students</a></li>
	</ul>
	
	<div id="content">
	<h3>Count Students</h3>
	<form name="search"  method="post" action="CountStudentView.php">
	<table>
		<th style="text-align:left; background-color: #ffffff;">Count Students per:</th>
		<tr>
			<td><input type="radio" name="count_category" id="genderradio" value="gender" checked="true"/><label for="genderradio">Gender</label></td>
		</tr>
		<tr>
			<td><input type="radio" name="count_category" id="regionradio" value="region"/><label for="regionradio">Region</label></td>
		</tr>
	</table>
	<br/><input type="submit" name="count" value="Count"/>
	</form>
	
	<?php
	if(isset($_GET['counted'])) {
		$display = new StudentManager();
		$display->tallyStudent($_GET['counted']);
	}
	?>
	</div>
</body>
</html>