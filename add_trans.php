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

		$id = $_POST['id_transaction'];
		$id_transaction_types = $_POST['id_transaction_types'];
		$trans_code = $_POST['trans_code'];
		$trans_date = $_POST['trans_date'];
		$keterangan = $_POST['keterangan'];
		
		$sql = 'INSERT INTO transaction (id_transaction, id_transaction_types, trans_code, trans_date, keterangan)';
		$sql .= "VALUE ('{$id}', '{$id_transaction_types}', '{$trans_code}', '{$trans_date}', '{$keterangan}')";
		$result = mysqli_query($koneksi, $sql);
	
		header('location: transaksi.php');
		echo "Data Berhasil Ditambahkan .<a href='transaksi.php'>View Items</a>";
	}
	?>

    <a href="transaksi.php">Go to Home</a>
    <br><br>
	<center><h1>Tambah Data Transaksi</h1></center>
    <form action="add_trans.php" method="post">
        <table width="25%" border="0">
			<tr> 
				<td>ID Transaction</td>
				<td><input type="text" name="id_transaction"></td>
			</tr>
			<tr> 
				<td>ID Type</td>
				<td><input type="text" name="id_transaction_types"></td>
			</tr>
			<tr> 
				<td>Transaction Code</td>
				<td><input type="text" name="trans_code"></td>
			</tr>
			<tr> 
				<td>Transaction Date</td>
				<td><input type="text" name="trans_date"></td>
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
