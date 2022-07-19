<?php

namespace App\Models;

use CodeIgniter\Model;

class TmpPesananModel extends Model
{
    protected $table            = 'tmp_pesanan';
    protected $allowedFields    = ['no_pesanan', 'status'];
}
