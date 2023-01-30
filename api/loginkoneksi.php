<?php
    $connect = null;

    try{
        $host = "localhost";
        $username = "root";
        $password = "";
        
        
        $connect = new PDO("mysql:host=$host;dbname=dikosan", $username, $password);
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //if($connect){
        //    echo 'berhasil';
        //}else{
        //    echo 'gagal';
        //}
        
    }catch(PDOException $e){
        echo "Error ! ".$e->getMessage();
        die;
    }

?>