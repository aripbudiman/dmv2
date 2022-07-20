<?php

namespace App\Models;

use CodeIgniter\Model;

class PaymentModel extends Model
{
    protected $table            = 'payment';
    protected $allowedFields    = ['id_pesanan', 'no_payment', 'amount', 'discount', 'trx_date'];

    public function nopayment()
    {
        $kode = $this->db->table('payment')
            ->select('max(right(no_payment,4)) as kode', FALSE)
            ->orderBy('no_payment', 'DESC')
            ->limit(1)->get()->getRowArray();

        if ($kode['kode'] == NULL) {
            $no = 1;
        } else {
            $no = intval($kode['kode']) + 1;
        }
        $barang = 'PY' . date('dmy');
        $batas = str_pad($no, 3, "0", STR_PAD_LEFT);
        $kodebarang = $barang . $batas;
        return $kodebarang;
    }
}
