<?php
// Koneksi ke database
$koneksi = new mysqli("localhost", "root", "", "toko_kelontong");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_pelanggan = $_POST['id_pelanggan'];
    $tanggal = $_POST['tanggal'];
    $total_harga = 0;

    // Simpan transaksi
    $query = "INSERT INTO transaksi (id_pelanggan, tanggal, total_harga) VALUES ($id_pelanggan, '$tanggal', $total_harga)";
    if ($koneksi->query($query)) {
        $id_transaksi = $koneksi->insert_id;

        // Simpan detail transaksi
        foreach ($_POST['produk'] as $id_produk => $jumlah) {
            if ($jumlah > 0) {
                $query_produk = "SELECT harga FROM produk WHERE id = $id_produk";
                $result = $koneksi->query($query_produk);
                $row = $result->fetch_assoc();
                $harga = $row['harga'];
                $subtotal = $harga * $jumlah;

                $query_detail = "INSERT INTO detail_transaksi (id_transaksi, id_produk, jumlah, subtotal) VALUES ($id_transaksi, $id_produk, $jumlah, $subtotal)";
                $koneksi->query($query_detail);

                $total_harga += $subtotal;

                // Kurangi stok
                $query_stok = "UPDATE produk SET stok = stok - $jumlah WHERE id = $id_produk";
                $koneksi->query($query_stok);
            }
        }

        // Update total harga transaksi
        $query_update = "UPDATE transaksi SET total_harga = $total_harga WHERE id = $id_transaksi";
        $koneksi->query($query_update);

        echo "Transaksi berhasil disimpan!";
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
    <title>Entri Transaksi Penjualan</title>
</head>
<body>
    <h1>Entri Transaksi Penjualan</h1>
    <form method="post">
        Pelanggan: 
        <select name="id_pelanggan" required>
            <?php
            $query = "SELECT * FROM pelanggan";
            $result = $koneksi->query($query);
            while ($row = $result->fetch_assoc()) {
                echo "<option value='{$row['id']}'>{$row['nama_pelanggan']}</option>";
            }
            ?>
        </select><br>
        Tanggal: <input type="date" name="tanggal" required><br>
        Produk:<br>
        <?php
        $query = "SELECT * FROM produk";
        $result = $koneksi->query($query);
        while ($row = $result->fetch_assoc()) {
            echo "<input type='number' name='produk[{$row['id']}]' min='0' value='0'> {$row['nama_produk']} (Stok: {$row['stok']})<br>";
        }
        ?>
        <input type="submit" value="Simpan Transaksi">
    </form>
</body>
</html>