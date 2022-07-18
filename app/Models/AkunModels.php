<?php

namespace App\Models;

use CodeIgniter\Model;

class AkunModels extends Model
{
    protected $table            = 'akun';
    protected $allowedFields    = ['nomor_akun', 'nama_akun'];

    public function noakun()
    {
        $kode = $this->db->table('akun')
            ->select('RIGHT(nomor_akun,3) as kode', FALSE)
            ->orderBy('nomor_akun', 'DESC')
            ->limit(1)->get()->getRowArray();

        if ($kode['kode'] == NULL) {
            $no = 1;
        } else {
            $no = intval($kode['kode']) + 1;
        }
        $barang = '';
        $batas = str_pad($no, 3, "1", STR_PAD_LEFT);
        $kodebarang = $barang . $batas;
        return $kodebarang;
    }
}
