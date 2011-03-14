<?php
	session_start();
?>
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
		<script type='text/javascript' src='jquery-1.4.1.min.js'></script>
		<script type='text/javascript'>
		$(document).ready(function(){
			$('#waitlisted').click(function(){
				$("#lang").show();
				$("#rdg").show();
				$("#math").show();
				$("#sci").show();
				$("#upg").show();
			});
			
			$('#upcatpasser').click(function(){
				$("#lang").hide();
				$("#rdg").hide();
				$("#math").hide();
				$("#sci").hide();
				$("#upg").hide();
			});
		});//script for student type radio buttons
		</script>
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
				if(isset($_SESSION['isnull']))
					echo "<li>No field should be empty.</li>";
				if(isset($_SESSION['wrongstdno']))
					echo "<li>Wrong student number format. Correct format is 2009-12345.</li>";
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
		
		<table>
			<tr>
				<th colspan='2'>Enter Information:</th>
			</tr>
			<tr>
				<td>Student Type:</td>
				<td>
				<input type="radio" name="studentType" id="waitlisted" value="waitlisted" checked="true"/><label for="waitlisted">Waitlisted</label>
				<input type="radio" name="studentType" id="upcatpasser" value="upcatpasser"/><label for="upcatpasser">UPCAT Passer</label>
				</td>
			</tr>
			<tr>
				<td>Student Number:</td>
				<td><input type="text" name="stdno" <?php if(isset($_SESSION['addstdno'])) echo "value='".$_SESSION['addstdno']."'"?>/></td>
			</tr>
			<tr>
				<td>Last Name:</td>
				<td><input type="text" name="lname" <?php if(isset($_SESSION['addlname'])) echo "value='".$_SESSION['addlname']."'"?>/></td>
			</tr>
			<tr>
				<td>First Name:</td>
				<td><input type="text" name="fname" <?php if(isset($_SESSION['addfname'])) echo "value='".$_SESSION['addfname']."'"?>/></td>
			</tr>
			<tr>
				<td>Middle Initial:</td>
				<td><input type="text" name="mi" <?php if(isset($_SESSION['addmi'])) echo "value='".$_SESSION['addmi']."'"?>/></td>
			</tr>
			<tr id="lang">
				<td>Language:</td>
				<td><input type="text" name="lang"<?php if(isset($_SESSION['addlang'])) echo "value='".$_SESSION['addlang']."'"?>/></td>
			</tr>
			<tr id="rdg">
				<td>Reading:</td>
				<td><input type="text" name="rdg"<?php if(isset($_SESSION['addrdg'])) echo "value='".$_SESSION['addrdg']."'"?>/></td>
			</tr>
			<tr id="math">
				<td>Mathematics:</td>
				<td><input type="text" name="math"<?php if(isset($_SESSION['addmath'])) echo "value='".$_SESSION['addmath']."'"?>/></td>
			</tr>
			<tr id="sci">
				<td>Science:</td>
				<td><input type="text" name="sci"<?php if(isset($_SESSION['addsci'])) echo "value='".$_SESSION['addsci']."'"?>/></td>
			</tr>
			<tr id="upg">
				<td>UPG:</td>
				<td><input type="text" name="upg"<?php if(isset($_SESSION['addupg'])) echo "value='".$_SESSION['addupg']."'"?>/></td>
			</tr>
			<tr>
				<td>Gender:</td>
				<td>
				<select name="gender">
					<option value="F" <?php if((isset($_SESSION['addgender'])) && ($_SESSION['addgender']=='F')) echo "selected='selected'";?>>Female</option>
					<option value="M" <?php if((isset($_SESSION['addgender'])) && ($_SESSION['addgender']=='M')) echo "selected='selected'";?>>Male</option>
				</select>
				</td>
			</tr>
			<tr>
				<td>Region:</td>
				<td>
				<select type="text" name="region" style="align:center">
				<?php
					if((isset($_SESSION['addregion'])) && ($_SESSION['addregion']=='NCR')){
						echo "<option value='NCR' selected='selected'>NCR</option>";
					}else echo "<option value='NCR'>NCR</option>";
					if((isset($_SESSION['addregion'])) && ($_SESSION['addregion']=='CAR')){
						echo "<option value='CAR' selected='selected'>CAR</option>";
					}else echo "<option value='CAR'>CAR</option>";
					for($i=1;$i<13;$i++){
						if($i==4){
							if((isset($_SESSION['addregion'])) && ($_SESSION['addregion']=='4-A')){
								echo "<option value='4-A' selected='selected'>4-A</option>";
							}else echo "<option value='4-A'>4-A</option>";
							if((isset($_SESSION['addregion'])) && ($_SESSION['addregion']=='4-B')){
								echo "<option value='4-B' selected='selected'>4-B</option>";
							}else echo "<option value='4-B'>4-B</option>";
						}else{
							if((isset($_SESSION['addregion'])) && ($_SESSION['addregion']==$i)){
								echo "<option value='$i' selected='selected'>$i</option>";
							}else echo "<option value='$i'>$i</option>";
						}
					}
					if((isset($_SESSION['addregion'])) && ($_SESSION['addregion']=='CARAGA')){
						echo "<option value='CARAGA' selected='selected'>CARAGA</option>";
					}else echo "<option value='CARAGA'>CARAGA</option>";
					if((isset($_SESSION['addregion'])) && ($_SESSION['addregion']=='ARMM')){
						echo "<option value='ARMM' selected='selected'>ARMM</option>";
					}else echo "<option value='ARMM'>ARMM</option>";
				?>
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
<?php
	unset($_SESSION['error']);
	unset($_SESSION['addstdno']);
	unset($_SESSION['addlname']);
	unset($_SESSION['addfname']);
	unset($_SESSION['addmi']);
	if(isset($_SESSION['addlang'])) unset($_SESSION['addlang']);
	if(isset($_SESSION['addrdg'])) unset($_SESSION['addrdg']);
	if(isset($_SESSION['addmath'])) unset($_SESSION['addmath']);
	if(isset($_SESSION['addsci'])) unset($_SESSION['addsci']);
	if(isset($_SESSION['addupg'])) unset($_SESSION['addupg']);
	unset($_SESSION['addgender']);
	unset($_SESSION['addregion']);
	
	if(isset($_SESSION['isnull'])) unset($_SESSION['isnull']);
	if(isset($_SESSION['wrongstdno'])) unset($_SESSION['wrongstdno']);
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