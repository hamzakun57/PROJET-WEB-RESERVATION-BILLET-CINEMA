<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function store()
    {
        $session = session();
        
        $validation = \Config\Services::validation();
        
        $validation->setRules([
            'username' => 'required|regex_match[/^[a-zA-Z0-9 ]+$/]|min_length[3]|is_unique[Users.username]',
            'email'    => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
            'password_confirm' => 'required|matches[password]'
        ]);
    
        if (!$this->validate($validation->getRules())) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
    
        // Inscrire un utilisateur avec le rôle de client 
        $model = new UserModel();
        $data = [
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
            'role'     => 'client',  // Toujours définir le rôle à 'client'
        ];
    
        $model->save($data);
    
        $session->setFlashdata('success', 'Inscription réussie. Vous pouvez maintenant vous connecter.');
    
        return redirect()->to('/login');
    }
}