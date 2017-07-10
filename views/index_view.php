<?php session_start(); ?>
<?php require('partials/head.php'); ?>

	<?php require('partials/nav.php'); ?>

	<h1>Home Page</h1>

	<?php echo "Hello " . substr($_SESSION['email'], 0, strpos($_SESSION['email'], '@')); ?>

<?php require('partials/footer.php'); ?>