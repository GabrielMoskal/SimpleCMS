<?php

namespace App\Model\Service;

use App\Model\Dto\Contact;

class ContactService {

	private $contactRepository;
	private $contact = NULL;
	private $contactValidator;

	public function __construct($contactRepository) {
		$this->contactRepository = $contactRepository;
		$this->contactValidator = new ContactValidator();
	}

	public function makeContact() {
		$contact = new Contact();
		$contact->companyName = $_POST['companyName'];
		$contact->clientName = $_POST['clientName'];
		$contact->job = $_POST['job'];
		$contact->phoneNumber = $_POST['phoneNumber'];
		$contact->email = $_POST['email'];
		$contact->aggreePersonalData = $_POST['aggreePersonalData'];
		$contact->aggreeCommercials = $_POST['aggreeCommercials'];
		$contact->trader = $_POST['trader'];

		return $contact;
	}

	public function addContact($contact) {
		$this->contact = $contact;

		if ($this->canProcessAddContact()) {
			$this->processAddContact();		
			return true;	
		} else {
			return false;
		}
	}

	private function canProcessAddContact() {
		$contractsAgreed = $this->areContractsAgreed();
		$detailsValid = $this->contactValidator->areDetailsValid($this->contact);
		$contactExists = $this->contactRepository->contactExists($this->contact);

		return $contractsAgreed && $detailsValid && (! $contactExists);
	}

	private function areContractsAgreed() {
		if (($_POST['aggreePersonalData'] === 'true') &&
			($_POST['aggreeCommercials'] === 'true')) {
			return true;
		}
		return false;
	}

	private function processAddContact() {
		$this->contactRepository->insertNewContact($this->contact);
	}

}