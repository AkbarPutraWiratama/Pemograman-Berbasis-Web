<!DOCTYPE html>
<html>
<head><title>Soal 4</title></head>
<body>
    <?php include 'Tugas 7 menu PBW.php'; ?>
    <h3>Soal 4: Cek Angka Genap atau Ganjil</h3>
    <form method="post">
        Masukkan angka: <input type="number" name="angka" required>
        <input type="submit" value="Cek">
    </form>

    <?php
    if (isset($_POST['angka'])) {
        $angka = $_POST['angka'];
        $hasil = ($angka % 2 == 0) ? "Genap" : "Ganjil";
        echo "Angka $angka adalah $hasil";
    }
    ?>
</body>
</html>
