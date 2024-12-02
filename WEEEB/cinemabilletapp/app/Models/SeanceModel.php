<?php

namespace App\Models;

use CodeIgniter\Model;

class SeanceModel extends Model
{
    protected $table = 'Seances';
    protected $primaryKey = 'id_seance';
    protected $allowedFields = ['id_film', 'date_heure', 'places_disponibles'];

    // Méthode pour obtenir les séances pour un film spécifique
    public function getSeancesByFilmId($id_film)
    {
        return $this->where('id_film', $id_film)->findAll();
    }

    public function updatePlacesDisponibles($id_seance, int $places)
    {
        return $this->set('places_disponibles', $places)
                    ->where('id_seance', $id_seance)
                    ->update();
    }
}