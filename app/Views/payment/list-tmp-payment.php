<?php $totalHarga = 0;
foreach ($tmpPayment as $t) : ?>
    <input type="text" class="noPesanan" name="noPesanan[]" value="<?= $t['no_pesanan']; ?>">
    <?php $totalHarga += $t['harga']; ?>
<?php endforeach; ?>
<input type="text" name="totalHarga" id="totalHarga" class="totalHarga" value="<?= $totalHarga; ?>">