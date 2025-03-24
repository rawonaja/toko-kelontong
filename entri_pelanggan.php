<?php
// Koneksi ke database
$koneksi = new mysqli("localhost", "root", "", "toko_kelontong");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];

    $query = "INSERT INTO pelanggan (nama_pelanggan, alamat, telepon) VALUES ('$nama_pelanggan', '$alamat', '$telepon')";
    if ($koneksi->query($query) {
        echo "Data pelanggan berhasil ditambahkan!";
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
    <title>Entri Data Pelanggan</title>
</head>
<body>
    <h1>Entri Data Pelanggan</h1>
    <form method="post">
        Nama Pelanggan: <input type="text" name="nama_pelanggan" required><br>
        Alamat: <input type="text" name="alamat" required><br>
        Telepon: <input type="text" name="telepon" required><br>
        <input type="submit" value="Simpan">
    </form>
</body>
</html>