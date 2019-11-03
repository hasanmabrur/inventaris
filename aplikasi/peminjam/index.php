<?php include("../../koneksi.php"); ?>

<?php
$judul = 'Data Ruang';
?>

<?php
session_start();
 
if( !isset($_SESSION['saya_peminjam']) )
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
		<input type="text" name="nama_peminjam" placeholder="Status Peminjaman" class="input-text form-control" required>
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
	<label><b>Tanggal Pinjam</b></label>
		<input class="form-control" type="date" name="tgl_pinjam" placeholder="Tanggal Pinjam"  required>
	<label><b>Kondisi</b></label>
		<input type="text" name="kondisi" placeholder="Status Peminjaman" class="input-text form-control" required>
	<label><b>Nama Pegawai</b></label>
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

	<table class="table table-hover" id="dataTable">
	<thead>
			<th>NO</th>
			<th>ID Peminjam</th>
			<th>Nama Peminjam</th>
			<th>Jumlah</th>	
			<th width="10%">OPSI</th>
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
					<a class="btn btn-primary" href="?id_pinjam=<?php echo $d['id_pinjam']; ?>#open-modal">DETAIL</a>
				</td>
			</tr>
			<?php 
		}
		?>
	</table>

    </div>
</div>
</div>



<!-- modal -->
<div id="open-modal" class="modal-window">
<!-- isi modal -->
<div class="row justify-content-center">

<div class="col-lg-5">

    <div class="card o-hidden border-0 shadow-lg my-5">

<div class="card border-primary shadow">
    <div class="card-header bg-primary">
        <div class="m-b-0 text-white">
		Detail Inventaris
		</div>
	</div>
    <div class="card-body">

	<?php
	
	$id_pinjam = $_GET['id_pinjam'];
	$data = mysqli_query($koneksi,"select * from peminjaman where id_pinjam='$id_pinjam'");
	while($d = mysqli_fetch_array($data)){
		?>
		<form method="post" action="update.php">
			<table class="table">
				<tr>			
					<td>Id Pinjam</td>
					<td>
						<?php echo $d['id_pinjam']; ?>
					</td>
				</tr>	
				<tr>			
					<td>Nama Peminjam</td>
					<td>
						<?php echo $d['nama_peminjam']; ?>
					</td>
				</tr>	
				<tr>			
					<td>Kode Barang</td>
					<td>
						<?php echo $d['kode_barang']; ?>
					</td>
				</tr>	
				<tr>			
					<td>Jumlah</td>
					<td>
						<?php echo $d['jumlah']; ?>
					</td>
				</tr>	
				<tr>			
					<td>Kondisi</td>
					<td>
						<?php echo $d['kondisi']; ?>
					</td>
				</tr>	
				<tr>			
					<td>Tanggal Pinjam</td>
					<td>
						<?php echo $d['tgl_pinjam']; ?>
					</td>
				</tr>		
				<tr>			
					<td>Nama Pegawai</td>
					<td>
						<?php echo $d['nama_pegawai']; ?>
					</td>
				</tr>	
			</table>
		</form>
		<?php 
	}
	?>
<div class="modal-footer">
    <a class="btn btn-danger" href="index.php">Keluar</a>
</div>

    </div>
</div>
    </div>

</div>

</div>
<!-- isi modal -->
</div>
<!-- modal end -->





          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
<?php include ("../../footer.php"); ?>