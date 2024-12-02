<?php

namespace App\Controllers;

class AdminController extends BaseController
{
    public function index()
    {
        $session = session();
        if ($session->get('role') !== 'admin') {
            return redirect()->to('/login');
        }
        return view('admin_dashboard');
    }
}
