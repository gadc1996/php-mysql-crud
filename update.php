<?php
session_start();
include('includes/db-connection.php');

//Values sent from index.php or page refresh
$id = $_GET['id'];
$query = "SELECT title, description FROM tasks WHERE id=$id";

//If $_POST is not empty update values on database
if(!empty($_POST)){
	$newTitle = $_POST['taskTitle'];
	$newDescription = $_POST['taskDescription'];
	$mysqli->query("UPDATE tasks SET title='$newTitle', description='$newDescription' WHERE id='$id'");
	$_SESSION['message'] = "Updated Succesfully";
	//Redirect to clear values on $_POST
	header("location: update.php?id=$id");
	//Prevents the rest of the code to be executed
	exit;
}

//Checks if update query succeded
if(isset($_SESSION['message'])){
	//Prints the variable and deletes it so no message is shown on reload
	print_r($_SESSION['message']);
	session_unset();
}
else{
	echo 'No Session Message';
}

//Fetch Mysql query to a variable..
$result = $mysqli->query($query);
//..convert it to an associative array...
$result = $result->fetch_assoc();
//... and display it on a form
?>
<form action="update.php?id=<?= $id; ?>" method="post">
	<div class="form-control">
		<label for="taskTitle">Task Title</label>
		<input type="text" id="taskTitle" name="taskTitle" placeholder="Task Title" value="<?= $result['title']; ?>">
	</div>
	<div class="form-control">
		<label for="taskDescription">Task Description</label>
		<input type="text" id="taskDescription" name="taskDescription"  placeholder="Task Title" value="<?= $result['description']; ?>">
	</div>
	<button type="submit">Submit</button>
</form>
	<a href="index.php"><button>Back</button></a>
<?php
//Close session and allow other documents to write on it
session_write_close();
?>
