<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

/* Pages d'inscriptions */
$routes->get('/', 'AuthentificationController::inscription');
$routes->get('inscription', 'AuthentificationController::inscription');
$routes->match(['get', 'post'], 'inscription/validationInscription', 'AuthentificationController::validationInscription');

/* Pages de connexions */
$routes->match(['get', 'post'], 'connexion/validationConnexion', 'AuthentificationController::validationConnexion');
$routes->get('connexion', 'AuthentificationController::connexion');

/* Pages de profil (page d'accueil après la connexion) */
$routes->get('profile', 'ProfileController::index',['filter' => 'authGuard']);

/* Envoie du mail pour réinitialiser le mot de passe */
$routes->match(['get', 'post'], 'forgot_password/sendResetLink', 'AuthentificationController::sendResetLink');

/* Pages de réinitialisation du mot de passe */
$routes->get('reset_password/(:any)', 'AuthentificationController::reset/$1');
$routes->match(['get', 'post'], 'updatePassword','AuthentificationController::updatePassword');

$routes->get('/email/', 'EmailFormController::index');
$routes->post('/email/send', 'EmailFormController::sendEmailsByButton');
    

$routes->get('/', 'Home::index');
$routes->get('/etudiants', 'EtudiantControleur::index');
