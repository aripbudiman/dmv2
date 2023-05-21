<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TmpPesananModel;
use App\Models\IsijurnalModel;
use App\Models\JurnalModel;
use App\Models\Pesananinput;

class TmpPesanan extends BaseController
{
    protected $tmpPesanan, $isijurnal, $jurnal;
    public function __construct()
    {
        $this->tmpPesanan = new TmpPesananModel();
        $this->isijurnal = new IsijurnalModel();
        $this->jurnal = new JurnalModel();
        $this->pesanan = new Pesananinput();
    }

    public function index()
    {
        $data = [
            'title' => 'List Pesanan',
            'pesanan' => $this->tmpPesanan->getTmpPesanan()
        ];
        return view('tmp_pesanan/index', $data);
    }

    public function approve()
    {
        $no = $this->request->getVar('noPesanan');
        $status = $this->request->getVar('status');
        $nama = $this->request->getVar('customer');
        $namacetakan = $this->request->getVar('namaCetakan');
        $idpesanan = $this->pesanan->idpesanan();

        //========( proses jurnal pesanan )========>
        //========( isi jurnal )========>
        $this->isijurnal->save([
            'no_jurnal' => $idpesanan,
            'tgl_jurnal' => $this->request->getVar('tanggal'),
            'deskripsi' => 'Pesanan no ' . $no . ' a/n ' . htmlspecialchars($nama) . ' (' . htmlspecialchars($namacetakan) . ')'
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
        //========( jurnal )========>
        foreach ($array as $r) {
            $this->jurnal->save($r);
        }
        //========( end jurnal )========>

        // update status pesanan ketika sudah di approve
        $this->pesanan->updatePesanan('A', $no);
        // masukan pesanan ke tmp_pesanan
        $response = $this->tmpPesanan->save([
            'no_pesanan' => $no,
            'status' => $status
        ]);
        echo json_encode($response);
    }

    public function pembatalanPesanan(){
        $data = [
            'title'=>'Pembatalan pesanan'
        ];
        return view('tmp_pesanan/pembatalan_pesanan',$data);
    }

    public function testQuerY(){
        dd($this->tmpPesanan->getProsesPembatalanPesanan('DMP0003'));
    }

    public function proses_pembatalan(){
        $nopesanan = $this->request->getVar('nopesanan');
        $data = $this->tmpPesanan->getProsesPembatalanPesanan($nopesanan);
        $msg = [
            'sukses'=>$data
        ];
        echo json_encode($msg);
    }

    public function batalkan(){
        $nopesanan = $this->request->getVar('nopesanan');
        $this->tmpPesanan->set('status','batal')->where('no_pesanan',$nopesanan)->update();

        return redirect()->to('/list_pesanan');
    }
}
