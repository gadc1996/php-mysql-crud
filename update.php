<?php
session_start();
include ('includes/db-connection.php');
include ('includes/header.php');
include ('includes/navigation.php');

//Values sent from index.php or page refresh
$id = $_GET['id'];
$query = "SELECT title, description FROM tasks WHERE id=$id";

//If $_POST is not empty update values on database
if(!empty($_POST)){
	$newTitle = $_POST['taskTitle'];
	$newDescription = $_POST['taskDescription'];
	$mysqli->query("UPDATE tasks SET title='$newTitle', description='$newDescription' WHERE id='$id'");
	$_SESSION['message'] = "Updated Succesfully";
	$_SESSION['type'] = "edit";
	//Redirect to clear values on $_POST
	header("location: update.php?id=$id");
	//Prevents the rest of the code to be executed
	exit;
}

//Fetch Mysql query to a variable..
$result = $mysqli->query($query);
//..convert it to an associative array...
$result = $result->fetch_assoc();
//.. Save values...
$title = $result['title'];
$description = $result['description'];
//... and display it on a form
?>

<section class="update">
	<form action="update.php?id=<?= $id; ?>" method="post" class="main-form">
	<?php
		//Check if a message from a query exist
		if(isset($_SESSION['message'])){
			//Prints the variable and deletes it so no message is shown on reload
	?>
			<p class="session-message-<?php print_r($_SESSION['type']); ?>"><?php print_r($_SESSION['message']); ?></p>
			<?php
			session_unset();
		}
		//Close session and allow other documents to write on it
		session_write_close();
		?>
		<div class="form-control">
			<label for="taskTitle" class="taskDescription">Task Title</label>
			<input type="text" id="taskTitle" class="taskInput" name="taskTitle" placeholder="<?= $title;?>">
		</div>
		<div class="form-control">
			<label for="taskDescription" class="taskDescription">Task Description</label>
			<input type="text" id="taskDescription"class="taskInput" name="taskDescription"  placeholder="<?= $description; ?>">
		</div>
		<button type="submit" class='button submit'>Add Task</button>
</form>
	<a href="index.php"><button class="button back">Back</button></a>

</section>
<?php
//Close session and allow other documents to write on it
session_write_close();
?>
