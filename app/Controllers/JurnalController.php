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
        // dd($this->jurnal->getJurnal('accounts receivable', '2022-07-21', '2022-07-31'));
        $data = [
            'title' => 'List jurnal transaksi',
            'akun' => $this->jurnal->getAkun()
        ];
        return view('jurnal/list_jurnal_transaksi', $data);
    }

    public function getJurnalUmum()
    {
        $namaAkun = $this->request->getVar('nama_akun');
        $tglDari = $this->request->getVar('tgl_dari');
        $tglSampai = $this->request->getVar('tgl_sampai');
        $data = $this->jurnal->getJurnal($namaAkun, $tglDari, $tglSampai);
        // $no = 1;
        // $output = '';
        // foreach ($data as $d) {
        //     $output .= '<tr>
        //                 <td>' . $no++ . '</td>
        //                 <td>' . $d['tgl_jurnal'] . '</td>
        //                 <td>' . $d['deskripsi'] . '</td>
        //                 <td>' . ($d['ket'] == 'D') ? $d['nominal'] : 0 . '</td>
        //                 <td>hayy</td>
        //                 </tr>';
        // }
        echo json_encode($data);
    }
}
