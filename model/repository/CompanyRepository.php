<?php

namespace App\Model\Repository;

interface CompanyRepository {

	public function companyExists($company);

	public function insertNewCompany($company);

	public function retrieveCompaniesNames();

	public function retrieveAllCompanies();

	public function deleteAllCompanies();

	public function selectRestricted($sortBy);

}