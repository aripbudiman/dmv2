<?php

namespace App\Models;

use CodeIgniter\Model;

class IsijurnalModel extends Model
{
    protected $table            = 'isi_jurnal';
    protected $allowedFields    = ['no_jurnal', 'tgl_jurnal', 'deskripsi'];
}
