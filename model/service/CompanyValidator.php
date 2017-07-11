<?php

namespace App\Model\Service;

class CompanyValidator {

	public function areDetailsValid($company) {
		return $this->areDetailsSet($company);
	}

	private function areDetailsSet($company) {
		if ($this->isStringEmpty($company->companyName) ||
			$this->isStringEmpty($company->address) ||
			$this->isStringEmpty($company->street) ||
			$this->isStringEmpty($company->town) ||
			$this->isStringEmpty($company->country) ||
			$this->isStringEmpty($company->NIP) ||
			$this->isStringEmpty($company->email)) {

			return false;
		}
		return true;
	}

	private function isStringEmpty(string $data) {
		return $data === '';
	}
}