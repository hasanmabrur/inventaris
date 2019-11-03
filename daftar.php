<?php
session_start();
 
if( isset($_SESSION['akses']) )
{
    header('location:'.$_SESSION['akses']);
    exit();
}
 
$error = '';
if( isset($_SESSION['error']) ) {
 
     $error = $_SESSION['error']; // set error
 
     unset($_SESSION['error']);
} ?>

<?php echo $error;?>
<html>
<title>Login</title>

	<style type="text/css">

html {
background: url(a.png) no-repeat fixed;
   -webkit-background-size: 100% 100%;
   -moz-background-size: 100% 100%;
   -o-background-size: 100% 100%;
   background-size: 100% 100%;
}

</style>
<link rel="stylesheet" type="text/css" href="css/login.css">
<?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan']=="gagal"){
			echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
		}
	}
	?>
  <?php
session_start();
 
if( !isset($_SESSION['saya_admin']) )
{
    header('location:./../'.$_SESSION['akses']);
    exit();
}
 
$nama = ( isset($_SESSION['nama_user']) ) ? $_SESSION['nama_user'] : '';
?>
<body>

<div class="container">
<div class="head">
<b>Form Login</b>
</div>
<br>
<form action="proses_daftar.php" method="post">
<label><b>Nama</b></label>
<input type="text" name="nama" class="input" placeholder="nama" />
<label><b>Username</b></label>
<input type="text" name="username" class="input" placeholder="Username" /> <br>
<label><b>Password</b></label>
<input type="password" name="password" class="input" placeholder="password" />
<label><b>Hak Akses</b></label>
<input type="text" name="hak_akses" class="input" placeholder="Hak Akses" /> <br>
<br>
<input type="submit" value="Daftar" class="btn-daftar">
<form action="login.php" method="post">
<input type="submit" value="Login" class="btn-login">
</form>
</form>
</div>
</body>
</html>
