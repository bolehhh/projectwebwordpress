<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Gan</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css"> -->
</head>
<?php
session_start();

if (isset($_SESSION['login'])){
    header("Location: home.php");
}

$link = mysqli_connect("localhost", "root", "", "db_ujikom_5");
function query($sql)
{
    global $link;
    $rows = [];
    $query = mysqli_query($link, $sql);

    while ($row = mysqli_fetch_assoc($query)) {
        $rows[] = $row;
    }

    return $rows;
}

$username = query("SELECT username FROM user")[0]['username'];
$password = query("SELECT password FROM user")[0]['password'];

if (isset($_POST['login'])){
    if ($_POST['username'] != $username) { ?>

    <script>
        alert("Username Salah!")
    </script>

    <?php } else if ($_POST['password'] != $password) { ?>

        <script>
            alert("Password Salah!")
        </script>

        <?php } else {
            $_SESSION['login'] = true;
            header("Location: peserta/home.php");
        }
    }
?>
<body>
<div class="container">
        <div class="card">
        <div class="mt-4">
        <div class="card-header bg-success text-white">
            Login
            </div>
        <div class = "card-body">
        <form method="post"action="">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" placeholder="Masukkan username" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
            </div>
            <button type="submit" class="btn btn-primary mt-2" name="login">Login</button>

</form>
</body>
</html>