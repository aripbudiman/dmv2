<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Tipe;
use App\Models\Bahan;
use App\Models\Lebar;
use App\Models\Finishing;

class Konfigurasi extends BaseController
{
    protected $TipeModel, $BahanModel, $LebarModel, $FinishingModel;
    public function __construct()
    {
        $this->TipeModel = new Tipe();
        $this->BahanModel = new Bahan();
        $this->LebarModel = new Lebar();
        $this->FinishingModel = new Finishing();
    }
    public function index()
    {
        $data = [
            'title' => 'Tipe',
            'tipe' => $this->TipeModel->findAll()
        ];
        return view('konfigurasi/tipe', $data);
    }

    public function simpantipe()
    {
        if ($this->request->isAJAX()) {
            $namatipe = $this->request->getVar('nama_tipe');
            $hargatipe = $this->request->getVar('harga_tipe');

            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'nama_tipe' => [
                    'rules' => 'required',
                    'label' => 'nama tipe',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'harga_tipe' => [
                    'rules' => 'required',
                    'label' => 'harga tipe',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ]
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'errorNama' => $validation->getError('nama_tipe'),
                        'errorHarga' => $validation->getError('harga_tipe')
                    ]
                ];
            } else {
                $this->TipeModel->save([
                    'nama_tipe' => $namatipe,
                    'harga_tipe' => $hargatipe
                ]);
                $msg = [
                    'sukses' => 'Data berhasil ditambahkan'
                ];
            }
            echo json_encode($msg);
        }
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

    public function tampilbahan()
    {
        $data = [
            'bahan' => $this->BahanModel->findAll()
        ];
        return view('konfigurasi/table-bahan', $data);
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


    public function lebar()
    {

        $data = [
            'title' => 'Lebar',
            'bahan' => $this->BahanModel->findAll(),
            'lebar' => $this->LebarModel->getLebar()
        ];
        return view('konfigurasi/lebar', $data);
    }

    public function tampillebar()
    {
        $data = [
            'lebar' => $this->LebarModel->getLebar()
        ];
        return view('konfigurasi/table-lebar', $data);
    }

    public function simpanlebar()
    {
        if ($this->request->isAJAX()) {
            $idbahan = $this->request->getVar('id_bahan');
            $meter = $this->request->getVar('meter');
            $harga = str_replace(',', '', $this->request->getVar('harga_lebar'));

            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'meter' => [
                    'rules' => 'required|numeric',
                    'label' => 'Meter',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'numeric' => '{field} harus berisi angka'
                    ]
                ],
                'harga_lebar' => [
                    'rules' => 'required',
                    'label' => 'Harga Lebar',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ]
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'errorMeter' => $validation->getError('meter'),
                        'errorHarga' => $validation->getError('harga_lebar')
                    ]
                ];
            } else {
                $this->LebarModel->save([
                    'id_bahan' => htmlspecialchars($idbahan),
                    'meter' => htmlspecialchars($meter),
                    'harga_lebar' => htmlspecialchars($harga)
                ]);
                $msg = [
                    'sukses' => 'Data berhasil ditambahkan'
                ];
            }
            echo json_encode($msg);
        }
    }

    public function deletelebar($id)
    {
        $this->LebarModel->delete($id);
        $msg = [
            'sukses' => 'Data berhasil didelete!'
        ];

        echo json_encode($msg);
    }


    public function finishing()
    {
        $data = [
            'title' => 'Finishing',
            'finishing' => $this->FinishingModel->findAll()
        ];
        return view('konfigurasi/finishing', $data);
    }
}
