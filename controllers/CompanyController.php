<?php

namespace App\Controllers;

use App\Core\ViewResolver;
use App\Model\Dto\Company;
use App\Model\Service\CompanyService;
use App\Model\Repository\CompanyRepositoryImpl;

class CompanyController {

	private $viewResolver;
	private $companyService;

	public function __construct($viewResolver,
								$queryBuilder) {
		$this->viewResolver = $viewResolver;
		$pdo = $queryBuilder->getPDO();
		$this->companyService = new CompanyService(new CompanyRepositoryImpl($pdo));
	}

	public function showCompany() {
		return $this->viewResolver->view('add_company');
	}

	public function addCompany() {
		$company = $this->createCompanyTest();
		if (isset($_POST['cancel'])) {
			return $this->viewResolver->view('add_company');
		} 
		else if ($this->companyService->addCompany($company)) {
			return $this->viewResolver->view('index');
		} 
		else {
			return $this->viewResolver->view('add_company', compact('user'));
		};
	}

	private function createCompany() {
		$company = new Company();
		$company->companyName = strip_tags($_POST['companyName']);
		$company->address = strip_tags($_POST['address']);
		$company->street = strip_tags($_POST['street']);
		$company->town = strip_tags($_POST['town']);
		$company->country = strip_tags($_POST['country']);
		$company->NIP = strip_tags($_POST['NIP']);
		$company->email = strip_tags($_POST['email']);
		$company->trader = strip_tags($_POST['trader']);
		$company->aggreePersonalData = $_POST['aggreePersonalData'];
		$company->aggreeCommercials = $_POST['aggreeCommercials'];

		return $company;
	}

	private function createCompanyTest() {
		$company = new Company();
		$company->companyName = 'companyName';
		$company->address = 'address';
		$company->street = 'street';
		$company->town = 'town';
		$company->country = 'country';
		$company->NIP = 1234;
		$company->email = 'email';
		$company->trader = 'trader';
		$company->aggreePersonalData = 'true';
		$company->aggreeCommercials = 'false';

		return $company;
	}
}