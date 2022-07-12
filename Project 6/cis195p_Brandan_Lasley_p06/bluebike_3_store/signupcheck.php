<?php
	echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\"?".">";
$classfolder = "class";
 require_once("./$classfolder/BikeSite.php");
 require_once("./$classfolder/Customer.php");
 require_once("langsettings.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<!--	Project:	bluebike_2_store	-->
	<!--	Page name:	signupcheck.php	-->
	<!--	Page purpose:	validate signup form data, reporting errors
				or adding new customers	-->
	<!--	Based on:	XAMPP cd demo
				Copyright (C) 2002/2003 Kai Seidler	-->
	<!--	Author:		Brandan Tyler Lasley	-->
	<!--	Last modified:	02/13/2014 22:43 by Brandan Tyler Lasley	-->

	<title>bluebike </title>
	<!-- Don't cache these pages	-->
	<meta http-equiv="cache-control" content="no-cache" />
	<meta http-equiv="expires" content="Mon, 22 Jul 2002 11:12:01 GMT" />

	<!-- Don't expose this page to search engines	-->
	<meta name="robots" content="noindex, nofollow" />

	<!-- Format using style sheets	-->
	<link href="styles/default.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div>
	<h1 id="title">bluebike Signup Validation</h1>
</div>
<div id="content">
	<table border='0' width='50%' cellspacing='0' cellpadding='0' align=left>
<?php
	//	create the BikeSite
	//
	$s = new BikeSite(null, "bluebike");

	//	copy the posted input variables to local variables
	//		with transformations as required
	//
	if (isset($_POST['todo']) && isset($_POST['email'])  && isset($_POST['name'])) {
		$todo = $_POST['todo'];
		$email = $_POST['email'];
		$name = $_POST['name'];
	} else {
		$todo = NULL;
		$email = NULL;
		$name = NULL;
	}

	if (isset($_POST['sex'])) {
		if ($_POST['sex'] == "male") {
			$male = true;
		} else {
			$male = false;
		}
	} else {
		$male = NULL;
	}
	
	if (isset($_POST['iagree'])) {
		if ($_POST['iagree'] == "yes") {
			$iagree = true;
		} else {
			$iagree = false;
		}
	} else {
		$iagree = NULL;
	}

		if (isset($_POST['login'])) {
			$login = $_POST['login'];
		} else {
			$login = NULL;
		}
		
		if (isset($_POST['password'])) {
			$password = sha1($_POST['password']);
		} else {
			$password = NULL;
		}
		if (isset($_POST['password2'])) {
			$password2 = sha1($_POST['password2']);
		} else {
			$password2 = NULL;
		}
		if (isset($_POST['password3'])) {
		//echo $_POST['password3'];
			$password3 = sha1($_POST['password3']);
		} else {
			$password3 = NULL;
		}
		
	//	now validate the data before using it further,
	//		building and error message string when validation fails
	//		for subsequent reporting
	//
	if (isset($todo) and $todo == "post") {
		$status = "OK";
		$msg = "<th colspan=2>" . $TEXT['rnm-reg-0'] . "</th>
		<tr><td width=15%></td><td>";

		//	if login < 4 char then error
		//
		if (!isset($login) or strlen($login) < 4) {
			$msg = $msg.$TEXT['rnm-reg-1']."<BR>";
			$status = "error";
		}

		//	if login already exists then error
		//
		$customer = $s->getCustomer_login($login, $password);
		if (! $customer->ID() == null) {
			$msg = $msg.$TEXT['rnm-reg-5'] . "<BR>";
			$status = "error";
		}

		//	if email < 8 char then error
		//
		if (!isset($email)
				or strlen($email) < 8
				or strpos($email, "@") === false) {
			$msg = $msg.$TEXT['rnm-reg-2']."<BR>";
			$status = "error";
		}

		//	if name < 3 char then error
		//
		if (!isset($name) or strlen($name) < 3) {
			$msg = $msg.$TEXT['rnm-reg-3']."<BR>";
			$status = "error";
		}

		//	if password < 4 char then error
		//
		if (strlen($password) < 4 ) {
			$msg = $msg.$TEXT['rnm-reg-6']."<BR>$password";
			$status = "error";
		}

		//	if passwords don't match then error
		//
		if (($password != $password2) OR ($password2 != $password2)) {
			$msg = $msg.$TEXT['rnm-reg-7']."<BR>";
			$status = "error";
		}

		//	if you don't agree with everything then error
		//
		if ($iagree <> 1) {
			$msg = $msg.$TEXT['rnm-reg-4']."<BR>";
			$status = "error";
		}

		if ($status <> "OK") {
			echo "$msg<br><input type='button' value='" . $TEXT['rnm-button-5'] . "' onClick='history.go(-1)'></td></td></table>";
		}
		else {
			//	 if all validations are passed.
			//
			$customer = $s->addCustomer($email, $name, $male,
					$iagree, $login, $password);
			echo $TEXT['rnm-reg-complete-0'];
		}
	}
?>
</div>
</body>
</html>
