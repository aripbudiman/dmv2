<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PaymentModel;
use App\Models\CustomerModel;
use App\Models\tmpPaymentModel;
use App\Models\TmpPesananModel;
use App\Models\IsijurnalModel;
use App\Models\JurnalModel;
use App\Models\Pesananinput;
use Dompdf\Dompdf;
use Dompdf\Options;

class Downpayment extends BaseController
{
    protected $payment, $customer, $tmpPesanan, $isijurnal, $jurnal;
    protected $tmpPayment;
    public function __construct()
    {
        $this->payment = new PaymentModel();
        $this->customer = new CustomerModel();
        $this->tmpPayment = new tmpPaymentModel();
        $this->tmpPesanan = new TmpPesananModel();
        $this->isijurnal = new IsijurnalModel();
        $this->jurnal = new JurnalModel();
        $this->pesanan = new Pesananinput();
    }
    public function index()
    {
        //
    }
}
