<?php
	session_start();
	if (!$_SESSION['user']) {
		header("Location:/authorization");
	}

	class Model_Main extends Model {
		public $connect;
		
		public function __construct() {
			$this->connect = mysqli_connect('Task8-MVC', 'root', '', 'tasklist');

			// $this->out_tasks();

		}

		// public function out_tasks() {
		// 	$str_out_tasks = "SELECT * FROM `tasks`";
		// 	$run_out_tasks = mysqli_query($this->connect, $str_out_tasks);

		// 	return $run_out_tasks;
		// }

		public function add_task($user_id, $add_text) {
			$add_text = htmlspecialchars($add_text);
			$sql_text = mysqli_real_escape_string($this->connect, $add_text);
			
			$str_add_task = "INSERT INTO `tasks`(`user_id`, `description`, `status`, `created_at`) VALUES ('$user_id','$sql_text','1',CURRENT_TIMESTAMP)";
			$run_add_task = mysqli_query($this->connect, $str_add_task);
			
			if ($run_add_task) {
				$_SESSION['mess'] = "<p class='text_mess'>Added!</p>";
				header("Location:/");
			} else {
				$_SESSION['error'] = "<p class='text_error'>ERROR!</p>";
			}
		}

		public function remove_all($id) {
			$str_delete = "DELETE FROM `tasks` WHERE user_id = $id";
			$run_delete = mysqli_query($this->connect, $str_delete);
			$_SESSION['mess'] = "<p class='text_mess'>DELETED!</p>";
			header("Location:/");
		}

		public function ready_all($id) {
			$str_upd_status = "UPDATE `tasks` SET `status`= 2 WHERE user_id = $id";
			$run_upd_status = mysqli_query($this->connect, $str_upd_status);
			header("Location:/");
		}

		public function exit() {
			session_unset();
			header("Location:/");
		}

		public function status($id) {
			$str_out_task = "SELECT * FROM `tasks` WHERE id = $id";
			$run_out_task = mysqli_query($this->connect, $str_out_task);
			$out_task = mysqli_fetch_array($run_out_task);

			if ($out_task['status'] == 1) {
				$str_status = "UPDATE `tasks` SET `status`= 2 WHERE id = $id";
			} elseif ($out_task['status'] == 2) {
				$str_status = "UPDATE `tasks` SET `status`= 1 WHERE id = $id";
			} else {
				$_SESSION['mess'] = "<p class='text_error'>ERROR!</p>";
				header("Location:/");
			}

			$run_status = mysqli_query($this->connect, $str_status);
			header("Location:/");
		}

		public function delete($id) {
			$str_delete = "DELETE FROM `tasks` WHERE id = $id";
			$run_delete = mysqli_query($this->connect, $str_delete);
			$_SESSION['mess'] = "<p class='text_mess'>DELETED!</p>";
			header("Location:/");
		}
	}

?>