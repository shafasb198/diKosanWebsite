<?php
include 'loginkoneksi.php';

    if($_POST){
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';


        $response = [];

        $userQuery = $connect->prepare("SELECT * FROM tb_pengguna where username =?");
        $userQuery->execute(array($username));
        $query = $userQuery->fetch();

        if($userQuery->rowCount() == 0){
            $response['status'] = false;
            $response['message'] = "Username Tidak Terdaftar";
        } else {

            $passwordDB = $query['password'];

            if(strcmp($password,$passwordDB) === 0){
                $response['status'] = true;
                $response['message'] = "Login Berhasil";
                $response['data'] = [
                    'id_pengguna' => $query['id_pengguna'],
                    'username' => $query['username'],
                    'nama' => $query['nama']
                ];
            } else {
                $response['status'] = false;
                $response['message'] = "Password anda salah";
            }
        }

        $json = json_encode($response, JSON_PRETTY_PRINT);
        echo $json;
    }
    
?>