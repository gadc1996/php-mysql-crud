<?php
session_start();
include('includes/db-connection.php');

//Values sent from index.php
$title = $_POST['taskTitle'];
$description= $_POST['taskDescription'];
$query = "INSERT INTO tasks(title, description) VALUES('$title', '$description')";

//MySQL query
if($mysqli->query($query) == TRUE ){
	$_SESSION['message'] = "Item Created Successfully";
}
else{
	$_SESSION['message'] = "Query Failed";
}

//Close session and allow other documents to write on it
session_write_close();

//Redirect to index 
header('location: index.php');
?>
