<?php

namespace App\Controllers;

use App\Core\ViewResolver;
use App\Model\Dto\Contact;
use App\Model\Service\ContactService;
use App\Model\Service\CompanyService;
use App\Model\Repository\ContactRepositoryImpl;
use App\Model\Repository\CompanyRepositoryImpl;

class ContactController {

	private $viewResolver;
	private $contactService;
	private $companyService;

	private $testPDO;

	public function __construct($viewResolver,
								$queryBuilder) {
		$this->viewResolver = $viewResolver;
		$this->contactService = new ContactService(new ContactRepositoryImpl($queryBuilder));
		$this->companyService = new CompanyService(new CompanyRepositoryImpl($queryBuilder));

		$this->testPDO = $queryBuilder->getPDO();
	}

	public function showAddContact() {
		return $this->redirectToAddContactView();
	}

	private function redirectToAddContactView() {
		$companiesNames = $this->companyService->retrieveCompaniesNames();	
		return $this->viewResolver->view('add_contact', compact('companiesNames'));
	}

	public function addContact() {
		$contact = $this->contactService->makeContact();
		if (isset($_POST['cancel'])) {
			return $this->redirectToAddContactView();
		} 
		else if ($this->contactService->addContact($contact)) {
			return $this->viewResolver->view('index');
		} 
		else {
			return $this->redirectToAddContactView();
		};
	}

	private function createContactTest() {
		$contact = new Contact();
		$contact->companyName = 'companyName';
		$contact->clientName = 'clientName';
		$contact->job = 'job';
		$contact->phoneNumber = 'phoneNumber';
		$contact->email = 'email';
		$contact->trader = 'trader';
		$contact->aggreePersonalData = $_POST['aggreePersonalData'];
		$contact->aggreeCommercials = $_POST['aggreeCommercials'];
		
		return $contact;
	}
}