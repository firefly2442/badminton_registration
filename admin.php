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
if (isset($_POST['id']))
{
	if (isset($_POST['paid'])) {
		if ($_POST['paid'] == "true") {
			$query = "UPDATE tournament SET paid=true WHERE id='".mysql_real_escape_string($_POST['id'])."'";
		} else {
			$query = "UPDATE tournament SET paid=false WHERE id='".mysql_real_escape_string($_POST['id'])."'";
		}
	}

	if (isset($_POST['men_single'])) {
		if ($_POST['men_single'] == "true") {
			$query = "UPDATE tournament SET men_single=true WHERE id='".mysql_real_escape_string($_POST['id'])."'";
		} else {
			$query = "UPDATE tournament SET men_single=false WHERE id='".mysql_real_escape_string($_POST['id'])."'";
		}
	}

	if (isset($_POST['men_double'])) {
		if ($_POST['men_double'] == "true") {
			$query = "UPDATE tournament SET men_double=true WHERE id='".mysql_real_escape_string($_POST['id'])."'";
		} else {
			$query = "UPDATE tournament SET men_double=false WHERE id='".mysql_real_escape_string($_POST['id'])."'";
		}
	}

	if (isset($_POST['woman_single'])) {
		if ($_POST['woman_single'] == "true") {
			$query = "UPDATE tournament SET woman_single=true WHERE id='".mysql_real_escape_string($_POST['id'])."'";
		} else {
			$query = "UPDATE tournament SET woman_single=false WHERE id='".mysql_real_escape_string($_POST['id'])."'";
		}
	}

	if (isset($_POST['woman_double'])) {
		if ($_POST['woman_double'] == "true") {
			$query = "UPDATE tournament SET woman_double=true WHERE id='".mysql_real_escape_string($_POST['id'])."'";
		} else {
			$query = "UPDATE tournament SET woman_double=false WHERE id='".mysql_real_escape_string($_POST['id'])."'";
		}
	}

	if (isset($_POST['mixed_double'])) {
		if ($_POST['mixed_double'] == "true") {
			$query = "UPDATE tournament SET mixed_double=true WHERE id='".mysql_real_escape_string($_POST['id'])."'";
		} else {
			$query = "UPDATE tournament SET mixed_double=false WHERE id='".mysql_real_escape_string($_POST['id'])."'";
		}
	}

	if (isset($_POST['men_double_name'])) {
		$query = "UPDATE tournament SET men_double_name='".mysql_real_escape_string($_POST['men_double_name'])."' WHERE id='".mysql_real_escape_string($_POST['id'])."'";
	}

	if (isset($_POST['woman_double_name'])) {
		$query = "UPDATE tournament SET woman_double_name='".mysql_real_escape_string($_POST['woman_double_name'])."' WHERE id='".mysql_real_escape_string($_POST['id'])."'";
	}

	if (isset($_POST['mixed_double_name'])) {
		$query = "UPDATE tournament SET mixed_double_name='".mysql_real_escape_string($_POST['mixed_double_name'])."' WHERE id='".mysql_real_escape_string($_POST['id'])."'";
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
    $(".paid").change(function(){
		//http://api.jquery.com/jQuery.post/
        if($(this).attr("checked")) {
			$.post("admin.php", { id: $(this).attr("name"), paid: "true" } );
        } else {
			$.post("admin.php", { id: $(this).attr("name"), paid: "false" } );
        }
		showFadeout();
    });

	$(".men_single").change(function(){
		//http://api.jquery.com/jQuery.post/
        if($(this).attr("checked")) {
			$.post("admin.php", { id: $(this).attr("name"), men_single: "true" } );
        } else {
			$.post("admin.php", { id: $(this).attr("name"), men_single: "false" } );
        }
		showFadeout();
    });

	$(".men_double").change(function(){
		//http://api.jquery.com/jQuery.post/
        if($(this).attr("checked")) {
			$.post("admin.php", { id: $(this).attr("name"), men_double: "true" } );
        } else {
			$.post("admin.php", { id: $(this).attr("name"), men_double: "false" } );
        }
		showFadeout();
    });

	$(".woman_single").change(function(){
		//http://api.jquery.com/jQuery.post/
        if($(this).attr("checked")) {
			$.post("admin.php", { id: $(this).attr("name"), woman_single: "true" } );
        } else {
			$.post("admin.php", { id: $(this).attr("name"), woman_single: "false" } );
        }
		showFadeout();
    });

	$(".woman_double").change(function(){
		//http://api.jquery.com/jQuery.post/
        if($(this).attr("checked")) {
			$.post("admin.php", { id: $(this).attr("name"), woman_double: "true" } );
        } else {
			$.post("admin.php", { id: $(this).attr("name"), woman_double: "false" } );
        }
		showFadeout();
    });

	$(".mixed_double").change(function(){
		//http://api.jquery.com/jQuery.post/
        if($(this).attr("checked")) {
			$.post("admin.php", { id: $(this).attr("name"), mixed_double: "true" } );
        } else {
			$.post("admin.php", { id: $(this).attr("name"), mixed_double: "false" } );
        }
		showFadeout();
    });

	$(".men_double_name").change(function(){
		//http://api.jquery.com/jQuery.post/
		$.post("admin.php", { id: $(this).attr("name"), men_double_name: $(this).attr("value") } );
		showFadeout();
    });

	$(".woman_double_name").change(function(){
		//http://api.jquery.com/jQuery.post/
		$.post("admin.php", { id: $(this).attr("name"), woman_double_name: $(this).attr("value") } );
		showFadeout();
    });

	$(".mixed_double_name").change(function(){
		//http://api.jquery.com/jQuery.post/
		$.post("admin.php", { id: $(this).attr("name"), mixed_double_name: $(this).attr("value") } );
		showFadeout();
    });

	function showFadeout()
	{
		$("#fadeout_text").show(); //make it visible
		//http://api.jquery.com/fadeOut/
		$("#fadeout_text").fadeOut(3000);
	}

});
</script>

<h1>Administration Page</h1>
<br>
<b><a href="./authenticate.php?status=logout">Logout</a></b>
<hr>

<form>

<table>
<tr>
<th>Name</th><th>Club<br>Member</th><th>T-Shirt Size<br>and Color</th><th>Gender</th><th>Address/Phone</th><th>Age</th><th>Exp.<br>Level</th><th>Men's<br>Singles</th>
<th>Men's Doubles</th><th>Woman's<br>Singles</th><th>Woman's Doubles</th>
<th>Mixed Doubles</th><th>Email (Contact Future)</th><th>Payment<br>Received</th><th>Register Date</th>
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
			echo (($row['club_member'] == true) ? "Yes" : "No") . "</td>";
		echo "<td class='center'>".$row['tshirtsize']."(".$row['tshirtcolor'].")</td>";
		echo "<td class='center'>".$row['gender']."</td>";
		echo "<td class='center'>".$row['address']."<br>".$row['city'].", ".$row['state']." ".$row['zip']."<br>".$row['phone']."</td>";
		echo "<td class='center'>".$row['age']."</td>";
		echo "<td class='center'>".$row['exp_level']."</td>";
		echo "<td class='center'>\n";
			if ($row['gender'] == "Male") {
				echo "<input type='checkbox' class='men_single' name='" . $row['id'] . "'";
				if ($row['men_single'] == true) {
					echo " checked>";
				} else {
					echo ">";
				}
			} else {
				echo "No";
			}
		echo "</td>\n";
		echo "<td class='center'>";
			if ($row['gender'] == "Male") {
				echo "<input type='checkbox' class='men_double' name='" . $row['id'] . "'";
				if ($row['men_double'] == true) {
					echo " checked>";
				} else {
					echo ">";
				}
				echo "<input type='text' class='men_double_name' name='" . $row['id'] . "' value='" . $row['men_double_name'] . "'>";
			} else {
				echo "No";
			}

		echo "</td>\n";
		echo "<td class='center'>";
			if ($row['gender'] == "Female") {
				echo "<input type='checkbox' class='woman_single' name='" . $row['id'] . "'";
				if ($row['woman_single'] == true) {
					echo " checked>";
				} else {
					echo ">";
				}
			} else {
				echo "No";
			}
		echo "</td>";
		echo "<td class='center'>";
			if ($row['gender'] == "Female") {
				echo "<input type='checkbox' class='woman_double' name='" . $row['id'] . "'";
				if ($row['woman_double'] == true) {
					echo " checked>";
				} else {
					echo ">";
				}
				echo "<input type='text' class='woman_double_name' name='" . $row['id'] . "' value='" . $row['woman_double_name'] . "'>";
			} else {
				echo "No";
			}

		echo "</td>\n";
		echo "<td class='center'>";

			echo "<input type='checkbox' class='mixed_double' name='" . $row['id'] . "'";
			if ($row['mixed_double'] == true) {
				echo " checked>";
			} else {
				echo ">";
			}
			echo "<input type='text' class='mixed_double_name' name='" . $row['id'] . "' value='" . $row['mixed_double_name'] . "'>";

		echo "</td>\n";
		echo "<td class='center'>".$row['email_address'];
			echo (($row['contact_future'] == true) ? "(Yes)" : "(No)");
		echo "</td>";
		echo "<td class='center'>";

			echo "<input type='checkbox' class='paid' name='" . $row['id'] . "'";
			
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
<div id="fadeout_text">
	<b>
		<p>Updating database...</p>
	</b>
</div>
</big>
</center>

<br>
</body>
</html>
