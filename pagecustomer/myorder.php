<?php

    session_start();
    if(!isset($_SESSION["login"])){
        echo "<script>
        alert('Silakan Login Terlebih Dahulu!');
        document.location.href='../pagelogin.php';
        </script>";
    }
    require '../connect.php';

    $login = $_SESSION["login"];
    $query = mysqli_query($conn, "SELECT * FROM user WHERE username  = '$login'");

    foreach ($query as $data) {
        $level = $data['level'];
    }

    if($level == 'Admin'){
        header("location:../logout.php");
    }

    $query1 = mysqli_query($conn, "SELECT * FROM transaksi INNER JOIN barang ON transaksi.barang = barang.kodebarang WHERE status = 'Accepted' AND pembeli = '$login'");


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/admins.css">
</head>
<body>
    <div class="parent">
        <div class="child">
            <table border="2">
                <tr>
                    <th colspan="6"><a href="../index.php">KEMBALI</a></th>
                </tr>
                <tr>
                    <th colspan="6">BARANG YANG DIPESAN</th>
                </tr>
                <tr>
                    <td>Nama Pembeli</td>
                    <td>Nama Barang</td>
                    <td>Jumlah Beli</td>
                    <td>Total Harga</td>
                </tr>

                <?php foreach ($query1 as $row) {
                    # code...
                 ?>
                <tr>
                    <td><?= $row['pembeli']; ?></td>
                    <td><?= $row['namabarang']; ?></td>
                    <td><?= $row['jumlah']; ?></td>
                    <td><?= $row['totalharga']; ?></td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</body>
</html>