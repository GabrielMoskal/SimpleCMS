<?php

namespace App\Model\Service\Validator;

class UserValidator {

	/**
	Validates email and password given in an User object.
	*/
	public function areDetailsValid($user) {
		$email = $user->getEmail();
		$emailValid = $this->isEmailValid($email);

		$password = $user->getPassword();
		$passwordValid = $this->isPasswordValid($password);

		return $emailValid && $passwordValid;
	}

	private function isEmailValid(string $email) {
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
			return true;
		} else {
			return false;
		}
	}

	private function isPasswordValid(string $password) {
		$passwordSet = isset($password);
		$passwordEmpty = $password === '';

		return $passwordSet && (! $passwordEmpty);
	}
}