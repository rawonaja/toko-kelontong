<?php
// Koneksi ke database
$koneksi = new mysqli("localhost", "root", "", "toko_kelontong");

$query = "SELECT * FROM produk";
$result = $koneksi->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Stok Barang</title>
</head>
<body>
    <h1>Laporan Stok Barang</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Stok</th>
        </tr>
        <?php
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['nama_produk']}</td>
                    <td>{$row['harga']}</td>
                    <td>{$row['stok']}</td>
                  </tr>";
        }
        ?>
    </table>
</body>
</html>