<?php

namespace App\Controllers;

use App\Core\ViewResolver;
use App\Model\Dto\Contact;
//use App\Model\Service\ContactService;
//use App\Model\Repository\ContactRepositoryImpl;

class ContactController {

	private $viewResolver;
	private $contactService;

	public function __construct($viewResolver,
								$queryBuilder) {
		$this->viewResolver = $viewResolver;
		$pdo = $queryBuilder->getPDO();
		//$this->contactService = new ContactService(new ContactRepositoryImpl($pdo));
	}

	public function showAddContact() {
		return $this->viewResolver->view('add_contact');
	}

	public function addContact() {
		$contact = $this->createContact();
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
		$company->companyName = $_POST['companyName'];
		$company->address = $_POST['address'];
		$company->street = $_POST['street'];
		$company->town = $_POST['town'];
		$company->country = $_POST['country'];
		$company->NIP = $_POST['NIP'];
		$company->email = $_POST['email'];
		$company->trader = $_POST['trader'];

		return $company;
	}

}