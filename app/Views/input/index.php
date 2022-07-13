<?= $this->extend('layouts/index'); ?>
<?= $this->section('konten'); ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<div class="row mx-2">
    <div class="col-12 col-lg-4">
        <div class="card card-dark text-dark">
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
                <div class="input-group mb-3">
                    <label class="input-group-text" for="id_customer" style="width: 90px;">Customer</label>
                    <select class="form-select" id="id_customer" id="id_customer">
                        <option value=""></option>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text" for="no_pesanan" style="width: 130px;">No Pesanan</label>
                    <input type="text" class="form-control" id="no_pesanan" name="no_pesanan">
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text" for="nama_cetakan" style="width: 130px;">Nama Cetakan</label>
                    <input type="text" class="form-control" id="nama_cetakan" name="nama_cetakan">
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text" for="id_tipe" style="width: 90px;">Tipe</label>
                    <select class="form-select" id="id_tipe" name="id_tipe">
                        <?php foreach ($tipe as $t) : ?>
                            <option value="<?= $t['id']; ?>"><?= $t['nama_tipe']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text" for="id_bahan" style="width: 90px;">Bahan</label>
                    <select class="form-select" name="id_bahan" id="id_bahan">
                        <?php foreach ($bahan as $b) : ?>
                            <option value="<?= $b['id']; ?>"><?= $b['nama_bahan']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text" for="id_lebar" style="width: 90px;">Lebar</label>
                    <select name="id_lebar" id="id_lebar" class="form-select">
                        <?php foreach ($lebar as $l) : ?>
                            <option value="<?= $l['id']; ?>"><?= $l['meter'] . "Meter +" . $l['harga_lebar']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text" for="id_finishing" style="width: 90px;">Finishing</label>
                    <select class="form-select" id="id_finishing" id="id_finishing">
                        <option value=""></option>
                    </select>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="panjang" style="width: 90px;">Panjang</label>
                            <input type="text" class="form-control" id="panjang" name="panjang">
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="qty" style="width: 90px;">Qty</label>
                            <input type="text" class="form-control" id="qty" name="qty">
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="harga" style="width: 90px;">Harga</label>
                            <input type="text" class="form-control" id="harga" name="harga">
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <button class="btn btn-success">Tambahkan</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>
    $(document).ready(function() {
        $('#id_bahan').on('change', function() {
            let idbahan = $(this).val()
            $.ajax({
                method: "POST",
                url: "/load-harga-lebar",
                dataType: "JSON",
                data: {
                    'id': idbahan
                },
                success: function(response) {
                    result = response
                    $('#id_lebar').html(result)
                }
            });
        });
        // $(selector).autoNumeric('init', {
        //     aSep: ',',
        //     aDec: '.',
        //     mDec: '0'
        // });
    });
</script>
<?= $this->endSection(); ?>