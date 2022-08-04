<?= $this->extend('layouts/index'); ?>
<?= $this->section('konten'); ?>

<div class="row mx-2">
    <div class="col">
        <div class="card card-outline card-dark shadow-sm" style="transition: all 0.15s ease 0s; height: inherit; width: inherit;">
            <div class="card-header">
                <h3 class="card-title"><?= $title; ?></h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-sm table-bordered" id="table-dp" style="width:100%">
                    <thead>
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Customer</th>
                            <th>No Payment</th>
                            <th>Sisa Piutang</th>
                            <th style="width:100px">Status</th>
                            <th style="width: 40px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($payment as $p) : ?>
                            <?php $diskon = ($p['harga'] * $p['discount'] / 100) ?>
                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td><?= $p['nama_customer']; ?></td>
                                <td><?= $p['no_payment']; ?></td>
                                <td><?= ($p['harga'] - $p['amount_pay'] - $diskon); ?></td>
                                <td>
                                    <div class="bg-info text-center color-palette"><span><?= $p['sts']; ?></span></div>
                                </td>
                                <td><a href="<?= base_url(); ?>/formPelunasan/<?= $p['index']; ?>" class="nav-link">Pelunasan</a></td>
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
        $('#table-dp').DataTable({
            "columnDefs": [{
                targets: 3,
                render: $.fn.dataTable.render.number('.', ',', 0, 'Rp ')
            }],
            scrollX: true,
        })
    });
</script>
<?= $this->endSection(); ?>