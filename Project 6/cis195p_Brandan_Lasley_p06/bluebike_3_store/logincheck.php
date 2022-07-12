<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
	echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\"?".">";
	$classfolder = "class";
     require_once("./$classfolder/BikeSite.php");
     require_once("./$classfolder/Customer.php");
	 require_once("langsettings.php");
?>
	<title>bluebike </title>

	<!--	Project:		bluebike_2_store	-->
	<!--	Page name:	logincheck.php	-->
	<!--	Page purpose:	verify login	-->
	<!--	Author:		Brandan Tyler Lasley	-->
	<!--	Last modified:	02/13/2014 20:59 by Brandan Tyler Lasley	-->

	
	<!-- Don't cache these pages	-->
	<meta http-equiv="cache-control" content="no-cache" />

	<!-- Force page expiration by chosing an old date	-->
	<meta http-equiv="expires" content="Mon, 22 Jul 2002 11:12:01 GMT" />

	<!-- Don't expose this page to search engines (not that this will stop impolite search engines!)	-->
	<meta name="robots" content="noindex, nofollow" />

	<!-- Format using style sheets	-->
	<link href="styles/default.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<div>
		<h1 id="title">bluebike <?PHP echo($TEXT['rnm-login-0']); ?></h1>
	</div>
	<div id="content">
		<?php
			//	create the store
			//
			$s = new BikeSite(NULL, "bluebike", "supersecretpassword1", "supersecretpassword2", "supersecretpassword3");
			
			//	save form data in local variables
			//
			$login = $_POST['loginid'];
			$password = $_POST['password'];

			echo '<div class="message">';

			if (isset($login)) {
				$customer = $s->getCustomer_login($login, $password);

				if (isset($customer)) {
				  $customerId = $customer->ID();
					if (isset($customerId))
						echo 'You successfully logged in, but there is nowhere to go yet!'
								. '<br /><br />Either <a href="logout.php">Log Out</a>'
								. ' or <a href="index.php?cid=' . $customerId . '&pwd='
								. $password . '">Continue Shopping anyway...</a>.';
					else
						echo $TEXT['rnm-login-3'];
				}
				else
					echo $TEXT['rnm-login-3'];
			}
			else
				echo $TEXT['rnm-login-4'];
			echo '</div>';
		?>
	</div>
</body>
</html>
