<?php
include 'koneksi.php';

    if(isset($_POST["submit"])){
    $pesan   = $_POST['pesan'];
    $tgl     = date("Y-m-d H:i:s");

    $simpan = mysql_query("INSERT INTO tweet VALUES ('','$tgl','$pesan')");
    if($simpan) {
      header("location: home.php");
    } else {
      echo "<script>alert('Ups.. Tweet anda gagal dimuat!');window.location='home.php';</script>";
    }
}
?>
