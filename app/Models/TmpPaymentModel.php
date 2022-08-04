<?php

namespace App\Models;

use CodeIgniter\Model;

class TmpPaymentModel extends Model
{
    protected $table            = 'tmp_payment';
    protected $allowedFields    = ['no_payment', 'no_pesanan', 'status', 'indexPay', 'trx_date'];

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
            ->where('tmp_payment.status', 'pending')
            ->get()
            ->getResultArray();
    }

    public function getListDp()
    {
        return $this->db->table('payment')
            ->select('no_payment, payment.indexPay as index, harga_kotor, amount, amount_pay,discount,trx_date,pesanan.no_pesanan as noP, tmp_payment.status as sts, nama_customer, nama_cetakan,nama_tipe,nama_bahan,meter,deskripsi_finishing,panjang,qty,sum(harga) as harga')
            ->join('tmp_payment', 'payment.indexPay=tmp_payment.indexPay')
            ->join('pesanan', 'tmp_payment.no_pesanan=pesanan.no_pesanan')
            ->join('customer', 'pesanan.id_customer=customer.id')
            ->join('tipe', 'pesanan.id_tipe=tipe.id')
            ->join('bahan', 'pesanan.id_bahan=bahan.id')
            ->join('lebar', 'pesanan.id_lebar=lebar.id')
            ->join('finishing', 'pesanan.id_finishing=finishing.id')
            ->where('tmp_payment.status', 'down payment')
            ->groupBy('payment.indexPay')
            ->get()
            ->getResultArray();
    }

    public function getPelunasanDp($nopayment)
    {
        return $this->db->table('payment')
            ->select('no_payment, payment.indexPay as index, harga_kotor,member, amount, amount_pay,discount,trx_date,pesanan.no_pesanan as noP, tmp_payment.status as sts, nama_customer, nama_cetakan,nama_tipe,nama_bahan,meter,deskripsi_finishing,panjang,qty,sum(harga) as harga')
            ->join('tmp_payment', 'payment.indexPay=tmp_payment.indexPay')
            ->join('pesanan', 'tmp_payment.no_pesanan=pesanan.no_pesanan')
            ->join('customer', 'pesanan.id_customer=customer.id')
            ->join('tipe', 'pesanan.id_tipe=tipe.id')
            ->join('bahan', 'pesanan.id_bahan=bahan.id')
            ->join('lebar', 'pesanan.id_lebar=lebar.id')
            ->join('members', 'customer.id_member=members.id')
            ->join('finishing', 'pesanan.id_finishing=finishing.id')
            ->where('payment.no_payment', $nopayment)
            ->groupBy('payment.indexPay')
            ->get()
            ->getResultArray();
    }
}
