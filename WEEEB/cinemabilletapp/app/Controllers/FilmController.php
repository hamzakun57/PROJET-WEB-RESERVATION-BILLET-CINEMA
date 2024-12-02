<?php

namespace App\Controllers;

use App\Models\FilmModel;

class FilmController extends BaseController
{
    public function index()
    {
        $filmModel = new FilmModel();
        $films = $filmModel->findAll(); // Récupère les films

       

        return view('client_dashboard', ['films' => $films]); // Transfert des données
    }
}
