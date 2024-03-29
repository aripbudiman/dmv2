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
            ->select('nama_bahan,kode_bahan,lebar.id as id,lebar.id_bahan as idBahan, meter, harga_lebar')
            ->join('bahan', 'lebar.id_bahan=bahan.id')
            ->get()->getResultArray();
    }

    public function getHargaLebar($id)
    {
        return $this->db->table('lebar')
            ->select('*')
            ->where('id_bahan', $id)
            ->get()->getResultArray();
    }

    public function getLebarEdit($id)
    {
        return $this->db->table('lebar')
            ->select('nama_bahan,kode_bahan,lebar.id as id, meter, harga_lebar')
            ->join('bahan', 'lebar.id_bahan=bahan.id')
            ->where('lebar.id', $id)
            ->get()->getResultArray();
    }
}
