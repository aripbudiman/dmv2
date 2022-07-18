<?php

namespace App\Models;

use CodeIgniter\Model;

class JurnalModel extends Model
{
    protected $table            = 'jurnal';
    protected $allowedFields    = ['jurnal_no', 'kode_akun', 'nominal', 'd/c'];
}
