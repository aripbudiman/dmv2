<?php

namespace App\Models;

use CodeIgniter\Model;

class PaymentModel extends Model
{
    protected $table            = 'payment';
    protected $allowedFields    = ['no_payment', 'indexPay', 'amount', 'amount_pay', 'discount', 'trx_date'];

    public function nopayment()
    {
        $kode = $this->db->table('payment')
            ->select('max(right(no_payment,4)) as kode', FALSE)
            ->orderBy('no_payment', 'DESC')
            ->limit(1)->get()->getRowArray();

        if ($kode['kode'] == NULL) {
            $no = 1;
        } else {
            $no = intval($kode['kode']) + 1;
        }
        $barang = 'PY' . date('dmy');
        $batas = str_pad($no, 3, "0", STR_PAD_LEFT);
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
}
