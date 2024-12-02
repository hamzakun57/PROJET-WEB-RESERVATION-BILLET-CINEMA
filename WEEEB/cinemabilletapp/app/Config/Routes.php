<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/choix', 'Home::index');
$routes->get('/', 'DashboardController::index');
$routes->get('/dashboard', 'clientController::index');
$routes->get('/login', 'LoginController::index');
$routes->post('/login', 'LoginController::login');
$routes->get('/logout', 'LoginController::logout');
$routes->get('/register', 'RegisterController::index');
$routes->post('/register', 'RegisterController::store');
$routes->get('/admin-dashboard', 'AdminController::index');
$routes->get('/profile', 'profileController::index');
$routes->get('/films', 'FilmController::index');

$routes->get('/films', 'ClientController::index');

// Route pour afficher la page de réservation d'un film spécifique
$routes->get('/reserverFilm/(:num)', 'ClientController::reserverFilm/$1');

// Route pour la confirmation de la réservation
$routes->post('/confirmerReservation', 'ClientController::confirmerReservation');

// Page de confirmation de la réservation
$routes->get('/reservationConfirmation', 'ClientController::reservationConfirmation');
$routes->get('/getAvailablePlaces/(:num)', 'ClientController::getAvailablePlaces/$1'); 
