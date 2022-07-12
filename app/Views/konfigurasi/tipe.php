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
                <?= form_open('/simpantipe', ['class' => 'formsimpan']); ?>
                <div class="mb-2">
                    <label for="nama_tipe">Nama Tipe</label>
                    <input type="text" class="form-control" id="nama_tipe" name="nama_tipe">
                    <div class="invalid-feedback error-nama_tipe">
                    </div>
                </div>
                <div class="mb-2">
                    <label for="harga_tipe">Harga Tipe</label>
                    <input type="text" class="form-control" id="harga_tipe" name="harga_tipe">
                    <div class="invalid-feedback error-harga_tipe">
                    </div>
                </div>
                <div class="mb2">
                    <button class="btn btn-primary" id="tambah-tipe">Tambahkan</button>
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
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Tipe</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($tipe as $t) : ?>
                            <tr>
                                <th scope="row"><?= $no++; ?></th>
                                <td><?= $t['nama_tipe']; ?></td>
                                <td class="td"><?= $t['harga_tipe']; ?></td>
                                <td>
                                    <a href="" class="btn btn-sm btn-success"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></a>
                                </td>
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
        $('.td').autoNumeric('init', {
            aSep: ',',
            aDec: '.',
            mDec: '0'
        });

        $('.formsimpan').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "post",
                url: $(this).attr('action'), //action dari form
                data: $(this).serialize(), //mengambil data yg ada di dalam form
                dataType: "json",
                beforeSend: function() {
                    $('#tambah-tipe').prop('disable', true);
                    $('#tambah-tipe').html('silahkan tunggu');
                },
                complete: function() {
                    $('#tambah-tipe').prop('disable', false);
                    $('#tambah-tipe').html('Tambahkan');
                },
                success: function(response) {
                    if (response.error) {
                        let data = response.error
                        if (data.errorNama) {
                            $('#nama_tipe').addClass('is-invalid');
                            $('.error-nama_tipe').html(data.errorNama);
                        } else {
                            $('#nama_tipe').removeClass('is-invalid');
                            $('#nama_tipe').addClass('is-valid');
                        }
                        if (data.errorHarga) {
                            $('#harga_tipe').addClass('is-invalid');
                            $('.error-harga_tipe').html(data.errorHarga);
                        } else {
                            $('#harga_tipe').removeClass('is-invalid');
                            $('#harga_tipe').addClass('is-valid');
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
    });
</script>
<?= $this->endSection(); ?>