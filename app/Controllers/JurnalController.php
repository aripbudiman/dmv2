<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\JurnalModel;

class JurnalController extends BaseController
{
    protected $jurnal;
    public function __construct()
    {
        $this->jurnal = new JurnalModel();
    }

    public function listJurnalTransaksi()
    {
        $data = [
            'title' => 'List jurnal transaksi',
            'jurnals' => $this->jurnal->getJurnal()
        ];
        return view('jurnal/list_jurnal_transaksi', $data);
    }

    public function index()
    {
        //
    }
}
