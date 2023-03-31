<?php

    session_start();
    require 'connect.php';

    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' AND password = '$password'");

        $cek = mysqli_num_rows($query);

        if($cek > 0){
            $data = mysqli_fetch_assoc($query);
            if($data['level'] == 'customer'){
                $_SESSION["login"] = $data['username'];
                echo "<script>
                alert('Login Berhasil');
                document.location.href='pagecustomer/produk.php';
                </script>";
            }else{
                $_SESSION["login"] = $data['username'];
                echo "<script>
                alert('Login Berhasil');
                document.location.href='pageadmin/admin.php';
                </script>";
            }
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
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="parent">
        <form action="" method="post">
            <div class="child">
                <table>
                    <tr>
                        <th colspan="2">SELAMAT DATANG!</th>
                    </tr>
                    <tr>
                        <td>Username</td>
                        <td><input type="text" name="username" placeholder="Masukkan Username" required></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input type="password" name="password" placeholder="Masukkan Password" required></td>
                    </tr>
                    <tr>
                        <th colspan="2"><button type="submit" name="login">Login</button></th>
                    </tr>
                    <tr>
                        <td><a href="pagecustomer/registrasi.php">registrasi?</a></td>
                    </tr>
                </table>
            </div>
        </form>
    </div>
</body>
</html>