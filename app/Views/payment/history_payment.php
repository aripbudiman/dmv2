<?= $this->extend('layouts/index'); ?>
<?= $this->section('konten'); ?>
<div class="row mx-2">
    <div class="col-12 col-lg-6 col-xl-4">
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
                <?php foreach ($transaksi as $t) : ?>
                    <div class="info-box">
                    <span class="info-box-icon bg-teal"><a href="<?= base_url(); ?>/get_invoice_cp/<?= $t['no_pay']; ?>" target="_blank"><i class="fa-solid fa-money-bill-transfer"></i></a></span>
                        <!-- <span class="info-box-icon bg-teal"><i class="fa-solid fa-money-bill-transfer"></i></span> -->
                        <div class="info-box-content">
                            <span class="info-box-text"><?= $t['n']; ?></span>
                            <span class="info-box-text"><?= date('d M Y', strtotime($t['t'])); ?></span>
                        </div>
                        <div class="info-box-content">
                            <h4 class="text-bold text-right"><?= number_format($t['a'], 0, ',', '.'); ?></h4>
                            <span class="info-box-text text-right text-<?= ($t['s'] == 'paid') ? 'teal' : (($t['s'] == 'repayment') ? 'navy' : 'danger') ?>"><?= $t['s']; ?></span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<script>
    <?= $this->endSection(); ?>