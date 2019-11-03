<?php 
// koneksi database
include '../../../../koneksi.php';

// menangkap data yang di kirim dari form
$id_inventaris		=	$_POST['id_inventaris'];
$nama				=	$_POST['nama'];
$kondisi			=	$_POST['kondisi'];
$keterangan			=	$_POST['keterangan'];
$jumlah				=	$_POST['jumlah'];
$kode_barang		=	$_POST['kode_barang'];
$tanggal_register	=	$_POST['tanggal_register'];
$kode_ruang			=	$_POST['kode_ruang'];
$kode_inventaris	=	$_POST['kode_inventaris'];
$nama_pegawai			=	$_POST['nama_pegawai'];

// update data ke database
mysqli_query($koneksi,"update inventaris set nama='$nama', kondisi='$kondisi', keterangan='$keterangan', jumlah='$jumlah', kode_barang='$kode_barang' , tanggal_register='$tanggal_register', kode_ruang='$kode_ruang', kode_inventaris='$kode_inventaris', nama_pegawai='$nama_pegawai' where id_inventaris='$id_inventaris'");

// mengalihkan halaman kembali ke index.php
header("location:../../inventaris.php");

?>