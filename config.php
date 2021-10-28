<?php
/*
// mysql_connect("database-host", "username", "password")
$conn = mysql_connect("localhost","root","root") 
			or die("cannot connected");
// mysql_select_db("database-name", "connection-link-identifier")
@mysql_select_db("test",$conn);
*/

/**
 * mysql_connect is deprecated
 * using mysqli_connect instead
 */

$databaseHost = 'localhost';
$databaseName = 'php-ml-bayes';
$databaseUsername = 'root';
$databasePassword = '';

$conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

// Check connection
if ($conn === false) {
	die("ERROR: Could not connect. " . mysqli_connect_error());
}
