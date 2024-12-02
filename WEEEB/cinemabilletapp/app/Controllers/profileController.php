<?php

namespace App\Controllers;

class profileController extends BaseController
{
    public function index(): string
    {
        return view('profile');
    }
}
