<?php
require_once('./class/rentalData.php');
require_once('./class/Collection.php');
require_once('DB_ACCESS.ini');
require_once('MDB2.php');
require_once('ERROR.ini');

class RentalAgreement
{
    private $id;
    private $start_date;
    private $customer_id;
    private $rental_Items;
	 
	 function __construct($id, $start_date, $customer_id, $rental_Items)
    {
        $this->id = $id;
		$this->start_date = $start_date;
        $this->customer_id = $customer_id;
        $this->rental_Items = $rental_Items;
    }
	
    static private function onHand($bikeItemID)
    {
        return rentalData::onHand($bikeItemID);
    }
    
    static private function decrement($bikeItemID)
    {
        return rentalData::decrement($bikeItemID);
    }
    
    static public function clearrental()
    {
        return rentalData::clearrental($customer_id);
    }
    
    public function rental($id, $customer_id, $rental_Items)
    {
        if (is_null($id)) {
            if (is_null($rental_Items)) {
                $this->customer_id = $customer_id;
                $this->id          = rentalData::getrentalID($customer_id);
                $this->rental_Items   = rentalData::getrentalItems($this->id);
            } else {
                $rental              = rentalData::addrental($customer_id);
                $this->id          = $rental->id;
                $this->customer_id = $rental->customer_id;
                $this->rental_Items   = $rental->rental_Items;
            }
        } else if (!is_null($customer_id) and !is_null($rental_Items)) {
            $this->id          = $id;
            $this->customer_id = $customer_id;
            $this->rental_Items   = $rental_Items;
        } else {
            die("Unimplemented rental construction alternative");
        }
    }
    
    public function getAll()
    {
        return rentalData::getAll();
    }
    
    public function getrentalID($customerID)
    {
        return rentalData::getrentalID($customerID);
    }
    
    public function addbikeItem($rentalID, $bikeItemID)
    {
        rentalData::addbikeItem($rentalID, $bikeItemID);
    }
    
    public function toString()
    {
        $cust            = BikeSite::getCustomer_ID($this->customer_id);
        $returnString    = "<p><-----rental ID=" . $this->id . ", customer_id=" . $this->customer_id . ", customer_name=" . $cust->Name() . ", rental Items:</p>";
        $this->rental_Items = rentalData::getrentalItems($this->id);
        $this->rental_Items->first();
        while ($this->rental_Items->hasNext()) {
            $ci = $this->rental_Items->next();
            $returnString .= $ci->toString();
        }
        return ("<p>" . $returnString . "<-----End of rental ID=" . $this->id . "-----></p>");
    }
}
?>
