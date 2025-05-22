<?php
$hari = isset($_POST['hari']) ? $_POST['hari'] : '';

$result = '';
if ($hari != '') {
    switch (strtolower($hari)) {
        case "senin":
            $result = "Statistika";
            break;
        case "selasa":
            $result = "kosong";
            break;
        case "rabu":
            $result = "Kecerdasan Buatan, Sistem Operasi!";
            break;
        case "kamis":
            $result = "Rekayasa Perangkat Lunak, Intellegence Emmbedded System";
            break;
        case "jum'at":
        case "jumat":
            $result = "Pemograman Berbasis Web, Analisis Desain Algoritma";
            break;
        case "sabtu":
            $result = "Libur akhir pekan!";
            break;
        case "minggu":
            $result = "Libur akhir pekan!";
            break;
        default:
            break;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cek Hari</title>
</head>
<body>
    <form method="post">
        <label for="hari">Masukkan nama hari:</label>
        <input type="text" name="hari" id="hari" value="<?php echo htmlspecialchars($hari); ?>">
        <button type="submit">Cek</button>
    </form>
    <?php if ($hari != ''): ?>
        <p><?php echo $result; ?></p>
    <?php endif; ?>
</body>
</html>