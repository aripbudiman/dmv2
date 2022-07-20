<?php

namespace App\Models;

use CodeIgniter\Model;

class TmpPesananModel extends Model
{
    protected $table            = 'tmp_pesanan';
    protected $allowedFields    = ['no_pesanan', 'status'];

    public function getTmpPesanan()
    {
        return $this->db->table('tmp_pesanan')
            ->select('tmp_pesanan.no_pesanan as no,nama_cetakan,panjang,harga,tmp_pesanan.status as sts')
            ->join('pesanan', 'tmp_pesanan.no_pesanan=pesanan.no_pesanan')
            ->get()
            ->getResultArray();
    }
}
