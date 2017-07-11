<?php

namespace App\Model\Service;

class CompanyService {

	private $companyRepository;
	private $company = NULL;
	private $companyValidator;

	public function __construct($companyRepository) {
		$this->companyRepository = $companyRepository;
		$this->companyValidator = new CompanyValidator();
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