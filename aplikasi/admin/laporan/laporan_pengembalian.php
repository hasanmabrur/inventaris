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
	header("Content-Disposition: attachment; filename=Data Pengembalian.xls");
	?>

	<center>
		<h1>Aplikasi Inventaris</h1>
	</center>

	<table border="1">
		<tr>
			<th>No</th>
			<th>Id Pengembalian</th>
			<th>Id Pinjam</th>
			<th>Id Inventaris</th>
			<th>Nama Peminjam</th>
			<th>Kode Barang</th>
			<th>Jumlah</th>
			<th>Kondisi</th>
			<th>Tanggal Kembali</th>
			<th>Nama Pegawai</th>
		</tr>
		<?php 
		// koneksi database
		include "../../../koneksi.php";

		// menampilkan data pegawai
		$data = mysqli_query($koneksi,"select * from pengembalian");
		$no = 1;
		while($d = mysqli_fetch_array($data)){
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $d['id_pengembalian']; ?></td>
			<td><?php echo $d['id_pinjam']; ?></td>
			<td><?php echo $d['id_inventaris']; ?></td>
			<td><?php echo $d['nama_peminjam']; ?></td>
			<td><?php echo $d['kode_barang']; ?></td>
			<td><?php echo $d['jumlah']; ?></td>
			<td><?php echo $d['kondisi']; ?></td>
			<td><?php echo $d['tgl_kembali']; ?></td>
			<td><?php echo $d['nama_pegawai']; ?></td>
		</tr>
		<?php 
		}
		?>
	</table>
</body>
</html>