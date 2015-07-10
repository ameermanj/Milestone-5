<?php
include 'db_connect.php';
session_start();
$jobid=$_POST['id'];
$q="select jid,jname,tag,avail,company,descrip from jobs j,emp e where e.id=j.userid and (j.jid='$jobid' or j.jname='$jobid')";
$res=mysql_query($q, $con);
if(!$res)
{
		die('Could not display data: ' . mysql_error());
}
$row = mysql_fetch_array($res);


echo json_encode($row);
mysql_close($con);

?>