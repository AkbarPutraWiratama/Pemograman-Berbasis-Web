<!DOCTYPE html>
<html>
<head>
    <title>Diskon Pembayaran UKT</title>
</head>
<body>
    <h2>Form Pembayaran Mahasiswa</h2>
    <form method="post" action="">
        NPM: <input type="text" name="npm"><br><br>
        Nama: <input type="text" name="nama"><br><br>
        Prodi: <input type="text" name="prodi"><br><br>
        Semester: <input type="number" name="semester"><br><br>
        Biaya UKT: <input type="number" name="ukt"><br><br>
        <input type="submit" value="Hitung Diskon">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $npm = $_POST['npm'];
        $nama = $_POST['nama'];
        $prodi = $_POST['prodi'];
        $semester = $_POST['semester'];
        $ukt = $_POST['ukt'];
        $diskon = 0;

        if ($ukt >= 5000000) {
            $diskon = 10;
            if ($semester > 8) {
                $diskon = 15;
            }
        }

        $potongan = ($diskon / 100) * $ukt;
        $bayar = $ukt - $potongan;

        echo "<hr>";
        echo "NPM : $npm<br>";
        echo "Nama : $nama<br>";
        echo "Prodi : $prodi<br>";
        echo "Semester : $semester<br>";
        echo "Biaya UKT : Rp. " . number_format($ukt, 0, ',', '.') . "<br>";
        echo "Diskon : $diskon%<br>";
        echo "Yang Harus Dibayar : Rp. " . number_format($bayar, 0, ',', '.') . "<br>";
    }
    ?>
</body>
</html>
