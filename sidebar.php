 <?php include ("koneksi.php") ?>
 
 <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-pause"></i>
        </div>
        <div class="sidebar-brand-text mx-3">INVENTARIS</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

<!-- Jika dia admin maka tampilkan menu -->
<?php if (isset($_SESSION['saya_admin'])) { ?>

 <!-- Divider -->
 <hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Inventaris
</div>


<!-- Nav Item - Pages Collapse Tambah -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
    <i class="fas fa-fw fa-plus-circle"></i>
    <span>Tambah</span>
  </a>
  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Custom Components:</h6>
      <a class="collapse-item" href="<?php echo $url .'/aplikasi' . '/' . $_SESSION['akses'] ?>/inventaris.php">Inventaris</a>
      <a class="collapse-item" href="<?php echo $url .'/aplikasi' . '/' . $_SESSION['akses'] ?>/barang.php">Barang</a>
      <a class="collapse-item" href="<?php echo $url .'/aplikasi' . '/' . $_SESSION['akses'] ?>/ruang.php">Ruang</a>
      <a class="collapse-item" href="<?php echo $url .'/aplikasi' . '/' . $_SESSION['akses'] ?>/pegawai.php">Pegawai</a>

    </div>
  </div>
</li>


<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Layanan
</div>

<!-- Nav Item - peminjaman -->
<li class="nav-item">
  <a class="nav-link" href="<?php echo $url .'/aplikasi' . '/' . $_SESSION['akses'] ?>/peminjaman.php">
    <i class="fas fa-fw fa-shopping-bag"></i>
    <span>Peminjaman</span></a>
</li>

<!-- Nav Item - pengembalian -->
<li class="nav-item">
  <a class="nav-link" href="<?php echo $url .'/aplikasi' . '/' . $_SESSION['akses'] ?>/pengembalian.php">
    <i class="fas fa-fw fa-redo"></i>
    <span>Pengembalian</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Admin
</div>

<!-- Nav Item - user baru -->
<li class="nav-item">
  <a class="nav-link" href="<?php echo $url .'/aplikasi' . '/' . $_SESSION['akses'] ?>/user.php">
    <i class="fas fa-fw fa-user-circle"></i>
    <span>User Baru</span></a>
</li>


<!-- Jika dia operator maka tampilkan menu -->
<?php } elseif (isset($_SESSION['saya_operator'])) { ?>

 <!-- Divider -->
 <hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Inventaris
</div>


<!-- Nav Item - Pages Tambah -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
    <i class="fas fa-fw fa-plus-circle"></i>
    <span>Tambah</span>
  </a>
  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Custom Components:</h6>
      <a class="collapse-item" href="<?php echo $url .'/aplikasi' . '/' . $_SESSION['akses'] ?>/barang.php">Barang</a>
      <a class="collapse-item" href="<?php echo $url .'/aplikasi' . '/' . $_SESSION['akses'] ?>/ruang.php">Ruang</a>
      <a class="collapse-item" href="<?php echo $url .'/aplikasi' . '/' . $_SESSION['akses'] ?>/pegawai.php">Pegawai</a>

    </div>
  </div>
</li>


<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Layanan
</div>

<!-- Nav Item - Peminjaman -->
<li class="nav-item">
  <a class="nav-link" href="<?php echo $url .'/aplikasi' . '/' . $_SESSION['akses'] ?>/peminjaman.php">
    <i class="fas fa-fw fa-shopping-bag"></i>
    <span>Peminjaman</span></a>
</li>

<!-- Nav Item - Pengembalian -->
<li class="nav-item">
  <a class="nav-link" href="<?php echo $url .'/aplikasi' . '/' . $_SESSION['akses'] ?>/pengembalian.php">
    <i class="fas fa-fw fa-redo"></i>
    <span>Pengembalian</span></a>
</li>

<?php } ?>

     

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->