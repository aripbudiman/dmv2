<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Tipe;
use App\Models\Bahan;

class Konfigurasi extends BaseController
{
    protected $TipeModel, $BahanModel;
    public function __construct()
    {
        $this->TipeModel = new Tipe();
        $this->BahanModel = new Bahan();
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
            'validation' => \Config\Services::validation(),
            'kode' => $this->BahanModel->kodebahan(),
            'bahan' => $this->BahanModel->findAll()
        ];
        return view('konfigurasi/bahan', $data);
    }

    public function simpanbahan()
    {
        if ($this->request->isAJAX()) {
            $kodebahan = $this->request->getVar('kode_bahan');
            $namabahan = $this->request->getVar('nama_bahan');

            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'kode_bahan' => [
                    'rules' => 'required|numeric',
                    'label' => 'kode bahan',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'numeric' => '{field} harus berisi angka'
                    ]
                ],
                'nama_bahan' => [
                    'rules' => 'required',
                    'label' => 'nama bahan',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ]
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'errorKode' => $validation->getError('kode_bahan'),
                        'errorNama' => $validation->getError('nama_bahan')
                    ]
                ];
            } else {
                $this->BahanModel->save([
                    'kode_bahan' => $kodebahan,
                    'nama_bahan' => $namabahan
                ]);
                $msg = [
                    'sukses' => 'Data berhasil ditambahkan'
                ];
            }
            echo json_encode($msg);
        }
    }

    public function delete_bahan($id)
    {
        $this->BahanModel->delete($id);
        $response = [
            'sukses' => 'Data berhasil dihapus!!'
        ];
        echo json_encode($response);
    }
}
