<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HOME</title>
</head>

<?php 

include "koneksi.php";

$user = query("SELECT * FROM user")[0];

if (isset($_POST['ubahPassword'])){
  mysqli_query($link, "UPDATE user SET 
  password = '$_POST[password]'");

  unset($_SESSION['login']);

  header("Location: login.php");
}

?>

<body>
  <form action="" method="post">
    <table>
      <tr>
        <h2>Ubah Password</h2>
      </tr>
      <tr>
        <p>Password Sebelumnya : <?= $user['password'] ?> </p>
        <p>Password Baru : <input type="text" name="password"> </p>
      </tr>
      <tr>
        <td></td>
      </tr>
      <tr>
        <td><button type="submit" name="ubahPassword">Ubah</button></td>
      </tr>
    </table>
  </form>
</body>

</html>