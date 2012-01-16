<?php
//Main Login Page

//Destroy any previous session data
//This way it requires a login
session_start();
session_destroy();

//get status
$status = $_GET['status'];

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title>Admin Login</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
<center>
<h1>Admin Login</h1>
<h3>Please login with the required password.</h3>
<form action="login.php" method="POST">
<table border="0">
<tr class="center">
<td>
<input type="password" size="20" name="f_pass">
<input type="submit" name="LogIn" value="Log In">
</td></tr>
</table>
</form>
<?php

if ($status == "error")
echo "<p class=\"error\">Error, password is incorrect.<br>Entries are cAsESEnsITiVE, do you have your capslock key on?...</p>";
if ($status == "session")
echo "<p class=\"error\">Your session has timed out, please re-login.</p>";
if ($status == "logout")
echo "<p class=\"success\">You have successfully logged out.</p>";
?>

<br>
</center>
</body>
</html>