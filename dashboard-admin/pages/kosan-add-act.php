<?php

include "../../koneksi.php";
session_start();

    if (!isset($_SESSION["username"])) {
        echo "<script>alert('Anda Harus Login !!!');</script>";
        echo "<script>location='loginreg/login.php';</script>";
        exit;
    }

    $fnama = $_POST['namakos'];
    $falamat = $_POST['alamat'];
    $ftipe = $_POST['tipe'];
    $fharga = $_POST['harga'];
    $fkapasitas = $_POST['kapasitas'];
    $fjangka = $_POST['jangka'];
    $fluas = $_POST['luas'];
    $ffasilitas = $_POST['fasilitas'];
    $fidpemilik = $_SESSION['id_pemilik'];
    $fidkos = $_SESSION['id_kos'];

//------------------------------------
//auto increment id pengguna
//------------------------------------
    $query = "SELECT MAX(id_kos) AS id FROM tb_kos";
    $sql = mysqli_query($conn, $query);
    $row = mysqli_num_rows($sql);
    if($row>0){
    while($data = mysqli_fetch_array($sql)){
        //return var_dump($data);
        $ids=$data['id'];
        $angka = intval($ids);
        $angka++;
        $fid_kos = $angka;
    }
    }else{
    echo "<tr><td colspan='5'>Tambah Kosan Gagal</td></tr>";
    }

    if ($_FILES['foto']['name'])
    {
        //memasukkan file gambar ke folder upload
        move_uploaded_file($_FILES['foto']['tmp_name'], "../images/" . $_FILES['foto']['name']);
        $img = $_FILES['foto']['name'];
    }
    $i = "insert into tb_kos(id_kos,id_pemilik,nama_kos,alamat,tipe_kos,kapasitas,jangka,luas,fasilitas,harga,foto_kosan,status_kosan) 
            value('$fid_kos','$fidpemilik','$fnama','$falamat', '$ftipe', '$fkapasitas', '$fjangka', '$fluas', '$ffasilitas', '$fharga', '$img', 'Diajukan')";
   
            mysqli_query($conn, $i);
            echo "<script>alert('Sukses menambahkan kos baru!');window.location='kosan.php';</script>";
  
?>