<?php

namespace App\Models;

use CodeIgniter\Model;

class PaymentModel extends Model
{
    protected $table            = 'payment';
    protected $allowedFields    = ['no_payment', 'indexPay', 'harga_kotor', 'id_kasir', 'amount', 'amount_pay', 'discount', 'trx_date'];

    public function nopayment()
    {
        $kode = $this->db->table('payment')
            ->select('max(right(no_payment,5)) as kode', FALSE)
            ->orderBy('no_payment', 'DESC')
            ->limit(1)->get()->getRowArray();

        if ($kode['kode'] == NULL) {
            $no = 1;
        } else {
            $no = intval($kode['kode']) + 1;
        }
        $barang = 'PY' . date('d');
        $batas = str_pad($no, 5, "0", STR_PAD_LEFT);
        $kodebarang = $barang . $batas;
        return $kodebarang;
    }

    public function loadCustomer($cs)
    {
        return $this->db->table('tmp_pesanan')
            ->select('*')
            ->join('pesanan', 'tmp_pesanan.no_pesanan=pesanan.no_pesanan')
            ->join('customer', 'pesanan.id_customer=customer.id')
            ->where('nama_customer', $cs)
            ->get()
            ->getResultArray();
    }

    public function indexPayment()
    {
        $kode = $this->db->table('payment')
            ->select('count(id) as kode', FALSE)
            ->orderBy('id', 'DESC')
            ->limit(1)->get()->getRowArray();

        if ($kode['kode'] == NULL) {
            $no = 1;
        } else {
            $no = intval($kode['kode']) + 1;
        }
        return $no;
    }

    public function loadTroli($nama)
    {
        return $this->db->table('tmp_pesanan')
            ->select('tmp_pesanan.status as status,nama_cetakan,tmp_pesanan.no_pesanan as no, nama_customer,nama_bahan,nama_tipe,meter,deskripsi_finishing,panjang,qty,harga')
            ->join('pesanan', 'tmp_pesanan.no_pesanan=pesanan.no_pesanan')
            ->join('customer', 'pesanan.id_customer=customer.id')
            ->join('tipe', 'pesanan.id_tipe=tipe.id')
            ->join('bahan', 'pesanan.id_bahan=bahan.id')
            ->join('lebar', 'pesanan.id_lebar=lebar.id')
            ->join('finishing', 'pesanan.id_finishing=finishing.id')
            ->where('nama_customer', $nama)
            ->where('tmp_pesanan.status', 'unpaid')
            ->get()
            ->getResultArray();
    }

    public function getStruk($noPayment)
    {
        return $this->db->table('payment')
            ->select('no_payment, payment.indexPay as index,username, harga_kotor, amount, amount_pay,discount,trx_date,pesanan.no_pesanan as noP, tmp_payment.status as sts, nama_customer, nama_cetakan,nama_tipe,nama_bahan,meter,deskripsi_finishing,panjang,qty,harga')
            ->join('tmp_payment', 'payment.indexPay=tmp_payment.indexPay')
            ->join('pesanan', 'tmp_payment.no_pesanan=pesanan.no_pesanan')
            ->join('customer', 'pesanan.id_customer=customer.id')
            ->join('tipe', 'pesanan.id_tipe=tipe.id')
            ->join('users', 'payment.id_kasir=users.id')
            ->join('bahan', 'pesanan.id_bahan=bahan.id')
            ->join('lebar', 'pesanan.id_lebar=lebar.id')
            ->join('finishing', 'pesanan.id_finishing=finishing.id')
            ->where('no_payment', $noPayment)
            ->get()
            ->getResultArray();
    }


    public function getTransactions()
    {
        return $this->db->table('payment')
            ->select('nama_customer n, tmp_payment.status s, trx_date t, amount_pay a')
            ->join('tmp_payment', 'payment.indexPay=tmp_payment.indexPay')
            ->join('pesanan', 'tmp_payment.no_pesanan=pesanan.no_pesanan')
            ->join('customer', 'pesanan.id_customer=customer.id')
            ->get()
            ->getResultArray();
    }





    // ->select('no_payment, payment.indexPay as index, harga_kotor, amount, amount_pay,discount,trx_date,pesanan.no_pesanan as noP, tmp_payment.status as sts, nama_customer, nama_cetakan,nama_tipe,nama_bahan,meter,deskripsi_finishing,panjang,qty,harga')
}
