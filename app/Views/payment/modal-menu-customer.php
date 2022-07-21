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
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($customer as $c) : ?>
                            <tr data-namacs="<?= $c['nama_customer']; ?>">
                                <td><?= $c['nama_customer']; ?></td>
                                <td><?= ($c['id_member'] == 1) ? '<span class="badge rounded-pill bg-success">member</span>' : '<span class="badge rounded-pill bg-danger">non member</span>' ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> -->
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        ('#table-customer').DataTable()
    });
</script>