<!--	Project:	BlueBike Objects (Customer DB)	-->
<!--	Page name:	./class/BikeSite.php	-->
<!--	Page purpose:	encapsulate management of Customer features	-->
<!--	Author:		Brandan Tyler Lasley & friends	-->
<!--	Last modified:	2/5/14 by Brandan Tyler Lasley	-->

<?PHP
require_once("./class/customer.php");
require_once("./class/Collection.php");
require_once("./class/Bike.php");
class BikeSite
{
    var $id;
    var $name;
    function BikeSite($id, $name)
    {
        if (isset($id)) {
            $this->id = $id;
        } else {
            $this->id = 1;
        }
        if (isset($name)) {
            $this->name = $name;
        } else {
            $this->name = "BlueBike Site";
        }
    }
    public function getCustomer_ID($id)
    {
        $cust = new Customer($id, null, null, null, null, null, null);
        return $cust;
    }
    function getCustomer_login($login, $password)
    {
        $cust = new Customer(null, null, null, null, null, $login, $password);
        return $cust;
    }
    public function addCustomer($email, $name, $male, $iagree, $login, $password)
    {
        $cust = new Customer(null, $email, $name, $male, $iagree, $login, $password);
        return $cust;
    }
    function getAllBikes()
    {
        return Bike::getAll();
    }
    function getAllCustomers()
    {
        return Customer::getAll();
    }
	 	//	creates an existing bike item from its id
	//
    public function getbike_ID($id){
		$bike = new bike($id, null, null, null, null, null);
		return $bike;
    }

    public function getrental_customerID($id){
		$rental = new RentalAgreement($id, null, null, null);
		return $rental;
    }
	
	public function addrentalItem($customerID, $bikeItemID) {
		$rentalID = RentalAgreement::getrentalID($customerID);
		if (is_null($rentalID)) {
			rental::addrental($customerID);
			$rental=BikeSite::getrental_customerID($customerID);
			$rentalID = $rental->id;
		}
		rental::addbikeItem($rentalID, $bikeItemID);
    }
	
    public function getAllrentals(){
		return rental::getAll();
    }
	
	public function getAllrentalItems($customerID) {
		$rental = new rental(null, $customer_ID, null);
		return $rental->rentalItems;
	}
    public function toString()
    {
        return "<p><-----BikeSite {id=" . $this->id . ",name=" . $this->name . "}-----></p>";
    }
}
?>