<?php

    session_start();
    require '../connect.php';

    if(isset($_POST['tambah'])){
        $kode = $_POST['kode'];
        $nama = $_POST['nama'];
        $spek = $_POST['spek'];
        $harga = $_POST['harga'];
        $gambar = upload1();
        if(!$gambar){
            return false;
        }

        $query = mysqli_query($conn, "INSERT INTO barang (kodebarang,namabarang,spesifikasi,hargabarang,gambar) VALUES ('$kode','$nama','$spek','$harga','$gambar')");

        if($query){
            echo "<script>
            alert('Tambah Barang Berhasil!');
            document.location.href='admin.php';
            </script>";
        }
    }

    function upload1(){
        $namafile1 = $_FILES['gambar']['name'];
        $ukuranfile1 = $_FILES['gambar']['size'];
        $error1 = $_FILES['gambar']['error'];
        $tmpname1 = $_FILES['gambar']['tmp_name'];

        if($error1 === 4){
            echo "<script>
                    alert('Pilih Gambar');
                    </script>";
            return false;
        }

        $ekstensifilevalid1 = ['jpg', 'jpeg' , 'png'];
        $ekstensifile1 = explode(".", $namafile1);
        $ekstensifile1 = strtolower(end($ekstensifile1));

        if(!in_array($ekstensifile1, $ekstensifilevalid1)){
            echo "<script>
                    alert('Hanya file jpg, jpeg dan png yang diinput');
                    </script>";
            return false;
        }

        if($ukuranfile1 > 2000000){
            echo "<script>
                    alert('Ukuran file terlalu besar');
                    </script>";
            return false;
        }

        $namafilebaru1 = uniqid();
        $namafilebaru1 .= '.';
        $namafilebaru1 .= $ekstensifile1;

        move_uploaded_file($tmpname1, '../image/' .$namafilebaru1);
        return $namafilebaru1;
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
            <form action="" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <th colspan="2"><h1>TAMBAH BARANG</h1></th>
                </tr>
                <tr>
                    <td>Kode Barang</td>
                    <td><input type="text" name="kode" required></td>
                </tr>
                <tr>
                    <td>Nama Barang</td>
                    <td><input type="text" name="nama" required></td>
                </tr>
                <tr>
                    <td>Spesifikasi</td>
                    <td><textarea name="spek" id="" cols="50" rows="25" required></textarea></td>
                </tr>
                <tr>
                    <td>Harga Barang</td>
                    <td><input type="number" name="harga" required></td>
                </tr>
                <tr>
                    <td>Gambar Barang</td>
                    <td><input type="file" name="gambar" required></td>
                </tr>
                <tr>
                    <th colspan="2"><button type="submit" name="tambah">Tambah Barang</button></th>
                </tr>
            </table>
            </form>
        </main>
    </div>
</body>
</html>