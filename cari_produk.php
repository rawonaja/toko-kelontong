<?php
// Koneksi ke database
$koneksi = new mysqli("localhost", "root", "", "toko_kelontong");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $keyword = $_POST['keyword'];
    $query = "SELECT * FROM produk WHERE nama_produk LIKE '%$keyword%'";
    $result = $koneksi->query($query);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cari Informasi Produk</title>
</head>
<body>
    <h1>Cari Informasi Produk</h1>
    <form method="post">
        Cari Produk: <input type="text" name="keyword" required>
        <input type="submit" value="Cari">
    </form>

    <?php
    if (isset($result)) {
        echo "<h2>Hasil Pencarian</h2>";
        echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Stok</th>
                </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['nama_produk']}</td>
                    <td>{$row['harga']}</td>
                    <td>{$row['stok']}</td>
                  </tr>";
        }
        echo "</table>";
    }
    ?>
</body>
</html>