<?= $this->extend('layouts/index'); ?>
<?= $this->section('konten'); ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<div class="row mx-2">
    <div class="col-12 col-lg-4">
        <div class="card card-dark text-dark">
            <div class="card-header">
                <h3 class="card-title">Tambah Akun</h3>

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
                <?= form_open('/simpanakun', ['class' => 'formsimpan']); ?>
                <div class="form-group">
                    <label for="id_akuntansi">Jenis Akun</label>
                    <select name="id_akuntansi" id="id_akuntansi" class="form-select">
                        <?php foreach ($akuntansi as $m) : ?>
                            <option value="<?= $m['id']; ?>"><?= $m['nama_akuntansi']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="nomor_akun">Nomor Akun</label>
                    <input type="text" class="form-control" id="nomor_akun" name="nomor_akun" value="<?= $nomor; ?>">
                    <div class="invalid-feedback error-nomor_akun">
                    </div>
                </div>
                <div class="form-group">
                    <label for="nama_akun">Nama Akun</label>
                    <input type="text" class="form-control" id="nama_akun" name="nama_akun">
                    <div class="invalid-feedback error-nama_akun">
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-dark" id="tambah-akun">Simpan</button>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-4">
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
                <table class="table table-hover" id="table-customer">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">No</th>
                            <th scope="col">Nomor Akun</th>
                            <th scope="col">Nama Akun</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($akun as $a) : ?>
                            <tr>
                                <th><?= $no++; ?></th>
                                <td><?= $a['nomor_akun']; ?></td>
                                <td><?= $a['nama_akun']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $('#table-customer').DataTable()

    $(document).ready(function() {
        $('.formsimpan').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "post",
                url: $(this).attr('action'), //action dari form
                data: $(this).serialize(), //mengambil data yg ada di dalam form
                dataType: "json",
                beforeSend: function() {
                    $('#tambah-akun').prop('disable', true);
                    $('#tambah-akun').html('silahkan tunggu');
                },
                complete: function() {
                    $('#tambah-akun').prop('disable', false);
                    $('#tambah-akun').html('Tambahkan');
                },
                success: function(response) {
                    if (response.error) {
                        let data = response.error
                        if (data.errorNomor) {
                            $('#nomor_akun').addClass('is-invalid');
                            $('.error-nomor_akun').html(data.errorNomor);
                        } else {
                            $('#nomor_akun').removeClass('is-invalid');
                            $('#nomor_akun').addClass('is-valid');
                        }
                        if (data.errorNama) {
                            $('#nama_akun').addClass('is-invalid');
                            $('.error-nama_akun').html(data.errorNama);
                        } else {
                            $('#nama_akun').removeClass('is-invalid');
                            $('#nama_akun').addClass('is-valid');
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
            return false
        });
    });
</script>
<?= $this->endSection(); ?>