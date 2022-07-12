<?php
include_once("adodb/session/adodb-cryptsession2.php");
$GLOBALS['USERID']           = $_POST['loginid'];
$ADODB_SESSION_EXPIRE_NOTIFY = array(
    'USERID',
    'NotifyExpire'
);
ADOdb_Session::config('mysql', 'localhost', 'root', '', 'bikesite', false);
ADOdb_session::Persist($connectMode = false);
session_start();
echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\"?" . ">";
require_once('./class/BikeSite.php');
require_once('./class/customer.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<!--	Project:	bluebike_2_store	-->
	<!--	Page name:	logincheck.php	-->
	<!--	Page purpose:	checks login	-->
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
		<h1 id="title">BikeSite Login Verification</h1>
	</div>
	<div id="content">
		<?php
$s = new BikeSite(1, "bluebike");
$login    = $_POST['loginid'];
$password = md5($_POST['password']);
echo '<div class="message">';
if (isset($login)) {
    $customer = $s->getCustomer_login($login, $password);
    if (isset($customer)) {
		 $customerId = $customer->ID();
	   if (isset($customerId)) {
			// This should be in this statement not the other!! (prevents unauthorized intrusions IE. logging in with invalid credentials)
			$_SESSION['cust'] = serialize($customer);
			session_commit();
            print "<script>";
            print "self.location='index.php';";
            print "</script>";
        } else {
            echo 'Incorrect Login. Please <a href="login.php">Retry</a>.';
        }
		
    } else {
        echo 'Incorrect Login. Please <a href="login.php">Retry</a>.';
    }
} else {
    echo 'Incorrect Login. Please <a href="login.php">Retry</a> or<br /><a href="index.php">Restart</a>.';
    echo '</div>';
}
function NotifyExpire($expireref, $sesskey)
{
    $user = $ADODB_SESS_CONN->qstr($expireref);
    $ADODB_SESS_CONN->Execute("delete from sessions2 where expireref = '$user'");
}
?>
	</div>
</body>
</html>
