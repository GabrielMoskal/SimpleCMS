<?php

namespace App\Controllers;

use App\Core\ViewResolver;

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
}