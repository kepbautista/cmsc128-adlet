<!--
  - File Name: addgrade.php
  - Version Information: Version 1.0
  - Date: March 2, 2011 (4th Release)
  - Program Description: form for adding grades
  -->
<?php
include "../dbconnection.php";
	session_start();
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
	
?>
 
<html>
<head>
	<title>CFNR Student Performance Evaluator</title>
	<link rel="stylesheet" type="text/css" href="../styles/view.css" />
</head>

<body>
	<div id='logo'><img src='../images/logo.png'/></div>

	<div id="content" style='top:0'>
	<!-- Form for determining number of subjects to be entered-->
	<form method="post" action="PreAddGradeView.php">
		<h2>ENTER GRADES FOR <?php echo $row['FirstName']." ".$row['LastName']; ?> (<?php echo $row['StudentNumber']; ?>)</h2>
		<table>
			<tr><td>Semester:</td>
				<td>
				<select type="select" name="Semester" style="align:center;"/>
					<?php
					if(isset($_SESSION['addgradesem']) && $_SESSION['addgradesem']=="1st") echo "<option value='1st' checked='checked'>1st</option>";
					else echo "<option value='1st'>1st</option>";
					if(isset($_SESSION['addgradesem']) && $_SESSION['addgradesem']=="2nd") echo "<option value='2nd' checked='checked'>2nd</option>";
					else echo "<option value='2nd'>2nd</option>";
					if(isset($_SESSION['addgradesem']) && $_SESSION['addgradesem']=="Summer") echo "<option value='Summer' checked='checked'>Summer</option>";
					else echo "<option value='Summer'>Summer</option>";
					?>
				</select>
				</td>
				<td>
					
				</td>
			</tr>
			<tr>
				<td>School Year:</td>
				<td><input type="text" name="SchoolYear" value="<?php if(isset($_SESSION['addgradesy'])) echo $_SESSION['addgradesy'];?>"/></td>
				<td>
				<?php
					if(isset($_SESSION['syisnull'])) echo "<p>Should not be empty.</p>";
					if(isset($_SESSION['invalidsy'])) echo "<p>Correct form of school year is yyyy-yyyy. ex. 2010-2011</p>";
					if(isset($_SESSION['wrongsyforbatch'])) echo "<p>School year not applicable for batch of student.</p>";
				?>
				</td>
			</tr>
			<tr>
				<td>Number of Subjects:</td>
				<td><input type="text" name="N" value="<?php if(isset($_SESSION['addgradeN'])) echo $_SESSION['addgradeN'];?>"/></td>
				<td>
				<?php
					if(isset($_SESSION['Nisnull'])) echo "<p>Should not be empty.</p>";
					if(isset($_SESSION['invalidN'])) echo "<p>Should be a nonnegative integer.</p>";
				?>
				</td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" name="Submit" value="Submit"/></td>
			</tr>
		</table>
	</form>

	<!-- Form for entering subject information-->
	<form method="post" action="AddGradeView.php">
		<?php
		if(!isset($_SESSION['addgradeerror']) && $_SESSION['addgradelevel']==2){
		echo "<h3>Enter Grades for ".$_SESSION['addgradesem']." Term, ".$_SESSION['addgradesy']."</h3>";
		echo "<table>";
			for($i=0;$i<$_SESSION['addgradeN'];$i++){
				echo "<tr>
				<td>Course Number:</td><td><input type='text' name='CourseNumber[]'/></td>
				<td>Course Title:</td><td><input type='text' name='CourseTitle[]'/></td>
				<td>Grade:</td>
				<td><select name='Grade[]'/>
					<option value='1'>1</option>
					<option value='1.25'>1.25</option>
					<option value='1.5'>1.5</option>
					<option value='1.75'>1.75</option>
					<option value='2'>2</option>
					<option value='2.25'>2.25</option>
					<option value='2.5'>2.5</option>
					<option value='2.75'>2.75</option>
					<option value='3'>3</option>
					<option value='4'>4</option>
					<option value='5'>5</option>
					<option value='S'>S</option>
					<option value='U'>U</option>
					<option value='DRP'>DRP</option>
					<option value='PASS'>PASS</option>
					<option value='FAIL'>FAIL</option>
				</td>
				<td>Units:</td><td><input type='text' name='Units[]'/></td>
				</tr>";
			}
			
		echo "</table>";
		echo "<input type='hidden' name='Semester' value='".$_SESSION['addgradesem']."'/>";
		echo "<input type='hidden' name='SchoolYear' value='".$_SESSION['addgradesy']."'/>";
		echo "<input type='hidden' name='N' value='".$_SESSION['addgradeN']."'/>";
		echo "<input type='submit' name='SubmitGrade' value='Submit Grades'/>";
		}
		?>
	</form>
	
	<?php
			/*prompts*/
			if(isset($_GET['addgradesuccess']))
				echo "<h3>Grades Successfully Added!</h3>";
			else{
				echo "<ul>";
				if(isset($_GET['addgradenotsuccess']))
					echo "<li>Student Grades are not successfully added.</li>";
				if((isset($_SESSION['duplicateInput'])) || (isset($_SESSION['duplicateDB'])))
					echo "<li>Duplication of subjects in a semester is not allowed.</li>";
				if(isset($_SESSION['nullcnum']))
					echo "<li>No Course Number should be empty.</li>";
				if(isset($_SESSION['nullctitle']))
					echo "<li>No Course Title should be empty.</li>";
				if(isset($_SESSION['nullgrades']))
					echo "<li>No Grades should be empty.</li>";
				if(isset($_SESSION['nullunits']))
					echo "<li>No Units should be empty.</li>";
				if(isset($_SESSION['neggrades']))
					echo "<li>No Grades should be negative.</li>";
				if(isset($_SESSION['negunits']))
					echo "<li>No Units should be negative.</li>";
				if(isset($_GET['wronggrade']))
					echo "<li>Wrong Grade format (It should be).</li>";
				if(isset($_SESSION['notnumunits']))
					echo "<li>Units should be numeric.</li>";
				echo "</ul>";
			}//there are input errors
		?>
	<a href="../SearchStudent/"><input type="button" name="back" value="Back to Search"/></a>
	</div>
</body>

</html>

<?php
	$_SESSION['addgradelevel'] = 1;
	if(isset($_SESSION['syisnull'])) unset($_SESSION['syisnull']);
	if(isset($_SESSION['invalidsy'])) unset($_SESSION['invalidsy']);
	if(isset($_SESSION['wrongsyforbatch'])) unset($_SESSION['wrongsyforbatch']);
	if(isset($_SESSION['Nisnull'])) unset($_SESSION['Nisnull']);
	if(isset($_SESSION['invalidN'])) unset($_SESSION['invalidN']);
	
	if(isset($_SESSION['addgradeerror'])) unset($_SESSION['addgradeerror']);
	if(isset($_SESSION['addgradesem'])) unset($_SESSION['addgradesem']);
	if(isset($_SESSION['addgradesy'])) unset($_SESSION['addgradesy']);
	if(isset($_SESSION['addgradeN'])) unset($_SESSION['addgradeN']);

	if(isset($_SESSION['duplicateInput'])) unset($_SESSION['duplicateInput']);
	if(isset($_SESSION['duplicateDB'])) unset($_SESSION['duplicateDB']);
	if(isset($_SESSION['nnotnum'])) unset($_SESSION['nnotnum']);
	if(isset($_SESSION['nullcnum'])) unset($_SESSION['nullcnum']);
	if(isset($_SESSION['nullctitle'])) unset($_SESSION['nullctitle']);
	if(isset($_SESSION['nullgrades'])) unset($_SESSION['nullgrades']);
	if(isset($_SESSION['nullunits'])) unset($_SESSION['nullunits']);
	if(isset($_SESSION['neggrades'])) unset($_SESSION['neggrades']);
	if(isset($_SESSION['negunits'])) unset($_SESSION['negunits']);
	if(isset($_SESSION['notnumunits'])) unset($_SESSION['notnumunits']);
?>