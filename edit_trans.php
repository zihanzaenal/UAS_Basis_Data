<?php
include_once 'koneksi.php';

if(isset($_POST['submit'])) {
    $id = $_POST['id_transaction'];
    $id_transaction_types = $_POST['id_transaction_types'];
	$trans_code = $_POST['trans_code'];
	$trans_date = $_POST['trans_date'];
	$keterangan = $_POST['keterangan'];

    $sql = 'UPDATE transaction SET ';
    $sql .= "id_transaction ='{$id}',id_transaction_types ='{$id_transaction_types}', trans_code='{$trans_code}',";
    $sql .= "trans_date ='{$trans_date}', keterangan = '{$keterangan}'";
    $sql .= "WHERE id_transaction = '{$id}'";
    $result = mysqli_query($koneksi, $sql);
    echo $sql;
    header('location: transaksi.php');
}
 
$id = $_GET['id_transaction'];
$sql = "SELECT * FROM transaction WHERE id_transaction = '{$id}'";
$result = mysqli_query($koneksi, $sql);

if (!$result) die('Error : Data tidak tersedia');
$data = mysqli_fetch_array($result);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Edit Data</title>
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
    <a href="">Items</a>
    <a href="">Transaction Type</a>
    <a href="">Transaction</a>
    <a href="">Transaction Details</a>
</nav>
<br><br>
    <a href="transaksi.php">Go to Home</a>
    <center><h1>Edit Data</h1></center>
    <form action="edit_trans.php" method="POST">
        <table border="0">
            <tr>
                <td>id_transaction</td>
                <td><input type="text" name="id_transaction" value=<?php echo $data['id_transaction'];?>></td>
            </tr>
        
            <tr>
                <td>id_transaction_types</td>
                <td><input type="text" name="id_transaction_types" value=<?php echo $data['id_transaction_types'];?>></td>
            </tr>
        
            <tr>
                <td>Trans Code</td>
                <td><input type="text" name="trans_code" value=<?php echo $data['trans_code'];?>></td>
            </tr>
        
            <tr>
                <td>trans_date</td>
                <td><input type="text" name="trans_date" value=<?php echo $data['trans_date'];?>></td>
            </tr>
        
            <tr>
                <td>Keterangan</td>
                <td><input type="text" name="keterangan" value=<?php echo $data['keterangan'];?>></td>
            </tr>
            <tr>
				<td><input type="hidden" name="id_transaction" value="<?php echo $data['id_transaction'];?>"></td>
				<td><input type="submit" name="submit" value="simpan"></td>
			</tr>
        </table>
    
    </form>
</body>
</html>
