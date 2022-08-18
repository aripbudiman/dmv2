<div class="modal fade" tabindex="-1" id="modal-dp" data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <?= form_open('bayar_dp', ['class' => 'formdp']); ?>
            <div class="modal-header">
                <h5 class="modal-title text-bold text-xl text-navy text-center">Down Payment</h5>
                <!-- <a type="button" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-x"></i></a> -->
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="form-group">
                            <input type="hidden" id="dp_customer" title="customer" name="dpCustomer">
                            <input type="hidden" name="totalHarga" class="rp form-control border-0 text-xl text-indigo text-bold mb-2" id="total_harga">
                            <input type="text" name="voucher" class="rp form-control border-0 text-xl text-indigo text-bold mb-2" id="voucher" value="<?= $voucher; ?>">
                            <label for="totalBayar">Harga yg harus dibayar</label>
                            <input type="text" name="totalBayar" class="rp bg-white form-control border-0 text-xl text-indigo text-bold mb-2" id="totalBayar" placeholder="Total Bayar" autocomplete="off" readonly>
                            <label for="diskon">Diskon %</label>
                            <input type="text" name="diskon" class="rp form-control border-0 text-xl text-indigo text-bold mb-2" id="diskon" placeholder="Diskon" autocomplete="off">
                            <label for="jumlahUang">Bayar DP</label>
                            <input type="text" name="jumlahUang" class="rp form-control border-0 text-xl text-indigo text-bold mb-2" id="jumlahUang" placeholder="Jumlah Uang" autocomplete="off">
                            <div id="jumlahUang-feedback" class="invalid-feedback">
                            </div>
                            <label for="sisaPiutang">Sisa Piutang</label>
                            <input type="text" name="sisaPiutang" class="rp bg-white form-control border-0 text-xl text-indigo text-bold mb-2" id="sisaPiutang" placeholder="Sisa Piutang" autocomplete="off" readonly>
                        </div>
                    </div>
                    <div class="col-12 col-lg-8">
                        <div id="list-modal-dp">
                        </div>
                        <div id="list-payment">
                            <input type="hidden" id="indexPay" class="indexPay" name="indexPay" value="<?= $index; ?>">
                            <input type="hidden" id="no_payment_modal-dp" class="no_payment" name="no_payment">
                            <input type="hidden" id="trx_date_modal-dp" class="trx_date" name="trx_date">
                            <input type="hidden" id="user_id" class="form-control" name="user_id" value="<?= user()->id ?>" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="submit" class="btn bg-teal">Bayar Dp</button>
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
        $('.rp').autoNumeric('init', {
            aSep: '.',
            aDec: ',',
            mDec: '0'
        });
        $('#diskon').keyup(function(e) {
            hitungDiskonDp()
            hitungSisaPiutang()
        });
        $('#jumlahUang').keyup(function(e) {
            hitungSisaPiutang()
        })


        $('.formdp').submit(function(e) {
            e.preventDefault();
            let totalUang = $("#jumlahUang").val()
            let totalBayar = $("#totalBayar").autoNumeric('get')
            if (totalUang >= totalBayar) {
                alert('pembayaran di batalkan');
                window.location.reload()
                return false;
            } else if (totalUang == '') {
                alert('pembayaran di batalkan');
                window.location.reload()
                return false;
            }
            $.ajax({
                type: "post",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: "json",
                success: function(response) {
                    if (response.sukses) {
                        Swal.fire(
                            'Transaksi Berhasil!',
                            response.sukses,
                            'success'
                        ).then((result) => {
                            if (result.isConfirmed) {
                                localStorage.removeItem('item')
                                localStorage.removeItem('customer')
                                let noPayment = $('#no_payment_modal-dp').val();
                                var url = "get_invoice_dp/" + noPayment
                                window.open(url, '_blank');
                                window.location.reload()
                            } else if (result.isDenied) {
                                Swal.fire('Changes are not saved', '', 'info')
                            }
                        })
                    }
                    $('#modal-dp').modal('hide')
                },
                error: function(xhr, throwError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + throwError);
                }
            });
        });

    });

    //========( fungsi sweet alert )========>
    function notif(text) {
        Swal.fire(
            'Transaksi GAGAGL!!',
            text,
            'warning'
        )
    }

    function sukses(judul, text, icon) {
        Swal.fire(
            judul,
            text,
            icon
        )
    }
    //========( hitung diskon )========>
    function hitungDiskonDp() {
        let totalHarga = $('#total_harga').autoNumeric('get')
        let diskon = ($('#diskon').val() == '') ? 0 : $('#diskon').autoNumeric('get')
        let hasil = parseFloat(totalHarga) - (parseFloat(totalHarga) * parseFloat(diskon) / 100);
        $('#totalBayar').val(hasil);
        let totalBersih = $('#totalBayar').val()
        $('#totalBayar').autoNumeric('set', totalBersih)
    }

    //========( hitungh sisa piutang )========>
    function hitungSisaPiutang() {
        let totalBayar = $('#totalBayar').autoNumeric('get');
        let jumlahUang = ($('#jumlahUang').val() == "") ? 0 : $('#jumlahUang').autoNumeric('get');
        let sisa = parseFloat(totalBayar) - parseFloat(jumlahUang)
        let result = $('#sisaPiutang').val(sisa)
        let hasil = $('#sisaPiutang').val();
        $('#sisaPiutang').autoNumeric('set', hasil);
    }
</script>