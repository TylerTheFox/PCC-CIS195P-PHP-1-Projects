<?php
echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\"?" . ">";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<!--	Project:	bluebike_3_objects	-->
	<!--	Page name:	MusicStoreTester.php	-->
	<!--	Page purpose:	detect defects in MusicStore
				and Customer classes before integrating them
				into the site development branch	-->
	<!--	Author:		Dave Blizzard and friends	-->
	<!--	Last modified:	09/20/10 by Taylor Hanna	-->

	
<title>bluebike 4 Object Tester</title><br />
</head>

<body>
<?php

require_once('./class/BikeSite.php');
require_once('./class/customer.php');
require_once('./class/Bike.php');

$id       = 34;
$email    = "mickey.mouse@pcc.edu";
$name     = "Micky";
$male     = true;
$iagree   = true;
$login    = "emem";
$password = md5("disney");

echo "<h2>Test BikeSite Construction</h2>";

$store = new BikeSite(1, null);
echo ($store->toString());

$store = new BikeSite(2, "Dave's bluebike");
echo ($store->toString());

echo "<h2>Test BikeSite's Customer Access Methods</h2>";

$cust1 = $store->getCustomer_ID(1);
if (isset($cust1))
    echo ($cust1->toString());

$cust2 = $store->getCustomer_login("lcohen", md5("password"));
if (isset($cust2))
    echo ($cust2->toString());

$cust3 = $store->addCustomer($email, $name, $male, $iagree, $login . rand(1, 2000), $password);
if (isset($cust3))
    echo ($cust3->toString());

echo "<h2>Test Customer Construction</h2>";
echo "<h3>Option 1</h3>";

$cust = new Customer(1, null, null, null, null, null, null);
echo ($cust->toString());

echo "<h3>Option 2</h3>";

$cust = new Customer(null, null, null, null, null, 'chayden', md5('password'));
echo ($cust->toString());

echo "<h3>Option 3</h3>";
$cust = new Customer(null, $email, $name . "Mouse", $male, $iagree, $login . rand(1, 2000), $password);
echo ($cust->toString());

echo "<h3>Option 4</h3>";
$cust = new Customer($id, $email, $name, $male, $iagree, $login . rand(1, 2000), $password);
echo ($cust->toString());

echo "<h2>Test BikeSite's Collection Access Methods</h2>";

echo "<h3>Testing BikeSite::getAllCustomers()</h3>";
$customerCollection = $store->getAllCustomers();
$customerCollection->first();
while ($customerCollection->hasNext()) {
    $customer = $customerCollection->next();
    echo $customer->toString();
}

echo "<h3>Testing BikeSite::getAllBikes()" . "and Collection's constructor, add(), first(), hasNext()" . " and next() Methods</h3>";
$bikeCollection = $store->getAllBikes();
$bikeCollection->first();
while ($bikeCollection->hasNext()) {
    $bike = $bikeCollection->next();
    echo $bike->toString();
}

echo "<h3>Collection's last(), contains(), previous() and" . " remove() Methods</h3>";
$bikeCollection->last();
if ($bikeCollection->contains($bikeCollection->previous()))
    $bikeCollection->remove($bikeCollection->previous());
$bikeCollection->first();
while ($bikeCollection->hasNext()) {
    $bike = $bikeCollection->next();
    echo $bike->toString();
}

echo "<h3>Collection's hasPrevious() and count() Methods</h3>";
$bikeCollection->last();
$bikeCollection->remove($bikeCollection->previous());
$bikeCollection->last();
while ($bikeCollection->hasPrevious()) {
    $bike = $bikeCollection->previous();
    echo $bike->toString();
}
echo $bikeCollection->count();

echo "<h2>Deliberate Customer Construction Error</h2>";
$cust = new Customer(null, null, $name, $male, $iagree, $login, $password);
echo ($cust->toString());

?>
</body>
</html>