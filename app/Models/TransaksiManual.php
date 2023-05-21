<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiManual extends Model
{
    protected $table            = 'transaksi_manual';
    protected $allowedFields    = ['nama_konsumen', 'tgl_trx','nama_pesanan','qty','harga_satuan','jumlah','kode_trx'];

    public function getLoadTr($kode){
        return $this->db->table('transaksi_manual')
        ->select('*')
        ->where('kode_trx', $kode)
        ->get()
        ->getResultArray();
    }
}
