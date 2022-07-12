<?php
	// ---------------------------------------------------------------------
	// BlueBike  Language file
	// ---------------------------------------------------------------------
	$TEXT['rnm-head'] = "<<< BlueBike  Catalogue >>>";
	$TEXT['rnm-col-1'] = "Make";
	$TEXT['rnm-col-2'] = "Model";
	$TEXT['rnm-col-3'] = "Year";
	$TEXT['rnm-col-4'] = "Size";
	$TEXT['rnm-col-5'] = "Type";
	$TEXT['rnm-col-6'] = "Rate";

	$TEXT['rnm-ok?'] = "Really OK to delete?";
	$TEXT['rnm-head-1'] = "Add Bike";
	$TEXT['rnm-button-1'] = "DELETE" ;
	$TEXT['rnm-button-2'] = "ADD Bike";
	$TEXT['rnm-button-3'] = "BIKES";
	$TEXT['rnm-button-4'] = "submit";
	$TEXT['rnm-button-5'] = "Retry";
	$TEXT['rnm-button-6'] = "Signup";
	
	$TEXT['rnm-radio-0'] = "Male";
	$TEXT['rnm-radio-1'] = "Female";
		
	// I'm not going to convert these to other languages, has headache.
	$TEXT['rnm-reg-0'] = "The following errors were found:";
	$TEXT['rnm-reg-1'] = "Login must be at least 4 char";
	$TEXT['rnm-reg-2'] = "Email must be valid";
	$TEXT['rnm-reg-3'] = "Name must be at least 3 char";
	$TEXT['rnm-reg-4'] = "You must agree to everything";
	$TEXT['rnm-reg-5'] = "Login already exists. Please try another one";
	$TEXT['rnm-reg-6'] = "Password must be at least 4 char";
	$TEXT['rnm-reg-7'] = "Passwords don't match";
	
	$TEXT['rnm-reg-txt-0'] = "Login ID";
	$TEXT['rnm-reg-txt-1'] = "Password";
	$TEXT['rnm-reg-txt-2'] = "Re-enter Password";
	$TEXT['rnm-reg-txt-3'] = "Re-re-enter password";
	$TEXT['rnm-reg-txt-4'] = "Email";
	$TEXT['rnm-reg-txt-5'] = "Name";
	$TEXT['rnm-reg-txt-6'] = "Gender";
	$TEXT['rnm-reg-txt-7'] = "I agree to everything";
	$TEXT['rnm-reg-txt-8'] = "Signup";
	$TEXT['rnm-reg-txt-9'] = "If you're already a member, please Login";
	
	$TEXT['rnm-index-0'] = "You must login or signup before you can begin shopping.";
	$TEXT['rnm-index-1'] = "Login";
	$TEXT['rnm-index-2'] = "Hello, ";
	$TEXT['rnm-index-3'] = " New Member Signup";
	
	$TEXT['rnm-login-0'] = "Login Verification";
	$TEXT['rnm-login-1'] = "You successfully logged in, but there is nowhere to go yet!";
	$TEXT['rnm-login-2'] = '<div class="message">You successfully logged in, but there is nowhere to go yet!<br /><br />Either <a href="logout.php">Log Out</a> or <a href="index.php?cid=1&pwd=supersecret">Continue Shopping anyway...</a>.';
	$TEXT['rnm-login-3'] = 'Incorrect Login. Please <a href="login.php">Retry</a>.';
	$TEXT['rnm-login-4'] = 'Incorrect Login. Please <a href="login.php">Retry</a> or<br /><a href="index.php">Restart</a>.';
	
	// Ugh... this will have to do. 
	$TEXT['rnm-reg-complete-0'] = "<tr><td>Welcome! You have successfully faked signing up as a new customer.<br /><br />You have not actually been added to the store's customers in this version - so you can only log in as 'lcohen'.<br /><br /><a href = login.php>Click here to login</a><br /></td></tr></table>";
	
	$TEXT['rnm-as-pdf'] = "BlueBike  catalogue as
			<a href='$_SERVER[PHP_SELF]?action=getpdf'>
			PDF document</a>.";
?>
