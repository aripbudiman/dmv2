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


class Payment extends BaseController
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
        $data = [
            'title' => 'Payment',
            'nopayment' => $this->payment->nopayment(),
            'customer' => $this->customer->findAll(),
            'transaksi' => $this->tmpPayment->findAll(),
            'tmpPayment' => $this->tmpPayment->getTmpPayment(),
            'tanggal' => date("Y-m-d H:i:s"),
            'index' => $this->payment->indexPayment()
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
            'tmpPayment' => $this->tmpPayment->getTmpPayment()
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


    public function cashPayment()
    {
        if ($this->request->isAJAX()) {
            $dis = ($this->request->getVar('discount') == '') ? 0 : $this->request->getVar('discount');
            $noPesanan = $this->request->getVar('noPesanan');
            $indexPay = $this->request->getVar('indexPay');
            $idpesanan = $this->pesanan->idpesanan();
            $totalHarga = str_replace(',', '', $this->request->getVar('totalHarga'));
            $amount = str_replace('.', '', $this->request->getVar('amount_pay'));
            $diskon = ($totalHarga * $dis  / 100);
            $noPayment = $this->request->getVar('no_payment');

            //========( payment )========>
            $amount = str_replace('.', '', $this->request->getVar('amount'));
            $amountPay = str_replace('.', '', $this->request->getVar('amount_pay'));
            if ($amount < $amountPay) {
                $msg = [
                    'error' => 'Nominal uang tidak cukup!'
                ];
            } else {
                //========( update status tmp_pesanan )========>
                foreach ($noPesanan as $no) {
                    $this->tmpPesanan->set('status', 'paid')->where('no_pesanan', $no)->update();
                }

                //========( update tmp_payment )========>
                foreach ($noPesanan as $no) {
                    $this->tmpPayment->set('status', 'paid')->where('no_pesanan', $no)->update();
                    $this->tmpPayment->set('indexPay', $indexPay)->where('no_pesanan', $no)->update();
                }

                //========( jurnal isi )========>
                $this->isijurnal->save([
                    'no_jurnal' => $idpesanan,
                    'tgl_jurnal' => $this->request->getVar('trx_date'),
                    'deskripsi' => 'Payment a/n ' . htmlspecialchars($this->request->getVar('customer-cp')) . ' (' . htmlspecialchars($this->request->getVar('no_payment')) . ')'
                ]);
                if ($diskon === 0) {
                    $array = [
                        [
                            'jurnal_no' => $idpesanan,
                            'kode_akun' => '1-113',
                            'nominal' => $amountPay,
                            'd/c' => 'D'
                        ],
                        [
                            'jurnal_no' => $idpesanan,
                            'kode_akun' => '1-112',
                            'nominal' => $totalHarga,
                            'd/c' => 'C'
                        ]
                    ];
                    //========( jurnal )========>
                    foreach ($array as $r) {
                        $this->jurnal->save($r);
                    }
                } else {
                    $array = [
                        [
                            'jurnal_no' => $idpesanan,
                            'kode_akun' => '1-113',
                            'nominal' => $amountPay,
                            'd/c' => 'D'
                        ],
                        [
                            'jurnal_no' => $idpesanan,
                            'kode_akun' => '5-116',
                            'nominal' => $diskon,
                            'd/c' => 'D'
                        ],
                        [
                            'jurnal_no' => $idpesanan,
                            'kode_akun' => '1-112',
                            'nominal' => $totalHarga,
                            'd/c' => 'C'
                        ]
                    ];
                    //========( jurnal )========>
                    foreach ($array as $r) {
                        $this->jurnal->save($r);
                    }
                }

                //========( end jurnal payment )========>
                $this->payment->save([
                    'no_payment' => $this->request->getVar('no_payment'),
                    'indexPay' => $indexPay,
                    'harga_kotor' => $totalHarga,
                    'amount' => str_replace('.', '', $this->request->getVar('amount')),
                    'amount_pay' => str_replace('.', '', $this->request->getVar('amount_pay')),
                    'discount' => $this->request->getVar('discount'),
                    'trx_date' => $this->request->getVar('trx_date')
                ]);
                $msg = [
                    'sukses' => 'Pembayaran berhasil dilakukan, Terimakasih!'
                ];
            }
            echo json_encode($msg);
        } else {
            exit('maaf tidak bisa dilanjutkan');
        }
    }


    public function getBill()
    {
        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $tes = [
            'tmpPayment' => $this->tmpPayment->getTmpPayment()
        ];
        $data = view('payment/bill', $tes);
        $dompdf->loadHtml($data);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'potrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream("", array("Attachment" => false));
        // $this->filename, array("Attachment" => false)
    }

    public function historyPayment()
    {
        $data = [
            'title' => 'History Payment',
            'payment' => $this->payment->findAll()
        ];
        return view('payment/history_payment', $data);
    }

    public function strukPembayaran($noPayment)
    {
        // dd($this->payment->getStruk($noPayment));
        $data = [
            'title' => 'StrukPembayaran' . time(),
            'payment' => $this->payment->getStruk($noPayment)
        ];
        $view = view('payment/invoice-pembayaran', $data);
        $options = new Options();
        // $options->set('defaultFont', '');
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($view);
        // Render the HTML as PDF
        $dompdf->render();
        $this->response->setContentType('application/pdf');
        // Output the generated PDF to Browser
        $dompdf->stream("Laporan Pesanan", array("Attachment" => false));
    }

    public function down_payment()
    {
        if ($this->request->isAJAX()) {

            $noPesanan = $this->request->getVar('noPesanan');
            $totalHarga = $this->request->getVar('totalHarga');
            $jumlahUang = str_replace('.', '', $this->request->getVar('jumlahUang'));
            $totalBayar = str_replace('.', '', $this->request->getVar('totalBayar'));
            $sisaPiutang = str_replace('.', '', $this->request->getVar('sisaPiutang'));
            $indexPay = $this->request->getVar('indexPay');
            $idpesanan = $this->pesanan->idpesanan();
            $dis = $this->request->getVar('diskon');
            $diskon = ($totalHarga * $dis / 100);

            //========( update status tmp_pesanan menjadi down payment )========>
            foreach ($noPesanan as $no) {
                $this->tmpPesanan->set('status', 'down payment')->where('no_pesanan', $no)->update();
            }
            //========( update status tmp_payment menjadi down payment )========>
            foreach ($noPesanan as $no) {
                $this->tmpPayment->set('status', 'down payment')->where('no_pesanan', $no)->update();
                $this->tmpPayment->set('indexPay', $indexPay)->where('no_pesanan', $no)->update();
            }
            //========( jurnal isi )========>
            $this->isijurnal->save([
                'no_jurnal' => $idpesanan,
                'tgl_jurnal' => $this->request->getVar('trx_date'),
                'deskripsi' => 'Downpayment a/n ' . htmlspecialchars($this->request->getVar('dpCustomer')) . ' (' . htmlspecialchars($this->request->getVar('no_payment')) . ')'
            ]);
            if ($diskon === 0) {
                $array = [
                    [
                        'jurnal_no' => $idpesanan,
                        'kode_akun' => '1-113',
                        'nominal' => $jumlahUang,
                        'd/c' => 'D'
                    ],
                    [
                        'jurnal_no' => $idpesanan,
                        'kode_akun' => '1-112',
                        'nominal' => $jumlahUang,
                        'd/c' => 'C'
                    ]
                ];
                //========( jurnal )========>
                foreach ($array as $r) {
                    $this->jurnal->save($r);
                }
            } else {
                $array = [
                    [
                        'jurnal_no' => $idpesanan,
                        'kode_akun' => '1-113',
                        'nominal' => $jumlahUang,
                        'd/c' => 'D'
                    ],
                    [
                        'jurnal_no' => $idpesanan,
                        'kode_akun' => '5-116',
                        'nominal' => $diskon,
                        'd/c' => 'D'
                    ],
                    [
                        'jurnal_no' => $idpesanan,
                        'kode_akun' => '1-112',
                        'nominal' => $jumlahUang + $diskon,
                        'd/c' => 'C'
                    ]
                ];
                //========( jurnal )========>
                foreach ($array as $r) {
                    $this->jurnal->save($r);
                }
            }
            $this->payment->save([
                'no_payment' => $this->request->getVar('no_payment'),
                'indexPay' => $indexPay,
                'harga_kotor' => $totalHarga,
                'amount' => $jumlahUang,
                'amount_pay' => $jumlahUang,
                'discount' => $this->request->getVar('diskon'),
                'trx_date' => $this->request->getVar('trx_date')
            ]);
            $msg = [
                'sukses' => "Pembayaran berhasil dilakukan, Terimakasih"
            ];
            echo json_encode($msg);
        } else {
            exit('maaf tidak bisa dilanjutkan');
        }
    }

    public function listDownPayment()
    {
        // dd($this->tmpPayment->getListDp());
        $data = [
            'title' => 'List down payment',
            'payment' => $this->tmpPayment->getListDp()
        ];
        return view('payment/list-down-payment', $data);
    }

    public function formPelunasan()
    {
        $data = ['title' => 'form pelunasan'];
        return view('payment/form-pelunasan', $data);
    }
}
