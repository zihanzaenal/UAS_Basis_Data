<?php 
$host       = "localhost";
$user       = "root";
$password   = "";
$database   ="zihanzaenal_311910408";

$koneksi    = mysqli_connect($host,$user,$password,$database);

if (mysqli_connect_errno($koneksi)) {
    echo "Gagal tersambung ke MYSQL" . mysqli_connect_errno();
}
?>
