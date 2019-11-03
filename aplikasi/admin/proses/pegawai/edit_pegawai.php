<?php 
// koneksi database
include '../../../../koneksi.php';

// menangkap data yang di kirim dari form
$id_pegawai		=	$_POST['id_pegawai'];
$nama_pegawai	=	$_POST['nama_pegawai'];
$nip			=	$_POST['nip'];
$alamat			=	$_POST['alamat'];

// update data ke database
mysqli_query($koneksi,"update pegawai set nama_pegawai='$nama_pegawai', nip='$nip', alamat='$alamat' where id_pegawai='$id_pegawai'");

// mengalihkan halaman kembali ke index.php
header("location:../../pegawai.php");

?>