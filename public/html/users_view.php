<?php require('partials/head.php'); ?>

	<?php require('partials/nav.php'); ?>

	<h1>All users</h1>

	<?php foreach($users as $user) : ?>
		<bold><?= $user->name;?></bold>
		<bold><?=$user->email; ?></bold>
		<br>
	<?php endforeach; ?>

	<form method="POST" action="/users">
		<input name="name"></input>
		<button type="submit">Submit</button>
	</form>

<?php require('partials/footer.php'); ?>