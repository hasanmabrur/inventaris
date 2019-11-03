<?php 
// koneksi database
include "../koneksi.php";

// menangkap data yang di kirim dari form
$id = $_POST['id'];
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$hak_akses = $_POST['hak_akses'];
$md5=md5($password);

// menginput data ke database
mysqli_query($koneksi,"insert into users values('$id','$nama','$username','$md5','$hak_akses')");

// mengalihkan halaman kembali ke index.php
header("location:daftar.php");

?>


