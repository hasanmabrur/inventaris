<?php include ("../../../../koneksi.php"); ?>  
<?php
$judul = 'Edit Inventaris';
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

<div class="col-xl-6 mb-2">
<div class="card border-primary shadow">
    <div class="card-header bg-primary">
        <h4 class="m-b-0 text-white"><?php echo $judul ?></h4></div>
    <div class="card-body">

	<?php
	include '../../../../koneksi.php';
	$id = $_GET['id_inventaris'];
	$data = mysqli_query($koneksi,"select * from inventaris where id_inventaris='$id'");
	while($d = mysqli_fetch_array($data)){
		?>
		<form method="post" action="edit_inventaris.php">		
						<input type="hidden" name="id_inventaris" class="input-text form-control" value="<?php echo $d['id_inventaris']; ?>">
					<label><b>Nama</b></label>
						<input type="text" name="nama" class="input-text form-control" value="<?php echo $d['nama']; ?>">
					<label><b>Kondisi</b></label>
						<input type="text" name="kondisi" class="input-text form-control" value="<?php echo $d['kondisi']; ?>">
					<label><b>Keterangan</b></label>
					<textarea class="form-control" name="keterangan" placeholder="Keterangan..."><?php echo $d['keterangan']; ?></textarea>


						<label><b>Jumlah</b></label>
						<input type="text" name="jumlah" class="input-text form-control" value="<?php echo $d['jumlah']; ?>">
						<label><b>Tanggal Register</b></label>
						<input class="form-control" type="date" name="tanggal_register"  value="<?php echo $d['tanggal_register']; ?>">
						<label><b>Kode Inventaris</b></label>
						<input type="text" name="kode_inventaris" class="input-text form-control" value="<?php echo $d['kode_inventaris']; ?>">
	<label><b>Id Barang</b></label>
						
<div class="select">
    <select class="form-control" name="kode_barang" value="<?php 
		$data = mysqli_query($koneksi,"select * from barang");
		while($r = mysqli_fetch_array($data)){
			echo"<option>";
		echo $r['kode_barang'];}

	?>">
    <option><?php echo $d['kode_barang']; ?></option>
    <?php 
		$data = mysqli_query($koneksi,"select * from barang");
		while($r = mysqli_fetch_array($data)){
			echo"<option>";
		echo $r['kode_barang'];}

	?>
    </select>
  </div>


<label><b>Id Ruang</b></label>
	<div class="select">
    <select class="form-control" name="kode_ruang" value="<?php 
		$data = mysqli_query($koneksi,"select * from ruang");
		while($r = mysqli_fetch_array($data)){
			echo"<option>";
		echo $r['kode_ruang'];}

	?>">
    <option><?php echo $d['kode_ruang']; ?></option>
    <?php 
		$data = mysqli_query($koneksi,"select * from ruang");
		while($r = mysqli_fetch_array($data)){
			echo"<option>";
		echo $r['kode_ruang'];}

	?>
    </select>
  </div>
  <label><b>Id Pegawai</b></label>
	<div class="select">
    <select class="form-control" name="nama_pegawai" value="<?php 

		$data = mysqli_query($koneksi,"select * from pegawai");
		while($r = mysqli_fetch_array($data)){
			echo"<option>";
		echo $r['nama_pegawai'];}

	?>">
    <option><?php echo $d['nama_pegawai']; ?></option>
    <?php 

		$data = mysqli_query($koneksi,"select * from pegawai");
		while($r = mysqli_fetch_array($data)){
			echo"<option>";
		echo $r['nama_pegawai'];}

	?>
    </select>
  </div>
					<input type="submit" value="UPDATE" class="btn btn-primary mt-2">
					<input type="reset" value="HAPUS" class="btn btn-danger mt-2">
					<a href="../../inventaris.php" class="btn btn-secondary mt-2">KEMBALI</a>
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









