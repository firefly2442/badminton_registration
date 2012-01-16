<?php
require_once("config.inc.php");

//connect to database
$db = mysql_connect($db_host, $db_user, $db_pass) or die("Cannot connect to database.");
mysql_select_db($db_name) or die("Error selecting database.");

?>

<html>
<title>Registered for Tournament</title>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>

<h1>Registered for Tournament</h1>
<center><big>Not registered?  <a href="register.php">Click here.</a></big></center>

<br>
<center>
<table>
<tr>
<td><a href="#men_single">Men's Singles</a></td>
<td><a href="#men_double">Men's Doubles</a></td>
<td><a href="#woman_single">Woman's Singles</a></td>
<td><a href="#woman_double">Woman's Doubles</a></td>
<td><a href="#mixed_double">Mixed Doubles</a></td>
</tr>
</table>
</center>
<br>
<br>
<br>


<a name="men_single"></a>
<h2>Men's Singles:</h2>
<table>
<tr>
<th width="80%">Name</th><th width="80%">Payment Received</th>
</tr>
<?php
$result = mysql_query("SELECT * FROM tournament WHERE men_single = true ORDER BY first_name") or die("Can't run SQL query.");

$row_count = 0;
while ($row = mysql_fetch_array($result, MYSQL_ASSOC))
{
	$row_color = ($row_count % 2);
	echo "<tr class='row";
	echo $row_color;
	echo "'>\n";
		echo "<td class='center'>".$row['first_name']." ".$row['last_name']."</td>";
		echo "<td class='center'>";
			echo (($row['paid'] == true) ? "Yes" : "No");		
		echo "</td>\n";
	echo "</tr>\n";
	$row_count++;
}
echo "</table><hr><br>";
?>


<a name="men_double"></a>
<h2>Men's Doubles:</h2>
<table>
<tr>
<th width="40%">Name</th><th width="40%">Partner</th><th width="20%">Payment Received</th>
</tr>
<?php
$result = mysql_query("SELECT * FROM tournament WHERE men_double = true ORDER BY first_name") or die("Can't run SQL query.");

$row_count = 0;
while ($row = mysql_fetch_array($result, MYSQL_ASSOC))
{
	$row_color = ($row_count % 2);
	echo "<tr class='row";
	echo $row_color;
	echo "'>\n";
		echo "<td class='center'>".$row['first_name']." ".$row['last_name']."</td>";
		echo "<td class='center'>".$row['men_double_name']."</td>";
		echo "<td class='center'>";
			echo (($row['paid'] == true) ? "Yes" : "No");		
		echo "</td>\n";
	echo "</tr>\n";
	$row_count++;
}
echo "</table><hr><br>";
?>


<a name="woman_single"></a>
<h2>Woman's Singles:</h2>
<table>
<tr>
<th width="80%">Name</th><th width="20%">Payment Received</th>
</tr>
<?php
$result = mysql_query("SELECT * FROM tournament WHERE woman_single = true ORDER BY first_name") or die("Can't run SQL query.");

$row_count = 0;
while ($row = mysql_fetch_array($result, MYSQL_ASSOC))
{
	$row_color = ($row_count % 2);
	echo "<tr class='row";
	echo $row_color;
	echo "'>\n";
		echo "<td class='center'>".$row['first_name']." ".$row['last_name']."</td>";
		echo "<td class='center'>";
			echo (($row['paid'] == true) ? "Yes" : "No");		
		echo "</td>\n";
	echo "</tr>\n";
	$row_count++;
}
echo "</table><hr><br>";
?>


<a name="woman_double"></a>
<h2>Woman's Doubles:</h2>
<table>
<tr>
<th width="40%">Name</th><th width="40%">Partner</th><th width="20%">Payment Received</th>
</tr>
<?php
$result = mysql_query("SELECT * FROM tournament WHERE woman_double = true ORDER BY first_name") or die("Can't run SQL query.");

$row_count = 0;
while ($row = mysql_fetch_array($result, MYSQL_ASSOC))
{
	$row_color = ($row_count % 2);
	echo "<tr class='row";
	echo $row_color;
	echo "'>\n";
		echo "<td class='center'>".$row['first_name']." ".$row['last_name']."</td>";
		echo "<td class='center'>".$row['woman_double_name']."</td>";
		echo "<td class='center'>";
			echo (($row['paid'] == true) ? "Yes" : "No");		
		echo "</td>\n";
	echo "</tr>\n";
	$row_count++;
}
echo "</table><hr><br>";
?>

<a name="mixed_double"></a>
<h2>Mixed Doubles:</h2>
<table>
<tr>
<th width="40%">Name</th><th width="40%">Partner</th><th width="20%">Payment Received</th>
</tr>
<?php
$result = mysql_query("SELECT * FROM tournament WHERE mixed_double = true ORDER BY first_name") or die("Can't run SQL query.");

$row_count = 0;
while ($row = mysql_fetch_array($result, MYSQL_ASSOC))
{
	$row_color = ($row_count % 2);
	echo "<tr class='row";
	echo $row_color;
	echo "'>\n";
		echo "<td class='center'>".$row['first_name']." ".$row['last_name']."</td>";
		echo "<td class='center'>".$row['mixed_double_name']."</td>";
		echo "<td class='center'>";
			echo (($row['paid'] == true) ? "Yes" : "No");		
		echo "</td>\n";
	echo "</tr>\n";
	$row_count++;
}
echo "</table><hr><br>";
?>



</body>
</html>
