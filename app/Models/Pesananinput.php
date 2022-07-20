<?php

namespace App\Models;

use CodeIgniter\Model;

class Pesananinput extends Model
{
    protected $table            = 'pesanan';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['id_customer', 'no_pesanan', 'nama_cetakan', 'id_tipe', 'id_bahan', 'id_lebar', 'id_finishing', 'panjang', 'qty', 'harga', 'status', 'created_at', 'updated_at'];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // public $builder;

    // public function __construct()
    // {
    //     $db      = \Config\Database::connect();
    //     $this->builder = $db->table('pesanan');
    // }

    public function nopesanan()
    {
        $kode = $this->db->table('pesanan')
            ->select('max(right(no_pesanan,3)) as kode', FALSE)
            ->orderBy('no_pesanan', 'DESC')
            ->limit(1)->get()->getRowArray();

        if ($kode['kode'] == NULL) {
            $no = 1;
        } else {
            $no = intval($kode['kode']) + 1;
        }
        $barang = 'DMP';
        $batas = str_pad($no, 4, "0", STR_PAD_LEFT);
        $kodebarang = $barang . $batas;
        return $kodebarang;
    }
    public function idpesanan()
    {
        $kode = $this->db->table('isi_jurnal')
            ->select('max(no_jurnal) as kode', FALSE)
            ->orderBy('no_jurnal', 'DESC')
            ->limit(1)->get()->getRowArray();

        if ($kode['kode'] == NULL) {
            $no = 1;
        } else {
            $no = intval($kode['kode']) + 1;
        }
        $barang = '';
        $batas = str_pad($no, 1, "0", STR_PAD_LEFT);
        $kodebarang = $barang . $batas;
        return $kodebarang;
    }

    public function getPesanan($noPesanan)
    {
        return $this->db->table('pesanan')
            ->select('*')
            ->join('tipe', 'pesanan.id_tipe=tipe.id')
            ->join('bahan', 'pesanan.id_bahan=bahan.id')
            ->join('lebar', 'pesanan.id_lebar=lebar.id')
            ->join('finishing', 'pesanan.id_finishing=finishing.id')
            ->join('customer', 'pesanan.id_customer=customer.id')
            ->where('no_pesanan', $noPesanan)
            ->get()
            ->getResultArray();
    }

    public function updatePesanan($status, $nopesanan)
    {
        return $this->db->table('pesanan')
            ->set('status', $status)
            ->where('no_pesanan', $nopesanan)
            ->update();
    }
}
