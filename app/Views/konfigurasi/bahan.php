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
                <?= form_open('/simpanbahan', ['class' => 'formsimpan']); ?>
                <div class="mb-2">
                    <label for="kode_bahan">Kode Bahan</label>
                    <input type="text" class="form-control" data-role='fieldcontain' name="kode_bahan" id="kode_bahan" value="<?= $kode; ?>" readonly>
                    <div class="invalid-feedback error-kode_bahan">

                    </div>
                </div>
                <div class="mb-2">
                    <label for="nama_bahan">Nama Bahan</label>
                    <input type="text" class="form-control" name="nama_bahan" id="nama_bahan">
                    <div class="invalid-feedback error-nama_bahan">

                    </div>
                </div>
                <div class="mb-2">
                    <button class="btn btn-primary" id="tambah-bahan">Tambahkan</button>
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
            <div class="card-body" id="load-table-bahan">
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#load-table-bahan').load('/tampilbahan');
        $('.formsimpan').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "post",
                url: $(this).attr('action'), //action dari form
                data: $(this).serialize(), //mengambil data yg ada di dalam form
                dataType: "json",
                beforeSend: function() {
                    $('#tambah-bahan').prop('disable', true);
                    $('#tambah-bahan').html('silahkan tunggu');
                },
                complete: function() {
                    $('#tambah-bahan').prop('disable', false);
                    $('#tambah-bahan').html('Tambahkan');
                },
                success: function(response) {
                    if (response.error) {
                        let data = response.error
                        if (data.errorKode) {
                            $('#kode_bahan').addClass('is-invalid');
                            $('.error-kode_bahan').html(data.errorKode);
                        } else {
                            $('#kode_bahan').removeClass('is-invalid');
                            $('#kode_bahan').addClass('is-valid');
                        }
                        if (data.errorNama) {
                            $('#nama_bahan').addClass('is-invalid');
                            $('.error-nama_bahan').html(data.errorNama);
                        } else {
                            $('#nama_bahan').removeClass('is-invalid');
                            $('#nama_bahan').addClass('is-valid');
                        }
                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'Alhamdulillah',
                            text: response.sukses,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $('#load-table-bahan').load('/tampilbahan');
                                $('#nama_bahan').val('')
                                $('#kode_bahan').fieldcontain('refresh')
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
    });
</script>
<?= $this->endSection(); ?>