<?php
//Set variables when deploying on a new server
$servername = 'localhost';
$username = 'root';
$password = '1406';
$dbname = 'simple_crud';

$mysqli = new mysqli($servername, $username, $password, $dbname);
//Returns the error code and string if connction fails
if ($mysqli->connect_errno){
	echo "Failed to connect to Mysql:(".$mysqli->connect_errno.")". $mysqli->connect_error;
}
?>
