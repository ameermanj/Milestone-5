<?php
include 'db_connect.php';
session_start();
$id=$_SESSION['current_emp'];
if(!isset($_SESSION['current_emp']))
{
	header("Location:emp_login.php");
}
$jid=$_POST['b_id'];
$state= $_POST['state'];


$insert = "update jobs set avail='$state' where jid='$jid'";
$enter=mysql_query($insert, $con);
if(!$enter)
{
	die('Could not enter data: ' . mysql_error());
}
else
echo "Availability status changed Successfully";



mysql_close($con);



?>