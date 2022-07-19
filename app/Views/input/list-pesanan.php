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
<!-- Modal -->
<?= $this->include('input/modal-detail-pesanan'); ?>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $('#list-pesanan').DataTable()
        $('tr').click(function() {
            let nilai = $(this).data('no');
            $.ajax({
                type: "post",
                url: "load-detail-pesanan",
                data: {
                    'nopesanan': nilai
                },
                dataType: "json",
                success: function(response) {

                }
            });
            $('#detail-pesanan').modal('show')
        })
        $('.harga').autoNumeric('init', {
            aSep: ',',
            aDec: '.',
            mDec: '0'
        });
    });
</script>
<?= $this->endSection(); ?>