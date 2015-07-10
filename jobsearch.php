<html>
<head>
<title>Job Search</title>
<link href="login-box.css" rel="stylesheet" type="text/css" />
<link href="menu.css" rel="stylesheet" type="text/css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script>
$(document).ready(function(){
$(function(){
		var print=false;
		var value;
		var state;
		$('#disp_res').hide();
	var i=0;
	var name=[];
	var id=[];
$('#search').keyup(function(){
	var search_term = $(this).val();
	if($('#search').val()=="")
	$('#disp_res').hide();
					$.ajax({
					url:'serch_result.php',
					data:{term:search_term},
					type:'POST',
					success:function(data){
						$('#menu').html(data);
						$('.add').on('click',function(){
							value=$(this).text();
			$.ajax({
					url:'viewpostjob.php',
					data:{id:value},
					type:'POST',
					dataType:'json',
					success:function(data){
						$('#jobid').html(data.jid);
						$('#jobname').html(data.jname);
						$('#jobtag').html(data.tag);
						$('#company').html(data.company);
						$('#jobdes').html(data.descrip);
						$('#disp_res').show(500);
					},
					error:function(data){
					$('#result').html(data);
					}
				});
					});
					},
					error:function(data){
					$('#result').html(data);
					}
				});
	
});
$('#apply').click(function(){

				$.ajax({
					url:'apply.php',
					data:{b_id:value},
					type:'POST',
					success:function(data){
						if(data!="ok")
							window.location ='login.php';
						else
						alert("Job applied Successfully");
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
<a id="btn" href="logout.php" >Logout</a>
<?php
include 'header.php';
?>

<input type ="text" id ="search" class="login-box-field" placeholder="Enter Search Tag">
<div id="search_results"></div>

<div id ="menu">
<ul>
</ul>
</div>

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
  <label for="first_name">Company</label>
  
 </td>
 <td valign="top">
 <div id="company"></div>
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
<tr>
  <td valign="top">
 <input type="button" id="apply" value="Apply"/>
 </td>
 </tr>
</table>
</div>
<div id="result"></div>
</body>
</html>