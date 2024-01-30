<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//$routes->get('/', 'Home::index');
$routes->get('/', 'AuthentificationController::inscription');
$routes->get('inscription', 'AuthentificationController::inscription');
$routes->match(['get', 'post'], 'inscription/validationInscription', 'AuthentificationController::validationInscription');
$routes->match(['get', 'post'], 'connexion/validationConnexion', 'AuthentificationController::validationConnexion');
$routes->get('connexion', 'AuthentificationController::connexion');
$routes->get('profile', 'ProfileController::index',['filter' => 'authGuard']);