<!DOCTYPE html>
<html>
<head>
	<title>Export Data Ke Excel Dengan PHP - www.malasngoding.com</title>
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
	header("Content-Disposition: attachment; filename=Data Jenis.xls");
	?>

	<center>
		<h1>Aplikasi Inventaris</h1>
	</center>

	<table border="1">
		<tr>
			<th>No</th>
			<th>Id Jenis</th>
			<th>Nama Jenis</th>
			<th>Kode Jenis</th>
			<th>Keterangan</th>
		</tr>
		<?php 
		// koneksi database
		$koneksi = mysqli_connect("localhost","root","","latihan");

		// menampilkan data pegawai
		$data = mysqli_query($koneksi,"select * from jenis");
		$no = 1;
		while($d = mysqli_fetch_array($data)){
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $d['id_jenis']; ?></td>
			<td><?php echo $d['nama_jenis']; ?></td>
			<td><?php echo $d['kode_jenis']; ?></td>
			<td><?php echo $d['keterangan']; ?></td>
		</tr>
		<?php 
		}
		?>
	</table>
</body>
</html>