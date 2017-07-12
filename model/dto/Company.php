<?php

namespace App\Model\Dto;

/**
Data transfer object, represents Company in database
*/
class Company {

	public $companyName;
	public $address;
	public $street;
	public $town;
	public $country;
	public $NIP;
	public $email;
	public $trader;
	public $aggreePersonalData;
	public $aggreeCommercials;

}