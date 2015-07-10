<?php
include 'db_connect.php';
session_start();
$id=$_SESSION['current_emp'];
if(!isset($_SESSION['current_emp']))
{
	header("Location:emp_login.php");
}
$jcode=$_POST['jcode'];
$jname=$_POST['jname'];
$tag=$_POST['tag'];
$avail=$_POST['avail'];
$des=$_POST['description'];


$insert = "insert into jobs (userid,jid,jname,tag,avail,descrip) values ('$id','$jcode','$jname','$tag','$avail','$des')";
$enter=mysql_query($insert, $con);
if(!$enter)
{
	die('Could not enter data: ' . mysql_error());
}
else
echo "Job Posted Successfully";



mysql_close($con);



?>