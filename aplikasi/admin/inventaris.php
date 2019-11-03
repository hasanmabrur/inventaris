<?php include("../../koneksi.php"); ?>

<?php
$judul = 'Data Inventaris';
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

    <form action="proses/inventaris/inventaris.php" method="POST">
	<label><b>Nama</b></label>
		<input type="text" name="nama" placeholder="Nama" class="form-control input-text" required>
	<label><b>Kondisi</b></label>
		<input type="text" name="kondisi" placeholder="kondisi" class="form-control input-text" required>
	<label><b>Keterangan</b></label>
		<textarea class="form-control" name="keterangan" placeholder="Keterangan..."></textarea>
		<label><b>Jumlah</b></label>
		<input type="number" name="jumlah" placeholder="Jumlah" class="input-text form-control" required>
	<label><b>Kode Inventaris</b></label>
		<input type="text" name="kode_inventaris" placeholder="Kode Inventaris" class="input-text form-control" required>
	<label><b>Tanggal Register</b></label>
		<input type="date" name="tanggal_register" placeholder="tahun-bulan-tanggal" class="form-controlate form-control" required>
	<label><b>Kode Barang</b></label>
	<div class="select">
    <select class="form-control" name="kode_barang" value="<?php 
		$data = mysqli_query($koneksi,"select * from barang");
		while($d = mysqli_fetch_array($data)){
			echo"<option>";
		echo $d['kode_barang'];}

	?>">
    <option>Pilih--</option>
    <?php 
		$data = mysqli_query($koneksi,"select * from barang");
		while($d = mysqli_fetch_array($data)){
			echo"<option>";
		echo $d['kode_barang'];}
	?>
    </select>
  </div>
  <label><b>Kode Ruang</b></label>
	<div class="select">
    <select class="form-control" name="kode_ruang" value="<?php 
		$data = mysqli_query($koneksi,"select * from ruang");
		while($d = mysqli_fetch_array($data)){
			echo"<option>";
		echo $d['kode_ruang'];}

	?>">
    <option>Pilih--</option>
    <?php
		$data = mysqli_query($koneksi,"select * from ruang");
		while($d = mysqli_fetch_array($data)){
			echo"<option>";
		echo $d['kode_ruang'];}

	?>
    </select>
  </div>
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

	<div class="table-responsive">
	<table class="table table-hover" id="dataTable">
		<thead>
			<th>NO</th>
			<th>ID INVENTARIS</th>
			<th>NAMA</th>
			<th>KODE Barang</th>
			<th></th>
		</thead>
		<?php
$no=1;
$query2 = "SELECT * FROM inventaris WHERE id_inventaris";
$sql = mysqli_query($koneksi, $query2);
while ($d = mysqli_fetch_array($sql)){
  ?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $d['id_inventaris']; ?></td>
				<td><?php echo $d['nama']; ?></td>
				<td><?php echo $d['kode_barang']; ?></td>
				<td>
					<div class="btn-group">
					<button type="button" class="btn btn-primary dropdown no-arrow show" data-toggle="dropdown">
						<i class="fa fa-list"></i>
					</button>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="?id_inventaris=<?php echo $d['id_inventaris']; ?>#open-modal">DETAIL</a>
						<a class="dropdown-item" href="proses/inventaris/edit.php?id_inventaris=<?php echo $d['id_inventaris']; ?>">EDIT</a>
						<a class="dropdown-item" href="proses/inventaris/hapus_inventaris.php?id_inventaris=<?php echo $d['id_inventaris']; ?>">HAPUS</a>
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


	<div class="table-responsive scrollable m-t-10" style="height:400px;">
	<?php
	$id_inventaris = $_GET['id_inventaris'];
	$data = mysqli_query($koneksi,"select * from inventaris where id_inventaris='$id_inventaris'");
	while($d = mysqli_fetch_array($data)){
		?>
		<form class="scrollable" method="post" action="update.php">
			<table class="table">
				<tr>			
					<td>Id Inventaris</td>
					<td>
						<?php echo $d['id_inventaris']; ?>
					</td>
				</tr>	
				<tr>			
					<td>Nama</td>
					<td>
						<?php echo $d['nama']; ?>
					</td>
				</tr>	
				<tr>			
					<td>Kondisi</td>
					<td>
						<?php echo $d['kondisi']; ?>
					</td>
				</tr>	
				<tr>			
					<td>Keterangan</td>
					<td>
						<?php echo $d['keterangan']; ?>
					</td>
				</tr>	
				<tr>			
					<td>Jumlah</td>
					<td>
						<?php echo $d['jumlah']; ?>
					</td>
				</tr>	
				<tr>			
					<td>Kode Barang</td>
					<td>
						<?php echo $d['kode_barang']; ?>
					</td>
				</tr>	
				<tr>			
					<td>Tanggal Register</td>
					<td>
						<?php echo $d['tanggal_register']; ?>
					</td>
				</tr>	
				<tr>			
					<td>Kode Ruang</td>
					<td>
						<?php echo $d['kode_ruang']; ?>
					</td>
				</tr>	
				<tr>			
					<td>Kode Inventaris</td>
					<td>
						<?php echo $d['kode_inventaris']; ?>
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
	</div>
<div class="modal-footer">
    <a class="btn btn-danger" href="inventaris.php">Keluar</a>
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
