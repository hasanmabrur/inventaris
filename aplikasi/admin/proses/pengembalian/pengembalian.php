<?php
session_start();
include"../../../../koneksi.php";
$id_pengembalian	=	$_POST['id_pengembalian'];
$id_pinjam	=	$_POST['id_pinjam'];
$id_inventaris	=	$_POST['id_inventaris'];
$nama_peminjam	=	$_POST['nama_peminjam'];
$kode_barang	=	$_POST['kode_barang'];
$jumlah	=	$_POST['jumlah'];
$kondisi	=	$_POST['kondisi'];
$tgl_kembali	=	$_POST['tgl_kembali'];
$nama_pegawai	=	$_POST['nama_pegawai'];

mysqli_query($koneksi,"insert into pengembalian values('$id_pengembalian','$id_pinjam','$id_inventaris','$nama_peminjam','$kode_barang','$jumlah','$kondisi','$tgl_kembali','$nama_pegawai')");

// mengalihkan halaman kembali ke index.php
header("location:../../pengembalian.php");
?>
