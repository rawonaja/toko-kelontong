<?php
// Koneksi ke database
$koneksi = new mysqli("localhost", "root", "", "toko_kelontong");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id_transaksi = $_GET['id'];

    $query_transaksi = "SELECT t.*, p.nama_pelanggan FROM transaksi t JOIN pelanggan p ON t.id_pelanggan = p.id WHERE t.id = $id_transaksi";
    $result_transaksi = $koneksi->query($query_transaksi);
    $transaksi = $result_transaksi->fetch_assoc();

    $query_detail = "SELECT dt.*, pr.nama_produk FROM detail_transaksi dt JOIN produk pr ON dt.id_produk = pr.id WHERE dt.id_transaksi = $id_transaksi";
    $result_detail = $koneksi->query($query_detail);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Faktur Jual</title>
</head>
<body>
    <h1>Laporan Faktur Jual</h1>
    <?php
    if (isset($transaksi)) {
        echo "<p>ID Transaksi: {$transaksi['id']}</p>";
        echo "<p>Pelanggan: {$transaksi['nama_pelanggan']}</p>";
        echo "<p>Tanggal: {$transaksi['tanggal']}</p>";
        echo "<p>Total Harga: {$transaksi['total_harga']}</p>";

        echo "<h2>Detail Transaksi</h2>";
        echo "<table border='1'>
                <tr>
                    <th>Nama Produk</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                </tr>";
        while ($row = $result_detail->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['nama_produk']}</td>
                    <td>{$row['jumlah']}</td>
                    <td>{$row['subtotal']}</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>Transaksi tidak ditemukan.</p>";
    }
    ?>
</body>
</html>