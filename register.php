<?php
//get status
if (isset($_GET['error'])) {
	$error = $_GET['error'];
} else {
	$error = "";
}

if ($error != "")
{
	echo "<p class='error'>There was an error processing your registration:</p>";
	echo "<p class='error'>" . stripslashes($error) . "</p>";
	echo "<p class='error'>Please try again.</p>";
}

?>

<html>
<title>ISU Badminton Open Registration</title>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>

<center>
<img src="cyclone.jpg" alt="Cyclone Logo" title="Cyclone Logo" />
<h1>ISU Badminton Open</h1>
<h1>Saturday March 25th & Sunday March 26th, 2012</h1>

<h2>Please complete the following form to register for the tournament.</h2>
</center>
<br>
<p>There are no requirements for membership in any badminton club or association (USAB, etc.).</p>
<p>Questions or problems? Contact Club President: Muneaki Watanabe, <a href="mailto:mune1122@iastate.edu">mune1122@iastate.edu</a></p>
<br>
<font color=red><b>*</b></font> = required information
<br>
<br>
<br>
<form action="submit.php" method="POST">

<big><font color=red><b>*</b></font>First Name:</big>
<input type="text" size="40" name="first_name" maxlength="25">
<br>

<big><font color=red><b>*</b></font>Last Name:</big>
<input type="text" size="40" name="last_name" maxlength="25">
<br>

<br>
<big>Are you an ISU Badminton Club Member?</p>
<input type="checkbox" name="club_member">Yes
<br>
<br>

<big><font color=red><b>*</b></font>What is your gender?</big>
<input type="radio" name="gender" value="Male"> Male
<input type="radio" name="gender" value="Female"> Female
<br>
<br>
<big><font color=red><b>*</b></font>Address:</big>
<input type="text" size="60" name="address" maxlength="50">
<br>

<big><font color=red><b>*</b></font>City:</big>
<input type="text" size="40" name="city" maxlength="50">
<br>

<big><font color=red><b>*</b></font>State:</big>
<select name="state" size="1">
<option selected value="">State...</option>
<option value="AL">Alabama</option>
<option value="AK">Alaska</option>
<option value="AZ">Arizona</option>
<option value="AR">Arkansas</option>
<option value="CA">California</option>
<option value="CO">Colorado</option>
<option value="CT">Connecticut</option>
<option value="DE">Delaware</option>
<option value="FL">Florida</option>
<option value="GA">Georgia</option>
<option value="HI">Hawaii</option>
<option value="ID">Idaho</option>
<option value="IL">Illinois</option>
<option value="IN">Indiana</option>
<option value="IA">Iowa</option>
<option value="KS">Kansas</option>
<option value="KY">Kentucky</option>
<option value="LA">Louisiana</option>
<option value="ME">Maine</option>
<option value="MD">Maryland</option>
<option value="MA">Massachusetts</option>
<option value="MI">Michigan</option>
<option value="MN">Minnesota</option>
<option value="MS">Mississippi</option>
<option value="MO">Missouri</option>
<option value="MT">Montana</option>
<option value="NE">Nebraska</option>
<option value="NV">Nevada</option>
<option value="NH">New Hampshire</option>
<option value="NJ">New Jersey</option>
<option value="NM">New Mexico</option>
<option value="NY">New York</option>
<option value="NC">North Carolina</option>
<option value="ND">North Dakota</option>
<option value="OH">Ohio</option>
<option value="OK">Oklahoma</option>
<option value="OR">Oregon</option>
<option value="PA">Pennsylvania</option>
<option value="RI">Rhode Island</option>
<option value="SC">South Carolina</option>
<option value="SD">South Dakota</option>
<option value="TN">Tennessee</option>
<option value="TX">Texas</option>
<option value="UT">Utah</option>
<option value="VT">Vermont</option>
<option value="VA">Virginia</option>
<option value="WA">Washington</option>
<option value="WV">West Virginia</option>
<option value="WI">Wisconsin</option>
<option value="WY">Wyoming</option>
</select>

<br>

<big><font color=red><b>*</b></font>Zip:</big>
<input type="text" size="15" name="zip" maxlength="15">
<br>

<big>Phone Number:</big>
<input type="text" size="15" name="phone" maxlength="20">
<br>

<br>
<big><font color=red><b>*</b></font>Age:</big>
<input type="text" size="3" name="age" maxlength="2">(must be 16 or older)
<br>
<br>
<big><font color=red><b>*</b></font>Rate your level of experience (A is best):</big>
<input type="radio" name="exp_level" value="A"> A (semiprofessional/professional)
<input type="radio" name="exp_level" value="B"> B (advanced)
<input type="radio" name="exp_level" value="C"> C (intermediate)
<input type="radio" name="exp_level" value="D"> D (beginner)
<br>
<br>
<big><font color=red><b>*</b></font>Check the events you are registering in:</big>
<br>For Non Member of ISU Badminton club: $15 for 1st event, $5 for each additional event.
<br>For Member of ISU Badminton club: $10 for 1st event, $5 for each additional event.
<br>
<input type="checkbox" name="men_single"> Men's Singles
<br>
<input type="checkbox" name="men_double"> Men's Doubles
<br>
<input type="checkbox" name="woman_single"> Woman's Singles
<br>
<input type="checkbox" name="woman_double"> Woman's Doubles
<br>
<input type="checkbox" name="mixed_double"> Mixed Doubles
<br>

<font color=red><b>* (only for doubles)</b></font><br>
<big>Men's Doubles Partner Name:</big>
<input type="text" size="30" name="men_double_name" maxlength="50">
<br>
<big>Woman's Doubles Partner Name:</big>
<input type="text" size="30" name="woman_double_name" maxlength="50">
<br>
<big>Mixed Doubles Partner Name:</big>
<input type="text" size="30" name="mixed_double_name" maxlength="50">
<br>
<br>
<big><font color=red><b>*</b></font>Email Address:</big>
<input type="text" size="35" name="email_address" maxlength="40">
<br>
<big>Would you like to be contacted about future badminton tournaments at ISU?</big>
<br>
<input type="checkbox" name="contact_future">Yes

<br>
<br>
<br>
<p><big><font color=red><b>*</b></font>Waiver: By checking the box below, I agree to waive any and all claims that may arise from my participation
in this tournament. I release and discharge all participants in this tournament, Iowa State University, ISU Badminton
Club, administrators, and volunteers for any bodily injury to myself or others, or for any damage during the course
of the event.</big></p>
<input type="checkbox" name="waiver">I agree to the above conditions.

<br>
<br>
<input type="submit" name="submit" value="Register">
</form>


<br><br>

</body>
</html>
