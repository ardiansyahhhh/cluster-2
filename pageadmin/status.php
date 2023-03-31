<?php

    require '../connect.php';

    $id = $_GET['id'];
    $status = $_GET['status'];

    $query = mysqli_query($conn, "UPDATE transaksi SET status = '$status' WHERE idtransaksi = '$id'");

    if($query){
        echo "<script>
        alert('Status Berhasil Diubah');
        document.location.href='transaksi.php';
        </script>";
    }

?>