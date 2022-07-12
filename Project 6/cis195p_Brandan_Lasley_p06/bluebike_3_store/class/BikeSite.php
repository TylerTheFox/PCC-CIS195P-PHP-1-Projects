<!--	Project:	BlueBike Objects (Customer DB)	-->
<!--	Page name:	./class/BikeSite.php	-->
<!--	Page purpose:	encapsulate management of Customer features	-->
<!--	Author:		Brandan Tyler Lasley & friends	-->
<!--	Last modified:	2/5/14 by Brandan Tyler Lasley	-->

<?PHP
$classfolder = "class";
require_once("./$classfolder/customer.php");
require_once ("./$classfolder/Collection.php");
require_once ("./$classfolder/Bike.php");

class BikeSite
{
    
    // Variables declaration 
    private $id;
    private $name;
    private $password;
	private $password2;
	private $password3;
    private $email;
    
    //	Store constructor
    //
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
            $this->name = "BlueBike Shop";
        }
    }
    
    // Gets customer by ID
    public function getcustomerbyid($id)
    {
        $cust = new Customer($id, null, null, null, null, null, null);
        return $cust;
    }
    
    // get Customer by login
    public function getCustomerbylogin($login, $password)
    {
        $cust = new Customer(null, null, null, null, null, $login, $password);
        return $cust;
    }
	
	//	build an instance object for an existing login and password, then return it
	//
	function getCustomer_login($login, $password) {
		$cust = new Customer(null, null, null, null, null, $login, $password);
		return $cust;
	}
    
    // get Customer by contactinfo
    public function getCustomerbycontactinfo($name, $email, $password)
    {
        $cust = new Customer(null, $email, $name, null, null, null, $password);
        return $cust;
    }
    
    public function addCustomer($email, $name, $male, $iagree, $login, $password)
    {
        $cust = new Customer(null, $email, $name, $male, $iagree, $login, $password);
        return $cust;
    }
	
	function getAllBikes(){
		return Bike::getAll();
    }
    
    public function toString()
    {
        return "<p><-----BikeSite {id=" . $this->id . ",name=" . $this->name . ",password=" . $this->password . "}-----></p>";
    }
}


?>