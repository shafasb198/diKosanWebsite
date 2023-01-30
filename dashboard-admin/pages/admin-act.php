<?php

include "../../koneksi.php";

    $fnama = $_POST['nama'];
    $fusername = $_POST['username'];
    $fpassword = $_POST['password'];

//------------------------------------
//auto increment id pengguna
//------------------------------------
    $query = "SELECT (id_pengguna) AS id FROM tb_pengguna";
    $sql = mysqli_query($conn, $query);
    $row = mysqli_num_rows($sql);
    if($row>0){
      while($data = mysqli_fetch_array($sql)){
        //return var_dump($data);
        $ids=$data['id'];
        $nomor = substr($ids,2,3);
        $angka = intval($nomor);
        $angka++;
        $fid_pengguna = "PE".sprintf('%03d',$angka);
      }
    }else{
        echo "<tr><td colspan='5'>Tambah Admin Gagal</td></tr>";
      }

    if ($_FILES['foto']['name'])
    {
        //memasukkan file gambar ke folder upload
        move_uploaded_file($_FILES['foto']['tmp_name'], "../pengguna/" . $_FILES['foto']['name']);
        $img = $_FILES['foto']['name'];
    }
    $i = "insert into tb_pengguna(id_pengguna,nama,username,password,foto,level) 
            value('$fid_pengguna','$fnama','$fusername','$fpassword', '$img', 'admin')";
   
            mysqli_query($conn, $i);
            echo "<script>alert('Sukses menambahkan admin baru!');window.location='admin.php';</script>";
  
?>