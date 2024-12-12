<?php

namespace App\Controllers;

use App\Models\TicketModel;
use App\Models\SeanceModel;  // Importer le modèle SeanceModel

class ticketController extends BaseController
{
    // Méthode pour afficher le formulaire de recherche
    public function index()
    {
        return view('ticket');
    }

    // Méthode pour traiter la recherche du code de réservation
    public function search()
    {
        $ticketModel = new TicketModel();
        $seanceModel = new SeanceModel();

        // Récupérer le code de réservation du formulaire
        $code_reservation = $this->request->getPost('code_reservation');

        // Si un code de réservation est soumis
        if ($code_reservation) {
            // Rechercher le ticket par code_reservation
            $ticket = $ticketModel->where('code_reservation', $code_reservation)->first();

            // Si le ticket existe
            if ($ticket) {
                // Trouver la séance associée au ticket
                $seance = $seanceModel->find($ticket['id_seance']);

                // Passer les données à la vue
                return view('ticket', [
                    'ticket' => $ticket,
                    'seance' => $seance
                ]);
            } else {
                // Si aucun ticket n'est trouvé
                return view('ticket', ['error' => 'Ticket non trouvé']);
            }
        } else {
            // Si aucun code de réservation n'est soumis
            return view('ticket', ['error' => 'Veuillez entrer un code de réservation']);
        }
    }
}
