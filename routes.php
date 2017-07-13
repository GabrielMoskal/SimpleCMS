<?php 

$router->get('', 'PagesController@home');
$router->get('about', 'PagesController@about');
$router->get('contact', 'PagesController@contact');
$router->post('names', 'controllers/add-name.php');

// CompanyController
$router->get('addCompany', 'CompanyController@showCompany');
$router->post('addCompany', 'CompanyController@addCompany');

// LoginController
$router->get('login', 'LoginController@showLogin');
$router->post('login', 'LoginController@processLogin');
$router->get('forgotPassword', 'LoginController@showForgotPassword');
$router->post('forgotPassword', 'LoginController@processForgotPassword');
$router->get('logout', 'LoginController@logout');

// RegistrationController
$router->get('register', 'RegistrationController@showRegistration');
$router->post('register', 'RegistrationController@processRegistration');

// ContactController
$router->get('addContact', 'ContactController@showAddContact');
$router->post('addContact', 'ContactController@addContact');

// PageNotFound
$router->get('pageNotFound', 'PagesController@pageNotFound');

// QuestionController
$router->get('addQuestion', 'QuestionController@showAddQuestion');
$router->post('addQuestion', 'QuestionController@addQuestion');