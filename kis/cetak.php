<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cetak Kartu</title>
</head>

<?php include "../koneksi.php";

$kis = query("SELECT * FROM kis 
INNER JOIN warga ON kis.nik_warga = warga.nik_warga
INNER JOIN faskes ON kis.id_faskes = faskes.id_faskes WHERE no_kis = $_GET[id]")[0];

?>

<body>

  <!-- <div class="card"> -->
    <header>
    <center>
      <h3>
        KARTU INDONESIA SEHAT
      </h3>
</center>
    </header>
    <table boreder="1">
      <div class="columnName">
        <p>Nomor Kartu : <?= $kis['no_kis'] ?></p>
        <p>Nama : <?= $kis['nama'] ?></p>
        <p>Alamat : <?= $kis['alamat'] ?></p>
        <p>Tanggal Lahir : <?= $kis['tgl_lahir'] ?></p>
        <p>NIK : <?= $kis['nik_warga'] ?></p>
        <p>Faskes Tingkat 1 : <?= $kis['nama_faskes'] ?></p>
      </div>
    </main>
  </div>

  <script>
    window.print();
  </script>
</body>
</html>