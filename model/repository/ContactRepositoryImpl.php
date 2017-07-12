<?php

namespace App\Model\Repository;

class ContactRepositoryImpl implements ContactRepository {

	private $queryBuilder;
	private $pdo;

	/**
	Takes QueryBuilder objectct.
	*/
	public function __construct($queryBuilder) {
		$this->queryBuilder = $queryBuilder;
		$this->pdo = $queryBuilder->getPDO();
	}

	/**
		Returns true if Contact exists in database having 
		the same email address like $contact->email.
	*/
	public function contactExists($contact) {
		$email = $contact->email;
		$queryString = "SELECT COUNT(*) FROM contacts 
						WHERE email='{$email}';";

		$numberOfRows = $this->query($queryString);
		return (int)$numberOfRows != 0;
	}

	/**
		Executes query, returning first column of a result.
	*/
	private function query(string $queryString) {
		try {
			$result = $this->pdo->prepare($queryString); 
			$result->execute();			
			return $result->fetchColumn(0);			
		} catch(PDOException $e) {
			die($e->getMessage());
		}
	}

	/**
		Inserts Contact object into database.
	*/
	public function insertNewContact($contact) {
		$contactArray = get_object_vars($contact);

		$this->queryBuilder->insert('contacts', $contactArray);
	}
}