<?php
require_once("./class/bike.php");
require_once("./class/bikeData.php");
require_once("./class/BikeSite.php");

class RentalItem
{
    private $id;
    private $rental_agreement_id;
    private $bike_id;
    private $rate;
	private $return_date;
    
    function __construct($id, $rental_agreement_id, $bike_id, $rate, $return_date)
    {
        $this->id      = $id;
        $this->rental_agreement_id  = $rental_agreement_id;
        $this->bike_id = $bike_id;
        $this->rate     = $rate;
		$this->return_date     = $return_date;
    }
    
    public function getID()
    {
        return $this->id;
    }
    
    public function getRental_agreement_id()
    {
        return $this->rental_agreement_id;
    }
    
    public function getBikeID()
    {
        return $this->bike_id;
    }
    
    public function getRate()
    {
        return $this->rate;
    }
    
    public function getReturn_date()
    {
        return $this->return_date;
    }
	
    public function toString()
    {
        $bike = BikeSite::getbike_ID($this->bikeID);
        return "<p><-----------rentalItem ID=" . $this->id . ", rentalID=" . $this->rentalID . ", bikeID=" . $this->bikeID . ", bike title=" . $bike->getTitle() . ", bike year=" . $bike->getYear() . ", qty in rental=" . $this->qty . "-----></p>";
    }
}
?>
