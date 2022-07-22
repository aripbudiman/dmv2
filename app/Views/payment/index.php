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
                <div class="row g-3 align-items-center mb-2">
                    <div class="col-auto">
                        <label for="no_payment" class="col-form-label">No Payment</label>
                    </div>
                    <div class="col-auto">
                        <input type="text" id="no_payment" class="form-control" name="no_payment" value="<?= $nopayment; ?>" readonly>
                    </div>
                </div>
                <div class="form-group d-flex mb-3">
                    <input type="text" class="datepicker form-control" name="trx_date" id="trx_date" placeholder="Tanggal Transaksi" autocomplete="off">
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
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                        <label class="form-check-label text-primary" for="flexRadioDefault1">
                            Cash Payment
                        </label>
                    </div>
                    <div class="form-check ml-3">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                        <label class="form-check-label text-danger" for="flexRadioDefault2">
                            Down Payment
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <table class="table table-hover" id="table-pesanan">
                <thead>
                    <tr>
                        <th scope="col" class="text-center" width="20">No</th>
                        <th scope="col" class="text-center">Nama Cetakan</th>
                    </tr>
                </thead>
                <tbody id="table-load">
                </tbody>
            </table>
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
            <div class="card-body">
                The body of the card
            </div>
        </div>
    </div>
</div>
<!-- modal menu customer -->
<?= $this->include('payment/modal-menu-customer'); ?>
<!-- end modal petugas -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
<script type="text/javascript">
    // fungsi date picker
    $('.datepicker').datepicker({
        changeYear: true,
        dateFormat: 'dd/mm/yy',
        showOn: 'none',
        showButtonPanel: true,
        minDate: '0d'
    });

    $(document).ready(function() {

        // btn menu customer di click
        $('#btn-customer').click(function(e) {
            e.preventDefault();
            $('#menu-customer').modal('show')
        });

        // tr didalam modal customer di click
        $('#table-customer tr').click(function(e) {
            e.preventDefault();
            let customer = $(this).data('namacs');
            $('#customer').val(customer)
            $.ajax({
                type: "post",
                url: "input_modal_cs",
                data: {
                    customer: customer
                },
                dataType: "json",
                success: function(response) {
                    if (response == '') {
                        $('#table-load').html('<tr><td colspan="4"><h2 class="text-center text-danger"><i class="fa-solid fa-hourglass-empty"></i> <b>Tidak pesanan</h2></td></tr>')
                    } else {
                        $('#table-load').html(response)
                    }
                },
                error: function(xhr, throwError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + throwError);
                }
            });
            $('#menu-customer').modal('hide')
        });
    });
</script>
<?= $this->endSection(); ?>