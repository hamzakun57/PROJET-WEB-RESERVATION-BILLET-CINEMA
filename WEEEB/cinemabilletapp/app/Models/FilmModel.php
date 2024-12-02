<?php

namespace App\Models;

use CodeIgniter\Model;

class FilmModel extends Model
{
    
 
    protected $table = 'films';  // Nom de la table
    protected $primaryKey = 'id_film'; // Clé primaire de la table
    protected $allowedFields = ['nom_film', 'genre', 'duree', 'affiche']; // Colonnes autorisées
    
}    
