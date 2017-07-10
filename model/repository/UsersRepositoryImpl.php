<?php

namespace App\Model\Repository;

use App\Model\Dto\User;
use App\Core\App;

class UsersRepositoryImpl implements UsersRepository {

	private $pdo;

	public function __construct($pdo) {
		$this->pdo = $pdo;
	}

	// returns true if User with given email exists in container, returns false otherwise 
	public function userExists(string $email) {
		$queryString = "SELECT COUNT(*) FROM users 
				  WHERE email='{$email}';";

		$numberOfRows = $this->query($queryString);
		return (int)$numberOfRows != 0;
	}

	// returns first columnt of result of PDOStatement::fetchColumn()
	private function query(string $queryString) {
		try {
			$result = $this->pdo->prepare($queryString); 
			$result->execute();			
			return $result->fetchColumn(0);			
		} catch(PDOException $e) {
			die($e->getMessage());
		}
	}

	/* returns true if $user email and password members are the same like in database */
	public function validateUser($user) {
		$email = $user->getEmail();
		$password = $user->getPassword();
		$queryString = "SELECT COUNT(*) FROM users 
				  WHERE email='{$email}' AND password='{$password}';";

		$numberOfRows = $this->query($queryString);
		return (int)$numberOfRows != 0;
	}

	/* returns User object from database for user with given email, user must exist in database */
	public function getUser(string $email) {
		$queryString = "SELECT * 
						FROM users 
						WHERE email='{$email}';";
		$userArray = $this->queryForUser($queryString);
		return $this->makeUserFromArray($userArray);
	}

	private function queryForUser($queryString) {
		try {
			$result = $this->pdo->prepare($queryString);
			$result->execute();
			return $result->fetchAll();	
		} catch(PDOException $e) {
			die($e->getMessage());
		}
	}

	private function makeUserFromArray($userArray) {
		return new User($userArray[0]['email'], $userArray[0]['password'], $userArray[0]['username']);
	}

	public function insertNewUser($user) {
		$password = $user->getPassword();
		$email = $user->getEmail();
		$username = $user->getUsername();

		$queryString = "INSERT INTO users(email, password, username) 
						VALUES (:email, :password, :username);"; 

		try {
			$stmt = $this->pdo->prepare($queryString);
			$stmt->bindParam(':email', $email);
			$stmt->bindParam(':password', $password);
			$stmt->bindParam(':username', $username);
			// insert one row
			$stmt->execute();
		} catch(PDOException $e) {
			die($e->getMessage());
		}	

	}


}