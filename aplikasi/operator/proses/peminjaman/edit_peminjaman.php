<?php 
// koneksi database
include '../../../../koneksi.php';

// menangkap data yang di kirim dari form
$id_pinjam = $_POST['id_pinjam'];
$nama_peminjam = $_POST['nama_peminjam'];
$kode_barang = $_POST['kode_barang'];
$jumlah = $_POST['jumlah'];
$kondisi = $_POST['kondisi'];
$tgl_pinjam = $_POST['tgl_pinjam'];
$nama_pegawai = $_POST['nama_pegawai'];
$id_inventaris = $_POST['id_inventaris'];

// update data ke database
mysqli_query($koneksi,"update peminjaman set nama_peminjam='$nama_peminjam', kode_barang='$kode_barang', jumlah='$jumlah', kondisi='$kondisi', tgl_pinjam='$tgl_pinjam', nama_pegawai='$nama_pegawai', id_inventaris='$id_inventaris' where id_pinjam='$id_pinjam'");

// mengalihkan halaman kembali ke index.php
header("location:../../peminjaman.php");

?>