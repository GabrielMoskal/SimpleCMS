<?php

namespace App\Model\Repository;

class QuestionRepositoryImpl implements QuestionRepository {

	private $queryBuilder;
	private $pdo;

	/**
	Takes QueryBuilder object.
	*/
	public function __construct($queryBuilder) {
		$this->queryBuilder = $queryBuilder;
		$this->pdo = $queryBuilder->getPDO();
	}

	/**
		Returns true if Question exists in database having 
		the same email address like $contact->email.
	*/
	public function questionExists(string $questionValue) {
		$queryString = "SELECT COUNT(*) FROM questions 
						WHERE questionValue='{$questionValue}';";

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
		Inserts Question object into database.
	*/
	public function insertNewQuestion($question) {
		$questionArray = get_object_vars($question);

		$this->queryBuilder->insert('questions', $questionArray);
	}
}