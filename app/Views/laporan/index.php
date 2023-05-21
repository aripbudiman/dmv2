<?= $this->extend('layouts/index'); ?>
<?= $this->section('konten'); ?>
<div class="row p-3">
    <div class="col">
        <div id="laporan_pendapatan" class="bg-white p-5">
            <h1>Laporan Pendapatan</h1>
            <form action="<?= base_url('laporan_pendapatan'); ?>" method="POST" class="row col-12">
                <?= csrf_field(); ?>
                <div class="col-4">
                    <label for="tgl_dari">Tanggal dari</label>
                    <input type="date" name="tgl_dari" id="tgl_dari" class="form-control">
                </div>
                <div class="col-4">
                    <label for="tgl_sampai">Tanggal sampai</label>
                    <input type="date" name="tgl_sampai" id="tgl_sampai" class="form-control">
                </div>
                <div class="col-4 align-self-end">
                    <button type="submit" class="btn btn-success">Download Excel</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>