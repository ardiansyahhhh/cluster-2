<?php

    session_start();
    if(isset($_SESSION["login"])){
        header("location:../logout.php");
    }
    require '../connect.php';

    if(isset($_POST['daftar'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $telepon = $_POST['telepon'];

        $query = mysqli_query($conn, "INSERT INTO user (username,password,email,telepon) VALUES ('$username','$password','$email','$telepon')");

        if($query){
            echo "<script>
            alert('Registrasi Berhasil!');
            document.location.href='../pagelogin.php';
            </script>";
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/tambahbarang.css">
</head>
<body>
    <div class="container">
        <main class="grid">
            <form action="" method="post">
                <table>
                    <tr>
                        <th colspan="2">DAFTAR AKUN</th>
                    </tr>
                    <tr>
                        <td>Username</td>
                        <td><input type="text" name="username" placeholder="Masukkan Username" required></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="email" name="email" placeholder="Masukkan Email" required></td>
                    </tr>
                    <tr>
                        <td>Telepon</td>
                        <td><input type="number" name="telepon" placeholder="Masukkan Telepon" required></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input type="password" name="password" placeholder="Masukkan Password" required></td>
                    </tr>
                    <tr>
                        <th colspan="2"><button type="submit" name="daftar">Daftar</button></th>
                    </tr>
                </table>
            </form>
        </main>
    </div>
</body>
</html>