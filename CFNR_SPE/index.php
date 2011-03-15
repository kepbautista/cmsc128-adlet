<?php
session_start();
if(isset($_SESSION['username'])) header("Location: AddStudent/");
?>
<html>
	<head>
		<title>CFNR Student Performance Evaluator</title>
	</head>
	<body>
		<div id="LoginDiv" style="text-align:center;width:50%;margin:5%;margin-left:auto;margin-right:auto;padding:25px;">
			<form name="loginForm" method="post" action="LoginView.php">
				<h2>Log in here</h2>
				<label for="username">Username: </label><input type=text name="username" id="username">
				<br/>
				<label for="psswrd">Password: </label><input type="password" name="psswrd" id="psswrd">
				<br/>
				<?php if(isset($_SESSION['invalidlogin'])) echo "<p>Invalid username or password.</p>";?>
				<br/>
				<input type="submit" name="submit" value="Login">
				<input type="reset" name="reset" value="Clear">
			</form>
		</div>
	</body>
</html>
<?php
if(isset($_SESSION['invalidlogin'])) unset($_SESSION['invalidlogin']);
?>