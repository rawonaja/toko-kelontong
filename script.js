function tambahProduk() {
  const nama = document.getElementById("nama-produk").value;
  const harga = document.getElementById("harga-produk").value;
  const stok = document.getElementById("stok-produk").value;

  if (nama && harga && stok) {
    const table = document.querySelector("#laporan-produk tbody");
    const row = table.insertRow();
    row.innerHTML = `
            <td>New</td>
            <td>${nama}</td>
            <td>${harga}</td>
            <td>${stok}</td>
        `;
    document.getElementById("form-tambah-produk").reset();
  } else {
    alert("Semua field harus diisi!");
  }
}

function tambahPelanggan() {
  const nama = document.getElementById("nama-pelanggan").value;
  const alamat = document.getElementById("alamat-pelanggan").value;
  const telepon = document.getElementById("telepon-pelanggan").value;

  if (nama && alamat && telepon) {
    const table = document.querySelector("#laporan-pelanggan tbody");
    const row = table.insertRow();
    row.innerHTML = `
            <td>New</td>
            <td>${nama}</td>
            <td>${alamat}</td>
            <td>${telepon}</td>
        `;
    document.getElementById("form-tambah-pelanggan").reset();
  } else {
    alert("Semua field harus diisi!");
  }
}
