<?php
	class Controller_Authorization extends Controller {
		public $email;
		public $password;

		public function __construct() {
			$this->view = new View();
			
			if ($_POST) {
				$this->email = $_POST['email'];
				$this->password = $_POST['password'];

				if (!empty($this->email) && !empty($this->password)) {
					$this->model = new Model_Authorization($this->email, $this->password);
				} else {
					$_SESSION['error'] = "<p class='text_error'>Fill in all fields!</p>";
				}
			}
		}
		
		public function action_index() {
			$this->view->generate('authorization_view.php', 'template_view.php');
		}
	}
?>