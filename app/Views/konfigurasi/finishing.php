<?= $this->extend('layouts/index'); ?>
<?= $this->section('konten'); ?>
<div class="row mx-2">
    <div class="col-12 col-lg-4">
        <div class="card card-outline card-dark">
            <div class="card-header">
                <h3 class="card-title">Tambah</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <?= form_open('/simpanfinishing', ['class' => 'formsimpan']); ?>
                <div class="mb-2">
                    <label for="deskripsi_finishing">Deskripsi</label>
                    <input type="text" class="form-control" name="deskripsi_finishing" id="deskripsi_finishing">
                    <div class="invalid-feedback error-deskripsi_finishing">

                    </div>
                </div>
                <div class="mb-2">
                    <label for="harga_finsihing">Harga</label>
                    <input type="text" class="form-control" name="harga_finishing" id="harga_finishing">
                    <div class="invalid-feedback error-harga_finishing">

                    </div>
                </div>
                <div class="mb-2">
                    <button class="btn btn-primary" id="tambah-finishing">Tambahkan</button>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-8">
        <div class="card card-outline card-dark">
            <div class="card-header">
                <h3 class="card-title"><?= $title; ?></h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body" id="load-table-finishing">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($finishing as $f) : ?>
                            <tr>
                                <th scope="row"><?= $no++; ?></th>
                                <td><?= $f['deskripsi_finishing']; ?></td>
                                <td class="td"><?= $f['harga_finishing']; ?></td>
                                <td></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.td').autoNumeric('init', {
            aSep: ',',
            aDec: '.',
            mDec: '0'
        });
    });
</script>
<?= $this->endSection(); ?>