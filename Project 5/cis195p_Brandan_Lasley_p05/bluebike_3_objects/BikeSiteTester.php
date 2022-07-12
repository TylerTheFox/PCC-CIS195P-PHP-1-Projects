<?php
	echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\"?".">";
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

<title>bluebike 3 Object Tester</title><br />
</head>

<body>
<?php
require_once ('./class/BikeSite.php');
require_once ('./class/customer.php');
require_once ('./class/Bike.php');

	//	initialize local variables to be used for customer construction later
	//
	$id = 34;
	$email = "mickey.mouse@pcc.edu";
	$name = "Micky";
	$male = true;
	$iagree = true;
	$login = "emem";
	$password =  md5("disney");

	echo "<h2>Test Music Store Construction</h2>";

	//	test dummy store construction
	//
	$store = new BikeSite(1, null);
	echo ($store->toString());

	//	test "real" store construction
	//
	$store = new BikeSite(2, "Dave's bluebike Music");
	echo ($store->toString());

	//	test store's  methods for customers
	//
	echo "<h1>Test BlueBikes's Customer Access Methods</h1>";
	$cust1 = $store->getcustomerbyid(1);
	echo ($cust1->toString());

	//	test store customer access using login and password
	//
	$cust2 = $store->getCustomer_login("lcohen", md5("password"));
	echo ($cust2->toString());

	//	test adding a newly built complete customer to the store
	//
	$cust3 = $store->addCustomer($email, $name, $male, $iagree, $login, $password);
	echo ($cust3->toString());

	//	test  customer  construction
	//
	echo "<h2>Test Customer Construction</h2>";
	echo "<h3>Option 1</h3>";

	//	dummy
	//
	$cust = new Customer(1, null, null, null, null, null, null);
	echo ($cust->toString());

	//	"real"
	//
	$cust = new Customer(2, null, null, null, null, null, null);
	echo ($cust->toString());

	echo "<h3>Option 2</h3>";

	//	dummy
	//
	$cust = new Customer(null, null, null, null, null, 'lcohen', md5('password'));
	echo ($cust->toString());

	//	"real"
	//
	$cust = new Customer(null, null, null, null, null, 'thanna', md5('teacher'));
	echo ($cust->toString());

	echo "<h3>Option 3</h3>";
	$cust = new Customer(null, $email, $name, $male, $iagree, $login, $password);
	echo ($cust->toString());

	echo "<h3>Option 4</h3>";
	$cust = new Customer($id, $email, $name, $male, $iagree, $login, $password);
	echo ($cust->toString());

	//	test store's  method for media
	//
	echo "<h2>Test BlueBike's bike Collection Access Method and ...</h2>";

	//	also testing some of Collection's methods
	//
	$bike = new bike(1, "Blue Bike 3", "Yamahhs", 2005, 50, "mountain", 20, 100);
	
	echo "<h3>Collection's constructor, add(), first(), hasNext()"
			. " and next() Methods</h3>";
	$BikeCollection = $bike->getAll();
	$BikeCollection->first();
	while ($BikeCollection->hasNext()) {
		$bike = $BikeCollection->next();
		echo $bike->toString();
	}

	//	testing some more of Collection's methods
	//
	echo "<h3>Collection's last(), contains(), previous() and"
			. " remove() Methods</h3>";
	$BikeCollection->last();
	if ($BikeCollection->contains( $BikeCollection->previous() ))
		$BikeCollection->remove( $BikeCollection->previous() );
	$BikeCollection->first();
	while ($BikeCollection->hasNext()) {
		$bike = $BikeCollection->next();
		echo $bike->toString();
	}

	//	testing the remainder of Collection's methods
	//
	echo "<h3>Collection's hasPrevious() and count() Methods</h3>";
	$BikeCollection->last();
	$BikeCollection->remove( $BikeCollection->previous() );
	$BikeCollection->last();
	while ($BikeCollection->hasPrevious()) {
		$bike = $BikeCollection->previous();
		echo $bike->toString();
	}
	echo $BikeCollection->count();

	//	test Customer constructor error last since it will end the program
	//
	echo "<h2>Deliberate Customer Construction Error</h2>";
	$cust = new Customer(null, null, $name, $male, $iagree, $login, $password);
	echo ($cust->toString());

?>
</body>
</html>