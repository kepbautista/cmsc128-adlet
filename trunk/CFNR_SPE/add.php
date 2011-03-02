<!--
  - File Name: add.php
  - Version Information: Version 1.1
  - Date: February 4, 2011 (First Release)
  - Program Description: form for adding students
  -->
<html>
	<head>
		<title>CFNR Student Performance Evaluator</title>
		<link rel="stylesheet" type="text/css" href="styles/styles.css" />
	</head>
<body id="addStudent">
<h1>CFNR Student Performance Evaluator</h1>
	<ul id="tabs">
		<li id="tab1"><a href="add.php">Add Student</a></li>
		<li id="tab2"><a href="search.php">Search Student</a></li>
		<li id="tab3"><a href="count.php">Count Student</a></li>
	</ul>
	
	<!--Form for User Inputs-->
	<form name="info" method="post" action="AddStudentView.php">
		<div id="content">
		<h3>Add Student</h3>
		
		<?php
			if(isset($_GET['added']))
				echo "<h3>Student added Successfully.</h3>";//student was added
			else{
				echo "<ul>";
				if(isset($_GET['addsuccess']))
					echo "<li><h3>Student is successfully added.</h3></li>";
				if(isset($_GET['addnotsuccess']))
					echo "<li><h3>Student is not successfully added. (Student Number already exists.)</h3></li>";
				if(isset($_GET['isnull']))
					echo "<li>No field should be empty.</li>";
				if(isset($_GET['wrongstdno']))
					echo "<li>Wrong student number format. Correct format is 2009-12345.</li>";
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
		
		<table>
			<tr>
				<th colspan='2'>Enter Information:</th>
			</tr>
			<tr>
				<td>Student Number:</td>
				<td><input type="text" name="stdno" <?php if(isset($_GET['stdno'])) echo "value='".$_GET['stdno']."'"?>/></td>
			</tr>
			<tr>
				<td>Last Name:</td>
				<td><input type="text" name="lname" <?php if(isset($_GET['lname'])) echo "value='".$_GET['lname']."'"?>/></td>
			</tr>
			<tr>
				<td>First Name:</td>
				<td><input type="text" name="fname" <?php if(isset($_GET['fname'])) echo "value='".$_GET['fname']."'"?>/></td>
			</tr>
			<tr>
				<td>Middle Initial:</td>
				<td><input type="text" name="mi" <?php if(isset($_GET['mi'])) echo "value='".$_GET['mi']."'"?>/></td>
			</tr>
			<tr>
				<td>Language:</td>
				<td><input type="text" name="lang" <?php if(isset($_GET['lang'])) echo "value='".$_GET['lang']."'"?>/></td>
			</tr>
			<tr>
				<td>Reading:</td>
				<td><input type="text" name="rdg" <?php if(isset($_GET['rdg'])) echo "value='".$_GET['rdg']."'"?>/></td>
			</tr>
			<tr>
				<td>Mathematics:</td>
				<td><input type="text" name="math" <?php if(isset($_GET['math'])) echo "value='".$_GET['math']."'"?>/></td>
			</tr>
			<tr>
				<td>Science:</td>
				<td><input type="text" name="sci" <?php if(isset($_GET['sci'])) echo "value='".$_GET['sci']."'"?>/></td>
			</tr>
			<tr>
				<td>UPG:</td>
				<td><input type="text" name="upg" <?php if(isset($_GET['upg'])) echo "value='".$_GET['upg']."'"?>/></td>
			</tr>
			<tr>
				<td>Gender:</td>
				<td>
				<select name="gender">
					<option value="F" <?php if((isset($_GET['gender'])) && ($_GET['gender']=='F')) echo "selected='selected'";?>>Female</option>
					<option value="M" <?php if((isset($_GET['gender'])) && ($_GET['region']=='M')) echo "selected='selected'";?>>Male</option>
				</select>
				</td>
			</tr>
			<tr>
				<td>Region:</td>
				<td>
				<select type="text" name="region" style="align:center">
					<option value="NCR" <?php if((isset($_GET['region'])) && ($_GET['region']=='NCR')) echo "selected='selected'";?>>NCR</option>
					<option value="1" <?php if((isset($_GET['region'])) && ($_GET['region']=='1')) echo "selected='selected'";?>>1</option>
					<option value="CAR" <?php if((isset($_GET['region'])) && ($_GET['region']=='CAR')) echo "selected='selected'";?>>CAR</option>
					<option value="2" <?php if((isset($_GET['region'])) && ($_GET['region']=='2')) echo "selected='selected'";?>>2</option>
					<option value="3" <?php if((isset($_GET['region'])) && ($_GET['region']=='3')) echo "selected='selected'";?>>3</option>
					<option value="4-A" <?php if((isset($_GET['region'])) && ($_GET['region']=='4-A')) echo "selected='selected'";?>>4-A</option>
					<option value="4-B" <?php if((isset($_GET['region'])) && ($_GET['region']=='4-B')) echo "selected='selected'";?>>4-B</option>
					<option value="5" <?php if((isset($_GET['region'])) && ($_GET['region']=='5')) echo "selected='selected'";?>>5</option>
					<option value="6" <?php if((isset($_GET['region'])) && ($_GET['region']=='6')) echo "selected='selected'";?>>6</option>
					<option value="7" <?php if((isset($_GET['region'])) && ($_GET['region']=='7')) echo "selected='selected'";?>>7</option>
					<option value="8" <?php if((isset($_GET['region'])) && ($_GET['region']=='8')) echo "selected='selected'";?>>8</option>
					<option value="9" <?php if((isset($_GET['region'])) && ($_GET['region']=='9')) echo "selected='selected'";?>>9</option>
					<option value="10" <?php if((isset($_GET['region'])) && ($_GET['region']=='10')) echo "selected='selected'";?>>10</option>
					<option value="11" <?php if((isset($_GET['region'])) && ($_GET['region']=='11')) echo "selected='selected'";?>>11</option>
					<option value="12" <?php if((isset($_GET['region'])) && ($_GET['region']=='12')) echo "selected='selected'";?>>12</option>
					<option value="CARAGA" <?php if((isset($_GET['region'])) && ($_GET['region']=='CARAGA')) echo "selected='selected'";?>>CARAGA</option>
					<option value="ARMM" <?php if((isset($_GET['region'])) && ($_GET['region']=='ARMM')) echo "selected='selected'";?>>ARMM</option>
				</select>
				</td>
			</tr>
		</table>
		<input type="submit" name="submit" value="Submit"/>
		<input type="reset" name="clear" value="Clear"/>
		<br/>
		</div>
	</form>
</body>
</html>