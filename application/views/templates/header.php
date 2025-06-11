<!-- Pastikan file ini berekstensi .php jika menggunakan dan $this->session -->
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Rumah Sakit</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins/fontawesome-free/css/all.min.css'); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css'); ?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css'); ?>">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins/jqvmap/jqvmap.min.css'); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/dist/css/adminlte.min.css'); ?>">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css'); ?>">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css'); ?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins/daterangepicker/daterangepicker.css'); ?>">
  <!-- summernote -->
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins/summernote/summernote-bs4.css'); ?>">
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') ?>">

</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <a href="#" class="brand-link d-flex flex-column align-items-center justify-content-center" style="text-align: center;">
        <i class="fas fa-user-circle" style="font-size: 80px; color: black;"></i>
        <span class="brand-text font-weight-light" style="font-size: 1.2rem;">
          <?= $this->session->userdata('username'); ?>
        </span>
      </a>
      <!-- Sidebar -->
      <!-- Sidebar Menu -->
      <nav class="mt-2">
    <?php
    $level = $this->session->userdata('role');
    $segment1 = $this->uri->segment(1);
    $segment2 = $this->uri->segment(2);
    ?>
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true">
        <?php if ($level == 'admin'): ?>
            <?php
            // Logika untuk menu Data Master
            $isDataMasterActive = in_array($segment1, ['pasien', 'dokter', 'kategori']);
            $dataMasterActiveClass = $isDataMasterActive ? 'active' : '';
            $dataMasterMenuOpenClass = $isDataMasterActive ? 'menu-open' : '';
            ?>
            <li class="nav-item has-treeview <?= $dataMasterMenuOpenClass ?>">
                <a href="#" class="nav-link <?= $dataMasterActiveClass ?>">
                    <i class="nav-icon fas fa-database"></i>
                    <p>
                        Data Master
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="<?= base_url('pasien'); ?>" class="nav-link <?= ($segment1 == 'pasien' && empty($segment2)) ? 'active' : ''; ?>">
                            <i class="fas fa-user-injured nav-icon"></i>
                            <p>Data Pasien</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('dokter'); ?>" class="nav-link <?= ($segment1 == 'dokter') ? 'active' : ''; ?>">
                            <i class="fas fa-user-doctor nav-icon"></i>
                            <p>Dokter Spesialis</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('kategori'); ?>" class="nav-link <?= ($segment1 == 'kategori') ? 'active' : ''; ?>">
                            <i class="fas fa-clipboard-list nav-icon"></i>
                            <p>Status Data</p>
                        </a>
                    </li>
                </ul>
            </li>

            <?php
            // Logika untuk menu Manajemen Pengguna (Dropdown Baru)
            $isManajemenPenggunaActive = ($segment1 == 'users' || $segment1 == 'roles' || $segment1 == 'permissions'); // Tambahkan controller lain jika ada
            $manajemenPenggunaActiveClass = $isManajemenPenggunaActive ? 'active' : '';
            $manajemenPenggunaMenuOpenClass = $isManajemenPenggunaActive ? 'menu-open' : '';
            ?>
            <li class="nav-item has-treeview <?= $manajemenPenggunaMenuOpenClass ?>">
                <a href="#" class="nav-link <?= $manajemenPenggunaActiveClass ?>">
                    <i class="nav-icon fas fa-user-shield"></i> <p>
                        Manajemen Pengguna
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="<?= base_url('users'); ?>" class="nav-link <?= ($segment1 == 'users') ? 'active' : ''; ?>">
                            <i class="fas fa-users nav-icon"></i> <p>Daftar Pengguna</p>
                        </a>
                    </li>
                    </ul>
            </li>

            <li class="nav-header">LAPORAN</li>
            <li class="nav-item">
                <a href="<?= base_url('pasien/laporan'); ?>" class="nav-link <?= ($segment1 == 'pasien' && $segment2 == 'laporan') ? 'active' : ''; ?>">
                    <i class="fas fa-chart-line nav-icon"></i>
                    <p>Laporan & Statistik</p>
                </a>
            </li>
        <?php endif; ?>

        <li class="nav-header">AKUN</li>

        <?php if ($level == 'user'): ?>
            <li class="nav-item">
                <a href="<?= base_url('pasien'); ?>" class="nav-link <?= ($segment1 == 'pasien' && empty($segment2)) ? 'active' : ''; ?>">
                    <i class="fas fa-bed nav-icon"></i>
                    <p>Daftar Pasien</p>
                </a>
            </li>
        <?php endif; ?>

        <li class="nav-item">
            <a href="<?= base_url('auth/logout'); ?>" class="nav-link">
                <i class="fas fa-sign-out-alt nav-icon"></i>
                <p>Logout</p>
            </a>
        </li>
    </ul>
</nav>

      <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
  </aside>
  </div>