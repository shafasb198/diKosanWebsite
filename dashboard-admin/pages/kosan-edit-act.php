<?php

include "../../koneksi.php";
if(isset($_POST['btn-edit']))
    {

    $fid = $_POST['idkos'];
    $fnama = $_POST['namakos'];
    $falamat = $_POST['alamat'];
    $ftipe = $_POST['tipe'];
    $fharga = $_POST['harga'];
    $fkapasitas = $_POST['kapasitas'];
    $fjangka = $_POST['jangka'];
    $fluas = $_POST['luas'];
    $ffasilitas = $_POST['fasilitas'];
    
    $getidpem = "SELECT tb_kos.id_pemilik FROM tb_kos JOIN tb_pemilik ON 
    tb_pemilik.id_pemilik=tb_kos.id_pemilik WHERE tb_kos.id_kos='$fid'";
    $idpemnya = mysqli_query($conn, $getidpem);
    $idpem = mysqli_num_rows($idpemnya);


    if ($_FILES['foto']['name'])
    {
        //memasukkan file gambar ke folder upload
        move_uploaded_file($_FILES['foto']['tmp_name'], "../images/" . $_FILES['foto']['name']);
        $img = $_FILES['foto']['name'];
    }
    $i = "UPDATE tb_kos SET id_kos='$fid', nama_kos='$fnama',alamat='$falamat',
        tipe_kos='$ftipe',kapasitas='$fkapasitas',jangka='$fjangka',luas='$fluas',fasilitas='$ffasilitas',harga='$fharga',
        foto_kosan='$img', status_kosan='Diajukan' WHERE tb_kos.id_kos='$fid'";
        
   
            mysqli_query($conn, $i);
            echo "<script>alert('Sukses mengedit kos!');window.location='kosan.php';</script>";
}
?>