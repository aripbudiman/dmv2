<?= $this->extend('layouts/index'); ?>
<?= $this->section('konten'); ?>
<div class="row mx-2">
    <div class="col-12">
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
                <div class="input-group col-7">
                <input type="text" class="form-control rounded-0" id="cari-nopesanan" placeholder="No Pesanan">
                <button class="btn btn-info rounded-0" type="button" id="cari"><i class="fa-solid fa-magnifying-glass"></i> Cari</button>
                </div>
                <div class="card mt-3 p-3 col-7">
                    <form action="<?= base_url('setujui_pembatalan'); ?>" method="POST">
                        <div class="mb-3">
                            <label for="customer" class="form-label">Customer</label>
                            <input type="text" class="form-control" id="customer">
                        </div>
                        <div class="mb-3">
                            <label for="nopesanan" class="form-label">No Pesanan</label>
                            <input type="text" class="form-control" id="nopesanan" name="nopesanan">
                        </div>
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="text" class="form-control" id="tanggal">
                        </div>
                        <div class="mb-3">
                            <label for="nama_cetakan" class="form-label">Nama Cetakan</label>
                            <input type="text" class="form-control" id="nama_cetakan">
                        </div>
                        <div class="mb-3">
                            <label for="panjang" class="form-label">Panjang</label>
                            <input type="text" class="form-control" id="panjang">
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="text" class="form-control" id="harga">
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit">Proses</button>
                            <a class="btn btn-danger">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        $('#cari').click(function (e) { 
            e.preventDefault();
            const nopesanan = $('#cari-nopesanan').val();
            $.ajax({
                type: "post",
                url: "/proses_pembatalan",
                data: {
                    "nopesanan":nopesanan
                },
                dataType: "json",
                success: function (response) {
                    const data = response.sukses[0]
                if(response.sukses){
                    $('#customer').val(data.nama_customer)
                    $('#nopesanan').val(data.no)
                    $('#tanggal').val(data.tgl)
                    $('#nama_cetakan').val(data.nama_cetakan)
                    $('#panjang').val(data.panjang + ' Meter')
                    $('#harga').val(data.harga)
                }
                },
                error: function(xhr, throwError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + throwError);
                }
            });
        });
    });
</script>
<?= $this->endSection(); ?>