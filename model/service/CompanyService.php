<?php

namespace App\Model\Service;

use App\Model\Dto\Company;

class CompanyService {

	private $companyRepository;
	private $company = NULL;
	private $companyValidator;

	public function __construct($companyRepository) {
		$this->companyRepository = $companyRepository;
		$this->companyValidator = new CompanyValidator();
	}

	public function retrieveCompaniesNames() {
		return $this->companyRepository->retrieveCompaniesNames();
	}

	public function makeCompany() {
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

	public function addCompany($company) {
		$this->company = $company;
		if ($this->canProcessAddCompany()) {
			$this->processAddCompany();		
			return true;	
		} else {
			return false;
		}
	}

	private function canProcessAddCompany() {
		$contractsAgreed = $this->areContractsAgreed();
		$detailsValid = $this->companyValidator->areDetailsValid($this->company);
		$companyExists = $this->companyRepository->companyExists($this->company->NIP);

		return $contractsAgreed && $detailsValid && (! $companyExists);
	}

	private function areContractsAgreed() {
		if (($_POST['aggreePersonalData'] === 'true') &&
			($_POST['aggreeCommercials'] === 'true')) {
			return true;
		}
		return false;
	}

	private function processAddCompany() {
		$this->companyRepository->insertNewCompany($this->company);
	}

}