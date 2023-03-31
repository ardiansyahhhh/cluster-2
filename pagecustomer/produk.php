<?php

    session_start();
    if(!isset($_SESSION["login"])){
        header("location:pagelogin.php");
    }
    require '../connect.php';

    $login = $_SESSION["login"];
    $query = mysqli_query($conn, "SELECT * FROM user WHERE username = '$login'");
    $barang = mysqli_query($conn, "SELECT * FROM barang");

    $nama = mysqli_fetch_assoc($query)['username'];

    foreach ($query as $row) {
        $level = $row['level'];
    }

    if($level == 'Admin'){
        header("location:logout.php");
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/produks.css">
</head>
<body>
    <div class="nav">
        <h1>SELAMAT DATANG, <?= $nama; ?></h1>
        <h2><a href="myorder.php">My Order</a></h2>
        <h3><a href="../logout.php">Log Out</a></h3>
    </div>
    <div class="container">
        <main class="grid">
            <?php foreach ($barang as $row) {
                # code...
             ?>
             <a href="formbeli.php?kodebarang=<?= $row['kodebarang']; ?>">
            <article>
                <img src="../image/<?= $row['gambar']; ?>" alt="" width="300px" height="300px">
                <div class="conten">
                    <h2><?= $row['namabarang']; ?></h2>
                    <br>
                    <p><?= $row['spesifikasi']; ?></p>
                    <br>
                    <h3>Harga : <?= $row['hargabarang']; ?></h3>
                </div>
            </article>
            <?php } ?>
        </main>
        </a>
    </div>
</body>
</html>