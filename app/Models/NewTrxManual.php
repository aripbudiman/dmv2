<?php

namespace App\Models;

use CodeIgniter\Model;

class NewTrxManual extends Model
{
    protected $table            = 'new_trx_manual';
    protected $allowedFields    = ['nama_konsumen', 'tgl_trx','kode_trx'];


    public function getTransaksi($kode)
    {
        return $this->db->table('new_trx_manual')
            ->select('*')
            ->where('kode_trx', $kode)
            ->get()
            ->getResultArray();
    }

}