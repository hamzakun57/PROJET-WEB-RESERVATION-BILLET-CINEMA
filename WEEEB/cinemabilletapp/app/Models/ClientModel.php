<?php

namespace App\Models;

use CodeIgniter\Model;

class ClientModel extends Model
{
    protected $table = 'client';
    protected $allowedFields = ['username', 'email', 'password'];

 
}
