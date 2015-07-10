<?php
include 'db_connect.php';
session_start();
$uid=$_SESSION['current_user'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$bday = $_POST['bday'];
$gender = $_POST['gender'];
$sname = $_POST['sname'];
$cname = $_POST['cname'];
$cdegree = $_POST['cdegree'];
$cmarks = $_POST['cmarks'];
$uname = $_POST['uname'];
$udegree = $_POST['udegree'];
$cgpa = $_POST['cgpa'];
$hobby = $_POST['hobby'];
$expert = $_POST['expert'];
$about = $_POST['about'];

$insert = "insert into userprofile (uid,fname,lname,DOB,gender,sname,cname,cdegree,cmarks,uname,udegree,CGPA,hobbies,experties,about) 
values ('$uid','$fname','$lname','$bday','$gender','$sname','$cname','$cdegree','$cmarks','$uname','$udegree','$cgpa','$hobby','$expert','$about')";
$query=mysql_query($insert,$con);
if(!$query)
{
	die('Could not enter data: ' . mysql_error());
}
else
	echo header("Location: show_profile.php");

?>