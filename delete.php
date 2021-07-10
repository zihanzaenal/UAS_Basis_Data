<?php  
include_once 'koneksi.php';
foreach ($_GET as $key => $value){
	switch ($key) {
		case 'id_item':
			// code...
			$id = $_GET['id_item'];
			$sql = "DELETE FROM items WHERE id_item = $id";
			$result = mysqli_query($koneksi, $sql);
			break;
		
		case 'id_transaction':
			// code...
			$id = $_GET['id_transaction'];
			$sql = "DELETE FROM transaction WHERE id_transaction = $id";
			$result = mysqli_query($koneksi, $sql);
			break;
		
		case 'id_transaction_types':
			// code...
			$id = $_GET['id_transaction_types'];
			$sql = "DELETE FROM transaction_types WHERE id_transaction_types = $id";
			$result = mysqli_query($koneksi, $sql);
			break;
		
		case 'id_transaction_det':
			// code...
			$id = $_GET['id_transaction_det'];
			$sql = "DELETE FROM transaction_details WHERE id_transaction_det = $id";
			$result = mysqli_query($koneksi, $sql);
			break;
		
		default:
			// code...
			break;
	}
}
header('location: index.php');
?>