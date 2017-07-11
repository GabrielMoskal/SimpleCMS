<?php

namespace App\Model\Repository;

class CompanyRepositoryImpl implements CompanyRepository {

	private $pdo;

	public function __construct($pdo) {
		$this->pdo = $pdo;
	}

	// returns true if Company with given NIP exists in container, returns false otherwise 
	public function companyExists($NIP) {
		$queryString = "SELECT COUNT(*) FROM companies 
						WHERE NIP='{$NIP}';";

		$numberOfRows = $this->query($queryString);
		return (int)$numberOfRows != 0;
	}

	// returns first column of result of PDOStatement::fetchColumn()
	private function query(string $queryString) {
		try {
			$result = $this->pdo->prepare($queryString); 
			$result->execute();			
			return $result->fetchColumn(0);			
		} catch(PDOException $e) {
			die($e->getMessage());
		}
	}

	public function insertNewCompany($company) {
		$companyArray = get_object_vars($company);

		$queryString = sprintf (
			'insert into %s (%s) values (%s);',
			'companies',
			implode(', ', array_keys($companyArray)),
			':' . implode(', :', array_keys($companyArray))
		);

		try {
			$stmt = $this->pdo->prepare($queryString);
			$stmt->execute($companyArray);
		} catch(PDOException $e) {
			die($e->getMessage());
		}	

	}
}