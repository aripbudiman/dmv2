<?= $this->extend('layouts/index'); ?>
<?= $this->section('konten'); ?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<div class="row mx-2">
    <div class="col-12 col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title text-navy"><?= $title; ?></h3>
                <div class="card-tools">
                    <!-- Collapse Button -->
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    <!-- Maximize Button -->
                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                </div>
            </div>
            <div class="card-body">
                <div class="row g-3 align-items-center mb-3">
                    <div class="col-6">
                        <label for="no_payment" class="col-form-label">No Payment</label>
                    </div>
                    <div class="col-6">
                        <input type="text" id="no_payment" class="form-control" name="no_payment" value="<?= $nopayment; ?>" readonly>
                    </div>
                </div>
                <div class="row g-3 align-items-center mb-3">
                    <div class="col-6">
                        <label for="trx_date" class="col-form-label">Tanggal Transaksi</label>
                    </div>
                    <div class="col-6">
                        <input type="text" id="no_payment" class="form-control datepicker" name="trx_date" id="trx_date" placeholder="Tanggal Transaksi" autocomplete="off">
                    </div>
                </div>
                <div class="form-group d-flex mb-3">
                    <div class="input-group ">
                        <input type="text" class="form-control rounded-0" name="customer" id="customer" placeholder="Customer">
                        <span class="input-group-append">
                            <button type="button" class="btn btn-info btn-flat" id="btn-customer"><i class="fa-solid fa-ellipsis"></i></button>
                        </span>
                    </div>
                </div>
                <div class="form-group d-flex mb-3">
                    <a class="btn btn-app bg-indigo" id="troli">
                        <i class="fas fa-shopping-cart"></i> Troli
                    </a>
                </div>
                <div class="form-group d-flex mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="paymentMethod" id="paymentMethod1" value="cp" checked>
                        <label class="form-check-label text-primary" for="paymentMethod1">
                            Cash Payment
                        </label>
                    </div>
                    <div class="form-check ml-3">
                        <input class="form-check-input" type="radio" name="paymentMethod" value="dp" id="paymentMethod2">
                        <label class="form-check-label text-danger" for="paymentMethod2">
                            Down Payment
                        </label>
                    </div>
                </div>
                <div class="form-group d-flex mb-3">
                    <a class="btn btn-app bg-info" id="pay">
                        <i class="fas fa-cash-register"></i> Pay
                    </a>
                    <a class="btn btn-app bg-teal" id="bill">
                        <i class="fas fa-file-invoice"></i>Bill
                    </a>
                    <a class="btn btn-app bg-danger" id="delete">
                        <i class="fas fa-trash-can"></i> Delete
                    </a>
                </div>
            </div>
        </div>
        <div class="card" id="load-troli">
        </div>
    </div>
    <div class="col-12 col-lg-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title text-navy"><?= $title; ?> Detail</h3>
                <div class="card-tools">
                    <!-- Collapse Button -->
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    <!-- Maximize Button -->
                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                </div>
            </div>
            <div class="card-body" id="payment-detail">
            </div>
        </div>
    </div>
</div>
<!-- modal menu customer -->
<?= $this->include('payment/modal-menu-customer'); ?>
<?= $this->include('payment/cp-modal'); ?>
<?= $this->include('payment/dp-modal'); ?>
<!-- end modal petugas -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
<script type="text/javascript">
    //========( fungsi datepicker )========>
    $('.datepicker').datepicker({
        changeYear: true,
        dateFormat: 'dd/mm/yy',
        showOn: 'none',
        showButtonPanel: true,
        minDate: '0d'
    });

    $(document).ready(function() {
        //========( load tmp payment detail )========>
        $('#payment-detail').load('load_tmp_payment')

        //========( btn menu customer di click )========>
        $('#btn-customer').click(function(e) {
            e.preventDefault();
            $('#menu-customer').modal('show')
        });

        //========( tr di dalam modal customer di click )========>
        $('#table-customer tr').click(function(e) {
            e.preventDefault();
            let customer = $(this).data('namacs');
            $('#customer').val(customer)
            $('#menu-customer').modal('hide')
        });

        //========( modal troli )========>
        $('#troli').click(function(e) {
            e.preventDefault();
            let customer = $('#customer').val()
            if (customer == '') {
                Swal.fire(
                    'nama customer belum dimasukan?',
                    'Silahkan pilih customer terlebih dahulu',
                    'error'
                )
            }
            $.ajax({
                type: "post",
                url: "/load_troli",
                data: {
                    "customer": customer
                },
                dataType: "json",
                success: function(response) {
                    if (response.data) {
                        $('#load-troli').html(response.data)
                    }
                    if (response.error) {
                        alert(response.error)
                    }
                },
                error: function(xhr, throwError) {
                    // alert(xhr.status + "\n" + xhr.responseText + "\n" + throwError);
                    if (xhr.status == 200) {
                        $('#load-troli').html('<h1 class="text-danger text-bold text-center my-3"><i class="fa-solid fa-hourglass-empty"></i>Tidak ada pesanan</h1>')
                    }
                }
            });
        });
        //================(tr load troli di click)=====================>
        $('#body-load tr').click(function(e) {
            e.preventDefault()
            let noPesanan = $(this).data('noPesanan');
            alert(noPesanan)
        })

        //========( btn payy klik )========>
        $('#pay').click(function() {
            let cp = $('#paymentMethod1').val()
            let dp = $('#paymentMethod2').val()
            if ($('#paymentMethod1').is(':checked')) {
                $('#modal-cp').modal('show')
            } else {
                $('#modal-dp').modal('show')
            }
        });
    });
</script>
<?= $this->endSection(); ?>