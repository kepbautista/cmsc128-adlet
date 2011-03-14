<!--
 - File Name: edit.php
 - Version Information: Version 1.0
 - Date:
 - Program Description: form for editing students
 -->
<?php
include "dbconnection.php";

	session_start();
	if(!isset($_SESSION['modifyStdno'])) header("Location: search.php");
	$stdno = $_SESSION['modifyStdno'];
	
	$connect = new dbconnection();
	$con = $connect->connectdb();
	
	/*search for tablename in students_list table*/
	$result = mysql_query("SELECT TableName FROM students_list WHERE StudentNumber='$stdno'");
	$row = mysql_fetch_array($result);
	$table = $row['TableName'];
	
	if(isset($_GET['error'])){
		$lname = $_GET['lname'];
		$fname = $_GET['fname'];
		$mi = $_GET['mi'];
		$lang = $_GET['lang'];
		$rdg = $_GET['rdg'];
		$math = $_GET['math'];
		$sci = $_GET['sci'];
		$upg = $_GET['upg'];
		$gender = $_GET['gender'];
		$region = $_GET['region'];
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
				header("Location: search.php?editsuccess=1");
			else if(isset($_GET['editedgrade']))
				header("Location: search.php?editedgrade=1");
			else{
				echo "<ul>";
				if(isset($_GET['editnotsuccess']))
					echo "<li><h3>Student is not successfully updated.".$_GET['editnotsuccess']."</h3></li>";
				if(isset($_GET['isnull']))
					echo "<li>No field should be empty.</li>";
				if(isset($_GET['rdgnotnum']))
					echo "<li>Reading grade should be a number.</li>";
				if(isset($_GET['negativerdg']))
					echo "<li>Reading grade should not be negative.</li>";
				if(isset($_GET['langnotnum']))
					echo "<li>Language grade should be a number.</li>";
				if(isset($_GET['negativelang']))
					echo "<li>Language grade should not be negative.</li>";
				if(isset($_GET['mathnotnum']))
					echo "<li>Math grade should be a number.</li>";
				if(isset($_GET['negativemath']))
					echo "<li>Math grade should not be negative.</li>";
				if(isset($_GET['scinotnum']))
					echo "<li>Science grade should be a number.</li>";
				if(isset($_GET['negativesci']))
					echo "<li>Science grade should not be negative.</li>";
				if(isset($_GET['upgnotnum']))
					echo "<li>UPG should be a number.</li>";
				if(isset($_GET['negativeupg']))
					echo "<li>UPG grade should not be negative.</li>";
				
				echo "</ul>";
			}//there are input errors
		?>
	
</body>
</html>

<?php
	$connect->closeconnection($con);
?>