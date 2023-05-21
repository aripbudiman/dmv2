<?= $this->extend('layouts/index'); ?>
<?= $this->section('konten'); ?>
<div class="row">
    <div class="col">
        <div class="container mb-2">
            <a href="<?= base_url('transaksi_manual'); ?>" class="btn btn-danger"><i class="fa-solid fa-left-long"></i> Kembali</a>
        </div>
        <div class="container bg-white p-3">
            <p><?= $title; ?></p>
            <hr>
            <p>Customer : <?= $result[0]['nama_konsumen']; ?></p>
            <p>Tanggal Trx : <?= $result[0]['tgl_trx']; ?></p>
            <p>Kode Trx : <?= $result[0]['kode_trx']; ?></p>
            <a href="<?= base_url('cetak'); ?>/<?= $result[0]['kode_trx']; ?>" target="_blank" class="btn btn-warning"><i class="fa-solid fa-print"></i> Print</a>
            <input type="hidden" id="nama_konsumen" value="<?= $result[0]['nama_konsumen']; ?>">
            <input type="hidden" id="tgl_trx" value="<?= $result[0]['tgl_trx']; ?>">
            <input type="hidden" id="kode_trx" value="<?= $result[0]['kode_trx']; ?>">
        </div>
        <div class="container bg-white p-3">
            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th scope="col">No</th>
                        <th scope="col">Nama Pesanan</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Satuan</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Action</th>
                    </tr>
                    <tr>
                        <th scope="row">#</th>
                        <td><input type="text" class="w-100" id="nama_pesanan"></td>
                        <td><input type="text" class="w-100" id="qty"></td>
                        <td><input type="text" class="w-100" id="satuan"></td>
                        <td></td>
                        <td><button class="btn-sm btn-secondary" id="tambah">Tambah</button></td>
                    </tr>
                </thead>
                <tbody id="list-table">
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        // ajax tambah transaksi manual
        const kode = $('#kode_trx').val();
        $('#tambah').click(function (e) { 
            e.preventDefault();
            const namaKonsumen = $('#nama_konsumen').val();
            const tglTrx = $('#tgl_trx').val();
            const kodeTrx = $('#kode_trx').val();
            const namaPesanan = $('#nama_pesanan').val();
            const qty = $('#qty').val();
            const satuan = $('#satuan').val();
            $.ajax({
                type: "post",
                url: "/store_transaksi",
                data: {
                    namaKonsumen:namaKonsumen,
                    tglTrx:tglTrx,
                    kodeTrx:kodeTrx,
                    namaPesanan:namaPesanan,
                    qty:qty,
                    satuan:satuan
                },
                dataType: "json",
                success: function (response) {
                    if(response.success){
                        Swal.fire({
                            icon: 'success',
                            title: 'Alhamdulillah',
                            text: response.success,
                        })
                    }
                    $('#list-table').load(`/load_tr/${kode}`)
                    $('#nama_pesanan').val('');
                    $('#qty').val('');
                    $('#satuan').val('');
                }
            });
        });
        $('#list-table').load(`/load_tr/${kode}`)
    });
</script>
<?= $this->endSection(); ?>