<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PaymentModel;
use App\Models\CustomerModel;
use App\Models\TmpPaymentModel;
use App\Models\TmpPesananModel;
use App\Models\IsijurnalModel;
use App\Models\JurnalModel;
use App\Models\Pesananinput;
use App\Models\Voucher;
use Dompdf\Dompdf;
use Dompdf\Options;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class Laporan extends BaseController
{
    public function index(){
        return view('laporan/index',['title'=>'Laporan']);
    }

    public function pendapatan(){
    $tes = new PaymentModel();
    $dari =  $this->request->getVar('tgl_dari');
    $sampai =  $this->request->getVar('tgl_sampai');
    $data =$tes->getPendapatan($dari,$sampai);
    // dd($dari, $sampai);

    // return false;
        $spreadsheet = new Spreadsheet();
    // tulis header/nama kolom 
    $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A1', 'No Pesanan')
                ->setCellValue('B1', 'Tanggal')
                ->setCellValue('C1', 'Nama Customer')
                ->setCellValue('D1', 'Nama Cetakan')
                ->setCellValue('E1', 'Tipe')
                ->setCellValue('F1','Bahan')
                ->setCellValue('G1', 'Lebar')
                ->setCellValue('H1', 'Finishing')
                ->setCellValue('I1', 'Panjang')
                ->setCellValue('J1', 'Qty')
                ->setCellValue('K1', 'Harga')
                ->setCellValue('L1', 'Status Pembayaran');
    $column = 2;
    // tulis data mobil ke cell
    foreach($data as $data) {
        $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A' . $column, $data['no_pesanan'])
                    ->setCellValue('B' . $column, date('d/m/Y',strtotime($data['tgl'])))
                    ->setCellValue('C' . $column, $data['nama_customer'])
                    ->setCellValue('D' . $column, $data['nama_cetakan'])
                    ->setCellValue('E' . $column, $data['nama_tipe'])
                    ->setCellValue('F' . $column, $data['nama_bahan'])
                    ->setCellValue('G' . $column, $data['meter'])
                    ->setCellValue('H' . $column, $data['df'])
                    ->setCellValue('I' . $column, $data['panjang'])
                    ->setCellValue('J' . $column, $data['qty'])
                    ->setCellValue('K' . $column, $data['harga'])
                    ->setCellValue('L' . $column, $data['status']);
        $column++;
    }
    // tulis dalam format .xlsx
    $writer = new Xlsx($spreadsheet);
    $fileName = 'Laporan Pendapatan';

    // Redirect hasil generate xlsx ke web client
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename='.$fileName.'.xlsx');
    header('Cache-Control: max-age=0');

    $writer->save('php://output');
    }
}