<?php

namespace App\Controllers;


class Home extends BaseController
{
    protected $db;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
        // dd($this->getRiwayatTransaksi());
        $data = [
            'title' => 'Home',
            'piutang' => $this->getTotalPiutang(),
            'newOrder' => $this->newOrder(),
            'income' => $this->Income(),
            'totalOrder' => $this->totalOrder(),
            'penjualanTipe' => $this->getPenjualanTipe(),
            'riwayat' => $this->getRiwayatTransaksi()
        ];
        return view('welcome_message', $data);
    }

    public function getTotalPiutang()
    {
        return $this->db->table('jurnal')
            ->select('nominal piutang, kode_akun, d/c coa')
            ->where('kode_akun', '1-112')
            ->get()
            ->getResultArray();
    }

    public function newOrder()
    {
        return $this->db->table('pesanan')
            ->select('count(status) order')
            ->where('status', 'B')
            ->countAllResults();
    }

    public function Income()
    {
        return $this->db->table('jurnal')
            ->select('sum(nominal) income')
            ->where('kode_akun', '1-113')
            ->get()
            ->getResultArray();
    }

    public function totalOrder()
    {
        return $this->db->table('pesanan')
            ->select('count(status) order')
            ->countAllResults();
    }

    public function getPenjualanTipe()
    {
        return $this->db->table('pesanan')
            ->select('count(*) total, nama_tipe')
            ->join('tipe', 'pesanan.id_tipe=tipe.id')
            ->groupBy('nama_tipe')
            ->get()
            ->getResultArray();
    }

    public function getRiwayatTransaksi()
    {
        return $this->db->table('voucher')
            ->select('right(no_voucher,5)  vc,harga_kotor, v_status,customer.nama_customer customer')
            ->join('payment', 'payment.indexPay=voucher.indexPay')
            ->join('pesanan', 'pesanan.no_pesanan=voucher.no_pesanan')
            ->join('customer', 'pesanan.id_customer=customer.id')
            ->groupBy('voucher.indexPay')
            ->orderBy('voucher.indexPay', 'DESC')
            ->limit('7')
            ->get()
            ->getResultArray();
    }
}
