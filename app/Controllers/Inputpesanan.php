<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Bahan;
use App\Models\Lebar;
use App\Models\Tipe;
use App\Models\Finishing;
use App\Models\CustomerModel;
use App\Models\PesananModel;

class Inputpesanan extends BaseController
{
    protected $bahan, $lebar, $tipe, $finishing, $customer, $pesanan;
    public function __construct()
    {
        $this->bahan = new Bahan();
        $this->lebar = new Lebar();
        $this->tipe = new tipe();
        $this->finishing = new Finishing();
        $this->customer = new CustomerModel();
        $this->pesanan = new PesananModel();
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
            'nopesanan' => $this->pesanan->nopesanan()
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
}
