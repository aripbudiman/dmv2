<?= $this->extend('layouts/index'); ?>
<?= $this->section('konten'); ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<div class="row mx-2">
    <div class="col-12 col-lg-4">
        <div class="card card-dark text-dark">
            <div class="card-header">
                <h3 class="card-title">Tambah Customer</h3>

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
                <?= form_open('/simpancustomer', ['class' => 'formsimpan']); ?>
                <div class="form-group">
                    <label for="nama_customer">Nama Customer</label>
                    <input type="text" class="form-control" name="nama_customer" id="nama_customer">
                    <div class="invalid-feedback error-nama_customer">
                    </div>
                </div>
                <div class="form-group">
                    <label for="id_member">Member</label>
                    <select name="id_member" id="id_member" class="form-select">
                        <?php foreach ($member as $m) : ?>
                            <option value="<?= $m['id']; ?>"><?= $m['member']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-dark" id="tambah-customer">Simpan</button>
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
                            <th scope="col">Customer</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($customer as $c) : ?>
                            <tr>
                                <th scope="row" class="text-center"><?= $no++; ?></th>
                                <td><?= $c['nama_customer']; ?></td>
                                <td><?= ($c['id_member'] == 1) ? '<span class="badge rounded-pill bg-navy">Member</span>' : '<span class="badge rounded-pill bg-maroon">Non Member</span>'; ?></td>
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
                    $('#tambah-customer').prop('disable', true);
                    $('#tambah-customer').html('silahkan tunggu');
                },
                complete: function() {
                    $('#tambah-customer').prop('disable', false);
                    $('#tambah-customer').html('Tambahkan');
                },
                success: function(response) {
                    if (response.error) {
                        let data = response.error
                        if (data.errorNama) {
                            $('#nama_customer').addClass('is-invalid');
                            $('.error-nama_customer').html(data.errorNama);
                        } else {
                            $('#nama_customer').removeClass('is-invalid');
                            $('#nama_customer').addClass('is-valid');
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