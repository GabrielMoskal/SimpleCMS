<?php session_start(); ?>
<?php require('partials/head.php'); ?>

	<?php require('partials/nav.php'); ?>

	<h1>Contact Us</h1>

	<h2><?= $_SESSION['email']; ?></h2>

<?php require('partials/footer.php'); ?>