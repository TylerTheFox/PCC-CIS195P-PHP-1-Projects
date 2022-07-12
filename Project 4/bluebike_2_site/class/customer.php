<!--	Project:	BlueBike Objects (Customer DB)	-->
<!--	Page name:	./class/customer.php	-->
<!--	Page purpose:	encapsulate management of Customer features	-->
<!--	Author:		Brandan Tyler Lasley & friends	-->
<!--	Last modified:	2/5/14 by Brandan Tyler Lasley	-->
<?php
class Customer  {
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
	function Customer($id, $email, $name, $male, $iagree, $login, $pass) {
		//	1 customer created from database
		//	1 ($id,  null,   null,  null,  null,    null,   null ) - get existing via $id (only field value used) + special dummy customer creation for testing
		//
		if (isset($id) and ! (isset($email) or isset($name) or isset($male) or isset($iagree) or isset($login) or isset($pass))) {
			if ($id == 1) {
				$this->id = 1;
				$this->email = 'admin@brandanlasley.com';
				$this->name = 'Brandan Lasley';
				$this->male = true;
				$this->iagree = true;
				$this->login = 'Brandan2';
				$this->pass = sha1('supersecret');

/*	for testing only; turn into a // comment to eliminate	*/ //echo "#1.1 ";

			}
			else {
				$this->id = $id;
				$this->email = null;
				$this->name = null;
				$this->male = null;
				$this->iagree = null;
				$this->login = null;
				$this->pass = null;

/*	for testing only; turn into a // comment to eliminate	*/ //echo "#1.2 ";

			}
			return;
		}

		//	2 customer created from database via $login and $pass
		//	2 (null, null,   null,  null,  null,    $login, $pass) - get existing via $login and $pass + special dummy customer creation for testing
		//
		if (isset($login) and isset($pass) and ! (isset($id) or isset($email) or isset($name) or isset($male) or isset($iagree))) {
			if ($login == 'Brandan' && $pass == 'supersecret') {
					$this->id = 1;
					$this->email = 'admin@brandanlasley.com';
					$this->name = 'Brandan Tyler Lasley';
					$this->male = true;
					$this->iagree = true;
					$this->login = 'Brandan';
					$this->pass = $pass;
				}
			else {
					$this->id = null;
					$this->email = null;
					$this->name = null;
					$this->male = null;
					$this->iagree = null;
					$this->login = $login;
					$this->pass = $pass;
			}
			return;
		}

		if (isset($email) and isset($name) and isset($pass) and ! (isset($id) or isset($login) or isset($male) or isset($iagree))) {
			if ($name == 'Brandan Lasley' && $email == "admin@brandanlasley.com" && $pass == sha1("supersecret")) {
					$this->id = 1;
					$this->email = 'lcohen@password.com';
					$this->name = 'Leonard Cohen';
					$this->male = true;
					$this->iagree = true;
					$this->login = 'Brandan';
					$this->pass = $pass;
				} else {
					$this->id = null;
					$this->email = null;
					$this->name = null;
					$this->male = null;
					$this->iagree = null;
					$this->login = $login;
					$this->pass = $pass;
			}
			return;
		}
		
		/*if (isset($login) and isset($password) and isset($pass) and ! (isset($id) or isset($email) or isset($male) or isset($iagree))) {
			if ($login == 'Brandan' && $password == "supersecret") {
					$this->id = 1;
					$this->email = 'lcohen@password.com';
					$this->name = 'Leonard Cohen';
					$this->male = true;
					$this->iagree = true;
					$this->login = 'Brandan';
					$this->pass = $pass;
				} else {
					$this->id = null;
					$this->email = null;
					$this->name = null;
					$this->male = null;
					$this->iagree = null;
					$this->login = $login;
					$this->pass = $pass;
			}
			return;
		}*/
		
		//	3 new customer created to be inserted into dataase
		//	3 (null, $email, $name, $male, $iagree, $login, $pass) - insert new
		//
		if ((! isset($id))
				and isset($email) and isset($name) and isset($male)
				and isset($iagree) and isset($login) and isset($pass)) {
			$this->id = null;
			$this->email = $email;
			$this->name = $name;
			$this->male = $male;
			$this->iagree = $iagree;
			$this->login = $login;
			$this->pass = $pass;

/*	for testing only; turn into a // comment to eliminate	*/ //echo "#3 ";

			return;
		}

		//	4 customer created from parameters
		//	4 ($id, $email, $name, $male, $iagree, $login, $pass) - create it from input data
		//
		if (isset($id) and isset($email) and isset($name) and isset($male)
				and isset($iagree) and isset($login) and isset($pass)) {
			$this->id = $id;
			$this->email = $email;
			$this->name = $name;
			$this->male = $male;
			$this->iagree = $iagree;
			$this->login = $login;
			$this->pass = $pass;

/*	for testing only; turn into a // comment to eliminate	*/ //echo "#4 ";

		return;
		}

		//	Oops! If the parameter arguments are anything else,
		//		the Client has made a mistake we'll report
		//
		$this->id = null;
		$this->email = null;
		$this->name = null;
		$this->male = null;
		$this->iagree = null;
		$this->login = null;
		$this->pass = null;
		die('<P>===>Error' . ' in File: ' . __FILE__
				. ' on line: ' . __LINE__
				. '<br />===>detected: an attempt to create a customer with an unacceptable mix of arguments'
				. '<br />===>new Customer($id=' . $id
						. ', $email=' . $email . ', $name=' . $name
						. ', $male=' . $male . ', $iagree=' . $iagree
						. ', $login=' . $login . ', $pass=' . $pass
				. '</P>');
	}

	public function ID() {
		return $this->id;
	}

	public function Password() {
		return $this->pass;
	}

	public function Name() {
		return $this->name;
	}
	
//	creates a string representation of Customer for testing purposes only
//
	public function toString() {
		return "<p><-----Customer {id=" . $this->id
				. ", name=" . $this->name
				. ", email=" . $this->email
				. ", male=" . $this->male
				. ", iagree=" . $this->iagree
				. ", login=" . $this->login
				. ", pass=" . $this->pass
				. "}-----></p>";
	}
}
?>