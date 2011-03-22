<!--
  - File Name: modify.php
  - Program Description: get student number
  -->
<?php
	session_start();
	$_SESSION['modifyStdno'] = $_POST['stdno'];
?>