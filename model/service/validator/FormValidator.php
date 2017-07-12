<?php

namespace App\Model\Service\Validator;

class FormValidator {

	/**
	Returns true if submitted form sends parameter with 'accept' name
	and if contracts checkboxes are accepted, otherwise returns false.
	*/
	public function isFormDataValid() {
		return $this->isFormAccepted() && 
			   $this->areContractsAgreed();
	}

	private function isFormAccepted() {
		return isset($_POST['accept']);
	}

	private function areContractsAgreed() {
		if (($_POST['aggreePersonalData'] === 'true') &&
			($_POST['aggreeCommercials'] === 'true')) {
			return true;
		}
		return false;
	}
}