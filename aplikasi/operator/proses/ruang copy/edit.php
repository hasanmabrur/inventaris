<?php 	include ('../../../../koneksi.php'); ?>

<?php
$judul = 'Edit Ruang';
?>

<?php
session_start();
 
if( !isset($_SESSION['saya_admin']) )
{
    header('location:./../'.$_SESSION['akses']);
    exit();
}
 
$nama = ( isset($_SESSION['nama_user']) ) ? $_SESSION['nama_user'] : '';
?>


<?php include("../../../../header.php"); ?>
<?php include("../../../../sidebar.php"); ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

      <?php include ("../../../../topbar.php"); ?>  

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
		  <h1 class="h3 mb-4 text-gray-800"><?php echo $judul ?></h1>

		  <div class="row">

<div class="col-xl-4 mb-2">
<div class="card border-primary shadow">
    <div class="card-header bg-primary">
        <h4 class="m-b-0 text-white">Input <?php echo $judul ?></h4></div>
    <div class="card-body">
	<?php
	$id_ruang = $_GET['id_ruang'];
	$data = mysqli_query($koneksi,"select * from ruang where id_ruang='$id_ruang'");
	while($d = mysqli_fetch_array($data)){
		?>
		<form method="post" action="edit_ruang.php">		
					<label><b>Nama Ruang</b></label>
						<input type="hidden" name="id_ruang" class="input-text form-control" value="<?php echo $d['id_ruang']; ?>">
						<input type="text" name="nama_ruang" class="input-text form-control" value="<?php echo $d['nama_ruang']; ?>">
					<label><b>Kode Ruang</b></label>
					<input type="text" name="kode_ruang" class="input-text form-control" value="<?php echo $d['kode_ruang']; ?>">
					<label><b>Keterangan</b></label>
					<textarea class="form-control" name="keterangan" placeholder="Keterangan..."><?php echo $d['keterangan']; ?></textarea>
					<input type="submit" value="UPDATE" class="btn btn-primary mt-2">
					<input type="reset" value="HAPUS" class="btn btn-danger mt-2">
					<a href="../../ruang.php" class="btn btn-secondary mt-2">KEMBALI</a>
		</form>
		<?php 
	}
	?>

    </div>
</div>
</div>



          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
<?php include ("../../../../footer.php"); ?>