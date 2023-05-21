<?= $this->extend('layouts/index'); ?>
<?= $this->section('konten'); ?>
<div class="row">
    <div class="col">
        <div class="container mb-2">
        <a href="<?= base_url('transaksi_manual'); ?>" class="btn btn-danger"><i class="fa-solid fa-left-long"></i> Kembali</a>
        <a href="<?= base_url('new_transaksi_manual'); ?>" class="btn btn-warning"><i class="fa-solid fa-plus"></i>
            Tambah transaksi manual</a>
            </div>
        <div class="container bg-white p-3">
            Transaksi Manual
            <hr>
            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th scope="col" class="text-center">No</th>
                        <th scope="col">No Faktur</th>
                        <th scope="col">Customer</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Detail Transaksi</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach($newTrxManual as $trx): ?>
                    <tr>
                        <th scope="row" class="text-center"><?= $no++; ?></th>
                        <td><?= $trx['kode_trx']; ?></td>
                        <td><?= $trx['nama_konsumen']; ?></td>
                        <td><?= date('d F Y',strtotime($trx['tgl_trx'])); ?></td>
                        <td>
                            <a href="<?= base_url(); ?>/detail_transaksi/<?= $trx['kode_trx']; ?>" class="btn btn-warning"><i class="fa-brands fa-wpforms"></i></a>
                        </td>
                        <td>
                            <a href="<?= base_url('cetak'); ?>/<?= $trx['kode_trx']; ?>" target="_blank" class="btn btn-primary"><i class="fa-solid fa-print"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>