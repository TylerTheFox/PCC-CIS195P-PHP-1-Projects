<!DOCTYPE html>
<html>
<head>
	<!--	Project:	bluebike_2_store	-->
	<!--	Page name:	index.php	-->
	<!--	Page purpose:	display media, permit login, permit signup	-->
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
<h1 id="title">bluebike </h1>
</div>
<div id="navigation">
<?php
	$classfolder = "class";
	require_once("./$classfolder/BikeSite.php");
    require_once ("./$classfolder/Customer.php");

	$isLoggedIn = false;
	
	// the '@' suppresses the warning that occurs when trying to read an undefined variable
	// $_REQUEST['cid'] and $_REQUEST['pwd'] will be undefined if a user who is not
	// logged in browses to this page.
	if (isset($_REQUEST['cid']) && isset($_REQUEST['pwd'])) {
		$customerId = @$_REQUEST['cid'];
		$password = @$_REQUEST['pwd'];
	} else {
		$customerId = null;
		$password = null;
	}


	//	get the store
	//
	$s = new BikeSite(1, "bluebike", "supersecretpassword1", "supersecretpassword2", "supersecretpassword3");

	//	get the customer via id
	//
	if (isset($customerId))
		$customer = $s->getcustomerbyid($customerId);

    //	validate the customer
	//
 	if (isset($customer) and (sha1($password) == $customer->Password())) {
 		$isLoggedIn = true;
 		echo "<h5>Hello, " . filter_var($customer->Name(), FILTER_SANITIZE_STRING) . " </h5>";
 		echo "<h5><a href='logout.php'>Logout</a></h5>";
 	}
	else {
 		echo "<h5>You must login or signup before you can begin shopping.</h5>";
		echo '<h5><a href="login.php">Login</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="signup.php">New Member Signup</a><h5>';
 	}

?>
</div>
<div id="content">
<table>
<?php
echo "<h4>The  media for sale will be listed here in a future evolution.</h4>";
?>
</table>
</div>
</body>
</html>
