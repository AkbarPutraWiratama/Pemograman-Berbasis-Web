<?php
include 'koneksi_db.php';
include 'nav.php';

// Ambil ID pesanan dari URL
$pesanan_id = $_GET['id'] ?? 0;

// Ambil data pesanan utama
$stmt = $conn->prepare("SELECT Pelanggan_ID FROM Pesanan WHERE ID = ?");
$stmt->bind_param("i", $pesanan_id);
$stmt->execute();
$result = $stmt->get_result();
$pesanan = $result->fetch_assoc();
$stmt->close();

// Ambil detail pesanan (diasumsikan satu buku per pesanan)
$stmt = $conn->prepare("SELECT Buku_ID, Kuantitas FROM Detail_Pesanan WHERE Pesanan_ID = ?");
$stmt->bind_param("i", $pesanan_id);
$stmt->execute();
$detail_result = $stmt->get_result();
$detail = $detail_result->fetch_assoc();
$stmt->close();

// Ambil daftar pelanggan dan buku
$pelanggan_result = $conn->query("SELECT ID, Nama FROM Pelanggan");
$buku_result = $conn->query("SELECT ID, Judul FROM Buku");
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
    <h2>Edit Pesanan</h2>
    <form method="post" action="proses_edit_pesanan.php">
        <input type="hidden" name="pesanan_id" value="<?= $pesanan_id ?>">

        <div class="mb-3">
            <label for="pelanggan_id" class="form-label">Pelanggan</label>
            <select class="form-select" name="pelanggan_id" required>
                <?php while ($row = $pelanggan_result->fetch_assoc()): ?>
                    <option value="<?= $row['ID'] ?>" <?= $row['ID'] == $pesanan['Pelanggan_ID'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($row['Nama']) ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="buku_id" class="form-label">Buku</label>
            <select class="form-select" name="buku_id" required>
                <?php while ($row = $buku_result->fetch_assoc()): ?>
                    <option value="<?= $row['ID'] ?>" <?= $row['ID'] == $detail['Buku_ID'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($row['Judul']) ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="kuantitas" class="form-label">Jumlah</label>
            <input type="number" class="form-control" name="kuantitas" value="<?= $detail['Kuantitas'] ?>" required>
        </div>

        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
    </form>
</div>
</body>
</html>
