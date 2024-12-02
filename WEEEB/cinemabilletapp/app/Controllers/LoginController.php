<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }
    public function login()
    {
        $session = session();
        $model = new UserModel();
        
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        
        $user = $model->where('email', $email)->first();
        
        if ($user) {
            if (password_verify($password, $user['password'])) {
                // Définir les données de session en fonction du rôle
                $sessionData = [
                    'id'       => $user['id'],
                    'username' => $user['username'],
                    'email'    => $user['email'],
                    'role'     => $user['role'],
                    'logged_in' => TRUE,
                ];
                $session->set($sessionData);

                // Rediriger en fonction du rôle
                if ($user['role'] === 'admin') {
                    return redirect()->to('/admin-dashboard');
                } else {
                    return redirect()->to('/dashboard');
                }
            } else {
                $session->setFlashdata('error', 'Mot de passe incorrect');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('error', 'Utilisateur non trouvé');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}
