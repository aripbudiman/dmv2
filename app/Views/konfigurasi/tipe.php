<?= $this->extend('layouts/index'); ?>
<?= $this->section('konten'); ?>
<div class="row mx-2">
    <div class="col-12 col-lg-6">
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
                <input type="text">
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-6">
        <div class="card card-outline card-dark">
            <div class="card-header">
                <h3 class="card-title"><?= $title; ?></h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Tipe</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($tipe as $t) : ?>
                            <tr>
                                <th scope="row"><?= $no++; ?></th>
                                <td><?= $t['nama_tipe']; ?></td>
                                <td><?= $t['harga_tipe']; ?></td>
                                <td>
                                    <a href="" class="btn btn-sm btn-success"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>