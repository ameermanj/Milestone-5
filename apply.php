<?php
include 'db_connect.php';
session_start();

if(!isset($_SESSION['current_user']))
{
header("Location:login.php");
}
else{
	

$id=$_SESSION['current_user'];
$jname=$_POST['b_id'];

$jid=mysql_query("select jid from jobs where jname='$jname'", $con);
$jid = mysql_fetch_row($jid);
if(!$jid)
{
	die( mysql_error());
}

$insert = "insert into apply (uid,jid) values ('$id','$jid[0]')";
$enter=mysql_query($insert, $con);
if(!$enter)
{
	die( mysql_error());
}
else
echo "ok";
mysql_close($con);
}



?>