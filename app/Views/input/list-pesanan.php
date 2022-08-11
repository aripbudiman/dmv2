<?= $this->extend('layouts/index'); ?>
<?= $this->section('konten'); ?>
<div class="row mx-2">
    <div class="col-12 col-lg-10">
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
                <table class="table hover" id="list-pesanan">
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
                                <td><?= $p['harga']; ?></td>
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
        $('#list-pesanan').DataTable({
            columnDefs: [{
                targets: 4,
                render: $.fn.dataTable.render.number('.', ',', 0, 'Rp ')
            }],
        })
        // menampilkan modal verifikasi
        $('tr').click(function() {
            let nilai = $(this).data('no');
            $.ajax({
                type: "post",
                url: "load-detail",
                data: {
                    'nopesanan': nilai
                },
                dataType: "json",
                success: function(response) {
                    if (response) {
                        response.forEach(r => {
                            let html = `<tr>
                            <th>No Pesanan</th>
                            <td id="no">${r.no_pesanan}</td>
                            </tr><tr>
                            <th>Tanggal</th>
                            <td id="tanggal">${r.created_at}</td>
                            </tr><tr>
                            <th>Customer</th>
                            <td id="customer">${r.nama_customer}</td>
                            </tr><tr>
                            <th>Nama Cetakan</th>
                            <td id="nama_cetakan">${r.nama_cetakan}</td>
                            </tr><tr>
                            <th>Tipe</th>
                            <td>${r.nama_tipe}</td>
                            </tr><tr>
                            <th>Bahan</th>
                            <td>${r.nama_bahan}</td>
                            </tr><tr>
                            <th>Lebar</th>
                            <td>${r.meter} + ${r.harga_lebar}</td>
                            </tr><tr>
                            <th>Finishing</th>
                            <td>${r.deskripsi_finishing}</td>
                            </tr><tr>
                            <th>Panjang</th>
                            <td>${r.panjang}</td>
                            </tr><tr>
                            <th>Qty</th>
                            <td>${r.qty}</td>
                            </tr><tr>
                            <th>Harga</th>
                            <td id="harga">${r.harga}</td>
                            </tr>`
                            $('#table-detail').html(html)
                            $('#detail-pesanan').modal('show')
                        });
                    }
                }
            });
        })

        //========( fungsi rupiah )========>
        $('.harga').autoNumeric('init', {
            aSep: ',',
            aDec: '.',
            mDec: '0'
        });

        //========( tombol approve )========>
        $('.approve').click(function(e) {
            e.preventDefault();
            let no = $('#no').text();
            let customer = $('#customer').text();
            let namaCetakan = $('#nama_cetakan').text();
            let harga = $('#harga').text();
            let tanggal = $('#tanggal').text();
            $.ajax({
                type: "post",
                url: "approve_pesanan",
                data: {
                    "noPesanan": no,
                    "status": "unpaid",
                    "customer": customer,
                    "namaCetakan": namaCetakan,
                    "harga": harga,
                    "tanggal": tanggal
                },
                dataType: "json",
                success: function(response) {
                    $('#detail-pesanan').modal('hide')
                    window.location.reload()
                    if (response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: 'Data sudah diterima!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.reload()
                            }
                        })
                    }
                },
                error: function(xhr, throwError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + throwError);
                }
            });
        });

        // tombol reject di click
        $('.reject').click(function(e) {
            let no = $('#no').text();
            e.preventDefault();
            $.ajax({
                type: "post",
                url: "delete_pesanan",
                data: {
                    "noPesanan": no
                },
                dataType: "json",
                success: function(response) {
                    location.reload()
                    if (response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: 'Data sudah diterima!'
                        })
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