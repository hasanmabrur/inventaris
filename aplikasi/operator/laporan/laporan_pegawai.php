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
		<p><b>Data Pegawai</b></p>
	</center>

	<table border="1">
		<tr>
			<th>No</th>
			<th>Id Pegawai</th>
			<th>Nama Pegawai</th>
			<th>NIP</th>
			<th>Alamat</th>
		</tr>
		<?php 
		// koneksi database
		$koneksi = mysqli_connect("localhost","root","","latihan");

		// menampilkan data pegawai
		$data = mysqli_query($koneksi,"select * from pegawai");
		$no = 1;
		while($d = mysqli_fetch_array($data)){
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $d['id_pegawai']; ?></td>
			<td><?php echo $d['nama_pegawai']; ?></td>
			<td><?php echo $d['nip']; ?></td>
			<td><?php echo $d['alamat']; ?></td>
		</tr>
		<?php 
		}
		?>
	</table>
</body>
</html>