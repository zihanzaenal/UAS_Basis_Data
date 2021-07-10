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
    <a href="transaksinew.php">New Transaksi</a>
</nav>
<?php 
	include_once('koneksi.php');
	if (isset($_POST['submit'])) {

		$id = $_POST['id_transaction'];
		$id_transaction_types = $_POST['jenis_trx'];
		$trans_code = $_POST['trans_code'];
		$trans_date = $_POST['trans_date'];
		$keterangan = $_POST['keterangan'];
		// $insertsql = "INSERT INTO transaction (id_transaction, id_transaction_types, trans_code, trans_date, keterangan) VALUES (".$id.", '".$id_transaction_types."', '".$trans_code."', '".$trans_date."', '".$keterangan."')";

		$sql = "INSERT INTO transaction (id_transaction, id_transaction_types, trans_code, trans_date, keterangan)VALUES (".$id.", '".$id_transaction_types."', '".$trans_code."', '".$trans_date."', '".$keterangan."')";
		$result = mysqli_query($koneksi, $sql);
	
		header("location: add_transnew.php?id=".$id);
		//echo "Data Berhasil Ditambahkan .<a href='transaksi.php'>View Items</a>";
	}
	if (empty($_GET['id'])) {
		# code...
		$id1 = "";
		$id_transaction_types1 ="";
		$trans_code1 ="";
		$trans_date1 ="";
		$keterangan1 ="";

	} else {
		# code...
		$queryget = "SELECT * FROM transaction WHERE id_transaction=".$_GET['id'];
		$sql1 = mysqli_query($koneksi, $queryget);
		$rowget = mysqli_fetch_array($sql1);
		while ($rowget) {
			# code...
			$id1 = $rowget['id_transaction'];
			$id_transaction_types1 =$rowget['id_transaction_types'];
			$trans_code1 =$rowget['trans_code'];
			$trans_date1 =$rowget['trans_date'];
			$keterangan1 =$rowget['keterangan'];
		}
	}
	
	?>

    <a href="transaksi.php">Go to Home</a>
    <br><br>
	<center><h1>Tambah Data Transaksi</h1></center>
    <form action="add_transnew.php" method="post">
        <table width="25%" border="0">
			<!-- <tr> 
				<td>ID Transaction</td>
				<td><input type="text" name="id_transaction"></td>
			</tr> -->
			<tr> 
				<td>Jenis Transaksi</td>
				<td>
				<?php
				$sql1 = 'SELECT * FROM transaction ORDER BY id_transaction DESC LIMIT 1';
				$run = mysqli_query($koneksi, $sql1);

				if (mysqli_num_rows($run) > 0) {
					# code...
					while ($rw1 = mysqli_fetch_array($run)) {
						# code...
						$getid = $rw1['id_transaction']+1;
					}
				} else {
					# code...
					$getid = 1;
				}
				?>
				<input type="text" name="id_transaction" value="<?php 
				if(empty($_GET['id'])){
					if($getid < 0){ 
						echo 1; 
					}else{ 
						echo $getid; 
					}
				}else{
					echo $_GET['id'];
				} ?>">
					<select name="jenis_trx">
						<option>-Pilih Jenis Transaksi</option>
						<?php
						include 'koneksi.php';
        				$sql = 'SELECT * FROM  transaction_types';
        				$query = mysqli_query($koneksi, $sql);
        				while ($row = mysqli_fetch_array($query)) {
        				?>
        				<option value="<?php echo $row['id_transaction_types']?>"><?php echo $row['code']?> -  <?php echo $row['name']?></option>
        				<?php

        				}
        				
        				?>
					</select>
				</td>
			</tr>
			<tr> 
				<td>Kode Transaksi</td>
				<td><input type="text" name="trans_code" value="<?php echo $trans_code1;?>"></td>
			</tr>
			<tr> 
				<td>Tanggal Transaksi</td>
				<td><input type="text" name="trans_date" value="<?php if(empty($trans_date1)){ echo date('Y-m-d');}else{echo $trans_date1;}?>"></td>
			</tr>
			<tr> 
				<td>Keterangan</td>
				<td><input type="text" name="keterangan" value="<?php echo $keterangan1;?>"></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="submit" value="Tambah"></td>
			</tr>
        </table>
    </form>
</body>
</html>
