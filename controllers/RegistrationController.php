<?php

namespace App\Controllers;

use App\Core\ViewResolver;
use App\Model\Dto\User;
use App\Model\Service\RegistrationService;
use App\Model\Repository\UsersRepositoryImpl;

class RegistrationController {

	private $viewResolver;
	private $registrationService;

	public function __construct($viewResolver,
								$queryBuilder) {
		$this->viewResolver = $viewResolver;
		$pdo = $queryBuilder->getPDO();
		$this->registrationService = new RegistrationService(new UsersRepositoryImpl($pdo));
	}

	// shows view responsible for registration
	public function showRegistration() {
		return $this->viewResolver->view('page_signup');
	}

	public function processRegistration() {
		$user = $this->createUser();

		if ($this->registrationService->register($user)) {
			return $this->viewResolver->view('index');
		} else {
			return $this->viewResolver->view('page_signup', compact('user'));
		};
	}

	private function createUser() {
		$email = $_POST['email'];
		$password = $_POST['password'];
		$username = $_POST['username'];
		return new User(strip_tags($email), strip_tags($password), strip_tags($username));
	}
}