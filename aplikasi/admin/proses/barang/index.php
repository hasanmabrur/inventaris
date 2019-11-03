<?php
session_start(); 
if( isset($_SESSION['akses']) )
{
    header('location:' . '/sim/aplikasi' .'/' .$_SESSION['akses']);
    exit();
} ?>

<?php


session_start(); 
if( !isset($_SESSION['akses']) )
{
    header('location:' . '/sim');
    exit();
} 


?>