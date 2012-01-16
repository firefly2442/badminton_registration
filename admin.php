<?php

require ("config.inc.php");

//Check session
session_start();

if (!$_SESSION['admin_logged_in'])
{
	//check fails
	header("Location: authenticate.php?status=session");
	exit();
}

//connect to database
$db = mysql_connect($db_host, $db_user, $db_pass) or die("Cannot connect to database.");
mysql_select_db($db_name) or die("Error selecting database.");

if (isset($_POST['highest_id']))
{
	//update database
	for ($i = 0; $i < $_POST['highest_id']; $i++)
	{
		if ($_POST[$i] == "on")
			$query = "UPDATE tournament SET paid=true WHERE id='".$i."'";
		else
			$query = "UPDATE tournament SET paid=false WHERE id='".$i."'";
			
		mysql_query($query) or die("Can't run SQL query.");
	}
}

?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Administration Page</title>

</head>
<body>

<h1>Administration Page</h1>
<br>
<b><a href="./authenticate.php?status=logout">Logout</a></b>
<hr>

<form action="admin.php" method="POST">

<table>
<tr>
<th>Name</th><th>Club Member</th><th>Gender</th><th>Address/Phone</th><th>Age</th><th>Exp. Level</th><th>Men's Singles</th>
<th>Men's Doubles</th><th>Woman's Singles</th><th>Woman's Doubles</th>
<th>Mixed Doubles</th><th>Email (Contact Future)</th><th>Payment Received</th><th>Register Date</th>
</tr>

<?php

$result = mysql_query("SELECT * FROM tournament ORDER BY first_name") or die("Can't run SQL query.");

$highest_id = 0;
$row_count = 0;
while ($row = mysql_fetch_array($result, MYSQL_ASSOC))
{
	$row_color = ($row_count % 2);
	echo "<tr class='row";
	echo $row_color;
	echo "'>\n";
		echo "<td class='center'>".$row['first_name']." ".$row['last_name']."</td>";
		echo "<td class='center'>";
			echo (($row['club_member'] == true) ? "Yes" : "No");
		echo "<td class='center'>".$row['gender']."</td>";
		echo "<td class='center'>".$row['address']."<br>".$row['city'].", ".$row['state']." ".$row['zip']."<br>".$row['phone']."</td>";
		echo "<td class='center'>".$row['age']."</td>";
		echo "<td class='center'>".$row['exp_level']."</td>";
		echo "<td class='center'>";
			echo (($row['men_single'] == true) ? "Yes" : "No");
		echo "</td>\n";
		echo "<td class='center'>";
		if ($row['men_double'] == true)
		{
			echo "Yes";
			echo " (".$row['men_double_name'].")";
		}
		else
			echo "No";
		echo "</td>\n";
		echo "<td class='center'>";
			echo (($row['woman_single'] == true) ? "Yes" : "No");
		echo "</td>";
		echo "<td class='center'>";
		if ($row['woman_double'] == true)
		{
			echo "Yes";
			echo " (".$row['woman_double_name'].")";
		}
		else
			echo "No";
		echo "</td>\n";
		echo "<td class='center'>";
		if ($row['mixed_double'] == true)
		{
			echo "Yes";
			echo " (".$row['mixed_double_name'].")";
		}
		else
			echo "No";
		echo "</td>\n";
		echo "<td class='center'>".$row['email_address'];
			echo (($row['contact_future'] == true) ? "(Yes)" : "(No)");
		echo "</td>";
		echo "<td class='center'>";

			echo "<input type='checkbox' name='";
			echo $row['id'];
			
			if ($row['paid'] == true)
				echo "' checked>";
			else
				echo "'>";
		
		echo "</td>\n";
		echo "<td class='center'>".$row['date']."</td>";
		
	echo "</tr>\n";
	$row_count++;
	if ($highest_id < $row['id'])
		$highest_id = $row['id'];
}

?>
</table>
<?php
echo "<input type='hidden' name='highest_id' value='".$highest_id."'>\n";
?>
<br><br>
<center>
<input type="submit" name="submit" value="Update">
</center>
</form>

<br>
</body>
</html>