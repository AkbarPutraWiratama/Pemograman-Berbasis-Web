<?php
include 'koneksi_db.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    $conn->begin_transaction();
    try {
        $conn->query("DELETE FROM Detail_Pesanan WHERE Pesanan_ID = $id");
        $conn->query("DELETE FROM Pesanan WHERE ID = $id");
        $conn->commit();
        echo "<script>alert('Pesanan berhasil dihapus'); window.location='lihat_transaksi.php';</script>";
    } catch (Exception $e) {
        $conn->rollback();
        echo "<script>alert('Gagal menghapus pesanan: " . addslashes($e->getMessage()) . "'); window.history.back();</script>";
    }
}
?>
