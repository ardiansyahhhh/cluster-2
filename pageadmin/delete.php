<?php

    require '../connect.php';

    if(isset($_GET['Del'])){
        $id = $_GET['Del'];

        $query = mysqli_query($conn, "SELECT * FROM barang WHERE kodebarang = '$id'");
        $result = mysqli_fetch_assoc($query);

        unlink("../image/" .$result['gambar']);

        $hapus = mysqli_query($conn, "DELETE FROM barang WHERE kodebarang = '$id'");

        if($hapus) {
            echo "<script>
            alert('Hapus Data Berhasil');
            document.location.href='admin.php';
            </script>";
        }
    }

?>