<?php

namespace App\Controllers;

use App\Core\ViewResolver;

class CompanyController {

	private $viewResolver;
	private $registrationService;

	public function __construct($viewResolver,
								$queryBuilder) {
		$this->viewResolver = $viewResolver;
		$pdo = $queryBuilder->getPDO();
		//$this->registrationService = new RegistrationService(new UsersRepositoryImpl($pdo));
	}

	public function showCompany() {
		return $this->viewResolver->view('add_company');
	}

	public function addCompany() {
		$company = $this->createCompany();

		if ($this->registrationService->register($user)) {
			return $this->viewResolver->view('index');
		} else {
			return $this->viewResolver->view('page_signup', compact('user'));
		};
	}

	private function createCompany() {
		
	}
}