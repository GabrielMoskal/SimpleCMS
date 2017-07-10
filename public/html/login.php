<?php require('partials/head.php'); ?>

	<?php require('partials/nav.php'); ?>

	<h1>Sign Up</h1>

	<form method="POST" action="/login">
		<ul>
			<li><input type="email" name="email"><?php if(isset($email)) {echo 'Details incorrect.';} ?></li>
			<li><input type="password" name="password"></li>
			<li><button name="login">zaloguj</button></li>
		</ul>
	</form>

<?php require('partials/footer.php'); ?>