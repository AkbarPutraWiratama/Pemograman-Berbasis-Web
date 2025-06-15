<?php session_start();
       if (!isset($_SESSION['login_web'])) {
            header("Location: login.php?message=" . urlencode("Mengakses fitur harus login dulu bro."));
           exit;
       }
       ?>
<?php
include 'koneksi_db.php'; // Koneksi database


// Query untuk menampilkan data pesanan beserta nama pelanggan dan total harga
$query = "
   SELECT 
     Pesanan.ID AS Pesanan_ID, 
     Pelanggan.Nama AS Nama_Pelanggan, 
     Pelanggan.Email AS Email_Pelanggan, 
     Pelanggan.Telepon AS Telepon_Pelanggan, 
     Pelanggan.Alamat AS Alamat_Pelanggan, 
     Pesanan.Tanggal_Pesanan, 
     Pesanan.Total_Harga
   FROM Pesanan
   JOIN Pelanggan ON Pesanan.Pelanggan_ID = Pelanggan.ID
";
$result = $conn->query($query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
   <title>Daftar Pesanan</title>
</head>
<body>
   <?php include 'nav.php' ?>
   <div class="container mt-4">
       <h2>Daftar Pesanan</h2>


       <!-- Tabel Daftar Pesanan -->
       <table class="table table-striped">
          <thead>
            <tr>
                <th>ID Pesanan</th>
                <th>Nama Pelanggan</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Alamat</th>
                <th>Tanggal Pesanan</th>
                <th>Total Harga</th>
            </tr>
            </thead>
            <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['Pesanan_ID'] ?></td>
                <td><?= htmlspecialchars($row['Nama_Pelanggan']) ?></td>
                <td><?= htmlspecialchars($row['Email_Pelanggan']) ?></td>
                <td><?= htmlspecialchars($row['Telepon_Pelanggan']) ?></td>
                <td><?= htmlspecialchars($row['Alamat_Pelanggan']) ?></td>
                <td><?= $row['Tanggal_Pesanan'] ?></td>
                <td>Rp<?= number_format($row['Total_Harga'], 2) ?></td>
                <td>
                    <a href="edit_pesanan.php?id=<?= $row['Pesanan_ID'] ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="hapus_pesanan.php?id=<?= $row['Pesanan_ID'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus pesanan ini?')">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
            </tbody>
       </table>
   </div>


   <!-- Bootstrap JS -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
// Hapus session setelah halaman selesai ditampilkan
session_unset();
session_destroy();
?>