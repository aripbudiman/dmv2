<?= form_open('post_tmp_payment', ['class' => 'formsimpan']); ?>
<?= csrf_field(); ?>
<div class="row">
    <div class="col-12">
        <button type="submit" class="btn bg-navy ml-3 my-2 insert-all">Insert All</button>
    </div>
    <div class="col-12">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">
                        <input type="checkbox" id="centangSemua">
                    </th>
                    <th scope="col">Nama Cetakan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($tampildata as $t) : ?>
                    <tr>
                        <th>
                            <input type="checkbox" id="tes" name="noPesanan[]" class="noCentang" value="<?= $t['no']; ?>">
                        </th>
                        <td class="d-none"><input type="hidden" id="nilai" class="nilai" value="<?= $t['no']; ?>"></td>
                        <td><?= $t['nama_cetakan'] . ' (<span class="rp text-navy">' . $t['harga'] . '</span>)'; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?= form_close(); ?>
<script src="aplikasi.js"></script>
<script>
    $(document).ready(function() {

        //========( form simpan ke tmp payment )========>
        $('.formsimpan').submit(function(e) {
            $('#customer').attr('disable', 'disable')
            $('#btn-customer').attr('disable', 'disable')
            let customer = $('#customer').val()
            let member = $('#member').val()
            e.preventDefault();
            $.ajax({
                type: "post",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: "json",
                beforeSend: function() {
                    $('.insert-all').attr('disable', 'disable')
                    $('.insert-all').html('<i class="fa fa-spin fa-spinner"></i>')
                },
                complete: function() {
                    $('.insert-all').removeAttr('disable')
                    $('.insert-all').html('Insert All')
                },
                success: function(response) {
                    if (response.sukses) {
                        localStorage.setItem('customer', customer);
                        localStorage.setItem('member', member);
                        //========( storage notifikasi pembayaran )========>
                        let nilai = document.querySelectorAll('.nilai');
                        let array = [];
                        nilai.forEach(n => {
                            let result = array.push(n.value)
                            localStorage.setItem('item', JSON.stringify(result))
                        });
                        //========( end localstrorage )========>
                        $('.noCentang').prop('checked', false)
                        loadGroupPayment()
                        $('#load-troli').html(response.data)
                    }
                },
                error: function(xhr, throwError) {
                    // alert(xhr.status + "\n" + xhr.responseText + "\n" + throwError);
                    if (xhr.status == 500) {
                        Swal.fire(
                            'belum ada item yg di centang?',
                            'Silahkan pilih item terlebih dahulu',
                            'error'
                        )
                    }
                }
            });
        });

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


    });
</script>