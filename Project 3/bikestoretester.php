<?php
	echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\"?".">";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<!--	Project:	BlueBike Objects (Customer DB)	-->
	<!--	Page name:	bikestoretester.php	-->
	<!--	Page purpose:	detect defects in BikeStore
				and Customer classes before integrating them
				into the site development branch	-->
	<!--	Author:		Brandan Tyler Lasley & friends	-->
	<!--	Last modified:	2/5/14 by Brandan Tyler Lasley	-->
	<title> Blue Bike Store Object Tester </title>
</head>


<body>
<?PHP

$classfolder = "class";

require_once("./$classfolder/bikestore.php");
require_once("./$classfolder/customer.php");

$id     = 10;
$email  = "admin@brandanlasley.com";
$name   = "Brandan Lasley";
$male   = true;
$iagree = true;
$login  = 'Secret';

// I would've used password_hash but I dont have PHP  5.5.0 on this machine and I assume you dont also.
// Sha1 is longer though, but probably provides no security at all due to Rainbow tables & bruteforce or hints
// like Adobe.

$password = sha1("supersecret");

echo ("<h1> Test Bike Store Construction! </h1>");

$store = new bikestore(1, null);
echo ($store->toString());

$store = new bikestore(2, "Brandans Supersecret XSS Bike site");
echo ($store->tostring());

echo "<h1>Test BlueBikes's Customer Access Methods</h1>";
$cust1 = $store->getcustomerbyid(1);
echo ($cust1->toString());

$cust2 = $store->getCustomerbylogin("Brandan", sha1("supersecret"));
echo ($cust2->toString());

$cust3 = $store->getCustomerbycontactinfo($name, $email, $password);
echo ($cust3->toString());

$cust4 = $store->addCustomer($email, $name, $male, $iagree, $login, $password);
echo ($cust4->toString());

echo "<h2>Test Customer Construction</h2>";
echo "<h3>Option 1</h3>";

$cust = new Customer(1, null, null, null, null, null, null);
echo ($cust->toString());

$cust = new Customer(2, null, null, null, null, null, null);
echo ($cust->toString());

echo "<h3>Option 2</h3>";

$cust = new Customer(null, null, null, null, null, 'admin', md5('bah'));
echo ($cust->toString());

$cust = new Customer(null, null, null, null, null, 'lotsofstuff', md5('boo'));
echo ($cust->toString());

echo "<h3>Option 3</h3>";
$cust = new Customer(null, $email, $name, $male, $iagree, $login, $password);
echo ($cust->toString());

echo "<h3>Option 4</h3>";
$cust = new Customer($id, $email, $name, $male, $iagree, $login, $password);
echo ($cust->toString());

echo "<h3>Deliberate Customer Construction Error</h3>";
$cust = new Customer(null, null, $name, $male, $iagree, $login, $password);
echo ($cust->toString());
?>
</body>


</html>
