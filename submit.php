<?php
require_once("config.inc.php");

//connect to database
$db = mysql_connect($db_host, $db_user, $db_pass) or die("Cannot connect to database.");
mysql_select_db($db_name) or die("Error selecting database.");

//Sanitize data (stripslashes() should only be used if magic_quotes_gpc is ON)
$first_name = mysql_real_escape_string(trim($_POST['first_name']));
$last_name = mysql_real_escape_string(trim($_POST['last_name']));
if (isset($_POST['club_member']))
	$club_member = mysql_real_escape_string($_POST['club_member']);
else
	$club_member = "";
$gender = mysql_real_escape_string($_POST['gender']);
$address = mysql_real_escape_string($_POST['address']);
$city = mysql_real_escape_string($_POST['city']);
$state = mysql_real_escape_string($_POST['state']);
$zip = mysql_real_escape_string($_POST['zip']);
$phone = mysql_real_escape_string($_POST['phone']);
$age = mysql_real_escape_string($_POST['age']);
$exp_level = mysql_real_escape_string($_POST['exp_level']);
if (isset($_POST['men_single']))
	$men_single = mysql_real_escape_string($_POST['men_single']);
else
	$men_single = "";
if (isset($_POST['men_double']))
	$men_double = mysql_real_escape_string($_POST['men_double']);
else
	$men_double = "";
if (isset($_POST['woman_single']))
	$woman_single = mysql_real_escape_string($_POST['woman_single']);
else
	$woman_single = "";
if (isset($_POST['woman_double']))
	$woman_double = mysql_real_escape_string($_POST['woman_double']);
else
	$woman_double = "";
if (isset($_POST['mixed_double']))
	$mixed_double = mysql_real_escape_string($_POST['mixed_double']);
else
	$mixed_double = "";
$men_double_name = mysql_real_escape_string(trim($_POST['men_double_name']));
$woman_double_name = mysql_real_escape_string(trim($_POST['woman_double_name']));
$mixed_double_name = mysql_real_escape_string(trim($_POST['mixed_double_name']));
$email_address = mysql_real_escape_string($_POST['email_address']);
if (isset($_POST['contact_future']))
	$contact_future = mysql_real_escape_string($_POST['contact_future']);
else
	$contact_future = "";
$waiver = mysql_real_escape_string($_POST['waiver']);

//Check input to make sure it was filled out correctly
if ($first_name == "" || $last_name == "")
{
	header("Location: register.php?error=You didn't fill in your name.");
	exit();
}
if ($gender != "Male" && $gender != "Female")
{
	header("Location: register.php?error=You didn't specify your gender.");
	exit();
}
if ($address == "" || $city == "" || $state == "" || $zip == "" || strlen($state) != 2)
{
	header("Location: register.php?error=There was an error processing your address/location.");
	exit();
}
if (preg_match("/^([0-9]{5})(-[0-9]{4})?$/i",$zip) == 0)
{
	header("Location: register.php?error=There was a problem with the zipcode you entered.");
	exit();
}
if ($age == "" || is_numeric($age) == false || $age > 100)
{
	header("Location: register.php?error=You didn't specify your age.");
	exit();
}
if ($age < 16)
{
	header("Location: register.php?error=I'm sorry, you are too young to participate in the tournament.");
	exit();
}
if ($exp_level != "A" && $exp_level != "B" && $exp_level != "C" && $exp_level != "D")
{
	header("Location: register.php?error=You didn't specify an experience level.");
	exit();
}
if ($men_single == "" && $men_double == "" && $woman_single == "" && $woman_double == "" && $mixed_double == "")
{
	header("Location: register.php?error=You didn't specify any event(s).");
	exit();
}
if ($gender == "Male" && ($woman_single == "on" || $woman_double == "on"))
{
	header("Location: register.php?error=You specified your gender as Male but you tried signing up for Woman's Singles/Doubles.");
	exit();
}
if ($gender == "Female" && ($men_single == "on" || $men_double == "on"))
{
	header("Location: register.php?error=You specified your gender as Female but you tried signing up for Men's Singles/Doubles.");
	exit();
}
if ($men_double == "on" && $men_double_name == "")
{
	header("Location: register.php?error=You tried signing up for Men's Doubles but you didn't specify who your partner is.");
	exit();
}
if ($woman_double == "on" && $woman_double_name == "")
{
	header("Location: register.php?error=You tried signing up for Womans's Doubles but you didn't specify who your partner is.");
	exit();
}
if ($mixed_double == "on" && $mixed_double_name == "")
{
	header("Location: register.php?error=You tried signing up for Mixed Doubles but you didn't specify who your partner is.");
	exit();
}
if (preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/',$email_address) == 0)
{
	header("Location: register.php?error=There was a problem with the email address you entered.");
	exit();
}
if ($waiver != "on")
{
	header("Location: register.php?error=You didn't check the waiver box.");
	exit();
}

$events = 0;
if ($men_single == "on")
	$events++;
if ($men_double == "on")
	$events++;
if ($woman_single == "on")
	$events++;
if ($woman_double == "on")
	$events++;
if ($mixed_double == "on")
	$events++;

//Good after this point...

//Check for duplicate entry
$query = "SELECT id FROM tournament WHERE first_name = '".$first_name."' AND last_name = '".$last_name."'";
$result = mysql_query($query) or die("Can't run SQL query.");
if (mysql_num_rows($result) > 0)
{
	header("Location: register.php?error=There was a duplicate entry in our database.  Did you register twice by accident?");
	exit();
}

?>

<html>
<title>Online Registration Accepted</title>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>

<h3>Online Registration Accepted</h3>
<?php
//show special message for those under 18
if ($age < 18)
{
	echo "<p><b><u><big><font color='red'>Since you are under 18 years of age, please also submit a hardcopy of the <a href='http://www.stuorg.iastate.edu/badminton/2010ISUBadmintonOpen.pdf'>registration
			form</a> when you send the check in and make sure to get your parent/guardian signature.</font></big></u></b></p><br>";
}
if ($club_member == "on")
{
	echo "<p><b>Since you are an ISU Badminton Club member, you can either mail your check to the address below or
			you can give the check or cash to Xuhui Feng (Treasurer of the Badminton Club) during practice.  <u>Make sure this is turned in by
			March 20th, 2010.</u>  In addition, if you haven't submitted the <a href='http://www.recservices.iastate.edu/clubs/waivers/docs/Badminton.pdf'>waiver
			and medical form</a> please also include this when you pay.</b></p><br>";
}
else
{
	echo "<p><b>Since you are not an ISU Badminton Club member, please also fill out the <a href='http://www.recservices.iastate.edu/clubs/waivers/docs/Badminton.pdf'>waiver
		and medical form</a> when you send in your check.</b></p><br>";
}
?>
<p>To finalize your entry, please send <b>$
<?php

if ($club_member == "on")
	$money = 10;
else
	$money = 15;
$events--;
$money = $money + ($events * 5);
echo $money;
?>
</b> dollars via check made payable to: "ISU Badminton Club" to the following address:</p>
<p>ISU Badminton Club c/o: Tournament</p>
<p>Iowa State Memorial Union Mailbox 156</p>
<p>West Student Office Space</p>
<p>2229 Lincoln Way</p>
<p>Ames, Iowa 50011</p>
<br>
<p><big><u><b>Mail must be postmarked by March 20th, 2010</b></u></big></p>
<p>Please note, we <font color="red"><big><u>cannot</u></big></font> finalize your registration in the tournament until we receive your check and payment <font color="red"><big><u>cannot</u></big></font> be done at the door.</p>
<p>To check on the status of your payment or to see who else has registered, please visit <a href="./view_registered.php">this page.</a></p>

<br>
<br>
<br>
<a href="register.php"><- Register someone else</a>


<?php
//go through checkboxes and change "on" to "true"
if ($club_member == "on")
	$club_member = "true";
else
	$club_member = "false";
if ($men_single == "on")
	$men_single = "true";
else
	$men_single = "false";
if ($men_double == "on")
	$men_double = "true";
else
{
	$men_double = "false";
	$men_double_name = "";
}
if ($woman_single == "on")
	$woman_single = "true";
else
	$woman_single = "false";
if ($woman_double == "on")
	$woman_double = "true";
else
{
	$woman_double = "false";
	$woman_double_name = "";
}
if ($mixed_double == "on")
	$mixed_double = "true";
else
{
	$mixed_double = "false";
	$mixed_double_name = "";
}
if ($contact_future == "on")
	$contact_future = "true";
else
	$contact_future = "false";

//Insert information into database
	
$query = "INSERT INTO tournament VALUES ('','".$first_name."',
										'".$last_name."',
										".$club_member.",
										'".$gender."',
										'".$address."',
										'".$city."',
										'".$state."',
										'".$zip."',
										'".$phone."',
										'".$age."',
										'".$exp_level."',
										".$men_single.",
										".$men_double.",
										".$woman_single.",
										".$woman_double.",
										".$mixed_double.",
										'".$men_double_name."',
										'".$woman_double_name."',
										'".$mixed_double_name."',
										'".$email_address."',
										".$contact_future.",
										NOW(),
										false)";
//echo $query;
mysql_query($query) or die("Can't run SQL query.");


//Send email via isubadminton@rivetcode.com
$headers = 'From: isubadminton@rivetcode.com' . "\r\n";
$subject = "ISU Badminton Tournament Registration Confirmation";
$mailto = $email_address;

$email_body = "Thank you for registering for the ISU Badminton Tournament.\n";
$email_body .= "\nMarch 24-25, 2012\n\n";
$email_body .= "Name: " . $first_name . " " . $last_name . "\n";
$email_body .= "ISU Club Member: " . $club_member . "\n";
$email_body .= "Gender: " . $gender . "\n";
$email_body .= "Address: " . $address . " - " . $city . " " . $state . ", " . $zip . "\n";
$email_body .= "Phone: " . $phone . "\n";
$email_body .= "Age: " . $age . "\n";
$email_body .= "Experience Level: " . $exp_level . "\n";
$email_body .= "Men's Singles: " . $men_single . "\n";
$email_body .= "Men's Doubles: " . $men_double . " (" . $men_double_name . ")\n";
$email_body .= "Women's Singles: " . $woman_single . "\n";
$email_body .= "Women's Doubles: " . $woman_double . " (" . $woman_double_name . ")\n";
$email_body .= "Mixed Doubles: " . $mixed_double . " (" . $mixed_double_name . ")\n";

$email_body .= "If this information is not correct or you need to change anything that has already been submitted, please email Patrick Carlson carlsonp@iastate.edu.\n";
$email_body .= "Please tell your friends to register!\n";
$email_body .= "View who else has registered here:\n";
$email_body .= "http://badminton.rivetcode.com\n";

//strip tags from body
$email_body = strip_tags($email_body);

if(mail($mailto, $subject, $email_body, $headers))
	echo "<p>A confirmation email has been sent to: " . $email_address . ". If you don't see
		an email, check your spam folder.</p>";
else
	echo "<p>There was a problem sending your confirmation email.</p>";

?>


</body>
</html>
