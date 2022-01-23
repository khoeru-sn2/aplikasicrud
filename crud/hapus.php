<?php
include 'koneksi.php';

$nim = $_GET['nim'];
$sqlDelete = "DELETE FROM siswa WHERE nim='$nim'";
mysqli_query($koneksi, $sqlDelete);

header("location: index.php");
?>