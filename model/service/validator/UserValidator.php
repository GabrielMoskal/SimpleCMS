<?php

namespace App\Model\Service\Validator;

class UserValidator {

	/**
	Validates password given in an string object.
	*/
	public function isPasswordValid(string $password) {
		$passwordSet = isset($password);
		$passwordEmpty = $password === '';

		return $passwordSet && (! $passwordEmpty);
	}
}