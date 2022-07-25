<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nama Cetakan</th>
            <th scope="col">Status</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        foreach ($tampildata as $t) : ?>
            <tr>
                <th scope="row"><?= $no++; ?></th>
                <td><?= $t['nama_cetakan']; ?></td>
                <td class="text-danger"><?= $t['status']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>