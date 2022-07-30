<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url('/'); ?>" class="brand-link">
        <!-- <img src="<?= base_url(); ?>/img/logo1.png" alt="DMPRINTING Logo" class="brand-image"> -->
        <span class="brand-text font-weight-light"></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block text-teal">Alexander Pierce</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                <li class="nav-item">
                    <a href="pages/widgets.html" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            User Management
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('customer'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Customer
                        </p>
                    </a>
                </li>
                <li class="nav-header">Input</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>
                            Pesanan
                            <i class="fas fa-angle-left right"></i>
                            <!-- <span class="badge badge-info right">6</span> -->
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('input_pesanan'); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Input Pesanan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('list_pesanan_verifikasi'); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Verifikasi Pesanan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('list_pesanan'); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Pesanan</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-money-bill"></i>
                        <p>
                            Transaksi
                            <i class="fas fa-angle-left right"></i>
                            <!-- <span class="badge badge-info right">6</span> -->
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('payment'); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Payment</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Down Payment</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-clipboard-check"></i>
                        <p>
                            Verifikasi Transaksi
                            <i class="fas fa-angle-left right"></i>
                            <!-- <span class="badge badge-info right">6</span> -->
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/layout/top-nav.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Verifikasi Barang Masuk</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Verifikasi Barang Keluar</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">Konfigurasi</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-gear"></i>
                        <p>
                            Konfigurasi
                            <i class="fas fa-angle-left right"></i>
                            <!-- <span class="badge badge-info right">6</span> -->
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('tipe'); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tipe</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('bahan'); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Bahan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('lebar'); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Lebar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('finishing'); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Finishing</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('akun'); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Akun</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">Laporan</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-circle"></i>
                        <p>
                            Pendapatan
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pendatan Tipe</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Level 2
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Level 3</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Level 3</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Level 3</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Level 2</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-circle"></i>
                        <p>
                            General Leadger
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Jurnal Umum</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Jurnal Transaksi</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>