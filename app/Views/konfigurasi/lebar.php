<?= $this->extend('layouts/index'); ?>
<?= $this->section('konten'); ?>
<div class="row mx-2">
    <div class="col-12 col-lg-4">
        <div class="card card-outline card-dark">
            <div class="card-header">
                <h3 class="card-title">Tambah</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <?= form_open('/simpan_lebar', ['class' => 'formsimpan']); ?>
                <div class="mb-2">
                    <label for="id_bahan">Kategori Bahan</label>
                    <select name="id_bahan" id="id_bahan" class="form-control">
                        <?php foreach ($bahan as $b) : ?>
                            <option value="<?= $b['id']; ?>"><?= $b['nama_bahan']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback error-kode_bahan">
                    </div>
                </div>
                <div class="mb-2">
                    <label for="meter">Meter</label>
                    <input type="text" class="form-control" name="meter" id="meter">
                    <div class="invalid-feedback error-meter">
                    </div>
                </div>
                <div class="mb-2">
                    <label for="harga_lebar">Harga Lebar</label>
                    <input type="text" class="form-control" name="harga_lebar" id="harga_lebar">
                    <div class="invalid-feedback error-harga_lebar">
                    </div>
                </div>
                <div class="mb-2">
                    <button class="btn btn-primary" id="tambah-lebar">Tambahkan</button>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-8">
        <div class="card card-outline card-dark">
            <div class="card-header">
                <h3 class="card-title"><?= $title; ?></h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body" id="load-lebar">

            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {

        $('#load-lebar').load('/tampillebar');
        $('.formsimpan').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "post",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: "json",
                beforeSend: function() {
                    $('#tambah-lebar').prop('disable', true);
                    $('#tambah-lebar').html('silahkan tunggu');
                },
                complete: function() {
                    $('#tambah-lebar').prop('disable', false);
                    $('#tambah-lebar').html('Tambahkan');
                },
                success: function(response) {
                    if (response.error) {
                        let data = response.error
                        if (data.errorMeter) {
                            $('#meter').addClass('is-invalid');
                            $('.error-meter').html(data.errorMeter);
                        } else {
                            $('#meter').removeClass('is-invalid');
                            $('#meter').addClass('is-valid');
                        }
                        if (data.errorHarga) {
                            $('#harga_lebar').addClass('is-invalid');
                            $('.error-harga_lebar').html(data.errorHarga);
                        } else {
                            $('#harga_lebar').removeClass('is-invalid');
                            $('#harga_lebar').addClass('is-valid');
                        }
                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'Alhamdulillah',
                            text: response.sukses,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $('#load-lebar').load('/tampillebar');
                                $('#harga_lebar').val('');
                                $('#meter').val('');
                                $('#id_bahan').focus();
                            }
                        })
                    }
                },
                error: function(xhr, throwError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + throwError);
                }
            });
        });
        $('#harga_lebar').autoNumeric('init', {
            aSep: ',',
            aDec: '.',
            mDec: '2'
        });
    });
</script>
<?= $this->endSection(); ?>