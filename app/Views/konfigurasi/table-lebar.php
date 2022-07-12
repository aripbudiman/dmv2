<table class="table table-hover" id="table-bahan" width="100%">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Kategori</th>
            <th scope="col">Kode</th>
            <th scope="col">Meter</th>
            <th scope="col">Harga</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        foreach ($lebar as $l) : ?>
            <tr>
                <th scope="row" class="text-center"><?= $no++; ?></th>
                <td><?= $l['nama_bahan']; ?></td>
                <td><?= $l['kode_bahan']; ?></td>
                <td><?= $l['meter'] . ' Meter'; ?></td>
                <td class="td"><?= $l['harga_lebar']; ?></td>
                <td>
                    <button class="btn btn-sm btn-success edit-lebar"><i class="fa-solid fa-pen-to-square"></i></button>
                    <button class="btn btn-sm btn-danger delete-lebar" data-id="<?= $l['id']; ?>"><i class="fa-solid fa-trash"></i></button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<script>
    $(document).ready(function() {
        $('#table-bahan').dataTable({
            scrollX: true,
            paging: false
        })
        $('.td').autoNumeric('init', {
            aSep: ',',
            aDec: '.',
            mDec: '0'
        });
        $('.delete-lebar').click(function(e) {
            e.preventDefault();
            let id = $(this).data('id');
            $.ajax({
                type: "post",
                url: "/delete_lebar/" + id,
                dataType: "json",
                success: function(response) {
                    if (response.sukses) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Alhamdulillah',
                            text: response.sukses,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $('#load-lebar').load('/tampillebar');
                            }
                        })
                    }
                }
            });
        });
    });
</script>