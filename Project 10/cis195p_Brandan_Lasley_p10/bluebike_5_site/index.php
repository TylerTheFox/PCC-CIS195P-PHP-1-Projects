<?php
require_once("langsettings.php");
include_once("adodb/session/adodb-cryptsession2.php");
ADOdb_Session::config('mysql', 'localhost', 'root', '', 'bikesite', false);
ADOdb_session::Persist($connectMode = false);
session_start();
echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\"?" . ">";
require_once("./class/BikeSite.php");
require_once("./class/customer.php");
require_once("./class/Collection.php");
require_once("./class/Bike.php");

$BikeCollection = new Collection();
?>
<!DOCTYPE html>
<html>
<head>
	<!--	Project:	bluebike_2_store	-->
	<!--	Page name:	index.php	-->
	<!--	Page purpose:	display bike, permit login, permit signup	-->
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
<h1 id="title">bluebike </h1>
</div>
<div id="navigation">
<?php

$isLoggedIn = false;

$s = new BikeSite(1, "bluebike");

$customer = unserialize(@$_SESSION['cust']);

if (!is_bool($customer) and !is_null($customer)) {
    $isLoggedIn = true;
    echo "<h5>Hello, " . $customer->Name() . " </h5>";
    echo "<h5><a href='logout.php'>Logout</a></h5>";
} else {
    echo "<h5>You must login or signup before you can begin shopping.</h5>";
    echo '<h5><a href="login.php">Login</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="signup.php">New Member Signup</a><h5>';
}

?>
</div>
<div id="content">
<table class="BikeCollection">
<?php
$BikeCollection = $s->getAllBikes();

if ((!(is_null($BikeCollection))) && (!(isset($_REQUEST['action'])))) {
    echo '<tr>';
    echo '<th class="BikeItemHeader" colspan="6">';
    echo $TEXT['rnm-head'];
    echo '</th></tr>';
    echo '<tr>';
    echo '<th class="BikeItemHeader">';
    echo $TEXT['rnm-col-1'];
    echo '</th>';
    echo '<th class="BikeItemHeader">';
    echo $TEXT['rnm-col-2'];
    echo '</th>';
    echo '<th class="BikeItemHeader">';
    echo $TEXT['rnm-col-3'];
    echo '</th>';
    echo '<th class="BikeItemHeader">';
    echo $TEXT['rnm-col-4'];
    echo '</th>';
    echo '<th class="BikeItemHeader">';
    echo $TEXT['rnm-col-5'];
    echo '</th>';
    echo '<th class="BikeItemHeader">';
    echo $TEXT['rnm-col-6'];
    echo '</th>';
    echo '</tr>';
    
    $BikeCollection->first();
    while ($BikeCollection->hasNext()) {
        $currentBikeItem = $BikeCollection->next();
        echo '<tr>';
        echo '<td class="BikeItem">';
        echo $currentBikeItem->getMake();
        echo '</td>';
        echo '<td class="BikeItem">';
        echo $currentBikeItem->getModel();
        echo '</td>';
        echo '<td class="BikeItem">';
        echo $currentBikeItem->getYear();
        echo '</td>';
        echo '<td class="BikeItem">';
        echo $currentBikeItem->getSize();
        echo '</td>';
        echo '<td class="BikeItem">';
        echo $currentBikeItem->getType();
        echo '</td>';
        echo '<td class="BikeItem">';
        echo $currentBikeItem->getRate();
        echo '</td>';
        echo '</tr>';
    }
}
?>
</table>
</div>
<?php
if (!$isLoggedIn)
    echo <<<eod
<div style="position:fixed; bottom:1em; font-weight:bold">
	<a target="_parent" href="lang.php?en">English</a>
	/ <a  target="_parent" href="lang.php?cs">Czech</a>
	/ <a  target="_parent" href="lang.php?km">Cambodian</a>
	/ <a  target="_parent" href="lang.php?de">Deutsch</a>
	/ <a  target="_parent" href="lang.php?es">Espa&ntilde;ol</a>
	/ <a  target="_parent" href="lang.php?zh">&#20013;&#25991;</a>
	/ <a  target="_parent" href="lang.php?fr">Francais</a>
	/ <a  target="_parent" href="lang.php?it">Italiano</a>
	/ <a  target="_parent" href="lang.php?jp">&#26085;&#26412;&#35486;</a>
<!--	/ <a  target="_parent" href="lang.php?nl">Nederlands</a>
	/ <a  target="_parent" href="lang.php?no">Norsk</a>-->
	/ <a  target="_parent" href="lang.php?pl">Polski</a>
	/ <a  target="_parent" href="lang.php?pt">Portugu&ecirc;s</a>
	/ <a  target="_parent" href="lang.php?pt_br">Portugu&ecirc;s (Brasil)</a>
	/ <a  target="_parent" href="lang.php?sl">Slovene</a>
</div>
eod;
?>
</body>
</html>
