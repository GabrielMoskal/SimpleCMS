<?php

class AuthorizationFilter() {

	private $routes = [];

	public static function load($file) {
		$router = new static;

		require $file;

		return $router;
	}

	public function addAuthorization($uri) {
		$this->routes[$uri] = $uri;
	}

	public function requiresAuthorization($uri) {
		if (array_key_exists($uri), $this->routes) {
			return true;
		} else {
			return false;
		}
	}

	public function isAuthorized($uri) {
		if (isset($_SESSION['user'])) {
			return true;
		} else {
			return false;
		}
	}
}