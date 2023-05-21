<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
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
        $id = 0;
        foreach ($lebar as $l) : ?>
            <tr>
                <th scope="row" class="text-center"><?= $no++; ?></th>
                <td><?= $l['nama_bahan']; ?></td>
                <td><?= $l['kode_bahan']; ?></td>
                <td><?= $l['meter'] . ' Meter'; ?></td>
                <td class="td"><?= $l['harga_lebar']; ?></td>
                <td>
                    <button class="btn btn-sm btn-success edit-lebar" data-id-lebar="<?= ($id++); ?>" data-id-bahan="<?= $l['idBahan']; ?>"><i class="fa-solid fa-pen-to-square"></i></button>
                    <button class="btn btn-sm btn-danger delete-lebar" data-id="<?= $l['id']; ?>"><i class="fa-solid fa-trash"></i></button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php
json_encode($lebar);
?>
<!-- Modal -->
<div class="modal fade" id="modal-edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Ubah data</h5>
            </div>
            <?= form_open('/edit_lebar', ['class' => 'edit_lebar']); ?>
            <div class="modal-body">
                <div class="mb-3">
                    <!-- <label for="id-lebar-modal" class="form-label">Id</label> -->
                    <input type="hidden" class="form-control" id="id-lebar-modal" name="id-lebar-modal" readonly>
                </div>
                <div class="mb-3">
                    <label for="id-bahan" class="form-label">id Bahan</label>
                    <select name="id-bahan" id="id-bahan" class="form-control" readonly>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="meter-modal" class="form-label">Meter</label>
                    <input type="text" class="form-control" id="meter-modal" name="meter-modal">
                </div>
                <div class="mb-3">
                    <label for="harga-lebar" class="form-label">Harga Lebar</label>
                    <input type="text" class="form-control" id="harga-lebar" name="harga-lebar">
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary">Update</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#table-bahan').dataTable({
            "scrollX": true,
            "paging": false,
            "columnDefs": [{
                targets: 4,
                render: $.fn.dataTable.render.number('.', ',', 0, 'Rp ')
            }],
            "ordering": false,
            "scrollY": '50vh'
        })

        //========( edit lebar )========>
        $('.edit-lebar').click(function(e) {
            const idLebar = $(this).data('id-lebar');
            const idBahan = $(this).data('idBahan');
            const data = [<?= json_encode($lebar) ?>]
            for (let i = 0; i < data.length; i++) {
                let op = `<option value = "${data[0][idLebar].id}" readonly>${data[0][idLebar].nama_bahan}</option>`
                let id = `${data[0][idLebar].id}`
                let meter = `${data[0][idLebar].meter}`
                let harga = `${data[0][idLebar].harga_lebar}`
                $('#id-bahan').html(op)
                $('#id-lebar-modal').val(id)
                $('#meter-modal').val(meter)
                $('#harga-lebar').val(harga)
                console.log(data[0][idLebar])
            }
            $('#modal-edit').modal('show')
        });

        //========(  update lebar )========>
        $('.edit_lebar').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "post",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: "json",
                success: function(response) {
                    if (response.sukses) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Alhamdulillah',
                            confirmButtonText: '<i class="fa fa-thumbs-up"></i> Berhasil!',
                            text: response.sukses,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload(true)
                            }
                        })
                    }
                    $('#modal-edit').modal('hide')
                },
                error: function(xhr, throwError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + throwError);
                }
            });
        });

        //========( delete lebar )========>
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