<?php

namespace App\Model\Service;

class ContactValidator {

	public function areDetailsValid($contact) {
		return $this->areDetailsSet($contact);
	}

	private function areDetailsSet($contact) {
		if ($this->isStringEmpty($contact->companyName) ||
			$this->isStringEmpty($contact->clientName) ||
			$this->isStringEmpty($contact->job) ||
			$this->isStringEmpty($contact->phoneNumber) ||
			$this->isStringEmpty($contact->email) ||
			$this->isStringEmpty($contact->trader)) {

			return false;
		}
		return true;
	}

	private function isStringEmpty(string $data) {
		return $data === '';
	}
}	