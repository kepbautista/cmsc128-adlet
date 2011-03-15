<!--
 - File Name: edit.php
 - Version Information: Version 1.0
 - Date:
 - Program Description: form for editing students
 -->
<?php
include "../dbconnection.php";

	session_start();
	if(!isset($_SESSION['modifyStdno'])) header("Location: ../SearchStudent/");
	$stdno = $_SESSION['modifyStdno'];
	
	$connect = new dbconnection();
	$con = $connect->connectdb();
	
	/*search for tablename in students_list table*/
	$result = mysql_query("SELECT TableName FROM students_list WHERE StudentNumber='$stdno'");
	$row = mysql_fetch_array($result);
	$table = $row['TableName'];
	
	if(isset($_SESSION['editerror'])){
		$lname = $_SESSION['editlname'];
		$fname = $_SESSION['editfname'];
		$mi = $_SESSION['editmi'];
		if($table=="waitlist_students"){
			$lang = $_SESSION['editlang'];
			$rdg = $_SESSION['editrdg'];
			$math = $_SESSION['editmath'];
			$sci = $_SESSION['editsci'];
			$upg = $_SESSION['editupg'];
		}
		$gender = $_SESSION['editgender'];
		$region = $_SESSION['editregion'];
	}else{
		/*search for the student*/
		$result = mysql_query("SELECT * FROM $table where StudentNumber='$stdno'");
		$row = mysql_fetch_array($result);
		
		$lname = $row['LastName'];
		$fname = $row['FirstName'];
		$mi = $row['MiddleInitial'];
		if($table=="waitlist_students"){
			$lang = $row['Language'];
			$rdg = $row['Reading'];
			$math = $row['Mathematics'];
			$sci = $row['Science'];
			$upg = $row['UPG'];
		}
		$gender = $row['Gender'];
		$region = $row['Region'];
	}
?>

<html>
<head>
	<title>Edit Student</title>
</head>

<body>
	<h1>Student Editor</h1>
	<?php
		echo "Edit information for student number ".$_SESSION['modifyStdno'];
	?>

	<!-- Form for Student Editing-->
	<form name="editStudentForm" method="post" action="EditStudentView.php">
		<table>
			<tr>
				<td>Last Name:</td>
				<td><input type="text" name="lname" value="<?php echo $lname; ?>"/></td>
			</tr>
			<tr>
				<td>First Name:</td>
				<td><input type="text" name="fname" value="<?php echo $fname; ?>"/></td>
			</tr>
			<tr>
				<td>Middle Initial:</td>
				<td><input type="text" name="mi" value="<?php echo $mi; ?>"/></td>
			</tr>
			<?php
			if($table=="waitlist_students") echo "<tr>
				<td>Language:</td>
				<td><input type='text' name='lang' value='".$lang."'/></td>
			</tr>
			<tr>
				<td>Reading:</td>
				<td><input type='text' name='rdg' value='".$rdg."'/></td>
			</tr>
			<tr>
				<td>Mathematics:</td>
				<td><input type='text' name='math' value='".$math."'/></td>
			</tr>
			<tr>
				<td>Science:</td>
				<td><input type='text' name='sci' value='".$sci."'/></td>
			</tr>
			<tr>
				<td>UPG:</td>
				<td><input type='text' name='upg' value='".$upg."'/></td>
			</tr>";
			?>
			<tr>
				<td>Gender:</td>
				<td>
				<select name="gender">
					<?php if($gender=="F"){?>
					<option value="F" selected="selected">Female</option>
					<option value="M">Male</option>
					<?php }else{?>
					<option value="F">Female</option>
					<option value="M" selected="selected">Male</option>
					<?php } ?>
				</select>
				</td>
			</tr>
			<tr>
				<td>Region:</td>
				<td>
				<select type="text" name="region" style="align:center"/>
					<?php 
						if($region=="NCR") echo "<option value='NCR' selected='selected'>NCR</option>";
						else echo "<option value='NCR'>NCR</option>";
						if($region=="CAR") echo "<option value='CAR' selected='selected'>CAR</option>";
						else  echo "<option value='CAR'>CAR</option>";
						for($i=1;$i<12;$i++){
							if($i==4){
								if($region=="4-A")  echo "<option value='4-A' selected='selected'>4-A</option>";
								else  echo "<option value='4-A'>4-A</option>";
								if($region=="4-B")  echo "<option value='4-B' selected='selected'>4-B</option>";
								else  echo "<option value='4-B'>4-B</option>";
							}else{
								if($region==$i) echo "<option value='".$i."' selected='selected'>".$i."</option>";
								else  echo "<option value='".$i."'>".$i."</option>";
							}
						}
							if($region=="CARAGA")  echo "<option value='CARAGA' selected='selected'>CARAGA</option>";
							else  echo "<option value='CARAGA'>CARAGA</option>";
							if($region=="ARMM")  echo "<option value='ARMM' selected='selected'>ARMM</option>";
							else  echo "<option value='ARMM'>ARMM</option>";
					?>
				</td>
			</tr>
		</table>
		<input type="submit" name="update" value="Update"/>
	</form>
	<br/>
	<?php
			if(isset($_GET['editsuccess']))
				header("Location: ../SearchStudent/?editsuccess=1");
			else if(isset($_GET['editedgrade']))
				header("Location: ../SearchStudent/?editedgrade=1");
			else{
				echo "<ul>";
				if(isset($_GET['editnotsuccess']))
					echo "<li><h3>Student is not successfully updated.".$_GET['editnotsuccess']."</h3></li>";
				if(isset($_SESSION['isnull']))
					echo "<li>No field should be empty.</li>";
				if(isset($_SESSION['rdgnotnum']))
					echo "<li>Reading grade should be a number.</li>";
				if(isset($_SESSION['negativerdg']))
					echo "<li>Reading grade should not be negative.</li>";
				if(isset($_SESSION['langnotnum']))
					echo "<li>Language grade should be a number.</li>";
				if(isset($_SESSION['negativelang']))
					echo "<li>Language grade should not be negative.</li>";
				if(isset($_SESSION['mathnotnum']))
					echo "<li>Math grade should be a number.</li>";
				if(isset($_SESSION['negativemath']))
					echo "<li>Math grade should not be negative.</li>";
				if(isset($_SESSION['scinotnum']))
					echo "<li>Science grade should be a number.</li>";
				if(isset($_SESSION['negativesci']))
					echo "<li>Science grade should not be negative.</li>";
				if(isset($_SESSION['upgnotnum']))
					echo "<li>UPG should be a number.</li>";
				if(isset($_SESSION['negativeupg']))
					echo "<li>UPG grade should not be negative.</li>";
				
				echo "</ul>";
			}//there are input errors
		?>
	
</body>
</html>

<?php
	$connect->closeconnection($con);
	
	unset($_SESSION['editerror']);
	unset($_SESSION['editlname']);
	unset($_SESSION['editfname']);
	unset($_SESSION['editmi']);
	if(isset($_SESSION['editlang'])) unset($_SESSION['editlang']);
	if(isset($_SESSION['editrdg'])) unset($_SESSION['editrdg']);
	if(isset($_SESSION['editmath'])) unset($_SESSION['editmath']);
	if(isset($_SESSION['editsci'])) unset($_SESSION['editsci']);
	if(isset($_SESSION['editupg'])) unset($_SESSION['editupg']);
	unset($_SESSION['editgender']);
	unset($_SESSION['editregion']);
	
	if(isset($_SESSION['isnull'])) unset($_SESSION['isnull']);
	if(isset($_SESSION['rdgnotnum'])) unset($_SESSION['rdgnotnum']);
	if(isset($_SESSION['negativerdg'])) unset($_SESSION['negativerdg']);
	if(isset($_SESSION['langnotnum'])) unset($_SESSION['langnotnum']);
	if(isset($_SESSION['negativelang'])) unset($_SESSION['negativelang']);
	if(isset($_SESSION['mathnotnum'])) unset($_SESSION['mathnotnum']);
	if(isset($_SESSION['negativemath'])) unset($_SESSION['negativemath']);
	if(isset($_SESSION['scinotnum'])) unset($_SESSION['scinotnum']);
	if(isset($_SESSION['negativesci'])) unset($_SESSION['negativesci']);
	if(isset($_SESSION['upgnotnum'])) unset($_SESSION['upgnotnum']);
	if(isset($_SESSION['negativeupg'])) unset($_SESSION['negativeupg']);
?>