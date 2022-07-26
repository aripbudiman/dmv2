<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PaymentModel;
use App\Models\CustomerModel;
use App\Models\tmpPaymentModel;
use App\Models\TmpPesananModel;

class Payment extends BaseController
{
    protected $payment, $customer, $tmpPayment, $tmpPesanan;
    public function __construct()
    {
        $this->payment = new PaymentModel();
        $this->customer = new CustomerModel();
        $this->tmpPayment = new tmpPaymentModel();
        $this->tmpPesanan = new TmpPesananModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Payment',
            'nopayment' => $this->payment->nopayment(),
            'customer' => $this->customer->findAll(),
            'tmpPayment' => $this->tmpPayment->findAll(),
            'tanggal' => date("d-m-Y H:i:s")
        ];
        return view('payment/index', $data);
    }

    public function loadcs()
    {
        $customer = $this->request->getVar('customer');
        $pesanan = $this->payment->loadCustomer($customer);
        $output = '';
        $no = 1;
        foreach ($pesanan as $p) {
            $output .= '<tr>
                        <th scope="row" class="text-center">' . $no++ . '</th>
                        <td>' . $p['nama_cetakan'] . '</td>
                        </tr>';
        }
        echo json_encode($output);
    }

    public function load_troli()
    {
        $customer = $this->request->getVar('customer');
        $data = $this->payment->loadTroli($customer);
        if ($data != null) {
            $json = [
                'data' => view('payment/load-troli', [
                    'tampildata' => $data
                ])
            ];
            echo json_encode($json);
        } else {
            $json = [
                'error' => 'Tidak ada pesanan'
            ];
        }
    }
    public function postTmpPayment()
    {
        if ($this->request->isAJAX()) {
            if (!$this->validate([
                'no_pesanan' => 'required|is_unique[tmp_payment.no_pesanan]'
            ])) {
                $noPesanan = $this->request->getVar('noPesanan');
                $jmlData = count($noPesanan);
                for ($i = 0; $i < $jmlData; $i++) {
                    $this->tmpPayment->insert([
                        'no_pesanan' => $noPesanan[$i]
                    ]);
                    $this->tmpPesanan->set('status', 'pending')->where('no_pesanan', $noPesanan[$i])->update();
                }
                $msg = [
                    'sukses' => 'Data berhasil ditambahkan'
                ];
            }
            echo json_encode($msg);
        } else {
            exit('Maaf tidak bisa dilanjutklan!');
        }
    }

    public function loadTmpPayment()
    {
        $data = [
            'tmpPayment' => $this->tmpPayment->getTmpPayment()
        ];
        return view('payment/tmp-payment-detail', $data);
    }

    public function loadListTmpPayment()
    {
        $data = [
            'tmpPayment' => $this->tmpPayment->findAll()
        ];

        return view('payment/list-tmp-payment', $data);
    }

    public function deleteTmpPayment()
    {
        if ($this->request->isAJAX()) {
            $noPesanan = $this->request->getVar('noPesanan');
            $jmlData = count($noPesanan);
            for ($i = 0; $i < $jmlData; $i++) {
                $this->tmpPayment->where('no_pesanan', $noPesanan[$i])->delete();
                $this->tmpPesanan->set('status', 'unpaid')->where('no_pesanan', $noPesanan[$i])->update();
            }
            $msg = [
                'sukses' => 'Data berhasil ditambahkan'
            ];

            echo json_encode($msg);
        } else {
            exit('Maaf tidak bisa dilanjutkan');
        }
    }
}
