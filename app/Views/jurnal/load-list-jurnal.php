<?php $saldoToday = 0;
foreach ($list as $i) {
    $debet = ($i['ket'] == 'D') ? $i['nominal'] : 0;
    $credit = ($i['ket'] == 'C') ? $i['nominal'] : 0;
    $saldoDay += $debet - $credit;
}
$saldoAkhir2 = $saldoAkhir[0]['nominal'] - $saldoToday;
?>
<tr>
    <td class="text-center">1</td>
    <td></td>
    <td>Saldo Awal</td>
    <td></td>
    <td></td>
    <td><?= number_format($saldoAkhir2, 2, ',', '.'); ?></td>
</tr>
<?php $no = 2;
$saldo = 0;
foreach ($list as $l) : ?>
    <?php
    $debet = ($l['ket'] == 'D') ? $l['nominal'] : 0;
    $credit = ($l['ket'] == 'C') ? $l['nominal'] : 0;
    $saldo += $debet - $credit ?>
    <tr>
        <td class="text-center"><?= $no++; ?></td>
        <td class="text-center text-primary text-decoration-underline" style="cursor: pointer;"><?= $l['tgl_jurnal']; ?></td>
        <td><?= $l['deskripsi']; ?></td>
        <td><?= number_format($debet, 2, ',', '.') ?></td>
        <td><?= number_format($credit, 2, ',', '.') ?></td>
        <td><?= number_format($saldo, 2, ',', '.') ?></td>
    </tr>
<?php endforeach; ?>