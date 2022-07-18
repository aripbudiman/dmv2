<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Bahan;
use App\Models\Lebar;
use App\Models\Tipe;
use App\Models\Finishing;
use App\Models\CustomerModel;
use App\Models\Pesananinput;
use App\Models\IsijurnalModel;
use App\Models\JurnalModel;

class Inputpesanan extends BaseController
{
    protected $bahan, $lebar, $tipe, $finishing, $customer, $pesanan, $jurnal, $isijurnal;
    public function __construct()
    {
        $this->bahan = new Bahan();
        $this->lebar = new Lebar();
        $this->tipe = new tipe();
        $this->finishing = new Finishing();
        $this->customer = new CustomerModel();
        $this->pesanan = new Pesananinput();
        $this->jurnal = new JurnalModel();
        $this->isijurnal = new IsijurnalModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Input Pesanan',
            'bahan' => $this->bahan->findAll(),
            'lebar' => $this->lebar->getHargaLebar(1),
            'tipe' => $this->tipe->findAll(),
            'finishing' => $this->finishing->findAll(),
            'customer' => $this->customer->findAll(),
            'nopesanan' => $this->pesanan->nopesanan(),
            'id' => $this->pesanan->idpesanan()
        ];
        return view('input/index', $data);
    }

    public function loadlebar()
    {
        $id = $this->request->getPost('id');
        $lebar = $this->lebar->getHargaLebar($id);
        $output = '';
        foreach ($lebar as $l) {
            $output .= '<option value="' . $l['id'] . '" data-lebar="' . $l['harga_lebar'] . '">' . $l['meter'] . "Meter +" . $l['harga_lebar'] . '</option>';
        }
        echo json_encode($output);
    }

    public function simpanpesanan()
    {
        if ($this->request->isAJAX()) {
            $customer = $this->request->getVar('id_customer');
            $namacetakan = $this->request->getVar('nama_cetakan');
            $idpesanan = $this->request->getVar('id_pesanan');
            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'id_customer' => [
                    'rules' => 'required|numeric',
                    'label' => 'Customer',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'numeric' => '{field} harus berisi angka'
                    ]
                ],
                'nama_cetakan' => [
                    'rules' => 'required',
                    'label' => 'Nama Cetakan',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ]
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'errorNama' => $validation->getError('nama_cetakan'),
                        'errorCustomer' => $validation->getError('id_customer')
                    ]
                ];
            } else {
                $this->pesanan->save([
                    'no_pesanan' => htmlspecialchars($this->request->getVar('no_pesanan')),
                    'id_customer' => htmlspecialchars($customer),
                    'nama_cetakan' => htmlspecialchars($namacetakan),
                    'id_tipe' => htmlspecialchars($this->request->getVar('id_tipe')),
                    'id_bahan' => htmlspecialchars($this->request->getVar('id_bahan')),
                    'id_lebar' => htmlspecialchars($this->request->getVar('id_lebar')),
                    'id_finishing' => htmlspecialchars($this->request->getVar('id_finishing')),
                    'panjang' => htmlspecialchars($this->request->getVar('panjang')),
                    'qty' => htmlspecialchars($this->request->getVar('qty')),
                    'harga' => htmlspecialchars(str_replace(',', '', $this->request->getVar('harga'))),
                ]);
                $this->isijurnal->save([
                    'no_jurnal' => $idpesanan,
                    'tgl_jurnal' => date('d-m-Y'),
                    'deskripsi' => 'Pesanan ' . htmlspecialchars($namacetakan)
                ]);
                $array = [
                    [
                        'jurnal_no' => $idpesanan,
                        'kode_akun' => '1-112',
                        'nominal' => htmlspecialchars(str_replace(',', '', $this->request->getVar('harga'))),
                        'd/c' => 'D'
                    ],
                    [
                        'jurnal_no' => $idpesanan,
                        'kode_akun' => '4-115',
                        'nominal' => htmlspecialchars(str_replace(',', '', $this->request->getVar('harga'))),
                        'd/c' => 'C'
                    ]
                ];
                foreach ($array as $r) {
                    $this->jurnal->save($r);
                }
                $msg = [
                    'sukses' => 'Data berhasil ditambahkan'
                ];
            }
            echo json_encode($msg);
        }
    }

    public function list_pesanan()
    {
        $data = [
            'title' => 'List Pesanan',
            'pesanan' => $this->pesanan->findAll()
        ];
        return view('input/list-pesanan', $data);
    }
}
