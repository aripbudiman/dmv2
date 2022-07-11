<?= $this->extend('layouts/index'); ?>
<?= $this->section('konten'); ?>
<div class="row mx-2">
    <div class="col-12 col-xl-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tambah</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="nama_satuan">Nama Jenis</label>
                            <input type="text" class="form-control" id="nama_jenis">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" id="tambah-jenis">Tambah</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-xl-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><?= $title; ?></h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Jenis</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td><button class="btn btn-danger">Delete</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>