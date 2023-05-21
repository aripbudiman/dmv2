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
            ->select('tmp_pesanan.no_pesanan as no,nama_cetakan,panjang,harga,nama_customer,tmp_pesanan.status as sts,pesanan.created_at as tgl')
            ->join('pesanan', 'tmp_pesanan.no_pesanan=pesanan.no_pesanan')
            ->join('customer', 'pesanan.id_customer=customer.id')
            ->where('tmp_pesanan.status !=', 'paid')
            ->where('tmp_pesanan.status !=', 'batal')
            ->get()
            ->getResultArray();
    }
    public function getProsesPembatalanPesanan($nopesanan)
    {
        return $this->db->table('tmp_pesanan')
            ->select('tmp_pesanan.no_pesanan as no,nama_cetakan,panjang,harga,nama_customer,tmp_pesanan.status as sts,pesanan.created_at as tgl')
            ->join('pesanan', 'tmp_pesanan.no_pesanan=pesanan.no_pesanan')
            ->join('customer', 'pesanan.id_customer=customer.id')
            ->where('tmp_pesanan.status !=', 'paid')
            ->where('tmp_pesanan.status !=', 'batal')
            ->where('tmp_pesanan.no_pesanan',$nopesanan)
            ->get()
            ->getResultArray();
    }
}
