<?php

include 'loginkoneksi.php';

if($_POST){

    //POST DATA
    $username = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'password');
    $nama = filter_input(INPUT_POST, 'nama');
    $level = filter_input(INPUT_POST, 'level');

    $response = [];

    //Cek username didalam databse
    $userQuery = $connect->prepare("SELECT * FROM tb_pengguna where username = ?");
    $userQuery->execute(array($username));

    // Cek username apakah ada tau tidak
    if($userQuery->rowCount() != 0){
        // Beri Response
        $response['status']= false;
        $response['message']='Akun sudah digunakan';
    } else {
        $insertAccount = 'INSERT INTO tb_pengguna (username,password, nama, level) values (:username, :password, :nama, :level)';
        $statement = $connect->prepare($insertAccount);

        try{
            //Eksekusi statement db
            $statement->execute([
                ':username' => $username,
                ':password' => $password,
                ':nama' => $nama,
                ':level' => $level
            ]);

            //Beri response
            $response['status']= true;
            $response['message']='Akun berhasil didaftar';
            $response['data'] = [
                'username' => $username,
                'nama' => $nama,
                'level' => $level
            ];
        } catch (Exception $e){
            die($e->getMessage());
        }

    }
    
    //Jadikan data JSON
    $json = json_encode($response, JSON_PRETTY_PRINT);

    //Print JSON
    echo $json;
}