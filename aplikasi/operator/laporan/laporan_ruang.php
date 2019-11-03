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
	header("Content-Disposition: attachment; filename=Data Jenis.xls");
	?>

	<center>
		<h1>Aplikasi Inventaris</h1>
		<p><b>Data Ruang</b></p>
	</center>

	<table border="1">
		<tr>
			<th>No</th>
			<th>Id Ruang</th>
			<th>Nama Ruang</th>
			<th>Kode Ruang</th>
			<th>Keterangan</th>
		</tr>
		<?php 
		// koneksi database
		$koneksi = mysqli_connect("localhost","root","","latihan");

		// menampilkan data pegawai
		$data = mysqli_query($koneksi,"select * from ruang");
		$no = 1;
		while($d = mysqli_fetch_array($data)){
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $d['id_ruang']; ?></td>
			<td><?php echo $d['nama_ruang']; ?></td>
			<td><?php echo $d['kode_ruang']; ?></td>
			<td><?php echo $d['keterangan']; ?></td>
		</tr>
		<?php 
		}
		?>
	</table>
</body>
</html>