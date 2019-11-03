
<!DOCTYPE html>
<html>
<head>
	<title>Layout</title>
	<link rel="stylesheet" type="text/css" href="../../css/layout.css">
	<link rel="stylesheet" type="text/css" href="../../css/style.css">
</head>
<body>
	<div class="wrap">
<div class="header">
	<h1>Aplikasi Inventaris</h1>
</div>
<div class="menu">
	<ul>
  <li><a href="../../"><img src="../../../assets/images/home.png" width="30px"><h3>Home</h3></a></li>
  <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn"><img src="../../../assets/images/tambah.png" width="30px"><h3>Tambah</h3></a>
    <div class="dropdown-content">
      <a href="../../inventaris.php">Inventaris</a>
      <a href="../../ruang.php">Ruang</a>
      <a href="../../jenis.php">Jenis</a>
      <a href="../../peminjaman.php">Peminjaman</a>
      <a href="../../pegawai.php">Pegawai</a>
    </div>
  </li>
  <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn"><img src="../../../assets/images/open.png" width="30px"><h3>Open Data</h3></a>
    <div class="dropdown-content">
      <a href="../../inventaris.php">Inventaris</a>
      <a href="../../ruang.php">Ruang</a>
      <a href="../../jenis.php">Jenis</a>
      <a href="../../peminjaman.php">Peminjaman</a>
      <a href="../../pegawai.php">Pegawai</a>
    </div>
  </li>
  <li style="float:right"><a href="#about"><img src="../../../assets/images/logout.png" width="30px"><h3>Keluar</h3></a></li>
</ul>
</div>
<div class="container">
	<div class="container-small-bg-tengah">
		<h3>EDIT DATA MAHASISWA</h3>
	<div class="container-small-tengah">
		<?php
	include '../../../../koneksi.php';
	$id_ruang = $_GET['id_ruang'];
	$data = mysqli_query($koneksi,"select * from ruang where id_ruang='$id_ruang'");
	while($d = mysqli_fetch_array($data)){
		?>
		<form method="post" action="edit_ruang.php">		
					<label><b>Nama Ruang</b></label>
						<input type="hidden" name="id_ruang" class="input-text form-control" value="<?php echo $d['id_ruang']; ?>">
						<input type="text" name="nama_ruang" class="input-text form-control" value="<?php echo $d['nama_ruang']; ?>">
					<label><b>Kode Ruang</b></label>
					<input type="text" name="kode_ruang" class="input-text form-control" value="<?php echo $d['kode_ruang']; ?>">
					<label><b>Keterangan</b></label>
					<textarea class="form-control" name="keterangan" placeholder="Keterangan..."><?php echo $d['keterangan']; ?></textarea>
					<input type="submit" value="UPDATE" class="btn-simpan-col2">
					<input type="reset" value="HAPUS" class="btn btn-danger">
					<a href="../../jenis.php" class="btn-primary-col2">KEMBALI</a>
		</form>
		<?php 
	}
	?>
	</div>
</div>
<div class="footer">
	<center>Created By Herry Kurniawan</center>
</div>
</div>
</body>
</html>