<?php
    include "../../koneksi.php";
    $id = $_GET["id_kos"];
    //mengambil id yang ingin dihapus

        //jalankan query DELETE untuk menghapus data
        $query = "DELETE FROM tb_kos WHERE id_kos='$id'";
        $hasil_query = mysqli_query($conn, $query);

        //periksa query, apakah ada kesalahan
        if(!$hasil_query) {
        die ("Gagal menghapus data: ".mysqli_errno($conn).
        " - ".mysqli_error($conn));
        } else {
        echo "<script>alert('Sukses menghapus data kos!');window.location='kosan.php';</script>";
        }
?>