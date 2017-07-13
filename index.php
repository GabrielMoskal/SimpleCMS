<?php

require 'vendor/autoload.php';

require 'core/bootstrap.php';

use App\Core\{Router, Request, AuthorizationFilter};

$authorizationFilter = new AuthorizationFilter();

$authorizationFilter->addAuthorization('addCompany');
$authorizationFilter->addAuthorization('addContact');

$router = Router::load('routes.php');
$router->setFilter($authorizationFilter);
$router->direct(Request::uri(), Request::method());
