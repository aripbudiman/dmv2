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
                <table class="table hover" id="list-pesanan">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">No</th>
                            <th scope="col">No Pesanan</th>
                            <th scope="col">Nama Cetakan</th>
                            <th scope="col">Panjang</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Payment Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($pesanan as $p) : ?>
                            <tr>
                                <th scope="row" class="text-center"><?= $no++; ?></th>
                                <td><?= $p['no']; ?></td>
                                <td><?= $p['nama_cetakan']; ?></td>
                                <td><?= $p['panjang'] . ' Meter'; ?></td>
                                <td class="harga"><?= $p['harga']; ?></td>
                                <td><?= ($p['sts'] == 'unpaid') ? '<span class="badge rounded-pill bg-danger">Unpaid</span>' : (($p['sts'] == 'pending') ? '<span class="badge rounded-pill bg-warning">Pending</span>' : ((($p['sts'] == 'down payment')) ? '<span class="badge rounded-pill bg-info">Down Payment</span>' : '<span class="badge rounded-pill bg-success">Paid</span>')); ?></td>
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
        $("#list-pesanan").DataTable({
            columnDefs: [{
                targets: 4,
                render: $.fn.dataTable.render.number('.', ',', 0, 'Rp ')
            }]
        })
        // fungsi format rupiah
        $('.harga').autoNumeric('init', {
            aSep: ',',
            aDec: '.',
            mDec: '0'
        });
    });
</script>
<?= $this->endSection(); ?>