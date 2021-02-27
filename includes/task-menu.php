<section class="main">
	<form action="create.php" method="post" class="main-form">
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
			<input type="text" id="taskTitle" class="taskInput" name="taskTitle" placeholder="Task Title">
		</div>
		<div class="form-control">
			<label for="taskDescription" class="taskDescription">Task Description</label>
			<input type="text" id="taskDescription"class="taskInput" name="taskDescription"  placeholder="Task Description">
		</div>
		<button type="submit" class='button submit'>Add Task</button>
	</form>
