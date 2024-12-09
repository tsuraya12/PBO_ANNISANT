<?php
// Memulai sesi
session_start();

// Inisialisasi data pelanggan jika belum ada
if (!isset($_SESSION['customers'])) {
    $_SESSION['customers'] = [];
}

// Menambahkan data pelanggan
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_customer'])) {
    $name = htmlspecialchars($_POST['name']);
    $contact = htmlspecialchars($_POST['contact']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $produk = htmlspecialchars($_POST['produk']);
    $jumlah = htmlspecialchars($_POST['jumlah']);

    // Validasi sederhana
    if (!empty($name) && !empty($contact) && !empty($alamat)&& !empty($produk)&& !empty($jumlah)) {
        $_SESSION['customers'][] = [
            'name' => $name,
            'contact' => $contact,
            'alamat' => $alamat,
            'produk' => $produk,
            'jumlah' => $jumlah,
        ];
    } else {
        $error = "Semua bidang harus diisi!";
    }
}

// Menghapus semua data pelanggan
if (isset($_POST['clear_customers'])) {
    $_SESSION['customers'] = [];
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Costumer</title>
   <style>/* Costumer */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f9;
    margin: 0;
    padding: 20px;
}
h1 {
    text-align: center;
}
form {
    background-color: #fff;
    padding: 15px;
    border-radius: 8px;
    max-width: 400px;
    margin: 0 auto;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}
label {
    font-weight: bold;
}
input[type="text"],
input[type="email"],
button {
    width: 100%;
    padding: 10px;
    margin: 5px 0;
    box-sizing: border-box;
}
input[type="text"]:focus,
input[type="email"]:focus {
    outline: none;
    border-color: #66afe9;
}
button {
    background-color: #007BFF;
    color: white;
    font-weight: bold;
    cursor: pointer;
    border: none;
    border-radius: 5px;
}
button:hover {
    background-color: #0056b3;
}
button[type="submit"][name="clear_customers"] {
    background-color: #e74c3c;
}
button[type="submit"][name="clear_customers"]:hover {
    background-color: #c0392b;
}
.error {
    color: #e74c3c;
    font-weight: bold;
}
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}
table, th, td {
    border: 1px solid #ccc;
}
th, td {
    padding: 12px;
    text-align: left;
}
th {
    background-color: #f2f2f2;
}
tr:hover {
    background-color: #f9f9f9;
}
tr:nth-child(even) {
    background-color: #f9f9f9;
}
 /* Navbar */
 nav {
    background-color:  #000000;
    padding: 10px 0;
}

nav ul {
    display: flex;
    justify-content: center;
    list-style: none;
}

nav ul li {
    margin: 0 20px;
}

nav ul li a {
    color: white;
    text-decoration: none;
    font-size: 18px;
    padding: 10px 15px;
}

nav ul li a:hover {
    background-color: #000000;
    border-radius: 5px;
}
/* Footer */
footer {
    background-color:  #000000;
    color: white;
    padding: 20px 0;
    text-align: center;
}

</style>
</head>
<body>


<nav>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="customer.php">Customer</a></li>
                <li><a href="index.php">Stok</a></li>
            </ul>
        </nav>
    <h1>Manajemen Costumer</h1>

    <form method="post">
        <label for="name">Nama:</label>
        <input type="text" id="name" name="name" placeholder="Masukkan nama" required>

        <label for="contact">Kontak:</label>
        <input type="text" id="contact" name="contact" placeholder="Masukkan kontak" required>

        <label for="alamat">Alamat:</label>
        <input type="text" id="alamat" name="alamat" placeholder="Masukkan alamat" required>

        <label for="produk">Produk:</label>
        <input type="text" id="produk" name="produk" placeholder="Masukkan produk" required>

        <label for="jumlah">Jumlah:</label>
        <input type="number" id="jumlah" name="jumlah" placeholder="Masukkan jumlah" required>

        <button type="submit" name="add_customer">Tambahkan Pelanggan</button>
        <button type="submit" name="clear_customers">Hapus Semua</button>
    </form>

    <?php if (isset($error)): ?>
        <p class="error"><?= $error; ?></p>
    <?php endif; ?>

    <h2>Daftar Pelanggan</h2>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Kontak</th>
                <th>Alamat</th>
                <th>Produk</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($_SESSION['customers'])): ?>
                <?php foreach ($_SESSION['customers'] as $customer): ?>
                    <tr>
                        <td><?= htmlspecialchars($customer['name']); ?></td>
                        <td><?= htmlspecialchars($customer['contact']); ?></td>
                        <td><?= htmlspecialchars($customer['alamat']); ?></td>
                        <td><?= htmlspecialchars($customer['produk']); ?></td>
                        <td><?= htmlspecialchars($customer['jumlah']); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3" style="text-align:center;">Belum ada pelanggan yang ditambahkan.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <footer>
        <!-- Informasi Hak Cipta -->
        <p>&copy; 2024 Annisa Nur Tsuraya. XI PPLG-A.</p>
</footer>
</body>
</html>