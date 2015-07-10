<?php
session_start();

	unset($_SESSION['current_emp']);
	setcookie('login','true', time()-100);

if(!isset($_SESSION['current_emp']))
{
	header("Location:emp_login.php");
}

?>