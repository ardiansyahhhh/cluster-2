<?php

    session_start();
    require '../connect.php';

    $id = $_GET['GetID'];
    $query = mysqli_query($conn, "SELECT * FROM barang WHERE id = '$id'");




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
                <?php foreach ($query as $row) {
                        # code...
                     ?>
            <form action="update.php?ID=<?= $row['id']; ?>" method="post" enctype="multipart/form-data">
                <table>
                    
                    <tr>
                        <th colspan="2">UPDATE BARANG</th>
                    </tr>
                    <tr>
                        <td>Kode Barang</td>
                        <td><input type="text" name="kode" value="<?= $row['kodebarang']; ?>"></td>
                    </tr>
                    <tr>
                        <td>Nama Barang</td>
                        <td><input type="text" name="nama" value="<?= $row['namabarang']; ?>"></td>
                    </tr>
                    <tr>
                        <td>Spesifikasi</td>
                        <td><textarea name="spek" cols="40" rows="20"><?= $row['spesifikasi']; ?></textarea></td>
                    </tr>
                    <tr>
                        <td>Harga Barang</td>
                        <td><input type="number" name="harga" value="<?= $row['hargabarang']; ?>"></td>
                    </tr>
                    <tr>
                        <td>Gambar Barang</td>
                        <input type="hidden" name="gambarlama" value="<?= $row['gambar']; ?>">
                        <td><input type="file" name="gambar"></td>
                    </tr>
                    <tr>
                        <th colspan="2"><button type="submit" name="update">Update</button></th>
                    </tr>
                </table>
            </form>
            <?php } ?>
        </main>
    </div>
</body>
</html>