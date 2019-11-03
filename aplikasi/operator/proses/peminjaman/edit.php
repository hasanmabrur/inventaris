<?php include("../../../../koneksi.php"); ?>

<?php
$judul = 'Edit Peminjaman';
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
	$id_pinjam = $_GET['id_pinjam'];
	$data = mysqli_query($koneksi,"select * from peminjaman where id_pinjam='$id_pinjam'");
	while($d = mysqli_fetch_array($data)){
		?>
		<form method="post" action="edit_peminjaman.php">		
			<input type="hidden" name="id_pinjam" value="<?php echo $d['id_pinjam']; ?>">
	<label><b>Nama Peminjam</b></label>
			<input type="text" name="nama_peminjam" class="input-text form-control" value="<?php echo $d['nama_peminjam']; ?>">
		
		<label><b>Id Barang</b></label>
    <select class="form-control" name="kode_barang" value="<?php 

		$data = mysqli_query($koneksi,"select * from inventaris");
		while($r = mysqli_fetch_array($data)){
			echo"<option>";
		echo $r['kode_barang'];}

	?>">
    <option><?php echo $d['kode_barang']; ?></option>
    <?php 

		$data = mysqli_query($koneksi,"select * from inventaris");
		while($r = mysqli_fetch_array($data)){
			echo"<option>";
		echo $r['kode_barang'];}

	?>
    </select>
		<label><b>Jumlah</b></label>
			<input type="text" name="jumlah" class="input-text form-control" value="<?php echo $d['jumlah']; ?>">
		<label><b>Kondisi</b></label>
			<input type="text" name="kondisi" class="input-text form-control" value="<?php echo $d['kondisi']; ?>">

<label><b>Tanggal Pijam</b></label>
		<input class="form-control" type="date" name="tgl_pinjam" placeholder="Tanggal Kembali"  value="<?php echo $d['tgl_pinjam']; ?>" required>
 <label><b>Nama Pegawai</b></label>
	
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
  <label><b>Id Inventaris</b></label>
	<div class="select">
    <select class="form-control" name="id_inventaris" value="<?php 

		$data = mysqli_query($koneksi,"select * from inventaris");
		while($r = mysqli_fetch_array($data)){
			echo"<option>";
		echo $r['id_inventaris'];}

	?>">
    <option><?php echo $d['id_inventaris']; ?></option>
    <?php 

		$data = mysqli_query($koneksi,"select * from inventaris");
		while($r = mysqli_fetch_array($data)){
			echo"<option>";
		echo $r['id_inventaris'];}

	?>
    </select>
  </div>

		<input type="submit" value="UPDATE" class="btn btn-primary mt-2">
		<input type="reset" value="HAPUS" class="btn btn-danger mt-2">
		<a href="../../peminjaman.php" class="btn btn-secondary mt-2">KEMBALI</a>
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