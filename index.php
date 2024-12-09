<?php
require_once 'Barang.php';
require_once 'BarangManager.php';

$barangManager = new BarangManager();

//menangani from tambah barang
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tambah'])){
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $barangManager->tambahBarang($nama, $harga, $stok);
    header('Location: index.php'); //Redirect setelah menghapus
}

//Menangani pengahapusan barang
if (isset($_GET['hapus'])){
    $id = $_GET['hapus'];
    $barangManager->hapusBarang($id);
    header('Location:index.php'); // Redirect setelah menghapus
}
?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"> <!-- Menautkan file style.css -->
    <title>Pencatatan Barang</title>
    </head>
    <body>

        <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="customer.php">Customer</a></li>
                <li><a href="index.php">Stok</a></li>
            </ul>
        </nav>
        <div class="container">
            <h1>Pencatatan Barang</h1>
           <center> <form method="POST" action=>

    <div>
    <label for="nama">Nama Barang</label><br>
    <input type="text" id="nama" name="nama" required>
    </div>
    <div>
    <label for "harga">Harga Barang:</label>
    <input type="number" id="harga" name="harga" required>
    </div>
     <div>
    <label for="stok">Stok Barang:</label><br>
    <input type="number" id="stok" name="stok" required>
    </div>
    <button type="submit" name="tambah" class="btn btn-add">Tambah Barang</button>
    </from> 

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
<?php foreach ($barangManager->getBarang() as $barang): ?>

    <tr>
        <td><?= $barang['id'] ?></td>
        <td><?= $barang ['nama' ]?></td>
        <td><?= $barang ['harga'] ?></td>
        <td><?= $barang['stok'] ?></td>
        <td>
        <a href="?hapus=<?= $barang ['id'] ?>" class="btn btn-delete">Hapus</a>
        </td>
</tr>

<?php endforeach; ?>
</tbody>
</table>
</div>
<footer>
        <!-- Informasi Hak Cipta -->
        <p>&copy; 2024 Annisa Nur Tsuraya. XI PPLG-A.</p>
</footer>
</body>
</html>
