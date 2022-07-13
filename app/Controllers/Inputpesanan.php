<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Bahan;
use App\Models\Lebar;
use App\Models\Tipe;

class Inputpesanan extends BaseController
{
    protected $bahan, $lebar, $tipe;
    public function __construct()
    {
        $this->bahan = new Bahan();
        $this->lebar = new Lebar();
        $this->tipe = new tipe();
    }
    public function index()
    {
        $data = [
            'title' => 'Input Pesanan',
            'bahan' => $this->bahan->findAll(),
            'lebar' => $this->lebar->getHargaLebar(1),
            'tipe' => $this->tipe->findAll()
        ];
        return view('input/index', $data);
    }

    public function loadlebar()
    {
        $id = $this->request->getPost('id');
        $lebar = $this->lebar->getHargaLebar($id);
        $output = '';
        foreach ($lebar as $l) {
            $output .= '<option value="' . $l['id'] . '">' . $l['meter'] . "Meter +" . $l['harga_lebar'] . '</option>';
        }
        echo json_encode($output);
    }
}
