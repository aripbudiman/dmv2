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
                        <input type="hidden" id="indexPay" class="form-control" name="indexPay" value="<?= $index; ?>" readonly>
                    </div>
                </div>
                <div class="row g-3 align-items-center mb-3">
                    <div class="col-6">
                        <label for="trx_date" class="col-form-label">Tanggal Transaksi</label>
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control datepicker" name="trx_date" id="trx_date" value="<?= $tanggal; ?>" placeholder="Tanggal Transaksi" autocomplete="off" readonly>
                    </div>
                </div>
                <div class="form-group d-flex mb-3">
                    <div class="input-group">
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
                    <!-- ==============((btn payment))========== -->
                    <button type="submit" class="btn btn-app bg-info" id="pay">
                        <i class="fas fa-cash-register"></i> Pay
                    </button>
                    <!-- ==============((end btn payment))========== -->
                    <!-- ==============((bill payment))========== -->
                    <a href="<?= base_url('get_bill'); ?>" target="_blank" class="btn btn-app bg-teal" id="bill">
                        <i class="fas fa-file-invoice"></i>Bill
                    </a>
                    <!-- ==============((end bill payment))========== -->
                    <!-- ==============((delete tmp payment))========== -->
                    <?= form_open('delete_tmp_payment', ['class' => 'deleteTmpPayment']); ?>
                    <?= csrf_field(); ?>
                    <button type="submit" class="btn btn-app bg-danger" id="delete">
                        <i class="fas fa-trash-can"></i> Batal Transaksi
                    </button>
                    <div id="list-delete"></div>
                    <?= form_close(); ?>
                    <!-- ==============((end delete tmp payment))========== -->
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
<script src="aplikasi.js"></script>
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
        let csL = localStorage.getItem('customer');
        if ($('#customer').val() == '') {
            $('#customer').val(csL)
        }
        //========( load tmp payment detail )========>
        $('#payment-detail').load('load_tmp_payment')
        $('#list-delete').load('loadListTmpPayment')

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

        //========( btn delete di click )========>
        $('#delete').click(function(e) {
            localStorage.removeItem('customer')
            localStorage.removeItem('item')
        });

        //========( button troli )========>
        $('#troli').click(function(e) {
            e.preventDefault();
            let customer = $('#customer').val()
            $('#customer').prop('readonly', true);
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

        //========( btn bill di klik )========>

        //========( btn payy klik )========>
        $('#pay').click(function() {
            let cp = $('#paymentMethod1').val()
            let dp = $('#paymentMethod2').val()
            let noPayment = $('#no_payment').val();
            let trxDate = $('#trx_date').val();
            let totalHarga = $('#totalHarga').val();
            let customer = $('#customer').val();
            if ($('#paymentMethod1').is(':checked')) {
                $('#no_payment_modal').val(noPayment)
                $('#trx_date_modal').val(trxDate)
                $('#customer-cp').val(customer)
                $('#totalHargaModal').autoNumeric('set', totalHarga);
                $('#amount_pay').autoNumeric('set', totalHarga);
                $('#modal-cp').modal('show')
            } else {
                $('#total_harga').autoNumeric('set', totalHarga);
                $('#totalBayar').autoNumeric('set', totalHarga);
                $('#dp_customer').val(customer)
                $('#no_payment_modal-dp').val(noPayment)
                $('#trx_date_modal-dp').val(trxDate)
                $('#modal-dp').modal('show')
            }
        });
        //========( delete tmp payment )========>
        $('.deleteTmpPayment').submit(function(e) {
            e.preventDefault()
            $.ajax({
                type: "post",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: "json",
                beforeSend: function() {
                    $('#delete').attr('disable', 'disable')
                    $('#delete').html('<i class="fa fa-spin fa-spinner"></i>')
                },
                complete: function() {
                    $('#delete').removeAttr('disable')
                    $('#delete').html(' <i class="fas fa-trash-can"></i> Delete')
                },
                success: function(response) {
                    if (response.sukses) {
                        $('.noCentang').prop('checked', false)
                        loadGroupPayment()
                        $('#load-troli').html(response.data)
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