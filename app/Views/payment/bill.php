<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url(); ?>/dist/css/adminlte.min.css">
    <title>Tagihan</title>
    <style>
        .card {
            width: 700px;
            height: 400px;
            background-color: #0bc1a2;
            border-radius: 10px;
        }

        .card-header h1 {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding-left: 20px;
            color: #fff;
            font-size: 35px;
        }

        .card-body p {
            padding-left: 20px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin-top: -10px;
            color: #fff;
        }

        .card-body {
            display: flex;
        }

        #tagihan {
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            font-weight: bold;
        }

        table {
            margin-left: 20px;
            font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
            color: #fff;
        }

        .table2 {
            margin-top: 10px;
        }

        .table2 tr th {
            width: 100%;
        }

        table tr {
            width: 500px;
        }

        table tr th {
            width: 100px;
            text-align: left;
        }
    </style>
</head>

<body>
    <div class="card">
        <div class="card-header">
            <h1>Tagihan Dmprinting</h1>
        </div>
        <div class="card-body">
            <p>Invoice ini merupakan butki tagihan yang saha, dan diterbitkan atas nama partner:</p>
            <table>
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
                <tbody>
                    <?php foreach ($tmpPayment as $t) : ?>
                        <tr>
                            <td><?= $t['nama_cetakan']; ?> <b>@ <?= number_format($t['harga'], 0, ',', '.'); ?></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <?php $total = 0; ?>
                        <?php $total += $t['harga']; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <table class="table2">
                <thead>
                    <tr>
                        <th>Total : <?= number_format($total, 0, ',', '.'); ?></th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</body>

</html>