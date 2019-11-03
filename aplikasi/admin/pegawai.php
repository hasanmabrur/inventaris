<?php include("../../koneksi.php"); ?>

<?php
$judul = 'Data Pegawai';
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
	<form action="proses/pegawai/pegawai.php" method="POST">
	<label><b>Nama Pegawai</b></label>
		<input type="text" name="nama_pegawai" placeholder="Nama Pegawai" class="input-text form-control" required>
	<label><b>NIP</b></label>
		<input type="text" name="nip" placeholder="NIP" class="input-text form-control" required>
	<label><b>Alamat</b></label>
	<textarea class="form-control" name="Alamat" placeholder="Alamat..."></textarea>
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
			<th>ID PEGAWAI</th>
			<th>NAMA PEGAWAI</th>
			<th>NIP</th>
			<th></th>
		</thead>
		<?php
$no=1;
 $query2 = "SELECT * FROM pegawai WHERE id_pegawai";
 
 $sql = mysqli_query($koneksi, $query2);
 while ($d = mysqli_fetch_array($sql)){
  ?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $d['id_pegawai']; ?></td>
				<td><?php echo $d['nama_pegawai']; ?></td>
				<td><?php echo $d['nip']; ?></td>
				<td>
				<div class="btn-group">
					<button type="button" class="btn btn-primary dropdown no-arrow show" data-toggle="dropdown">
						<i class="fa fa-list"></i>
					</button>
					<div class="dropdown-menu">
<a class="dropdown-item" href="?id_pegawai=<?php echo $d['id_pegawai']; ?>#open-modal">DETAIL</a>
<a class="dropdown-item" href="proses/pegawai/edit.php?id_pegawai=<?php echo $d['id_pegawai']; ?>">EDIT</a>
<a class="dropdown-item" href="proses/pegawai/hapus_pegawai.php?id_pegawai=<?php echo $d['id_pegawai']; ?>">HAPUS</a>
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

	<?php
	$id_pegawai = $_GET['id_pegawai'];
	$data = mysqli_query($koneksi,"select * from pegawai where id_pegawai='$id_pegawai'");
	while($d = mysqli_fetch_array($data)){
		?>
		<form method="post" action="update.php">
			<center><p>Data Inventaris</p></center>
			<table class="table">
				<tr>			
					<td>Id Pegawai</td>
					<td>
						<?php echo $d['id_pegawai']; ?>
					</td>
				</tr>	
				<tr>			
					<td>Nama Pegawai</td>
					<td>
						<?php echo $d['nama_pegawai']; ?>
					</td>
				</tr>	
				<tr>			
					<td>NIP</td>
					<td>
						<?php echo $d['nip']; ?>
					</td>
				</tr>	
				<tr>			
					<td>Alamat</td>
					<td>
						<?php echo $d['alamat']; ?>
					</td>
				</tr>	
			</table>
		</form>
		<?php 
	}
	?>
<div class="modal-footer">
    <a class="btn btn-danger" href="pegawai.php">Keluar</a>
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



