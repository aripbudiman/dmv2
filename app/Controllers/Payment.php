<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PaymentModel;

class Payment extends BaseController
{
    protected $payment;
    public function __construct()
    {
        $this->payment = new PaymentModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Payment',
            'nopayment' => $this->payment->nopayment()
        ];
        return view('payment/index', $data);
    }
}
