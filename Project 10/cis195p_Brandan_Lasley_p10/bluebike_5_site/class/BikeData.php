<!--	Project:	bluebike_4_objects	-->
<!--	Page name:	BikeData.php	-->
<!--	Page purpose:	encapsulate database interaction on behalf of Bike class	-->
<!--	Author:		Brandan Tyler Lasley & friends	-->
<!--	Last modified:	2/5/14 by Brandan Tyler Lasley	-->

<?php
require_once ('DB_ACCESS.ini');
require_once ('MDB2.php');
require_once ('ERROR.ini');
require_once ('./class/Bike.php');

class BikeData  {

	//	Query for all BikeItems and return a corresponding collection of them
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

		$queryResult = $dbReference->query(SELECT_ALL_Bike_ITEMS);

		//	Terminate execution on any error, and log what happened
		//
		if (PEAR::isError($queryResult)) {
			$errorMessage = $queryResult->getMessage() ."\n"
											   . $queryResult->getUserInfo() ."\n"
											   . $queryResult->getDebugInfo() . "\n";
			error_log($errorMessage, 3, DB_ERROR_LOG);
			die($errorMessage);
		}

		//	Build a collection of Bike Items
		//
		$collection = new Collection();
		while($row =& $queryResult->fetchRow(MDB2_FETCHMODE_ORDERED)) {
			$currentBikeItem = new Bike($row[0], $row[1], $row[2], $row[3], $row[4], $row[5],$row[6],$row[7], $row[8]);
			$collection->add($currentBikeItem);
		}

		//	Free resources used for the query and the DB connection
		//
		$queryResult->free();
		$dbReference->disconnect();

	    return $collection;

   	}

   	//	given a Bike item ID, return a corresponding Bike object reference
	//
   	static public function getBikeItem($BikeItemID) {
		//	create DB connection and query result
		//
		$dbReference =& MDB2::connect(DSN, OPTIONS);

		if (PEAR::isError($dbReference)) {
			$errorMessage = $dbReference->getMessage() ."\n"
											   . $dbReference->getUserInfo() . "\n"
											   . $dbReference->getDebugInfo() . "\n";
			error_log($errorMessage, 3, DB_ERROR_LOG);
			die($errorMessage);
		}

		$queryString = 'SELECT Artist.name, BikeItem.title, BikeItem.year, BikeType.description FROM BikeItem, Artist, BikeType WHERE BikeItem.fk_ArtistID = Artist.pk_ArtistID AND BikeItem.fk_BikeTypeID = BikeType.pk_BikeTypeID AND BikeItem.pk_BikeItemID = ' . $BikeItemID . ';';
		$queryResult = $dbReference->query($queryString);

		//	terminate execution on any error, and log what happened
		//
		if (PEAR::isError($queryResult)) {
			$errorMessage = $queryResult->getMessage() ."\n". $queryResult->getUserInfo() . "\n". $queryResult->getDebugInfo() . "\n";
			error_log($errorMessage, 3, DB_ERROR_LOG);
			die($errorMessage);
		}

		while($row =& $queryResult->fetchRow(MDB2_FETCHMODE_ORDERED))
			$requestedBikeItem = new Bike($BikeItemID, $row[0], $row[1], $row[2], $row[3], $row[4]);

		//	free resources used for the query and the DB connection
		//
		$queryResult->free();
		$dbReference->disconnect();

		return $requestedBikeItem;

	}
}
?>
