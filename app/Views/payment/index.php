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
                <div class="form-group d-flex mb-3">
                    <input type="text" class="form-control mr-1" name="no_payment" id="no_payment" value="<?= $nopayment; ?>" readonly>
                    <input type="text" class="datepicker form-control ml-1" name="trx_date" id="trx_date" placeholder="Tanggal Transaksi">
                </div>
                <div class="form-group d-flex mb-3">
                    <input type="text" class="form-control mr-2" placeholder="Customer" readonly>
                    <button class="btn btn-primary" id="btn-customer"><i class="fa-solid fa-ellipsis"></i></button>
                </div>
                <div class="col-6 form-group d-flex justify-content-between mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Cash
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                        <label class="form-check-label" for="flexCheckChecked">
                            Down Payment
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td colspan="2">Larry the Bird</td>
                        <td>@twitter</td>
                    </tr>
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
    $('.datepicker').datepicker();

    $(document).ready(function() {
        $('#btn-customer').click(function(e) {
            e.preventDefault();
            $('#menu-customer').modal('show')
        });
    });
</script>
<?= $this->endSection(); ?>