<?php foreach ($tmpPayment as $t) : ?>
    <input type="text" class="noPesanan" name="noPesanan[]" value="<?= $t['no_pesanan']; ?>">
<?php endforeach; ?>