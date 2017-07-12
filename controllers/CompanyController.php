<?php

namespace App\Controllers;

use App\Core\ViewResolver;
use App\Model\Dto\Company;
use App\Model\Service\CompanyService;
use App\Model\Repository\CompanyRepositoryImpl;

class CompanyController {

	private $viewResolver;
	private $companyService;

	/**
	 takes instance of ViewResolver and QueryBuilder 
	*/
	public function __construct($viewResolver,
								$queryBuilder) {
		$this->viewResolver = $viewResolver;
		$this->companyService = new CompanyService(new CompanyRepositoryImpl($queryBuilder));
	}

	/**
	 redirects to add_company view
	*/
	public function showCompany() {
		return $this->redirectToAddCompanyView();
	}

	private function redirectToAddCompanyView() {
		return $this->viewResolver->view('add_company');
	}

	/**
	 Attempts to insert Company into database.
	 Retrieves Company object from $_POST method.
	 Returns user to main page on success, on failure to the add_company view page
	*/
	public function addCompany() {
		$company = $this->companyService->makeCompany();

		if ($this->companyService->addCompany($company)) {
			return $this->viewResolver->view('index');
		} 
		else {
			return $this->redirectToAddCompanyView();
		};
	}

	private function createCompanyTest() {
		$company = new Company();
		$company->companyName = 'companyName';
		$company->address = 'address';
		$company->street = 'street';
		$company->town = 'town';
		$company->country = 'country';
		$company->NIP = 41234;
		$company->email = 'email';
		$company->trader = 'trader';
		$company->aggreePersonalData = 'true';
		$company->aggreeCommercials = 'false';

		return $company;
	}
}