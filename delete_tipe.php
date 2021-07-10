<?php  
include_once 'koneksi.php';
$id = $_GET['id_transaction_types'];
$sql = "DELETE FROM items WHERE id_transaction_types = $id";
$result = mysqli_query($koneksi, $sql);
		
header('location: transaksi_tipe.php');
?>