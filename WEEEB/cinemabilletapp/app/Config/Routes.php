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

// Routes pour gérer les films
$routes->get('/films', 'FilmController::index');  // Liste des films

// Formulaire d'ajout de film
$routes->get('/films/Ajouter', 'FilmController::ajouter');
$routes->post('/films/Ajouter', 'FilmController::ajouterFilm');  // Route pour le POST de l'ajout de film

// Afficher un film spécifique
$routes->get('/films/details/(:num)', 'FilmController::afficher/$1');

// Modifier un film
$routes->get('/films/Modifier/(:num)', 'FilmController::modifierFilm/$1');  // Formulaire de modification
$routes->post('/films/Modifier/(:num)', 'FilmController::updateFilm/$1');   // Traitement de la modification

// Supprimer un film
$routes->get('/films/Supprimer/(:num)', 'FilmController::supprimerFilm/$1'); // Suppression du film

$routes->get('/seances', 'SeanceController::index');            // Afficher la liste des séances
$routes->get('/seances/ajouter', 'SeanceController::ajouter');   // Formulaire pour ajouter une séance
$routes->post('/seances/ajouter', 'SeanceController::store');    // Ajouter une séance
$routes->get('/seances/supprimer/(:num)', 'SeanceController::supprimer/$1');  // Supprimer une séance

$routes->get('/ticket', 'ticketController::index');
$routes->post('/ticket/search', 'ticketController::search');

