<?php
include 'koneksi_db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $pesanan_id = $_POST['pesanan_id'];
  $detail_ids = $_POST['detail_id'];
  $buku_ids = $_POST['buku_id'];
  $kuantitas = $_POST['kuantitas'];

  // Loop per detail
  for ($i = 0; $i < count($detail_ids); $i++) {
    $detail_id = $detail_ids[$i];
    $buku_id = $buku_ids[$i];
    $jumlah = $kuantitas[$i];

    // Update Detail_Pesanan
    $stmt = $conn->prepare("UPDATE Detail_Pesanan SET Buku_ID = ?, Kuantitas = ? WHERE ID = ?");
    $stmt->bind_param("iii", $buku_id, $jumlah, $detail_id);
    $stmt->execute();
  }

  // Redirect
  echo "<script>
          alert('Pesanan berhasil diperbarui.');
          window.location.href = 'lihat_transaksi.php';
        </script>";
}
?>
