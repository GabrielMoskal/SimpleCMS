<?php

namespace App\Model\Service;

use App\Model\Service\Validator\{DataValidator};
use App\Model\Dto\Question;

class QuestionService {

	private $questionRepository;
	private $question = NULL;
	private $dataValidator;

	/**
	Takes QuestionRepository instance as argument, and creates 
	and DataValidator to validate given data.
	*/
	public function __construct($questionRepository) {
		$this->questionRepository = $questionRepository;
		$this->dataValidator = new DataValidator();
	}

	/**
	Makes a new Question object from $_POST method.
	*/
	public function makeQuestion() {
		$question = new Question();
		$question->questionValue = strip_tags($_POST['questionValue']);
		$question->category = strip_tags($_POST['category']);
		$question->answerType = strip_tags($_POST['answerType']);
		$question->answer1 = strip_tags($_POST['answer1']);
		$question->answer2 = strip_tags($_POST['answer2']);
		$question->answer3 = strip_tags($_POST['answer3']);
		$question->answer4 = strip_tags($_POST['answer4']);

		return $question;
	}

	/**
	If can process adding $question object into database does it,
	and returns true, otherwise returns false.
	*/
	public function addQuestion($question) {
		$this->question = $question;

		if ($this->canProcessAddQuestion()) {
			$this->processAddQuestion();		
			return true;	
		} else {
			return false;
		}
	}

	/**
	Checks if details given are valid, and if question not exists.
	If so, return true, otherwise false.
	*/
	private function canProcessAddQuestion() {
		$detailsValid = $this->dataValidator->areDetailsSet($this->question);
		$questionExists = $this->questionRepository->questionExists($this->question->questionValue);

		return $detailsValid && (! $questionExists);
	}

	/**
	Inserts a new question into database using QuestionRepository.
	*/
	private function processAddQuestion() {
		$this->questionRepository->insertNewQuestion($this->question);
	}

}