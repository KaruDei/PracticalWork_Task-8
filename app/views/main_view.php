<div class="container">
		<div class="tasklist_add">
			<form action="controllers/add.php" method="POST" class="tasklist_add_block">
				<input type="text" name="add_text" class="add_text">
				<input type="submit" name="add_sub" value="ADD" class="add_sub">
			</form>
			<div class="tasklist_add_block">
				<a href="controllers/delete.php?task_all=ALL" class="tasklist_btn">REMOVE ALL</a>
				<a href="controllers/status.php?task_all=ALL" class="tasklist_btn">READY ALL</a>
				<a href="controllers/exit.php" class="tasklist_btn">EXIT</a>
			</div>
		</div>

		<?php
			echo $_SESSION['mess'];
			unset($_SESSION['mess']);
			echo $_SESSION['error'];
			unset($_SESSION['error']);
		?>

		<div class="tasklist">
			<div class='tasklist_items'>
				<div class='tasklist_item'> 
						<p class='tasklist_item_text'>$out_tasks[description]</p>
						<div class='tasklist_item_btn'>
							<a href='controllers/status.php?task_id=$out_tasks[id]' class='tasklist_btn'>$status_text</a>
							<a href='controllers/delete.php?task_id=$out_tasks[id]' class='tasklist_btn'>DELETE</a>
						</div>
				</div>
				<div class='tasklist_status_img'>
					<img src="imgs/X.svg" alt="">
				</div>
			</div>
		</div>
	</div>