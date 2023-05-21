<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url(); ?>/dist/css/adminlte.min.css">
    <title>Tagihan</title>
    <style>
        *{
            padding: 0;
            margin: 0;
            font-family: fantasy;
        }
        .card{
            padding: 10px;
        }
        table {
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 2px;
            font-size: 12px;
        }
        th {
            background-color: #FFD466;
            color: #2a3d4d;
            padding: 5px;
        }
    </style>
</head>

<body>
    <div class="card">
        <div class="card-header">
            <h1 style="text-align:center;color:#2a3d4d;">Tagihan Dmprinting</h1>
        </div>
        <!-- <div class="garis">=============================================================================</div> -->
        <div class="card-body">
            <!-- <p>Invoice ini merupakan bukti tagihan yang sah, dan diterbitkan atas nama partner:</p> -->
            <table style="margin-bottom: 5px;">
                <thead>
                    <tr>
                        <th>Customer</th>
                        <td><?= $tmpPayment[0]['nama_customer']; ?></td>
                    </tr>
                    <tr>
                        <th>Tanggal</th>
                        <td><?= date('d M Y'); ?></td>
                    </tr>
                </thead>
            </table>
            <table class="table2">
                <thead>
                    <tr>
                        <th>No</th>
                        <th width="60">Tanggal</th>
                        <th width="150">Nama Cetakan</th>
                        <th>Tipe</th>
                        <th>Bahan</th>
                        <th>Lbr</th>
                        <th>Pjng</th>
                        <th>Qty</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $total = 0;
                    $no=1;
                    ?>
                    <?php foreach ($tmpPayment as $t) : ?>
                        <tr>
                            <td style="text-align:center"><?= $no++; ?></td>
                            <td><?= date('d-m-Y',strtotime($t['tgl'])); ?></td>
                            <td><?= $t['nama_cetakan']; ?></td>
                            <td><?= $t['nama_tipe']; ?></td>
                            <td><?= $t['nama_bahan']; ?></td>
                            <td style="text-align: center;"><?= $t['meter']; ?>m</td>
                            <td><?= $t['panjang']; ?>m</td>
                            <td style="text-align: center;"><?= $t['qty']; ?></td>
                            <td><?= number_format($t['harga'], 0, ',', '.'); ?></td>
                        </tr>
                        <?php $total += $t['harga']; ?>
                    <?php endforeach; ?>
                    <tr>
                        <th colspan="5">Grand Total</th>
                        <th colspan="4"><?= number_format($total, 0, ',', '.'); ?></th>
                    </tr>
                </tbody>
            </table>
            <!-- <table style="float: right;margin-top:5px;">
                <thead>
                    <tr>
                        <th colspan="2">Total : <?= number_format($total, 0, ',', '.'); ?></th>
                    </tr>
                </thead>
            </table> -->
        </div>
    </div>
</body>

</html>

<!-- <html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill</title>
    <style>
        * {
            background-color: #74b9ff;
            padding: 0px;
            margin: 0px;
        }

        .struk {
            background-color: #fff;
            width: 370px;
            height: 700px;
            margin: 30px auto;
            border-radius: 5px 5px 0px 0;
        }

        ul {
            display: flex;
            justify-content: space-between;
            width: 100%;
            position: relative;
        }

        li {
            width: 20px;
            height: 20px;
            background-color: #74b9ff;
            border-radius: 50%;
            list-style: none;
            display: inline-block;
            margin: 0 auto;
            position: absolute;
            left: 10px;
            bottom: -10px;
        }


        li:nth-child(2) {
            left: 40px;
        }

        li:nth-child(3) {
            left: 70px;
        }

        li:nth-child(4) {
            left: 100px;
        }

        li:nth-child(5) {
            left: 130px;
        }

        li:nth-child(6) {
            left: 160px;
        }

        li:nth-child(7) {
            left: 190px;
        }

        li:nth-child(8) {
            left: 220px;
        }

        li:nth-child(9) {
            left: 250px;
        }

        li:nth-child(10) {
            left: 280px;
        }

        li:nth-child(11) {
            left: 310px;
        }

        li:nth-child(12) {
            left: 340px;
        }
    </style>
</head>

<body>
    <div class="struk">
        <ul>
            <li class="circle"></li>
            <li class="circle"></li>
            <li class="circle"></li>
            <li class="circle"></li>
            <li class="circle"></li>
            <li class="circle"></li>
            <li class="circle"></li>
            <li class="circle"></li>
            <li class="circle"></li>
            <li class="circle"></li>
            <li class="circle"></li>
            <li class="circle"></li>
            <li class="circle"></li>
        </ul>
        <div class="logo">
            <h1>Hello World</h1>
        </div>
    </div>

</body>

</html> -->