<?php

namespace App\Core;

class AuthorizationFilter {

	private $routes = [];

	/**
	Adds $uri which should be authorized.
	*/
	public function addAuthorization($uri) {
		$this->routes[$uri] = $uri;
	}

	/**
	Checks if $uri should be authorized, if yes process authorization.
	*/
	public function authorize($uri) {
		if ($this->requiresAuthorization($uri)) {
			return $this->processAuthorization($uri);
		} else {
			return true;
		}
	}

	/**
	If $uri exists in routes, it requires to be authorized.
	*/
	private function requiresAuthorization($uri) {
		if (array_key_exists($uri, $this->routes))	 {
			return true;
		} else {
			return false;
		}
	}

	/**
	If User exists in $_SESSION, then it allows to view content he wants,
	so return true, if not returns false.
	*/
	private function processAuthorization($uri) {
		if (isset($_SESSION['user'])) {
			return true;
		} else {
			return false;
		}
	}
}