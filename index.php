<?php

require 'vendor/autoload.php';

require 'core/bootstrap.php';

use App\Core\{Router, Request};

Router::load('routes.php')
	->direct(Request::uri(), Request::method());



/*
use App\Repository\UsersRepositoryImpl;
//use App\Core\App;
use App\Dto\User;

$pdo = App::get('database')->getPDO();


$repository = new UsersRepositoryImpl($pdo);
echo 'here  ';

$user = new User('example@email.com', 'password', 'example name');

$repository->insertNewUser($user);
*/