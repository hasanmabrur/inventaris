<?php 
// koneksi database
include '../../../../koneksi.php';

// menangkap data yang di kirim dari form
$id_barang	= $_POST['id_barang'];
$nama_barang= $_POST['nama_barang'];
$kode_barang= $_POST['kode_barang'];
$keterangan = $_POST['keterangan'];

// update data ke database
mysqli_query($koneksi,"update barang set nama_barang='$nama_barang', kode_barang='$kode_barang', keterangan='$keterangan' where id_barang='$id_barang'");

// mengalihkan halaman kembali ke index.php
header("location:../../barang.php");

?>