<?php $no = 2;
$totalDebet = 0;
$totalCredit = 0;
$saldox = 0;
?>
<?php
foreach ($list as $today) : ?>
    <?php
    $todayDebet = ($today['ket'] == 'D') ? $today['nominal'] : 0;
    $todayCredit = ($today['ket'] == 'C') ? $today['nominal'] : 0;
    $saldox += $todayDebet - $todayCredit;
    $saldoToday = ($saldoAkhir[0]['nominal'] - $saldox) ?>
<?php endforeach; ?>
<tr>
    <td class="text-center">1</td>
    <td></td>
    <td>Saldo Awal</td>
    <td></td>
    <td></td>
    <td><?= number_format($saldoToday, 2, ',', '.'); ?></td>
</tr>
<?php $saldo = $saldoToday; ?>
<?php foreach ($list as $l) : ?>
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
    <?php $totalDebet += $debet;
    $totalCredit += $credit; ?>
<?php endforeach; ?>
<tr>
    <td></td>
    <td></td>
    <td></td>
    <td><?= number_format($totalDebet, 2, ',', '.'); ?></td>
    <td><?= number_format($totalCredit, 2, ',', '.'); ?></td>
    <td><?= number_format(($totalDebet - $totalCredit), 2, ',', '.'); ?></td>
</tr>