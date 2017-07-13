<?php

namespace App\Controllers;

use App\Core\ViewResolver;
use App\Model\Dto\User;
use App\Model\Service\RegistrationService;
use App\Model\Repository\UsersRepositoryImpl;

class RegistrationController {

    /**
     *   @var ViewResolver
     */
	private $viewResolver;
	private $registrationService;

	/**
	 takes instance of ViewResolver and QueryBuilder 
	*/
	public function __construct($viewResolver,
								$queryBuilder) {
		$this->viewResolver = $viewResolver;
		$this->registrationService = new RegistrationService(new UsersRepositoryImpl($queryBuilder));
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

	/**
	 creates a new User object, takes details from POST method
	*/
	private function createUser() {
		$email = $_POST['email'];
		$password = $_POST['password'];
		$username = $_POST['username'];
		return new User(strip_tags($email), strip_tags($password), strip_tags($username));
	}
}