
<!DOCTYPE html>
<html>
<head>
	<title>Aplikasi Inventaris</title>
	<link rel="stylesheet" type="text/css" href="../../css/layout.css">
	<link rel="stylesheet" type="text/css" href="../../css/style.css">
</head>
<body>
	<div class="wrap">

<div class="container">




	<?php
	include '../../../../koneksi.php';
	$id_pinjam = $_GET['id_pinjam'];
	$data = mysqli_query($koneksi,"select * from peminjaman where id_pinjam='$id_pinjam'");
	while($d = mysqli_fetch_array($data)){
		?>


	<center>
		<h2>BUKTI Peminjaman Barang</h2>
	</center>

	<br/>

	<table class="table">
		<tr>
			<td>Id Pinjam</td>
			<td><?php echo $d['id_pinjam']; ?></td>
		</tr>
		<tr>
			<td>Nama Peminjam</td>
			<td><?php echo $d['nama_peminjam']; ?></td>
		</tr>
		<tr>
			<td>Kode Barang</td>
			<td><?php echo $d['kode_barang']; ?></td>
		</tr>
		<tr>
			<td>jumlah</td>
			<td><?php echo $d['jumlah']; ?></td>
		</tr>
		<tr>
			<td>Kondisi</td>
			<td><?php echo $d['kondisi']; ?></td>
		</tr>
		<tr>
			<td>Tanggal Pinjam</td>
			<td><?php echo $d['tgl_pinjam']; ?></td>
		</tr>
		<tr>
			<td>Nama Pegawai</td>
			<td><?php echo $d['nama_pegawai']; ?></td>
		</tr>
		<tr>
			<td>Id Inventaris</td>
			<td><?php echo $d['id_inventaris']; ?></td>
		</tr>
	</table>
		<?php 
	}
	?>
	<script>
		window.print();
	</script>
	
</body>
</html>