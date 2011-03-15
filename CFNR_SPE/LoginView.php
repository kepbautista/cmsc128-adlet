<?php
session_start();
if(!isset($_SESSION['username'])) header("Location: ../");
else header("Location: AddStudent/");
class LoginView
{
	function requestLogin(){
		$username = $_POST['username'];
		$password = $_POST['psswrd'];
		
		$loginview2 = new LoginView();
		$loginview2->validateInfo($username,$password);
	}
	
	function validateInfo($username,$password){
		if(($username!="admin") || ($password!="1234")){
			$_SESSION['invalidlogin'] = 1;
			header("Location: ../CFNR_SPE/");
		}else{
			$_SESSION['username'] = $username;
			header("Location: AddStudent/");
		}
	}
}

$loginview = new LoginView();
$loginview->requestLogin();
?>