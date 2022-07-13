<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Inputpesanan extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Input Pesanan'
        ];
        return view('input/index', $data);
    }
}
