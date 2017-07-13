<?php

namespace App\Model\Service;

use App\Model\Service\Validator\{DataValidator, UserValidator};

class RegistrationService {

	private $usersRepository;
	private $user = NULL;
	private $dataValidator;
	private $userValidator;

	public function __construct($usersRepository) {
		$this->usersRepository = $usersRepository;
		$this->dataValidator = new DataValidator();
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

		if ($this->canProcessRegistration()) {
			$this->processRegistration();
			return true;
		} else {
			return false;
		}
	}

	/**
	Returns true if all these are true:
	All details in User object are set.
	Password validation returned true.
	Email is valid email.
	User not exists in database.
	Otherwise returns false.
	*/
	private function canProcessRegistration() {
		$detailsSet = $this->dataValidator->areDetailsSet($this->user);
		// TODO write method that checks passwords
		$passwordValid = $this->userValidator->isPasswordValid($this->user->password);
		$emailValid = $this->dataValidator->isEmailValid($this->user->email);
		$userExists = $this->usersRepository->userExists($this->user->email);

		return $detailsSet && $passwordValid && $emailValid && (! $userExists);
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