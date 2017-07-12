<?php

namespace App\Model\Service\Validator;

class DataValidator {

	/**
	Returns true if all members of $data object
	are not NULL and if they are string they are not empty
	*/
	public function areDetailsSet($data) {

		$dataArray = get_object_vars($data);
		$variablesValidArray = $this->areVariablesValid($dataArray);

		return in_array(false, $variablesValidArray);
	}

	/**
	Returns array having true and false values, each array index 
	represents each member. If member is not set, array has false value,
	otherwise true. 
	*/
	private function areVariablesValid($dataArray) {
		return array_map(function($data) {
			return isset($data) || $data !== '';
		}, $dataArray);
	}

	/**
	Checks if email is valid.
	*/
	public function isEmailValid(string $email) {
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
			return true;
		} else {
			return false;
		}
	}
}