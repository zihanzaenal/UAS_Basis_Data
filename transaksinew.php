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
<a href="add_transnew.php">Tambah Data</a> <br><br>
<center><h3>Riwayat Transaksi</h3></center>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Kode Transaksi</th>
                <th>Jenis Transaksi</th>
                <th>Action</th>
            </tr>
        </thead>
        <?php
        include 'koneksi.php';
        $sql = 'SELECT * FROM  transaction';
        $query = mysqli_query($koneksi, $sql);
        $no = 1;
        while ($row = mysqli_fetch_array($query))
        {
            ?>
        <tbody>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $row['trans_date']?></td>
                <td><?php echo $row['trans_code']?></td>
                <td><?php echo $row['id_transaction_types']?></td>
                <td>
                    <a href="edit_trans.php?id_transaction=<?= $row ['id_transaction'];?>">Edit</a>
                    <a href="delete.php?id_transaction=<?= $row ['id_transaction'];?>">Delete</a>
                </td>
            </tr>
        </tbody>
        <?php
        }
        ?>
    </table>
    <br> <br>
    <footer>
        <p>&copy; 2021 - Sistem Basis Data</p>
    </footer>
</body>
</html>