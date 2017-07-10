<?php

namespace App\Model\Repository;

interface UsersRepository {

	public function userExists(string $email);
	
	public function validateUser($user);

	public function getUser(string $email);

	public function insertNewUser($user);

}