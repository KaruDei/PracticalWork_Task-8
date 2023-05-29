<div class="container_auth">
	<p class="container_title">AUTHORIZATION</p>
	<form action="controllers/auth.php" method="POST" class="auth_form">
		<div class="form_item">
			<p class="form_text">Email</p>
			<input type="text" name="email" placeholder="email@mail.ru">
		</div>
		<div class="form_item">
			<p class="form_text">Password</p>
			<input type="password" name="password">
		</div>
		<div class="form_item">
			<input type="submit" name="auth_sub" class="auth_sub" value="LOGIN">
		</div>
		<p class="form_reg_text">If you don't have an account, it will be created</p>
	</form>
	<?php
		echo $_SESSION['error'];
		unset($_SESSION['error']);
	?>
</div>