<?php include("../../koneksi.php"); ?>

<?php
$judul = 'Data Pengembalian';
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

	<form action="proses/pengembalian/pengembalian.php" method="POST">
	<label><b>ID Pinjam</b></label>
	<div class="select">
    <select class="form-control" name="id_pinjam" value="<?php 
		$data = mysqli_query($koneksi,"select * from peminjaman");
		while($d = mysqli_fetch_array($data)){
			echo"<option>";
		echo $d['id_pinjam'];}

	?>">
    <option>Pilih--</option>
    <?php 
		$data = mysqli_query($koneksi,"select * from peminjaman");
		while($d = mysqli_fetch_array($data)){
			echo"<option>";
		echo $d['id_pinjam'];}

	?>
	</select>
  </div>
  <label><b>ID Inventaris</b></label>
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
	<label><b>Nama Peminjam</b></label>
		<input type="text" name="nama_peminjam" placeholder="Nama Peminjaman" class="input-text form-control" required>
	<label><b>Kode Barang</b></label>
	<div class="select">
    <select class="form-control" name="kode_barang" value="<?php 
		$data = mysqli_query($koneksi,"select * from inventaris");
		while($d = mysqli_fetch_array($data)){
			echo"<option>";
		echo $d['kode_barang'];}

	?>">
    <option>Pilih--</option>
    <?php 
		$data = mysqli_query($koneksi,"select * from inventaris");
		while($d = mysqli_fetch_array($data)){
			echo"<option>";
		echo $d['kode_barang'];}
	?>
    </select>
  </div>
	<label><b>Jumlah</b></label>
		<input type="text" name="jumlah" placeholder="Status Peminjaman" class="input-text form-control" required>
	<label><b>Tanggal Kembali</b></label>
		<input class="form-control" type="date" name="tgl_kembali" placeholder="Tanggal Kembali"  required>
	<label><b>Kondisi</b></label>
		<input type="text" name="kondisi" placeholder="Status Peminjaman" class="input-text form-control" required>
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
			<th>ID Pengembalian</th>
			<th>Nama Peminjaman</th>
			<th>Jumlah</th>	
			<th></th>
		</thead>
<?php 
$no=1;
$query2 = "SELECT * FROM pengembalian WHERE id_pengembalian";
$sql = mysqli_query($koneksi, $query2);
while ($d = mysqli_fetch_array($sql)){
  ?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $d['id_pengembalian']; ?></td>
				<td><?php echo $d['nama_peminjam']; ?></td>
				<td><?php echo $d['jumlah']; ?></td>
				<td>

				<div class="btn-group">
					<button type="button" class="btn btn-primary dropdown no-arrow show" data-toggle="dropdown">
						<i class="fa fa-list"></i>
					</button>
					<div class="dropdown-menu">
					<a class="dropdown-item" href="proses/pengembalian/BUKTI.php?id_pengembalian=<?php echo $d['id_pengembalian']; ?>" target="_blank">BUKTI</a>
					<a class="dropdown-item" href="proses/pengembalian/edit.php?id_pengembalian=<?php echo $d['id_pengembalian']; ?>">EDIT</a>
					<a class="dropdown-item" href="proses/pengembalian/hapus_pengembalian.php?id_pengembalian=<?php echo $d['id_pengembalian']; ?>">HAPUS</a>
				</td>
				</div>
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