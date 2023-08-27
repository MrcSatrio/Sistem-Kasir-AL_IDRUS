<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <!-- <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div> -->
        <div class="sidebar-brand-text mx-3"><?= session('instansi') ?></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('koperasi/dashboard') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Kelola
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-tags"></i>
            <span>Produk</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manajemen Produk :</h6>
                <a class="collapse-item" href="<?= base_url('koperasi/produk/list') ?>">Produk List</a>
                <a class="collapse-item" href="<?= base_url('koperasi/produk/create') ?>">Tambah Produk</a>
                <h6 class="collapse-header">Manajemen Brand :</h6>
                <a class="collapse-item" href="<?= base_url('koperasi/brand/read') ?>">Brand List</a>
                <a class="collapse-item" href="<?= base_url('koperasi/brand/create') ?>">Tambah Brand</a>
                <h6 class="collapse-header">Manajemen Kategori :</h6>
                <a class="collapse-item" href="#">Kategori List</a>
                <a class="collapse-item" href="#">Tambah Kategori</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-user-tie"></i>
            <span>Pegawai</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manajemen Pegawai:</h6>
                <a class="collapse-item" href="<?= base_url('koperasi/pegawai/read') ?>">Pegawai Terdaftar</a>
                <a class="collapse-item" href="<?= base_url('koperasi/pegawai/insert') ?>">Tambah Pegawai</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
            aria-controls="collapseUtilities">
            <i class="far fa-id-card"></i>
            <span>Member Siswa</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manajemen Member:</h6>
                <a class="collapse-item" href="<?= base_url('koperasi/siswa/read') ?>">Member Terdaftar</a>
                <a class="collapse-item" href="<?= base_url('koperasi/siswa/create') ?>">Tambah Member</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Laporan
    </div>

    <!-- Nav Item -  -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('koperasi/riwayat') ?>">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Riwayat Transaksi</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>