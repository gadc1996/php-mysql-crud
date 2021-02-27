<?php
session_start();
include('includes/db-connection.php');

//Values sent from index.php
$id = $_GET['id'];
$query = "DELETE FROM tasks WHERE id=$id";

//MySQL query
if($mysqli->query($query) == TRUE ){
	$_SESSION['message'] = "Item Deleted Succesfully";
	$_SESSION['type'] = "delete";
}
else{
	$_SESSION['message'] = "Query Failed";
	printf("ERROR:".$mysqli->error);
}

//Close session and allow other documents to write on it
session_write_close();

//redirect to index 
header('location: index.php');
?>
