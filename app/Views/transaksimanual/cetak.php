<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Mono:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <style>
        @font-face {
            font-family: "faktur";
            src: url('/merchant_copy/8pin-matrix-font/8PinMatrix-PoGm.ttf');
        }

        * {
            font-size: 12px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            /* font-weight: bold; */
        }

        html {
            margin-left: 20px;
            margin-right: 20px;
            margin-top: 10px;
        }

        body {
            /* border: 2px solid black; */
            width: 65mm;
            position: relative;
            overflow: hidden;
        }

        /* h5 {
            text-align: center;
        }

        h5 {
            font-size: 8px;
        } */

        .logo {
            width: 4cm;
            margin: 0px auto;
        }

        img {
            width: 4cm;
        }

        .identitas {
            font-size: 10px;
            margin-left: 5px;
            margin-right: 5px;
            margin-bottom: -10px;
        }

        .identitas-judul {
            display: inline-block;
            line-height: 5px;
        }

        .identitas-isi {
            display: inline-block;
            float: right;
            text-align: right;
            line-height: 5px;
        }

        .garis {
            text-align: center;
            font-weight: 100;
        }

        .items {
            margin: -20px 5px;
        }

        .item .nama-cetakan {
            font-weight: bold;
        }

        .item .harga {
            float: right;
        }

        .item .panjang {
            margin-left: 10px;
        }

        .item .qty {
            margin-left: 10px;
        }

        .subtotal {
            margin: -10px 5px;
        }

        .subtotal .subtotal-rupiah {
            float: right;
        }

        .diskon,
        .bayar {
            margin-top: -10px;
            margin-left: 5px;
            margin-right: 5px;
        }

        .total,
        .kembalian {
            margin-bottom: -10px;
            margin-left: 5px;
            margin-right: 5px;
            line-height: 5px;
        }

        .diskon-rupiah,
        .bayar-rupiah,
        .kembalian-rupiah,
        .total-rupiah {
            float: right;
        }

        */ h5 {
            text-align: center;
            padding-top: 0px;
            font-size: 9px;
        }
    </style>
</head>

<body>
    <div class="logo">
        <img src="logo.png">
    </div>
    <h5>Jl. Veteran No.110 RT.004/RW.002, Marga Jaya, Kec.Bekasi Sel.,<br> Kota Bks, Jawa Barat 17141</h5>

    <div class="identitas">
        <div class="identitas-judul">
            <p>Customer</p>
            <p>Tanggal Pembayaran</p>
            <p>Kode</p>
        </div>
        <div class="identitas-isi">
            <p><?= $trx[0]['nama_konsumen']; ?></p>
            <p><?= date('d-m-Y',strtotime($trx[0]['tgl_trx'])); ?></p>
            <p><?= $trx[0]['kode_trx']; ?></p>
        </div>
    </div>
    <p class="garis">-------------------------------------------------------------------</p>
    <div class="items">
        <?php $total =0; foreach ($trx as $trx) : ?>
            <p class="item"><span class="nama-cetakan"><?= $trx['nama_pesanan']; ?></span><br>
                <span class="panjang">@<?= $trx['qty']; ?></span> <span class="qty">X <?= number_format($trx['harga_satuan'],0,',','.'); ?></span> <span class="harga"><?= number_format($trx['jumlah'], 0, ',', '.'); ?></span>
            </p>
            <?php $total+=$trx['jumlah'] ?>
        <?php endforeach; ?>
    </div>
    <p class="garis">-------------------------------------------------------------------</p>
    <p class="subtotal"><span>GrandTotal</span><span class="subtotal-rupiah"><?= number_format($total, 0, ',', '.'); ?></span></p>
    <p class="garis">-------------------------------------------------------------------</p>
    
    <p style="text-align: center; font-size:10px;line-height:0px;">Terimakasih sudah menggunakan jasa kami!</p>
</body>

</html>