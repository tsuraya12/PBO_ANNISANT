<?php
require_once 'BarangManager.php'; // Memanggil class BarangManager

$barangManager = new BarangManager();
$barangList = $barangManager->getBarang(); // Mendapatkan semua barang dari data JSON
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk</title>
    <link rel="stylesheet" href="style.css"> <!-- Menautkan file CSS -->
</head>
<body>

        <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="customer.php">Customer</a></li>
                <li><a href="index.php">Stok</a></li>
            </ul>
        </nav>

    <!-- Konten Utama -->
    <div class="container">
        <h1>Daftar Barang</h1>

        <!-- Grid untuk menampilkan produk -->
        <div class="product-grid">
            <?php foreach ($barangList as $barang): ?>
                <div class="product-card">
                    <!-- Menampilkan gambar produk (gunakan gambar placeholder jika tidak ada gambar sebenarnya) -->
                    <img src="https://th.bing.com/th/id/OIP.yWAafqf3wQGi6yIVZwvsewHaE7?w=273&h=182&c=7&r=0&o=5&dpr=1.5&pid=1.7<?= htmlspecialchars($barang['nama']) ?>" alt="<?= htmlspecialchars($barang['nama']) ?>">
                    <div class="product-info">
                        <h3><?= htmlspecialchars($barang['nama']) ?></h3>
                        <p><?= htmlspecialchars($barang['harga']) ?></p>
                        <p>Stok: <?= htmlspecialchars($barang['stok']) ?></p>
                        <button>Beli Sekarang</button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <footer>
        <!-- Informasi Hak Cipta -->
        <p>&copy; 2024 Annisa Nur Tsuraya. XI PPLG-A.</p>
</footer>

</body>
</html>
