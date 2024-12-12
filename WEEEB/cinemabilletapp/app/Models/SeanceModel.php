<?php

namespace App\Models;

use CodeIgniter\Model;

class SeanceModel extends Model
{
    protected $table      = 'seances';
    protected $primaryKey = 'id_seance';

    // Ajoutez 'prix' à la liste des champs autorisés
    protected $allowedFields = ['id_film', 'date_heure', 'places_disponibles', 'prix'];

    // Récupère toutes les séances
    public function getAllSeances()
    {
        return $this->findAll();
    }

    // Récupère une séance par son ID
    public function getSeanceById($id)
    {
        return $this->find($id);
    }

    // Ajoutez une fonction pour récupérer les séances filtrées par prix, si nécessaire
    public function getSeancesByPrix($prix)
    {
        return $this->where('prix', $prix)->findAll();
    }
}
