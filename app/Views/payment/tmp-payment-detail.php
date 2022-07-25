<table class="table display nowrap" id="example" style="width:100%">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">No Pesanan</th>
            <th scope="col">Nama Cetakan</th>
            <th scope="col">Tipe</th>
            <th scope="col">Bahan</th>
            <th scope="col">Lebar</th>
            <th scope="col">Finishing</th>
            <th scope="col">Panjang</th>
            <th scope="col">Qty</th>
            <th scope="col">Harga</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        $total = 0;
        foreach ($tmpPayment as $tp) : ?>
            <tr>
                <th scope="row"><?= $no++; ?></th>
                <td><?= $tp['no_pesanan']; ?></td>
                <td><?= $tp['nama_cetakan']; ?></td>
                <td><?= $tp['nama_tipe']; ?></td>
                <td><?= $tp['nama_bahan']; ?></td>
                <td><?= $tp['meter'] . ' Meter'; ?></td>
                <td><?= $tp['deskripsi_finishing']; ?></td>
                <td><?= $tp['panjang']; ?></td>
                <td><?= $tp['qty']; ?></td>
                <td class="rp"><?= $tp['harga']; ?></td>
            </tr>
            <?php $total += $tp['harga'] ?>
        <?php endforeach; ?>
    </tbody>
</table>
<div class="col-4 mt-2">
    <h3 class="bg-navy p-3">Grand Total: <span id="total"><?= $total; ?></span></h3>
</div>
<script>
    $(document).ready(function() {
        $('#example').DataTable({
            scrollX: true,
            order: [
                [3, 'asc']
            ],
            searching: false,
            "lengthChange": false
        });

        //========( format rupiah )========>
        $('.rp').autoNumeric('init', {
            aSep: '.',
            aDec: ',',
            mDec: '0',
            aSign: "Rp. "
        });
        $('#total').autoNumeric('init', {
            aSep: '.',
            aDec: ',',
            mDec: '0',
            aSign: "Rp. "
        });

    });
</script>