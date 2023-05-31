<?php
	session_start();
	if ($_SESSION['user']) {
		header("Location:/");
	}

	class Model_Authorization extends Model {
		public $email;
		public $password;
		public $password_hash;
		public $connect;
		
		public function __construct($email, $password) {
			$this->connect = mysqli_connect('Task8-MVC', 'root', '', 'tasklist');
			$this->email = $email;
			$this->password = $password;

			$this->data_work();
		}

		public function data_work() {
			if (!empty($this->email) && !empty($this->password)) {
				$this->email = htmlspecialchars($this->email);
				$this->password = htmlspecialchars($this->password);
				$this->password_hash = password_hash($this->password, PASSWORD_BCRYPT);
				$sql_email = mysqli_real_escape_string($this->connect, $this->email);

				if (filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
					
					$str_out_user = "SELECT * FROM `users` WHERE email = '$sql_email'";
					$run_out_user = mysqli_query($this->connect, $str_out_user);
					$out_num_user = mysqli_num_rows($run_out_user);
					$out_user = mysqli_fetch_array($run_out_user);
					
					if ($out_num_user == 1) {

						if (password_verify($this->password, $out_user['password'])) {

							$_SESSION['user'] = array (
								"id" => $out_user['id'],
								"email" => $out_user['email'],
								"password" => $out_user['password'],
								"created_at" => $out_user['created_at'],
							);

							header("Location:/");

						} else {
							$_SESSION['error'] = "<p class='text_error'>Invalid email or password!</p>";
						}

					} else if ($out_num_user == 0) {
						
						$str_add_user = "INSERT INTO `users`(`email`, `password`, `created_at`) VALUES ('$sql_email','$this->password_hash',CURRENT_TIMESTAMP)";
						$run_add_user = mysqli_query($this->connect, $str_add_user);
						
						if ($run_add_user == true) {

							$str_user = "SELECT * FROM `users` WHERE email = '$sql_email' AND password = '$this->password_hash'";
							$run_user = mysqli_query($this->connect, $str_user);
							$user = mysqli_fetch_array($run_user);

							$_SESSION['user'] = array (
								"id" => $user['id'],
								"email" => $user['email'],
								"password" => $user['password'],
								"created_at" => $user['created_at'],
							);
							$_SESSION['mess'] = "<p class='text_mess'>ACCOUNT CREATED!</p>";
							header("Location:/");
						} else {
							$_SESSION['error'] = "<p class='text_error'>Registration error!</p>";
						}

					} else {
						$_SESSION['error'] = "<p class='text_error'>Authorization error!</p>";
					}

				} else {
					$_SESSION['error'] = "<p class='text_error'>Incorrect email!</p>";
				}
			}
		}

	}

?>