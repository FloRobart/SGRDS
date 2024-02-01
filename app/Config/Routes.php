<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
/* Accueil */
$routes->get('/', 'RattrapagesController::index');

/* Pages d'inscriptions */
$routes->get('inscription', 'AuthentificationController::inscription');
$routes->match(['get', 'post'], 'inscription/validationInscription', 'AuthentificationController::validationInscription');

/* Pages de connexions */
$routes->get('connexion', 'AuthentificationController::connexion');
$routes->match(['get', 'post'], 'connexion/validationConnexion', 'AuthentificationController::validationConnexion');

/* Pages de profil (page d'accueil après la connexion) */
$routes->get('profile', 'AuthentificationController::profile');

/* Envoie du mail pour réinitialiser le mot de passe */
$routes->match(['get', 'post'], 'sendResetLink', 'AuthentificationController::sendResetLink');

/* Pages de réinitialisation du mot de passe */
$routes->get('reset_password/(:any)', 'AuthentificationController::reset/$1');
$routes->match(['get', 'post'], 'update_password','AuthentificationController::updatePassword');

$routes->get('email', 'EmailFormController::index');
$routes->post('email/send', 'EmailFormController::sendEmailsByButton');

/* Déconnexion */
$routes->get('deconnexion', 'AuthentificationController::deconnexion');

/* Gestions des rattrapages */
$routes->get('rattrapages_a_faire', 'RattrapagesController::rattrapagesAFaire');
$routes->get('rattrapages_prog', 'RattrapagesController::rattrapagesProg');
$routes->get('details_rattrapage', 'RattrapagesController::detailsRattrapage');

/* Test sur les étudiants (pour la bado) */
$routes->get('etudiants', 'EtudiantControleur::index');

/*Update rattrapage*/
$routes->post('update_rattrapage', 'RattrapagesController::updateRattrapage');
$routes->match(['get', 'post'],'add_ds', 'DSController::addDs');

