<?php session_start();
       if (!isset($_SESSION['login_web'])) {
            header("Location: login.php?message=" . urlencode("Mengakses fitur harus login dulu bro."));
           exit;
       }
       ?>
<?php
include 'koneksi_db.php';
include 'nav.php';

// Ambil data buku
$result = $conn->query("SELECT * FROM buku");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Hapus Buku</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
  <h2>Daftar Buku</h2>

  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Judul</th>
        <th>Penulis</th>
        <th>Tahun Terbit</th>
        <th>Harga</th>
        <th>Stok</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?= $row['ID'] ?></td>
        <td><?= htmlspecialchars($row['Judul']) ?></td>
        <td><?= htmlspecialchars($row['Penulis']) ?></td>
        <td><?= $row['Tahun_Terbit'] ?></td>
        <td>Rp<?= number_format($row['Harga'], 2) ?></td>
        <td><?= $row['Stok'] ?></td>
        <td>
          <a href="proses_hapus_buku.php?id=<?= $row['ID'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus buku ini?')">Hapus</a>
        </td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>
</body>
</html>
<?php
// Hapus session setelah halaman selesai ditampilkan
session_unset();
session_destroy();
?>