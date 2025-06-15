<?php
include 'koneksi_db.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
  $id = $_GET['id'];

  // Cek apakah buku sedang dipakai di detail_pesanan
  $stmt_check = $conn->prepare("SELECT COUNT(*) FROM detail_pesanan WHERE Buku_ID = ?");
  $stmt_check->bind_param("i", $id);
  $stmt_check->execute();
  $stmt_check->bind_result($count);
  $stmt_check->fetch();
  $stmt_check->close();

  if ($count > 0) {
    echo "<script>
            alert('Buku tidak bisa dihapus karena sedang dipakai dalam pesanan.');
            window.location.href = 'hapus.php';
          </script>";
    exit;
  }

  // Hapus buku
  $stmt = $conn->prepare("DELETE FROM buku WHERE ID = ?");
  $stmt->bind_param("i", $id);

  if ($stmt->execute()) {
    echo "<script>
            alert('Buku berhasil dihapus.');
            window.location.href = 'hapus.php';
          </script>";
  } else {
    echo "<script>
            alert('Gagal menghapus buku.');
            window.location.href = 'hapus.php';
          </script>";
  }

  $stmt->close();
} else {
  echo "<script>
          alert('ID tidak valid.');
          window.location.href = 'hapus.php';
        </script>";
}

$conn->close();
?>
