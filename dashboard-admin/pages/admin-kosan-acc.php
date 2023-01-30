<?php

include "../../koneksi.php";

$fid = $_POST['idkos'];

if(isset($_POST['acc']))
    {
    //$i = "UPDATE tb_kos SET id_kos='$fid', id_pemilik='".$idpem["id_pemilik"]."',nama_kos='$fnama',alamat='$falamat',
        //tipe_kos='$ftipe',kapasitas='$fkapasitas',jangka='$fjangka',luas='$fluas',fasilitas='$ffasilitas',harga='$fharga',
        //foto_kosan='".$idpem["foto_kosan"]."', status_kosan='Terdaftar' WHERE id_kos='$fid'";
    $i = "UPDATE tb_kos SET status_kosan = 'Terdaftar' WHERE tb_kos.id_kos = '$fid'";
   
            mysqli_query($conn, $i);
            echo "<script>alert('Sukses mendaftarkan kos!');window.location='admin-kosan.php';</script>";
}
else{
    $j = "UPDATE tb_kos SET status_kosan = 'Diajukan' WHERE tb_kos.id_kos = '$fid'";
   
    mysqli_query($conn, $j);
    echo "<script>alert('Sukses mendaftarkan kos!');window.location='admin-kosan.php';</script>";
}
?>