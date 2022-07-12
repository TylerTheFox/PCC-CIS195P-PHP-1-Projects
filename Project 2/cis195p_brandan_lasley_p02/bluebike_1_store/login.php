<!--
	Name: Brandan Lasley
	Date: 1/14/204 04:15
	Project: Blue Bike Store Login/Login Checker
	Notes:
	* There is no known issues/limitations. 
	* I built this to be unique and completely different from that one script I'm not allowed to talk about, the only difference I see would be the stripe on the top of the page.
	I like that stripe so I kept it. 
	* Somethings are off centred, that's because I learned CSS in high school and have a spotty memory. 
	and was never good at it.
	
	I hope this is the quality that you're expecting, or not leave me a note and ill try to correct it for the future. 
	
-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<xml version="1.0" encoding="iso-8859-1">
		<title>Blue Bike Store</title>
		<link href="styles/default.css" rel="stylesheet" type="text/css" />
	</head>

	<body>

		<div>
			<h1> Welcome to The Blue Bike Store! </h1>
		</div>

		<div id="login">
			<form action="logincheck.php" method="post">
				<table>
					<tbody>
						<tr>
							<td><h2> Login: </h2></td>
						</tr>
						<tr>
							<td><p>Username: </p></td>
							<td><input name="login_username" type="text" /><td>
						</tr>
						<tr>
							<td><p>Password </p></td>
							<td><input name="login_password" type="password" /></td>
	<?PHP
// Check for error var
if (isset($_GET['error'])) {
	// Open the row.
	echo ("<tr>");
	// Decode the error code
	switch ($_GET['error']) {
		case 1:
			echo ('<td><p id=\'logintext\' style="color: red">Invalid Username/password</p></td>');
			break;
		case 2:
			echo ('<td><p id=\'logintext\' style="color: red">Username/password is wrong</p></td>');
			break;
		Default:
			echo ('<td><p id=\'logintext\' style="color: red">Unknown Error</p></td>');
	}
	// close the row
	echo ("</tr>");
}
	?>
						</tr>
							<tr>
							<td><input id='submit' value="Login" type="submit" /></td>
						</tr>
						<tr>
							<td><p id='logintext' style="color:white"> Example Login demo/password </p> </td>
						</tr>
					</tbody>
				</table>
			</form>
		<div>
	</body>
</html>