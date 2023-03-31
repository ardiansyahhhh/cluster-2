<?php

    require '../connect.php';

    if(isset($_POST['update'])){
        $id = $_GET['ID'];
        $kodebarang = $_POST['kode'];
        $nama = $_POST['nama'];
        $spek = $_POST['spek'];
        $harga = $_POST['harga'];
        $gambar = $_FILES['gambar'];

        $gambarlama = $_POST['gambarlama'];
        if($_FILES['gambar']['error'] === 4){
            $gambar = $gambarlama;
        }else {
            $gambar = upload();
        }

        $query = mysqli_query($conn, "UPDATE barang SET kodebarang = '" .$kodebarang. "', namabarang = '" .$nama. "', spesifikasi = '" .$spek. "', hargabarang = '" .$harga. "',gambar = '" .$gambar. "' WHERE id = '" .$id. "'");

        if($query){
            echo "<script>
            alert('Update Data Berhasil');
            document.location.href='admin.php';
            </script>";
        }
    }

    function upload(){

        $namafile1 = $_FILES['gambar']['name'];
        $ukuranfile1 = $_FILES['gambar']['size'];
        $error1 = $_FILES['gambar']['error'];
        $tmpname1 = $_FILES['gambar']['tmp_name'];
    
        if($error1 === 4){
            echo "<script>
                alert('pilih gambar dahulu');
            </script>";
            return false;
        }
    
        $ekstensifilevalid1 = ['jpg', 'jpeg', 'png'];
        $ekstensifile1 = explode(".", $namafile1);
        $ekstensifile1 = strtolower(end($ekstensifile1));
    
        if(!in_array($ekstensifile1, $ekstensifilevalid1)){
            echo "<script>
                alert('Hanya file jpg, jpeg dan png yang bisa diinput');
            </script>";
            return false;
        }
    
        if($ukuranfile1 > 2000000){
            echo "<script>
                alert('Ukuran File Terlalu Besar');
            </script>";
            return false;
        }
    
        $namafilebaru1 = uniqid();
        $namafilebaru1 .= '.';
        $namafilebaru1 .= $ekstensifile1;
    
        move_uploaded_file($tmpname1, '../image/' . $namafilebaru1);
        return $namafilebaru1;
    }


?>