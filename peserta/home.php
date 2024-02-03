<?php
  include '../koneksi.php';

  $innerjoin = query("SELECT * FROM kis 
  INNER JOIN warga on kis.nik_warga = warga.nik_warga
  INNER JOIN faskes on kis.id_faskes = faskes.id_faskes
  ");

  if(isset($_GET['hapus_kis'])){
    mysqli_query($link,"DELETE FROM kis WHERE no_kis = '$_GET[hapus_kis]'");
    mysqli_query($link,"DELETE FROM warga WHERE nik_warga = '$_GET[nik_warga]'");

    echo "
    <script>
    alert('Data Berhasil di Hapus');
    document.location.href = 'home.php';
    </script>
    ";

  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"> -->
</head>

<body>
<div class="container"> 
  <div class="card">
      <div class="mt-4">
        <div class="card-header bg-primary text-white">
        Daftar Anggota KIS
      </div>
      <div class="card-body">
        <table border="1" class="table table-bordered table-striped">
        <a href="../kis/tambah_kis.php" class = "btn btn-sm btn-primary mb-1">Tambah Anggota KIS</a> <br>
        <a href="../logout.php">Log Out</a> <br>
        <a href="../faskes/faskes.php">Daftar Faskes</a> <br>
        <a href="../ubahpassword.php">Ubah Password</a>
         <tr>
          <th>No.</th>
          <th>No Kis</th>
          <th>Faskes</th>
          <th>Nik</th>
          <th>Nama</th>
          <th>Tanggal Lahir</th>
          <th>Alamat</th>
          <th>Aksi</th>
         </th>
          <?php
          $no = 1;
          foreach ($innerjoin as $kis) : ?>
         <tr>
          <td><?=$no++;?></td>
          <td><?= $kis['no_kis']?></td>
          <td><?= $kis['nama_faskes']?></td>
          <td><?= $kis['nik_warga']?></td>
          <td><?= $kis['nama']?></td>
          <td><?= $kis['tgl_lahir']?></td>
          <td><?= $kis['alamat']?></td>
          <td>
            <a href="../kis/cetak.php?id=<?= $kis['no_kis']?>">cetak</a>
            <a href="../kis/edit_kis.php?no=<?= $kis['no_kis']?>" 
            class = "btn btn-sm btn-warning" onclick="return comfirm('Anda Yakin Ingin Mengedit Data ?')">Edit</a>
            <a href="?hapus_kis=<?= $kis['no_kis']?>&nik_warga=<?= $kis['nik_warga'] ?>" 
            class = "btn btn-sm btn-danger" onclick="return confirm('Anda Yakin Ingin Menghapus Data ?')">Hapus</a>
          </td>
         </tr>
         <?php endforeach ?>
        </table>
    </div>
  </div>
</div>  
</body>

</html>