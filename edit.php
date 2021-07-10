<?php
include_once 'koneksi.php';

if(isset($_POST['submit'])) {
    $id = $_POST['id_item'];
	$code = $_POST['code'];
	$name = $_POST['name'];
	$quantity = $_POST['quantity'];
	$keterangan = $_POST['keterangan'];

    $sql = 'UPDATE items SET ';
    $sql .= "id_item ='{$id}',code ='{$code}', name='{$name}',";
    $sql .= "quantity ='{$quantity}', keterangan = '{$keterangan}'";
    $sql .= "WHERE id_item = '{$id}'";
    $result = mysqli_query($koneksi, $sql);
    echo $sql;
    header('location: index.php');
}
 
$id = $_GET['id_item'];
$sql = "SELECT * FROM items WHERE id_item = '{$id}'";
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
    <a href="index.php">Go to Home</a>
    <center><h1>Edit Data</h1></center>
    <form action="edit.php" method="POST">
        <table border="0">
            <tr>
                <td>ID_Item</td>
                <td><input type="text" name="id_item" value=<?php echo $data['id_item'];?>></td>
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
                <td>Quantity</td>
                <td><input type="text" name="quantity" value=<?php echo $data['quantity'];?>></td>
            </tr>
        
            <tr>
                <td>Keterangan</td>
                <td><input type="text" name="keterangan" value=<?php echo $data['keterangan'];?>></td>
            </tr>
            <tr>
				<td><input type="hidden" name="id_item" value="<?php echo $data['id_item'];?>"></td>
				<td><input type="submit" name="submit" value="simpan"></td>
			</tr>
        </table>
    
    </form>
</body>
</html>
