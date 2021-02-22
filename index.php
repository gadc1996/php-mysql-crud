<?php 
session_start();
include ('includes/db-connection.php');
include ('includes/header.php');
include ('includes/navigation.php');
?>

<form action="create.php" method="post">
	<div class="form-control">
		<label for="taskTitle">Task Title</label>
		<input type="text" id="taskTitle" name="taskTitle" placeholder="Task Title">
	</div>
	<div class="form-control">
		<label for="taskDescription">Task Description</label>
		<input type="text" id="taskDescription" name="taskDescription"  placeholder="Task Title">
	</div>
	<button type="submit">Submit</button>
</form>

<?php
//Check if a message from a query exist
if(isset($_SESSION['message'])){
	//Prints the variable and deletes it so no message is shown on reload
	print_r($_SESSION['message']);
	session_unset();
}
else{
	echo 'No Session Message';
}
session_write_close();
$query = 'SELECT * FROM tasks';
$result = $mysqli->query($query); 
?>

<table>
	<tr>
		<th>ID</th>
		<th>Title</th>
		<th>Description</th>
		<th>Actions</th>
	</tr>
<?php 	
	//Print a table row for every entry on DB
	while($row = $result->fetch_assoc()){ 
?>
		<tr>
			<td><?= $row['id']; ?></td>
			<td><?= $row['title']; ?></td>
			<td><?= $row['description']; ?></td>
			<td><a href="delete.php?id=<?= $row['id']; ?>">Delete</a><a href="update.php?id=<?= $row['id']; ?>">Update</a></td>
		</tr>
<?php } ?>
</table>

<?php include ('includes/footer.php');?>

