<!--
  - File Name: search.php
  - Version Information: Version 1.0
  - Program Description: form for searching students
  -->
<?php
	session_start();
	if(!isset($_SESSION['username'])) header("Location: ../");
	$_SESSION['addgradelevel'] = 1;
	include "../StudentManager.php";
	unset($_SESSION['modifyStdno']);
?>
<html>
	<head>
		<title>CFNR Student Performance Evaluator</title>
		<link rel="stylesheet" type="text/css" href="../styles/view.css" />
		<script type='text/javascript' src='../jquery-1.4.1.min.js'></script>
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
	
	<body id='searchStudent'>
		<div id='logo'>
		<img src='../images/logo.png'/>
		</div>
	
		<div id='options'>
		<a href="../AddStudent/"><img src='../images/addstudent.jpg'/></a>
		<a href="../SearchStudent/"><img src='../images/searchstudent.jpg'/></a>
		<a href="../CountStudent/"><img src='../images/countstudent2.jpg'></a>
		<a href="../Graphs/"><img src='../images/viewstat.jpg'></a>
		</div>
		
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
				if(isset($_SESSION['isnull']))
					echo "<li>Enter query to be searched.</li>";
				if(isset($_SESSION['fullnameerror']))
					echo "<li>All fields are required.</li>";
				if(isset($_SESSION['wrongstdno']))
					echo "<li>Wrong student number format. Correct form is 2009 -12345.</li>";
				if(isset($_SESSION['notnum']))
					echo "<li>Should be a number.</li>";
				if(isset($_SESSION['negnum']))
					echo "<li>Grade should not be negative.</li>";	
				if(isset($_SESSION['searchnull']))
					echo "No match found.";
				
				echo "<div style='position:absolute; top:240px; left:5px;'>";
				echo "<form name='search' id='studentList' method='post' action='edit.php'><br/>";
				if((isset($_SESSION['searchsuccess']))&&(isset($_SESSION['query']))) {
					if($_SESSION['searchsuccess']!=0) {
						$display = new StudentManager();
						$display->showStudents($_SESSION['category'],$_SESSION['query']);
					}
				}
				echo "</div>";
				echo "<br/></form>";
			echo "</ul>";
		?>
		<p><br/></p></div>
	</body>
</html>

<?php
	if(isset($_SESSION['isnull'])) unset($_SESSION['isnull']);
	if(isset($_SESSION['fullnameerror'])) unset($_SESSION['fullnameerror']);
	if(isset($_SESSION['wrongstdno'])) unset($_SESSION['wrongstdno']);
	if(isset($_SESSION['notnum'])) unset($_SESSION['notnum']);
	if(isset($_SESSION['negnum'])) unset($_SESSION['negnum']);
	if(isset($_SESSION['searchnull'])) unset($_SESSION['searchnull']);
	if(isset($_SESSION['searchsuccess'])) unset($_SESSION['searchsuccess']);
	
	if(isset($_SESSION['category'])) unset($_SESSION['category']);
	if(isset($_SESSION['query'])) unset($_SESSION['query']);
	
	if(isset($_SESSION['modifyStdno'])) unset($_SESSION['modifyStdno']);
?>