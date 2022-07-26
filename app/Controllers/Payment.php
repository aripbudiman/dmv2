<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PaymentModel;
use App\Models\CustomerModel;
use App\Models\tmpPaymentModel;

class Payment extends BaseController
{
    protected $payment, $customer, $tmpPayment;
    public function __construct()
    {
        $this->payment = new PaymentModel();
        $this->customer = new CustomerModel();
        $this->tmpPayment = new tmpPaymentModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Payment',
            'nopayment' => $this->payment->nopayment(),
            'customer' => $this->customer->findAll()
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
        $data = $this->tmpPayment->findAll();
        foreach ($data as $d) {
            if ($d['no_pesanan'] == $this->request->getVar('noPesanan')) {
                $json = [
                    'error' => 'data sudah ada! silahkan cek lagi'
                ];
                return false;
            } else {
                $json = [
                    'data' => $this->tmpPayment->save([
                        'no_pesanan' => $this->request->getVar('noPesanan'),
                        'status' => "pending"
                    ])
                ];
            }
        }
        echo json_encode($json);
    }

    public function loadTmpPayment()
    {
        $data = [
            'tmpPayment' => $this->tmpPayment->getTmpPayment()
        ];
        return view('payment/tmp-payment-detail', $data);
    }
}
