<?php
session_start();

if(isset($_SESSION['username'])){
	unset($_SESSION['username']);
	session_destroy();
	header("Location: ../CFNR_SPE/");
}else{
	header("Location: AddStudent/");
}
?>