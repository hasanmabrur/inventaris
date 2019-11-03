<?php 
// koneksi database
include '../../../../koneksi.php';

// menangkap data yang di kirim dari form
$id_pengembalian = $_POST['id_pengembalian'];
$id_pinjam = $_POST['id_pinjam'];
$id_inventaris = $_POST['id_inventaris'];
$nama_peminjam = $_POST['nama_peminjam'];
$kode_barang = $_POST['kode_barang'];
$jumlah = $_POST['jumlah'];
$kondisi = $_POST['kondisi'];
$tgl_kembali = $_POST['tgl_kembali'];
$nama_pegawai = $_POST['nama_pegawai'];

// update data ke database
mysqli_query($koneksi,"update pengembalian set id_pinjam='$id_pinjam', id_inventaris='$id_inventaris', nama_peminjam='$nama_peminjam', kode_barang='$kode_barang', jumlah='$jumlah', kondisi='$kondisi', tgl_kembali='$tgl_kembali', nama_pegawai='$nama_pegawai' where id_pengembalian='$id_pengembalian'");

// mengalihkan halaman kembali ke index.php
header("location:../../pengembalian.php");

?>