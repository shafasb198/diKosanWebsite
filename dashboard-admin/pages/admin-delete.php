<?php
    include "../../koneksi.php";
    $id = $_GET["id_pengguna"];
    //mengambil id yang ingin dihapus

        //jalankan query DELETE untuk menghapus data
        $query = "DELETE FROM tb_pengguna WHERE id_pengguna='$id'";
        $hasil_query = mysqli_query($conn, $query);

        //periksa query, apakah ada kesalahan
        if(!$hasil_query) {
        die ("Gagal menghapus data: ".mysqli_errno($conn).
        " - ".mysqli_error($conn));
        } else {
        echo "<script>alert('Sukses menghapus data admin!');window.location='admin.php';</script>";
        }
?>