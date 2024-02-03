<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah KIS</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"> -->
</head>

<?php include "../koneksi.php";

if (isset($_POST['tambah_kis'])){
    if (query("SELECT * FROM kis") == []) {
        $noKIS = date("Y") . "0001";
      } else {
        $noKISTerakhir = (query("SELECT MAX(no_kis) as noKISTerakhir FROM kis")[0]['noKISTerakhir']);
      
        $digitTerakhir = str_split($noKISTerakhir, 4)[1];
        $digitTerakhir = (int) $digitTerakhir + 1;
        $formatAngka = str_pad($digitTerakhir, 4, "0", STR_PAD_LEFT);
      
        $noKIS = date("Y") . $formatAngka;
      }
  
    mysqli_query($link, "INSERT INTO warga VALUES (
      '$_POST[nik]', '$_POST[nama]', '$_POST[tgl_lahir]','$_POST[alamat]'
    )");
  
    mysqli_query($link, "INSERT INTO kis VALUES (
      '$noKIS', '$_POST[nik]', '$_POST[faskes]'
    )");
  
    header("Location: ../peserta/home.php");
    }
?>
<body>
    <div class="container">
        <div class="card">
        <div class="mt-4">
        <div class="card-header bg-success text-white">
            Tambah Anggota Kis
            </div>
        <div class = "card-body">
        <form method="post"action="">
            <div class="form-group">
                <label>Nik</label>
                <input type="text" name="nik" class="form-control" placeholder="Masukkan Nik">
            </div>
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama" required>
            </div>
            <div class="form-group">
                <label>Tanggal Lahir</label>
                <input type="date" name="tgl_lahir" class="form-control">
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control" placeholder="Masukkan alamat">
            </div>
            <div class="form-group mt-2">
                <label>Faskes</label>
                <select name="faskes">
                    <?php foreach (query("SELECT * FROM faskes") as $faskes) : ?>
                        <option value="<?= $faskes['id_faskes']?>"><?= $faskes['nama_faskes']?></option>
                    <?php endforeach ?>
                </select>
                <div align="">
                <button type="submit" class="btn btn-primary mt-1" name="tambah_kis">Tambah</button>
                <a href="../peserta/home.php" class="btn btn-danger mt-1">Kembali</a>
                    </div>
            </div>
                    </form>
</div>
</body>
</html>