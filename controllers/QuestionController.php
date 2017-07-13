<?php

namespace App\Controllers;

use App\Core\ViewResolver;
use App\Model\Service\QuestionService;
use App\Model\Dto\Question;
use App\Model\Repository\QuestionRepositoryImpl;

class QuestionController {

	private $viewResolver;
	private $questionService;

	/* takes instance of ViewResolver and QueryBuilder */
	public function __construct($viewResolver,
								$queryBuilder) {
		$this->viewResolver = $viewResolver;
		$this->questionService = new QuestionService(new QuestionRepositoryImpl($queryBuilder));
	}

	public function showAddQuestion() {
		return $this->viewResolver->view('add_question');
	}

	public function addQuestion() {
		$question = $this->questionService->makeQuestion();

		if ($this->questionService->addQuestion($question)) {
			return $this->viewResolver->view('index');
		} 
		else {
			return $this->viewResolver->view('add_question');
		};
	}

}