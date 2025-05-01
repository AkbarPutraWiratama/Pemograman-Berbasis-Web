<?php
define("PAJAK", 0.10);

$hargaBarang = [
    "keyboard" => 150000,
    "mouse" => 75000,
    "mouse pad" => 25000,
];

if (!isset($_POST['submit'])) {
    echo '<form method="POST">';
    echo '<div style="
        width: 510px;
        border: 1px solid black;
        padding: 15px;
        margin-top: 10px;
        font-family: Arial, sans-serif
    ">
        <h2>Input Jumlah Pembelian Barang</h2>';
    
    foreach ($hargaBarang as $nama => $harga) {
        echo ucfirst($nama) . ' (Rp ' . number_format($harga, 0, ',', '.') . '): 
            <input type="number" name="jumlah[' . $nama . ']" min="0" value="0"><br><br>';
    }

    echo '<input type="submit" name="submit" value="Hitung Total">';
    echo '</form>';
} else {
    $jumlahBeli = $_POST['jumlah'];

    $total = 0;
    foreach ($hargaBarang as $nama => $harga) {
        $jumlah = isset($jumlahBeli[$nama]) ? (int)$jumlahBeli[$nama] : 0;
        $subtotal = $harga * $jumlah;
        $total += $subtotal;
    }

    $totalAkhir = $total + ($total * PAJAK);

    echo '<div style="
        width: 510px;
        border: 1px solid black;
        padding: 15px;
        margin-top: 10px;
        font-family: Arial, sans-serif
    ">';

    echo "<h2>Perhitungan Total Pembelian</h2>";

    foreach ($hargaBarang as $nama => $harga) {
        $jumlah = isset($jumlahBeli[$nama]) ? (int)$jumlahBeli[$nama] : 0;
        if ($jumlah > 0) {
            echo "Nama Barang: " . ucfirst($nama) . "<br>";
            echo "Harga Satuan: Rp " . number_format($harga, 0, ',', '.') . "<br>";
            echo "Jumlah Beli: $jumlah<br><br>";
        }
    }

    echo "Total harga (sebelum pajak): Rp " . number_format($total, 0, ',', '.') . "<br>";
    echo "Pajak (10%): Rp " . number_format($total * PAJAK, 0, ',', '.') . "<br>";
    echo "<strong>Total harga setelah pajak (10%):</strong> Rp " . number_format($totalAkhir, 0, ',', '.');
    echo "</div>";
}
?>
