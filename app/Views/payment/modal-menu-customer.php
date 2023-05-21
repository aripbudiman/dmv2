<div class="modal fade" tabindex="-1" id="menu-customer">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Customer</h5>
            </div>
            <div class="modal-body">
                <table class="table table-hover" id="table-customer">
                    <thead>
                        <tr>
                            <th scope="col">Customer</th>
                            <th scope="col">Total</th>
                            <th scope=" col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($getCs as $c) : ?>
                            <tr data-namacs="<?= $c['nama_customer']; ?>" data-member="<?= $c['id_member'] ?>">
                                <td><?= $c['nama_customer']; ?></td>
                                <td><?= $c['total']; ?></td>
                                <td><?= ($c['id_member'] == 1) ? '<span class="badge rounded-pill bg-success">member</span>' : '<span class="badge rounded-pill bg-danger">non member</span>' ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#table-customer').DataTable({
            paging: false,
            ordering: false,
            info: false,
        });
    });
</script>