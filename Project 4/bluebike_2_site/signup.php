<!DOCTYPE html>
<html>
<head>
	<!--	Project:	bluebike_2_store	-->
	<!--	Page name:	signup.php	-->
	<!--	Page purpose:	display a customer signup form	-->
	<!--	Based on:	XAMPP cd demo
				Copyright (C) 2002/2003 Kai Seidler	-->
	<!--	Author:		Brandan Tyler Lasley	-->
	<!--	Last modified:	02/13/2014 22:43 by Brandan Tyler Lasley	-->

	<title>bluebike </title>

	<!-- Don't cache these pages	-->
	<meta http-equiv="cache-control" content="no-cache" />
	<meta http-equiv="expires" content="Mon, 22 Jul 2002 11:12:01 GMT" />

	<!-- Don't expose this page to search engines	-->
	<meta name="robots" content="noindex, nofollow" />

	<!-- Format using style sheets	-->
	<link href="styles/default.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<div>
		<h1 id="title">bluebike Signup</h1>
	</div>

	<div id="content">
            <form name="form1" method="post" action="signupcheck.php" onsubmit='return validate(this)'>
		<input type='hidden' name='todo' value='post'>
		<table border='0' width='50%' cellspacing='0' cellpadding='0' align=left>
			
			<tr><td>&nbsp;Login</td><td >
				<input type='text' name='login'>
			</td></tr>
			<tr><td >&nbsp;Password</td><td >
				<input type='password' name='password'>
			</td></tr>
			<tr ><td >&nbsp;Re-enter Password</td><td >
				<input type='password' name='password2'>
			</td></tr>
			<tr ><td >&nbsp;Re-Re-enter Password</td><td >
				<input type='password' name='password3'>
			</td></tr>
			<tr><td>&nbsp;Email</td><td>
				<input type='text' name='email'>
			</td></tr>
			<tr><td>&nbsp;Name</td><td>
				<input type='text' name='name'>
			</td></tr>
			<tr><td>&nbsp;Gender</td><td>
				<input type='radio' value='male' checked name='sex'>Male
				<input type='radio' value='female'	name='sex'>Female
			</td></tr>
			<tr ><td >&nbsp;I agree to everything</td><td >
				<input type='checkbox' name='iagree' value='yes'>
			</td></tr>
			<tr><td align='center' colspan='2'><br />
				<input type='submit' value='Signup'><br /><br /><a href='login.php'>If you're already a member, please Login</a>
			</td></tr>
		</table>
            </form>
	</div>
</body>
</html>
