<div class="row">
    <div class="col-12">
        <button class="btn btn-primary">Insert All</button>
    </div>
    <div class="col-12">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">
                        <input type="checkbox" id="centangSemua">
                    </th>
                    <th scope="col">Nama Cetakan</th>
                    <th scope="col">Pilih</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($tampildata as $t) : ?>
                    <tr>
                        <th>
                            <input type="checkbox" name="noPesanan" class="noCentang" value="<?= $t['no']; ?>">
                        </th>
                        <td><?= $t['nama_cetakan'] . ' (<span class="rp">' . $t['harga'] . '</span>)'; ?></td>
                        <td><button class="btn btn-sm btn-info pilih" data-no="<?= $t['no']; ?>">Pilih</button></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    $(document).ready(function() {
        //========( centang semua di click )========>
        $('#centangSemua').click(function() {
            if ($(this).is(':checked')) {
                $('.noCentang').prop('checked', true)
            } else {
                $('.noCentang').prop('checked', false)
            }

        })

        //========( format rupiah )========>
        $('.rp').autoNumeric('init', {
            aSep: ',',
            aDec: '.',
            mDec: '0',
            aSign: "Rp. "
        });

        //========( tombol pilih di click )========>
        $('.pilih').click(function(e) {
            e.preventDefault();
            let noPesanan = $(this).data('no');
            $.ajax({
                type: "post",
                url: "post_tmp_payment",
                data: {
                    noPesanan: noPesanan
                },
                dataType: "json",
                success: function(response) {
                    if (response.data) {
                        $('#payment-detail').load('load_tmp_payment')
                    }
                    if (response.error) {
                        alert(response.error)
                    }
                },
                error: function(xhr, throwError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + throwError);
                }
            });
        });
    });
</script>