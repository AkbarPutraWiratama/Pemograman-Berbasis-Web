<?php
// Konstanta pajak
define("PAJAK", 0.10);

// Array harga barang (misalnya: apel, jeruk, mangga)
$hargaBarang = [
    "keyboard" => 150000,
];

// Jumlah barang yang dibeli (misalnya: 2 apel, 1 jeruk, 3 mangga)
$jumlahBeli = [
    "keyboard" => 2,
];

// Hitung total harga sebelum pajak
$total = 0;
foreach ($hargaBarang as $nama => $harga) {
    $jumlah = $jumlahBeli[$nama];
    $subtotal = $harga * $jumlah;
    $total += $subtotal;
}

// Hitung total setelah pajak
$totalAkhir = $total + ($total * PAJAK);

echo '<div style="
    width: 510px;
    border: 1px solid black;
    padding: 15px;
    margin-top: 10px;
    font-family: Arial, sans-serif
"> ';
echo "<h2>Perhitungan Total Pembelian (Dengan Array)</h2>";
foreach ($hargaBarang as $nama => $harga) {
    echo "Nama Barang:" . ucfirst(string: $nama) . "<br>";
    echo "Harga Satuan:" . ucfirst(string: $harga) . "<br>";
    echo "Jumlah Beli:" . ucfirst(string: $jumlah) . "<br>" ;
}
echo "Total harga (sebelum pajak): Rp " . number_format($total, 0, ',', '.') . "<br>";
echo "Pajak (10%): Rp " . number_format( $total * PAJAK, 0, ',', '.') . "<br>";
echo "<strong>Total harga setelah pajak (10%):</strong> Rp " . number_format($totalAkhir, 0, ',', '.');
?>