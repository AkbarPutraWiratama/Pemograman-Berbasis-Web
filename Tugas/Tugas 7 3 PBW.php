<!DOCTYPE html>
<html>
<head><title>Soal 3</title></head>
<body>
    <?php include 'Tugas 7 menu PBW.php'; ?>
    <h3>Soal 3: Daftar Hewan</h3>
    <form method="post">
        Masukkan nama-nama hewan (pisahkan dengan koma):<br>
        <input type="text" name="hewan" required>
        <input type="submit" value="Tampilkan">
    </form>

    <?php
    if (isset($_POST['hewan'])) {
        $input = $_POST['hewan'];
        $hewan = explode(",", $input);
        echo "Daftar Hewan:<br>";
        foreach ($hewan as $nama_hewan) {
            echo trim($nama_hewan) . "<br>";
        }
    }
    ?>
</body>
</html>
