<?php

namespace App\Model\Dto;

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

	public function setCompanyName($companyName) {
		$this->companyName = $companyName;
	}

	public function getCompanyName() {
		return $this->companyName;
	}

	public function setAddress($address) {
		$this->address = $address;
	}

	public function getAddress() {
		return $this->address;
	}

	public function setStreet($street) {
		$this->street = $street;
	}

	public function getStreet() {
		return $this->street;
	}

	public function setTown($town) {
		$this->town = $town;
	}

	public function getTown() {
		return $this->town;
	}
	
	public function setCountry($country) {
		$this->country = $country;
	}

	public function getCountry() {
		return $this->country;
	}
	public function setNIP($NIP) {
		$this->NIP = $NIP;
	}

	public function getNIP() {
		return $this->NIP;
	}

	public function setEmail($email) {
		$this->email = $email;
	}

	public function getEmail() {
		return $this->email;
	}

	public function setTrader($trader) {
		$this->trader = $trader;
	}

	public function getTrader() {
		return $this->trader;
	}

	public function setAggreePersonalData($aggreePersonalData) {
		$this->aggreePersonalData = $aggreePersonalData;
	}

	public function getAggreePersonalData() {
		return $this->aggreePersonalData;
	}
	
	public function setAggreeCommercials($aggreeCommercials) {
		$this->aggreeCommercials = $aggreeCommercials;
	}
	public function getAggreeCommercials() {
		return $this->aggreeCommercials;
	}

}