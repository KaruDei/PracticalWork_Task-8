<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>MVC</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="wrapper">
		<header class="header">
			<p class="header_title">TASK LIST</p>
		</header>

		<main class="main">
			<?php
				include 'app/views/'.$content_view;
			?>
		</main>

		<footer class="footer">
			<p class="footer_text">TASK LIST</p>
			<p class="footer_text">&copy 2023</p>
		</footer>
	</div>
	<script src="js/script.js"></script>
</body>
</html>