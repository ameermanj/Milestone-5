<?php

include 'db_connect.php';
session_start();
$id=$_SESSION['current_user'];
//$query="select * from basic b,school s,university u,personal p where b.uid=$id and s.uid=$id and u.uid=$id and p.uid=$id";
$query="select * from basic where uid=$id";
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

$query="select * from school where uid=$id";
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
$query="select * from university where uid=$id";
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
$query="select * from personal where uid=$id";
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
