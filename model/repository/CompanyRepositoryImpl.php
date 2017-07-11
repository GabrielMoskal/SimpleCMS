<?php

namespace App\Model\Repository;

class CompanyRepositoryImpl implements CompanyRepository {

	private $queryBuilder;
	private $pdo;

	public function __construct($queryBuilder) {
		$this->queryBuilder = $queryBuilder;
		$this->pdo = $queryBuilder->getPDO();
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

		$this->queryBuilder->insert('companies', $companyArray);
	}

	public function retrieveCompaniesNames() {

		$companies = $this->queryBuilder->selectAll('companies');

		return array_map(function($company) {
			return $company->companyName;
		}, $companies);
	}

}