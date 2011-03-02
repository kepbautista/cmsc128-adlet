<!-- Trial Program for passing arrays
  -- Ikaw na bahala dun sa mga jquery something & aesthetics.
  -- 	-Tin
  -->
<html>

<body>
	<!-- Form for determining number of subjects to be entered-->
	<form method="post" action="<?php $ind=$_SERVER['PHP_SELF']; echo $ind;?>">
		<h3>Enter Grades</h3>
		<table>
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
			<tr><td colspan='2'><input type="submit" name="Submit" value="Submit"/></td></tr>
		<table>
	</form>

	<!-- Form for entering subject information-->
	<form method="post" action="<?php $ind=$_SERVER['PHP_SELF']; echo $ind;?>">
		<?php
		if(isset($_POST['N'])){
		echo "<h3>Enter Grades for ".$_POST['Semester']." Term, ".$_POST['SchoolYear']."</h3>";
		echo "<table>";
			for($i=0;$i<$_POST['N'];$i++) {
				echo "<tr>
				<td>Course Number:</td><td><input type='text' name='CourseNumber[]'/></td>
				<td>Course Title:</td><td><input type='text' name='CourseTitle[]'/></td>
				<td>Grade:</td><td><input type='text' name='Grade[]'/></td>
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
	
	<!--Show all the information entered-->
	<?php
		if(isset($_POST['SubmitGrade'])){
		echo "<table>";
		echo "<h3>Subjects Entered for ".$_POST['Semester']." Term, ".$_POST['SchoolYear']."</h3>";
		echo "<tr><th>Course Number</th><th>Course Title</th><th>Grades</th><th>Units</th></tr>";
		
		for($i=0;$i<$_POST['N'];$i++) {
			echo "<tr>
				<td>".$_POST['CourseNumber'][$i]."</td>
				<td>".$_POST['CourseTitle'][$i]."</td>
				<td>".$_POST['Grade'][$i]."</td>
				<td>".$_POST['Units'][$i]."</td>
				</tr>";
		}
		
		echo "</table>";
		}
	?>
	
</body>

</html>