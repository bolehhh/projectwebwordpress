<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Faskes</title>
</head>

<?php include "../koneksi.php";

if(isset($_GET['hapus_faskes'])){
  mysqli_query($link,"DELETE FROM faskes WHERE id_faskes = '$_GET[hapus_faskes]'");
}
  ?>

<body>
  <H3>FASKES</H3>
  <table border="1">
    <tr>
      <th>Nama</th>
      <th>Aksi</th>
    </tr>
    <?php foreach (query("SELECT * FROM faskes") as $faskes) : ?>
      <tr>
        <td><?= $faskes['nama_faskes'] ?></td>
        <td>
          <a href="editfaskes.php?id=<?= $faskes['id_faskes'] ?>">Edit</a>
          <a href="?hapus_faskes=<?= $faskes['id_faskes'] ?>" >Hapus</a>
        </td>
      </tr>
    <?php endforeach ?>
  </table>
  <a href="tambah_faskes.php">Tambah Data Faskes</a> <br>
  <a href="../peserta/peserta.php">kembali</a>
</body>

</html>