<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Jenis extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Jenis'
        ];
        return view('jenis/index', $data);
    }
}
