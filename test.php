<?php
include 'db_connect.php';
session_start();
$type = $_POST['type'];

if($type=="basic")
{
$uid=$_SESSION['current_user'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$bday = $_POST['bday'];
$gender = $_POST['gender'];

$insert = "insert into basic (uid,fname,lname,DOB,gender) 
values ('$uid','$fname','$lname','$bday','$gender')";
}
else if($type=="school")
{
	$uid=$_SESSION['current_user'];
	$sname = $_POST['sname'];
	$cname = $_POST['cname'];
	$cdegree = $_POST['cdegree'];
	$cmarks = $_POST['cmarks'];
	
	$insert = "insert into school (uid,sname,cname,cdegree,cmarks) 
	values ('$uid','$sname','$cname','$cdegree','$cmarks')";
}

else if($type=="university")
{
	$uid=$_SESSION['current_user'];
	$uname = $_POST['uname'];
	$udegree = $_POST['udegree'];
	$cgpa = $_POST['cgpa'];
	
	$insert = "insert into university (uid,uname,udegree,CGPA) 
	values ('$uid','$uname','$udegree','$cgpa')";
}

else if($type=="personal")
{
	$uid=$_SESSION['current_user'];
	$hobby = $_POST['hobby'];
	$expert = $_POST['expert'];
	$about = $_POST['about'];
	
	$insert = "insert into personal (uid,hobbies,experties,about) 
	values ('$uid','$hobby','$expert','$about')";
}
$query=mysql_query($insert,$con);
if(!$query)
{
	die('Could not enter data: ' . mysql_error());
}
else
	echo "Data successfully added. ";


?>