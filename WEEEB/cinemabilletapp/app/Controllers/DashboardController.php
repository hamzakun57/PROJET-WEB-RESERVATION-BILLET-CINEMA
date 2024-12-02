<?php

namespace App\Controllers;
use App\Models\FilmModel;
class DashboardController extends BaseController
{
    public function index()
    {
        $filmModel = new FilmModel();
        $films = $filmModel->findAll(); // Récupérer tous les films
    
        // Ajouter les films aux données de la vue
        $data['films'] = $films;

        return view('dashboard', $data);
    }
}
