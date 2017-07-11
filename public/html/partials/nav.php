<nav>
	<ul id="menu">
		<li id="menuli"><a href="/">Home</a></li>
		<li id="menuli"><a href="/about">About</a></li>
		<li id="menuli"><a href="/contact">Contact</a></li>
		<li id="menuli"><a href="/addCompany">Company</a></li>
		<?php if (isset($_SESSION['user'])) {
			echo '<li id="menuli"><a href="/logout">Logout</a></li>';
		} else {
			echo '<li id="menuli"><a href="/login">Log in</a></li>';
		} ?>
		<li id="menuli"><a href="/register">Create Account</a></li>
		<li id="menuli"><a href="/addCompany">Company</a></li>
	</ul>
</nav>