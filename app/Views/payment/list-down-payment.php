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
                <table class="table table-bordered" id="table-dp">
                    <thead>
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Customer</th>
                            <th>No Payment</th>
                            <th style="width: 40px">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($payment as $p) : ?>
                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td><?= $p['no_pesanan']; ?></td>
                                <td>
                                    <div class="progress progress-xs">
                                        <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                                    </div>
                                </td>
                                <td><span class="badge bg-danger">pelunasan</span></td>
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

        })
    });
</script>
<?= $this->endSection(); ?>