<?= $this->extend('layouts/index'); ?>
<?= $this->section('konten'); ?>
<section class="content">
    <div class="container-fluid">
        <?php
        $debet = 0;
        $credit = 0;
        foreach ($piutang as $p) {
            $debet += ($p['coa'] == 'D') ? $p['piutang'] : 0;
            $credit += ($p['coa'] == 'C') ? $p['piutang'] : 0;
            $sisaPiutang = $debet - $credit;
        }
        foreach ($penjualanTipe as $p) {
            $namaTipe[] = $p['nama_tipe'];
            $totalTipe[] = $p['total'];
        }
        ?>

        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?= $newOrder; ?></h3>
                        <p>New Orders</p>
                    </div>
                    <div class="icon">
                        <i class="ion">
                            <ion-icon name="cart"></ion-icon>
                        </i>
                    </div>
                    <a href="<?= base_url('list_pesanan_verifikasi'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3><?= number_format($income[0]['income'], 2, ',', '.'); ?><sup style="font-size: 20px"></sup></h3>
                        <p>Income</p>
                    </div>
                    <div class="icon">
                        <i class="ion">
                            <ion-icon name="wallet"></ion-icon>
                        </i>
                    </div>
                    <a href="<?= base_url('history_payment'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?= $totalOrder; ?></h3>
                        <p>Total Order</p>
                    </div>
                    <div class="icon">
                        <i class="ion">
                            <ion-icon name="bag-handle"></ion-icon>
                        </i>
                    </div>
                    <a href="<?= base_url('list_pesanan'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3><?= number_format($sisaPiutang, 2, ',', '.'); ?></h3>
                        <p>Accounts Recevaible</p>
                    </div>
                    <div class="icon">
                        <i class="ion">
                            <ion-icon name="cash"></ion-icon>
                        </i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col col-lg-6" height="300">
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Area Chart</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="chart1"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col col-lg-3">
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">Penjualan Tipe Kertas</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart mt-4">
                            <canvas id="chart2"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col col-lg-3">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Transaksi Terakhir</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Customer</th>
                                    <th>Nominal</th>
                                    <th style="width: 40px">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($riwayat as $r) : ?>
                                    <tr>
                                        <td><?= $r['customer']; ?></td>
                                        <td><?= number_format($r['harga_kotor'], 0, ',', '.'); ?></td>
                                        <td><span class="badge bg-<?= ($r['v_status'] == 'paid') ? 'success' : (($r['v_status'] == 'down payment') ? 'danger' : 'warning') ?>"><?= $r['v_status']; ?></span></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    const ctx = document.getElementById('chart1');
    const ctx2 = document.getElementById('chart2');
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange', 'Red'],
            datasets: [{
                label: 'Data Penjualan / Tipe',
                data: [12, 19, 3, 5, 2, 3, 12],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    const myChart2 = new Chart(ctx2, {
        type: 'pie',
        data: {
            labels: <?= json_encode($namaTipe) ?>,
            // labels: ['red', 'blue', 'green'],
            datasets: [{
                label: 'Data Penjualan / Tipe',
                data: <?= json_encode($totalTipe) ?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
<?= $this->endSection(); ?>