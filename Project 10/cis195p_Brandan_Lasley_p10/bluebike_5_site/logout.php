<?php
	include_once("adodb/session/adodb-cryptsession2.php");
	ADOdb_Session::config('mysql', 'localhost', 'root', '', 'bikesite', false);
	ADOdb_session::Persist($connectMode=false);
	session_start();
	session_destroy();
	print "<script>self.location='index.php';</script>";
?>
