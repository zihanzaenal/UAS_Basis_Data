<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Inventory</title>
    <link rel="stylesheet" href="style.css">
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
<a href="add.php">Tambah Data</a> <br><br>
    <center><h3>Tabel Items</h3></center>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Code</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Keterangan</th>
                <th>Action</th>
            </tr>
        </thead>
        <?php
        include 'koneksi.php';
        $sql = 'SELECT * FROM  items';
        $query = mysqli_query($koneksi, $sql);
        while ($row = mysqli_fetch_array($query))
        {
            ?>
        <tbody>
            <tr>
                <td><?php echo $row['id_item']?></td>
                <td><?php echo $row['code']?></td>
                <td><?php echo $row['name']?></td>
                <td><?php echo $row['quantity']?></td>
                <td><?php echo $row['keterangan']?></td>
                <td>
                    <a href="edit.php?id_item=<?= $row ['id_item'];?>">Edit</a>
                    <a href="delete.php?id_item=<?= $row ['id_item'];?>">Delete</a>
                </td>
            </tr>
        </tbody>
        <?php
        }
        ?>
    </table>
    <a href="logout.php">Logout</a>
    <br> <br>
    <footer>
        <p>&copy; 2021 - Sistem Basis Data</p>
    </footer>
</body>
</html>