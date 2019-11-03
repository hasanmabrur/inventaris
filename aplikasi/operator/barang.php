<?php include ("../../koneksi.php"); ?>

<?php
$judul = 'Data Barang';
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
        <h4 class="m-b-0 text-white"><?php echo $judul ?></h4></div>
    <div class="card-body">
    <form action="proses/barang/barang.php" method="POST">
		<label>Nama Barang:</label>
		<input  type="text" name="nama_barang" placeholder="Nama Barang" class="input-text form-control" required>
		<label>Kode Barang:</label>
		<input  type="text" name="kode_barang" placeholder="Kode Barang" class="input-text form-control" required>
		<label>Keterangan:</label>
		<textarea class="form-control"  name="keterangan" placeholder="Keterangan..."></textarea>
		<button type="submit" class="btn btn-primary mt-2" name="submit" >Simpan</button>
		<button type="reset" class="btn btn-danger mt-2" name="submit" >Batal</button>
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
					<th>ID BARANG</th>
					<th>NAMA BARANG</th>
					<th>KODE BARANG</th>
					<th></th>
				</thead>
				<?php
				$no=1;
				$query2 = "SELECT * FROM barang WHERE id_barang";
				$sql = mysqli_query($koneksi, $query2);
				while ($d = mysqli_fetch_array($sql)){
				?>
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $d['id_barang']; ?></td>
							<td><?php echo $d['nama_barang']; ?></td>
							<td><?php echo $d['kode_barang']; ?></td>
							<td>

								<div class="btn-group">
								<button type="button" class="btn btn-primary dropdown no-arrow show" data-toggle="dropdown">
									<i class="fa fa-list"></i>
								</button>
								<div class="dropdown-menu">
									<a class="dropdown-item" href="?id_barang=<?php echo $d['id_barang']; ?>#open-modal">DETAIL</a>
									<a class="dropdown-item" href="proses/barang/edit.php?id_barang=<?php echo $d['id_barang']; ?>">EDIT</a>
									<a class="dropdown-item" href="proses/barang/hapus_barang.php?id_barang=<?php echo $d['id_barang']; ?>">HAPUS</a>
								</div>
							</td>
						</tr>
				<?php } ?>

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
        <h4 class="m-b-0 text-white">Detail Barang</h4></div>
    <div class="card-body">

    <?php
		$id_barang = $_GET['id_barang'];
		$data = mysqli_query($koneksi,"select * from barang where id_barang='$id_barang'");
		while($d = mysqli_fetch_array($data)){
		?>
		<form method="post" action="update.php">
        <center><h4>Data Barang</h4></center>
			<table class="table">
				<tr>			
					<td>Id Barang</td>
                    <td>:</td>
					<td>
						<?php echo $d['id_barang']; ?>
					</td>
				</tr>	
				<tr>			
					<td>Nama Barang</td>
                    <td>:</td>
					<td>
						<?php echo $d['nama_barang']; ?>
					</td>
				</tr>	
				<tr>			
					<td>Kode Barang</td>
                    <td>:</td>
					<td>
						<?php echo $d['kode_barang']; ?>
					</td>
				</tr>	
				<tr>			
					<td>Keterangan</td>
                    <td>:</td>
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
    <a class="btn btn-danger" href="barang.php">Keluar</a>
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