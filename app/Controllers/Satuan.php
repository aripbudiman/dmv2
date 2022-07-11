<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Satuan extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Satuan'
        ];
        return view('satuan/index', $data);
    }
}
