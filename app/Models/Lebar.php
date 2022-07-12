<?php

namespace App\Models;

use CodeIgniter\Model;

class Lebar extends Model
{
    protected $table            = 'lebar';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['id_bahan', 'meter', 'harga_lebar'];


    public function getLebar()
    {
        return $this->db->table('lebar')
            ->select('nama_bahan,kode_bahan,lebar.id as id, meter, harga_lebar')
            ->join('bahan', 'lebar.id_bahan=bahan.id')
            ->get()->getResultArray();
    }
}
