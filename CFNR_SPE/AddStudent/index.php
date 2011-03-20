<?php
session_start();
if(!isset($_SESSION['username'])) header("Location: ../");

$isnull = "<p class='fieldError'>*Required field</p>";
$invalid = "<p class='fieldError'>*Should be a non-negative number</p>";
?>
<!--
  - File Name: add.php
  - Version Information: Version 1.1
  - Date: February 4, 2011 (First Release)
  - Program Description: form for adding students
  -->
<html>
	<head>
		<title>CFNR Student Performance Evaluator - Add Student</title>
		<link rel="stylesheet" type="text/css" href="../styles/view.css" />
		<script type='text/javascript' src='../jquery-1.4.1.min.js'></script>
		<script type='text/javascript'>
		$(document).ready(function(){
			$('#waitlisted').click(function(){
				$('#lang').show();
				$('#rdg').show();
				$('#math').show();
				$('#sci').show();
				$('#upg').show();
			});
			
			$('#upcatpasser').click(function(){
				$('#lang').hide();
				$('#rdg').hide();
				$('#math').hide();
				$('#sci').hide();
				$('#upg').hide();
			});
		});//script for student type radio buttons
		</script>
	</head>
<body id="addStudent">
	<div id='centerArea'>
		<div id='logo'><img src='../images/logo.png'/></div>
		
		<div id='options'>
		<a href="../AddStudent/"><img src='../images/addstudent2.gif'/></a>
		<a href="../SearchStudent/"><img src='../images/searchstudent2.jpg'/></a>
		<a href="../CountStudent/"><img src='../images/countstudent2.jpg'></a>
		<a href="../Graphs/"><img src='../images/viewstat.jpg'></a>
		<a href="../logout.php" id="logoutLink"><img src='../images/logout.jpg'></a>
		</div>
		
		<div id="content">
			<!--Form for User Inputs-->
			<form name="info" method="post" action="AddStudentView.php">
			
				<?php
					if(isset($_GET['addsuccess']))
						echo "<p class='successNotifier'>Student is successfully added!</p><br/>";
					if(isset($_GET['addnotsuccess']))
						echo "<p class='successNotifier'>Student is not successfully added. (Student Number already exists.)</p><br/>";
				?>
				
				<table>
					<tr>
						<th colspan='2'>Enter Information:</th>
					</tr>
					<tr>
						<td><label>Student Type:</label></td>
						<td>
							<input type="radio" name="studentType" id="waitlisted" value="waitlisted" checked="true"/><label for="waitlisted">Waitlisted</label>
							<input type="radio" name="studentType" id="upcatpasser" value="upcatpasser"/><label for="upcatpasser">UPCAT Passer</label>
						</td>
					</tr>
					<tr>
						<td><label for="stdno">Student Number:</label></td>
						<td><input type="text" name="stdno" id="stdno" <?php if(isset($_SESSION['addstdno'])) echo "value='".$_SESSION['addstdno']."'"?>/></td>
						<td>
						<?php
							if(isset($_SESSION['stdnoisnull']))	echo $isnull;
							if(isset($_SESSION['wrongstdno'])) echo "<p class='fieldError'>*Correct form is yyyy-nnnnn (ex. 2010-12345)</p>";
						?>
						</td>
					</tr>
					<tr>
						<td><label for="lname">Last Name:</label></td>
						<td><input type="text" name="lname" id="lname" <?php if(isset($_SESSION['addlname'])) echo "value='".$_SESSION['addlname']."'"?>/></td>
						<td>
						<?php
							if(isset($_SESSION['lnameisnull']))	echo $isnull;
						?>
						</td>
					</tr>
					<tr>
						<td><label for="fname">First Name:</label></td>
						<td><input type="text" name="fname" id="fname" <?php if(isset($_SESSION['addfname'])) echo "value='".$_SESSION['addfname']."'"?>/></td>
						<td>
						<?php
							if(isset($_SESSION['fnameisnull']))	echo $isnull;
						?>
						</td>
					</tr>
					<tr>
						<td><label for="mi">Middle Initial:</label></td>
						<td><input type="text" name="mi" id="mi" <?php if(isset($_SESSION['addmi'])) echo "value='".$_SESSION['addmi']."'"?>/></td>
						<td>
						<?php
							if(isset($_SESSION['miisnull']))	echo $isnull;
							if(isset($_SESSION['longmi']))	echo "<p class='fieldError'>*Up to 5 characters only</p>";
						?>
						</td>
					</tr>
					<tr id="lang">
						<td><label for="lang">Language:</label></td>
						<td><input type="text" name="lang" id="lang" <?php if(isset($_SESSION['addlang'])) echo "value='".$_SESSION['addlang']."'"?>/></td>
						<td>
						<?php
							if(isset($_SESSION['langisnull']))	echo $isnull;
							if(isset($_SESSION['invalidlang']))	echo $invalid;
						?>
						</td>
					</tr>
					<tr id="rdg">
						<td><label for="rdg">Reading:</label></td>
						<td><input type="text" name="rdg" id="rdg" <?php if(isset($_SESSION['addrdg'])) echo "value='".$_SESSION['addrdg']."'"?>/></td>
						<td>
						<?php
							if(isset($_SESSION['rdgisnull']))	echo $isnull;
							if(isset($_SESSION['invalidrdg']))	echo $invalid;
						?>
						</td>
					</tr>
					<tr id="math">
						<td><label for="math">Mathematics:</label></td>
						<td><input type="text" name="math" id="math" <?php if(isset($_SESSION['addmath'])) echo "value='".$_SESSION['addmath']."'"?>/></td>
						<td>
						<?php
							if(isset($_SESSION['mathisnull']))	echo $isnull;
							if(isset($_SESSION['invalidmath']))	echo $invalid;
						?>
						</td>
					</tr>
					<tr id="sci">
						<td><label for="sci">Science:</label></td>
						<td><input type="text" name="sci" id="sci" <?php if(isset($_SESSION['addsci'])) echo "value='".$_SESSION['addsci']."'"?>/></td>
						<td>
						<?php
							if(isset($_SESSION['sciisnull']))	echo $isnull;
							if(isset($_SESSION['invalidsci']))	echo $invalid;
						?>
						</td>
					</tr>
					<tr id="upg">
						<td><label for="upg">UPG:</label></td>
						<td><input type="text" name="upg" id="upg" <?php if(isset($_SESSION['addupg'])) echo "value='".$_SESSION['addupg']."'"?>/></td>
						<td>
						<?php
							if(isset($_SESSION['upgisnull']))	echo $isnull;
							if(isset($_SESSION['invalidupg']))	echo $invalid;
						?>
						</td>
					</tr>
					<tr>
						<td><label>Gender:</label></td>
						<td>
						<select name="gender">
							<option value="F" <?php if((isset($_SESSION['addgender'])) && ($_SESSION['addgender']=='F')) echo "selected='selected'";?>>Female</option>
							<option value="M" <?php if((isset($_SESSION['addgender'])) && ($_SESSION['addgender']=='M')) echo "selected='selected'";?>>Male</option>
						</select>
						</td>
						<td></td>
					</tr>
					<tr>
						<td><label>Region:</label></td>
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
						<td></td>
					</tr>
				</table>
				<input type="submit" name="submit" value="Submit"/>
				<input type="reset" name="clear" value="Clear"/>
				<br/>
			</form>
		</div>
	</div>
</body>
</html>
<?php
	unset($_SESSION['error']);
	unset($_SESSION['addstdtype']);
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
	
	if(isset($_SESSION['stdnoisnull'])) unset($_SESSION['stdnoisnull']);
	if(isset($_SESSION['lnameisnull'])) unset($_SESSION['lnameisnull']);
	if(isset($_SESSION['fnameisnull'])) unset($_SESSION['fnameisnull']);
	if(isset($_SESSION['miisnull'])) unset($_SESSION['miisnull']);
	if(isset($_SESSION['langisnull'])) unset($_SESSION['langisnull']);
	if(isset($_SESSION['rdgisnull'])) unset($_SESSION['rdgisnull']);
	if(isset($_SESSION['mathisnull'])) unset($_SESSION['mathisnull']);
	if(isset($_SESSION['sciisnull'])) unset($_SESSION['sciisnull']);
	if(isset($_SESSION['upgisnull'])) unset($_SESSION['upgisnull']);
	if(isset($_SESSION['longmi'])) unset($_SESSION['longmi']);
	if(isset($_SESSION['wrongstdno'])) unset($_SESSION['wrongstdno']);
	if(isset($_SESSION['invalidrdg'])) unset($_SESSION['invalidrdg']);
	if(isset($_SESSION['invalidlang'])) unset($_SESSION['invalidlang']);
	if(isset($_SESSION['invalidmath'])) unset($_SESSION['invalidmath']);
	if(isset($_SESSION['invalidsci'])) unset($_SESSION['invalidsci']);
	if(isset($_SESSION['invalidupg'])) unset($_SESSION['invalidupg']);
?>