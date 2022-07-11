<?php

namespace App\Models;

use CodeIgniter\Model;

class Tipe extends Model
{
    protected $table            = 'tipe';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['nama_tipe', 'harga_tipe'];
}
