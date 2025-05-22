<!DOCTYPE html>
<html>
<head>
    <title>Latihan Nilai Mahasiswa</title>
</head>
<body>
    <h2>Form Nilai Mahasiswa</h2>
    <form method="post" action="">
        Nama: <input type="text" name="nama"><br><br>
        Nilai: <input type="number" name="nilai"><br><br>
        <input type="submit" value="Proses">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = $_POST['nama'];
        $nilai = $_POST['nilai'];
        $predikat = "";
        $status = "";

        if ($nilai >= 85) {
            $predikat = "A";
        } elseif ($nilai >= 75) {
            $predikat = "B";
        } elseif ($nilai >= 65) {
            $predikat = "C";
        } elseif ($nilai >= 50) {
            $predikat = "D";
        } else {
            $predikat = "E";
        }

        $status = ($nilai >= 65) ? "Lulus" : "Tidak Lulus";

        echo "<hr>";
        echo "Nama : " . htmlspecialchars($nama) . "<br>";
        echo "Nilai : " . $nilai . "<br>";
        echo "Predikat : " . $predikat . "<br>";
        echo "Status : " . $status . "<br>";
    }
    ?>
</body>
</html>
