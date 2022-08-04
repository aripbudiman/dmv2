<?= $this->extend('layouts/index'); ?>
<?= $this->section('konten'); ?>
<div class="row mx-2">
    <div class="col-12 col-lg-4">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title"><?= $title; ?></h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <!-- ==============((untuk debug disini))========== -->
            <div class="card-body" style="display: block;">
                <form>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="no_payment">No Payment</label>
                            <input type="text" class="form-control" id="no_payment" name="no_payment" readonly>
                        </div>
                        <div class="form-group">
                            <label for="customer">Customer</label>
                            <input type="text" class="form-control" id="customer" name="customer" readonly>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn bg-navy">Proses</button>
                        <a href="<?= base_url('list_down_payment'); ?>" class="btn bg-warning">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-4">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Riwayat Pembayaran</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body" style="display: block;">
                <div class="card-body">
                    <div class="card card-widget widget-user-2">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-navy">
                            <div class="widget-user-image">
                                <img class="img-circle elevation-2" src="<?= base_url('user.png'); ?>" alt="User Avatar">
                            </div>
                            <!-- /.widget-user-image -->
                            <h3 class="widget-user-username"><?= $pelunasan[0]['nama_customer']; ?></h3>
                            <h5 class="widget-user-desc"><?= $pelunasan[0]['member']; ?></h5>
                        </div>
                        <div class="card-footer p-0">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        Projects <span class="float-right badge bg-primary">31</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        Tasks <span class="float-right badge bg-info">5</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        Completed Projects <span class="float-right badge bg-success">12</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        Followers <span class="float-right badge bg-danger">842</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
</script>
<?= $this->endSection(); ?>