<?php
include 'koneksi_db.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
  $pesanan_id = $_GET['id'];

  // Hapus detail pesanan (sebenernya kalau pakai ON DELETE CASCADE cukup hapus pesanan saja)
  $stmt = $conn->prepare("DELETE FROM pesanan WHERE ID = ?");
  $stmt->bind_param("i", $pesanan_id);

  if ($stmt->execute()) {
    echo "<script>
            alert('Pesanan berhasil dihapus.');
            window.location.href = 'lihat_transaksi.php';
          </script>";
  } else {
    echo "<script>
            alert('Gagal menghapus pesanan: " . addslashes($stmt->error) . "');
            window.location.href = 'lihat_transaksi.php';
          </script>";
  }

  $stmt->close();
} else {
  echo "<script>
          alert('ID tidak valid.');
          window.location.href = 'lihat_transaksi.php';
        </script>";
}

$conn->close();
?>
