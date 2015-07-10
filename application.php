<?php
include 'db_connect.php';
session_start();
$id=$_SESSION['current_emp'];
if(!isset($_SESSION['current_emp']))
{
	header("Location:emp_login.php");
}

$q="select u.name from users u,apply a, jobs j, emp e where u.id=a.uid and a.jid=j.jid and e.id=j.userid and j.userid='$id'";
$res=mysql_query($q, $con);
if(!$res)
{
	die('Could not enter data: ' . mysql_error());
}
$data = array();
while ($row = mysql_fetch_array($res)) {
  $data = array(
    "id" => $row['name'],
  );
  $d[] = $data;
}

echo json_encode($d);
mysql_close($con);

?>