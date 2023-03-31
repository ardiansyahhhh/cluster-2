<?php

    session_start();
    require '../connect.php';

    $login = $_SESSION["login"];
    $query = mysqli_query($conn, "SELECT * FROM user WHERE username = '$login'");

    foreach ($query as $data) {
        $level = $data['level'];
    }

    if($level == 'customer'){
        header("location:../logout.php");
    }

    $query1 = mysqli_query($conn, "SELECT * FROM transaksi INNER JOIN barang ON transaksi.barang = barang.kodebarang");


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
    <div class="parent">
        <div class="child">
            <table border="2px">
                <tr>
                    <th colspan="6"><a href="admin.php">KEMBALI</a></th>
                </tr>
                <tr>
                    <th colspan="6">PESANAN MASUK</th>
                </tr>
                <tr>
                    <td>Nama Pembeli</td>
                    <td>Nama Barang</td>
                    <td>Jumlah Beli</td>
                    <td>Total Harga</td>
                    <td>Alamat</td>
                    <td>Konfirmasi</td>
                </tr>
                <?php foreach ($query1 as $row) {
                    
                 ?>
                 <tr>
                    <td><?= $row['pembeli']; ?></td>
                    <td><?= $row['namabarang']; ?></td>
                    <td><?= $row['jumlah']; ?></td>
                    <td><?= $row['totalharga']; ?></td>
                    <td><?= $row['alamat']; ?></td>
                    <td>
                        <?php
                            if($row['status'] == 'Pending'){
                                echo '<a href="status.php?id= '.$row['idtransaksi'] .'&&status=Accepted"><i class="fa-solid fa-circle-check" style="font-size: 30px; padding: 10px;"></i></a><a href="status.php?id= '.$row['idtransaksi'] .'&&status=Declined"><i class="fa-solid fa-circle-xmark" style="font-size: 30px; padding: 10px;"></i></a>';
                            }elseif($row['status'] == 'Accepted'){
                                echo 'Accepted';
                            }else {
                                echo 'Declined';
                            }
                         ?>
                        
                    </a>
                    </td>
                 </tr>
                 <?php } ?>
            </table>
        </div>
    </div>
</body>
</html>