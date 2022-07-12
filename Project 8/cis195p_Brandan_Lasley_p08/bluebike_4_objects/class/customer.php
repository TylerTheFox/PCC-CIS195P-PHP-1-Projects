<!--	Project:	BlueBike Objects (Customer DB)	-->
<!--	Page name:	./class/customer.php	-->
<!--	Page purpose:	encapsulate management of Customer features	-->
<!--	Author:		Brandan Tyler Lasley & friends	-->
<!--	Last modified:	2/5/14 by Brandan Tyler Lasley	-->
<?php
require_once "CustomerData.php";

class Customer
{
    private $id;
    private $email;
    private $name;
    private $male;
    private $iagree;
    private $login;
    private $pass;
    
    /*
    create an instance of Customer.  Approach to creating depends upon parameters to this constructor:
    1	($id,  null,   null,  null,  null,    null,   null ) - get existing via $id (only field value used)
    2	(null, null,   null,  null,  null,    $login, $pass) - get existing via $login and $pass
    3	(null, $email, $name, $male, $iagree, $login, $pass) - insert new
    4	($id,  $email, $name, $male, $iagree, $login, $pass) - create from input data
    */
    function Customer($id, $email, $name, $male, $iagree, $login, $pass)
    {
        if (isset($id) and !(isset($email) or isset($name) or isset($male) or isset($iagree) or isset($login) or isset($pass))) {
            $customer     = CustomerData::getId($id);
            $this->id     = $customer->id;
            $this->email  = $customer->email;
            $this->name   = $customer->name;
            $this->male   = $customer->male;
            $this->iagree = $customer->iagree;
            $this->login  = $customer->login;
            $this->pass   = $customer->pass;
        } elseif (isset($login) and isset($pass) and !(isset($id) or isset($email) or isset($name) or isset($male) or isset($iagree))) {
            $customer     = CustomerData::getLogin($login, $pass);
            $this->id     = $customer->id;
            $this->email  = $customer->email;
            $this->name   = $customer->name;
            $this->male   = $customer->male;
            $this->iagree = $customer->iagree;
            $this->login  = $customer->login;
            $this->pass   = $customer->pass;
        } elseif ((!isset($id)) and isset($email) and isset($name) and isset($male) and isset($iagree) and isset($login) and isset($pass)) {
            $customer     = CustomerData::insert($email, $name, $male, $iagree, $login, $pass);
            $this->id     = $customer->id;
            $this->email  = $customer->email;
            $this->name   = $customer->name;
            $this->male   = $customer->male;
            $this->iagree = $customer->iagree;
            $this->login  = $customer->login;
            $this->pass   = $customer->pass;
        } elseif (isset($id) and isset($email) and isset($name) and isset($male) and isset($iagree) and isset($login) and isset($pass)) {
            $this->id     = $id;
            $this->email  = $email;
            $this->name   = $name;
            $this->male   = $male;
            $this->iagree = $iagree;
            $this->login  = $login;
            $this->pass   = $pass;
        } else {
            $this->id     = null;
            $this->email  = null;
            $this->name   = null;
            $this->male   = null;
            $this->iagree = null;
            $this->login  = null;
            $this->pass   = null;
            echo '<P>===>Error detected: an attempt to create a customer with an unacceptable mix of arguments' . '<br />===>new Customer($id=' . $id . ', $email=' . $email . ', $name=' . $name . ', $male=' . $mail . ', $iagree=' . $iagree . ', $login=' . $login . ', $pass=' . $pass . '<br />';
            echo '</P>';
            die();
        }
    }
	
    public function ID()
    {
        return $this->id;
    }
    
    public function Password()
    {
        return $this->pass;
    }
    
    public function Name()
    {
        return $this->name;
    }
    
    public function getAll()
    {
        return CustomerData::getAll();
    }
    
    public function toString()
    {
        return "<p><-----Customer {id=" . $this->id . ", name=" . $this->name . ", email=" . $this->email . ", male=" . $this->male . ", iagree=" . $this->iagree . ", login=" . $this->login . ", pass=" . $this->pass . "}-----></p>";
    }
}
?>