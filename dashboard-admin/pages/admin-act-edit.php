<?php
    include "../../koneksi.php";

    if(isset($_POST['submit']))
    {
        $m = $_POST['id_pengguna'];
        $n = $_POST['nama'];
        $u = $_POST['username'];
        $p = $_POST['password'];

        if ($_FILES['f1']['name'])
        {
          move_uploaded_file($_FILES['f1']['tmp_name'], "../pengguna/" . $_FILES['f1']['name']);
          $img = $_FILES['f1']['name'];
        }
        else
        {
          $img=$_POST['foto'];
        }
        $i="UPDATE tb_pengguna SET nama='$n', username='$u', password='$p', foto='$img' WHERE  id_pengguna='$m'";

        mysqli_query($conn, $i);
        echo "<script>alert('Sukses mengubah data admin!');window.location='admin.php';</script>";
    }
?>