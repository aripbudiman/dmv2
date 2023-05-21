<?php $total=0; $no=1; foreach($trx as $trx): ?>
<tr>
    <th scope="row"><?= $no++; ?></th>
    <td><?= $trx['nama_pesanan']; ?></td>
    <td><?= $trx['qty']; ?></td>
    <td class="rp"><?= $trx['harga_satuan']; ?></td>
    <td class="rp"><?= $trx['jumlah']; ?></td>
    <td><button class="btn-sm btn-danger delete" data-id="<?= $trx['id']; ?>">Delete</button></td>
</tr>
<?php $total+=$trx['jumlah'] ?>
<?php endforeach; ?>
<tr class="text-center">
    <th scope="col" colspan="4">Grand Total</th>
    <th scope="col" class="rp"><?= $total; ?></th>
    <th scope="col"></th>
</tr>
<script>
    $(document).ready(function () {
         // format rupiah
            $('.rp').autoNumeric('init', {
            aSep: '.',
            aDec: ',',
            mDec: '0'
        });

        // delete 
        $('.delete').click(function (e) { 
            e.preventDefault();
            const id = $(this).data('id');
            $.ajax({
                type: "post",
                url: "/delete_trx_manual",
                data: {
                    id:id
                },
                dataType: "json",
                success: function (response) {
                    window.location.reload();
                }
            });
        });
    });
</script>