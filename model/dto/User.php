<?php

namespace App\Model\Dto;

/**
Data transfer object, represents User in database
*/
class User {
	
	public $username;
	public $email;
	public $password;

	public function __construct($email, $password, $username = NULL) {
		$this->username = $username;
		$this->email = $email;
		$this->password = $password;
	}
}