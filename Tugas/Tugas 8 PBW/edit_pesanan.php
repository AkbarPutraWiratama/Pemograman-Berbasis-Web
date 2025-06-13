<?php
include 'koneksi_db.php';
include 'nav.php';

$pesanan_id = $_GET['id'] ?? 0;

// Ambil data pesanan dan detail buku yang dipesan
$query = "
  SELECT dp.ID, b.ID, b.Judul, dp.Kuantitas
  FROM Detail_Pesanan dp
  JOIN Buku b ON dp.Buku_ID = b.ID
  WHERE dp.Pesanan_ID = ?
";

$stmt = $conn->prepare($query);
if (!$stmt) {
  die("Prepare failed: " . $conn->error);
}
$stmt->bind_param("i", $pesanan_id);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($detail_id, $buku_id, $judul, $kuantitas);

$detail_pesanan = [];
while ($stmt->fetch()) {
  $detail_pesanan[] = [
    'Detail_ID' => $detail_id,
    'Buku_ID'   => $buku_id,
    'Judul'     => $judul,
    'Kuantitas' => $kuantitas
  ];
}
// Ambil daftar semua buku
$buku_result = $conn->query("SELECT ID, Judul FROM Buku");
$daftar_buku = $buku_result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Pesanan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
  <h2>Edit Pesanan #<?= $pesanan_id ?></h2>
  <form method="post" action="proses_edit_pesanan.php">
    <input type="hidden" name="pesanan_id" value="<?= $pesanan_id ?>">

    <?php foreach ($detail_pesanan as $index => $item): ?>
      <input type="hidden" name="detail_id[]" value="<?= $item['Detail_ID'] ?>">

      <div class="mb-3">
        <label class="form-label">Judul Buku</label>
        <select class="form-select" name="buku_id[]">
          <?php foreach ($daftar_buku as $buku): ?>
            <option value="<?= $buku['ID'] ?>" <?= $buku['ID'] == $item['Buku_ID'] ? 'selected' : '' ?>>
              <?= htmlspecialchars($buku['Judul']) ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="mb-3">
        <label class="form-label">Jumlah</label>
        <input type="number" name="kuantitas[]" class="form-control" value="<?= $item['Kuantitas'] ?>" required>
      </div>

      <hr>
    <?php endforeach; ?>

    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
  </form>
</div>
</body>
</html>
