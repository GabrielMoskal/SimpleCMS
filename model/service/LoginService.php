<?php

namespace App\Model\Service;

use App\Model\Service\Validator\{DataValidator, UserValidator};

/* Class responsible for Logging User  */

class LoginService {

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
	   responsible for login $user, as a parameter takes User object 
	   1. checks if details submitted to user (email and password) are not empty and filters email,
	   2. validate user using UsersRepository, chcecks if user sign correct email and password
	   3. if validatation is correct, process logging (starting session and set User to $_SESSION variable) and returns true
	   4. if validation is incorrect, returns false
	*/
	public function login($user) {
		$this->user = $user; 
		if ($this->canProcessLogging()) {
			$this->processLogging();		
			return true;
		} else {
			return false;
		}
	}

	private function canProcessLogging() {
		$passwordValid = $this->userValidator->isPasswordValid($this->user->password);
		$detailsValid = $this->usersRepository->validateUser($this->user);

		return $passwordValid && $detailsValid;
	}

	/**
	When logging, inserts missing details into User object from database,
	because user submits only email and password in form.
	Creates new session aswell.
	*/
	private function processLogging() {
		$this->fillUserWithDetails();
		$this->createSession();
	}

	/** 
	Only email and password are submitted, so the rest of User object is filled from database 
	*/
	private function fillUserWithDetails() {
		$email = $this->user->email;
		$this->user = $this->usersRepository->getUser($email);
	}

	private function createSession() {
		session_start();
		$_SESSION['user'] = $this->user;
	}

	/** 
	Function destroys session and unsets $_SESSION variables 
	*/
	public function logout() {
		session_start();
		unset($_SESSION['email']);
		session_destroy();
	}

	public function resetPassword($email) {
		$email = strip_tags($email);

		if ($this->canProcessResetPassword($email)) {
			$this->processResetPassword($email);
			return true;
		}
		else {
			return false;
		}
	}

	private function canProcessResetPassword($email) {
		$emailSet = isset($email) || $email !== '';
		$emailValid = $this->dataValidator->isEmailValid($email);
		$userExists = $this->usersRepository->userExists($email);

		return $emailSet && $emailValid && $userExists;
	}

	private function processResetPassword($email) {
		$password = $this->generateNewPassword();
		$this->usersRepository->setPassword($email, $password);
		$this->sendEmailAboutPasswordReset($email, $password);
	}

	private function generateNewPassword() {
		return 'new_' . (string)rand(1000,1000000);
	}

	private function sendEmailAboutPasswordReset($email, $newPassword) {
		$message = "Password has been reset.\n\nNew password is: {$newPassword}";
		mail($email, "Reset password", $message);
	}

} 