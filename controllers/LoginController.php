<?php

namespace App\Controllers;

use App\Core\ViewResolver;
use App\Model\Service\LoginService;
use App\Model\Dto\User;
use App\Model\Repository\UsersRepositoryImpl;

class LoginController {

	private $viewResolver;
	private $loginService;

	/* takes instance of ViewResolver and QueryBuilder */
	/* póki co skomplikowane, bo wysyłany jest QueryBuilder do controllerów w klasie Router w metodzie callAction(),
	   a ze zrobiłem inny dostęp do bazy danych (za pomocą UsersRepositoryImpl), to potrzebuję PDO które jest już stworzone
	   w QueryBuilderze, więc dopisałem metodę getPDO, która go po prostu tworzy i mogę robić nowy obiekt bez tworzenia PDO jeszcze raz. */
	public function __construct($viewResolver,
								$queryBuilder) {
		$this->viewResolver = $viewResolver;
		$pdo = $queryBuilder->getPDO();
		$this->loginService = new LoginService(new UsersRepositoryImpl($pdo));
	}

	/* redirects to the login_view.php */
	public function showLogin() {
		return $this->viewResolver->view('page_signin');
	}

	/* creates User object, then sends these to LoginService which takes care of login process*/
	public function processLogin() {	
		$user = $this->createUser();	

		if ($this->loginService->login($user)) {
			return $this->viewResolver->view('index');
		} else {
			return $this->viewResolver->view('page_signin', compact('user'));
		};
	}

	// creates a new User object, takes details from POST method
	private function createUser() {
		$email = $_POST['email'];
		$password = $_POST['password'];
		return new User(strip_tags($email), strip_tags($password));
	}

	// process user logout and returns to home page
	public function logout() {
		$this->loginService->logout();
		$this->viewResolver->view('index');
	}

	// shows page responsible for reminding password
	public function showForgotPassword() {
		return $this->viewResolver->view('page_forgotpwd');
	}

	// TODO
	public function processForgotPassword() {

	}

}