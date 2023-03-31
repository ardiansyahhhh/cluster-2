<?php

    session_start();
    if(!isset($_SESSION["login"])){
        header("location:../pagelogin.php");
    }
    require '../connect.php';

    $login = $_SESSION["login"];
    $query = mysqli_query($conn, "SELECT * FROM user WHERE username = '$login'");
    $nama = mysqli_fetch_assoc($query)['username'];

    $barang = mysqli_query($conn, "SELECT * FROM barang");

    foreach ($query as $row) {
        $level = $row["level"];
    }

    if($level == 'customer'){
        header("location:../logout.php");
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/admins.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="nav">
        <h1>Selamat Datang, <?= $nama; ?></h1>
        <h3><a href="../logout.php">Log Out</a></h3>
    </div>
    <div class="parent">
        <div class="child">
            <table border="2px">
                <tr>
                    <th colspan="7"><a href="transaksi.php">LIHAT PESANAN</a></th>
                </tr>
                <tr>
                    <th colspan="7">DAFTAR BARANG</th>
                </tr>
                <tr>
                    <td>Kode Barang</td>
                    <td>Nama Barang</td>
                    <td>Spesifikasi</td>
                    <td>Harga Barang</td>
                    <td>Gambar Barang</td>
                    <td>Action</td>
                </tr>
                <?php foreach ($barang as $row) {
                    # code...
                 ?>
                 <tr>
                    <td><?= $row['kodebarang']; ?></td>
                    <td><?= $row['namabarang']; ?></td>
                    <td><?= $row['spesifikasi']; ?></td>
                    <td><?= $row['hargabarang']; ?></td>
                    <td><img src="../image/<?= $row['gambar']; ?>" alt="" width="250px" height="250px"></td>
                    <td><a href="delete.php?Del=<?= $row['kodebarang']; ?>"><i class="fa-solid fa-trash"></i></a><br><br><a href="formedit.php?GetID=<?= $row['id']; ?>"><i class="fa-solid fa-wrench"></i></a></td>
                 </tr>
                 <?php } ?>
                 <tr>
                    <th colspan="7"><a href="tambahbarang.php">TAMBAH BARANG</a></th>
                 </tr>
            </table>
        </div>
    </div>
</body>
</html>