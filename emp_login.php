
<html>
<head>
<title>Login Box</title>
<link href="login-box.css" rel="stylesheet" type="text/css" />


</head>

<body>
<?php
include 'header.php';
?>
<div id="result"> </div>
<div id="set">
<div id="login-box">

<H2>Login</H2>

<form action = "emp_loginq.php" method = "post">
<div id="name">
User Name:</div><div id="login-box-field" ><input type='text' name='username' required class="form-login" id ="user" title="Username" <?php if(isset($_COOKIE['eid']))echo "value = ".$_COOKIE['eid']; ?> size="30" maxlength="2048" />
<div id="error" class ="er"></div>
</div>

<div id="name">
Password:</div><div id="login-box-field"><input name="password" type="password" required class ="form-login" id="pass" title="Password" <?php if(isset($_COOKIE['epass']))echo "value = ".$_COOKIE['epass'];?> size="30" maxlength="2048" />
<div id="perror" class ="er"></div>
</div>
<div id="remember">
<input type="checkbox" id="rem" name="remember" <?php if(isset($_COOKIE['eid'])) echo "checked =check"?> >Remember me</div>
<div id="newid"><a href ="new_emp.php">Create new account</a></div>
<div id="button">
<input type='image' id='login' src="http://www.clker.com/cliparts/m/m/x/r/J/6/login-button-png-hi.png" width="103" height="42"name='login' />
</div>

</form>
</div>
</div>

<?php
session_start();
if(!isset($_SESSION['ewrong']))
	$_SESSION['ewrong'] = false;

if($_SESSION['ewrong'])
{
	echo"<p>User name or password incorrect</p>";
	$_SESSION['ewrong'] = false;
}
if(isset($_SESSION['current_emp']))
	echo header("Location:postjob.php");
	
?>

</body>
</html>
