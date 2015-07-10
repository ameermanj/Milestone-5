<?php
session_start();
if(!isset($_SESSION['current_user']))
{
	header("Location:login.php");
}
?>
<html>
<head>
<link href="login-box.css" rel="stylesheet" type="text/css" />
<link href="menu.css" rel="stylesheet" type="text/css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
$(document).ready(function(){
	var b=false;
	var u=false;
	var s=false;
	var p=false;
	
	$(function () {
		$('#basic').hide();
		$('#school').hide();
		$('#university').hide();
		$('#personal').hide();
		$('#submit').hide();
		$.ajax({
					url:'checkdata.php',
					data:{type:"basic"},
					type:'POST',
					success:function(data){
						if(data=="found")
						{
						$('#b').hide();
						}
					}
				});
				
		$.ajax({
					url:'checkdata.php',
					data:{type:"school"},
					type:'POST',
					success:function(data){
						if(data=="found")
						{
						$('#s').hide();
						}
					}
				});
				
		$.ajax({
					url:'checkdata.php',
					data:{type:"university"},
					type:'POST',
					success:function(data){
						if(data=="found")
						{
						$('#u').hide();
						}
					}
				});
				
		$.ajax({
					url:'checkdata.php',
					data:{type:"personal"},
					type:'POST',
					success:function(data){
						if(data=="found")
						{
						$('#p').hide();
						}
					}
				});
				
				
////////////////////////////////////////////////////////////
				
		$('#b').click(function(){
			if(b)
				b=false;
			else
			{
				b=true;
				s=false;
				p=false;
				u=false;
			}
			$('#basic').toggle(500);
			$('#school').hide();
			$('#university').hide();
			$('#personal').hide();
			$('#display').hide();
			if(b)
			{
				$('#submit').show(500);
				$('#submit').click(function(){
					
				var fname = $("#fname").val();
				var lname = $("#lname").val();
				var bday = $("#bday").val();
				var gender="";
				if($("input[type='radio'].gen").is(':checked')) {
				gender = $("input[type='radio'].gen:checked").val();
				}
				if(fname.length==0 || lname.length==0 ||bday.length==0||gender.length==0)
					alert("Fill All Field");
				else
				$.ajax({
					url:'test.php',
					data:{fname:fname,lname:lname,bday:bday,gender:gender,type:"basic"},
					type:'POST',
					success:function(data){
						$('#b').hide();
						$('#basic').hide();
						$('#submit').hide();
						count--;
						alert(data);
					}
				});
					
				});
			}
			else
				$('#submit').hide();
		});
		

		
			$('#s').click(function(){
			if(s)
				s=false;
			else
			{
				b=false;
				s=true;
				p=false;
				u=false;
			}
			$('#school').toggle(500);
			$('#basic').hide();
			$('#university').hide();
			$('#personal').hide();
			$('#display').hide();
			if(s)
			{
				$('#submit').show(500);
				$('#submit').click(function(){
					
				var sname = $("#sname").val();
				var cname = $("#cname").val();
				var cdegree = $("#cdegree").val();
				var cmarks = $("#cmarks").val();
				if(sname.length==0 || cname.length==0 ||cdegree.length==0||cmarks.length==0)
					alert("Fill All Field");
				else
				$.ajax({
					url:'test.php',
					data:{sname:sname,cname:cname,cdegree:cdegree,cmarks:cmarks,type:"school"},
					type:'POST',
					success:function(data){
						$('#s').hide();
						$('#school').hide();
						$('#submit').hide();
						count--;
						alert(data);
						
					}
				});
					
				});
			}
			else
				$('#submit').hide();
		});
		

		
			$('#u').click(function(){
			if(u)
				u=false;
			else
			{
				b=false;
				s=false;
				p=false;
				u=true;
			}
			$('#school').toggle(500);
			$('#university').toggle(500);
			if($( "#university" ).is( ":visible" ))
			$('#school').hide();
			$('#basic').hide();
			$('#personal').hide();
			$('#display').hide();
			
			if(u)
			{
				$('#submit').show(500);
				$('#submit').click(function(){
					
				var uname = $("#uname").val();
				var udegree = $("#udegree").val();
				var cgpa = $("#cgpa").val();
				if(uname.length==0 || udegree.length==0 ||cgpa.length==0)
					alert("Fill All Field");
				else
				$.ajax({
					url:'test.php',
					data:{uname:uname,udegree:udegree,cgpa:cgpa,type:"university"},
					type:'POST',
					success:function(data){
						$('#u').hide();
						$('#university').hide();
						$('#submit').hide();
						alert(data);
						cout--;
					}
				});
					
				});
			}
			else
				$('#submit').hide();
		});
		
		
			$('#p').click(function(){
			if(p)
				p=false;
			else
			{
				b=false;
				s=false;
				p=true;
				u=false;
			}
			$('#personal').toggle(500);
			
			$('#school').hide();
			$('#university').hide();
			$('#basic').hide();
			$('#display').hide();
			
			if(p)
			{
				$('#submit').show(500);
				$('#submit').click(function(){
					
				var hobby = $("#hobby").val();
				var expert = $("#expert").val();
				var about = $("#about").val();
				if(hobby.length==0 || expert.length==0 ||about.length==0)
					alert("Fill All Field");
				else
				$.ajax({
					url:'test.php',
					data:{hobby:hobby,expert:expert,about:about,type:"personal"},
					type:'POST',
					success:function(data){
						$('#p').hide();
						$('#personal').hide();
						$('#submit').hide();
						count--;
						alert(data);
					}
				});
					
				});
			}
			else
				$('#submit').hide();
		});
		
			$('#dp').click(function(){
			$('#school').hide();
			$('#university').hide();
			$('#basic').hide();
			$('#personal').hide();
			$('#display').toggle(500);

				$.ajax({
					url:'show_profile.php',
					data:{},
					type:'POST',
					success:function(data){
						$("#display").html(data);
					}
				});
		});
	});
});
</script>
</head>
<title>Logged</title>
<body>

<a id="btn" href="logout.php" >Logout</a>


<?php
include 'header.php';
?>

<p>Successfully Login</p>
<div id = "result"></div>
<div id ="menu">

<ul>
<li id="b">Basic </li>
<li id="s">School</li>
<li id="u">University</li>
<li id="p">Personal</li>
<li id="dp">Display Profile</li>
</ul>
</div>
<div id="set">
<div id="basic">
<div id="profile">
<H2>Basic</H2>
<div id="login-box-name">
First Name:</div><div id="login-box-field" ><input type='text' input id='fname' required class="form-login" title="Username" size="30" maxlength="30" /></div>
<div id="ferror"></div>
<div id="login-box-name">
Last Name:</div><div id="login-box-field" ><input type='text' input id='lname' required class="form-login" title="Username" size="30" maxlength="30" /></div>
<div id="lerror"></div>
<div id="login-box-name">
Date of Birth:</div><div id="login-box-field" ><input type='date' input id='bday' required class="form-login" title="Username" size="30" maxlength="30" /></div>
<div id="bderror"></div>
<div id="login-box-name">
Gender:</div>
<div id="gender" >
<input type="radio" class="gen" id="gender" name="gender" value="Male">Male</br>
<input type="radio" class="gen" id="gender" name="gender" value="Female">Female</div>
<div id="gerror"></div>
</div>
</div>

<div id="school">
<div id="profile">
<H2>School / College</H2>
<div id="login-box-name">
School Name:</div><div id="login-box-field" ><input type='text' input id='sname' required class="form-login" title="Username" size="30" maxlength="40" /></div>
<div id="login-box-name">
College Name:</div><div id="login-box-field" ><input type='text' input id='cname' required class="form-login" title="Username" size="30" maxlength="40" /></div>
<div id="login-box-name">
College Degree:</div><div id="login-box-field" ><input type='text' input id='cdegree' required class="form-login" title="Username" size="30" maxlength="30" /></div>
<div id="login-box-name">
College Marks:</div><div id="login-box-field" ><input type='text' input id='cmarks' required class="form-login" title="Username" size="30" maxlength="30" /></div>
</div>
</div>

<div id="university">
<div id="profile">
<H2>University</H2>
<div id="login-box-name">
University Name:</div><div id="login-box-field" ><input type='text' input id='uname' required class="form-login" title="Username" size="40" maxlength="30" /></div>
<div id="login-box-name">
University Degree:</div><div id="login-box-field" ><input type='text' input id='udegree' required class="form-login" title="Username" size="20" maxlength="30" /></div>
<div id="login-box-name">
CGPA:</div><div id="login-box-field" ><input type='text' input id='cgpa' class="form-login" required title="Username" size="30" maxlength="30" /></div>
</div>
</div>

<div id="personal">
<div id="profile">
<H2>Personal</H2>
<div id="login-box-name">
Hobbies:</div><div id="login-box-field" ><input type='text' input id='hobby' required class="form-login" title="Username" size="100" maxlength="30" /></div>
<div id="login-box-name">
Expertise:</div><div id="login-box-field" ><input type='text' input id='expert' required class="form-login" title="Username" size="100" maxlength="30" /></div>
<div id="login-box-name">
About me:</div><div id="login-box-field" ><textarea rows="4" cols="50" class ="form-login" id='about'></textarea></div>
</div>
</div>
<input type='image' id="submit" src="http://www.clker.com/cliparts/s/k/f/S/M/A/submit-button-png-hi.png" width="103" height="42"name='submit'  />
</div>
<div id="display"></div>
</body>

</html>
