<?php
    $hostname = "localhost";
    $database = "dikosan";
    $username = "root";
    $password = "";
    $connect = mysqli_connect($hostname, $username, $password, $database);

    // script cek koneksi
    if(!$connect){
        die("Koneksi tidak berhasil : ".mysqli_connect_error());
    }
?>