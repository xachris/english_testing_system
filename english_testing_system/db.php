<!-- Connect to the database -->

<?php
	$host = 'silva.computing.dundee.ac.uk';
	$user = 'het';
	$pass = '5754.het.4575';
	$db = 'hetdb';
	$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
	// echo "Database connected successfully ...";	
?>