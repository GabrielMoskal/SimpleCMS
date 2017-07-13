<?php

// autoload_classmap.php @generated by Composer

$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname($vendorDir);

return array(
    'App\\Controllers\\CompanyController' => $baseDir . '/controllers/CompanyController.php',
    'App\\Controllers\\ContactController' => $baseDir . '/controllers/ContactController.php',
    'App\\Controllers\\LoginController' => $baseDir . '/controllers/LoginController.php',
    'App\\Controllers\\PagesController' => $baseDir . '/controllers/PagesController.php',
    'App\\Controllers\\RegistrationController' => $baseDir . '/controllers/RegistrationController.php',
    'App\\Core\\App' => $baseDir . '/core/App.php',
    'App\\Core\\AuthorizationFilter' => $baseDir . '/core/AuthorizationFilter.php',
    'App\\Core\\Request' => $baseDir . '/core/Request.php',
    'App\\Core\\Router' => $baseDir . '/core/Router.php',
    'App\\Core\\ViewResolver' => $baseDir . '/core/ViewResolver.php',
    'App\\Model\\Dto\\Company' => $baseDir . '/model/dto/Company.php',
    'App\\Model\\Dto\\Contact' => $baseDir . '/model/dto/Contact.php',
    'App\\Model\\Dto\\User' => $baseDir . '/model/dto/User.php',
    'App\\Model\\Repository\\CompanyRepository' => $baseDir . '/model/repository/CompanyRepository.php',
    'App\\Model\\Repository\\CompanyRepositoryImpl' => $baseDir . '/model/repository/CompanyRepositoryImpl.php',
    'App\\Model\\Repository\\ContactRepository' => $baseDir . '/model/repository/ContactRepository.php',
    'App\\Model\\Repository\\ContactRepositoryImpl' => $baseDir . '/model/repository/ContactRepositoryImpl.php',
    'App\\Model\\Repository\\UsersRepository' => $baseDir . '/model/repository/UsersRepository.php',
    'App\\Model\\Repository\\UsersRepositoryImpl' => $baseDir . '/model/repository/UsersRepositoryImpl.php',
    'App\\Model\\Service\\CompanyService' => $baseDir . '/model/service/CompanyService.php',
    'App\\Model\\Service\\ContactService' => $baseDir . '/model/service/ContactService.php',
    'App\\Model\\Service\\LoginService' => $baseDir . '/model/service/LoginService.php',
    'App\\Model\\Service\\RegistrationService' => $baseDir . '/model/service/RegistrationService.php',
    'App\\Model\\Service\\Validator\\DataValidator' => $baseDir . '/model/service/validator/DataValidator.php',
    'App\\Model\\Service\\Validator\\FormValidator' => $baseDir . '/model/service/validator/FormValidator.php',
    'App\\Model\\Service\\Validator\\UserValidator' => $baseDir . '/model/service/validator/UserValidator.php',
    'ComposerAutoloaderInite84b1596007af5ceb56786cf55a3e8a9' => $vendorDir . '/composer/autoload_real.php',
    'Composer\\Autoload\\ClassLoader' => $vendorDir . '/composer/ClassLoader.php',
    'Composer\\Autoload\\ComposerStaticInite84b1596007af5ceb56786cf55a3e8a9' => $vendorDir . '/composer/autoload_static.php',
    'Connection' => $baseDir . '/core/database/Connection.php',
    'QueryBuilder' => $baseDir . '/core/database/QueryBuilder.php',
);
