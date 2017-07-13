<?php require('partials/head.php'); ?>

	<?php require('partials/nav.php'); ?>

	<h1>Home Page</h1>

	<?php 
		if (isset($_SESSION['user'])) {
			
			echo "Hello " . $_SESSION['user']->username; 
		}
	?>

<?php require('partials/footer.php'); ?>