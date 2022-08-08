<?= $this->extend('layouts/index'); ?>
<?= $this->section('konten'); ?>
<div class="row mx-2">
    <div class="col-12 col-lg-10">
        <div class="card card-dark text-dark">
            <div class="card-header">
                <h3 class="card-title"><?= $title; ?></h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="card-refresh" data-source="widgets.html" data-source-selector="#card-refresh-content" data-load-on-init="false">
                        <i class="fas fa-sync-alt"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="maximize">
                        <i class="fas fa-expand"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-lg-4">
                        <div class="form-group d-flex">
                            <label for="akun" class="col-4">Akun</label>
                            <input type="text" class="form-control rounded-0 mr-3">
                            <button class="btn bg-navy rounded-0">...</button>
                        </div>
                        <div class="form-group d-flex flex-wrap">
                            <label for="" class="col-4">Tanggal</label>
                            <input type="date" name="dari" id="dari" class="form-control rounded-0">
                            s/d
                            <input type="date" name="sampai" id="sampai" class="form-control rounded-0">
                        </div>
                        <div class="form-group d-flex">
                            <label for="" class="col-4"></label>
                            <button class="btn bg-success rounded-0">Tampilkan</button>
                            <button class="btn bg-success rounded-0 mx-1">Excel</button>
                            <button class="btn bg-success rounded-0">PDF</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    <?= $this->endSection(); ?>