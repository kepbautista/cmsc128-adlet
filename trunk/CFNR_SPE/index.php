<!--
  - File Name: index.php
  - Program Description: home page (contains log-in)
  -->
<?php
session_start();
if(isset($_SESSION['username'])) header("Location: AddStudent/");
?>
<html>
	<head>
		<title>CFNR Student Performance Evaluator</title>
		<link rel="stylesheet" type="text/css" href="styles/view.css" />
	</head>
	<body>
		<div id='centerArea'>
			<div id='logo'><img src='images/logo.png'/></div>
			
			<div id='options'>
			</div>
			
			<div id="loginDiv">
				<form name="loginForm" method="post" action="LoginView.php">
					<h3 style="color:white;">Log in here</h3>
					<label for="username">Username: </label><input type=text name="username" id="username">
					<br/>
					<label for="psswrd">Password: </label><input type="password" name="psswrd" id="psswrd">
					<br/>
					<?php if(isset($_SESSION['invalidlogin'])) echo "<p class='fieldError'>Invalid username or password.</p>";else echo "<br/>";?>
					<input type="submit" name="submit" value="Login">
					<input type="reset" name="reset" value="Clear">
				</form>
			</div>
		</div>
		<div id='about'>
		<a href='about/about.php'>About the Authors</a><br/>
		All Rights Reserved, 2011.<br/>
		</div>
	</body>
</html>
<?php
if(isset($_SESSION['invalidlogin'])) unset($_SESSION['invalidlogin']);
?>