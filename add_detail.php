<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
    <title>Menambahkan Data</title>
</head>
<body>
<header>
        <h1>SIVENTRY</h1>
        <h2>Sistem Inventory</h2>
</header>
<div class="header">
    <div class="header-logo">Zihan Zaenal Abidin</div>
</div>
<nav>
    <a href="index.php">Items</a>
    <a href="transaksi_tipe.php">Transaction Type</a>
    <a href="transaksi.php">Transaction</a>
    <a href="transaksi_detail.php">Transaction Details</a>
</nav>
<?php 
	include_once('koneksi.php');
	if (isset($_POST['submit'])) {

		$id = $_POST['id_transaction_det'];
		$id_transaction = $_POST['id_transaction'];
		$id_item = $_POST['id_item'];
		$quantity = $_POST['quantity'];
		$keterangan = $_POST['keterangan'];
		
		$sql = 'INSERT INTO transaction_details (id_transaction_det, id_transaction, id_item, quantity, keterangan)';
		$sql .= "VALUE ('{$id}', '{$id_transaction}', '{$id_item}', '{$quantity}', '{$keterangan}')";
		$result = mysqli_query($koneksi, $sql);
	
        echo $sql;
        header('location: transaksi_detail.php');
		echo "Data Berhasil Ditambahkan .<a href='transaksi_detail.php'>View </a>";
	}
	?>

    <a href="transaksi_detail.php">Go to Home</a>
    <br><br>
	<center><h1>Tambah Data Detail</h1></center>
    <form action="add_detail.php" method="post">
        <table width="25%" border="0">
			<tr> 
				<td>ID transaction_details</td>
				<td><input type="text" name="id_transaction_det"></td>
			</tr>
			<tr> 
				<td>ID Transaction</td>
				<td><input type="text" name="id_transaction"></td>
			</tr>
			<tr> 
				<td>ID Item</td>
				<td><input type="text" name="id_item"></td>
			</tr>
			<tr> 
				<td>Quantity</td>
				<td><input type="text" name="quantity"></td>
			</tr>
			<tr> 
				<td>Keterangan</td>
				<td><input type="text" name="keterangan"></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="submit" value="Add"></td>
			</tr>
        </table>
    </form>
</body>
</html>
