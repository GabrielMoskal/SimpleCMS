<?php

namespace App\Core;

class ViewResolver {

	private $prefix;
	private $postfix;

	public function  __construct(string $prefix, string $postfix) {
		$this->prefix = $prefix;
		$this->postfix = $postfix;
	}

	// to samo co funkcja bindujaca view() z tutoriala
	public function view(string $viewName, $data = []) {
		extract($data);
		return require $this->prefix . $viewName . $this->postfix;
	}

	// to samo co funkcja z tutoriala 
	public function redirect($path) {
		header("Location: /{$path}");
	}
}