<?php

namespace App\Models;

use CodeIgniter\Model;

class FilmModel extends Model
{
    protected $table = 'Films'; // Nom de la table
    protected $primaryKey = 'id_film'; // Clé primaire
    protected $allowedFields = ['nom_film', 'genre', 'duree', 'affiche']; // Champs autorisés pour l'insertion

    // Récupérer un film par son ID
    public function getFilmById($id_film){
        
        return $this->find($id_film); // Trouver le film avec l'ID
    }

    // Ajouter un film dans la base de données
    public function ajouterFilm($data) {
        return $this->insert($data); // Insérer les données du film
    }

    // Mettre à jour un film
    public function updateFilm($id_film, $updatedData){
        return $this->update($id_film, $updatedData); // Mettre à jour le film
    }

    // Supprimer un film
    public function supprimerFilm($id_film) {
        return $this->delete($id_film); // Supprimer le film
    }
}
