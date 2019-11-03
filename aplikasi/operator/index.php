<?php include("../../koneksi.php"); ?>

<?php
$judul = 'Dashboard';
?>

<?php
session_start();
 
if( !isset($_SESSION['saya_operator']) )
{
    header('location:./../'.$_SESSION['akses']);
    exit();
}
 
$nama = ( isset($_SESSION['nama_user']) ) ? $_SESSION['nama_user'] : '';
?>


<?php include("../../header.php"); ?>
<?php include("../../sidebar.php"); ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

      <?php include ("../../topbar.php"); ?>  

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
		  <h1 class="h3 mb-4 text-gray-800"><?php echo $judul ?></h1>

		  <div class="row">

		 <!-- Data Barang -->
			<a href="barang.php" class="col-xl-4 col-md-6 mb-4 text-card">
              <div class="card border-left-warning bg-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-ms font-weight-bold text-light text-uppercase mb-1">Data Barang</div>
                      <div class="h5 text-ms font-weight-bold text-light text-uppercase mb-1">
                        <?php
                        $result=mysqli_query($koneksi, "SELECT * FROM barang");
                        echo "<b>".mysqli_num_rows($result)."</b>";
                        ?>	
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-cubes fa-3x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
			</a>

		 <!-- Data Pegawai -->
     <a href="pegawai.php" class="col-xl-4 col-md-6 mb-4 text-card">
              <div class="card border-left-success bg-secondary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-ms font-weight-bold text-light text-uppercase mb-1">Data Pegawai</div>
                      <div class="h5 text-ms font-weight-bold text-light text-uppercase mb-1">
                      <?php
                        $result=mysqli_query($koneksi, "SELECT * FROM pegawai");
                        echo "<b>".mysqli_num_rows($result)."</b>";
                        ?>	

                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-3x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
      </a>

		 <!-- Data Ruang -->
     <a href="ruang.php" class="col-xl-4 col-md-6 mb-4 text-card">
              <div class="card border-left-warning bg-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-ms font-weight-bold text-light text-uppercase mb-1">Data Ruang</div>
                      <div class="h5 text-ms font-weight-bold text-light text-uppercase mb-1">
                      <?php
                        $result=mysqli_query($koneksi, "SELECT * FROM ruang");
                        echo "<b>".mysqli_num_rows($result)."</b>";
                        ?>	
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-qrcode fa-3x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
    </a>


		 <!-- Data Peminjaman -->
     <a href="peminjaman.php" class="col-xl-4 col-md-6 mb-4 text-card">
              <div class="card border-left-warning bg-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-ms font-weight-bold text-light text-uppercase mb-1">Data Peminjaman</div>
                      <div class="h5 text-ms font-weight-bold text-light text-uppercase mb-1">
                      <?php
                        $result=mysqli_query($koneksi, "SELECT * FROM peminjaman");
                        echo "<b>".mysqli_num_rows($result)."</b>";
                        ?>	
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-shopping-bag fa-3x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
     </a>

		 <!-- Data Pengembalian -->
     <a href="pengembalian.php" class="col-xl-4 col-md-6 mb-4 text-card">
              <div class="card border-left-success bg-dark shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-ms font-weight-bold text-light text-uppercase mb-1">Data Pengembalian</div>
                      <div class="h5 text-ms font-weight-bold text-light text-uppercase mb-1">
                      <?php
                        $result=mysqli_query($koneksi, "SELECT * FROM pengembalian");
                        echo "<b>".mysqli_num_rows($result)."</b>";
                        ?>	
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-redo fa-3x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
      </a>

		  </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->


<?php include ("../../footer.php"); ?>
