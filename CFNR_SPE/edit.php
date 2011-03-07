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
	
	/*search for tablename in students_list*/
	$result = mysql_query("SELECT TableName FROM students_list WHERE StudentNumber='$stdno'");
	$row = mysql_fetch_array($result);
	$table = $row['TableName'];
	
	/*search for the student*/
	$result = mysql_query("SELECT * FROM $table where StudentNumber='$stdno'");
	$row = mysql_fetch_array($result);
	
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
				<td><input type="text" name="lname" value="<?php echo $row['LastName']; ?>"/></td>
			</tr>
			<tr>
				<td>First Name:</td>
				<td><input type="text" name="fname" value="<?php echo $row['FirstName']; ?>"/></td>
			</tr>
			<tr>
				<td>Middle Initial:</td>
				<td><input type="text" name="mi" value="<?php echo $row['MiddleInitial']; ?>"/></td>
			</tr>
			<?php
			if($table=="waitlist_students") echo "<tr>
				<td>Language:</td>
				<td><input type='text' name='lang' value='".$row['Language']."'/></td>
			</tr>
			<tr>
				<td>Reading:</td>
				<td><input type='text' name='rdg' value='".$row['Reading']."'/></td>
			</tr>
			<tr>
				<td>Mathematics:</td>
				<td><input type='text' name='math' value='".$row['Mathematics']."'/></td>
			</tr>
			<tr>
				<td>Science:</td>
				<td><input type='text' name='sci' value='".$row['Science']."'/></td>
			</tr>
			<tr>
				<td>UPG:</td>
				<td><input type='text' name='upg' value='".$row['UPG']."'/></td>
			</tr>";
			?>
			<tr>
				<td>Gender:</td>
				<td>
				<select name="gender">
					<?php if($row['Gender']=="F"){?>
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
						if($row['Region']=="NCR") echo "<option value='NCR' selected='selected'>NCR</option>";
						else echo "<option value='NCR'>NCR</option>";
						if($row['Region']=="CAR") echo "<option value='CAR' selected='selected'>CAR</option>";
						else  echo "<option value='CAR'>CAR</option>";
						if($row['Region']=="1")  echo "<option value='1' selected='selected'>1</option>";
						else  echo "<option value='1'>1</option>";
						if($row['Region']=="2")  echo "<option value='2' selected='selected;>2</option>";
						else  echo "<option value='2'>2</option>";
						if($row['Region']=="3")  echo "<option value'3' selected='selected'>3</option>";
						else  echo "<option value='3'>3</option>";
						if($row['Region']=="4-A")  echo "<option value='4-A' selected='selected'>4-A</option>";
						else  echo "<option value='4-A'>4-A</option>";
						if($row['Region']=="4-B")  echo "<option value='4-B' selected='selected'>4-B</option>";
						else  echo "<option value='4-B'>4-B</option>";
						if($row['Region']=="5")  echo "<option value='5' selected='selected'>5</option>";
						else  echo "<option value='5'>5</option>";
						if($row['Region']=="6")  echo "<option value='6' selected='selected'>6</option>";
						else  echo "<option value='6'>6</option>";
						if($row['Region']=="7")  echo "<option value='7' selected='selected'>7</option>";
						else  echo "<option value='7'>7</option>";
						if($row['Region']=="8")  echo "<option value='8' selected='selected'>8</option>";
						else  echo "<option value='8'>8</option>";
						if($row['Region']=="9")  echo "<option value='9' selected='selected'>9</option>";
						else  echo "<option value='9'>9</option>";
						if($row['Region']=="10")  echo "<option value='10' selected='selected'>10</option>";
						else  echo "<option value='10'>10</option>";
						if($row['Region']=="11")  echo "<option value='11' selected='selected'>11</option>";
						else  echo "<option value='11'>11</option>";
						if($row['Region']=="12")  echo "<option value='12' selected='selected'>12</option>";
						else  echo "<option value='12'>12</option>";
						if($row['Region']=="CARAGA")  echo "<option value='CARAGA' selected='selected'>CARAGA</option>";
						else  echo "<option value='CARAGA'>CARAGA</option>";
						if($row['Region']=="ARMM")  echo "<option value='ARMM' selected='selected'>ARMM</option>";
						else  echo "<option value='ARMM'>ARMM</option>"; ?>
				</td>
			</tr>
		</table>
		<input type="submit" name="update" value="Update"/>
	</form>
	<br/>
	<?php
			if(isset($_GET['editsuccess']))
				header("Location: search.php?editsuccess=1");
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