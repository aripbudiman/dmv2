<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Tipe;

class Konfigurasi extends BaseController
{
    protected $TipeModel;
    public function __construct()
    {
        $this->TipeModel = new Tipe();
    }
    public function index()
    {
        $data = [
            'title' => 'Tipe',
            'tipe' => $this->TipeModel->findAll()
        ];
        return view('konfigurasi/tipe', $data);
    }

    public function bahan()
    {
        $data = [
            'title' => 'Bahan',
            'validation' => \Config\Services::validation()
        ];
        return view('konfigurasi/bahan', $data);
    }

    public function simpanbahan()
    {
        $kode = $this->request->getVar('kodebahan');
        $nama = $this->request->getVar('namabahan');
        if (!$this->validate([
            'kode_bahan' => 'required',
            'nambahan' => 'required'
        ])) {
            $validation = \Config\Services::validation();
            dd($validation);
            return redirect()->to('konfigurasi/bahan');
        }
    }
}
