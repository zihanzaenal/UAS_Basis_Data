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

		$id = $_POST['id_transaction_types'];
		$code = $_POST['code'];
		$name= $_POST['name'];
		
		$sql = 'INSERT INTO transaction_types (id_transaction_types, code, name)';
		$sql .= "VALUE ('{$id}', '{$code}', '{$name}' )";
		$result = mysqli_query($koneksi, $sql);
	
		header('location: transaksi_tipe.php');
		echo "Data Berhasil Ditambahkan .<a href='transaksi.php'>View Items</a>";
	}
	?>

    <a href="transaksi_tipe.php">Go to Home</a>
    <br><br>
	<center><h1>Tambah Data Tipe</h1></center>
    <form action="add_tipe.php" method="post">
        <table width="25%" border="0">

			<tr> 
				<td>Code</td>
				<td><input type="text" name="code"></td>
			</tr>
			<tr> 
				<td>Name</td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr> 

			<tr> 
				<td></td>
				<td><input type="submit" name="submit" value="Add"></td>
			</tr>
        </table>
    </form>
</body>
</html>
