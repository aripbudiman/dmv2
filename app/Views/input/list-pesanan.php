<?= $this->extend('layouts/index'); ?>
<?= $this->section('konten'); ?>
<div class="row mx-2">
    <div class="col-12 col-lg-8">
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
                <table class="table hover cell-border" id="list-pesanan">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">No</th>
                            <th scope="col">No Pesanan</th>
                            <th scope="col">Nama Cetakan</th>
                            <th scope="col">Ukuran</th>
                            <th scope="col">Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($pesanan as $p) : ?>
                            <tr data-no="<?= $p['no_pesanan']; ?>">
                                <th scope="row" class="text-center"><?= $no++; ?></th>
                                <td><?= $p['no_pesanan']; ?></td>
                                <td><?= $p['nama_cetakan']; ?></td>
                                <td><?= $p['panjang'] . 'Meter'; ?></td>
                                <td class="harga" data-a-sign="Rp. "><?= $p['harga']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- modal detail -->
<div class="modal" tabindex="-1">
    <div class="modal-dialog fade">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Pesanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Modal body text goes here.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#list-pesanan').DataTable()
        $('tr').click(function() {
            let nilai = $(this).data('no');
            alert(nilai)
        })
        $('.harga').autoNumeric('init', {
            aSep: ',',
            aDec: '.',
            mDec: '0'
        });
    });
</script>
<?= $this->endSection(); ?>