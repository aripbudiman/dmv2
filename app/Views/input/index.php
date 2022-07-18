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
                <?= form_open('/simpanpesanan', ['class' => 'formsimpan']); ?>
                <div class="input-group mb-3">
                    <label class="input-group-text" for="no_pesanan" style="width: 130px;">No Pesanan</label>
                    <input type="text" class="form-control" id="no_pesanan" name="no_pesanan" value="<?= $nopesanan; ?>" readonly>
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text" for="id_customer" style="width: 130px;">Customer</label>
                    <select class="form-select" id="id_customer" name="id_customer">
                        <option value=""></option>
                        <?php foreach ($customer as $c) : ?>
                            <option value="<?= $c['id']; ?>"><?= $c['nama_customer']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback error-id_customer">
                    </div>
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text" for="nama_cetakan" style="width: 130px;">Nama Cetakan</label>
                    <input type="text" class="form-control" id="nama_cetakan" name="nama_cetakan">
                    <div class="invalid-feedback error-nama_cetakan">
                    </div>
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text" for="id_tipe" style="width: 90px;">Tipe</label>
                    <select class="form-select" id="id_tipe" name="id_tipe">
                        <?php foreach ($tipe as $t) : ?>
                            <option value="<?= $t['id']; ?>" data-tipe="<?= $t['harga_tipe']; ?>"><?= $t['nama_tipe']; ?></option>
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
                            <option value="<?= $l['id']; ?>" data-lebar="<?= $l['harga_lebar']; ?>"><?= $l['meter'] . "Meter +" . $l['harga_lebar']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text" for="id_finishing" style="width: 90px;">Finishing</label>
                    <select class="form-select" id="id_finishing" name="id_finishing">
                        <?php foreach ($finishing as $f) : ?>
                            <option value="<?= $f['id']; ?>" data-finishing="<?= $f['harga_finishing']; ?>"><?= $f['deskripsi_finishing']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="panjang" style="width: 90px;">Panjang</label>
                            <input type="text" class="form-control" id="panjang" name="panjang" value="1">
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="qty" style="width: 90px;">Qty</label>
                            <input type="text" class="form-control" id="qty" name="qty" value="1">
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="harga" style="width: 90px;">Harga</label>
                            <input type="text" class="form-control bg-navy fs-4 text-indigo harga" id="harga" name="harga" readonly>
                        </div>
                    </div>
                    <!-- <div class="col-12 col-lg-6">
                        <div class="card bg-navy">
                            <h1>Member</h1>
                        </div>
                    </div> -->
                </div>
                <div class="input-group mb-3">
                    <button class="btn btn-success tambah-pesanan" id="tambah-pesanan">Tambahkan</button>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>
<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script> -->
<script>
    $(document).ready(function() {
        hitungharga()
        change()
        bahanselek()
    });
    let hitungharga = function() {
        let tipe = $('#id_tipe option:selected').data('tipe');
        let lebar = $('#id_lebar option:selected').data('lebar');
        let finishing = $('#id_finishing option:selected').data('finishing');
        let panjang = $('#panjang').val();
        let qty = $('#qty').val();
        let total = (parseFloat(tipe) + parseFloat(lebar) + parseFloat(finishing)) * parseFloat(panjang) * parseInt(qty)
        $('#harga').val(total);
        rupiah()
    }

    function change() {
        $('#id_tipe , #id_lebar, #id_finishing, #panjang, #qty').change(function() {
            let tipe = $('#id_tipe option:selected').data('tipe');
            let lebar = $('#id_lebar option:selected').data('lebar');
            let finishing = $('#id_finishing option:selected').data('finishing');
            let panjang = $('#panjang').val();
            let qty = $('#qty').val();
            let total = (parseFloat(tipe) + parseFloat(lebar) + parseFloat(finishing)) * parseFloat(panjang) * parseInt(qty)
            $('#harga').val(total);

        });
    }

    function bahanselek() {
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
                    hitungharga()
                }
            });
        });
    }

    function rupiah() {
        $('.harga').autoNumeric('init', {
            aSep: ',',
            aDec: '.',
            mDec: '0'
        });
    }

    $('.formsimpan').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "post",
            url: $(this).attr('action'), //action dari form
            data: $(this).serialize(), //mengambil data yg ada di dalam form
            dataType: "json",
            beforeSend: function() {
                $('#tambah-pesanan').prop('disable', true);
                $('#tambah-pesanan').html('silahkan tunggu');
            },
            complete: function() {
                $('#tambah-pesanan').prop('disable', false);
                $('#tambah-pesanan').html('Tambahkan');
            },
            success: function(response) {
                if (response.error) {
                    let data = response.error
                    if (data.errorNama) {
                        $('#nama_cetakan').addClass('is-invalid');
                        $('.error-nama_cetakan').html(data.errorNama);
                    } else {
                        $('#nama_cetakan').removeClass('is-invalid');
                        $('#nama_cetakan').addClass('is-valid');
                    }
                    if (data.errorCustomer) {
                        $('#id_customer').addClass('is-invalid');
                        $('.error-id_customer').html(data.errorCustomer);
                    } else {
                        $('#id_customer').removeClass('is-invalid');
                        $('#id_customer').addClass('is-valid');
                    }
                } else {
                    Swal.fire({
                        icon: 'success',
                        title: 'Alhamdulillah',
                        text: response.sukses,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload()
                        }
                    })
                }
            },
            error: function(xhr, throwError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + throwError);
            }
        });
        return false;
    });
</script>
<?= $this->endSection(); ?>