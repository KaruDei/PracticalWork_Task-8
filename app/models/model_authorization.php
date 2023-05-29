<?php
	session_start();
	if ($_SESSION['user']) {
		header("Location:/");
	}

	class Model_Authorization extends Model {

	}

?>