<?php
	session_start();
	$connect = mysqli_connect('Task8-MVC', 'root', '', 'task_list_mvc');
	$_SESSION['user'] = array (
		'1' => '1',
	);
?>