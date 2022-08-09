<?php

namespace App\Models;

use CodeIgniter\Model;

class JurnalModel extends Model
{
    protected $table            = 'jurnal';
    protected $allowedFields    = ['jurnal_no', 'kode_akun', 'nominal', 'd/c'];

    public function getJurnal($nama_akun, $tgl_dari, $tgl_sampai)
    {
        return $this->db->table('jurnal')
            ->select('tgl_jurnal,nama_akun,nominal,kode_akun,d/c as ket,deskripsi')
            ->join('isi_jurnal', 'jurnal.jurnal_no=isi_jurnal.no_jurnal')
            ->join('akun', 'jurnal.kode_akun=akun.nomor_akun')
            ->where('nama_akun', $nama_akun)
            ->where('tgl_jurnal >=', $tgl_dari)
            ->where('tgl_jurnal <=', $tgl_sampai)
            ->get()
            ->getResultArray();
    }

    public function getAkun()
    {
        return $this->db->table('akun')
            ->select('*')
            ->get()
            ->getResultArray();
    }

    public function saldoAkhir($nama_akun)
    {
        return $this->db->table('jurnal')
            ->select('sum(nominal) as nominal, d/c as ket,left(kode_akun,1)as kode')
            ->join('akun', 'jurnal.kode_akun=akun.nomor_akun')
            ->where('nama_akun', $nama_akun)
            ->get()
            ->getResultArray();
    }
}
