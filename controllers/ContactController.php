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

	/* takes instance of ViewResolver and QueryBuilder */
	public function __construct($viewResolver,
								$queryBuilder) {
		$this->viewResolver = $viewResolver;
		$this->contactService = new ContactService(new ContactRepositoryImpl($queryBuilder));
		$this->companyService = new CompanyService(new CompanyRepositoryImpl($queryBuilder));
	}

	/**
	 Redirects to add_contact view.
	 View retrieves array with names of all registered companies in database.
	*/
	public function showAddContact() {
		return $this->redirectToAddContactView();
	}

	private function redirectToAddContactView() {
		$companiesNames = $this->companyService->retrieveCompaniesNames();	
		return $this->viewResolver->view('add_contact', compact('companiesNames'));
	}

	/**
	 Attempts to insert Contact into database.
	 Retrieves Contact object from $_POST method.
	 Returns user to main page on success, on failure to the add_contact view page
	*/
	public function addContact() {
		$contact = $this->contactService->makeContact();

		if ($this->contactService->addContact($contact)) {
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