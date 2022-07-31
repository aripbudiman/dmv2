<div class="modal fade" tabindex="-1" id="modal-cp" data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-bold text-xl text-info text-center">Cash Payment</h5>
                <!-- <a type="button" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-x"></i></a> -->
            </div>
            <?= form_open('cash_payment', ['class' => 'cashPayment']); ?>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="form-group">
                            <!-- <label for="amount">Total Harga</label> -->
                            <input type="hidden" name="customer-cp" class="form-control border-0 text-xl text-indigo text-bold mb-2" id="customer-cp">
                            <input type="hidden" name="totalHarga" class="rp form-control border-0 text-xl text-indigo text-bold mb-2" id="totalHargaModal">
                            <label for="amount">Jumlah Uang</label>
                            <input type="text" name="amount" class="rp form-control border-0 text-xl text-indigo text-bold mb-2" id="amount" placeholder="amount" autocomplete="off">
                            <div id="amount-feedback" class="invalid-feedback">
                            </div>
                            <label for="discount">discount %</label>
                            <input type="text" name="discount" class="rp form-control border-0 text-xl text-indigo text-bold" id="discount" placeholder="discount %" autocomplete="off">
                            <label for="amount_pay">Total Bayar</label>
                            <input type="text" name="amount_pay" class="rp form-control border-0 text-xl text-indigo text-bold bg-white mb-2" id="amount_pay" readonly>
                            <label for="kembalian">Kembalian</label>
                            <input type="text" name="kembalian" class="rp form-control border-0 text-xl text-indigo text-bold bg-white" id="kembalian" placeholder="kembalian" readonly>
                        </div>
                    </div>
                    <div class="col-12 col-lg-8">
                        <div id="list-modal-cp">
                        </div>
                        <div id="list-payment">
                            <input type="hidden" id="indexPay" class="indexPay" name="indexPay" value="<?= $index; ?>">
                            <input type="hidden" id="no_payment_modal" class="no_payment" name="no_payment">
                            <input type="hidden" id="trx_date_modal" class="trx_date" name="trx_date">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="submit" class="btn bg-teal">Bayar</button>
                <button type="button" id="close" class="btn bg-navy" data-bs-dismiss="modal">Close</button>
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

        $('#close').click(function(e) {
            e.preventDefault();
            $('#amount').val('');
            $('#discount').val('');
            $('#kembalian').val('');
        });

        //========( hitung payment )========>
        $('#discount').keyup(function(e) {
            hitungDiskon()
            hitungKembalian()
        });
        $('#amount').keyup(function(e) {
            hitungKembalian()
        });
        //========( tombol bayar di klik )========>
        $('.cashPayment').submit(function(e) {
            e.preventDefault()
            let totalHarga = $('#totalHarga').val();
            if (totalHarga == 0) {
                alert('belum ada pesanan yg dipilih!');
            } else {
                $.ajax({
                    type: "post",
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    dataType: "json",
                    success: function(response) {
                        if (response.sukses) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Sukses',
                                confirmButtonText: '<i class="fa-solid fa-print"></i> Print Struk',
                                text: response.sukses
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    localStorage.removeItem('item')
                                    let noPayment = $('#no_payment_modal').val();
                                    var url = "get_invoice_cp/" + noPayment
                                    window.open(url, '_blank');
                                    window.location.reload()
                                } else if (result.isDenied) {
                                    Swal.fire('Changes are not saved', '', 'info')
                                }
                            })
                            $('#modal-cp').modal('hide')
                        }
                        if (response.error) {
                            alert(response.error)
                            $('#amount').addClass('is-invalid');
                            $('#amount').removeClass('border-0');
                            $('#amount-feedback').html(response.error);
                        }
                    },
                    error: function(xhr, throwError) {
                        alert(xhr.status + "\n" + xhr.responseText + "\n" + throwError);
                    }
                });
            }
        });

        //========( format rupiah )========>
        $('.rp').autoNumeric('init', {
            aSep: '.',
            aDec: ',',
            mDec: '0'
        });
    });


    function hitungDiskon() {
        let total = $('#totalHargaModal').autoNumeric('get');
        let discount = ($('#discount').val() == "") ? 0 : $('#discount').autoNumeric('get');
        let hasil = parseFloat(total) - (parseFloat(total) * parseFloat(discount) / 100);
        $('#amount_pay').val(hasil);
        let totalBersih = $('#amount_pay').val()
        $('#amount_pay').autoNumeric('set', totalBersih)
    }

    function hitungKembalian() {
        let amount = ($('#amount').val() == "") ? 0 : $('#amount').autoNumeric('get');
        let totalBersih = $('#amount_pay').autoNumeric('get');
        let kembalian = parseFloat(amount) - parseFloat(totalBersih);
        $('#kembalian').val(kembalian);
        let hasil = $('#kembalian').val();
        $('#kembalian').autoNumeric('set', hasil);
    }
</script>