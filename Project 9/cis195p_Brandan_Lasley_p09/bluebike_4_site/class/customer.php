<!--	Project:	rednote_4_objects	-->
<!--	Page name:	Customer.php	-->
<!--	Page purpose:	encapsulate management of Customer features	-->
<!--	Author:		Dave Blizzard and friends	-->
<!--	Last modified:	09/20/10 by Taylor Hanna	-->

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
    public function Customer($id, $email, $name, $male, $iagree, $login, $pass)
    {
        if (isset($id) and !(isset($email) or isset($name) or isset($male) or isset($iagree) or isset($login) or isset($pass))) {
            $customer = CustomerData::getId($id);
            if (isset($customer)) {
                $this->id     = $customer->id;
                $this->email  = $customer->email;
                $this->name   = $customer->name;
                $this->male   = $customer->male;
                $this->iagree = $customer->iagree;
                $this->login  = $customer->login;
                $this->pass   = $customer->pass;
            }
        } elseif (isset($login) and isset($pass) and !(isset($id) or isset($email) or isset($name) or isset($male) or isset($iagree))) {
            $customer = CustomerData::getLogin($login, $pass);
            if (isset($customer)) {
                $this->id     = $customer->id;
                $this->email  = $customer->email;
                $this->name   = $customer->name;
                $this->male   = $customer->male;
                $this->iagree = $customer->iagree;
                $this->login  = $customer->login;
                $this->pass   = $customer->pass;
            }
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