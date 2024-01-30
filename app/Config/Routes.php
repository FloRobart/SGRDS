<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'EmailFormController::index');
$routes->post('/send', 'EmailFormController::sendEmailsByButton');
    