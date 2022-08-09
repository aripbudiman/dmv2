<nav class="main-header navbar navbar-expand navbar-dark navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <a id="notif_pembayaran">
        </a>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><?= user()->username; ?> <i class="fas fa-user"></i></a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow" style="left: 0px; right: inherit;">
                <li><a href="#" class="dropdown-item">Pengaturan Akun </a></li>
                <li><a href="<?= base_url('logout'); ?>" class="dropdown-item">Logout</a></li>
            </ul>
        </li>
    </ul>
</nav>

<script>
    $(document).ready(function() {
        if (localStorage.getItem('item')) {
            let item = localStorage.getItem('item')
            $('#notif_pembayaran').attr({
                "href": "payment",
                "title": "payment"
            });
            $('#notif_pembayaran').html(`<h4 class="text-teal">${item} item belum di bayar</h4>`)
        } else {
            $('#notif_pembayaran').html('')
        }
    });
</script>