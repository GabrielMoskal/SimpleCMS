<?php

namespace App\Model\Service;

use App\Model\Service\Validator\UserValidator;

class RegistrationService {

	private $usersRepository;
	private $user = NULL;
	private $userValidator;

	public function __construct($usersRepository) {
		$this->usersRepository = $usersRepository;
		$this->userValidator = new UserValidator();
	}
	
	/**
	   Responsible for registering $user, as a parameter takes User object 
	   1. checks if details in $user are not empty and filters email,
	   2. validate user using UsersRepository, chcecks if user sign correct email and password
	   3. if validatation is correct, process logging (starting session and set User to $_SESSION variable) and returns true
	   4. if validation is incorrect, returns false
	*/
	public function register($user) {
		$this->user = $user;

		if ($this->userValidator->areDetailsValid($user) && 
		    (! $this->userExists())) {
			$this->processRegistration();
			return true;	
		} else {
			return false;
		}
	}

	/**
	Returns true if $this->user details and valid and user accepted terms.
	*/
	private function areDetailsValid() {
		return $this->userValidator->areDetailsValid($this->user) && $_POST['agreeTerms'];
	}


	private function userExists() {
		$email = $this->user->email;
		return $this->usersRepository->userExists($email);
	}

	/**
	Inserts a new user into database using UsersRepository.
	*/
	private function processRegistration() {
		$this->usersRepository->insertNewUser($this->user);
	}

}