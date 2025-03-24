<?php
// Koneksi ke database
$koneksi = new mysqli("localhost", "root", "", "toko_kelontong");

$query = "SELECT * FROM pelanggan";
$result = $koneksi->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Data Pelanggan</title>
</head>
<body>
    <h1>Laporan Data Pelanggan</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama Pelanggan</th>
            <th>Alamat</th>
            <th>Telepon</th>
        </tr>
        <?php
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['nama_pelanggan']}</td>
                    <td>{$row['alamat']}</td>
                    <td>{$row['telepon']}</td>
                  </tr>";
        }
        ?>
    </table>
</body>
</html>