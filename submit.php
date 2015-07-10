<html>
<head>
<link href="login-box.css" rel="stylesheet" type="text/css" />
</head>
</html>
<?php
//session_start();
//$year = time() + 31536000;
if(isset($_POST['back']))
	header('Location:index.php');
include 'db_connect.php';
session_start();
$name=$_POST['name'];
$user=$_POST['username'];
$mail=$_POST['email'];
$pass=$_POST['password'];

if(!trim($name) == '' && !trim($user) == '' && !trim($mail) == '' && !trim($pass) == '')
{
$q="select userName,email from users where userName='$user' or email='$mail'";
$result=mysql_query($q, $con);
if(!$result)
{
	die('Could not enter data: ' . mysql_error());
}

$row = mysql_fetch_row($result);

if($row>0)
{
$_SESSION['duplicate'] = true;
echo header ("Location:newAcount.php");
}
else
{
$insert = "insert into users (name,userName,email,pass) values ('$name','$user','$mail','$pass')";
$enter=mysql_query($insert, $con);
if(!$enter)
{
	die('Could not enter data: ' . mysql_error());
}
echo "<p>Account Created Successfully.</p>";
echo "<a href='index.php'> <p>Login</p></a>";
mysql_close($con);
}
}

?>