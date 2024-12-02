<?php

namespace App\Models;

use CodeIgniter\Model;

class PlaceReserverModel extends Model
{
    protected $table = 'place_reserver';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_seance', 'place_numero', 'reserved_at'];
}
