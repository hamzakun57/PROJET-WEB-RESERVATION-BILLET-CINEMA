<?php

namespace App\Models;

use CodeIgniter\Model;

class TicketModel extends Model
{
    protected $table = 'Tickets';
    protected $primaryKey = 'id_ticket';
    protected $allowedFields = ['id_user', 'id_seance', 'nom_film', 'place_numero', 'code_reservation', 'envoye'];

    // Méthode pour obtenir les tickets d'un utilisateur spécifique
    public function getTicketsByUserId($id_user)
    {
        return $this->where('id_user', $id_user)->findAll();
    }

    // Méthode pour obtenir un ticket par code de réservation
    public function getTicketByReservationCode($code_reservation)
    {
        return $this->where('code_reservation', $code_reservation)->first();
    }

    // Marquer le ticket comme envoyé
  // Marquer le ticket comme envoyé
  public function markAsSent($id_ticket)
  {
      return $this->set('envoye', true)
                  ->where('id_ticket', $id_ticket)
                  ->update();
  }
}
