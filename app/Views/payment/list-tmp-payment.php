<?php $totalHarga = 0;
foreach ($tmpPayment as $t) : ?>
    <input type="hidden" class="noPesanan" name="noPesanan[]" value="<?= $t['no_pesanan']; ?>">
    <?php $totalHarga += $t['harga']; ?>
<?php endforeach; ?>
<input type="hidden" name="totalHarga" id="totalHarga" class="totalHarga" value="<?= $totalHarga; ?>">