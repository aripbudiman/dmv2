<?= $this->extend('layouts/index'); ?>
<?= $this->section('konten'); ?>
<div class="row">
    <div class="col">
    <div class="container mb-2">
            <a href="<?= base_url('transaksi_manual'); ?>" class="btn btn-danger"><i class="fa-solid fa-left-long"></i> Kembali</a>
        </div>
        <div class="container bg-white p-3">
            <p><?= $title; ?></p>
            <hr>
            <form action="storeTransaksiManual" method="POST">
                <?= csrf_field(); ?>
                <div class="mb-3">
                    <label for="nama_konsumen" class="form-label">Nama Konsumen</label>
                    <select name="nama_konsumen" id="nama_konsumen" class="form-control">
                        <?php foreach($customer as $customer): ?>
                        <option value="<?= $customer['nama_customer']; ?>"><?= $customer['nama_customer']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="tgl_trx" class="form-label">Tanggal Pesanan</label>
                    <input type="date" class="form-control" id="tgl_trx" name="tgl_trx">
                </div>
                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-save"></i> Simpan</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>