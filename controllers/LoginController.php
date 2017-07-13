<?php

namespace App\Controllers;

use App\Core\ViewResolver;
use App\Model\Service\LoginService;
use App\Model\Dto\User;
use App\Model\Repository\UsersRepositoryImpl;

class LoginController {

    /**
     *   @var ViewResolver
     */
	private $viewResolver;
	private $loginService;

	/**
	 takes instance of ViewResolver and QueryBuilder 
	*/
	public function __construct($viewResolver,
								$queryBuilder) {
		$this->viewResolver = $viewResolver;
		$this->loginService = new LoginService(new UsersRepositoryImpl($queryBuilder));
	}

	/** 
	Redirects to the login_view.php 
	*/
	public function showLogin() {
		return $this->viewResolver->view('page_signin');
	}

	/**
	 Retrieves User object from $_POST method.
	 LoginService takes care of login process.
	 Returns user to main page on success, on failure to the page_signin view page
	*/
	public function processLogin() {	
		$user = $this->createUser();	

		if ($this->loginService->login($user)) {
			return $this->viewResolver->view('index');
		} else {
			return $this->viewResolver->view('page_signin', compact('user'));
		};
	}

	/**
	 creates a new User object, takes details from POST method
	*/
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

	/** 
	Redirects to the page_forgotpwd.php 
	*/
	public function showForgotPassword() {
		return $this->viewResolver->view('page_forgotpwd');
	}

	/**
	Retrieves email from $_POST, tries to reset password
	and sends email on success.
	If success, returns to index page, else returns to page_forgotpwd page.
	*/
	public function processForgotPassword() {
		$email = $_POST['email'];

		if ($this->loginService->resetPassword($email)) {
			return $this->viewResolver->view('index');
		} else {
			return $this->viewResolver->view('page_forgotpwd', compact('email'));
		};
	}

}