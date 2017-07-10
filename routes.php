<?php 

$router->get('', 'PagesController@home');
$router->get('about', 'PagesController@about');
$router->get('contact', 'PagesController@contact');
$router->post('names', 'controllers/add-name.php');
$router->get('users', 'UsersController@index');
$router->post('users', 'UsersController@store');
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