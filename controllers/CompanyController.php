<?php

namespace App\Controllers;

use App\Core\ViewResolver;
use App\Model\Service\CompanyService;
use App\Model\Repository\CompanyRepositoryImpl;

class CompanyController {

    /**
     *   @var ViewResolver
     */
	private $viewResolver;
    /**
     *   @var CompanyService
     */
	private $companyService;

	/**
	 takes instance of ViewResolver and QueryBuilder 
	*/
	public function __construct($viewResolver,
								$queryBuilder) {
		$this->viewResolver = $viewResolver;
		$this->companyService = new CompanyService(new CompanyRepositoryImpl($queryBuilder));
	}

	/**
	 redirects to add_company view
	*/
	public function showCompany() {
		return $this->redirectToAddCompanyView();
	}

	private function redirectToAddCompanyView() {
		return $this->viewResolver->view('add_company');
	}

	/**
	 Attempts to insert Company into database.
	 Retrieves Company object from $_POST method.
	 Returns user to main page on success, on failure to the add_company view page
	*/
	public function addCompany() {
		$company = $this->companyService->makeCompany();

		if ($this->companyService->addCompany($company)) {
			return $this->viewResolver->view('index');
		} 
		else {
			return $this->redirectToAddCompanyView();
		};
	}

	public function showCompanies() {
		$companies = $this->companyService->retrieveAllCompanies();
		return $this->viewResolver->view('show_companies', compact('companies'));
	}

	public function processActionOnCompanies() {
		$action = $_POST['chosenAction'];
		if ($action == 'deleteAll') {
			return $this->deleteAllCompanies();
		} else if ($action = 'sort') {
			return $this->sortCompanies();
		}
	}

	private function deleteAllCompanies() {
		$this->companyService->deleteAllCompanies();
		return $this->viewResolver->view('show_companies', compact('companies'));
	}

	private function sortCompanies() {
		
		$sortBy = $this->makeSortingRestrictions();

		$result = $this->companyService->sortCompanies($sortBy);

		//var_dump($result);

	}

	private function makeSortingRestrictions() {
		$sortBy = [
			'companyName' => $_POST['companyName'],
			// 'phoneNumber' => $_POST['phoneNumber'],
			//'dateFrom' => $_POST['dateFrom'],
			//'dateTo' => $_POST['dateTo'],
			'trader' => $_POST['trader']
		];

		$sortBy = array_filter(
			$sortBy, 
			function($data) {
				if ($data !== '') {
					return true;
				} 
				return false;
		});
		return $sortBy;
	}
}