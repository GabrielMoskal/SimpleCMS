<?php

namespace App\Model\Repository;

interface QuestionRepository {

	public function questionExists(string $questionValue);

	public function insertNewQuestion($question);

}