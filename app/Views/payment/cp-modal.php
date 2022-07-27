<div class="modal fade" tabindex="-1" id="modal-cp">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cash Payment</h5>
                <a type="button" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-x"></i></a>
            </div>
            <?= form_open('cash_payment', ['class' => 'cashPayment']); ?>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="form-group">
                            <label for="amount">Jumlah Uang</label>
                            <input type="text" name="jumlah_uang" class="rp form-control border-0 text-xl text-indigo text-bold mb-2" id="amount" placeholder="amount">
                            <label for="discount">discount %</label>
                            <input type="text" name="discount" class="rp form-control border-0 text-xl text-indigo text-bold" id="discount" placeholder="discount">
                        </div>
                        <div class="form-group">
                            <label for="amount_pay">Total Bayar</label>
                            <input type="text" name="amount_pay" class="rp form-control border-0 text-xl text-indigo text-bold bg-white mb-2" id="amount_pay" placeholder="amount pay" readonly>
                            <label for="kembalian">Kembalian</label>
                            <input type="text" name="kembalian" class="rp form-control border-0 text-xl text-indigo text-bold bg-white" id="kembalian" placeholder="kembalian" readonly>
                        </div>
                    </div>
                    <div class="col-12 col-lg-8">
                        <div id="list-modal-cp">
                        </div>
                        <div id="list-payment">
                            <input type="text" id="indexPay" class="indexPay" name="indexPay" value="<?= $index; ?>">
                            <input type="text" id="no_payment_modal" class="no_payment" name="no_payment">
                            <input type="text" id="trx_date_modal" class="trx_date" name="trx_date">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="submit" class="btn bg-teal">Bayar</button>
                <button type="button" class="btn bg-navy" data-bs-dismiss="modal">Close</button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        loadGroupPayment()


        //========( hitung payment )========>
        $('#amount, #discount').keyup(function(e) {
            let amount = $('#amount').val();
            let discount = $('#discount').val();
            let amountPay = $('#amount_pay').val();
            let kembalian = $('#kembalian').val();
            let totalBayar = parseFloat(amount) - parseFloat(discount)
            $('#amount_pay').val(totalBayar)
        });

        //========( tombol bayar di klik )========>
        $('.cashPayment').submit(function(e) {
            e.preventDefault()
            $.ajax({
                type: "post",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: "json",
                success: function(response) {
                    if (response.sukses) {
                        alert('pembayaran berhasil')
                    }
                },
                error: function(xhr, throwError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + throwError);
                }
            });
        });

        //========( format rupiah )========>
        $('.rp').autoNumeric('init', {
            aSep: ',',
            aDec: '.',
            mDec: '0',
            aSign: "Rp. "
        });
    });
</script>