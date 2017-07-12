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
		$contact->picture = $this->makePicture();

		return $contact;
	}

	private function makePicture() {
		$imgFileName = $_FILES['userImage']['name'];
		$tmpDir = $_FILES['userImage']['tmp_name'];
		$imgSize = $_FILES['userImage']['size'];

		if (empty($imgFileName)) {
			return 	NULL;
		}
		$uploadDir = 'user_images/'; // upload directory
		$imgExtension = $this->retrieveImageExtension($imgFileName);

		if ($this->isValidExtension($imgExtension) &&
			$this->isValidImageSize($imgSize)) {

			$imgName = $this->makePictureName($imgExtension);
			move_uploaded_file($tmpDir, $uploadDir . $imgName);
			return $imgName;
		};
	}

	private function retrieveImageExtension($imgFileName) {
		return strtolower(pathinfo($imgFileName, PATHINFO_EXTENSION));
	}

	private function isValidExtension($imgExtension) {
		$validExtensions = array('jpeg', 'jpg', 'png', 'gif');
		return in_array($imgExtension, $validExtensions);
	}

	private function isValidImageSize($imgSize) {
		// Check file size '5MB'
		return $imgSize < 5000000;
	}

	private function makePictureName($imgExtension) {
		return rand(1000,1000000) . "." . $imgExtension;
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