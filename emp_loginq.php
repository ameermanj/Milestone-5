<html>
<head>
<link href="login-box.css" rel="stylesheet" type="text/css" />
</head>
</html>
<?php
include 'db_connect.php';
session_start();
$year = time() + 31536000;
$user=$_POST['username'];
$pass=$_POST['password'];

if(isset($_POST['remember'])) {
setcookie('eid', $_POST['username'], $year);
setcookie('epass', $_POST['password'], $year);
}
elseif(!isset($_POST['remember'])){
	$past = time() - 100;
	if(isset($_COOKIE['id'])) {
		
		setcookie('eid', gone, $past);
	}
	if(isset($_COOKIE['pass']))
	{
		setcookie('epass', gone, $past);
	}
}


$q="select id,userName,pass from emp where userName='$user' and pass='$pass'";
$result=mysql_query($q, $con);
if(!$result)
{
	die('Could not enter data: ' . mysql_error());
}

$row = mysql_fetch_row($result);

if($row>0)
$_SESSION['current_emp'] = $row[0];

if(isset($_SESSION['current_emp']))
{
	$_SESSION['ewrong']=false;
	setcookie('elogin','true', $year);
	echo header("Location:postjob.php");
}
else
{
	$_SESSION['ewrong']=true;
	echo header ("Location:emp_login.php");
}

?>