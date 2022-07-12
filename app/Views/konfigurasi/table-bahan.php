<table class="table table-hover" id="table-bahan">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Kode Bahan</th>
            <th scope="col">Nama Bahan</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        foreach ($bahan as $b) : ?>
            <tr>
                <th scope="row"><?= $no++; ?></th>
                <td><?= $b['kode_bahan']; ?></td>
                <td><?= $b['nama_bahan']; ?></td>
                <td>
                    <button class="btn btn-sm btn-success edit-bahan"><i class="fa-solid fa-pen-to-square"></i></button>
                    <button class="btn btn-sm btn-danger delete-bahan" data-id="<?= $b['id']; ?>"><i class="fa-solid fa-trash"></i></button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<script>
    $(document).ready(function() {
        $('#table-bahan').dataTable({
            paging: false
        })
        $('.delete-bahan').click(function(e) {
            e.preventDefault();
            let id = $(this).data('id');
            $.ajax({
                type: "post",
                url: "delete-bahan/" + id,
                dataType: "json",
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Alhamdulillah',
                        text: response.sukses,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $('#load-table-bahan').load('/tampilbahan');
                        }
                    })
                },
                error: function(xhr, throwError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + throwError);
                }
            });
        });

    });
</script>