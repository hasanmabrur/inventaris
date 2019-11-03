<?php include("../../koneksi.php"); ?>

<?php
$judul = 'Data Peminjaman';
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

<div class="col-xl-4 mb-2">
<div class="card border-primary shadow">
    <div class="card-header bg-primary">
        <h4 class="m-b-0 text-white">Input <?php echo $judul ?></h4></div>
    <div class="card-body">

	<form action="proses/peminjaman/peminjaman.php" method="POST">
	<label><b>Nama Peminjam</b></label>
	<input type="hidden" name="id_pinjam">
		<input type="text" name="nama_peminjam" placeholder="Nama Peminjaman" class="input-text form-control" required>
	<label><b>Kode Barang</b></label>
	<div class="select">
    <select class="form-control" name="kode_barang" value="<?php 
		include "../../koneksi.php";
		$data = mysqli_query($koneksi,"select * from inventaris");
		while($d = mysqli_fetch_array($data)){
			echo"<option>";
		echo $d['kode_barang'];}

	?>">
    <option>Pilih--</option>
    <?php 
		include "../../koneksi.php";
		$data = mysqli_query($koneksi,"select * from inventaris");
		while($d = mysqli_fetch_array($data)){
			echo"<option>";
		echo $d['kode_barang'];}

	?>
    </select>
  </div>
	<label><b>Jumlah</b></label>
		<input type="text" name="jumlah" placeholder="Jumlah" class="input-text form-control" required>
	<label><b>Tanggal Pinjam</b></label>
		<input type="date" name="tgl_pinjam" placeholder="Tanggal Pinjam" class="form-control" required>
	<label><b>Kondisi</b></label>
		<input type="text" name="kondisi" placeholder="Kondisi" class="input-text form-control" required>
	<label><b>Id Pegawai</b></label>
	<div class="select">
    <select class="form-control" name="nama_pegawai" value="<?php 
		$data = mysqli_query($koneksi,"select * from pegawai");
		while($d = mysqli_fetch_array($data)){
			echo"<option>";
		echo $d['nama_pegawai'];}

	?>">
    <option>Pilih--</option>
    <?php 
		$data = mysqli_query($koneksi,"select * from pegawai");
		while($d = mysqli_fetch_array($data)){
			echo"<option>";
		echo $d['nama_pegawai'];}

	?>
    </select>
  </div>
  <label><b>Id Inventaris</b></label>
	<div class="select">
    <select class="form-control" name="id_inventaris" value="<?php 
		$data = mysqli_query($koneksi,"select * from inventaris");
		while($d = mysqli_fetch_array($data)){
			echo"<option>";
		echo $d['id_inventaris'];}

	?>">
    <option>Pilih--</option>
    <?php 
		$data = mysqli_query($koneksi,"select * from inventaris");
		while($d = mysqli_fetch_array($data)){
			echo"<option>";
		echo $d['id_inventaris'];}

	?>
    </select>
  </div>
	<input type="submit" class="btn btn-primary mt-2" name="submit" value="Simpan">
	<input type="reset" class="btn btn-danger mt-2" name="submit" value="Batal">
</form>


    </div>
</div>
</div>

<div class="col-xl-8 mb-2">
<div class="card border-primary shadow">
    <div class="card-header bg-primary">
        <h4 class="m-b-0 text-white"><?php echo $judul ?></h4></div>
    <div class="card-body">


	<div class="table-responsive">
	<table class="table table-hover" id="dataTable">


	<thead>
			<th>NO</th>
			<th>ID Peminjam</th>
			<th>Tanggal Pinjam</th>
			<th>Tanggal Kembali</th>	
			<th></th>
		</thead>
<?php
$no=1;
 $query2 = "SELECT * FROM peminjaman WHERE id_pinjam";
 
 $sql = mysqli_query($koneksi, $query2);
 while ($d = mysqli_fetch_array($sql)){
  ?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $d['id_pinjam']; ?></td>
				<td><?php echo $d['nama_peminjam']; ?></td>
				<td><?php echo $d['jumlah']; ?></td>
				<td>
				<div class="btn-group">
					<button type="button" class="btn btn-primary dropdown no-arrow show" data-toggle="dropdown">
						<i class="fa fa-list"></i>
					</button>
					<div class="dropdown-menu">
					<a class="dropdown-item" href="proses/peminjaman/BUKTI.php?id_pinjam=<?php echo $d['id_pinjam']; ?>" target="_blank">BUKTI</a>
					<a class="dropdown-item" href="proses/peminjaman/edit.php?id_pinjam=<?php echo $d['id_pinjam']; ?>">EDIT</a>
					<a class="dropdown-item" href="proses/peminjaman/hapus_peminjaman.php?id_pinjam=<?php echo $d['id_pinjam']; ?>">HAPUS</a>
				</div>
				</td>
			</tr>
			<?php 
		}
		?>

	</table>
	</div>

    </div>
</div>
</div>





          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
<?php include ("../../footer.php"); ?>





