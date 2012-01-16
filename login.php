<?php
//Login Script
//Validates Username and Password
require_once ("config.inc.php");


if ($_POST['f_pass'] == $password)
{
	//successful admin login
	session_start();
	$_SESSION['admin_logged_in'] = true;
	header("Location: admin.php");
	exit();
}

//Username or password was incorrect at this point!
header("Location: authenticate.php?status=error");
exit();

?>
