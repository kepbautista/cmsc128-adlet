<!--
  - File Name: search.php
  - Version Information: Version 1.0
  - Program Description: form for searching students
  -->
<?php
	session_start();
	include "StudentManager.php";
	//unset($_SESSION['editStdno']);
?>
<html>
	<head>
		<title>CFNR Student Performance Evaluator</title>
		<link rel="stylesheet" type="text/css" href="styles/view.css" />
		<script type='text/javascript' src='jquery-1.4.1.min.js'></script>
		<script type='text/javascript'>
		$(document).ready(function(){
			$('#stdno').click(function(){
				$("#inputbox").show();
				$("#firstname").hide();
				$("#lastname").hide();
				$("#middleinit").hide();
				$(".fullname").hide();
			});
			
			$('#fullname').click(function(){
				$("#inputbox").hide();
				$("#firstname").show();
				$("#lastname").show();
				$("#middleinit").show();
				$(".fullname").show();
			});
			
			$('#reading').click(function(){
				$("#inputbox").show();
				$("#firstname").hide();
				$("#lastname").hide();
				$("#middleinit").hide();
				$(".fullname").hide();
			});
			
			$('#language').click(function(){
				$("#inputbox").show();
				$("#firstname").hide();
				$("#lastname").hide();
				$("#middleinit").hide();
				$(".fullname").hide();
			});
			
			$('#mathematics').click(function(){
				$("#inputbox").show();
				$("#firstname").hide();
				$("#lastname").hide();
				$("#middleinit").hide();
				$(".fullname").hide();
			});
			
			$('#science').click(function(){
				$("#inputbox").show();
				$("#firstname").hide();
				$("#lastname").hide();
				$("#middleinit").hide();
				$(".fullname").hide();
			});
			
			$('#upg').click(function(){
				$("#inputbox").show();
				$("#firstname").hide();
				$("#lastname").hide();
				$("#middleinit").hide();
				$(".fullname").hide();
			});
		});//script for categories
		</script>
	</head>
	
	<body>
		<h1>CFNR Student Performance Evaluator</h1>
		<ul id="tabs">
			<li id="tab1"><a href="add.php">Add Student</a></li>
			<li id="tab2"><a href="search.php">Search Student</a></li>
			<li id="tab3"><a href="count.php">Count Students</a></li>
		</ul>
		<div id="content">
		<h3>Search a Student</h3>
		
		<!--Form for User Inputs-->
		<form name="search"  method="post" action="SearchStudentView.php">
			Select category:
			<table style="left:auto">
			<tr>
			<td><input type="radio" name="category" value="stdno" id="stdno" checked="true"/><label for="stdno">Student Number</label></td>
			<td><input type="radio" name="category" value="fullname" id="fullname"/><label for="fullname">Full Name</label></td>
			<td><input type="radio" name="category" value="upg" id="upg"/><label for="upg">UPG</label></td>
			</tr>
			<tr>
			<td><input type="radio" name="category" value="language" id="language"/><label for="language">Language</label></td>
			<td><input type="radio" name="category" value="reading" id="reading"/><label for="reading">Reading</label></td>
			<td><input type="radio" name="category" value="mathematics" id="mathematics"/><label for="mathematics">Mathematics</label></td>
			<td><input type="radio" name="category" value="science" id="science"/><label for="science">Science</label></td>
			</tr>
			</table>
			Enter information: 
			<input type="text" name="inputbox" id="inputbox"/>
			<label class="fullname" for="firstname" style="display: none">First Name:</label><input type="text" name="firstname" id="firstname" style="display: none"/>
			<label class="fullname" for="middleinit" style="display: none">Middle Initial:</label><input type="text" name="middleinit" id="middleinit" style="display: none"/>
			<label class="fullname" for="lastname" style="display: none">Last Name:</label><input type="text" name="lastname" id="lastname" style="display: none"/>
			<br/>
			<input type="submit"  name="search" value="Search"/>
		</form>
		
		<?php
			if(isset($_GET['editsuccess']))
				echo "<h3>Student is successfully updated.</h3>";//student was updated
			else if(isset($_GET['deletesuccess']))
				echo "<h3>Student is successfully deleted.</h3>";//student was deleted
			else if(isset($_GET['deletenotsuccess']))
				echo "<h3>Student is NOT successfully deleted.</h3>";//student was not deleted
			else if(isset($_GET['addgradesuccess']))
				echo "<h3>Grade successfully added.</h3>";
			echo "<ul>";
				if(isset($_GET['isnull']))
					echo "<li>Enter query to be searched.</li>";
				if(isset($_GET['fullnameerror']))
					echo "<li>All fields are required.</li>";
				if(isset($_GET['wrongstdno']))
					echo "<li>Wrong student number format. Correct form is 2009 -12345.</li>";
				if(isset($_GET['notnum']))
					echo "<li>Should be a number.</li>";
				if(isset($_GET['negnum']))
					echo "<li>Grade should not be negative.</li>";	
				if(isset($_GET['searchnull']))
					echo "<li>No match found.</li>";
				
				echo "<form name='search' id='studentList' method='post' action='edit.php'><br/>";
				if((isset($_GET['searchsuccess']))&&(isset($_GET['query']))) {
					if($_GET['searchsuccess']!=0) {
						$display = new StudentManager();
						$display->showStudents($_GET['category'],$_GET['query']);
					}
				}
				echo "<br/></form>";
				
				if(isset($_GET['name']))
					echo $_GET['name'];
			echo "</ul>";
		?>
		<p><br/></p></div>
	</body>
</html>