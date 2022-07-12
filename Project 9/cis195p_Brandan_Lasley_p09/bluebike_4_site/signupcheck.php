<?php
echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\"?" . ">";
require_once('./class/BikeSite.php');
require_once('./class/customer.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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
	<h1 id="title">BikeSite Signup Validation</h1>
</div>
<div id="content">
	<table border='0' width='50%' cellspacing='0' cellpadding='0' align=left>
<?php
$s     = new BikeSite(null, "BikeSite");
$todo  = $_POST['todo'];
$email = $_POST['email'];
$name  = $_POST['name'];
if ($_POST['sex'] == "male")
    $male = true;
else
    $male = false;
if (@$_POST['iagree'] == "yes")
    $iagree = true;
else
    $iagree = false;
$login     = $_POST['login'];
$password  = md5($_POST['password']);
$password2 = md5($_POST['password2']);
if (isset($todo) and $todo == "post") {
    $status = "OK";
    $msg    = '<table><tr><th colspan=2>The following errors were found:</th></tr>
		<tr><td width="5%"></td></tr><td width="5%"></td><td>';
    if (!isset($login) or strlen($login) < 4) {
        $msg    = $msg . 'Login must be at least 4 char</td></tr><tr><td width="5%"></td><td>';
        $status = "error";
    }
    $customer = $s->getCustomer_login($login, $password);
    if (!$customer->ID() == null) {
        $msg    = $msg . 'Login already exists. Please try another one</td></tr><tr><td width="5%"></td><td>';
        $status = "error";
    }
    if (!isset($email) or strlen($email) < 8 or strpos($email, "@") === false) {
        $msg    = $msg . 'Email must be valid</td></tr><tr><td width="5%"></td><td>';
        $status = "error";
    }
    if (!isset($name) or strlen($name) < 3) {
        $msg    = $msg . 'Name must be at least 3 char</td></tr><tr><td width="5%"></td><td>';
        $status = "error";
    }
    if (strlen($password) < 4) {
        $msg    = $msg . 'Password must be at least 4 char</td></tr><tr><td width="5%"></td><td>';
        $status = "error";
    }
    if ($password <> $password2) {
        $msg    = $msg . 'Passwords don\'t match</td></tr><tr><td width="5%"></td><td>';
        $status = "error";
    }
    if ($iagree <> 1) {
        $msg    = $msg . 'You must agree to everything</td></tr><tr><td width="5%"></td><td>';
        $status = "error";
    }
    if ($status <> "OK") {
        session_unset();
        echo <<<eot
					$msg </td></tr><tr><td colspan=2>
					<input type='button' value='Retry' onClick='history.go(-1)'></td></tr>
					</table>
eot;
    } else {
        $customer = $s->addCustomer($email, $name, $male, $iagree, $login, $password);
        echo <<<eot
					<tr><td colspan=2>Welcome $name, You have successfully signed up as a new customer.
					<br /><br /><a href = login.php>Click here to login</a><br /></td></tr>
					</table>
eot;
    }
}
?>
</div>
</body>
</html>
