<?= $this->extend('layouts/index'); ?>
<?= $this->section('konten'); ?>

<div class="row mx-2">
    <div class="col-12 col-lg-6">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Tambah Pesanan</h3>

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
                The body of the card
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>