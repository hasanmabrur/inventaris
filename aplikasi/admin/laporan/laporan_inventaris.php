<!DOCTYPE html>
<html>
<head>
	<title>Aplikasi RPL</title>
</head>
<body>
	<style type="text/css">
	body{
		font-family: sans-serif;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		border: 1px solid #3c3c3c;
		padding: 3px 8px;

	}
	a{
		background: blue;
		color: #fff;
		padding: 8px 10px;
		text-decoration: none;
		border-radius: 2px;
	}
	</style>

	<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data Inventaris.xls");
	?>

	<center>
		<h1>Aplikasi Inventaris</h1>
		<p><b>Data Inventaris</b></p>
	</center>

	<table border="1">
		<tr>
			<th>No</th>
			<th>Id Inventaris</th>
			<th>Nama</th>
			<th>Kondisi</th>
			<th>Keterangan</th>
			<th>Jumlah</th>
			<th>Kode Barang</th>
			<th>tanggal_register</th>
			<th>Kode ruang</th>
			<th>Kode Inventaris</th>
			<th>Nama Pegawai</th>
		</tr>
		<?php 
		// koneksi database
			include "../../../koneksi.php";

		// menampilkan data pegawai
		$data = mysqli_query($koneksi,"select * from inventaris");
		$no = 1;
		while($d = mysqli_fetch_array($data)){
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $d['id_inventaris']; ?></td>
			<td><?php echo $d['nama']; ?></td>
			<td><?php echo $d['kondisi']; ?></td>
			<td><?php echo $d['keterangan']; ?></td>
			<td><?php echo $d['jumlah']; ?></td>
			<td><?php echo $d['kode_barang']; ?></td>
			<td><?php echo $d['tanggal_register']; ?></td>
			<td><?php echo $d['kode_ruang']; ?></td>
			<td><?php echo $d['kode_inventaris']; ?></td>
			<td><?php echo $d['nama_pegawai']; ?></td>
		</tr>
		<?php 
		}
		?>
	</table>
</body>
</html>