<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PaymentModel;
use App\Models\CustomerModel;

class Payment extends BaseController
{
    protected $payment, $customer;
    public function __construct()
    {
        $this->payment = new PaymentModel();
        $this->customer = new CustomerModel();
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
}
