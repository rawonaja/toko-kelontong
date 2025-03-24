<?php
// Koneksi ke database
$koneksi = new mysqli("localhost", "root", "", "toko_kelontong");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_produk = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    $query = "INSERT INTO produk (nama_produk, harga, stok) VALUES ('$nama_produk', $harga, $stok)";
    if ($koneksi->query($query) === TRUE) {
        echo "Data produk berhasil ditambahkan!";
    } else {
        echo "Error: " . $query . "<br>" . $koneksi->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entri Data Produk</title>
</head>
<body>
    <h1>Entri Data Produk</h1>
    <form method="post">
        Nama Produk: <input type="text" name="nama_produk" required><br>
        Harga: <input type="number" name="harga" required><br>
        Stok: <input type="number" name="stok" required><br>
        <input type="submit" value="Simpan">
    </form>
</body>
</html>