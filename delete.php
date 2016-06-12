<?php
include 'koneksi.php';
$konten = $_GET['konten'];
mysql_query("DELETE FROM tweet WHERE konten='$konten'");
header("location:home.php");
?>
