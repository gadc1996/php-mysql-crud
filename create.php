<?php
session_start();
include('includes/db-connection.php');

//Values sent from index.php
$title = $_POST['taskTitle'];
$description= $_POST['taskDescription'];
$query = "INSERT INTO tasks(title, description) VALUES('$title', '$description')";

//MySQL query
if($mysqli->query($query) == TRUE ){
	$_SESSION['message'] = "Query Succesfull";
}
else{
	$_SESSION['message'] = "Query Failed";
}

//redirect to index 
header('location: index.php');
?>
