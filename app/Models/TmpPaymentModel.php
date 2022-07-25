<?php

namespace App\Models;

use CodeIgniter\Model;

class TmpPaymentModel extends Model
{
    protected $table            = 'tmp_payment';
    protected $allowedFields    = ['no_payment', 'no_pesanan', 'trx_date'];

    public function getTmpPayment()
    {
        return $this->db->table('tmp_payment')
            ->select('tmp_payment.no_pesanan as no_pesanan,nama_cetakan, nama_customer,nama_bahan,nama_tipe,meter,deskripsi_finishing,panjang,qty,harga')
            ->join('pesanan', 'tmp_payment.no_pesanan=pesanan.no_pesanan')
            ->join('customer', 'pesanan.id_customer=customer.id')
            ->join('tipe', 'pesanan.id_tipe=tipe.id')
            ->join('bahan', 'pesanan.id_bahan=bahan.id')
            ->join('lebar', 'pesanan.id_lebar=lebar.id')
            ->join('finishing', 'pesanan.id_finishing=finishing.id')
            ->get()
            ->getResultArray();
    }
}
