<?php
require_once("config.inc.php");

//check date, if over deadline, don't allow registration
if (strtotime('now') > strtotime($deadline))
{
	echo "Online registration is now closed, the deadline was: " . $deadline;
	exit();
}

?>


<html>
<title>Tournament Registration</title>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<script type="text/javascript" src="javascript/jquery-1.7.1.min.js"></script>
	<link rel="stylesheet" href="css/style.css" type="text/css" />
</head>
<body>

<div id="breadcrumb">
<a href="index.php">Home</a> | <a href="view_registered.php">View Registered Players</a>
</div>

<?php

function filter($data)
{
	$data = trim(htmlentities(strip_tags($data)));

	if (get_magic_quotes_gpc()) {
		$data = stripslashes($data);
	}

	$data = mysql_real_escape_string($data);

	return $data;
}

if (isset($_POST['submit']))
{
	//connect to database
	$db = mysql_connect($db_host, $db_user, $db_pass) or die("Cannot connect to database.");
	mysql_select_db($db_name) or die("Error selecting database.");

	//sanitize data
	if (isset($_POST['first_name'])) {
		$first_name = filter($_POST['first_name']);
	} else { $first_name = ""; }

	if (isset($_POST['last_name'])) {
		$last_name = filter($_POST['last_name']);
	} else { $last_name = ""; }

	if (isset($_POST['club_member'])) {
		$club_member = filter($_POST['club_member']);
	} else { $club_member = ""; }

	if (isset($_POST['gender'])) {
		$gender = filter($_POST['gender']);
	} else { $gender = ""; }

	if (isset($_POST['address'])) {
		$address = filter($_POST['address']);
	} else { $address = ""; }

	if (isset($_POST['city'])) {
		$city = filter($_POST['city']);
	} else { $city = ""; }

	if (isset($_POST['state'])) {
		$state = filter($_POST['state']);
	} else { $state = ""; }

	if (isset($_POST['zip'])) {
		$zip = filter($_POST['zip']);
	} else { $zip = ""; }

	if (isset($_POST['phone'])) {
		$phone = filter($_POST['phone']);
	} else { $phone = ""; }

	if (isset($_POST['age'])) {
		$age = filter($_POST['age']);
	} else { $age = ""; }

	if (isset($_POST['exp_level'])) {
		$exp_level = filter($_POST['exp_level']);
	} else { $exp_level = ""; }

	if (isset($_POST['men_single'])) {
		$men_single = filter($_POST['men_single']);
	} else { $men_single = ""; }

	if (isset($_POST['men_double'])) {
		$men_double = filter($_POST['men_double']);
	} else { $men_double = ""; }

	if (isset($_POST['woman_single'])) {
		$woman_single = filter($_POST['woman_single']);
	} else { $woman_single = ""; }

	if (isset($_POST['woman_double'])) {
		$woman_double = filter($_POST['woman_double']);
	} else { $woman_double = ""; }

	if (isset($_POST['mixed_double'])) {
		$mixed_double = filter($_POST['mixed_double']);
	} else { $mixed_double = ""; }

	if (isset($_POST['men_double_name'])) {
		$men_double_name = filter($_POST['men_double_name']);
	} else { $men_double_name = ""; }

	if (isset($_POST['woman_double_name'])) {
		$woman_double_name = filter($_POST['woman_double_name']);
	} else { $woman_double_name = ""; }

	if (isset($_POST['mixed_double_name'])) {
		$mixed_double_name = filter($_POST['mixed_double_name']);
	} else { $mixed_double_name = ""; }

	if (isset($_POST['email_address'])) {
		$email_address = filter($_POST['email_address']);
	} else { $email_address = ""; }

	if (isset($_POST['contact_future'])) {
		$contact_future = filter($_POST['contact_future']);
	} else { $contact_future = ""; }

	if (isset($_POST['waiver'])) {
		$waiver = filter($_POST['waiver']);
	} else { $waiver = ""; }

	if (isset($_POST['tshirtonesize'])) {
		$tshirtonesize = filter($_POST['tshirtonesize']);
	} else { $tshirtonesize = ""; }
	
	if (isset($_POST['tshirtonecolor'])) {
		$tshirtonecolor = filter($_POST['tshirtonecolor']);
	} else { $tshirtonecolor = ""; }
	
	if (isset($_POST['tshirttwosize'])) {
		$tshirttwosize = filter($_POST['tshirttwosize']);
	} else { $tshirttwosize = ""; }
	
	if (isset($_POST['tshirttwocolor'])) {
		$tshirttwocolor = filter($_POST['tshirttwocolor']);
	} else { $tshirttwocolor = ""; }
}



?>


<center>
<?php
echo $tournament_details;
?>
<h2>Please complete the following form to register for the tournament.</h2>
</center>


<div id="entire_form">


<p>Prize Listing:</p>

<table class="prizes">
<tr>
	<td>Level</td>
	<td>Place</td>
	<td>Event</td>
	<td>Singles</td>
	<td>Doubles<br>(one for each player)</td>
	<td>Mixed</td>
</tr>

<tr>
	<td>A</td>
	<td>1st</td>
	<td>Men</td>
	<td>VOLTRIC Z-F</td>
	<td>ARCSABER 11</td>
	<td>NANORAY Z-S</td>
</tr>

<tr>
	<td>A</td>
	<td>1st</td>
	<td>Women</td>
	<td>Voltric I-force</td>
	<td>Nanoray 750</td>
	<td>ARCSABER FB</td>
</tr>

<tr>
	<td>A</td>
	<td>2nd</td>
	<td>Men</td>
	<td>VOLTRIC 60</td>
	<td>VOLTRIC 60</td>
	<td>VOLTRIC 60</td>
</tr>

<tr>
	<td>A</td>
	<td>2nd</td>
	<td>Women</td>
	<td>Voltric 50 Neo</td>
	<td>Voltric 50 Neo</td>
	<td>Voltric 50 Neo</td>
</tr>

<tr>
	<td>B</td>
	<td>1st</td>
	<td>Men</td>
	<td>NANORAY 90DX</td>
	<td>NANORAY 90DX</td>
	<td>NANORAY 90DX</td>
</tr>

<tr>
	<td>B</td>
	<td>1st</td>
	<td>Women</td>
	<td>NANORAY 90DX</td>
	<td>NANORAY 90DX</td>
	<td>NANORAY 90DX</td>
</tr>

<tr>
	<td>B</td>
	<td>2nd</td>
	<td>Men</td>
	<td>BAG9331EX</td>
	<td>BAG9331EX</td>
	<td>BAG9331EX</td>
</tr>

<tr>
	<td>B</td>
	<td>2nd</td>
	<td>Women</td>
	<td>BAG9331EX</td>
	<td>BAG9331EX</td>
	<td>BAG9331EX</td>
</tr>

<tr>
	<td>C</td>
	<td>1st</td>
	<td>Men</td>
	<td>BAG7323EX</td>
	<td>BAG7323EX</td>
	<td>BAG7323EX</td>
</tr>

<tr>
	<td>C</td>
	<td>1st</td>
	<td>Women</td>
	<td>BAG7323EX</td>
	<td>BAG7323EX</td>
	<td>BAG7323EX</td>
</tr>

<tr>
	<td>C</td>
	<td>2nd</td>
	<td>Men</td>
	<td>BAG5426</td>
	<td>BAG5426</td>
	<td>BAG5426</td>
</tr>

<tr>
	<td>C</td>
	<td>2nd</td>
	<td>Women</td>
	<td>BAG5426</td>
	<td>BAG5426</td>
	<td>BAG5426</td>
</tr>

<tr>
	<td>D</td>
	<td>1st</td>
	<td>Men</td>
	<td>BG80Power</td>
	<td>Nanogy 99</td>
	<td>Nanogy 99</td>
</tr>

<tr>
	<td>D</td>
	<td>1st</td>
	<td>Women</td>
	<td>BG66Ultimax</td>
	<td>Nanogy 98</td>
	<td>Nanogy 98</td>
</tr>

<tr>
	<td>D</td>
	<td>2nd</td>
	<td>Men</td>
	<td>SS9036 (M)</td>
	<td>SS9036 (M)</td>
	<td>SS9036 (M)</td>
</tr>

<tr>
	<td>D</td>
	<td>2nd</td>
	<td>Women</td>
	<td>SS9036 (S)</td>
	<td>SS9036 (S)</td>
	<td>SS9036 (S)</td>
</tr>

</table>


<br>
<p>There are no requirements for membership in any badminton club or association (USAB, etc.).</p>
<p>Questions or problems? <a href="http://www.stuorg.iastate.edu/badminton/contact.php">Contact an ISU Badminton Club Officer</a></p>
<br>
<font color=red><b>*</b></font> = required information
<br>
<br>
<br>

<div id="error"><div id="duplicate">There was a duplicate entry in our database.  Did you register twice by accident?</div></div>
<script>$("#duplicate").hide();</script>
<form action="register.php" method="POST">

<div id="error"><div id="name">You didn't enter a name.</div></div>
<script>$("#name").hide();</script>
<big><font color=red><b>*</b></font>First Name:</big>
<input type="text" size="40" name="first_name" maxlength="25" value="<?php if (isset($first_name)) { echo $first_name; }?>">
<br>

<big><font color=red><b>*</b></font>Last Name:</big>
<input type="text" size="40" name="last_name" maxlength="25" value="<?php if (isset($last_name)) { echo $last_name; }?>">
<br>

<br>
<big>Are you an ISU Badminton Club Member?</p>
<input type="checkbox" name="club_member" <?php if (isset($club_member) && $club_member == "on") { echo " checked"; }?>>Yes
<br>
<br>

<big><font color=red><b>*</b></font>T-Shirt Size and Color:</big><br>
First T-Shirt (FREE!, XXL size is +$2)
<select name="tshirtonesize">
<option value="Small" <?php if (isset($tshirtonesize) && $tshirtonesize == "Small") { echo " selected='selected'"; }?>>Small</option>
<option value="Medium" <?php if (isset($tshirtonesize) && $tshirtonesize == "Medium") { echo " selected='selected'"; }?>>Medium</option>
<option value="Large" <?php if (isset($tshirtonesize) && $tshirtonesize == "Large") { echo " selected='selected'"; }?>>Large</option>
<option value="XL" <?php if (isset($tshirtonesize) && $tshirtonesize == "XL") { echo " selected='selected'"; }?>>XL</option>
<option value="XXL" <?php if (isset($tshirtonesize) && $tshirtonesize == "XXL") { echo " selected='selected'"; }?>>XXL</option>
</select>
<select name="tshirtonecolor">
<option value="Black" <?php if (isset($tshirtonecolor) && $tshirtonecolor == "Black") { echo " selected='selected'"; }?>>Black</option>
<option value="Pink" <?php if (isset($tshirtonecolor) && $tshirtonecolor == "Pink") { echo " selected='selected'"; }?>>Pink</option>
</select>
<br>
Second T-Shirt (optional) (+$10, XXL size is +$12)
<select name="tshirttwosize">
<option value="" <?php if (isset($tshirttwosize) && $tshirttwosize == "") { echo " selected='selected'"; }?>></option>
<option value="Small" <?php if (isset($tshirttwosize) && $tshirttwosize == "Small") { echo " selected='selected'"; }?>>Small</option>
<option value="Medium" <?php if (isset($tshirttwosize) && $tshirttwosize == "Medium") { echo " selected='selected'"; }?>>Medium</option>
<option value="Large" <?php if (isset($tshirttwosize) && $tshirttwosize == "Large") { echo " selected='selected'"; }?>>Large</option>
<option value="XL" <?php if (isset($tshirttwosize) && $tshirttwosize == "XL") { echo " selected='selected'"; }?>>XL</option>
<option value="XXL" <?php if (isset($tshirttwosize) && $tshirttwosize == "XXL") { echo " selected='selected'"; }?>>XXL</option>
</select>
<select name="tshirttwocolor">
<option value="" <?php if (isset($tshirttwocolor) && $tshirttwocolor == "") { echo " selected='selected'"; }?>></option>
<option value="Black" <?php if (isset($tshirttwocolor) && $tshirttwocolor == "Black") { echo " selected='selected'"; }?>>Black</option>
<option value="Pink" <?php if (isset($tshirttwocolor) && $tshirttwocolor == "Pink") { echo " selected='selected'"; }?>>Pink</option>
</select>
<br>
<p>Want more than two t-shirts?  After you register, contact an <a href="http://www.stuorg.iastate.edu/badminton/contact.php">ISU Badminton Club Officer</a> and let us know!</p>
<br>


<div id="error"><div id="gender">You didn't specify a gender.</div></div>
<script>$("#gender").hide();</script>
<big><font color=red><b>*</b></font>What is your gender?</big>
<input type="radio" name="gender" value="Male" <?php if (isset($gender) && $gender == "Male") { echo " checked"; }?>> Male
<input type="radio" name="gender" value="Female" <?php if (isset($gender) && $gender == "Female") { echo " checked"; }?>> Female
<br>
<br>

<div id="error"><div id="address">There was an error processing your address/location.</div></div>
<script>$("#address").hide();</script>
<big><font color=red><b>*</b></font>Address:</big>
<input type="text" size="60" name="address" maxlength="50" value="<?php if (isset($address)) { echo $address; }?>">
<br>

<big><font color=red><b>*</b></font>City:</big>
<input type="text" size="40" name="city" maxlength="50" value="<?php if (isset($city)) { echo $city; }?>">
<br>

<big><font color=red><b>*</b></font>State:</big>
<input type="text" size="30" name="state" maxlength="50" value="<?php if (isset($state)) { echo $state; }?>">

<br>

<div id="error"><div id="zip">There was a problem with the zipcode you entered.</div></div>
<script>$("#zip").hide();</script>
<big><font color=red><b>*</b></font>Zip:</big>
<input type="text" size="15" name="zip" maxlength="15" value="<?php if (isset($zip)) { echo $zip; }?>">
<br>

<big>Phone Number:</big>
<input type="text" size="15" name="phone" maxlength="20" value="<?php if (isset($phone)) { echo $phone; }?>">
<br>

<br>
<div id="error"><div id="age">You didn't specify your age or you are too young to participate.</div></div>
<script>$("#age").hide();</script>
<big><font color=red><b>*</b></font>Age:</big>
<input type="text" size="3" name="age" maxlength="2" value="<?php if (isset($age)) { echo $age; }?>">(must be 16 or older)
<br>
<br>

<div id="error"><div id="experience">You didn't specify an experience level.</div></div>
<script>$("#experience").hide();</script>
<big><font color=red><b>*</b></font>Rate your level of experience (A is best):</big>
<input type="radio" name="exp_level" value="A" <?php if (isset($exp_level) && $exp_level == "A") { echo " checked"; }?>> A (Highly Competitive)
<input type="radio" name="exp_level" value="B" <?php if (isset($exp_level) && $exp_level == "B") { echo " checked"; }?>> B (Advanced)
<input type="radio" name="exp_level" value="C" <?php if (isset($exp_level) && $exp_level == "C") { echo " checked"; }?>> C (Competitive)
<input type="radio" name="exp_level" value="D" <?php if (isset($exp_level) && $exp_level == "D") { echo " checked"; }?>> D (Intermediate or Beginner)
<br>
<br>

<div id="error"><div id="events">You didn't specify any event(s).</div></div>
<script>$("#events").hide();</script>
<big><font color=red><b>*</b></font>Check the events you are registering in:</big>
<br>For Non Member of ISU Badminton club: $30 for 1st event, $5 for each additional event.
<br>For Member of ISU Badminton club: $25 for 1st event, $5 for each additional event.
<br>
<div id="error"><div id="female_gender">You specified your gender as Female but you tried signing up for Men's Singles/Doubles.</div></div>
<script>$("#female_gender").hide();</script>
<input type="checkbox" name="men_single" <?php if (isset($men_single) && $men_single == "on") { echo " checked"; }?>> Men's Singles
<br>
<div id="error"><div id="male_partner">You tried signing up for Men's Doubles but you didn't specify who your partner is.</div></div>
<script>$("#male_partner").hide();</script>
<input type="checkbox" name="men_double" <?php if (isset($men_double) && $men_double == "on") { echo " checked"; }?>> Men's Doubles
<br>
<div id="error"><div id="male_gender">You specified your gender as Male but you tried signing up for Woman's Singles/Doubles.</div></div>
<script>$("#male_gender").hide();</script>
<input type="checkbox" name="woman_single" <?php if (isset($woman_single) && $woman_single == "on") { echo " checked"; }?>> Woman's Singles
<br>
<div id="error"><div id="female_partner">You tried signing up for Womans's Doubles but you didn't specify who your partner is.</div></div>
<script>$("#female_partner").hide();</script>
<input type="checkbox" name="woman_double" <?php if (isset($woman_double) && $woman_double == "on") { echo " checked"; }?>> Woman's Doubles
<br>
<div id="error"><div id="mixed_partner">You tried signing up for Mixed Doubles but you didn't specify who your partner is.</div></div>
<script>$("#mixed_partner").hide();</script>
<input type="checkbox" name="mixed_double" <?php if (isset($mixed_double) && $mixed_double == "on") { echo " checked"; }?>> Mixed Doubles
<br>

<font color=red><b>* (only for doubles)</b></font><br>
<big>Men's Doubles Partner Name:</big>
<input type="text" size="30" name="men_double_name" maxlength="50" value="<?php if (isset($men_double_name)) { echo $men_double_name; }?>">
<br>
<big>Woman's Doubles Partner Name:</big>
<input type="text" size="30" name="woman_double_name" maxlength="50" value="<?php if (isset($woman_double_name)) { echo $woman_double_name; }?>">
<br>
<big>Mixed Doubles Partner Name:</big>
<input type="text" size="30" name="mixed_double_name" maxlength="50" value="<?php if (isset($mixed_double_name)) { echo $mixed_double_name; }?>">
<br>
<br>

<div id="error"><div id="email">There was a problem with the email address you entered.</div></div>
<script>$("#email").hide();</script>
<big><font color=red><b>*</b></font>Email Address:</big>
<input type="text" size="35" name="email_address" maxlength="40" value="<?php if (isset($email_address)) { echo $email_address; }?>">
<br>
<big>Would you like to be contacted about future badminton tournaments at ISU?</big>
<br>
<input type="checkbox" name="contact_future" <?php if (isset($contact_future) && $contact_future == "on") { echo " checked"; }?>>Yes

<br>
<br>
<br>
<div id="error"><div id="waiver">You didn't check the waiver box.</div></div>
<script>$("#waiver").hide();</script>
<p><big><font color=red><b>*</b></font>Waiver: By checking the box below, I agree to waive any and all claims that may arise from my participation
in this tournament. I release and discharge all participants in this tournament, Iowa State University, ISU Badminton
Club, administrators, and volunteers for any bodily injury to myself or others, or for any damage during the course
of the event.</big></p>
<input type="checkbox" name="waiver" <?php if (isset($waiver) && $waiver == "on") { echo " checked"; }?>>I agree to the above conditions.

<br>
<br>
<input type="submit" name="submit" value="Register">
</form>
</div>

<br><br>

<?php
if (isset($_POST['submit']))
{
	$error = false;

	//Check input to make sure it was filled out correctly
	if ($first_name == "" || $last_name == "") {
		echo "<script>$('#name').show();</script>"; $error = true;
	}
	if ($gender != "Male" && $gender != "Female") {
		echo "<script>$('#gender').show();</script>"; $error = true;
	}
	if ($address == "" || $city == "" || $state == "" || $zip == "") {
		echo "<script>$('#address').show();</script>"; $error = true;
	}
	if (preg_match("/^([0-9]{5})(-[0-9]{4})?$/i",$zip) == 0) {
		echo "<script>$('#zip').show();</script>"; $error = true;
	}
	if ($age == "" || is_numeric($age) == false || $age > 100 || $age < 16) {
		echo "<script>$('#age').show();</script>"; $error = true;
	}
	if ($exp_level != "A" && $exp_level != "B" && $exp_level != "C" && $exp_level != "D") {
		echo "<script>$('#experience').show();</script>"; $error = true;
	}
	if ($men_single == "" && $men_double == "" && $woman_single == "" && $woman_double == "" && $mixed_double == "") {
		echo "<script>$('#events').show();</script>"; $error = true;
	}
	if ($gender == "Male" && ($woman_single == "on" || $woman_double == "on")) {
		echo "<script>$('#male_gender').show();</script>"; $error = true;
	}
	if ($gender == "Female" && ($men_single == "on" || $men_double == "on")) {
		echo "<script>$('#female_gender').show();</script>"; $error = true;
	}
	if ($men_double == "on" && $men_double_name == "") {
		echo "<script>$('#male_partner').show();</script>"; $error = true;
	}
	if ($woman_double == "on" && $woman_double_name == "") {
		echo "<script>$('#female_partner').show();</script>"; $error = true;
	}
	if ($mixed_double == "on" && $mixed_double_name == "") {
		echo "<script>$('#mixed_partner').show();</script>"; $error = true;
	}
	if (preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/',$email_address) == 0) {
		echo "<script>$('#email').show();</script>"; $error = true;
	}
	if ($waiver != "on") {
		echo "<script>$('#waiver').show();</script>"; $error = true;
	}

	//Check for duplicate entry
	$query = "SELECT id FROM tournament WHERE first_name = '".$first_name."' AND last_name = '".$last_name."'";
	$result = mysql_query($query) or die("Can't run SQL query.");
	if (mysql_num_rows($result) > 0) {
		echo "<script>$('#duplicate').show();</script>"; $error = true;
	}


	if ($error == false)
	{
		//we're good, submit information
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

		//hide form
		echo "<script>$('#entire_form').hide();</script>";

		//show special message for those under 18
		if ($age < 18)
		{
			echo "<p><b><u><big><font color='red'>Since you are under 18 years of age, please also submit a hardcopy of the <a href='http://www.stuorg.iastate.edu/badminton/tournaments.php'>waiver
					and medical form</a> when you send the check in and make sure to get your parent/guardian signature.</font></big></u></b></p><br>";
		}
		if ($club_member == "on")
		{
			echo "<p><b>Since you are an ISU Badminton Club member, you can either mail your check to the address below or
					you can give the check or cash to Bin Dong (Treasurer of the Badminton Club) during practice.  <u>Make sure this is turned in by
					March 21, 2014.</u>  In addition, make sure the waiver is on file via the <a href='https://sodb-stuorg.sws.iastate.edu/'>Student Organizations website</a>.</b></p><br>";
		}
		else
		{
			echo "<p><b>Since you are not an ISU Badminton Club member, please also fill out the <a href='http://www.stuorg.iastate.edu/badminton/tournaments.php'>waiver
				and medical form</a> and submit it when you send in your check.</b></p><br>";
		}


		?>
		<p>To finalize your entry, please send <b>$
		<?php

		if ($club_member == "on")
			$money = 25;
		else
			$money = 30;
		$events--;
		$money = $money + ($events * 5);
		if ($tshirtonesize == "XXL")
			$money = $money + 2;
		if ($tshirttwosize == "XXL")
			$money = $money + 2;
		if ($tshirttwosize != "")
			$money = $money + 10;
		echo $money;
		?>
		</b> dollars via check made payable to: "ISU Badminton Club" to the following address:</p>
		<p>ISU Badminton Club c/o: Tournament<br>
		Iowa State Memorial Union Mailbox 156<br>
		West Student Office Space<br>
		2229 Lincoln Way<br>
		Ames, Iowa 50011</p>
		<br>
		<p><big><u><b>Mail must be received by March 21, 2014</b></u></big></p>
		<p>Please note, we <font color="red"><big><u>cannot</u></big></font> finalize your registration in the tournament until we receive your check and payment <font color="red"><big><u>cannot</u></big></font> be done at the door.</p>
		<p>To check on the status of your payment or to see who else has registered, please visit <a href="./view_registered.php">this page.</a></p>

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
												'".$tshirtonesize.",".$tshirttwosize."',
												'".$tshirtonecolor.",".$tshirttwocolor."',
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

		//Set this email address via the config.inc.php file
		$headers = 'From: ' . $email_sender . "\r\n";
		$subject = $email_title;
		$mailto = $email_address;

		$email_body = "Thank you for registering for the Iowa Badminton Open 2014.\n";
		$email_body .= "\nMarch 29-30, 2014\n\n";
		$email_body .= "Name: " . $first_name . " " . $last_name . "\n";
		$email_body .= "ISU Club Member: " . $club_member . "\n";
		if ($tshirttwosize != "" && $tshirttwocolor != "")
			$email_body .= "T-Shirt Size and Color: " . $tshirtonesize . " - " . $tshirtonecolor . ", " . $tshirttwosize . " - " . $tshirttwocolor . "\n";
		else
			$email_body .= "T-Shirt Size and Color: " . $tshirtonesize . " - " . $tshirtonecolor . "\n";
		$email_body .= "Gender: " . $gender . "\n";
		$email_body .= "Address: " . $address . " - " . $city . " " . $state . ", " . $zip . "\n";
		$email_body .= "Phone: " . $phone . "\n";
		$email_body .= "Age: " . $age . "\n";
		$email_body .= "Experience Level: " . $exp_level . "\n";
		if ($men_single == "true") {
			$email_body .= "Men's Singles\n";
		}
		if ($men_double == "true") {
			$email_body .= "Men's Doubles: (" . $men_double_name . ")\n";
		}
		if ($woman_single == "true") {
			$email_body .= "Women's Singles\n";
		}
		if ($woman_double == "true") {
			$email_body .= "Women's Doubles: (" . $woman_double_name . ")\n";
		}
		if ($mixed_double == "true") {
			$email_body .= "Mixed Doubles: (" . $mixed_double_name . ")\n";
		}

		$email_body .= "\nPlease do not reply to this email as we will not be checking this address.\n";
		$email_body .= "If this information is not correct or you need to change anything that has already been submitted, please contact the badminton club President.\n";
		$email_body .= "http://www.stuorg.iastate.edu/badminton/contact.php\n";
		$email_body .= "Please tell your friends to register!\n";
		$email_body .= "View who else has registered as well as check to see if we've received your payment here:\n";
		$email_body .= "http://badminton.rivetcode.com\n\n";
		$email_body .= "Please send $".$money." to the address below.\n\n";
		$email_body .= "ISU Badminton Club c/o: Tournament\n";
		$email_body .= "Iowa State Memorial Union Mailbox 156\n";
		$email_body .= "West Student Office Space\n";
		$email_body .= "2229 Lincoln Way\n";
		$email_body .= "Ames, Iowa 50011\n";

		//strip tags from body
		$email_body = strip_tags($email_body);

		if(mail($mailto, $subject, $email_body, $headers))
			echo "<p>A confirmation email has been sent to: " . $email_address . ". If you don't see
				an email, check your spam folder.</p>";
		else
			echo "<p>There was a problem sending your confirmation email.</p>";

	}

}

?>

</body>
</html>
