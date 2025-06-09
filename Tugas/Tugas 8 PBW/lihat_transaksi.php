<?php
include 'koneksi_db.php';

// Ambil semua data pesanan dengan detail bukunya
$query = "
    SELECT 
        p.ID AS Pesanan_ID,
        pel.Nama AS Nama_Pelanggan,
        p.Tanggal_Pesanan,
        p.Total_Harga,
        b.Judul,
        dp.Kuantitas
    FROM Pesanan p
    JOIN Pelanggan pel ON p.Pelanggan_ID = pel.ID
    JOIN Detail_Pesanan dp ON p.ID = dp.Pesanan_ID
    JOIN Buku b ON dp.Buku_ID = b.ID
    ORDER BY p.ID DESC
";

$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Pesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include 'nav.php'; ?>

<div class="container mt-4">
    <h2>Daftar Pesanan</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID Pesanan</th>
                <th>Nama Pelanggan</th>
                <th>Tanggal</th>
                <th>Judul Buku</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['Pesanan_ID'] ?></td>
                <td><?= htmlspecialchars($row['Nama_Pelanggan']) ?></td>
                <td><?= $row['Tanggal_Pesanan'] ?></td>
                <td><?= htmlspecialchars($row['Judul']) ?></td>
                <td><?= $row['Kuantitas'] ?></td>
                <td>Rp<?= number_format($row['Total_Harga'], 0) ?></td>
                <td>
                    <a href="edit_pesanan.php?id=<?= $row['Pesanan_ID'] ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="hapus_pesanan.php?id=<?= $row['Pesanan_ID'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus pesanan ini?')">Hapus</a>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>

</body>
</html>
