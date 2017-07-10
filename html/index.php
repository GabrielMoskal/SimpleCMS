<?php require('partials/head.php'); ?>

	<?php require('partials/nav.php'); ?>

	<h1>Home Page</h1>

	<?php 
		if (isset($_SESSION['user'])) {
			$email = $_SESSION['user']->getEmail();
			echo "Hello " . substr($email, 0, strpos($email, '@')); 
		}
	?>

<?php require('partials/footer.php'); ?>