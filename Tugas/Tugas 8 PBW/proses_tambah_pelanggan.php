<?php
include 'koneksi_db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $stmt = $conn->prepare("INSERT INTO Pelanggan (Nama) VALUES (?)");
    $stmt->bind_param("s", $nama);

    if ($stmt->execute()) {
        echo "<script>alert('Pelanggan berhasil ditambahkan'); window.location='transaksi.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan pelanggan'); window.history.back();</script>";
    }
}
?>