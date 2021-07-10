<?php
include_once 'koneksi.php';

if(isset($_POST['submit'])) {
    $id = $_POST['id_transaction_types'];
	$code = $_POST['code'];
	$name = $_POST['name'];

    $sql = 'UPDATE transaction_types SET ';
    $sql .= "code ='{$code}', name='{$name}'";
    $sql .= "WHERE id_transaction_types = '{$id}'";
    $result = mysqli_query($koneksi, $sql);
    //echo $sql; kalo direct ke variable sql dia pasti gagal get id_transaction_types
    header('location: transaksi_tipe.php');
}
 
$id = $_GET['id_transaction_types'];
$sql = "SELECT * FROM transaction_types WHERE id_transaction_types = '{$id}'";
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
    <a href="transaksi_tipe.php">Go to Home</a>
    <center><h1>Edit Data</h1></center>
    <form action="edit_tipe.php" method="POST">
        <table border="0">
            <tr>
                <td>ID transaction type</td>
                <td><input type="text" name="id_transaction_types" value=<?php echo $data['id_transaction_types'];?>></td>
            </tr>
        
            <tr>
                <td>Code</td>
                <td><input type="text" name="code" value=<?php echo $data['code'];?>></td>
            </tr>
        
            <tr>
                <td>Name</td>
                <td><input type="text" name="name" value=<?php echo $data['name'];?>></td>
            </tr>
            <tr>
				<td><input type="hidden" name="id_transaction_types1" value="<?php echo $data['id_transaction_types'];?>"></td>
				<td><input type="submit" name="submit" value="simpan"></td>
			</tr>
        </table>
    
    </form>
</body>
</html>
