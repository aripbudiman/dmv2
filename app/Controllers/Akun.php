<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Akuntansi;
use App\Models\AkunModels;

class Akun extends BaseController
{
    public function index()
    {
        $akuntansi = new Akuntansi();
        $result = $akuntansi->findAll();
        $akun = new AkunModels();
        $result2 = $akun->findAll();
        $nomor = $akun->noakun();
        $data = [
            'title' => 'Akun',
            'akuntansi' => $result,
            'akun' => $result2,
            'nomor' => $nomor
        ];
        return view('akun/index', $data);
    }

    public function simpanakun()
    {

        if ($this->request->isAJAX()) {
            $nomorakun = $this->request->getVar('nomor_akun');
            $namaakun = $this->request->getVar('nama_akun');
            $akuntansi = $this->request->getVar('id_akuntansi');
            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'nomor_akun' => [
                    'rules' => 'required|is_unique[akun.nomor_akun]',
                    'label' => 'Nomor Akun',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} Sudah terdaftar'
                    ]
                ],
                'nama_akun' => [
                    'rules' => 'required|is_unique[akun.nama_akun]',
                    'label' => 'Nama Akun',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} Sudah terdaftar'
                    ]
                ]
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'errorNomor' => $validation->getError('nomor_akun'),
                        'errorNama' => $validation->getError('nama_akun')
                    ]
                ];
            } else {
                $akun = new AkunModels();
                $akun->save([
                    'nomor_akun' => $akuntansi . '-' . $nomorakun,
                    'nama_akun' => $namaakun
                ]);
                $msg = [
                    'sukses' => 'Data berhasil ditambahkan'
                ];
            }
            echo json_encode($msg);
        }
    }
}
