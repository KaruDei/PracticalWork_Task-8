<?php
	$connect = mysqli_connect('Task8-MVC', 'root', '', 'tasklist');
	$user_id = $_SESSION['user']['id'];
?>
<div class="container">
		<div class="tasklist_add">
			<form action="/main/add_task" method="POST" class="tasklist_add_block">
				<input type="text" name="add_text" class="add_text">
				<input type="submit" name="add_sub" value="ADD" class="add_sub">
			</form>
			<div class="tasklist_add_block">
				<!-- <form method="POST">
					<input type="submit" name="tasklist_btn" value="REMOVE ALL" class='tasklist_btn'>
				</form>
				<form method="POST">
					<input type="submit" name="tasklist_btn" value="READY ALL" class='tasklist_btn'>
				</form>
				<form method="POST">
					<input type="submit" name="tasklist_btn" value="EXIT" class='tasklist_btn'>
				</form> -->
			
			
				<a href='/main/remove_all/?user_id=<?=$user_id?>' class='tasklist_btn'>REMOVE ALL</a>
				<a href="/main/ready_all/?user_id=<?=$user_id?>" class='tasklist_btn'>READY ALL</a>
				<a href='/main/exit' class='tasklist_btn'>EXIT</a>
		
			</div>
		</div>

		<?php
			echo $_SESSION['mess'];
			unset($_SESSION['mess']);
			echo $_SESSION['error'];
			unset($_SESSION['error']);
		?>

		<div class="tasklist">
			<!-- <div class='tasklist_items'>
				<div class='tasklist_item'> 
						<p class='tasklist_item_text'>$out_tasks[description]</p>
						<div class='tasklist_item_btn'>
								<form method="POST">
									<input type="submit" name="tasklist_btn" value="$status_text" class='tasklist_btn'>
								</form>
								<form method="POST">
									<input type="submit" name="tasklist_btn" value="DELETE" class='tasklist_btn'>
								</form>
							<a href='controllers/status.php?task_id=$out_tasks[id]' class='tasklist_btn'>$status_text</a>
							<a href='controllers/delete.php?task_id=$out_tasks[id]' class='tasklist_btn'>DELETE</a>
						</div>
				</div>
				<div class='tasklist_status_img'>
					<img src="imgs/X.svg" alt="">
				</div>
			</div> -->
			
			<?php
				$str_out_tasks = "SELECT * FROM `tasks` WHERE user_id = '$user_id'";
				$run_out_tasks = mysqli_query($connect, $str_out_tasks);
				
				while ($out_tasks = mysqli_fetch_array($run_out_tasks)) {

					if ($out_tasks['status'] == 1) {
						$status_text = "READY";
						$img = "<img src='/imgs/X.svg' alt=''>";
					} elseif ($out_tasks['status'] == 2) {
						$status_text = "UNREADY";
						$img = "<img src='/imgs/V.svg' alt=''>";
					}

					echo "
						<div class='tasklist_items'>
							<div class='tasklist_item'> 
									<p class='tasklist_item_text'>$out_tasks[description]</p>
									<div class='tasklist_item_btn'>
										<a href='/main/status/?status_id=$out_tasks[id]' class='tasklist_btn'>$status_text</a>
										<a href='/main/delete/?delete_id=$out_tasks[id]' class='tasklist_btn'>DELETE</a>
									</div>
							</div>
							<div class='tasklist_status_img'>
								$img
							</div>
						</div>
					";
				}
			?>
			
		</div>
	</div>