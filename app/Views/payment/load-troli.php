<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        foreach ($tampildata as $t) : ?>
            <tr>
                <th scope="row"><?= $no++; ?></th>
                <td><?= $t['nama_cetakan']; ?></td>
                <td>Otto</td>
                <td>@mdo</td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>