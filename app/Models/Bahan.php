<?php

namespace App\Models;

use CodeIgniter\Model;

class Bahan extends Model
{
    protected $table            = 'bahan';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['kode_bahan', 'nama_bahan'];


    public function kodebahan()
    {
        $kode = $this->db->table('bahan')
            ->select('RIGHT(kode_bahan,4) as kode', FALSE)
            ->orderBy('kode_bahan', 'DESC')
            ->limit(1)->get()->getRowArray();

        if ($kode['kode'] == NULL) {
            $no = 1;
        } else {
            $no = intval($kode['kode']) + 1;
        }
        $barang = "";
        $batas = str_pad($no, 3, "0", STR_PAD_LEFT);
        $kodebarang = $barang . $batas;
        return $kodebarang;
    }
}
