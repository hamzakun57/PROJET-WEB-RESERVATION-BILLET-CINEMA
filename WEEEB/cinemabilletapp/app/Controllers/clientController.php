<?php

namespace App\Controllers;

use App\Models\PlaceReserverModel; // Ajouter cette ligne
use App\Models\FilmModel;
use App\Models\SeanceModel;
use App\Models\TicketModel;
use Config\Services;

class clientController extends BaseController
{
    // Afficher la page d'accueil avec les films
    public function index()
    {
        $session = session();
        $userEmail = $session->get('email');
    
        // Vérifier si l'utilisateur est connecté
        if (!$session->get('logged_in')) {
            return redirect()->to('/login');
        }
    
        // Récupérer les informations de l'utilisateur depuis la session
        $data['user'] = [
            'username' => $session->get('username'),
            'email' => $userEmail // Passer l'email à la vue
        ];
    
        // Récupérer les films depuis le modèle
        $filmModel = new FilmModel();
        $films = $filmModel->findAll(); // Récupérer tous les films
    
        // Ajouter les films aux données de la vue
        $data['films'] = $films;
    
        // Charger la vue avec l'email inclus
        return view('client_dashboard', $data);
    }

    // Afficher la page de réservation pour un film spécifique
    public function reserverFilm($id_film)
    {
        $filmModel = new FilmModel();
        $seanceModel = new SeanceModel();

        // Récupérer les informations du film
        $film = $filmModel->find($id_film);

        // Récupérer la date et l'heure actuelles
        $currentDateTime = date('Y-m-d H:i:s');

        // Récupérer les séances disponibles pour ce film qui sont après maintenant
        $seances = $seanceModel->where('id_film', $id_film)
                               ->where('date_heure >', $currentDateTime) // Filtre sur la date
                               ->findAll();

        return view('reservation_page', [
            'film' => $film,
            'seances' => $seances,
            'nom_film' => $film['nom_film'] // Ajouter le nom du film
        ]);
    }

    // Confirmer la réservation
    public function confirmerReservation()
    {
        $request = \Config\Services::request();
        $seanceModel = new SeanceModel();
        $ticketModel = new TicketModel();
        $placeReserverModel = new PlaceReserverModel(); // Ajouter ceci
    
        // Récupérer les données envoyées par le formulaire
        $seance_id = $request->getPost('seance');
        $place_numero = $request->getPost('place');
        $nom_film = $request->getPost('nom_film'); // Récupérer le nom du film
        
        // Récupérer les informations de la séance
        $seance = $seanceModel->find($seance_id);
    
        // Vérifier si la séance existe et si 'places_disponibles' est présent
        if (!$seance || !isset($seance['places_disponibles'])) {
            return redirect()->back()->with('error', 'Séance non trouvée ou données invalides.');
        }
    
        // Vérifier si la place est déjà réservée pour cette séance
        $existingReservation = $placeReserverModel->where('id_seance', $seance_id)
                                                  ->where('place_numero', $place_numero)
                                                  ->first();
    
        if ($existingReservation) {
            return redirect()->back()->with('error', 'Cette place est déjà réservée. Veuillez choisir une autre place.');
        }
    
        // Réduire le nombre de places disponibles pour la séance
        $places_disponibles = $seance['places_disponibles'] - 1;
        $seanceModel->set('places_disponibles', (int)$places_disponibles)
                    ->where('id_seance', $seance_id)
                    ->update();

        // Générer un code unique pour la réservation
        $code_reservation = uniqid();
    
        // Créer un ticket de réservation
        $ticketModel->save([
            'id_seance' => $seance_id,
            'nom_film' => $nom_film,
            'place_numero' => $place_numero,
            'code_reservation' => $code_reservation,
        ]);
    
        // Enregistrer la place réservée dans `place_reserver`
        $placeReserverModel->save([
            'id_seance' => $seance_id,
            'place_numero' => $place_numero,
            'reserved_at' => date('Y-m-d H:i:s')
        ]);
    
        // Récupérer l'email de l'utilisateur depuis la session
        $session = session();
        $userEmail = $session->get('email');
        if (empty($userEmail)) {
            return redirect()->back()->with('error', 'Email non trouvé dans la session.');
        }
  
        // Préparer les détails du ticket pour l'envoyer par email
        $ticketDetails = [
            'nom_film' => $nom_film,
            'date_heure' => $seance['date_heure'],
            'place_numero' => $place_numero,
            'code_reservation' => $code_reservation
        ];
  
        // Envoyer l'email
        $emailSent = $this->envoyerTicketEmail($userEmail, $ticketDetails);
        if ($emailSent) {
            return redirect()->to('//dashboard')->with('success', 'Réservation confirmée. Un e-mail vous a été envoyé.');
        } else {
            return redirect()->back()->with('error', 'Réservation confirmée, mais l\'e-mail n\'a pas pu être envoyé.');
        }
    }

    public function getAvailablePlaces($id_seance)
    {
        $placeReserverModel = new PlaceReserverModel();
        $allPlaces = range(1, 50); // Total des places disponibles
    
        // Récupérer les places réservées pour cette séance
        $reservedPlaces = $placeReserverModel->where('id_seance', $id_seance)
                                             ->findColumn('place_numero');
        
        // Si aucune place n'est réservée, retourner toutes les places disponibles
        $availablePlaces = is_null($reservedPlaces) ? $allPlaces : array_diff($allPlaces, $reservedPlaces);
    
        return $this->response->setJSON(array_values($availablePlaces));
    }

    public function reservationConfirmation()
    {
        return view('reservation_confirmation');
    }

    public function envoyerTicketEmail($userEmail, $ticketDetails)
    {
        $email = \Config\Services::email();
        $email->setFrom('uizcinema@gmail.com', 'Cinema Ticket');
        $email->setTo($userEmail);
        $email->setSubject('Votre ticket de cinéma');
        $email->setMessage("
            <h2>Confirmation de réservation</h2>
            <p>Merci d'avoir réservé pour le film <strong>{$ticketDetails['nom_film']}</strong>.</p>
            <p><strong>Séance :</strong> {$ticketDetails['date_heure']}</p>
            <p><strong>Place :</strong> {$ticketDetails['place_numero']}</p>
            <p><strong>Code de réservation :</strong> {$ticketDetails['code_reservation']}</p>
        ");
    
        return $email->send();
    }
}
