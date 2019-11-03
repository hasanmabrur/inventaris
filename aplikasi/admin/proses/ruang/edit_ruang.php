<?php 
// koneksi database
include '../../../../koneksi.php';

// menangkap data yang di kirim dari form
$id_ruang = $_POST['id_ruang'];
$nama_ruang = $_POST['nama_ruang'];
$kode_ruang = $_POST['kode_ruang'];
$keterangan = $_POST['keterangan'];

// update data ke database
mysqli_query($koneksi,"update ruang set nama_ruang='$nama_ruang', kode_ruang='$kode_ruang', keterangan='$keterangan' where id_ruang='$id_ruang'");

// mengalihkan halaman kembali ke index.php
header("location:../../ruang.php");

?>