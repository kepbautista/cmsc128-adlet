<!--
  - File Name: addgrade.php
  - Version Information: Version 1.0
  - Date: March 2, 2011 (4th Release)
  - Program Description: form for adding grades
  -->
<?php
include "dbconnection.php";
	session_start();
	if(!isset($_SESSION['modifyStdno'])) header("Location: search.php");
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

<body>
	<div id="addgradediv">
	<!-- Form for determining number of subjects to be entered-->
	<form method="post" action="<?php $ind=$_SERVER['PHP_SELF']; echo $ind;?>">
		<h3>ENTER GRADES FOR <?php echo $row['FirstName']." ".$row['LastName']; ?> (<?php echo $row['StudentNumber']; ?>)</h3>
		<?php
		if(!isset($_POST['N'])){
		echo '<table>
			<tr><td>Semester:</td>
				<td>
				<select type="select" name="Semester" style="align:center;"/>
					<option value="1st">1st</option>
					<option value="2nd">2nd</option>
					<option value="Summer">Summer</option>
				</select>
				</td>
			</tr>
			<tr><td>School Year:</td><td><input type="text" name="SchoolYear"/></td></tr>
			<tr><td>Number of Subjects:</td><td><input type="text" name="N"/></td></tr>
			<tr><td colspan="2"><input type="submit" name="Submit" value="Submit"/></td></tr>
		</table>';
		}
		?>
	</form>

	<!-- Form for entering subject information-->
	<form method="post" action="AddGradeView.php">
		<?php
		if(isset($_POST['N'])){
		echo "<h3>Enter Grades for ".$_POST['Semester']." Term, ".$_POST['SchoolYear']."</h3>";
		echo "<table>";
			for($i=0;$i<$_POST['N'];$i++) {
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
		echo "<input type='hidden' name='Semester' value='".$_POST['Semester']."'/>";
		echo "<input type='hidden' name='SchoolYear' value='".$_POST['SchoolYear']."'/>";
		echo "<input type='hidden' name='N' value='".$_POST['N']."'/>";
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
				if((isset($_GET['duplicateInput'])) || (isset($_GET['duplicateDB'])))
					echo "<li>Duplication of subjects in a semester is not allowed.</li>";
				if(isset($_GET['nullsy']))
					echo "<li>School Year should not be empty.</li>";
				if(isset($_GET['nulln']))
					echo "<li>The number of subjects to be entered must be specified.</li>";
				if(isset($_GET['nnotnum']))
					echo "<li>The number of subjects specified is not a number.</li>";
				if(isset($_GET['nullcnum']))
					echo "<li>No Course Number should be empty.</li>";
				if(isset($_GET['nullcnum']))
					echo "<li>No Course Title should be empty.</li>";
				if(isset($_GET['nullgrades']))
					echo "<li>No Grades should be empty.</li>";
				if(isset($_GET['nullunits']))
					echo "<li>No Units should be empty.</li>";
				if(isset($_GET['neggrades']))
					echo "<li>No Grades should be negative.</li>";
				if(isset($_GET['negunits']))
					echo "<li>No Units should be negative.</li>";
				if(isset($_GET['wronggrade']))
					echo "<li>Wrong Grade format (It should be).</li>";
				if(isset($_GET['notnumunits']))
					echo "<li>Units should be numeric.</li>";
				echo "</ul>";
			}//there are input errors
		?>
	<a href="search.php"><input type="button" name="back" value="Back to Search"/></a>
	</div>
</body>

</html>