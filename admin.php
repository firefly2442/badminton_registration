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

//if information was sent, process it
if (isset($_POST['id']) && isset($_POST['checked']))
{
	if ($_POST['checked'] == "true") {
		$query = "UPDATE tournament SET paid=true WHERE id='".mysql_real_escape_string($_POST['id'])."'";
	} else {
		$query = "UPDATE tournament SET paid=false WHERE id='".mysql_real_escape_string($_POST['id'])."'";
	}

	mysql_query($query) or die("Can't run SQL query.");
	exit();
}

?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<script type="text/javascript" src="javascript/jquery-1.7.1.min.js"></script>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Administration Page</title>

</head>
<body>

<div id="breadcrumb">
<a href="index.php">Home</a> | <a href="view_registered.php">View Registered Players</a>
</div>

<script>
//http://api.jquery.com/change/
$(document).ready(function(){
	$.ajaxSetup({async:false}); //disable async so that post blocks until it's finished
	$("#fadeout_text").hide(); //hide by default, only show when there's an update
    $(":checkbox").change(function(){
        if($(this).attr("checked"))
        {
            //call the function to be fired
            //when your box changes from
            //unchecked to checked
			//http://api.jquery.com/jQuery.post/
			$.post("admin.php", { id: $(this).attr("name"), checked: "true" } );
			$("#fadeout_text").show(); //make it visible
			//http://api.jquery.com/fadeOut/
			$("#fadeout_text").fadeOut(2500);
        }
        else
        {
            //call the function to be fired
            //when your box changes from
            //checked to unchecked
			//http://api.jquery.com/jQuery.post/
			$.post("admin.php", { id: $(this).attr("name"), checked: "false" } );
			$("#fadeout_text").show(); //make it visible
			//http://api.jquery.com/fadeOut/
			$("#fadeout_text").fadeOut(2500);
        }
    });
});
</script>

<h1>Administration Page</h1>
<br>
<b><a href="./authenticate.php?status=logout">Logout</a></b>
<hr>

<form>

<table>
<tr>
<th>Name</th><th>Club Member</th><th>Gender</th><th>Address/Phone</th><th>Age</th><th>Exp. Level</th><th>Men's Singles</th>
<th>Men's Doubles</th><th>Woman's Singles</th><th>Woman's Doubles</th>
<th>Mixed Doubles</th><th>Email (Contact Future)</th><th>Payment Received</th><th>Register Date</th>
</tr>

<?php

$result = mysql_query("SELECT * FROM tournament ORDER BY first_name") or die("Can't run SQL query.");

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

			echo "<input type='checkbox' name='" . $row['id'] . "'";
			
			if ($row['paid'] == true)
				echo " checked>";
			else
				echo ">";
		
		echo "</td>\n";
		echo "<td class='center'>".$row['date']."</td>";
		
	echo "</tr>\n";
	$row_count++;
}

?>
</table>
<br><br>
<center>
</center>
</form>

<center>
<big>
<p id="fadeout_text">Updating database...</p>
</big>
</center>

<br>
</body>
</html>
