<?php
	class Controller_Main extends Controller {
		
		public function __construct() {
			$this->view = new View();
			$this->model = new Model_Main();
		}

		public function action_index() {
			$this->view->generate('main_view.php', 'template_view.php');
		}

		public function action_add_task() {
			$add_text = $_POST['add_text'];
			$add_btn = $_POST['add_sub'];

			if (!empty($add_btn)) {
				if (!empty($add_text)) {
					$this->model->add_task($_SESSION['user']['id'], $add_text);
				} else {
					$_SESSION['error'] = "<p class='text_error'>Fill in all fields!</p>";
					header("Location:/");
				}
			}
		}

		public function action_exit() {
			$this->model->exit();
		}

		public function action_remove_all() {
			$this->model->remove_all($_GET['user_id']);
		}

		public function action_ready_all() {
			$this->model->ready_all($_GET['user_id']);
		}

		public function action_status() {
			$this->model->status($_GET['status_id']);
		}
		
		public function action_delete() {
			$this->model->delete($_GET['delete_id']);
		}
		
	}

?>