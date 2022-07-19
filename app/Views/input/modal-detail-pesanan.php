<div class="modal fade" id="detail-pesanan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Pesanan</h5>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>
            <div class="modal-body">
                <table class="table">
                    <tbody id="table-detail">
                    </tbody>
                </table>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-success approve">Approve</button>
                <button type="button" class="btn btn-danger reject">Reject</button>
            </div>
        </div>
    </div>
</div>
<script>
    $('#rp').autoNumeric('init', {
        aSep: ',',
        aDec: '.',
        mDec: '0'
    });
</script>