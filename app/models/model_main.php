<?php
	session_start();
	if (!$_SESSION['user']) {
		header("Location:/authorization");
	}

	class Model_Main extends Model {
		
	}

?>