<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TmpPesananModel;
use App\Models\IsijurnalModel;
use App\Models\JurnalModel;
use App\Models\Pesananinput;
use App\Models\CustomerModel;
use App\Models\TransaksiManual as trxManual;
use App\Models\NewTrxManual as newTrxManual;
use Dompdf\Dompdf;
use Dompdf\Options;

class TransaksiManual extends BaseController
{
    protected $customer, $transaksiManual, $newTrxManual,$db;
    public  function __construct()
    {
        $this->customer = new CustomerModel();
        $this->transaksiManual = new trxManual();
        $this->newTrxManual = new newTrxManual();
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
        
        $data = [
            'title' => 'Transaksi Manual',
            'newTrxManual'=>$this->newTrxManual->findAll()
        ];
        return view('transaksimanual/index', $data);
    }

    public function createNewTransaksiManual(){
        $data = [
            'title'=>'Create New Transaksi Manual',
            'customer'=>$this->customer->findAll()
        ];
        return view('transaksimanual/create_new_transaksi',$data);
    }

    public function storeTransaksiManual(){
        $kode= 'TRX'.mt_rand();
        $pesanan = $this->request->getVar('nama_konsumen');
        $tgl = $this->request->getVar('tgl_trx');
        $this->newTrxManual->save([
            'nama_konsumen'=>$pesanan,
            'tgl_trx'=>$tgl,
            'kode_trx'=>$kode
        ]);
        //return redirect()->to('transaksi_manual');
		return $this->editTransaksiManual($kode);
    }

    public function editTransaksiManual($id){
        $data = [
            'title'=>'Transaksi Manual',
            'result'=> $this->newTrxManual->getTransaksi($id),
            'trx'=>$this->transaksiManual->getLoadTr($id)
        ];
        
        return view('transaksimanual/edit_transaksi',$data);
    }

    public function store_transaksi(){
        $this->transaksiManual->save([
            'nama_konsumen'=>$this->request->getVar('namaKonsumen'),
            'kode_trx'=>$this->request->getVar('kodeTrx'),
            'tgl_trx'=>$this->request->getVar('tglTrx'),
            'nama_pesanan'=>$this->request->getVar('namaPesanan'),
            'qty'=>$this->request->getVar('qty'),
            'harga_satuan'=>$this->request->getVar('satuan'),
            'jumlah'=>($this->request->getVar('qty') * $this->request->getVar('satuan')),
        ]);

        $table = '<tr>
        <th scope="row">#</th>
        <td><input type="text" class="w-100" id="nama_pesanan"></td>
        <td><input type="text" class="w-100" id="qty"></td>
        <td><input type="text" class="w-100" id="satuan"></td>
        <td></td>
        <td><button class="btn btn-secondary" id="tambah">Tambah</button></td>
    </tr>';
        $msg = [
            'success'=>'Berhasil ditambahkan!',
            'table'=>$table
        ];
        echo json_encode($msg);
    }

    public function load_tr($kode){
        $data = [
            'trx'=> $this->transaksiManual->getLoadTr($kode)
        ];
        
        return view('transaksimanual/load_tr',$data);
    }

    public function delete(){
        $id =$this->request->getVar('id');
        $this->transaksiManual->delete($id);
        $msg =[
            'success'=>'Data berhasil dihapus!'
        ];
        echo json_encode($msg);
    }

    public function cetak($kode){
        // instantiate and use the dompdf class
        $data = [
            'trx'=>$this->transaksiManual->getLoadTr($kode)
        ];
        $data = view('transaksimanual/cetak',$data);
        $options = new Options();
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($data);
        // (Optional) Setup the paper size and orientation
        $dompdf->render();
        $this->response->setContentType('application/pdf');
        // Output the generated PDF to Browser
        $dompdf->stream("Cetakan", array("Attachment" => false));
    }
}