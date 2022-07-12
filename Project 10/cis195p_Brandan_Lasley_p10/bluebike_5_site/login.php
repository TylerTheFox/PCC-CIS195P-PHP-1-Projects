<?PHP
require_once("langsettings.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\"?" . ">";
?>
	<title>bluebike </title>

	<!--	Project:	bluebike_1_store	-->
	<!--	Page name:	login.php	-->
	<!--	Page purpose:	display a simple login form.	-->
	<!--	Author:		Brandan Tyler Lasley	-->
	<!--	Last modified:	02/13/2014 22:43 by Brandan Tyler Lasley	-->

	<!--	Format using style sheets -->
	<link href="styles/default.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<div><h1 id="title">bluebike </h1></div>
	<div id="content">
		<form action="logincheck.php" method="post">
			<table class="leftBox">
				<tbody>
					<tr>
						<td> <?PHP
echo ($TEXT['rnm-reg-txt-0']);
?> </td>
						<td><input class="data" name="loginid" value="Brandan" type="text" /></td>
					</tr>
					<tr>
						<td> <?PHP
echo ($TEXT['rnm-reg-txt-1']);
?> </td>
						<td><input class="data" name="password" value="supersecret" type="password" /></td>
					</tr>
					<tr>
						<td colspan="2" class="login"> <input value="<?PHP
echo ($TEXT['rnm-button-4']);
?>" class="login" type="submit" /> </td>
					</tr>
				</tbody>
			</table>
		</form>
	</div>
</body>
</html>
