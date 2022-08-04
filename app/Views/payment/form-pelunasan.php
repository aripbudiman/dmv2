<?= $this->extend('layouts/index'); ?>
<?= $this->section('konten'); ?>
<?php
$hargaKotor = $pelunasan[0]['harga_kotor'];
$diskon = ($hargaKotor * $pelunasan[0]['discount'] / 100);
$total = $hargaKotor - $diskon;
$sisaHutang = $total - $pelunasan[0]['amount'];
?>
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
                <form action="<?= base_url('proses_pelunasan'); ?>" method="post">
                    <div class="card-footer p-0 rounded-sm">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <span class="nav-link">
                                    No Payment<span class="float-right"><?= $nopayment; ?>
                                        <input type="hidden" name="no_payment" id="no_payment" value="<?= $nopayment; ?>"></span>
                                    <input type="hidden" name="indexPay" id="indexPay" value="<?= $index; ?>"></span>
                                </span>
                            </li>
                            <li class="nav-item">
                                <span class="nav-link">
                                    Tanggal<span class="float-right"><?= date('Y-m-d H:i:s'); ?>
                                        <input type="hidden" name="trx_date" id="trx_date" value="<?= date('Y-m-d H:i:s'); ?>"></span>
                                </span>
                            </li>
                            <li class="nav-item">
                                <span class="nav-link">
                                    Customer<span class="float-right"><?= $pelunasan[0]['nama_customer']; ?>
                                        <input type="hidden" name="customer" id="customer" value="<?= $pelunasan[0]['nama_customer']; ?>"></span>
                                </span>
                            </li>
                            <?php foreach ($items as $item) : ?>
                                <li class="nav-item">
                                    <span class="nav-link">
                                        🟡 Item<span class="float-right"><?= $item['no_pesanan']; ?>
                                            <input type="hidden" name="no_pesanan[]" id="no_pesanan" value="<?= $item['no_pesanan']; ?>"></span>
                                    </span>
                                </li>
                            <?php endforeach; ?>
                            <li class="nav-item">
                                <span class="nav-link">
                                    Sisa Hutang<span class="float-right text-bold"><?= "Rp " . number_format($sisaHutang, 2, ',', '.'); ?>
                                        <input type="hidden" name="amount_pay" id="amount_pay" value="<?= $sisaHutang; ?>"></span>
                                </span>
                            </li>
                            <li class="nav-item bg-white border-bottom-0">
                                <span class="nav-link text-lg text-right">Bayar<input type="text" class="form-control ml-3 my-1 w-50 float-right" id="amount" name="amount" placeholder="Bayar" autocomplete="off"></span>

                            </li>
                            <li class="nav-item bg-white border-bottom-0">
                                <span class="nav-link text-lg text-right">Kembalian<input type="text" class="form-control ml-3 my-1 w-50 float-right" aDec id="kembalian" placeholder="Kembalian"></span>

                            </li>
                            <li class="nav-item text-center bg-white py-3">
                                <button type="submit" class="btn bg-navy mr-1" onclick="return confirm('Konfirmasi pembayaran?')">Proses</button>
                                <a href="<?= base_url('list_down_payment'); ?>" class="btn bg-warning ml-1">Kembali</a>
                            </li>
                        </ul>
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
                                <li class="nav- bg-info">
                                    <span class="nav-link">No Payment<span class="float-right px-4 "><?= $pelunasan[0]['no_payment']; ?></span></span>
                                </li>
                                <li class="nav- bg-info">
                                    <span class="nav-link">Tanggal<span class="float-right px-4 "><?= $pelunasan[0]['trx_date']; ?></span></span>
                                </li>
                                <li class="nav- bg-info">
                                    <span class="nav-link">Subtotal<span class="float-right px-4 "><?= "Rp " . number_format($pelunasan[0]['harga_kotor'], 2, ',', '.'); ?></span></span>
                                </li>
                                <li class="nav- bg-info">
                                    <span class="nav-link">Diskon<span class="float-right px-4 "><?= "Rp " . number_format($diskon, 2, ',', '.') ?></span></span>
                                </li>
                                <li class="nav- bg-info">
                                    <span class="nav-link">Total<span class="float-right px-4 "><?= "Rp " . number_format($total, 2, ',', '.'); ?></span></span>
                                </li>
                                <li class="nav- bg-info">
                                    <span class="nav-link">Bayar<span class="float-right px-4 "><?= "Rp " . number_format($pelunasan[0]['amount'], 2, ',', '.'); ?></span></span>
                                </li>
                                <li class="nav- bg-info">
                                    <span class="nav-link">Sisa Hutang<span class="float-right px-4 "><?= "Rp " . number_format($sisaHutang, 2, ',', '.'); ?></span></span>
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
    $(document).ready(function() {
        $('#amount').autoNumeric('init', {
            aSep: '.',
            aDec: ',',
            mDec: '0'
        });
        $('#kembalian').autoNumeric('init', {
            aSep: '.',
            aDec: ',',
            mDec: '0'
        });
        $('#amount').keyup(function(e) {
            hitungKembalian()
        });
    });

    function hitungKembalian() {
        let hargaItem = $('#amount_pay').val();
        let bayar = $('#amount').autoNumeric('get');
        let hasil = parseFloat(bayar) - parseFloat(hargaItem);
        $('#kembalian').val(hasil)
        let hasil2 = $('#kembalian').val();
        $('#kembalian').autoNumeric('set', hasil2);
    }
</script>
<?= $this->endSection(); ?>