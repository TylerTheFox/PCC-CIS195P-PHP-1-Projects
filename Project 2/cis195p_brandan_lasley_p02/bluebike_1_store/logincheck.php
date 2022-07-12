<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<xml version="1.0" encoding="iso-8859-1">
	<title>Blue Bike Store - Login</title>
	<link href="styles/default.css" rel="stylesheet" type="text/css" />
</head>

	<body>
<?PHP

// Login Usernames/Passwords
$credentials = array(
    "Brandan" => "supersecret",
    "lcohen" => "password",
	"demo" => "password"
);

$username = $_POST['login_username'];
$password = $_POST['login_password'];

// Checks if $_POST is null
if ((isset($username) && (isset($password)))) {
    // Pass username/passwords into login_check function, true = login success, false = bad login info.
    if (login_check($username, $password, $credentials)) {
        // Login Successful! 
	?>
	
		<div>
			<h1> Welcome <?PHP echo ($username);?>, to The Blue Bike Store! </h1>
			<p> There is nothing here, click <a href='login.php'>here</a> to go back to the login page :) </p>
		</div>

	<?PHP
    } else {
        // Username/password is wrong.
        error(2);
    }
} else {
    // Username/Password is not set or left blank (loaded the page w/o POST-ing)
    error(1);
}

// Forward back to login.php and display a preprogrammed error message
function error($number)
{
    header("Location: ./login.php?error=$number");
}

// login function 
function login_check($username, $password, $credentials)
{
    foreach ($credentials as $usr => $psw) {
        if ((strtolower($username) == strtolower($usr)) && ($password == $psw)) {
            return true;
        }
    }
    return false;
}

?>
	</body>
</html>