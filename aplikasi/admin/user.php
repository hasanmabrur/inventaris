<?php include("../../koneksi.php"); ?>

<?php
$judul = 'Data User';
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

	<form action="proses/daftar/proses_daftar.php" method="post">
<label><b>Nama</b></label>
<input type="text" name="nama" class="form-control" placeholder="Nama" />
<label><b>Username</b></label>
<input type="text" name="username" class="form-control" placeholder="Username" /> <br>
<label><b>Password</b></label>
<input type="password" name="password" class="form-control" placeholder="password" />
<label><b>Hak Akses</b></label>
<select name="hak_akses" class="form-control">
  <option value="">-pilih-</option>
  <option value="admin">admin</option>
  <option value="operator">operator</option>
  <option value="peminjam">peminjam</option>
</select>
<br>
<input type="submit" value="Daftar" class="btn btn-primary">
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
			<th>Nama</th>
			<th>Username</th>
			<th>Hak Akses</th>
			<th></th>
		</thead>
		<?php
$no=1;
$query2 = "SELECT * FROM users WHERE id";
$sql = mysqli_query($koneksi, $query2);
while ($d = mysqli_fetch_array($sql)){
  ?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $d['nama']; ?></td>
				<td><?php echo $d['username']; ?></td>
				<td><?php echo $d['hak_akses']; ?></td>
				<td>
					<a class="btn btn-danger" href="proses/daftar/hapus.php?id=<?php echo $d['id']; ?>"><i class="fas fa-trash"></i></a>
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