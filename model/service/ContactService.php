<?php

namespace App\Model\Service;

use App\Model\Service\Validator\{DataValidator, FormValidator};
use App\Model\Dto\Contact;

class ContactService {

	private $contactRepository;
	private $contact = NULL;
	private $formValidator;
	private $dataValidator;

	/**
	Takes ContactRepository instance as argument, and creates
	FormValidator and DataValidator to validate given data.
	*/
	public function __construct($contactRepository) {
		$this->contactRepository = $contactRepository;
		$this->formValidator = new FormValidator();
		$this->dataValidator = new DataValidator();
	}

	/**
	Makes a new Contact object from $_POST method.
	*/
	public function makeContact() {
		$contact = new Contact();
		$contact->companyName = strip_tags($_POST['companyName']);
		$contact->clientName = strip_tags($_POST['clientName']);
		$contact->job = strip_tags($_POST['job']);
		$contact->phoneNumber = strip_tags($_POST['phoneNumber']);
		$contact->email = strip_tags($_POST['email']);
		$contact->aggreePersonalData = strip_tags($_POST['aggreePersonalData']);
		$contact->aggreeCommercials = strip_tags($_POST['aggreeCommercials']);
		$contact->trader = strip_tags($_POST['trader']);

		// Assigns submitted picture name to a Contact object.
		$contact->picture = $this->makePicture();

		return $contact;
	}

	/**
	Retrieves file informations from $_FILES['userImage'] data.
	Puts summited picture into 'user_images' directory.
	Returns added image name on success, otherwise returns NULL.
	Name is generated number from range between 1000 and 1000000
	and original picture extension.
	*/
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

	/**
	If can process adding $contact object into database does it,
	and returns true, otherwise returns false.
	*/
	public function addContact($contact) {
		$this->contact = $contact;

		if ($this->canProcessAddContact()) {
			$this->processAddContact();		
			return true;	
		} else {
			return false;
		}
	}

	/**
	Checks if form and details given are valid, and if company not exists.
	If so, return true, otherwise false.
	*/
	private function canProcessAddContact() {
		$formValid = $this->formValidator->isFormDataValid();
		$detailsValid = $this->dataValidator->areDetailsSet($this->contact);
		$contactExists = $this->contactRepository->contactExists($this->contact);

		return $formValid && $detailsValid && (! $contactExists);
	}

	/**
	Inserts a new company into database using CompanyRepository.
	*/
	private function processAddContact() {
		$this->contactRepository->insertNewContact($this->contact);
	}

}