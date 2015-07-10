<?php
include 'db_connect.php';
session_start();
$name=$_POST['name'];
$user=$_POST['username'];
$mail=$_POST['email'];
$pass=$_POST['password'];
$com=$_POST['company'];

if(!trim($name) == '' && !trim($user) == '' && !trim($mail) == '' && !trim($pass) == ''&& !trim($com) == '')
{
$q="select userName,email from emp where userName='$user' or email='$mail'";
$result=mysql_query($q, $con);
if(!$result)
{
	die('Could not enter data: ' . mysql_error());
}

$row = mysql_fetch_row($result);

if($row>0)
{
$_SESSION['duplicate'] = true;
echo header ("Location:new_emp.php");
}
else
{
$insert = "insert into emp (name,userName,email,pass,company) values ('$name','$user','$mail','$pass','$com')";
$enter=mysql_query($insert, $con);
if(!$enter)
{
	die('Could not enter data: ' . mysql_error());
}
echo "<p>Account Created Successfully.</p>";
echo "<a href='emp_login.php'> <p>Login</p></a>";
mysql_close($con);
}
}

?>