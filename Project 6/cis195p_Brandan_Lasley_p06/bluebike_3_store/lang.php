<?php
	$fp = fopen( "lang.tmp", "w" );
	fwrite( $fp, basename( $_SERVER['QUERY_STRING'] ) );
	fclose( $fp );

	if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS']))
		$uri = 'https://';
	else
		$uri = 'http://';
		
	// Seems logical. No perfect... but alight for this type of project.
	// If you're running it on a custom XAMPP in a different folder than htdocs or an alias
	// This solution WILL NOT work. 
	
	$filepath = realpath(dirname(__FILE__));
	$filepath = explode("htdocs", $filepath);
	
	$uri .= $_SERVER['HTTP_HOST'];
	header( 'Location: ' . $uri
			. $filepath[1] . '/index.php' );
	exit;
?>
