<!--	Project:	rednote_4_objects	-->
<!--	Page name:	CustomerData.php	-->
<!--	Author:		Dave Blizzard and friends	-->
<!--	Last modified:	09/20/10 by Taylor Hanna	-->

<?php
require_once ('./class/Collection.php');
require_once ('DB_ACCESS.ini');
require_once ('MDB2.php');
require_once ('ERROR.ini');
require_once ('./class/Bike.php');


class CustomerData  {

	//	Query for all Customers and return a corresponding collection of them
	//
	public function getAll() {

		//	generate a DB connection and query result
		//
		$dbReference =& MDB2::connect(DSN, OPTIONS);
		if (PEAR::isError($dbReference)) {
			$errorMessage = $dbReference->getMessage() ."\n"
											   . $dbReference->getUserInfo() ."\n"
											   . $dbReference->getDebugInfo() . "\n";
			error_log($errorMessage, 3, DB_ERROR_LOG);
			die($errorMessage);
		}

		$queryResult = $dbReference->query(SELECT_ALL_CUSTOMERS);
		//	Terminate execution on any error, and log what happened
		//
		if (PEAR::isError($queryResult)) {
			$errorMessage = $queryResult->getMessage() ."\n"
											   . $queryResult->getUserInfo() ."\n"
											   . $queryResult->getDebugInfo() . "\n";
			error_log($errorMessage, 3, DB_ERROR_LOG);
			die($errorMessage);
		}

		//	Build a collection of Customer Items
		//
		$collection = new Collection();
		while($row =& $queryResult->fetchRow(MDB2_FETCHMODE_ORDERED)) {
			$currentCustomer = new Customer($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6]);
			$collection->add($currentCustomer);
		}

		//	Free resources used for the query and the DB connection
		//
		$queryResult->free();
		$dbReference->disconnect();

	    return $collection;
   	}

	//	Query to get and return one Customers via their pk_CustomerID
	//
	public function getID($id) {

		//	generate a DB connection and query result
		//
		$dbReference =& MDB2::connect(DSN, OPTIONS);
		if (PEAR::isError($dbReference)) {
			$errorMessage = $dbReference->getMessage() ."\n". $dbReference->getUserInfo() ."\n". $dbReference->getDebugInfo() . "\n";
			error_log($errorMessage, 3, DB_ERROR_LOG);
			die($errorMessage);
		}

		//	03/15/07: Fixed case error /Customer/customer/
		//	03/15/07: Added columns to Customer Table: email male iagree
		//
		$queryString = "SELECT pk_CustomerID, email, name, male, iagree, login, password FROM customer where pk_CustomerID = " . $id . ";";
		$queryResult = $dbReference->query($queryString);

		//	Terminate execution on any error, and log what happened
		//
		if (PEAR::isError($queryResult)) {
			$errorMessage = $queryResult->getMessage() ."\n". $queryResult->getUserInfo() ."\n". $queryResult->getDebugInfo() . "\n";
			error_log($errorMessage, 3, DB_ERROR_LOG);
			die($errorMessage);
		}

		//	Build a Customer
		//
		if($row =& $queryResult->fetchRow(MDB2_FETCHMODE_ORDERED)) {
			$currentCustomer = new Customer($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6]);
		}
		else {
		    $currentCustomer = null;
		}

		//	Free resources used for the query and the DB connection
		//
		$queryResult->free();
		$dbReference->disconnect();

	    return $currentCustomer;
   	}

   	//	Query to get and return one Customer's pk_CustomerID
	//
	public function getLogin($login, $password) {

		//	generate a DB connection and query result
		//
		$dbReference =& MDB2::connect(DSN, OPTIONS);
		if (PEAR::isError($dbReference)) {
			$errorMessage = $dbReference->getMessage() ."\n". $dbReference->getUserInfo() ."\n". $dbReference->getDebugInfo() . "\n";
			error_log($errorMessage, 3, DB_ERROR_LOG);
			die($errorMessage);
		}

		$queryString = "SELECT pk_CustomerID, email, name, male, iagree, login, password FROM customer where login = '" . $login . "' and password = '" . $password . "';";
		$queryResult = $dbReference->query($queryString);

		//	Terminate execution on any error, and log what happened
		//
		if (PEAR::isError($queryResult)) {
			$errorMessage = $queryResult->getMessage() ."\n". $queryResult->getUserInfo() ."\n". $queryResult->getDebugInfo() . "\n";
			error_log($errorMessage, 3, DB_ERROR_LOG);
			die($errorMessage);
		}

		//	Build a Customer
		//
		if($row =& $queryResult->fetchRow(MDB2_FETCHMODE_ORDERED)) {
			$currentCustomer = new Customer($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6]);
		}
		else {
		    $currentCustomer = null;
		}

		//	Free resources used for the query and the DB connection
		//
		$queryResult->free();
		$dbReference->disconnect();

	    return $currentCustomer;
   	}

	//	inserts a new custoomer into the table
	//
	public function insert($email, $name, $male, $iagree, $login, $password){
 		//	create DB connection and query result
		//
		$dbReference =& MDB2::connect(DSN, OPTIONS);
		if (PEAR::isError($dbReference)) {
			$errorMessage = $dbReference->getMessage() ."\n". $dbReference->getUserInfo()
											   . "\n". $dbReference->getDebugInfo() . "\n";
			error_log($errorMessage, 3, DB_ERROR_LOG);
			die($errorMessage);
		}

		$queryString = "INSERT INTO customer (email, name, male, iagree, login, password) VALUES('$email', '$name', $male, $iagree, '$login', '$password');";
		$queryResult = $dbReference->query($queryString);

		//	terminate execution on any error, and log what happened
		//
		if (PEAR::isError($queryResult)) {
			$errorMessage = $queryResult->getMessage() ."\n". $queryResult->getUserInfo()
			                                   . "\n". $queryResult->getDebugInfo() . "\n";
			error_log($errorMessage, 3, DB_ERROR_LOG);
			die($errorMessage);
		}

		//	free resources used for the query and the DB connection
		//
		$queryResult->free();
		$dbReference->disconnect();


	    return CustomerData::getLogin($login, $password);
	}

	public function delete($id){
	}
}
?>
