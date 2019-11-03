<?php include("../../../../koneksi.php"); ?>

<?php
$judul = 'Edit Pengembalian';
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
$id_pengembalian = $_GET['id_pengembalian'];
$data = mysqli_query($koneksi,"select * from pengembalian where id_pengembalian='$id_pengembalian'");
while($d = mysqli_fetch_array($data)){
	?>
	<form method="post" action="edit_pengembalian.php">
		<input type="hidden" name="id_pengembalian" value="<?php echo $d['id_pengembalian']; ?>">	
	<label><b>Id Pinjam</b></label>

<select class="form-control" name="id_pinjam" value="<?php 

	$data = mysqli_query($koneksi,"select * from peminjaman");
	while($r = mysqli_fetch_array($data)){
		echo"<option>";
	echo $r['id_pinjam'];}

?>">
<option><?php echo $d['id_pinjam']; ?></option>
<?php 

	$data = mysqli_query($koneksi,"select * from peminjaman");
	while($r = mysqli_fetch_array($data)){
		echo"<option>";
	echo $r['id_pinjam'];}

?>
</select>

<label><b>Id Inventaris</b></label>

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
	<label><b>Nama Peminjam</b></label>
		<input type="text" name="nama_peminjam" class="input-text form-control" value="<?php echo $d['nama_peminjam']; ?>">
	
	<label><b>Kode Barang</b></label>
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
<label><b>Tanggal Kembali</b></label>

	<input class="form-control" type="date" name="tgl_kembali" placeholder="Tanggal Kembali"  value="<?php echo $d['tgl_kembali']; ?>" required>

<label><b>Id Pegawai</b></label>
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

		<input type="submit" value="UPDATE" class="btn btn-primary mt-2">
		<input type="reset" value="HAPUS" class="btn btn-danger mt-2">
		<a href="../../pengembalian.php" class="btn btn-secondary mt-2">KEMBALI</a>
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









