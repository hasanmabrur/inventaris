<?php include("../../koneksi.php"); ?>

<?php
$judul = 'Data Ruang';
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
	<form action="proses/ruang/ruang.php" method="POST">
	<label><b>Nama Ruang</b></label>
		<input type="text" name="nama_ruang" placeholder="Nama Ruang" class="input-text form-control" required>
	<label><b>Kode Ruang</b></label>
		<input type="text" name="kode_ruang" placeholder="Kode Ruang" class="input-text form-control" required>
	<label><b>Keterangan</b></label>
		<textarea class="form-control" name="keterangan" placeholder="Keterangan..."></textarea>
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
			<th>ID Ruang</th>
			<th>Nama Ruang</th>
			<th>Kode Ruang</th>
			<th></th>
	</thead>
<?php
$no=1;
 $query2 = "SELECT * FROM ruang WHERE id_ruang";
 $sql = mysqli_query($koneksi, $query2);
 while ($d = mysqli_fetch_array($sql)){
  ?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $d['id_ruang']; ?></td>
				<td><?php echo $d['nama_ruang']; ?></td>
				<td><?php echo $d['kode_ruang']; ?></td>
				<td>
				<div class="btn-group">
					<button type="button" class="btn btn-primary dropdown no-arrow show" data-toggle="dropdown">
						<i class="fa fa-list"></i>
					</button>
					<div class="dropdown-menu">
					<a class="dropdown-item" href="?id_ruang=<?php echo $d['id_ruang']; ?>#open-modal">DETAIL</a>
					<a class="dropdown-item" href="proses/ruang/edit.php?id_ruang=<?php echo $d['id_ruang']; ?>">EDIT</a>
					<a class="dropdown-item" href="proses/ruang/hapus_ruang.php?id_ruang=<?php echo $d['id_ruang']; ?>">HAPUS</a>
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
	include "../../koneksi.php";
	$id_ruang = $_GET['id_ruang'];
	$data = mysqli_query($koneksi,"select * from ruang where id_ruang='$id_ruang'");
	while($d = mysqli_fetch_array($data)){
		?>
		<form method="post" action="update.php">
			<center><p>Data Inventaris</p></center>
			<table class="table">
				<tr>			
					<td>Id Ruang</td>
					<td>
						<?php echo $d['id_ruang']; ?>
					</td>
				</tr>	
				<tr>			
					<td>Nama Ruang</td>
					<td>
						<?php echo $d['nama_ruang']; ?>
					</td>
				</tr>	
				<tr>			
					<td>Kode ruang</td>
					<td>
						<?php echo $d['kode_ruang']; ?>
					</td>
				</tr>	
				<tr>			
					<td>Keterangan</td>
					<td>
						<?php echo $d['keterangan']; ?>
					</td>
				</tr>	
			</table>
		</form>
		<?php 
	}
	?>
<div class="modal-footer">
    <a class="btn btn-danger" href="ruang.php">Keluar</a>
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