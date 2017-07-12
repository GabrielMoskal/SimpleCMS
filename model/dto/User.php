<?php

namespace App\Model\Dto;

/**
Data transfer object, represents User in database
*/
class User {
	
	private $username;
	private $email;
	private $password;

	public function __construct($email, $password, $username = NULL) {
		$this->username = $username;
		$this->email = $email;
		$this->password = $password;
	}

	public function getUsername() {
		return $this->username;
	}

	public function setUsername(string $username) {
		$this->username = $username;
	}

	public function getEmail() {
		return $this->email;
	}

	public function setEmail(string $email) {
		$this->email = $email;
	}

	public function getPassword() {
		return $this->password;
	}

	public function setPassword(string $password) {
		$this->password = $password;
	}
}