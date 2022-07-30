<?php

namespace App\Models;

use CodeIgniter\Model;

class JurnalModel extends Model
{
    protected $table            = 'jurnal';
    protected $allowedFields    = ['jurnal_no', 'kode_akun', 'nominal', 'd/c'];

    public function getJurnal()
    {
        return $this->db->table('jurnal')
            ->select('*')
            ->join('isi_jurnal', 'jurnal.jurnal_no=isi_jurnal.no_jurnal')
            ->join('akun', 'jurnal.kode_akun=akun.nomor_akun')
            ->get()
            ->getResultArray();
    }
}
