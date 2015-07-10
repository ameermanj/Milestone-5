<?php
include 'db_connect.php';
session_start();
if(isset($_POST['term']))
{
$term=$_POST['term'];
}
if(!empty($term))
{
	$search = mysql_query("Select * from jobs where (jname like '%$term%' or tag like '%$term%') and avail='yes'");
	if($search)
	{
	$count = mysql_num_rows($search);
	$suffix = ($count >1) ?'s':'';
	?>
	<p>Your search for <strong><?php echo $term?></strong> returned <strong><?php echo $count?></strong> result<?php echo $suffix?>
	<?php
	while ($row = mysql_fetch_array($search)) 
{
	?>
	<ul><li class="add"><?php echo$row['jname']?></li></ul>
	<div class="del"><?php echo $row['descrip']?></div>
<?php
}
	}
	else
	{
		die('Could not display data: ' . mysql_error());
	}

}
/* 	while($result = mysql_fetch_assoc($search))
	{
		echo '<strong>'.$result['jname'].'</strong>';
	} */

?>