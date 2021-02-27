<?php
	// Get tasks from database 
	$query = 'SELECT * FROM tasks';
	$result = $mysqli->query($query); 
?>
	<table class="main-table">
		<tr class="header-row row">
			<th class="header cell">ID</th>
			<th class="header cell">Title</th>
			<th class="header cell">Description</th>
			<th class="header cell">Actions</th>
		</tr>
		<?php 	
			//Print a table row for every entry on DB
			while($row = $result->fetch_assoc()){ 
		?>
		<tr class="row">
			<td class="cell"><?= $row['id']; ?></td>
			<td class="cell"><?= $row['title']; ?></td>
			<td class="cell"><?= $row['description']; ?></td>
			<td class="cell actions">
				<a href="delete.php?id=<?= $row['id']; ?>" class="delete icon"><i class="fas fa-trash-alt"></i></a>
				<a href="update.php?id=<?= $row['id']; ?>" class="edit icon"><i class="fas fa-edit"></i></a>
			</td>
		</tr>
		<?php
			}
		?>
	</table>
</section>



