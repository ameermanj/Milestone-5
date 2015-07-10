<?php
include 'db_connect.php';
session_start();

if(!isset($_SESSION['current_emp']))
{
	header("Location:emp_login.php");
}
$id=$_SESSION['current_emp'];
?>

<html>
<head>
<title>Sign Up</title>
<link href="login-box.css" rel="stylesheet" type="text/css" />
<link href="menu.css" rel="stylesheet" type="text/css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script>
$(document).ready(function(){
$(function(){
		var print=false;
		var appprint=false;
		var value;
		var state;
		$('#disp_res').hide();
$('.viewsub').click(function(){
	var i=0;
	var name=[];
	var id=[];
					$.ajax({
					url:'postjob_button.php',
					data:{},
					dataType: "json",
					type:'POST',
					
					success:function(data){
						$('#menu').append('</br></br>');
						if(!print)
						{
						$.each(data, function(idx, d){
							$('<ul><li class="add"></li></ul>').appendTo('#menu').on('click', function() {
								value=$(this).text();
								$('#post').hide();
				$.ajax({
					url:'viewpostjob.php',
					data:{id:value},
					type:'POST',
					dataType:'json',
					success:function(data){
						$('#jobid').html(data.jid);
						$('#jobname').html(data.jname);
						$('#jobtag').html(data.tag);
						$('#jobavail').html(data.avail);
						$('#jobdes').html(data.descrip);
						$('#disp_res').show(500);
					},
					error:function(data){
					$('#result').html(data);
					}
				});
								});
							name[i]=d.name;
							id[i]=d.id;
							i++
							print=true;
							});
								i=0;
						$('.add').each(function(){
						$(this).text(id[i]);
							i++;
							});
						}
					},
					error:function(data){
					$('#result').html(data);
					}
				});

});
$('.add').click(function(){
	alert($('.add').text());
});
$('#sub').click(function(){
	
				var jcode = $("#jcode").val();
				var jname = $("#jname").val();
				var tag = $("#tag").val();
				var avail=$("#avail").val();
				var des = $("#description").val();

				$.ajax({
					url:'postjob_q.php',
					data:{jcode:jcode,jname:jname,tag:tag,avail:avail,description:des},
					type:'POST',
					success:function(data){
					alert(data);
					},
					error:function(data){
					$('#result').html(data);
					}
				});
});

$('#set_avail').click(function(){
	
	if($('#jobavail').text()=="YES")
		state="NO";
	else
		state="YES";

				$.ajax({
					url:'set_avail.php',
					data:{b_id:value,state:state},
					type:'POST',
					success:function(data){
					$('#jobavail').html(state);
					},
					error:function(data){
					$('#result').html(data);
					}
				});
});
$('.app').click(function(){
	var i=0;
	var name=[];
	var id=[];
	
					$.ajax({
					url:'application.php',
					data:{},
					dataType: "json",
					type:'POST',
					success:function(data){
						$('#menu').append('</br></br>');
						if(!appprint)
						{
						$.each(data, function(idx, d){
							$('<ul><li class="ap"></li></ul>').appendTo('#men').on('click', function() {
								value=$(this).text();
								$('#post').hide();

				$.ajax({
					url:'show_app.php',
					data:{name:value},
					type:'POST',
					success:function(data){
						$("#disp_res").hide();
						$("#display").html(data);
					}
				});
								});
							name[i]=d.name;
							id[i]=d.id;
							i++
							appprint=true;
							});
								i=0;
						$('.ap').each(function(){
						$(this).text(id[i]);
							i++;
							});
						}
					},
					error:function(data){
					$('#result').html(data);
					}
				});

});
});
});


</script>
</head>
<body>
<a id="btn" href="emp_logout.php" >Logout</a>
<?php
include 'header.php';
?>

<div id ="menu">
<ul>
<li id="view" class="viewsub">View Posted Jobs </li>
</ul>
</div>

<div id ="men">
<ul >
<li id="view" class="app">Applications </li>
</ul>
</div>
<div id="display"></div>

<div id="disp_res">
<table width="450px" id="login-box">
<tr>
 <td valign="top">
  <label for="first_name"><h3>Job Detail</h3></label>
 </td>
</tr>
<tr>
 <td valign="top">
  <label for="first_name">Job Code</label>
 </td>
 <td valign="top">
 <div id="jobid"></div>
 </td>
</tr>

<tr>
 <td valign="top">
  <label for="first_name">Job Name</label>
 </td>
 <td valign="top">
 <div id="jobname"></div>
 </td>
</tr>

<tr>
 <td valign="top">
  <label for="first_name">Tag</label>
 </td>
 <td valign="top">
 <div id="jobtag"></div>
 </td>
</tr>

<tr>
 <td valign="top">
  <label for="first_name">Availability</label>
  
 </td>
 <td valign="top">
 <div id="jobavail"></div>
 <input type="button" id="set_avail" value="Set"/>
 </td>
</tr>

<tr>
 <td valign="top">
  <label for="first_name">Description</label>
 </td>
 <td valign="top">
 <div id="jobdes"></div>
 </td>
</tr>

</table>
</div>

<div id="post">
<table width="450px" id="login-box">
</tr>
<tr>
 <td valign="top">
  <label for="first_name">Job Code</label>
 </td>
 <td valign="top">
  <input  type="text" required id="jcode" maxlength="50" size="30">
 </td>
</tr>
 
<tr>
 <td valign="top"">
  <label for="last_name">Job Name</label>
 </td>
 <td valign="top">
  <input  type="text" required id="jname" maxlength="50" size="30">
 </td>
</tr>
<tr>
 <td valign="top">
  <label for="email">Tags</label>
 </td>
 <td valign="top">
  <input  type="text" required id="tag" maxlength="80" size="30">
 </td>
 
</tr>
<tr>
 <td valign="top">
  <label for="telephone">Availability</label>
 </td>
 <td valign="top">
  <input  type="text" required id="avail" maxlength="30" size="30">
 </td>
</tr>
<tr>
 <td valign="top">
  <label for="comments">Description</label>
 </td>
 <td valign="top">
  <textarea  id="description" required maxlength="1000" cols="25" rows="6"></textarea>
 </td>
 
</tr>
<tr>
 <td colspan="2" style="text-align:center">
<div id="submit">
<input type='image' id='sub' src="http://www.clker.com/cliparts/s/k/f/S/M/A/submit-button-png-md.png" width="103" height="42"name='login' />
</div>
 </td>
</tr>
</table>
</div>
</div>

</body>
</html>