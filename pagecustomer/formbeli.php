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
    $query = mysqli_query($conn, "SELECT * FROM user WHERE username = '$login'");

    $kodebarang = $_GET['kodebarang'];
    $query1 = mysqli_query($conn, "SELECT * FROM barang WHERE kodebarang = '$kodebarang'");

    $data = mysqli_fetch_assoc($query1);

    if(isset($_POST['beli'])){
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $jumlah = $_POST['jumlah'];
        $harga = $_POST['harga'];

        $total = $jumlah * $harga;

        $beli = mysqli_query($conn, "INSERT INTO transaksi (pembeli,barang,jumlah,totalharga,alamat) VALUES ('$nama','$kodebarang','$jumlah','$total','$alamat')");

        if($query){
            echo "<script>
            alert('TRANSAKSI BERHASIL!');
            document.location.href='../index.php';
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
                    <?php foreach ($query as $row) {
                        # code...
                     ?>
                    <tr>
                        <th colspan="2">FORM PEMBELIAN</th>
                    </tr>
                    <tr>
                        <td>Nama Pembeli</td>
                        <td><input type="text" name="nama" readonly value="<?= $row['username']; ?>"></td>
                    </tr>
                    <tr>
                        <td>Email Pembeli</td>
                        <td><input type="text" name="email" readonly value="<?= $row['email']; ?>"></td>
                    </tr>
                    <tr>
                        <td>Telepon Pembeli</td>
                        <td><input type="number" name="telepon" readonly value="<?= $row['telepon']; ?>"></td>
                    </tr>
                    <tr>
                        <td>Alamat Pembeli</td>
                        <td><textarea name="alamat" id="" cols="41" rows="10" placeholder="Masukkan Alamat" required></textarea></td>
                    </tr>
                    <tr>
                        <td>Nama Barang</td>
                        <td><input type="text" name="barang" readonly value="<?= $data['namabarang']; ?>"></td>
                    </tr>
                    <tr>
                        <td>Harga Barang</td>
                        <td><input type="number" name="harga" readonly value="<?= $data['hargabarang']; ?>"></td>
                    </tr>
                    <tr>
                        <td>Jumlah Beli</td>
                        <td><input type="number" name="jumlah" min="1" placeholder="Masukkan Jumlah Beli" required></td>
                    </tr>
                    <tr>
                        <th colspan="2"><button type="submit" name="beli">BELI</button></th>
                    </tr>
                </table>
                <?php } ?>
            </form>
        </main>
    </div>
</body>
</html>