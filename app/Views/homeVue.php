<?php echo view('header'); ?>
<a href="<?php echo base_url(); ?>connexion" class="btn btn-primary">Se connecter</a><br />
<a href="<?php echo base_url(); ?>inscription" class="btn btn-primary">S'inscrire</a><br />
<a href="<?php echo base_url(); ?>profile" class="btn btn-primary">Aller dans le profile (si tu te connecte pas ça marche pas)</a><br />
<a href="<?php echo base_url(); ?>email" class="btn btn-primary">Test d'Esteban pour l'envoie de plusieurs mail</a><br />
<a href="<?php echo base_url(); ?>deconnexion" class="btn btn-primary">Se déconnecter</a><br />
<a href="<?php echo base_url(); ?>etudiants" class="btn btn-primary">Test sur les étudiants (pour la bado)</a><br /><br />

<h1>Routes</h1>
<pre class="border border-dark p-2">
$routes->get('/', 'AuthentificationController::index');

/* Pages d'inscriptions */
$routes->get('inscription', 'AuthentificationController::inscription');
$routes->match(['get', 'post'], 'inscription/validationInscription', 'AuthentificationController::validationInscription');

/* Pages de connexions */
$routes->get('connexion', 'AuthentificationController::connexion');
$routes->match(['get', 'post'], 'connexion/validationConnexion', 'AuthentificationController::validationConnexion');

/* Pages de profil (page d'accueil après la connexion) */
$routes->get('profile', 'ProfileController::index');

/* Envoie du mail pour réinitialiser le mot de passe */
$routes->match(['get', 'post'], 'forgot_password/sendResetLink', 'AuthentificationController::sendResetLink');

/* Pages de réinitialisation du mot de passe */
$routes->get('reset_password/(:any)', 'AuthentificationController::reset/$1');
$routes->match(['get', 'post'], 'forgot_password/update_password','AuthentificationController::updatePassword');

$routes->get('/email/', 'EmailFormController::index');
$routes->post('/email/send', 'EmailFormController::sendEmailsByButton');

/* Déconnexion */
$routes->get('deconnexion', 'AuthentificationController::deconnexion');

/* Test sur les étudiants (pour la bado) */
$routes->get('/', 'Home::index');
$routes->get('/etudiants', 'EtudiantControleur::index');
</pre>
<?php echo view('footer'); ?>