<?php

namespace App\Controllers;

use App\Models\FilmModel;

class FilmController extends BaseController
{
    protected $filmModel;

    // Constructeur : Initialisation du modèle Film
    public function __construct() {
        $this->filmModel = new FilmModel();
    }

    // Afficher la liste de tous les films
    public function index() {
        $data['films'] = $this->filmModel->findAll();
        return view('film', $data); // Vue pour afficher les films
    }

    // Afficher les détails d'un film
    public function afficher($id_film) {
        $data['film'] = $this->filmModel->getFilmById($id_film);
        return view('detail_film', $data); // Vue pour afficher un film spécifique
    }

    // Afficher le formulaire pour ajouter un film
    public function ajouter() {
        return view('ajouter_film'); // Vue pour ajouter un film
    }

    // Ajouter un film dans la base de données
    public function ajouterFilm() {
        // Récupération du fichier image
        $imageFile = $this->request->getFile('affiche');
        if ($imageFile->isValid() && !$imageFile->hasMoved()) {
            // Renommage pour éviter les conflits de noms
            $imageName = $imageFile->getRandomName();
            // Déplacement du fichier vers le dossier 'uploads'
            $imageFile->move(ROOTPATH . 'public/uploads', $imageName);
            
            // Données à insérer dans la base de données
            $data = [
                'nom_film' => $this->request->getPost('nom_film'),
                'genre' => $this->request->getPost('genre'),
                'duree' => $this->request->getPost('duree'),
                'affiche' => $imageName // Le nom de l'image dans la base
            ];

            $this->filmModel->ajouterFilm($data);
            return redirect()->to('/films'); // Redirection vers la liste des films
        } else {
            // Si l'image n'a pas été téléchargée correctement
            return redirect()->back()->with('error', 'L\'affiche du film n\'a pas pu être téléchargée.');
        }
    }

    // Afficher le formulaire de modification d'un film
    public function modifierFilm($id_film) {
        $data['film'] = $this->filmModel->getFilmById($id_film);
        return view('modifier_film', $data); // Vue pour modifier le film
    }

    // Mettre à jour les informations d'un film
    public function updateFilm($id_film) {
        // Récupération du fichier image si une nouvelle est téléchargée
        $imageFile = $this->request->getFile('affiche');
        if ($imageFile->isValid() && !$imageFile->hasMoved()) {
            // Renommage du fichier pour éviter les conflits
            $imageName = $imageFile->getRandomName();
            // Déplacement du fichier vers le dossier 'uploads'
            $imageFile->move(ROOTPATH . 'public/uploads', $imageName);
        } else {
            // Utiliser l'affiche existante si aucune nouvelle image n'est téléchargée
            $imageName = $this->request->getPost('existing_affiche');
        }

        // Données à mettre à jour dans la base de données
        $updatedData = [
            'nom_film' => $this->request->getPost('nom_film'),
            'genre' => $this->request->getPost('genre'),
            'duree' => $this->request->getPost('duree'),
            'affiche' => $imageName // Mettre à jour le nom de l'image
        ];

        // Mise à jour du film dans la base de données
        $this->filmModel->updateFilm($id_film, $updatedData);
        return redirect()->to('/films'); // Redirection vers la liste des films
    }

    // Supprimer un film
    public function supprimerFilm($id_film) {
        // Récupérer l'affiche du film pour la supprimer également du serveur
        $film = $this->filmModel->getFilmById($id_film);
        $imagePath = ROOTPATH . 'public/uploads/' . $film['affiche'];

        // Vérifier si l'affiche existe et la supprimer
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        // Supprimer le film de la base de données
        $this->filmModel->supprimerFilm($id_film);
        return redirect()->to('/films'); // Redirection vers la liste des films
    }
}
