<?php
// Koneksi ke database
$koneksi = new mysqli("localhost", "root", "", "toko_kelontong");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tanggal = $_POST['tanggal'];
    $query = "SELECT * FROM transaksi WHERE tanggal = '$tanggal'";
    $result = $koneksi->query($query);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekapitulasi Penjualan Harian</title>
</head>
<body>
    <h1>Rekapitulasi Penjualan Harian</h1>
    <form method="post">
        Tanggal: <input type="date" name="tanggal" required>
        <input type="submit" value="Cari">
    </form>

    <?php
    if (isset($result)) {
        echo "<h2>Hasil Rekapitulasi</h2>";
        echo "<table border='1'>
                <tr>
                    <th>ID Transaksi</th>
                    <th>Pelanggan</th>
                    <