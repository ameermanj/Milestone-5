<?php
session_start();

	unset($_SESSION['current_user']);
	setcookie('login','true', time()-100);

if(!isset($_SESSION['current_user']))
{
	header("Location:login.php");
}

?>