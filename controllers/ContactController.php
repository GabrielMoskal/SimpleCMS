<?php

namespace App\Controllers;

use App\Core\ViewResolver;
use App\Model\Dto\Contact;
use App\Model\Service\ContactService;
use App\Model\Service\CompanyService;
use App\Model\Repository\ContactRepositoryImpl;
use App\Model\Repository\CompanyRepositoryImpl;

class ContactController {

	private $viewResolver;
	private $contactService;
	private $companyService;

	private $testPDO;

	public function __construct($viewResolver,
								$queryBuilder) {
		$this->viewResolver = $viewResolver;
		$this->contactService = new ContactService(new ContactRepositoryImpl($queryBuilder));
		$this->companyService = new CompanyService(new CompanyRepositoryImpl($queryBuilder));

		$this->testPDO = $queryBuilder->getPDO();
	}

	public function showAddContact() {
		return $this->redirectToAddContactView();
	}

	private function redirectToAddContactView() {
		$companiesNames = $this->companyService->retrieveCompaniesNames();	
		return $this->viewResolver->view('add_contact', compact('companiesNames'));
	}

	public function addContact() {
		$client = $this->contactService->makeContact();
		if (isset($_POST['cancel'])) {
			return $this->redirectToAddContactView();
		} 
		else if ($this->contactService->addContact($client)) {
			return $this->viewResolver->view('index');
		} 
		else {
			return $this->redirectToAddContactView();
		};
	}

	private function createClientTest() {
		$contact = new Contact();
		$contact->companyName = 'companyName';
		$contact->clientName = 'clientName';
		$contact->job = 'job';
		$contact->phoneNumber = 'phoneNumber';
		$contact->email = 'email';
		$contact->trader = 'trader';
		$contact->aggreePersonalData = $_POST['aggreePersonalData'];
		$contact->aggreeCommercials = $_POST['aggreeCommercials'];
		
		return $contact;
	}

	public function testDB() {
		if(isset($_POST['btnsave'])) {
			$username = $_POST['user_name'];// user name
			$userjob = $_POST['user_job'];// user email
			  
			$imgFile = $_FILES['user_image']['name'];
			$tmp_dir = $_FILES['user_image']['tmp_name'];
			$imgSize = $_FILES['user_image']['size'];
  
  
			if(empty($username)) {
				$errMSG = "Please Enter Username.";
			}
			else if(empty($userjob)){
				$errMSG = "Please Enter Your Job Work.";
			}
			else if(empty($imgFile)){
				$errMSG = "Please Select Image File.";
			}
			else
			{
				$upload_dir = 'user_images/'; // upload directory
				 
				$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
				  
				   // valid image extensions
				$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
				  
				   // rename uploading image
				$userpic = rand(1000,1000000).".".$imgExt;
				    
				   // allow valid image file formats
				if(in_array($imgExt, $valid_extensions)){   
				    // Check file size '5MB'
					if($imgSize < 5000000)    {
						move_uploaded_file($tmp_dir,$upload_dir.$userpic);
					}
					else{
						$errMSG = "Sorry, your file is too large.";
					}
				}
				else {
					$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";  
				}
			}
  
  			$DB_con = $this->testPDO;
		  // if no error occured, continue ....
			if(!isset($errMSG))
			{
				$stmt = $DB_con->prepare('INSERT INTO tbl_users(userName,userProfession,userPic) VALUES(:uname, :ujob, :upic)');
				$stmt->bindParam(':uname',$username);
				$stmt->bindParam(':ujob',$userjob);
				$stmt->bindParam(':upic',$userpic);
				   
				if($stmt->execute())
				{
					$successMSG = "new record succesfully inserted ...";
					header("refresh:5;index.php"); // redirects image view page after 5 seconds.
				}
				else
				{
					$errMSG = "error while inserting....";
				}
			}
		}
		return $this->viewResolver->view('index');
	}
}