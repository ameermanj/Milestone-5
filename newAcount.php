<html>
<head>
<title>Sign Up</title>
<link href="login-box.css" rel="stylesheet" type="text/css" />
<link href="menu.css" rel="stylesheet" type="text/css" />

</head>

<body>
<?php
include 'header.php';
?>
<div id="set">
<div id="login-box">

<H2>Sign Up</H2>

<form action = "submit.php" method="post">

<div id="signup-box-name">
Name:</div><div id="login-box-field" ><input type='text' required name='name' id='n' class="form-login" title="name"size="30" maxlength="30" /></div>
<div id="signup-box-name">
User Name:</div><div id="login-box-field" ><input type='text' required name='username' id='user' class="form-login" title="Username" size="30" maxlength="30" /></div>
<div id="signup-box-name">
Email:</div><div id="login-box-field" ><input type='text' required name='email' id='email' class="form-login" title="Email" size="30" maxlength="40" /></div>
<div id="signup-box-name">
Password:</div><div id="login-box-field"><input name="password" required type='password' id='pass' class="form-login" title="Password" size="30" maxlength="15" /></div>

<div id="submit">
<input type='image' id='sub' src="http://www.clker.com/cliparts/s/k/f/S/M/A/submit-button-png-md.png" width="103" height="42"name='login' />
</div>
</form>
</div>
</div>
<?php
session_start();

if(!isset($_SESSION['duplicate']))
	$_SESSION['duplicate'] = false;

if($_SESSION['duplicate'])
{
	echo '<p> User name or Email already exist please try with different Email or user name.</p>';
	$_SESSION['duplicate'] = false;
}
?>

</div>

</body>
</html>