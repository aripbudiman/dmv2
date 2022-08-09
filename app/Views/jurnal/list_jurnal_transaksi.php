<?= $this->extend('layouts/index'); ?>
<?= $this->section('konten'); ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
<div class="row mx-2">
    <div class="col-12 col-lg-12">
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
                <div class="row">
                    <div class="col-12 col-lg-4">
                        <div class="form-group d-flex">
                            <label for="akun" class="col-4">Akun</label>
                            <input type="text" class="form-control rounded-0 mr-3 nama-akun">
                            <button class="btn bg-navy rounded-0" id="btn-akun">...</button>
                        </div>
                        <div class="form-group d-flex">
                            <label for="" class="col-4">Tanggal</label>
                            <input type="date" name="dari" id="dari" class="form-control rounded-0 tgl_dari">
                            s/d
                            <input type="date" name="sampai" id="sampai" class="form-control rounded-0 tgl_sampai">
                        </div>
                        <div class="form-group d-flex">
                            <label for="" class="col-4"></label>
                            <button class="btn bg-success rounded-0" id="tampilkan">Tampilkan</button>
                            <button class="btn bg-success rounded-0 mx-1">Excel</button>
                            <button class="btn bg-success rounded-0">PDF</button>
                        </div>
                    </div>
                    <div class="col-12">
                        <table class="table mt-4 table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col" width="50">No</th>
                                    <th scope="col" width="150">Tanggal</th>
                                    <th scope="col" width="600">Deskripsi</th>
                                    <th scope="col" width="170">Debet</th>
                                    <th scope="col" width="170">Credit</th>
                                    <th scope="col" width="170">Saldo Akhir</th>
                                </tr>
                            </thead>
                            <tbody id="list-jurnal">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal-akun" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="input-group">
                    <input type="search" class="form-control form-control-lg" placeholder="Ketik nama akun">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-lg btn-default">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
                <div class="form-group">
                    <label>Pilih Akun</label>
                    <select multiple='' class="form-control">
                        <?php foreach ($akun as $a) : ?>
                            <option value="<?= $a['nama_akun']; ?>"><?= $a['nomor_akun']; ?> | <?= $a['nama_akun']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="list-akun">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary pilih-akun">Pilih</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $('#btn-akun').click(function(e) {
            e.preventDefault();
            $('#modal-akun').modal('show')
        });
        $('.pilih-akun').click(function(e) {
            e.preventDefault();
            let akun = $('option:selected').val()
            $('.nama-akun').val(akun)
            $('#modal-akun').modal('hide')
        });
        $('#tampilkan').click(function(e) {
            e.preventDefault();
            let namaAkun = $('.nama-akun').val();
            let tglDari = $('.tgl_dari').val();
            let tglSampai = $('.tgl_sampai').val();
            $.ajax({
                type: "post",
                url: "getJurnalUmum",
                data: {
                    "nama_akun": namaAkun,
                    "tgl_dari": tglDari,
                    "tgl_sampai": tglSampai
                },
                dataType: "json",
                success: function(response) {
                    let data = response.data
                    if (response.data) {
                        $('#list-jurnal').html(response.data)
                    }
                }
            });
        });


    });
</script>
<?= $this->endSection(); ?>