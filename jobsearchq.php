<?php
include 'db_connect.php';
session_start();
if(!isset($_SESSION['current_user']))
{
	header("Location:login.php");
}

$q="select jid,jname from jobs where avail='yes'";
$res=mysql_query($q, $con);
$data = array();
while ($row = mysql_fetch_array($res)) {
  $data = array(
    "id" => $row['jid'],
    "name" => $row['jname']
  );
  $d[] = $data;
}

echo json_encode($d);
mysql_close($con);

?>