<?php

namespace App\Model\Service;

use App\Model\Service\Validator\{DataValidator, FormValidator};
use App\Model\Dto\Company;

class CompanyService {

	private $companyRepository;
	private $company = NULL; // TODO
	private $formValidator;
	private $dataValidator;

	/**
	Takes CompanyRepository instance as argument, and creates
	FormValidator and DataValidator to validate given data.
	*/
	public function __construct($companyRepository) {
		$this->companyRepository = $companyRepository;
		$this->formValidator = new FormValidator();
		$this->dataValidator = new DataValidator();
	}

	/**
	Returns array of all companies names.
	*/
	public function retrieveCompaniesNames() {
		return $this->companyRepository->retrieveCompaniesNames();
	}

	/**
	Makes a new Company object from $_POST method.
	*/
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

	/**
	If can process adding $company object into database does it,
	and returns true, otherwise returns false.
	*/
	public function addCompany($company) {
		$this->company = $company;
		if ($this->canProcessAddCompany()) {
			$this->processAddCompany();		
			return true;	
		} else {
			return false;
		}
	}

	/**
	Checks if form and details given are valid, and if company not exists.
	If so, return true, otherwise false.
	*/
	private function canProcessAddCompany() {
		$formValid = $this->formValidator->isFormDataValid();
		$detailsValid = $this->dataValidator->areDetailsSet($this->company);
		$companyExists = $this->companyRepository->companyExists($this->company->NIP);

		return $formValid && $detailsValid && (! $companyExists);
	}

	/**
	Inserts a new company into database using CompanyRepository.
	*/
	private function processAddCompany() {
		$this->companyRepository->insertNewCompany($this->company);
	}
}