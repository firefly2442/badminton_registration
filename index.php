<?php
require_once("config.inc.php");
?>

<html>
<title>ISU Badminton Open Registration</title>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link rel="stylesheet" href="css/style.css" type="text/css" />
</head>
<body>

<center>
<?php
echo $tournament_details;
?>
</center>

<big><big>
<ul>
	<li class="mainli"><a href="./register.php">Register for Tournament</a></li>
	<li class="mainli"><a href="./view_registered.php">See who is currently registered for the tournament</a></li>
	<li class="mainli"><a href="./view_registered.php#payments">Check your registration payment status</a></li>
	<li class="mainli"><a href="http://www.stuorg.iastate.edu/badminton/">ISU Badminton Website</a></li>
	<li class="mainli"><a href="https://maps.google.com/?ie=UTF8&hq=&ll=42.0268,-93.64079&z=18">Google Map of Forker Building</a></li>
	<li class="mainli"><a href="./admin.php">Administration</a></li>
</ul>
</big></big>

</body>
</html>
