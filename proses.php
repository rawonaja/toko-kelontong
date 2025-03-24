<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "toko_kelontong";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Menambahkan produk
if (isset($_POST['add_product'])) {
    $nama = $conn->real_escape_string($_POST['nama']);
    $harga = $conn->real_escape_string($_POST['harga']);
    $stok = $conn->real_escape_string($_POST['stok']);
    
    $sql = "INSERT INTO produk (nama, harga, stok) VALUES ('$nama', '$harga', '$stok')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Produk berhasil ditambahkan');</script>";
    } else {
        echo "<script>alert('Gagal menambahkan produk: " . $conn->error . "');</script>";
    }
}

// Menambahkan pelanggan
if (isset($_POST['add_pelanggan'])) {
    $nama = $conn->real_escape_string($_POST['nama']);
    $alamat = $conn->real_escape_string($_POST['alamat']);
    $telepon = $conn->real_escape_string($_POST['telepon']);
    
    $sql = "INSERT INTO pelanggan (nama, alamat, telepon) VALUES ('$nama', '$alamat', '$telepon')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Pelanggan berhasil ditambahkan');</script>";
    } else {
        echo "<script>alert('Gagal menambahkan pelanggan: " . $conn->error . "');</script>";
    }
}

// Menampilkan produk
$produk_result = $conn->query("SELECT * FROM produk");

// Menampilkan pelanggan
$pelanggan_result = $conn->query("SELECT * FROM pelanggan");
?>