<?php
include 'db_connect.php';
session_start();

$id=$_SESSION['current_user'];
$type=$_POST['type'];
if(isset($_POST['logout']))
{
	unset($_SESSION['current_user']);
	setcookie('login','true', time()-100);
}

if(!isset($_SESSION['current_user']))
{
	header("Location:index.php");
}

$q="select * from $type where uid='$id'";
$result=mysql_query($q, $con);
if(!$result)
{
	die('Could not enter data: ' . mysql_error());
}

$row = mysql_fetch_row($result);

if($row>0)
{
	echo"found";
}
?>