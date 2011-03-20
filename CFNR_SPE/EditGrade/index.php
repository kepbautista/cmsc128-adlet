<?php
	session_start();
	if(!isset($_SESSION['modifyStdno'])) header("Location: ../SearchStudent/");
	$stdno = $_SESSION['stdno'];
	$cnum = $_SESSION['cnum'];
	$ctitle = $_SESSION['ctitle'];
	$grade = $_SESSION['grade'];
	$units = $_SESSION['units'];
	$sem = $_SESSION['sem'];
	$year = $_SESSION['year'];
?>

<html>
<head>
<title><?php echo "Edit information for student number ".$_SESSION['modifyStdno'];?></title>
<link rel="stylesheet" type="text/css" href="../styles/view.css" />
</head>

<body>
<div id='logo'><img src='../images/logo.png'/></div>

<div id='options'>
<a href="../logout.php" id="logoutLink"><img src='../images/logout.jpg'></a>
</div>

<div id='content' style='top:0'>
<?php echo "<h2>Edit ".$cnum." Grade of ".$stdno."</h2>";?>

<form method='post' action='EditGradeView.php'>
<table>
<tr><td>Course Number:</td>
<td><input type='text' name='CourseNumber' value='<?php if(isset($cnum)) echo $cnum;?>'></td>
</tr>
<tr><td>Course Title:</td>
<td><input type='text' name='CourseTitle' value='<?php if(isset($ctitle)) echo $ctitle;?>'></td>
</tr>
<tr><td>Grade:</td>
<td><select name='Grade' style='text-align:center;'/>
	<?php
	if($grade=="1") echo "<option value='1' selected='selected'>1</option>";
	else echo "<option value='1'>1</option>";
	if($grade=="1.25") echo "<option value='1.25' selected='selected'>1.25</option>";
	else echo "<option value='1.25'>1.25</option>";
	if($grade=="1.5") echo "<option value='1.5' selected='selected'>1.5</option>";
	else echo "<option value='1.5'>1.5</option>";
	if($grade=="1.75") echo "<option value='1.75' selected='selected'>1.75</option>";
	else echo "<option value='1.75'>1.75</option>";
	if($grade=="2") echo "<option value='2' selected='selected'>2</option>";
	else echo "<option value='2'>2</option>";
	if($grade=="2.25")echo "<option value='2.25' selected='selected'>2.25</option>";
	else echo "<option value='2.25'>2.25</option>";
	if($grade=="2.5") echo "<option value='2.5' selected='selected'>2.5</option>";
	else echo "<option value='2.5'>2.5</option>";
	if($grade=="2.75") echo "<option value='2.75' selected='selected'>2.75</option>";
	else echo "<option value='2.75'>2.75</option>";
	if($grade=="3") echo "<option value='3' selected='selected'>3</option>";
	else echo "<option value='3'>3</option>";
	if($grade=="4") echo"<option value='4' selected='selected'>4</option>";
	else echo "<option value='4'>4</option>";
	if($grade=="5") echo "<option value='5' selected='selected'>5</option>";
	else echo "<option value='5'>5</option>";
	if($grade=="S") echo "<option value='S' selected='selected'>S</option>";
	else echo "<option value='S'>S</option>";
	if($grade=="U") echo "<option value='U' selected='selected'>U</option>";
	else echo"<option value='U'>U</option>";
	if($grade=="DRP") echo "<option value='DRP' selected='selected'>DRP</option>";
	else echo "<option value='DRP'>DRP</option>";
	if($grade=="PASS") echo "<option value='PASS' selected='selected'>PASS</option>";
	else echo "<option value='PASS'>PASS</option>";
	if($grade=="FAIL") echo "<option value='FAIL' selected='selected'>FAIL</option>";
	else echo "<option value='FAIL'>FAIL</option>";
	?>
</td></tr>
<tr><td>Units:</td>
<td><input type='text' name='Units' value='<?php if(isset($units))echo $units;?>'></td>
</tr>
<tr><td>Semester:</td>
<td>
<select type='text' name='Semester' style='text-align:center'>
	<?php
		if($sem=="1st") echo "<option value='1st' selected='selected'>1st</option>";
		else echo "<option value='1st'>1st</option>";
		if($sem=="2nd") echo "<option value='2nd' selected='selected'>2nd</option>";
		else echo "<option value='2nd'>2nd</option>";
		if($sem=="Summer") echo "<option value='Summer' selected='selected'>Summer</option>";
		else echo "<option value='Summer'>Summer</option>";
	?>
</select>
</td>
</tr>
<tr><td>School Year:</td>
<td><input type='text' name='SchoolYear' value='<?php if(isset($year)) echo $year;?>'></td>
</tr>
<input type='hidden' name='StudentNumber' value='<?php echo $stdno;?>'/>
<input type='hidden' name='CourseNumber1' value='<?php echo $cnum;?>'/>
<input type='hidden' name='CourseTitle1' value='<?php echo $ctitle;?>'/>
<input type='hidden' name='Grade1' value='<?php echo $grade;?>'/>
<input type='hidden' name='Units1' value='<?php echo $units;?>'/>
<input type='hidden' name='Semester1' value='<?php echo $sem;?>'/>
<input type='hidden' name='SchoolYear1' value='<?php echo $year;?>'/>
<tr><td><input type='submit' name="Submit" value="Edit"/></td></tr>
</table>
</form>

<ul>
<?php
	if(isset($_GET['editedgrade']))
		header("Location: ../DisplayGrade/?editedgrade=1");//edit grade is successful
	else{
		if(isset($_GET['notedited']))
			echo "<li><h3>Grade is not edited successfully.</h3></li>";
		if(isset($_SESSION['isnull']))
			echo "<li>No field should be empty.</li>";
		if(isset($_SESSION['neggrades']))
			echo "<li>Grade should not be negative.</li>";
		if(isset($_SESSION['negunits']))
			echo "<li>Units should not be negative.</li>";
		if(isset($_SESSION['notnum']))
			echo "<li>Grade or Units should be a number.</li>";
	}
?>
</ul>
</div>
</body>
</html>

<?php
	if(isset($_SESSION['duplicateDB'])) unset($_SESSION['duplicateDB']);
	if(isset($_SESSION['isnull'])) unset($_SESSION['isnull']);
	if(isset($_SESSION['neggrades'])) unset($_SESSION['neggrades']);
	if(isset($_SESSION['negunits'])) unset($_SESSION['negunits']);
	if(isset($_SESSION['notnum'])) unset($_SESSION['notnum']);
?>