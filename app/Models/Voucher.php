<?php

namespace App\Models;

use CodeIgniter\Model;

class Voucher extends Model
{
    protected $table            = 'voucher';
    protected $allowedFields    = ['no_voucher', 'no_pesanan', 'indexPay', 'v_status'];


    public function noVoucher()
    {
        $kode = $this->db->table('voucher')
            ->select('max(right(no_voucher,5)) as kode', FALSE)
            ->orderBy('no_voucher', 'DESC')
            ->limit(1)->get()->getRowArray();

        if ($kode['kode'] == NULL) {
            $no = 1;
        } else {
            $no = intval($kode['kode']) + 1;
        }
        $barang = 'V';
        $batas = str_pad($no, 5, "0", STR_PAD_LEFT);
        $kodebarang = $barang . '-' . $batas;
        return $kodebarang;
    }
}
