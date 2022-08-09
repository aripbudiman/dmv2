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
        // dd($this->jurnal->saldoAkhir('accounts receivable'));
        // dd($this->jurnal->getJurnal('accounts receivable', '2022-07-21', '2022-07-31'));
        $data = [
            'title' => 'Jurnal Umum',
            'akun' => $this->jurnal->getAkun()
        ];
        return view('jurnal/list_jurnal_transaksi', $data);
    }

    public function getJurnalUmum()
    {
        $namaAkun = $this->request->getVar('nama_akun');
        $tglDari = $this->request->getVar('tgl_dari');
        $tglSampai = $this->request->getVar('tgl_sampai');
        $saldo = $this->jurnal->saldoAkhir($namaAkun);
        $data = $this->jurnal->getJurnal($namaAkun, $tglDari, $tglSampai);
        $json = [
            'data' => view('jurnal/load-list-jurnal', [
                'list' => $data,
                'saldoAkhir' => $saldo
            ])
        ];
        echo json_encode($json);
    }
}
