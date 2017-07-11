<?php

namespace App\Model\Repository;

interface ContactRepository {

	public function contactExists($contact);

	public function insertNewContact($contact);

}