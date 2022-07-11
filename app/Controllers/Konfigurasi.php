<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Tipe;

class Konfigurasi extends BaseController
{
    protected $TipeModel;
    public function __construct()
    {
        $this->TipeModel = new Tipe();
    }
    public function index()
    {
        $data = [
            'title' => 'Tipe',
            'tipe' => $this->TipeModel->findAll()
        ];
        return view('konfigurasi/tipe', $data);
    }
}
