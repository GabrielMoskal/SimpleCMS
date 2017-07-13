<?php

namespace App\Controllers;


class PagesController {

	private $viewResolver;

	public function __construct($viewResolver) {
		$this->viewResolver = $viewResolver;
	}

	public function home() {
		return $this->viewResolver->view('index');
	}

	public function about() {
		return $this->viewResolver->view('about');
	}

	public function contact() {
		return $this->viewResolver->view('contact');
	}

	public function pageNotFound() {
		return $this->viewResolver->view('page_404');
	}
}