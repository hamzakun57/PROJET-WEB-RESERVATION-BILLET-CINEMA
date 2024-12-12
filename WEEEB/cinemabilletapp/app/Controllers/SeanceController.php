<?php

namespace App\Controllers;

use App\Models\SeanceModel;
use App\Models\FilmModel;

class SeanceController extends BaseController
{
    // Affiche la liste des séances
    public function index()
    {
        $seanceModel = new SeanceModel();
        $filmModel = new FilmModel();
        
        // Récupérer toutes les séances
        $seances = $seanceModel->getAllSeances();
        
        // Ajouter les informations sur les films pour chaque séance
        foreach ($seances as &$seance) {
            $film = $filmModel->find($seance['id_film']);
            $seance['nom_film'] = $film ? $film['nom_film'] : 'Film inconnu';
        }

        return view('seance', ['seances' => $seances]);
    }

    // Affiche le formulaire d'ajout de séance
    public function ajouter()
    {
        $filmModel = new FilmModel();
        $films = $filmModel->findAll();

        return view('ajouter_seance', ['films' => $films]);
    }

    // Ajoute une nouvelle séance
    public function store()
    {
        $seanceModel = new SeanceModel();

        $data = [
            'id_film' => $this->request->getPost('id_film'),
            'date_heure' => $this->request->getPost('date_heure'),
            'places_disponibles' => $this->request->getPost('places_disponibles'),
            'prix'             => $this->request->getPost('prix')
        ];

        $seanceModel->insert($data);

        return redirect()->to('/seances');
    }

    // Supprime une séance
    public function supprimer($id)
    {
        $seanceModel = new SeanceModel();
        $seanceModel->delete($id);

        return redirect()->to('/seances');
    }
}
