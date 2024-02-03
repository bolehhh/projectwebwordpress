<!DOCTYPE html>
<html lang="en">
<?php
include "../koneksi.php";

$data = query("SELECT * FROM kis
INNER JOIN warga ON kis.nik_warga = warga.nik_warga
INNER JOIN faskes ON kis.id_faskes = faskes.id_faskes
WHERE no_kis = $_GET[no]")[0];

if(isset($_POST['nik'])) {
    mysqli_query($link, "UPDATE warga SET
    nama = '$_POST[nama]',
    tgl_lahir = '$_POST[tgl_lahir]',
    alamat = '$_POST[alamat]'
    WHERE nik_warga = '$_POST[nik]'");

    mysqli_query($link, "UPDATE kis SET
    id_faskes = '$_POST[faskes]'
    WHERE no_kis = '$_POST[no_kis]'");

    header("Location: ../peserta/home.php");
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"> -->
</head>
<body>
    <a href="../peserta/home.php">back</a>
    <div class = "card-body">
        <form action="" method="post">
        <div class="form-group">
            <label>No KIS</label>
            <?= $data['no_kis'] ?> <input type="hidden" name="no_kis" value="<?= $data['no_kis'] ?>">
        </div>
        <div class="form-group">
            <label>Nik</label>
            <?= $data['nik_warga'] ?> <input type="hidden" name="nik" value="<?= $data['nik_warga'] ?>">
        </div>
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" value="<?= $data['nama'] ?>">
        </div>
        <div class="form-group">
            <label>Tanggal Lahir</label>
            <input type="date" name="tgl_lahir" value="<?= $data['tgl_lahir'] ?>">
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamat" value="<?= $data['alamat'] ?>">
        </div>
        <div class="form-group">
            <label>Faskes</label>
            <select name="faskes">
          <option selected>Pilih...</option>
          <?php foreach (query("SELECT * FROM faskes") as $faskes) : ?>
            <!-- Ini untuk mengecek kalo idFaskes dari db sama dengan idFaskes yg di ambil dari sql query yg diatas -->
            <option <?= ($faskes['id_faskes'] == $data['id_faskes']) ? 'selected' : '' ?>
            value="<?= $faskes['id_faskes'] ?>">
              <!-- Ini  -->
              <?= $faskes['nama_faskes'] ?>
            </option>
          <?php endforeach ?>
        </select>
        </div>
        <a href="../faskes/tambah_faskes.php">tambah faskes</a>
            <button type="submit">Edit</button>
        </form>
    </div>
</body>
</html>