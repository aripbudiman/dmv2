<?php

namespace App\Models;

use CodeIgniter\Model;

class PesananModel extends Model
{
    protected $table            = 'pesanan';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['id_customer', 'no_pesanan', 'nama_cetakan', 'id_tipe', 'id_bahan', 'id_lebar', 'id_finishing', 'panjang', 'qty', 'harga'];

    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function nopesanan()
    {
        $kode = $this->db->table('pesanan')
            ->select('RIGHT(no_pesanan,5) as kode', FALSE)
            ->orderBy('no_pesanan', 'DESC')
            ->limit(1)->get()->getRowArray();

        if ($kode['kode'] == NULL) {
            $no = 1;
        } else {
            $no = intval($kode['kode']) + 1;
        }
        $barang = date('dmy');
        $batas = str_pad($no, 4, "0", STR_PAD_LEFT);
        $kodebarang = $barang . $batas;
        return $kodebarang;
    }
}
