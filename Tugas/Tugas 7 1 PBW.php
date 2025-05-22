<!DOCTYPE html>
<html>
<head><title>Soal 1</title></head>
<body>
    <?php include 'Tugas 7 menu PBW.php'; ?>
    <h3>Soal 1: Menentukan Jenis Kendaraan</h3>
    <form method="post">
        Masukkan jumlah roda: <input type="number" name="roda" required>
        <input type="submit" value="Cek">
    </form>

    <?php
    if (isset($_POST['roda'])) {
        $jumlah_roda = $_POST['roda'];
        switch ($jumlah_roda) {
            case 2:
                echo "Kendaraan ini adalah Sepeda Motor.";
                break;
            case 3:
                echo "Kendaraan ini adalah Bajaj.";
                break;
            case 4:
                echo "Kendaraan ini adalah Mobil.";
                break;
            case 6:
                echo "Kendaraan ini adalah Truk Kecil.";
                break;
            default:
                echo "Jenis kendaraan tidak diketahui.";
        }
    }
    ?>
</body>
</html>
