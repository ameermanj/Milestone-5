<?php

include 'db_connect.php';
session_start();
$id=$_SESSION['current_emp'];
$name=$_POST['name'];
//$query="select * from basic b,school s,university u,personal p where b.uid=$id and s.uid=$id and u.uid=$id and p.uid=$id";
//$q="select uid from apply a, jobs j, emp e where a.jid=j.jid and e.id=j.userid and j.userid='$id'";
$q="select id from users where name ='$name'";
$res=mysql_query($q, $con);
if(!$res)
{
	die('Could not enter data: ' . mysql_error());
}
$id = mysql_fetch_array($res);
$query="select * from basic where uid=$id[0]";
$result = mysql_query($query,$con);
$row = mysql_fetch_row($result);
echo"<table border=1>";
if($row>0)
{
echo "
<tr>
<th>First name</th>
<th>$row[1]</th>
</tr>
<tr>
<th>Last name</th>
<th>$row[2]</th>
</tr>

<tr>
<th>Birth Day</th>
<th>$row[3]</th>
</tr>

<tr>
<th>Gender</th>
<th>$row[4]</th>
</tr>

<tr>
<th></th>
<th></th>
</tr>
";
}

$query="select * from school where uid=$id[0]";
$result = mysql_query($query,$con);
$row = mysql_fetch_row($result);
if($row>0)
{
echo "
<tr>
<th>School name</th>
<th>$row[1]</th>
</tr>

<tr>
<th>College Name</th>
<th>$row[2]</th>
</tr>

<tr>
<th>College Degree</th>
<th>$row[3]</th>
</tr>

<tr>
<th>College Marks</th>
<th>$row[4]</th>
</tr>
<tr>
<th></th>
<th></th>
</tr>
";
}
$query="select * from university where uid=$id[0]";
$result = mysql_query($query,$con);
$row = mysql_fetch_row($result);
if($row>0)
{
echo "
<tr>
<th>University Name</th>
<th>$row[1]</th>
</tr>

<tr>
<th>University Degree</th>
<th>$row[2]</th>
</tr>

<tr>
<th>CGPA</th>
<th>$row[3]</th>
</tr>

<tr>
<th></th>
<th></th>
</tr>
";
}
$query="select * from personal where uid=$id[0]";
$result = mysql_query($query,$con);
$row = mysql_fetch_row($result);
if($row>0)
{
echo "
<tr>
<th>Hobby</th>
<th>$row[1]</th>
</tr>

<tr>
<th>Experties</th>
<th>$row[2]</th>
</tr>

<tr>
<th>About Me</th>
<th>$row[3]</th>
</tr>

</table>
";
}
?> 
