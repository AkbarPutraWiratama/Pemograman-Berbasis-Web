<!DOCTYPE html>
<html>
<head><title>Soal 2</title></head>
<body>
    <?php include 'Tugas 7 menu PBW.php'; ?>
    <h3>Soal 2: Cetak Bilangan Genap</h3>
    <form method="post">
        Batas atas: <input type="number" name="batas" required>
        <input type="submit" value="Cetak">
    </form>

    <?php
    if (isset($_POST['batas'])) {
        $batas = $_POST['batas'];
        echo "Bilangan genap dari 2 sampai $batas:<br>";
        for ($i = 2; $i <= $batas; $i += 2) {
            echo $i . "<br>";
        }
    }
    ?>
</body>
</html>
