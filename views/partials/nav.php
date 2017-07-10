<?php session_start(); ?>
<nav>
	<ul id="menu">
		<li id="menuli"><a href="/">Home</a></li>
		<li id="menuli"><a href="/about">About</a></li>
		<li id="menuli"><a href="/contact">Contact</a></li>
		<li id="menuli"><a href="/users">Users</a></li>
		<?php if (isset($_SESSION['user'])) {
			echo '<li id="menuli"><a href="/logout" style="position: absolute; right: 10px;">Logout</a></li>';
		} else {
			echo '<li id="menuli"><a href="/login" style="position: absolute; right: 10px;">Log in</a></li>';
		} ?>
	</ul>
</nav>