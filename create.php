<?php
session_start();
include('includes/db-connection.php');
$title = $_POST['taskTitle'];
$description= $_POST['taskDescription'];
$query = "INSERT INTO tasks(title, description) VALUES('$title', '$description')";
if($mysqli->query($query) == 1){
	$_SESSION['message'] = "Query Succesfull";
}
else{
	$_SESSION['message'] = "Query Failed";
}
//redirect to index 
header('location: index.php')
?>
