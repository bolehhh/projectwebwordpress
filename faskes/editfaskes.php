<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>edit faskes</title>
</head>

<?php include "../koneksi.php";

$faskes = query("SELECT * FROM faskes WHERE id_faskes = $_GET[id]")[0];

if (isset($_POST['editFaskes'])){
  mysqli_query($link, "UPDATE faskes SET 
  nama_faskes = '$_POST[nama]'
  WHERE id_faskes = $_GET[id]");
  
  header("Location: faskes.php");
}

?>

<body>
  <form action="" method="post">
    <table border="1">
      <tr>
        <th>Edit Faskes</th>
      </tr>
      <tr>
        <td>Nama : </td>
        <td><input type="text" name="nama" value="<?= $faskes['nama_faskes'] ?>"></td>
      </tr>
      <tr>
        <td>
          <button type="submit" name="editFaskes">Tambah</button>
        </td>
      </tr>
    </table>
  </form>
</body>

</html>