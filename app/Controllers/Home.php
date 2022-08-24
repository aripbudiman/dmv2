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
        // dd($this->getPenjualanTipe());
        $data = [
            'title' => 'Home',
            'piutang' => $this->getTotalPiutang(),
            'newOrder' => $this->newOrder(),
            'income' => $this->Income(),
            'totalOrder' => $this->totalOrder(),
            'penjualanTipe' => $this->getPenjualanTipe()
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
}
