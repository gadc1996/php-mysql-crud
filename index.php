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
if(isset($_SESSION['message'])){
	print_r($_SESSION['message']);
}
else{
	echo 'No Session Message';
}
session_write_close();
?>
<?php include ('includes/footer.php');?>

