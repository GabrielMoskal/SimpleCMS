<?php

namespace App\Model\Repository;

class CompanyRepositoryImpl implements CompanyRepository {

	private $queryBuilder;
	private $pdo;

	public function __construct($queryBuilder) {
		$this->queryBuilder = $queryBuilder;
		$this->pdo = $queryBuilder->getPDO();
	}

	/**
	returns true if Company with given NIP exists in database, returns false otherwise 
	*/
	public function companyExists($NIP) {
		$queryString = "SELECT COUNT(*) FROM companies 
						WHERE NIP='{$NIP}';";

		$numberOfRows = $this->query($queryString);
		return (int)$numberOfRows != 0;
	}

	/**
	returns first column of result of PDOStatement::fetchColumn() 
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
	Inserts Company object into database;
	*/
	public function insertNewCompany($company) {
		$companyArray = get_object_vars($company);

		$this->queryBuilder->insert('companies', $companyArray);
	}

	/**
	Retrieves array of all Company names from database.
	*/
	public function retrieveCompaniesNames() {

		$companies = $this->queryBuilder->selectAll('companies');

		return array_map(function($company) {
			return $company->companyName;
		}, $companies);
	}

	public function retrieveAllCompanies() {
		return $this->queryBuilder->selectAll('companies');
	}

	public function deleteAllCompanies() {
		$this->queryBuilder->deleteAll('companies');
	}

	public function selectRestricted($sortBy) {
		//var_dump($this->queryBuilder->selectRestricted('companies', $sortBy));
		
		//$result = $this->queryBuilder->selectRestricted('companies', $sortBy);

	
		$queryString = "SELECT * FROM companies 
						WHERE companyName LIKE '%{$sortBy['companyName']}%' AND 
						trader LIKE '%{$sortBy['trader']}%'";

		if (isset($sortBy['dateFrom']) && (isset($sortBy['dateTo']))) {
			$queryString = $queryString . " AND creationDate BETWEEN '{$sortBy['dateFrom']}' AND 
							 '{$sortBy['dateTo']}'";
		}

		$queryString = $queryString . ";";

		echo($queryString);
		


		return $this->queryBuilder->selectRestricted('companies', $sortBy);
	}

}