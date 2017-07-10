<?php

namespace App\Model\Service;

class RegistrationService {

	private $usersRepository;
	private $user = NULL;
	private $userValidator;

	public function __construct($usersRepository) {
		$this->usersRepository = $usersRepository;
		$this->userValidator = new UserValidator();
	}
	
	public function register($user) {
		$this->user = $user;

		if ($this->userValidator->areDetailsValid($user) && $this->userNotExists()) {
			$this->processRegistration();
			return true;	
		} else {
			return false;
		}
	}

	private function areDetailsValid() {
		var_dump($_POST['agreeTerms']);
		return $this->userValidator->areDetailsValid($user) && $_POST['agreeTerms'];
	}

	private function userNotExists() {
		$email = $this->user->getEmail();
		return ! $this->usersRepository->userExists($email);
	}

	private function processRegistration() {
		$this->usersRepository->insertNewUser($this->user);
	}

}