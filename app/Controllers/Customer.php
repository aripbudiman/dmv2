<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CustomerModel;
use App\Models\Member;

class Customer extends BaseController
{
    protected $customer, $member;
    public function __construct()
    {
        $this->customer = new CustomerModel();
        $this->member = new Member();
    }
    public function index()
    {
        $data = [
            'title' => 'Customer',
            'customer' => $this->customer->findAll(),
            'member' => $this->member->findAll()
        ];
        return view('customer/index', $data);
    }

    public function simpancustomer()
    {
        if ($this->request->isAJAX()) {
            $namacustomer = $this->request->getVar('nama_customer');
            $idmember = $this->request->getVar('id_member');
            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'nama_customer' => [
                    'rules' => 'required|is_unique[customer.nama_customer]',
                    'label' => 'Nama customer',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} Sudah terdaftar'
                    ]
                ]
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'errorNama' => $validation->getError('nama_customer')
                    ]
                ];
            } else {
                $this->customer->save([
                    'nama_customer' => $namacustomer,
                    'id_member' => $idmember
                ]);
                $msg = [
                    'sukses' => 'Data berhasil ditambahkan'
                ];
            }
            echo json_encode($msg);
        }
    }
}
