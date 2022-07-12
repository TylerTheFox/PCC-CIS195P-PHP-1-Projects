<?php
require_once('./class/Collection.php');
require_once('DB_ACCESS.ini');
require_once('MDB2.php');
require_once('ERROR.ini');
require_once('./class/bike.php');
require_once('./class/Customer.php');
require_once("./class/RentalAgreement.php");
require_once("./class/rentalItem.php");

class RentalData
{
    public function getAll()
    {
        $dbReference =& MDB2::connect(DSN, OPTIONS);
        
        if (PEAR::isError($dbReference)) {
            $errorMessage = $TEXT['rnm-error'] . "\n" . $dbReference->getMessage() . "\n" . $dbReference->getUserInfo() . "\n" . $dbReference->getDebugInfo() . "\n";
            error_log($errorMessage, 3, DB_ERROR_LOG);
            die($errorMessage);
        }
        
        $queryResult = $dbReference->query("SELECT * from rental order by pk_rentalID;");
        
        if (PEAR::isError($queryResult)) {
            $errorMessage = $TEXT['rnm-error'] . "\n" . $queryResult->getMessage() . "\n" . $queryResult->getUserInfo() . "\n" . $queryResult->getDebugInfo() . "\n";
            error_log($errorMessage, 3, DB_ERROR_LOG);
            die($errorMessage);
        }
        
        $collection = new Collection();
        while ($row =& $queryResult->fetchRow(MDB2_FETCHMODE_ORDERED)) {
            $currentrental = new rental($row[0], $row[1], new Collection());
            $collection->add($currentrental);
        }
        
        $queryResult->free();
        $dbReference->disconnect();
        
        return $collection;
    }
    
    
    public function addrental($customerID)
    {
        $dbReference =& MDB2::connect(DSN, OPTIONS);
        
        if (PEAR::isError($dbReference)) {
            $errorMessage = $TEXT['rnm-error'] . "\n" . $dbReference->getMessage() . "\n" . $dbReference->getUserInfo() . "\n" . $dbReference->getDebugInfo() . "\n";
            error_log($errorMessage, 3, DB_ERROR_LOG);
            die($errorMessage);
        }
        
        $queryString = 'INSERT INTO rental (fk_CustomerID, datetime) VALUES(' . $customerID . ', NOW());';
        $queryResult = $dbReference->query($queryString);
        
        if (PEAR::isError($queryResult)) {
            $errorMessage = $TEXT['rnm-error'] . "\n" . $dbReference->getMessage() . "\n" . $dbReference->getUserInfo() . "\n" . $dbReference->getDebugInfo() . "\n";
            error_log($errorMessage, 3, DB_ERROR_LOG);
            die($errorMessage);
        }
        
        $rentalID = $dbReference->lastInsertID('rental', 'pk_rentalID');
        
        $queryResult->free();
        $dbReference->disconnect();
        
        return $rentalID;
    }
    
    public function getrentalID($customerID)
    {
        $dbReference =& MDB2::connect(DSN, OPTIONS);
        
        if (PEAR::isError($dbReference)) {
            $errorMessage = $TEXT['rnm-error'] . "\n" . $dbReference->getMessage() . "\n" . $dbReference->getUserInfo() . "\n" . $dbReference->getDebugInfo() . "\n";
            error_log($errorMessage, 3, DB_ERROR_LOG);
            die($errorMessage);
        }
        $queryString = 'SELECT * FROM rental WHERE rental.fk_CustomerID = ' . $customerID . '  ORDER BY rental.datetime LIMIT 1;';
        $queryResult = $dbReference->query($queryString);
        
        if (PEAR::isError($queryResult)) {
            $errorMessage = $TEXT['rnm-error'] . "\n" . $dbReference->getMessage() . "\n" . $dbReference->getUserInfo() . "\n" . $dbReference->getDebugInfo() . "\n";
            error_log($errorMessage, 3, DB_ERROR_LOG);
            die($errorMessage);
        }
        
        $row =& $queryResult->fetchRow(MDB2_FETCHMODE_ORDERED);
        $rentalID = $row[0];
        
        
        $queryResult->free();
        $dbReference->disconnect();
        
        return $rentalID;
    }
    
    public function getrentalItems($rentalID)
    {
        
        $dbReference =& MDB2::connect(DSN, OPTIONS);
        
        if (PEAR::isError($dbReference)) {
            $errorMessage = $TEXT['rnm-error'] . "\n" . $dbReference->getMessage() . "\n" . $dbReference->getUserInfo() . "\n" . $dbReference->getDebugInfo() . "\n";
            error_log($errorMessage, 3, DB_ERROR_LOG);
            die($errorMessage);
        }
        $queryString = "SELECT * FROM rentalitem WHERE rentalitem.fk_rentalID = " . $rentalID . " ORDER BY pk_rentalItemID;";
        $queryResult = $dbReference->query($queryString);
        
        if (PEAR::isError($queryResult)) {
            $errorMessage = $TEXT['rnm-error'] . "\n" . $dbReference->getMessage() . "\n" . $dbReference->getUserInfo() . "\n" . $dbReference->getDebugInfo() . "\n";
            error_log($errorMessage, 3, DB_ERROR_LOG);
            die($errorMessage);
        }
        
        $collection = new Collection();
        while ($row =& $queryResult->fetchRow(MDB2_FETCHMODE_ORDERED)) {
            $currentrentalItem = new rentalItem($row[0], $row[1], $row[2], $row[3]);
            $collection->add($currentrentalItem);
        }
        
        $queryResult->free();
        $dbReference->disconnect();
        
        return $collection;
    }
    
    private function onHand($bikeItemID)
    {
        $dbReference =& MDB2::connect(DSN, OPTIONS);
        
        if (PEAR::isError($dbReference)) {
            $errorMessage = $TEXT['rnm-error'] . "\n" . $dbReference->getMessage() . "\n" . $dbReference->getUserInfo() . "\n" . $dbReference->getDebugInfo() . "\n";
            error_log($errorMessage, 3, DB_ERROR_LOG);
            die($errorMessage);
        }
        
        $queryString = "SELECT QuantityOnHand FROM bikeItem WHERE bikeItem.pk_bikeItemID = " . $bikeItemID . ";";
        $queryResult = $dbReference->query($queryString);
        
        if (PEAR::isError($queryResult)) {
            $errorMessage = $TEXT['rnm-error'] . "\n" . $dbReference->getMessage() . "\n" . $dbReference->getUserInfo() . "\n" . $dbReference->getDebugInfo() . "\n";
            error_log($errorMessage, 3, DB_ERROR_LOG);
            die($errorMessage);
        }
        
        if ($row =& $queryResult->fetchRow(MDB2_FETCHMODE_ORDERED))
            $itemCount = $row[0];
        else
            $itemCount = 0;
        
        $queryResult->free();
        $dbReference->disconnect();
        
        return $itemCount;
    }
    
    private function decrement($bikeItemID)
    {
        $dbReference =& MDB2::connect(DSN, OPTIONS);
        
        if (PEAR::isError($dbReference)) {
            $errorMessage = $TEXT['rnm-error'] . "\n" . $dbReference->getMessage() . "\n" . $dbReference->getUserInfo() . "\n" . $dbReference->getDebugInfo() . "\n";
            error_log($errorMessage, 3, DB_ERROR_LOG);
            die($errorMessage);
        }
        
        $itemCount = rentalData::onHand($bikeItemID);
        $itemCount--;
        
        $queryString = "UPDATE bikeItem SET quantityOnHand = " . $itemCount . " WHERE bikeItem.pk_bikeItemID = " . $bikeItemID . ";";
        $queryResult = $dbReference->query($queryString);
        
        if (PEAR::isError($queryResult)) {
            $errorMessage = $TEXT['rnm-error'] . "\n" . $dbReference->getMessage() . "\n" . $dbReference->getUserInfo() . "\n" . $dbReference->getDebugInfo() . "\n";
            error_log($errorMessage, 3, DB_ERROR_LOG);
            die($errorMessage);
        }
        
        $queryResult->free();
        $dbReference->disconnect();
    }
    
    public function addbikeItem($rentalID, $bikeItemID)
    {
        $dbReference =& MDB2::connect(DSN, OPTIONS);
        
        if (PEAR::isError($dbReference)) {
            $errorMessage = $TEXT['rnm-error'] . "\n" . $dbReference->getMessage() . "\n" . $dbReference->getUserInfo() . "\n" . $dbReference->getDebugInfo() . "\n";
            error_log($errorMessage, 3, DB_ERROR_LOG);
            die($errorMessage);
        }
        
        $queryString = 'SELECT rentalItem.quantity FROM rentalItem WHERE rentalItem.fk_bikeItemID = ' . $bikeItemID . ' AND rentalItem.fk_rentalID = ' . $rentalID . ';';
        $queryResult = $dbReference->query($queryString);
        
        if (PEAR::isError($queryResult)) {
            $errorMessage = $TEXT['rnm-error'] . "\n" . $dbReference->getMessage() . "\n" . $dbReference->getUserInfo() . "\n" . $dbReference->getDebugInfo() . "\n";
            error_log($errorMessage, 3, DB_ERROR_LOG);
            die($errorMessage);
        }
        
        $quantity = 0;
        if ($queryResult->numRows() > 0) {
            $row =& $queryResult->fetchRow(MDB2_FETCHMODE_ORDERED);
            $quantity = $row[0];
        }
        if ($quantity >= 1) {
            $quantity++;
            $queryString = "UPDATE rentalItem SET quantity = " . $quantity . " WHERE rentalItem.fk_bikeItemID = " . $bikeItemID . " AND rentalItem.fk_rentalID = " . $rentalID . ";";
        } else {
            $queryString = "INSERT INTO rentalItem (fk_rentalID, fk_bikeItemID, quantity) VALUES(" . $rentalID . ", " . $bikeItemID . ", 1);";
        }
        
        $queryResult = $dbReference->query($queryString);
        
        if (PEAR::isError($queryResult)) {
            $errorMessage = $TEXT['rnm-error'] . "\n" . $dbReference->getMessage() . "\n" . $dbReference->getUserInfo() . "\n" . $dbReference->getDebugInfo() . "\n";
            error_log($errorMessage, 3, DB_ERROR_LOG);
            die($errorMessage);
        }
        
        $queryResult->free();
        $dbReference->disconnect();
        
        rentalData::decrement($bikeItemID);
    }
    
    public function clearrental($customerID)
    {
        $dbReference =& MDB2::connect(DSN, OPTIONS);
        
        if (PEAR::isError($dbReference)) {
            $errorMessage = $TEXT['rnm-error'] . "\n" . $dbReference->getMessage() . "\n" . $dbReference->getUserInfo() . "\n" . $dbReference->getDebugInfo() . "\n";
            error_log($errorMessage, 3, DB_ERROR_LOG);
            die($errorMessage);
        }
        
        $queryString = 'DELETE FROM rentalItem WHERE rentalItem.fk_rentalID = (SELECT rental.pk_rentalID FROM rental WHERE rental.fk_CustomerID = ' . $customerID . ');';
        $queryResult = $dbReference->query($queryString);
        
        if (PEAR::isError($queryResult)) {
            $errorMessage = $TEXT['rnm-error'] . "\n" . $dbReference->getMessage() . "\n" . $dbReference->getUserInfo() . "\n" . $dbReference->getDebugInfo() . "\n";
            error_log($errorMessage, 3, DB_ERROR_LOG);
            die($errorMessage);
        }
    }
    
    public function getrental($customerID)
    {
        $rentalID    = rentalData::getrentalID($customerID);
        $rentalItems = rentalData::getrentalItems($customerID);
        return new rental($rentalID, $customerID, $rentalItems);
    }
}
?>
