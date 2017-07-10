<?php

namespace App\Core;

use App\Controllers\PagesController;

class Router {

	protected $routes = [
		'GET' => [],
		'POST' =>[]
	];

	public static function load($file) {
		$router = new static;

		require $file;

		return $router;
	}
	
	public function get($uri, $controller) {
		$this->routes['GET'][$uri] = $controller;
	}

	public function post($uri, $controller) {
		$this->routes['POST'][$uri] = $controller;
	}

	public function direct($uri, $requestType) {
		if (array_key_exists($uri, $this->routes[$requestType])) {
			// ... operator is responsible for putting array items as arguments into function
			return $this->callAction(...explode('@', $this->routes[$requestType][$uri]));
		};

		throw new Exception('No route defined for this uri');
	}

	private function callAction($controller, $action) {
		$controller = "App\Controllers\\{$controller}";

		/* podobnie jak w tutorialu, natomiast:
		- potrzebowałem dostęp do ViewResolvera, który zawiera metody, które w tutorialu robiły te globalne funkcje:
		uri() i method(), natomiast mamy pisać obiektowo, więc napisałem ten ViewResolver,
		robią to samo co w tutorialu ale trzeba stworzyć obiekt.
		- potrzebowałem dostęp do bazy danych w controllerach, więc wysyłam z App database, to instancja QueryBuilder 
		  tworzona w App.php */
		$controller = new $controller(App::get('viewResolver'),
									  App::get('database'));

		if (! method_exists($controller, $action)) {
			throw new Exception("{$controller} does not respond to the {$action} action.");
		}
		return $controller->$action();
	}
}